<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link href="CSS/listar.css" type="text/css"  rel="stylesheet" />
</head>
<body>
    <header>
            <div class="principal">
                <a href="principal.html"><img id="prin" src="Imagenes/lib.jpg"/></a>
            </div>
            <div class="opciones">
                <a href="addAutor.html"><img id="men" src="Imagenes/anadir.png" alt = ""/></a>
                <a href="addLib.html"><img id="men1" src="Imagenes/addLibro.png" alt = ""/></a>
                <a href="listarLib.php"><img id="men2" src="Imagenes/listar.png" /></a>
            </div>
    </header>
    
    
    <?php
    include '../../Controlador/conexion.php';
    $sql = "SELECT * FROM libro";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           echo "<section>";
           echo "<h1> Libro: ".$row["libNombre"]."<h1>";
           echo "<h3>ISBN Libro: <h3>";
           echo "<p>".$row["libISBN"]."<p>";
           echo "<br>";
           echo "<h3>Numero de Paginas: <h3>";
           echo "<p>".$row["libNPaginas"]."<p>";
           $sqlL = "SELECT * FROM libro";
           $cod_libro=$row["libCodigo"];
            $sqlC = "SELECT * FROM capitulos WHERE capLibCod='$cod_libro'";
            $resultC = $conn->query($sqlC);
            if ($resultC->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                    <th>Numero de Capitulo</th>
                    <th>Titulo del Capitulo</th>
                    <th>Nombre del Autor</th>
                    <th>Nacionalidad</th>
                </tr>";
                while($rowC = $resultC->fetch_assoc()) {
                    $sqlCap = "SELECT capAutCod FROM capitulos WHERE capLibCod='$cod_libro'";
                    $cod_Aut=array_values(mysqli_fetch_array( $conn->query($sqlCap)))[0];
                    $sqlA = "SELECT * FROM autor WHERE autCodigo='$cod_Aut'";
                    $resultA = $conn->query($sqlA);
                    $rowA = $resultA->fetch_assoc();
                    echo "<tr>";
                    echo " <td>" . $rowC['capNumero'] . "</td>";
                    echo " <td>" . $rowC['capTitulo'] ."</td>";
                    echo  "<td>" . $rowA['autNombre'] ."</td>";
                    echo  "<td>" . $rowA['autNacionalidad'] ."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }


           echo "</section>";
          }
       }
    $conn->close(); 
     ?>
</body>
</html>