<?php
//include_once("libreria/motor.php");
include_once("libreria/estudiante.php");

$str_b =  $_POST['b'];
//echo $str_b;
$est=Estudiante::buscar($str_b);

?>
<?php
if (isset($est)){
?>

<div class="panel panel-default " >
 
  <div class="panel-heading " >Estudiantes Encontrados</div> 
	<div  style="overflow: scroll;height: 350px;"> 	  
	 <table class="tabla_edicion table table-hover">
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
		   <td>$estudiantes[carrera]</td>";
	  
	     echo '<td><button class="btn btn-primary btn-xs" onclick="editar(' . $estudiantes['id'] . ')" >Editar</button></td>';
		 echo '<td><button class="btn btn-primary btn-xs" onclick="borrar(' . $estudiantes['id'] . ')" >Borrar</button></td>';
         
		  echo " </tr> ";
		   }
	  ?>
	
	  </tbody>
	  
	  </table>
  
	  </div></div>
	  </div>
	 
	  
<?php
}
?>