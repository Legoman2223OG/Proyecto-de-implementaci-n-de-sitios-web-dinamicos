<script src="bootstrap/js/jquery-3.1.0.min.js"></script>
<?php
include("menu_bs.php");
include("libreria/motor.php");
echo'
<style>
table,
th,
td
{
border-style: solid;
border-width: 1px;
background-color: white;
border-collapse: separate;
}
th,td{
    padding-left: 7px;
    padding-right: 7px;
    padding-top: 7px;
    padding-bottom: 7px;
}
input{
    border-style:solid;
    border-width:thin;
}
</style>
<div class="container-fluid" id="capa_T">
    <div class="row">
        <div class="col-sm-3">
            <div id="capa_d">
                <H3>BIBLIOTECA T1</H3>
                <H4>Prestamos</H4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <table>
                <tr>
                    <th>id prestamo</th>
                    <th>id estudiante</th>
                    <th>nombre estudiante</th>
                    <th>id libro</th>
                    <th>titulo libro</th>
                    <th>fecha retiro</th>
                    <th>fecha entrega</th>
                    <th>opciones</th>
                </tr>
';

$resultado = mysqli_query($objConexion->enlace,"SELECT * FROM prestamos");
while($row = $resultado-> fetch_assoc())
{
    echo"<tr id='trdatos".$row['id_prestamo']."'>";
    echo"<td>".$row['id_prestamo']."</td>";
    echo"<td>".$row['id_estudiante']."</td>";
    $queryestudiante = "SELECT nombre FROM estudiante WHERE id =".$row['id_estudiante']."";
    $nombreestudiante = mysqli_query($objConexion->enlace,$queryestudiante)-> fetch_assoc();
    echo"<td>".$nombreestudiante['nombre']."</td>";
    echo"<td>".$row['id_libro']."</td>";
    $querynombrelibro = "SELECT Titulo FROM libros_d WHERE id_libro=".$row['id_libro']."";
    $titulolibro = mysqli_query($objConexion->enlace,$querynombrelibro)-> fetch_assoc();
    echo"<td>".$titulolibro['Titulo']."</td>";
    echo"<td>".$row['id_libro']."</td>";
    echo"<td>".$row['fecha_retiro']."</td>";
    echo"<td>".$row['fecha_entrega']."</td>";
    echo"<td> <button"." onclick='editarRow(".$row['id_prestamo'].")"."' style='background-color: lightgreen;'>Editar</button> <form method='post' name='borrardatos'> <button"." value='".$row['id_prestamo']."'"." style='background-color: red;' name='botoneliminar'>Eliminar</button> </form> </td>";
    echo"</tr>";
}
echo'
</table>
</div>
</div>
<div class="row" style="padding-top: 9px; visibility: hidden;">
    <div class="col-sm-3">
        <div class="modificar">
            <table>
                <tr>
                    <th>id prestamo</th>
                    <th>id estudiante</th>
                    <th>id libro</th>
                    <th>fecha retiro</th>
                    <th>fecha entrega</th>
                    <th>actualizar</th>
                </tr>
                <tr>';
echo '
<form method="post" name="modificarprestamo">
<td><input id="modificaridprestamo" name="modidprestamo"></td>
<td><input id="modificaridestudiante" type="number" name="modidestudiante"></td>
<td><input id="modificaridlibro" type="number" name="modidlibro"></td>
<td><input id="modificarfretiro" type="date" name="fecharetiromod"></td>
<td><input id="modificarfentrega" type="date" name="fechaentregamod"></td>
<td><button type="submit" style="background-color: lightgreen;" id="modificarsubir" name="botonsubirupdate">Subir</button></td>
</form>
';
 echo'               
                    </tr>
             </table>
        </div>
    </div>
</div>
</div>
';
echo'
<div class="row" style="padding-top: 9px;">
    <div class="col-sm-3">
        <div class="agregar">
            <table>
                <tr>
                    <th>id estudiante</th>
                    <th>id libro</th>
                    <th>fecha retiro</th>
                    <th>fecha entrega</th>
                    <th>agregar</th>
                </tr>
                <tr>
                    <form method="post" name="agregardatos">
                        <td><input id="agregarestudianteid" type="number" name="estudianteide"></td>
                        <td><input id="agregaridlibro" type="number" name="libroide"></td>
                        <td><input id="agregarfecharetiro" type="date" name="fecharetiroide"></td>
                        <td><input id="agregarfechaentrega" type="date" name="fechaentregaide"></td>
                        <td><button type="submit" style="background-color: lightgreen;" id="subirdatos" name="botonsubirdatos">Subir</button></td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
