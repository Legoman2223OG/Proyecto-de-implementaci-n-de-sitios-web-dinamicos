<?php
include_once("libreria/motor.php");
include_once("libreria/libro_d.php");

function log_to_console($msg)
{
    echo "<script> console.log('$msg'); </script>";
}

$datos = new Libro_d();
$libro_d = new Libro_d();

include("menu_bs.php");

$operacion = '';
$id_libro = '';
$autor = '';
$titulo = '';
$edicion = '';
$anio = '';
$origen = '';
$tipo = '';
$area = '';
$materia = '';
$comentario = '';
$archivo = '';

echo '
<script>
 
function PonerNombreArchivo(){
    var x = document.getElementById("fileToUpload");
    var txt = "";
    var file = x.files[0];
                
    txt = file.name ;
           
    document.getElementById("t_file").value = txt;
}
</script>
';

if (!empty($_POST)) {
    log_to_console(str_replace("\n", " ", print_r($_POST, true)));
    log_to_console(str_replace("\n", " ", print_r($_GET, true)));
    $operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	//echo $operacion;
	if ($operacion == 'alta' && !isset($_GET['id_lib'])){
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
		$libro_d->guardar($objConexion->enlace);
	}
	if ($operacion == 'actualizar' && isset($_GET['id_lib'])){
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
		
		$libro_d->actualizar($objConexion->enlace,$_GET['id_lib']);
	}
	if ($operacion == 'borrar' && isset($_GET['id_lib'])){
	    //echo '3-eliminar';
		$libro_d->borrar($objConexion->enlace,$_GET['id_lib']);
	}
    if ($operacion == 'edicion' && isset($_GET['id_lib'])) {
        //echo '3-edicion';
        
        $id = $_GET['id_lib'];

        $A=libro_d::traer_datos($objConexion->enlace,$id);

        $autor=$A['autor'];
		$titulo=$A['titulo'];
		$edicion=$A['edicion'];
		$anio=$A['año'];
		$origen=$A['origen'];
		$tipo=$A['tipo'];
		$area=$A['area'];
		$materia=$A['materia'];
		$comentario=$A['comentario'];
		$archivo=$A['archivo'];

		//$accion=$_SERVER['HTTP_REFERER'].'?operacion=actualizar&id_lib='. $id;
		//$btn_txt='Actualizar';
		//$leyenda='Modificar datos ';
    }

    if ($operacion == 'prestar' && isset($_GET['id_lib']))
    {
        $magnitud;
        switch($_POST['magnitud_tiempo'])
        {
            case "dia":
                $magnitud = "D";
                break;
            case "semana":
                $magnitud = "W";
                break;
            case "mes":
                $magnitud = "M";
                break;
            
            }
        $fecha_devolucion = (new DateTime())->add(new DateInterval("P{$_POST['cantidad_tiempo']}$magnitud"))->format("Y-m-d");
        $query1 = "UPDATE libros_d SET prestado = 1 WHERE libros_d.id_libro = {$_GET['id_lib']}";
        $query2 = "INSERT INTO prestamos_libros(fecha_devolucion, libro_prestado, receptor_prestamo) VALUES ('$fecha_devolucion', {$_GET['id_lib']}, {$_POST['receptor']})";

        mysqli_query($objConexion->enlace, $query1);
        mysqli_query($objConexion->enlace, $query2);
    }
}

?>
<script src="bootstrap/js/funciones_d.js"></script>
<link rel="stylesheet" href="bootstrap/css/estilos.css">
<div class="container-fluid">
   <nav class="navbar navbar-default " role="navigation" >
    
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
	  <span style="padding-right: 20px;font-weight: bold;">Publicaciones Digitales</span>
	  <?php 
		if (isset($_SESSION['username']) && $_SESSION['rol']=='administrador'){
		 echo '<button type="button" class="btn btn-primary  btn-sm"   onclick="cargar(\'#capa_d\',\'alta_d.php\')">Alta</button>';
	    
		}
	  ?>
       
	  </ul>      
      
      
	  
	  
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
        <input type="text"  id="txt_b_d" placeholder="Buscar" style="position: absolute;right: 100px;" >
		<button type="button" id="btn_b_d" class="btn btn-primary btn-sm" style="position: absolute;right: 20px;">Buscar</button>
      </ul>
	 
	   
     
	 </div> 
	 
   </nav>
 </div>


<div class="row">
 
  <div class="col-sm-6">
  <div id="capa_d">
  
  </div>
  </div>
  
  <div class="col-sm-6">
  <div id="capa_L">	
  
	    </div>
</div>



</div>
</div>
</body>

</html>