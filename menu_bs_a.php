<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
 <head>
   <title>BASES PWD</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <!---
   <script src="bootstrap/js/funciones_e.js"></script>
   <script src="bootstrap/js/funciones_d.js"></script>
   --->
   
 </head>
 <body style="padding: 0px 10px 0px 10px;">
 <div class="container-fluid" >
   <nav class="navbar navbar-inverse navbar-static-top" role="navigation" >
    
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
		
		<li><a href="abm_ld.php">Libros</a></li>
		<li><a href="abm_e.php">Estudiantes</a></li>
      
	  
	  </ul>
	  <ul class="nav navbar-nav navbar-right" style="padding-right: 10px;">
      <span><?php echo $_SESSION['rol'] .' : '. $_SESSION['username'];?></span>  
      
<?php
	  if (!isset($_SESSION['username'])){
        echo '	  
	        <li><a href="login.php" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             ';
		  }	 
	  else{
	    echo '	  
	        <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             ';
	       }
?>		   
	</ul>
	  
	  
	 
	 
   </nav>
 </div>
 
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

