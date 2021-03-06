<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CRegistro extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
    $this->load->model('UsuariosModel');
   }

   public function index()
   {
      $errores = array();
      $errores['error'] = false;
      $this->load->view('registro/Registro',$errores);
   }

   public function registrar()
   {
     $nombres = $this->input->POST('nombre');
     $apellidos = $this->input->POST('apellido');
     $fechanac = $this->input->POST('fechanac');
     $cmbNacionalidad = $this->input->POST('cmbNacionalidad');
     $genero = $this->input->POST('rbGenero');
     $estadoC = $this->input->POST('rbEstadoC');
     $email = $this->input->POST('email');
     $telefono = $this->input->POST('telefono');
     $departamento = $this->input->POST('departamento');
     $ciudad = $this->input->POST('ciudad');
     $direccion = $this->input->POST('direccion');
     $skype = $this->input->POST('skype');
     $password = sha1($this->input->POST('password'));

     //$error = true;
     $errores = array();
     //Para el Curriculum
        $this->load->library('upload');
        if (!empty($_FILES['curriculum']['name']))
        {
            $config['upload_path'] = 'public/files/curriculum/';
            $config['allowed_types'] = 'pdf|doc|docx';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('curriculum'))
            {
                $data = $this->upload->data();
                $curriculum = $data['file_name'];
                $errores['error'] = false;
            }
            else
            {
                //echo $this->upload->display_errors();
                $errorers['error'] = true;
                $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
            }
        }
        else
        {
          $errores['error'] = true;
          $errores['error_archivo'] = "Debes subir los archivos necesarios.";
        }
     //Para la Foto
     $this->load->library('upload');
     if (!empty($_FILES['foto']['name']))
     {
         // Configuración para el Archivo
         $config['upload_path'] = 'public/photos/';
         $config['allowed_types'] = 'jpg|png|jpeg';

         // Cargamos la configuración del Archivo
         $this->upload->initialize($config);

         // Subimos archivo
         if ($this->upload->do_upload('foto'))
         {
             $data = $this->upload->data();
             $foto = $data['file_name'];
             $errores['error'] = false;
         }
         else
         {
             //echo $this->upload->display_errors();
             $errores['error'] = true;
             $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
         }
     }
     else
     {
       $errores['error'] = true;
       $errores['error_archivo'] = "Debes subir los archivos necesarios.";
     }
     //Para el DUI
     $this->load->library('upload');
     if (!empty($_FILES['dui']['name']))
     {
         $config['upload_path'] = 'public/files/dui/';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';

         $this->upload->initialize($config);

         if ($this->upload->do_upload('dui'))
         {
             $data = $this->upload->data();
             $dui = $data['file_name'];
             $errores['error'] = false;
         }
         else
         {
             //echo $this->upload->display_errors();
             $errorers['error'] = true;
             $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
         }
     }
     else
     {
       $errores['error'] = true;
       $errores['error_archivo'] = "Debes subir los archivos necesarios.";
     }
     //Para el NIT
     $this->load->library('upload');
     if (!empty($_FILES['nit']['name']))
     {
         $config['upload_path'] = 'public/files/nit/';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';

         $this->upload->initialize($config);

         if ($this->upload->do_upload('nit'))
         {
             $data = $this->upload->data();
             $nit = $data['file_name'];
             $errores['error'] = false;
         }
         else
         {
             //echo $this->upload->display_errors();
             $errorers['error'] = true;
             $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
         }
     }
     else
     {
       $errores['error'] = true;
       $errores['error_archivo'] = "Debes subir los archivos necesarios.";
     }
     //Para la solvencia
     $this->load->library('upload');
     if (!empty($_FILES['solvencia']['name']))
     {
         $config['upload_path'] = 'public/files/solvencia/';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';

         $this->upload->initialize($config);

         if ($this->upload->do_upload('solvencia'))
         {
             $data = $this->upload->data();
             $solvencia = $data['file_name'];
             $errores['error'] = false;
         }
         else
         {
             //echo $this->upload->display_errors();
             $errorers['error'] = true;
             $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
         }
     }
     else
     {
       $errores['error'] = true;
       $errores['error_archivo'] = "Debes subir los archivos necesarios.";
     }

     $this->form_validation->set_rules('password', 'Password', 'required');
     $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');

     if ($this->form_validation->run() && !$errores['error'])
     {
       //Agregando el teléfono
       $phone = array(
         'idTelefono' => null,
         'idTipoTelefono' => 1,
         'numero' => $telefono
        );

       $this->UsuariosModel->InsertPhone($phone);

       //Obteniendo ID del teléfono
       $idPhone = $this->UsuariosModel->idPhone($telefono);
       if ($idPhone != FALSE)
       {
         foreach ($idPhone as $row)
         {
           $idTel = $row->idTelefono;
         }
       }
       $data = array(
         'nombres' => $nombres,
         'apellidos' => $apellidos,
         'curriculum' => $curriculum,
         'fechaNacimiento' => $fechanac,
         'genero' => $genero,
         'estadoCivil' => $estadoC,
         'email' => $email,
         'pais' => $cmbNacionalidad,
         'departamento' => $departamento,
         'ciudad' => $ciudad,
         'direccion' => $direccion,
         'foto' => $foto,
         'idTelefono' => $idTel,
         'password' => $password,
         'skype'=>$skype,
         'dui'=>$dui,
         'nit'=>$nit,
         'solvencia'=>$solvencia
       );

       if($this->UsuariosModel->registrar($data))
       {
         redirect('/login/','refresh');
       }
       else
       {
         $this->load->view('registro/Registro',$errores);
       }
     }
     else
     {
       $this->load->view('registro/Registro',$errores);
     }

   }
}
?>
