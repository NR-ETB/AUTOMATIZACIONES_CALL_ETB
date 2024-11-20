<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/comp2.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Crear Nuevo/Eliminar</title>
</head>
<body>

    <?php
        include('../components/dashboard_Admin.php');
    ?>

    <div class="container-general">

        <div class="delete" onclick="btn_dase();">
            <div class="inf">
                <img src="../images/icons/delete_2.png" alt="">
                <h1>Eliminar Cuenta ASESOR</h1>
            </div>
            <p>Cuando se selecciona esta opcion, el <span>ADMINISTRADOR</span>, tiene la opcion de <span>ELIMINAR</span> la cuenta del <span>ASESOR</span> a seleccionar.</p>
        </div>

        <div class="delete" onclick="btn_dcli();">
            <div class="inf">
                <img src="../images/icons/delete_2.png" alt="">
                <h1>Eliminar Cuenta CLIENTE</h1>
            </div>
            <p>Cuando se selecciona esta opcion, el <span>ADMINISTRADOR</span>, tiene la opcion de <span>ELIMINAR</span> a un <span>CLIENTE</span> registrado en la base de datos.</p>
        </div>

        <div class="delete" onclick="btn_caco();">
            <div class="inf">
                <img src="../images/icons/user_2.png" alt="">
                <h1>Crear un NUEVO ASESOR</h1>
            </div>
            <p>Cuando se selecciona esta opcion, el <span>ADMINISTRADOR</span>, tiene la opcion de <span>CREAR</span> una nueva cuenta con el rol de <span>ASESOR</span> y se registrara en la base de datos.</p>
        </div>
    </div>

    <!-- Modal Loading -->
    <div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h6>
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

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/delet.js"></script> 
<script src="../../Controller/gen.js"></script> 

</body>
</html>
