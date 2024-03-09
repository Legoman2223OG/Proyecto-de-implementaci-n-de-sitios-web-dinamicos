<?php
include_once("libreria/motor.php");
//$est=Estudiante::buscar("xyz");
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
	    echo '1-alta';
		$estudiante->nombre=$_POST['txtNombre'];
		$estudiante->apellido=$_POST['txtApellido'];
		$estudiante->sexo=$_POST['txtSexo'];
		$estudiante->matricula=$_POST['txtMatricula'];
		$estudiante->carrera=$_POST['txtCarrera'];
		$estudiante->guardar();
		return;
	}
	if ($operacion == 'actualizar' && isset($_GET['id_est'])){
	    //echo '2-actualizar';
		$estudiante->nombre=$_POST['txtNombre'];
		$estudiante->apellido=$_POST['txtApellido'];
		$estudiante->sexo=$_POST['txtSexo'];
		$estudiante->matricula=$_POST['txtMatricula'];
		$estudiante->carrera=$_POST['txtCarrera'];
		$estudiante->actualizar($_GET['id_est']);
		return;
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
		return;
    }
    //$msg = '';
}
?>