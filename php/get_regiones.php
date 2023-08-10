<?php

$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "desis";

 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
     die("Conexión fallida: " . $conn->connect_error);
 }

 // Consulta para obtener todas las regiones
 $sqlRegiones = "SELECT * FROM regiones";
 $resultRegiones = $conn->query($sqlRegiones);

 // Mostrar opciones para las regiones
 if ($resultRegiones->num_rows > 0) {
     while ($row = $resultRegiones->fetch_assoc()) {
         echo '<option value="' . $row['id'] . '">' . $row['region'] . '</option>';
     }
 }

 // Cerrar la conexión a la base de datos
 $conn->close();
?>