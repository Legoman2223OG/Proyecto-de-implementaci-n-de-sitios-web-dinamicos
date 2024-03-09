<?php
include("libreria/motor.php");
$est=Estudiante::buscar("xyz");
$datos = new Estudiante();
$estudiante = new Estudiante();
if($_POST){

//$estudiante->nombre=$_POST['txtNombre'];
//$estudiante->apellido=$_POST['txtApellido'];
//$estudiante->sexo=$_POST['txtSexo'];
//$estudiante->matricula=$_POST['txtMatricula'];
//$estudiante->carrera=$_POST['txtCarrera'];
//$estudiante->guardar();
//header("Location:formulario_1.php");

}
include("menu_bs.php");
$operacion = '';

$nombre = '';
$apellido = '';
$sexo = '';
$matricula = '';
$carrera = '';



if (!empty($_POST)) {

    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'alta' ;
	
	if ($operacion == 'alta'){
		$estudiante->nombre=$_POST['txtNombre'];
		$estudiante->apellido=$_POST['txtApellido'];
		$estudiante->sexo=$_POST['txtSexo'];
		$estudiante->matricula=$_POST['txtMatricula'];
		$estudiante->carrera=$_POST['txtCarrera'];
		$estudiante->guardar();
	}
	
    if ($operacion == 'edicion') {

        
        $id_usuario = $_POST['id_usuario'];

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


 

  
<div class="row">
 
  <div class="col-sm-4">
  <div id="capa_d">
  <form  role="form" method="POST" action="">
  <legend>Agregar estudiante</legend>
     <?php if (isset($operacion)){
			if ($operacion == 'edicion') {
				?>
				<label for="id_usuario" >ID:</label>
				<input id="id_usuario" name="id_usuario" type="text" class="form-control" disabled value="<?php echo $id_usuario; ?>"/>
				<?php
			}
		}	
        ?> 
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