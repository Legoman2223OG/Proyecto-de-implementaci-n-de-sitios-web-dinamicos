<?php
//include_once("libreria/motor.php");
include_once("libreria/estudiante.php");

$datos = new Estudiante();
$estudiante = new Estudiante();

include_once("menu_bs.php");

$operacion = '';

$nombre = '';
$apellido = '';
$sexo = '';
$matricula = '';
$carrera = '';



if (!empty($_POST)) {
    
    //$operacion = $_GET['operacion']  ;
	$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	
	//echo "*".$operacion."*";
	
	if ($operacion == 'alta' && !isset($_GET['id_est'])){
	    //echo '1-alta';
		$estudiante->nombre=$_POST['txtNombre'];
		$estudiante->apellido=$_POST['txtApellido'];
		$estudiante->sexo=$_POST['txtSexo'];
		$estudiante->matricula=$_POST['txtMatricula'];
		$estudiante->carrera=$_POST['txtCarrera'];
		$estudiante->guardar();
	}
	if ($operacion == 'actualizar' && isset($_GET['id_est'])){
	    //echo '2-actualizar';
		$estudiante->nombre=$_POST['txtNombre'];
		$estudiante->apellido=$_POST['txtApellido'];
		$estudiante->sexo=$_POST['txtSexo'];
		$estudiante->matricula=$_POST['txtMatricula'];
		$estudiante->carrera=$_POST['txtCarrera'];
		$estudiante->actualizar($_GET['id_est']);
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	if ($operacion == 'borrar' && isset($_GET['id_est'])){
	    //echo '3-eliminar';
		$estudiante->borrar($_GET['id_est']);
	}
    if ($operacion == 'edicion' && isset($_GET['id_usuario'])) {
        //echo '3-edicion';
        
        $id_usuario = $_GET['id_usuario'];

        $datos=Estudiante::traer_datos($id_usuario);

        $nombre = $datos['¨nombre'];
        $apellido = $datos['apellido'];
        $sexo = $datos['sexo'];
        $matricula = $datos['matricula'];
        $carrera = $datos['carrera'];
    }
   
}
?>
 
<script src="bootstrap/js/funciones_e.js"></script>
 
<div class="container-fluid">
   <nav class="navbar navbar-default " role="navigation" >
     <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
	  <span style="padding-right: 20px;font-weight: bold;">Estudiantes</span>
	  <button type="button" class="btn btn-primary  btn-sm"   onclick="cargar('#capa_d','alta_e.php')">Alta</button>
      </ul>      
      
      
	  
	  
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
        <input type="text"  id="txt_b" placeholder="Buscar" style="position: absolute;right: 100px;" >
		<button type="button" id="btn_b" class="btn btn-primary btn-sm" style="position: absolute;right: 20px;">Buscar</button>
      </ul>
	 
	   
     
	 </div> 
	 
   </nav>
 </div>


 
 
<div class="row">
 
  <div class="col-sm-3">
  <div id="capa_d">
  
  </div>
  </div>
  
  <div class="col-sm-9">
  <div id="capa_L">	
  
	    </div>
</div>



</div>
</div>
</body>

</html>