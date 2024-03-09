<?php
//include("libreria/motor.php");
include_once("libreria/estudiante.php");

$estudiante = new Estudiante();
$nombre="";
$apellido="";
$sexo="";
$matricula="";
$carrera="";


if (!empty($_POST)) {

    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'actualizar' ;
	//echo $operacion;
	if ($operacion == 'edicion'){
	  
	  
	  $id=$_POST['id_est'];
	  
	  $A=Estudiante::traer_datos($id);
	  
	    $nombre=$A['nombre'];
		$apellido=$A['apellido'];
		$sexo=$A['sexo'];
		$matricula=$A['matricula'];
		$carrera=$A['carrera'];
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=actualizar&id_est='. $id;
		$btn_txt='Actualizar';
		$leyenda='Modificar datos ';
		
	}
	
	if ($operacion == 'baja'){
	  
	  
	  $id=$_POST['id_est'];
	  
	  $A=Estudiante::traer_datos($id);
	  
	    $nombre=$A['nombre'];
		$apellido=$A['apellido'];
		$sexo=$A['sexo'];
		$matricula=$A['matricula'];
		$carrera=$A['carrera'];
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=borrar&id_est='. $id;
		$btn_txt='Borrar';
		$leyenda='Eliminar';
	}
	
	
	
    
}

?>

 
<div class="container">
  
<div class="row" >
 
  <div class="col-sm-3" style="background-color: #00FFFF;">
  <div id="capa_d">
   
  <form  role="form" method="POST" action="<?php echo $accion;?>">
  <legend><?php echo $leyenda;?></legend>
     <?php 
	 if (isset($operacion)){
			if ($operacion == 'edicion' || $operacion == 'baja' ) {
			    /*echo $nombre;*/
				?>
				<label for="id_usuario" >ID:</label>
				<input id="id_est" name="id_est" type="text" class="form-control" disabled value="<?php echo $id; ?>"/>
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
				 <?php
				 if($sexo=='Masculino'){
				  $ch_m="checked";$ch_f="";
				 }
				 if($sexo=='Femenino'){
				  $ch_m="";$ch_f="checked";
				 }
				 
				 ?>
				  <input type="radio" name="txtSexo" id="sexo_1" value="Femenino" <?php echo $ch_f; ?>>
				  Femenino
			     </label>
			    </div>			  
			    <div class="radio">
			     <label>
				  <input type="radio" name="txtSexo" id="sexo_2" value="Masculino"  <?php echo $ch_m; ?>>
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
				   <select class="form-control" name="txtCarrera" >
				      <option><?php echo $carrera; ?></option>
					  <option>Software</option>
					  <option>Multimedia</option>
					  <option>Redes</option>
					  <option>Mecatronica</option>
				   </select>
			 </div>   
			</div>  
	 </div>
		 
  
  <button method="post" type="submit" class="btn btn-default" ><?php echo $btn_txt;?></button>
   
  </form>
  </div>
  </div>
  

</div>
</div>
