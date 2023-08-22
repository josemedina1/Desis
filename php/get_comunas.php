<?php
if (isset($_GET['region_id'])) {
    $regionId = $_GET['region_id'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "desis";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener las comunas según la región seleccionada
    $sqlComunas = "SELECT * FROM comunas WHERE id_region = $regionId";
    $resultComunas = $conn->query($sqlComunas);

    // Generar las opciones de las comunas
    if ($resultComunas->num_rows > 0) {
        while ($row = $resultComunas->fetch_assoc()) {
            echo '<option  value="' . $row['comuna'] . '">' . $row['comuna'] . '</option>';
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
