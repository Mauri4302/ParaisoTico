<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . "/ParaisoTico/Model/DBConexionModel.php";
session_start();  

if (isset($_POST["btnIniciarSesion"])) {
    $correo = $_POST["email"];  
    $contrasenna = $_POST["password"];  

    $resultado = IniciarSesionModel($correo);

    if ($resultado != null && $resultado->num_rows > 0) {
        $datos = mysqli_fetch_assoc($resultado);

        // Comparar contraseñas en texto plano
        if ($contrasenna == $datos["password"]) {
            $_SESSION["IdUsuario"] = $datos["id_usuario"];
            $_SESSION["CorreoUsuario"] = $datos["correo"];
            $_SESSION["NombreUsuario"] = $datos["nombre"] . " " . $datos["primer_apellido"]; 

            header('Location: ../View/Login/home.php');
            exit();
        } else {
            $_SESSION["Message"] = "Correo o contraseña incorrectos.";
            header('Location: ../View/Login/login.php');
            exit();
        }
    } else {
        $_SESSION["Message"] = "Correo o contraseña incorrectos.";
        header('Location: ../View/Login/login.php');
        exit();
    }
}

function IniciarSesionModel($correo) {
    $conexion = AbrirBaseDatos();  

    $consulta = $conexion->prepare("SELECT id_usuario, password, nombre, primer_apellido, correo FROM usuario WHERE correo = ?");
    $consulta->bind_param("s", $correo);
    $consulta->execute();
    $resultado = $consulta->get_result();

    CerrarBaseDatos($conexion);  
    return $resultado;
}
?>

