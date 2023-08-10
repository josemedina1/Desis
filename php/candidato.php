<?php
$inc = include('conexion.php');
if($inc){
    $consultaCandidato = "SELECT * FROM candidatos";
    $resultado = mysqli_query($conex,$consultaCandidato);
    if($resultado){
        while($row = $resultado->fetch_array()){
            $candidato = $row['candidato'];
            ?> 
                <option > <?php echo $candidato?></option>
            <?php
        }
    }
}

?>