</div>
';
echo "<script>";
echo'
var editarRow = function(id){
    var idprestamo = id;
    $(".modificar").css("visibility","visible");
    $("#modificaridprestamo").val(parseInt($("#trdatos" + idprestamo).find("td:eq(0)").text()));
    $("#modificaridestudiante").val(parseInt($("#trdatos" + idprestamo).find("td:eq(1)").text()));
    $("#modificaridlibro").val(parseInt($("#trdatos" + idprestamo).find("td:eq(3)").text()));
    $("#modificarfretiro").val(new Date($("#trdatos" + idprestamo).find("td:eq(5)").text()).toLocaleDateString("fr-CA"));
    $("#modificarfentrega").val(new Date($("#trdatos" + idprestamo).find("td:eq(6)").text()).toLocaleDateString("fr-CA"));
}
';

echo "</script>";
if(!empty($_POST['modificarprestamo']) || isset($_POST['botonsubirupdate'])){
    if(mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM estudiante WHERE id=".$_POST['modidestudiante']."")) == 0)
    {
        echo'<p style="padding-left: 400px;color: red;"><b>Este estudiante no existe</b></p>';
        return;
    }
    else if(mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM libros_d WHERE id_libro=".$_POST['modidlibro']."")) == 0)
    {
        echo'<p style="padding-left: 400px;color: red;"><b>Este libro no existe</b></p>';
        return;
    }
    else if(!isset($_POST['fecharetiromod']) || !strtotime($_POST['fecharetiromod']))
    {
        echo'<p style="padding-left: 400px;color: red;"><b>Introduzca una fecha</b></p>';
        return;
    }
    else if(mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM estudiante WHERE id=".$_POST['modidestudiante']."")) > 0 && mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM libros_d WHERE id_libro=".$_POST['modidlibro']."")) > 0)
    {
        $dateuno = $_POST['fecharetiromod'];
        $datedos = $_POST['fechaentregamod'];
        $fechauno = date('Y-m-d',strtotime($dateuno));
        $fechados = date('Y-m-d',strtotime($datedos));
        $query = "UPDATE prestamos SET id_estudiante=".$_POST['modidestudiante'].", id_libro=".$_POST['modidlibro'].", fecha_retiro='".$fechauno."', fecha_entrega='".$fechados."' WHERE id_prestamo=".$_POST['modidprestamo']."";
        mysqli_query($objConexion->enlace,$query);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
if(isset($_POST['botoneliminar']))
{
    $query = "DELETE FROM prestamos WHERE id_prestamo=".$_POST['botoneliminar']."";
    mysqli_query($objConexion->enlace,$query);
    echo "<meta http-equiv='refresh' content='0'>";
}
if(!empty($_POST['agregardatos']) || isset($_POST['botonsubirdatos']))
{
    if(mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM estudiante WHERE id=".$_POST['estudianteide']."")) == 0)
    {
        echo'<p style="padding-left: 400px;color: red;"><b>Este estudiante no existe</b></p>';
        return;
    }
    else if(mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM libros_d WHERE id_libro=".$_POST['libroide']."")) == 0)
    {
        echo'<p style="padding-left: 400px;color: red;"><b>Este libro no existe</b></p>';
        return;
    }
    else if(!isset($_POST['fecharetiroide']) || !strtotime($_POST['fecharetiroide']))
    {
        echo'<p style="padding-left: 400px;color: red;"><b>Introduzca una fecha</b></p>';
        return;
    }
    else if(mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM estudiante WHERE id=".$_POST['estudianteide']."")) > 0 && mysqli_num_rows(mysqli_query($objConexion->enlace,"SELECT * FROM libros_d WHERE id_libro=".$_POST['libroide']."")) > 0)
    {
        $dateuno = $_POST['fecharetiroide'];
        $datedos = $_POST['fechaentregaide'];
        $fechauno = date('Y-m-d',strtotime($dateuno));
        $fechados = date('Y-m-d',strtotime($datedos));
        $query = "INSERT INTO prestamos (id_estudiante,id_libro,fecha_retiro,fecha_entrega) VALUES ('".$_POST['estudianteide']."','".$_POST['libroide']."','".$_POST['fecharetiroide']."','".$_POST['fechaentregaide']."')";
        mysqli_query($objConexion->enlace,$query);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>