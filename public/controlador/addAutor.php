<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Autor</title>
    <link href="../vista/CSS/link.css" type="text/css"  rel="stylesheet" />
</head>
<body>
    <section>
        <?php
        include '../../controlador/conexion.php';
        $nomAut = isset($_POST["nombreAut"]) ? trim($_POST["nombreAut"]) : null;
        $nacAut = isset($_POST["nacAut"]) ? mb_strtoupper(trim($_POST["nacAut"]), 'UTF-8') : null;
        $sql = "INSERT INTO autor VALUES (0, '$nomAut','$nacAut ')";
        $res = $conn->query($sql);
        $id_user=mysqli_insert_id($conn);
        if ($res === TRUE) {
            echo "<h1>Autor Agregado Correctamemte!!!</h1>";
        }
        else {
            echo "<h1>Error: No se ah podido agregar</h1>";
        }
        $conn->close();
        header("Location: ../vista/addAutor.html");
        ?>
     </section>
</body>
</html>