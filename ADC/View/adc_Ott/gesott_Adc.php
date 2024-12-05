<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_line.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion OTT - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2">

        <h1 id="cod">CAMBIO DE CLAVE MIETB</h1>

        <div class="body-card" style="height: 390px;">
            <div class="question_1">
                <textarea id="que2" style="height: 370px;" disabled>Señ@r xxxxx Vamos a generar un cambio de clave de mi etb, y verificas nuevamente
 
Tienes acceso al correo xxxx ?

Valida el correo xxx te llego un mensaje para realizar el cambio de clave recuerda validar bandeja de entrada, correo no deseado y bandeja de spam, generas el cambio de clave. Recuerda no debe ser una clave que anteriormente hayas utilizado</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Confírmame si ya te funciona la línea telefónica?</textarea>
            </div>
        </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="bio2" id="bio2">
        <div class="data" id="dat">
            <h3>Nombre:</h3>
            <input type="text" id="nameInput" oninput="updateAllNames()">
        </div>

        <div class="data2" id="data2">
            <h3>Correo:</h3>
            <input type="text" id="emaInput" oninput="updateAllNames()">
        </div>

        <div class="actin">
            <img id="actionn" src="../images/modal2.png" alt="" onclick="mod();">
            <img src="../images/touch1.png" alt="">
            <img id="actionn" src="../images/pdf2.png" alt="" onclick="man();">
            <img id="actionn" src="../images/copy2.png" alt="" onclick="cop();">
        </div>

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled></textarea>
        </div>
    </div>

</div>

    <!-- Modales -->
    <div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h5>
                </div>
                <div class="modal-body">
                    <div class="con-spiner">
                        <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    </div>
                    <div class="text-spiner"><p>Por favor no cierres la ventana</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-success-sim" tabindex="-1" id="modal-indi">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mas">INDICACIONES DE LA GESTION</h5>
                </div>
                <div class="modal-body" style="text-align: justify;">
                    <p>Resume el procedimiento de gestión siguiendo las respuestas y argumentos proporcionados por el cliente. <br><br> Utiliza el material de ayuda disponible para guiarte en el proceso y asegúrate de estar atento a los guiones, ya que algunos están destinados solo al asesor y otros específicamente al cliente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="left: 0;" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-modal-ps4error">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-success-sim" tabindex="-1" id="modal-re">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mas">RECURSOS DE LA GESTION</h5>
                </div>
                <div class="modal-body" style="width: 650px;">
                    <img src="../images/resources/re1.png" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" style="left: 0;" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-modal-ps4error">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/ott/ott2.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>