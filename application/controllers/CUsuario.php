<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CUsuario extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
   }

   public function verPropuesta($id)
   {
       //INFORMACION DE LA PROPUESTA
    $this->db->select("propuesta.idPropuesta,UPPER(propuesta.titulo) titulo,empresa.direccion,UPPER(propuesta.descripcion) descripcion,cast( propuesta.fecha as date) fecha,propuesta.jornada,propuesta.salario,empresa.nombre,empresa.pais,empresa.sector");
    $this->db->from("propuesta");
    $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
    $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
    $this->db->where("propuesta.idPropuesta",$id);
    $data["propuesta"]=$this->db->get()->result()[0];
    
    //CONOCIMIENTOS
    $this->db->select("conocimientos.idConocimiento, conocimientos.conocimientos");
    $this->db->from("conocimientos");
    $this->db->join("propuestaConocimiento","propuestaConocimiento.idConocimiento=conocimientos.idConocimiento");
    $this->db->where("propuestaConocimiento.idPropuesta",$id);
    $data["conocimientos"]=$this->db->get()->result();

       //verificar si ya se realizo la postulacion
    $this->db->select("count(*) cont");
    $this->db->from("postulaciones");
    $this->db->where("idUsuario",$this->session->userdata("s_idusuario"));
    $this->db->where("idPropuesta",$id);
    $data["comprobador"]=$this->db->get()->result()[0];
    

    $this->load->view('home/header');
    $this->load->view('home/asidenav');
    $this->load->view('usuario/verpropuesta',$data);
    $this->load->view('home/footer');

 
   }

   public function verPostulaciones()
   {
        $this->db->select("postulaciones.idPropuesta,postulaciones.estado,postulaciones.fecha,postulaciones.idPostulacion,propuesta.titulo, propuesta.salario,propuesta.jornada");
        $this->db->from("postulaciones");
        $this->db->join("propuesta","postulaciones.idPropuesta = propuesta.idPropuesta");
        $this->db->where("postulaciones.idUsuario",$this->session->userdata("s_idusuario"));
        $data["postulaciones"]=$this->db->get()->result();
        $data["contador"]=count($data["postulaciones"]);
        
        //Buscando mensajes sin leer en las postulaciones
        foreach($data["postulaciones"] as $pos)
        {
            $this->db->select("count(*) cont");
            $this->db->from("mensajes");
            $this->db->where("idPostulacion",$pos->idPostulacion);
            $pos->cont=$this->db->get()->result()[0]->cont;
        }


        $this->load->view('home/header');
        $this->load->view('home/asidenav');
        $this->load->view('usuario/verpostulaciones',$data);
        $this->load->view('home/footer');
   }

   public function verPostulacion($id)
   {

        $this->db->select("postulaciones.idPostulacion,postulaciones.idPropuesta,empresa.pais,empresa.direccion,propuesta.descripcion,empresa.nombre empresa,postulaciones.estado,postulaciones.fecha,postulaciones.idPostulacion,propuesta.titulo, propuesta.salario,propuesta.jornada");
        $this->db->from("postulaciones");
        $this->db->join("propuesta","postulaciones.idPropuesta = propuesta.idPropuesta");
        $this->db->join("usuarioEmpresa","propuesta.idUsuarioEmpresa=usuarioEmpresa.idUsuarioEmpresa");
        $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
        $this->db->where("postulaciones.idUsuario",$this->session->userdata("s_idusuario"));
        $this->db->where("postulaciones.idPropuesta",$id);
        $data["postulacion"]=$this->db->get()->result()[0];

        //Conocimientos de la propuesta
        //CONOCIMIENTOS
        $this->db->select("conocimientos.idConocimiento, conocimientos.conocimientos");
        $this->db->from("conocimientos");
        $this->db->join("propuestaConocimiento","propuestaConocimiento.idConocimiento=conocimientos.idConocimiento");
        $this->db->where("propuestaConocimiento.idPropuesta",$id);
        $data["conocimientos"]=$this->db->get()->result();

        echo '<script> var idPostulacion="'.$data["postulacion"]->idPostulacion.'"</script>';
        //Obteniendo mensajes
        $this->db->select("postulaciones.idPostulacion,remitente,mensaje,mensajes.fecha,idmensaje,empresa.nombre");
        $this->db->from("mensajes");
        $this->db->join("postulaciones","postulaciones.idPostulacion=mensajes.idPostulacion");
        $this->db->join("propuesta","propuesta.idPropuesta=postulaciones.idPropuesta");
        $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
        $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
        $this->db->where("postulaciones.idPostulacion",$data["postulacion"]->idPostulacion);

        $data["mensajes"]=$this->db->get()->result();
        

        $this->load->view('home/header');
        $this->load->view('home/asidenav');
        $this->load->view('usuario/verpostulacion',$data);
        $this->load->view('home/footer');
   }

   public function postularUsuario($idPropuesta)
   {
        $idUsuario= $this->session->userdata("s_idusuario");        
        $datos=array(
            'idUsuario'=>$idUsuario,
            'idPropuesta'=>$idPropuesta,
            'estado'=>0,
            'fecha'=>date('Y-m-d h:i:s')
        );
        $this->db->insert("postulaciones",$datos);
   }


   function guardarMensaje()
   {
       $this->input->post("idPostulacion");
       $this->input->post("mensaje");
       $data=array('idPostulacion'=>$this->input->post("idPostulacion"),
                   'remitente'=>1,
                   'mensaje'=>$this->input->post("mensaje"),
                   'fecha'=>date('Y-m-d h:i:s'),
                   'visto'=>0);
       $this->db->insert("mensajes",$data);
       $num= $this->db->affected_rows();
       if($num>0)
       {
           echo json_encode(array('error'=>false));
       }
   }


}


?>