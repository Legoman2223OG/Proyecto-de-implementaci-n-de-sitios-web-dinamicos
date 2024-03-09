<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
 <head>
   <title>BASES PWD</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
   <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <script src="bootstrap/js/funciones_gral.js"></script>
   <link rel="stylesheet" href="bootstrap/css/style_chat.css" media="all"/>	
   <link rel="stylesheet" href="bootstrap/ui/jquery-ui.css">
   <link rel="stylesheet" href="bootstrap/cust.css">
   <script src="bootstrap/ui/jquery-ui.js"></script>

     
   <!-----https://sourcecodesite.com/how-to-create-chat-system-in-php-using-ajax-2.html--->
   <!--Include Custom CSS-->
   <!---
   <script src="bootstrap/js/funciones_e.js"></script>
   <script src="bootstrap/js/funciones_d.js"></script>
   --->
   <script>

   function cargar(div,desde)
   {
   $(div).load(desde);
   } 
   </script>
   <script>
   function poner_nombre(div,nombre)
   {
   $(div).text(nombre);
   } 
   </script>
   <style>
pre {
    display: block;
    font-family: arial;
    white-space: pre;
    margin: 2em 0;
} 
#background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('images/Diseño sin título.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 0.6;
    filter:alpha(opacity=80);
}
</style>
 </head>
 <script>
    $(document).ready(function (e) {
      var conn = new WebSocket("ws://localhost:9000");
      
      var getusuario = $("#sessionusuario").text().split(" | ");
      conn.onopen = function (e) { //si la conexion es existossa
      console.log(e.data);
      console.log("Iniciado");
      if(getusuario[0] == "" && getusuario[1] == "")
      {
        var role = "Indefinido";
        var name = "Anonimo";
        var datos = {"usuario": name,"role": role};
        conn.send(JSON.stringify(datos));
      }
      else
      {
        var role = getusuario[0];
        var name = getusuario[1];
        var datos = {"usuario": name,"role": role};
        conn.send(JSON.stringify(datos));
      }
      };
    
      conn.onmessage = function (e) {

          var respuesta = JSON.parse(e.data); //recibimos la respuesta y como es json la parseamos
          if(respuesta.usersize !== undefined){
            console.log(respuesta.usersize);
            $("#usercount").text("Conectados: " + respuesta.usersize);
          }

          if(respuesta.usuario !== undefined || respuesta.role !== undefined)
          {
          console.log("Usuario: " + respuesta.usuario + " Rol: " + respuesta.role);
          if(respuesta.usuario == undefined || respuesta.role == undefined)
          {
            respuesta.usuario = "Anonimo";
            respuesta.role = " ";
          }
          $("#aviso").text(respuesta.role + " " + respuesta.usuario +" ha iniciado sesion");
          }
      

        
      };
      
      conn.onclose = function(e){
        console.log("Adios");
      };

    });
</script>
 <!-----body style="padding: 0px 0px 0px 0px;background-image: url(images/b_bkg_4.jpg);" onload="cargar('#capa_P','txts/init_1.html');cargar('#capa_C','txts/init_2.html')"---->
 <body style="padding: 0px 0px 0px 0px;"  >
  <div id="background"></div>
 <div class="container-fluid" >
 
   <nav class="navbar navbar-inverse navbar-static-top navbar2" role="navigation" >
    
      <ul class="nav navbar-nav ">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
		<li><a href="cartelera.php">Cartelera</a></li>
		<li><a href="abm_ld.php">Libros</a></li>
		<?php 
		if (isset($_SESSION['username']) && $_SESSION['rol']=='administrador'){
		 echo '<li><a href="abm_p.php">Usuarios</a></li>';
		 echo '<li><a href="abm_c.php">Carteles</a></li>';
     echo '<li><a href="prestamos.php">Prestamos</a></li>';
		}
		?>
    
          <li><a href="nuevo.php">Ayuda</a></li>
	  
	  
	  </ul>
	  <ul class="nav navbar-nav navbar-right" style="padding-right: 10px;">
      
	  <?php 
    if(isset($_SESSION['username']) && $_SESSION['rol']=='administrador'){
      echo ' <p id="usercount" style="float:left;padding-right:40px">Conectados: 0</p>';
      echo ' <p id="aviso" style="float:left;padding-right:40px"></p>';
    }
	  if (isset($_SESSION['username'])) {
	  echo ' <li id="sessionusuario" "class="navbar-brand">'.$_SESSION['rol'].' | '.$_SESSION['username'].'</li>'; 
      }
	  ?>
	  
      
<?php
	  if (!isset($_SESSION['username'])){
	    echo '	  
	        <li><a href="registro.php"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
             ';
        echo '	  
	        <li><a href="login.php" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             ';
		  }	 
	  else{
	    echo '	  
		    <li><a href="i_chat.php">Chat</a></li>
	        <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             ';
	       }
         
?>		   
	</ul>
	  
	  
	 
	 
   </nav>
  

  
  
 
  
 <!-- Modal -->
 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



</div>

 
</body>
