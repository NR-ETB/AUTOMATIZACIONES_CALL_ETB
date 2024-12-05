<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_line.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion Telefonica - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2">

        <h1 id="cod">VALIDA PLATAFORMAS SUMA</h1>

        <div class="body-card" style="height: 290px;">
            <div class="question_1">
                <textarea id="que2" style="height: 280px;" disabled>Envíame foto del microfiltro por favor, 📸 el microfiltro normalmente es una caja pequeña color blanco o beige. 📞

Valida si el cable de la línea está conectado en un puerto que tiene el símbolo de teléfono 📞 desconecta el cable del microfiltro y conéctalo de forma directa a la caja que está en la pared (punto fijo) 🧐
                </textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Confírmame si ya te funciona la línea telefónica?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="actualizarTexto()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

            <div class="bot">
                <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
            </div>

    </div>

    <div class="bio2" id="bio2">
        <div class="data">
            <h3>Nombre:</h3>
            <input type="text">
        </div>

        <div class="data2">
            <h3>Dato:</h3>
            <input type="text">
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
<script src="../../Controller/line/line2.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>