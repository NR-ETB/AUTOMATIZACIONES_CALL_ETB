<?php
include('../../../Model/conexion.php'); // Ya existe al principio

// Verificar si se han enviado los datos del formulario para registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['names']) && isset($_POST['email']) && isset($_POST['cel']) && isset($_POST['pass']) && isset($_POST['priv'])) {
    // Obtener los datos del formulario
    $user = $_POST['user'];
    $names = $_POST['names'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];
    $pass = $_POST['pass'];
    $priv = $_POST['priv']; // Privilegio ("si" o "no")

    // Establecer el rol basado en la selección de privilegios
    if ($priv == "SI") {
        // Si el privilegio es "si", asignamos el rol de "Administrador"
        $rol = "Administrador";
    } else if ($priv == "NO") {
        // Si el privilegio es "no", asignamos el rol de "Asesor"
        $rol = "Asesor";
    } else {
        // Si no se selecciona un valor válido, asignamos un rol por defecto (puedes cambiar esto si es necesario)
        $rol = "Asesor";
    }

    // Obtener el ID del rol correspondiente desde la tabla `rol`
    $sql_rol = "SELECT id_Rol FROM rol WHERE cat_Rol = ?";
    $stmt_rol = $conn->prepare($sql_rol);
    $stmt_rol->bind_param("s", $rol);  // "s" porque el parámetro es una cadena de texto (nombre del rol)
    
    // Ejecutar la consulta para obtener el id_Rol
    $stmt_rol->execute();
    $stmt_rol->store_result();
    
    // Verificar si el rol existe y obtener el ID
    if ($stmt_rol->num_rows > 0) {
        $stmt_rol->bind_result($id_Rol);
        $stmt_rol->fetch();
    } else {
        // Si el rol no existe, mostramos un error
        $error = "El rol seleccionado no existe.";
        $stmt_rol->close();
        $conn->close();
        die($error);
    }

    // Ahora que tenemos el `id_Rol`, preparamos la consulta para insertar el usuario
    $sql_insert = "INSERT INTO usuario (id_Rol, con_Usu, nom_Usu, ema_Usu, tel_Usu, usu_Usu) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssssss", $id_Rol, $pass, $names, $email, $cel, $user);  // Bind de los parámetros

    // Ejecutar la consulta de inserción
    if ($stmt_insert->execute()) {
        // Redireccionar o mostrar mensaje de éxito
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Mostrar mensaje de error si la inserción falla
        $error = "Error al registrar el usuario: " . $stmt_insert->error;
        echo $error;
    }

    // Cerrar la conexión y liberar los recursos
    $stmt_insert->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/comp2.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Crear Cuenta Medio Administrador</title>
</head>
<body>

<?php include('../../components/dashboard_AdminPriv.php'); ?>

<div class="container-general">
    <div class="label1">
    <div class="bc" id="imgcontgen">

<img src="View/images/media/bcetb.jpg" alt="">

</div>

    <div class="sideright-container" id="contgen2">

        <div>

            <form  class="icon-content2" id="createAccountForm" action="" method="POST">
                <div class="item" style="position: relative; bottom: 140px;">
                    <img class="icons" src="../../images/icons/user.png" alt="">
                    <h3 class="text" style="left: 0px; top: 5px;">Usuario</h3>
                    <input id="username" name="user" style="right: 100px;" type="text" placeholder="Ingresa tu nombre de usuario" required>
                </div>

                <div class="item" style="position: relative; bottom: 100px;">
                    <img class="icons" src="../../images/icons/me.png" alt="">
                    <h3 class="text" style="left: 0px; top: 5px;">Nombre Completo</h3>
                    <input id="names" name="names" style="right: 230px;" type="text" placeholder="Ingresa tu nombre completo" required>
                </div>

                <div class="item" style="position: relative; bottom: 60px;">
                    <img class="icons" src="../../images/icons/phone.png" alt="">
                    <h3 class="text" style="left: 0px; top: 5px;">Celular</h3>
                    <input id="cel" name="cel" style="right: 90px;" type="number" placeholder="Ingresa tu numero de celular" required>
                </div>

                <div class="item" style="position: relative; bottom: 20px;">
                    <img class="icons" src="../../images/icons/email.png" alt="">
                    <h3 class="text" style="left: 0px; top: 5px;">Email</h3>
                    <input id="email" name="email" style="right: 70px;" type="text" placeholder="Ingresa tu correo" required>
                </div>

                <div class="item" style="position: relative; top: 20px;">
                    <img class="icons" src="../../images/icons/lock.png" alt="">
                    <h3 class="text" style="left: 0px; top: 5px;">Contraseña</h3>
                    <input id="password" name="pass" style="right: 150px;" type="password" placeholder="*****************" required>
                </div>

                <div class="item" style="position: relative; top: 60px;">
                    <img class="icons" src="../../images/icons/priv.png" alt="">
                    <h3 class="text" style="left: 0px; top: 5px;">Privilegios</h3>
                    <select id="password" name="priv" style="right: 130px;" required>
                        <option value="">Selecciona una Opcion...</option>
                        <option value="SI">Si</option>
                        <option value="NO">No</option>
                    </select>
                </div>

                <div class="item" style="position: relative; margin-left: 620px; bottom: 679px;">
                    <button class="log" type="submit">Crear Nueva Cuenta Ahora</button>
                </div>
            </form>

        </div>

        <br>

    </div>

<h4 class="text2">©2024 - ETB <br> (Empresa de Telecomunicaciones de Bogotá)</h4>


    </div>       
</div>

<!-- Modal Loading -->
<div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h6>
            </div>
            <div class="modal-body">
                <div class="con-spiner">
                    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                <div class="text-spiner"><p>Por favor no cierres la página</p></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Loading -->

<script src="../../bootstrap/jquery.js"></script>
<script src="../../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../../Controller/delet.js"></script>   
<script src="../../../Controller/gen.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</body>
</html>
