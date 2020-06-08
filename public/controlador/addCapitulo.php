<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Capitulo</title>
    <link href="../vista/CSS/link.css" type="text/css"  rel="stylesheet" />
</head>
<body>
    <section>
        <?php
        //incluir conexión a la base de datos
        include '../../Controlador/conexion.php';
        $capNum = isset($_POST["ncaputilos"]) ? mb_strtoupper(trim($_POST["ncaputilos"]), 'UTF-8') : null;
        $capTitu = isset($_POST["tcapitulos"]) ? mb_strtoupper(trim($_POST["tcapitulos"]), 'UTF-8') : null;
        $autCod = isset($_POST["codAutor"]) ? trim($_POST["codAutor"]): null;

        $rs = "SELECT MAX(libCodigo) FROM libro";
        $res = $conn->query($rs);

        if ($res->num_rows > 0) {   
            $id=array_values(mysqli_fetch_array( $conn->query($rs)))[0];
            $sqlQ = "INSERT INTO capitulos VALUES (0, '$capNum ', '$capTitu',$id, '$autCod')";
            $resS = $conn->query($sqlQ);
            echo "<h1>Agregado Correctamente</h1>";
    } else {
            if($conn->errno == 1062){
                echo "<h1>El Ca`pitulo no se pudo registar </h1>";
            }else{
                echo "<h1>Error: " . mysqli_error($conn) . "</h1>";
            }
        }

        //cerrar la base de datos
        $conn->close();
        echo "<a href=../vista/addCapitulo.html>Nuevo Capitulo </a>";
        echo "<a href=../vista/principal.html>Salir </a>";

        ?>
     </section>
</body>
</html>