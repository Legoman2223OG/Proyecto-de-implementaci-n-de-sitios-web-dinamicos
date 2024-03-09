<?php
$tipo = $_POST["tipo"];
$archivo = $_POST["archivo"];
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            switch ($tipo) {
                case "Revista":
                case "Libro Digital":
                case "Libro Fisico":
                    echo "<object data='$archivo' type='application/pdf' width='480' height='500'>";
                    break;
                case "Audio":
                    echo "<audio controls> <source src='$archivo'></audio>";
                    break;
                case "Texto":
                    echo "<object data='$archivo' type='text/html'  width='480' height='500'></object>";
                    break;
                case "Video":
                    echo "<video controls> <source src='$archivo' autostart='false'></video>";
                    break;
                default:
                    echo "<h2>Error: Tipo de archivo invalido.</h2>";
                    break;
            }
            ?>
        </div>
    </div>
</div>