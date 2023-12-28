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
            switch ($region) {
    case 1:
        $region = 'Arica y Parinacota';
        break;
    case 2:
        $region = 'Tarapacá';
        break;
    case 3:
        $region = 'Antofagasta';
        break;
    case 4:
        $region = 'Atacama';
        break;
    case 5:
        $region = 'Coquimbo';
        break;
    case 6:
        $region = 'Valparaíso';
        break;
    case 7:
        $region = 'Bernardo O’Higgins';
        break;
    case 8:
        $region = 'Maule';
        break;
    case 9:
        $region = 'Metropolitana de Santiago';
        break;
    case 10:
        $region = 'Ñuble';
        break;
    case 11:
        $region = 'Biobío';
        break;
    case 12:
        $region = 'Araucanía';
        break;
    case 13:
        $region = 'Los Ríos';
        break;
    case 14:
        $region = 'Los Lagos';
        break;
    case 15:
        $region = 'Aisén';
        break;
    case 16:
        $region = 'Magallanes';
        break;
    default:
        echo 'Selecciona una Comuna';
        break;
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