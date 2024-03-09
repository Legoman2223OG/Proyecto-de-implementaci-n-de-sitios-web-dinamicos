<?php
include("libreria/motor.php");
//$est=Estudiante::buscar("xyz");
$datos = new Estudiante();
$estudiante = new Estudiante();

//include("menu_bs.php");
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
	}
	if ($operacion == 'actualizar' && isset($_GET['id_est'])){
	    echo '2-actualizar';
		$estudiante->nombre=$_POST['txtNombre'];
		$estudiante->apellido=$_POST['txtApellido'];
		$estudiante->sexo=$_POST['txtSexo'];
		$estudiante->matricula=$_POST['txtMatricula'];
		$estudiante->carrera=$_POST['txtCarrera'];
		$estudiante->actualizar($_GET['id_est']);
	}
	if ($operacion == 'borrar' && isset($_GET['id_est'])){
	    echo '3-eliminar';
		$estudiante->borrar($_GET['id_est']);
	}
    if ($operacion == 'edicion' && isset($_GET['id_usuario'])) {
        echo '3-edicion';
        
        $id_usuario = $_GET['id_usuario'];

        $datos=Estudiante::traer_datos($id_usuario);

        $nombre = $datos['¨nombre'];
        $apellido = $datos['apellido'];
        $sexo = $datos['sexo'];
        $matricula = $datos['matricula'];
        $carrera = $datos['carrera'];
    }
    //$msg = '';
}
?>

<!DOCTYPE html>
<html lang="es">
 <head>
   <title>Formulario (Con Bootstrap)</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <script src="bootstrap/js/funciones.js"></script>
   
 </head>
 <body>
 
<div class="container" style="padding-top: 1em;">
   <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
     <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="formulario_1.php">Formulario(BootStrap)</a></li>
        <li><a href="formulario.php">Formulario</a></li>
      
      </ul>
	  
	  <form class="navbar-form navbar-right">
      <div class="form-group">
        <input type="text"  id="txt_b" placeholder="Buscar" >
      </div>
	  
	  </form>
     
	 </div> 
	 
   </nav>
 </div>
<div class="container">
  
<div class="row">
 
  <div class="col-sm-4">
  <div id="capa_d">
  <form  role="form" method="POST" action="">
  <legend>Agregar estudiante</legend>
 
     <div class="row">  	   
		   <div class="col-xs-12">
			 <div class="form-group">
			   <label for="ejemplo_apellido">Nombre</label>
			   <input type="text"  size="20" name="txtNombre" class="form-control" id="ejemplo_nombre"
					   placeholder="Introduce el nombre" value="<?php echo $nombre; ?>"/>
			 </div>
		 </div>		   
	  </div>
	  
	 <div class="row">
		   <div class="col-xs-12">
			 <div class="form-group">
			  <label for="ejemplo_nombre">Apellido</label>
			  <input type="text"  size="20" name="txtApellido" class="form-control" id="ejemplo_Apellido"
					   placeholder="Introduce el Apellido" value="<?php echo $apellido; ?>"/>
			 </div> 
		   </div>
	  </div>
	  
	 <div class="row">   
		   <div class="col-xs-12">
			 <div  class="form-group">
			 <label>Sexo</label>
			    <div class="radio">
			     <label>
				  <input type="radio" name="txtSexo" id="sexo_1" value="Femenino" checked>
				  Femenino
			     </label>
			    </div>			  
			    <div class="radio">
			     <label>
				  <input type="radio" name="txtSexo" id="sexo_2" value="Masculino">
				  Masculino
			     </label>
			    </div>				 
			 </div> 
		   </div>
	  </div>
	 
	 <div class="row">		
		<div class="col-xs-12">
			  <div class="form-group">
				<label for="ejemplo_Matricula">DNI</label>
				<input type="text"  size="20" name="txtMatricula" class="form-control" id="ejemplo_Matricula"
					   placeholder="Introduce el DNI" value="<?php echo $matricula; ?>"/>
			  </div> 
		</div> 
	  </div>
	  
	 <div class="row">		
		<div class="col-xs-12">
			 <div  class="form-group">   
				 <label>Carrera</label>
				   <select class="form-control" name="txtCarrera" value="<?php echo $carrera; ?>"/>
					  <option>Software</option>
					  <option>Multimedia</option>
					  <option>Redes</option>
					  <option>Mecatronica</option>
				   </select>
			 </div>   
			</div>  
	 </div>
		 
  
  <button method="post" type="submit" class="btn btn-default">Agregar</button>
  </form>
  </div>
  </div>
  <div class="col-sm-8">
  <div id="capa_L">	
  
	  <div class="panel panel-default">
		  <div class="panel-heading">Estudiantes Agregados</div>   
			  <table class="table table-hover">
				  <thead>
					  <tr>
					  <th id="proceso">Id</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Sexo</th>
					  <th>Matricula</th>
					  <th>Carrera</th>
					  </tr>
				  </thead>
			  <tbody>
			  <?php
			    if (isset($est)){
				  foreach($est as $estudiantes){
				   echo "
				   <tr>
				   <td>$estudiantes[id]</td>
				   <td>$estudiantes[nombre]</td>
				   <td>$estudiantes[apellido]</td>
				   <td>$estudiantes[sexo]</td>
				   <td>$estudiantes[matricula]</td>
				   <td>$estudiantes[carrera]</td>
				   </tr>
				   ";
				   }
				   }
			  ?>
			  </tbody>
			  
			  </table>
			  
	  </div>
   </div>
</div>



</div>
</div>
</body>

</html>