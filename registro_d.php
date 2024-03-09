<?php
include("libreria/motor.php");

$libro_d = new Libro_d();
if($_POST){
$libro_d->autor=$_POST['txtAutor'];
$libro_d->titulo=$_POST['txtTitulo'];
$libro_d->edicion=$_POST['txtEdicion'];
$libro_d->anio=$_POST['txtAnio'];
$libro_d->origen=$_POST['txtOrigen'];
$libro_d->tipo=$_POST['txtTipo'];
$libro_d->area=$_POST['txtArea'];
$libro_d->materia=$_POST['txtMateria'];
$libro_d->comentario=$_POST['txtComentario'];
$libro_d->archivo=$_POST['txtArchivo'];
$target_dir = "libros_d/";
$noticia=$_POST['txtArchivo'].".pdf";
$target_file = $target_dir.$noticia;

// Allow certain file formats

if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
   } else {
     echo "No pudo subirse el archivo ".$noticia." en ".$target_file;
   }


$libro_d->guardar();
header("Location:registro_d.php");
}
include("index.php");
?>

<!DOCTYPE html>
<html lang="es">
 <head>
   <title>Formulario De Registro De Publicaciones Digitales</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/estilos.css" rel="stylesheet">
 </head>
 <body>
 <div class="container">
   <form  role="form" method="POST" action="">
   <legend>Registro Publicaciones Digitales</legend>
   <div class="row">
   
	 <div class="form-group">
	 <div class="col-xs-5">
	   <label for="ejemplo_apellido">Autor</label>
	   <input type="text"  size="20" name="txtAutor" class="form-control" id="aut_nombre"
			   placeholder="nombre del Autor">
	 </div>
    
	 <div class="col-xs-5">
	  <label for="ejemplo_nombre">Titulo</label>
	  <input type="text"  size="20" name="txtTitulo" class="form-control" id="tit_nombre"
			   placeholder="Nombre de la publicacion">
	 </div>		   
	 </div> 
   
	 
	 
	  <div class="form-group">
	  <div class="col-xs-3">
		<label for="ejemplo_Matricula">Idioma</label>
		<input type="text"  size="10" name="txtOrigen" class="form-control" id="tit_origen"
			   placeholder="Origen de la edición">
		</div>	   
	   </div> 
	   
	    <div class="form-group">
	  <div class="col-xs-3">
		<label for="ejemplo_Matricula">Año de Publicación</label>
		<input type="text"  size="10" name="txtAnio" class="form-control" id="tit_anio"
			   placeholder="Año de la edición">
		</div>	   
	   </div> 
	  
	  <div class="form-group">
	  <div class="col-xs-3">
		<label for="ejemplo_Matricula">Edicion</label>
		<input type="text"  size="10" name="txtEdicion" class="form-control" id="tit_edicion"
			   placeholder="Detalles de la edición">
		</div>	   
	   </div> 
  
	 <div  class="form-group">  
     <div class="col-xs-5">	 
	 <label>Tipo</label>
	   <select class="form-control" name="txtTipo">
	   
		  <option>Libro</option>
		  <option>Revista</option>
		  <option>Video</option>
		  <option>Otros</option>
	   </select>
	 </div>  
	 </div>   
	 
	 
	 <div class="form-group">
	 <div class="col-xs-3">
		<label for="ejemplo_Direccion">Area</label>
		<input type="text"  size="20" name="txtArea" class="form-control" id="tit_Area"
			   placeholder="">
	  </div> 
	  </div> 
      <div class="form-group">
	  <div class="col-xs-5">
		<label for="ejemplo_Telefono">Materia</label>
		<input type="text"  size="20" name="txtMateria" class="form-control" id="tit_Materia"
			   placeholder="">
	  </div>	   
	  </div>
	  
	  <div class="form-group">
	  <div class="col-xs-8">
		<label for="ejemplo_Observaciones">Comentario</label>
		<input type="text"  size="40" name="txtComentario" class="form-control" id="tit_Comentario"
			   placeholder="">
	  </div>		   
	  </div>
	   
	   <div class="form-group">
	  <div class="col-xs-8">
		<label for="ejemplo_Observaciones">Archivo</label>
		<input type="text"  size="40" name="txtArchivo" class="form-control" id="tit_Archivo"
			   placeholder="">
		<label class="btn btn-primary btn-file">Elegir archivo<input type="file" style="display:none;" name="archivo" id="archivo">
</label><br><label id="nombrearchivo"></label>
	  </div>		   
	  </div>
	   
	   </div>

 <button method="post" type="submit" class="btn btn-default">Agregar</button>

	 </form>   
</div>

</body>

</html>
