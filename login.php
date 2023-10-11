<?php 
    date_default_timezone_set('America/Guatemala');

    // Establece los detalles de conexión a la base de datos
    $DB_HOST =$_ENV["DB_HOST"];
    $DB_USER =$_ENV["DB_USER"];
    $DB_PASSWORD =$_ENV["DB_PASSWORD"];
    $DB_NAME =$_ENV["DB_NAME"];
    $DB_PORT =$_ENV["DB_PORT"];
    

    $conexion = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $query = mysqli_query($conexion,"SELECT * FROM tbl_usuario WHERE usuario = '$usuario' and pwd='$password'");
        $nr = mysqli_num_rows($query);

        if($nr == 1){
            $ip = $_SERVER['REMOTE_ADDR'];
            $nombre_equipo = gethostbyaddr($ip);
            $fecha_hora = date('Y-m-d H:i:s');
            $sql = "INSERT INTO auditoria_users (ip, host, fecha_hora) VALUES ('$ip','$nombre_equipo', '$fecha_hora')";
            if ($conexion->query($sql) == TRUE) {
                header("Location: dashboard.php");
            }
        }else{
            echo "usuario y/o contraseña incorrectos";
        }

    }

    

?>