<?php
    // Se utiliza la ruta de la coneccion a la base de datos
    include('conexion.php');

    if(isset($_POST['votar'])) {
        // Validacion del campo nombre, que a lo menos contenga 1 caracter
        if(strlen($_POST ['name'] >= 1)){
            // Obtener valores de los campos del formulario 
            $name = trim($_POST['name']);
            $alias = trim($_POST['alias']);
            $rut = trim($_POST['rut']);
            $email = trim($_POST['email']);
            $region = trim($_POST['region']);
            $comuna = trim($_POST['comuna']);
            $candidato = trim($_POST['candidato']);
            $comoseentero = trim($_POST['comoseentero']);

            //Control de error numerico regiones ya que solo se envia la id mediante POST
            if($region == 1){
                $region = 'Arica y Parinacota';
            }
            if($region == 2){
                $region = 'Tarapacá';
            }
            if($region == 3){
                $region = 'Antofagasta';
            }
            if($region == 4){
                $region = 'Atacama';
            }
            if($region == 5){
                $region = 'Coquimbo';
            }
            if($region == 6){
                $region = 'Valparaíso';
            }
            if($region == 7){
                $region = 'Bernardo O’Higgins';
            }
            if($region == 8){
                $region = 'Maule';
            }
            if($region == 9){
                $region = 'Metropolitana de Santiago';
            }
            if($region == 10){
                $region = 'Ñuble';
            }
            if($region == 11){
                $region = 'Biobío';
            }
            if($region == 12){
                $region = 'Araucanía';
            }
            if($region == 13){
                $region = 'Los Ríos';
            }
            if($region == 14){
                $region = 'Los Lagos';
            }
            if($region == 15){
                $region = 'Aisén';
            }
            if($region == 16){
                $region = 'Magallanes';
            }


            // consulta a BD para insertar los datos
            $consulta = "INSERT INTO registro(nombre_apellido,alias,rut,email,region,comuna,candidato,nosotros)
                VALUES('$name','$alias','$rut','$email','$region','$comuna','$candidato','$comoseentero');";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
            // Mensaje exitoso o error al enviar datos del formulario
                ?>
                <h2 class="success">Formulario de votación enviado exitosamente!</h2>
                <?php
            }else{
                ?>
                <h2 class="error">Error!</h2>
                <?php
            }
        }else{
            ?>
            <h2 class="error">CAMPOS VACIOS</h2>
            <?php
        }
    }
?>