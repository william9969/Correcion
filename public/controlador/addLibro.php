<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Libro</title>
    <link href="../vista/CSS/link.css" type="text/css"  rel="stylesheet" />
</head>
<body>
    <section>
        <?php
        //incluir conexión a la base de datos
        include '../../Controlador/conexion.php';
        $libNom = isset($_POST["nombreLib"]) ? trim($_POST["nombreLib"]) : null;
        $libISBN = isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
        $libNPag = isset($_POST["npaginas"]) ? mb_strtoupper(trim($_POST["npaginas"]), 'UTF-8') : null;
        $capNum = isset($_POST["ncaputilos"]) ? mb_strtoupper(trim($_POST["ncaputilos"]), 'UTF-8') : null;
        $capTitu = isset($_POST["tcapitulos"]) ? mb_strtoupper(trim($_POST["tcapitulos"]), 'UTF-8') : null;
        $autCod = isset($_POST["codAutor"]) ? trim($_POST["codAutor"]): null;



        $sql = "INSERT INTO libro VALUES (0, '$libNom', '$libISBN', '$libNPag')";
        $res = $conn->query($sql);
        $id_Lib=mysqli_insert_id($conn);

        if ($res === TRUE) {
            $sqlQ = "INSERT INTO capitulos VALUES (0, '$capNum ', '$capTitu',$id_Lib , '$autCod')";
            $resS = $conn->query($sqlQ);
            echo "<h1>Agregado Correctamente </h1>";
    } else {
            if($conn->errno == 1062){
                echo "<h1>El libro no se pudo registar </h1>";
            }else{
                echo "<h1>Error: " . mysqli_error($conn) . "</h1>";
            }
        }

        //cerrar la base de datos
        $conn->close();
        echo "<a href=../vista/addCapitulo.html>Nuevo Capitulo</a>";
        echo "<a href=../vista/principal.html>Salir </a>";

        ?>
     </section>
</body>
</html>