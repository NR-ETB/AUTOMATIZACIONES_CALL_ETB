<?php
include('Model/conexion.php');

function verificarUser($username, $password) {
    global $conn;
    // Usar consulta preparada para evitar inyecciones SQL
    $sql = "SELECT * FROM usuario WHERE usu_Usu = ? AND con_Usu = ? AND id_Rol = 3";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay resultados
    return $result->num_rows > 0;
}

function verificarUser_Admin($username, $password) {
    global $conn;
    // Usar consulta preparada para evitar inyecciones SQL
    $sql = "SELECT * FROM usuario WHERE usu_Usu = ? AND con_Usu = ? AND id_Rol <= 2";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay resultados
    return $result->num_rows > 0;
}

// Verificar si se han enviado los datos del formulario para login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (verificarUser($username, $password)) {
        // Redireccionar si el usuario está autenticado
        header("Location: View/monitor/searchMon.php");
        exit();
    } else if (verificarUser_Admin($username, $password)){
        // Redireccionar si el usuario está autenticado
        header("Location: View/monitor_Admin/searchMon.php");
        exit();
    } else {
        // Mostrar mensaje de error si la autenticación falla
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<?php
// Verificar si se han enviado los datos del formulario para registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['names']) && isset($_POST['email']) && isset($_POST['cel']) && isset($_POST['pass'])) {
    // Obtener los datos del formulario
    $user = $_POST['user'];
    $names = $_POST['names'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];
    $pass = $_POST['pass'];

    include('Model/conexion.php'); // Incluir el archivo de conexión a la base de datos

    // Preparar la consulta SQL para insertar un nuevo usuario
    $sql = "INSERT INTO usuario (id_Rol, con_Usu, nom_Usu, ema_Usu, tel_Usu, usu_Usu) VALUES (3, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $pass, $names, $email, $cel, $user); // Bind de los parámetros

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redireccionar o mostrar mensaje de éxito
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Mostrar mensaje de error si la inserción falla
        $error = "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la conexión y liberar los recursos
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/comp.css">
    <link rel="stylesheet" href="View/bootstrap/bootstrap.min.css">
    <title>Agendamiento Instalacion Login</title>
</head>
<body>

<?php
    include('View/components/login.php');
?>

<!-- Modal Loading -->
<div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h5>
            </div>
            <div class="modal-body">
                <div class="con-spiner">
                    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                <div class="text-spiner"><p>Por favor no cierre la pagina</p></div>
            </div>
        </div>
</div>
</div>
<!-- Modal Loading -->

<script src="View/bootstrap/jquery.js"></script>
<script src="View/bootstrap/bootstrap.bundle.min.js"></script>
<script src="Controller/login.js"></script>
</body>
</html>