
</div>
<footer class="main-footer">
  <div id="testMod"> </div>
    <div class="pull-right hidden-xs">
      <b>Versión</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">CompuTrabajo</a>.</strong> Derechos reservados
  </footer>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>public/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/morris.js/morris.min.js"></script>

<!--ChartJS Plugin -->
<script src="<?php echo base_url(); ?>public/bower_components/chart.js/Chart.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- select -->
<script src="<?php echo base_url(); ?>public/plugins/select/bootstrap-select.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<!-- InputMask -->
<script src="<?php echo base_url(); ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url(); ?>public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->

<!-- JQueryPrint -->
<script src="<?php echo base_url(); ?>public/bower_components/jQueryPrint/jQuery.print.js"></script>

<!-- jsPDF -->
<script src="<?php echo base_url(); ?>public/bower_components/jsPDF/jspdf.debug.js"></script>
<!-- html2canvas -->
<script src="<?php echo base_url(); ?>public/bower_components/jsPDF/html2canvas.js"></script>



<script src="<?php echo base_url(); ?>public/dist/js/adminlte.min.js"></script>

<!-- highcharts -->
<script src="<?php echo base_url(); ?>public/bower_components/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/highcharts/exporting.js"></script>

<!-- timepicker -->
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!-- datetimepicker -->
<script src="<?php echo base_url(); ?>public/bower_components/datetimepicker/bootstrap-datetimepicker.min.js"></script>

<!-- fullCalendar -->

<script src="<?php echo base_url(); ?>public/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/fullcalendar/dist/locale/es.js"></script>
<!-- Page specific script -->
<script>

(function($){
    $.fn.wysihtml5.locale["es-ES"] = {
        font_styles: {
              normal: "Texto normal",
              h1: "Título 1",
              h2: "Título 2",
              h3: "Título 3",
              h4: "Título 4",
              h5: "Título 5",
              h6: 'Título 6'
        },
        emphasis: {
              bold: "Negrita",
              italic: "Itálica",
              underline: "Subrayado"
        },
        lists: {
              unordered: "Lista desordenada",
              ordered: "Lista ordenada",
              outdent: "Eliminar sangría",
              indent: "Agregar sangría"
        },
        link: {
              insert: "Insertar enlace",
              cancel: "Cancelar"
        },
        image: {
              insert: "Insertar imágen",
              cancel: "Cancelar"
        },
        html: {
            edit: "Editar HTML"
        },
        colours: {
          black: "Negro",
          silver: "Plata",
          gray: "Gris",
          maroon: "Marrón",
          red: "Rojo",
          purple: "Púrpura",
          green: "Verde",
          olive: "Oliva",
          navy: "Azul Marino",
          blue: "Azul",
          orange: "Naranja"
        }
    };
}(jQuery));
</script>

<script>
 
 $('#descripcion').wysihtml5({
	"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
	"emphasis": true, //Italics, bold, etc. Default true
	"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
	"html": false, //Button which allows you to edit the generated HTML. Default false
	"link": true, //Button to insert a link. Default true
	"image": true, //Button to insert an image. Default true,
	"color": false, //Button to change color of font  ,
  'locale':'es-ES'
});
  //$("#").wysihtml5();
</script>


<!-- SOlo PDFS-->
<script>
$('#archivo').on( 'change', function() {
   myfile= $( this ).val();
   var ext = myfile.split('.').pop();
   if(ext=="pdf" || ext=="docx" || ext=="doc"){
    $("#button").show();
   } else{
    
    alert("SOLO PDF");
       $("#button").hide();
   }
});
</script>


<!-- Conocimientos creando una nueva propuesta 
<script>
 
  $("#conocimientosAdd").val(["1", "2", "3"]);
</script>-->
</div>
</body>
</html>
