<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_inter.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion Internet - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2">

        <h1 id="cod">CONECTA – NO NAVEGA: CABLE</h1>

        <div class="body-card" style="height: 680px;">
            <div class="question_1">
                <textarea id="que2" style="height: 790px; font-size: 19px;" disabled>¿La falla se presenta en todos los dispositivos o en algunos? 📱📲

Falla en un solo dispositivo
Valida con tu técnico de confianza

Falla en varios dispositivos
Señor / Señora xxx Reinicia tu Modem 📲 valida la conexión en varios equipos por favor 📱📲💻

Nota: Falla por cable: Descartar equipos conectados en red como router o switch (Diferentes a los entregados por ETB).

Realice Ping a los DNS (200.75.51.132) o a una página y verificar respuesta. Si tiene perdidas

Señor@ vamos a realizar un reaprovisionamiento en su servicio 3 minutos y ya vuelvo contigo ⏳😄

Valida la potencia del modem y si en suma está bien los semáforos

                </textarea>
            </div>
        </div>

        <button onclick="ques2(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest3" style="display: none;">

        <h1 id="cod">CONECTA – NO NAVEGA: CABLE</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" disabled>Acabo de realizar un reaprovisionamiento general a tu red, por favor valida la conexión si ya mejoró ✔️</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="actualizarTexto()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques3(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod">CONECTA – NO NAVEGA: CABLE</h1>

        <div class="body-card" style="height: 680px;">
            <div class="question_1">
                <textarea id="que3" style="height: 790px; font-size: 19px;" disabled>Señor@ xxxx vamos a realizar una configuración de tarjeta de red, por favor conecta tu equipo por medio de un cable de red directamente conectado al modem 🔌 y realizas los siguientes pasos 😄💻

Cambiar como comunicarlo Por favor conecta tu equipo por medio de un cable de red directamente al modem.

Configuración de tarjeta de red:
1) Ingrese a la configuración de windows
2)Buscas configuración
3)Das click en Ethernet o red
4) Ethernet configuración avanzada
5) Opción cambiar configuración del adaptador 
6) Ethernet seleccionas Propiedades
7) Seleccionar protocolo de internet versión 4 (TCP/IPv4) Propiedades
8) Seleccionar usar la siguiente dirección Ip colocar (192.168.0 y segmento a seleccionar de la 3 a la 255
9) Seleccionar los DNS de ETB 200.75.51.132 en el prefijo y en el alternativo 200.75.51.133 y aceptar
</textarea>
            </div>
        </div>

        <button onclick="ques4(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest5" style="display: none;">

        <h1 id="cod">CONECTA – NO NAVEGA: CABLE</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta2" onchange="actualizarTexto2()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques5(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest6" style="display: none;">

        <h1 id="cod">CONECTA – NO NAVEGA: CABLE</h1>

        <div class="body-card" style="height: 160px;">
            <div class="question_1">
                <textarea id="que2" style="height: 200px;" disabled>Señor@ valida con otro navegador (verifica que no te encuentres trabajando sin conexión, a través de CMD ejecuta comando ipconfig).</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta3" onchange="actualizarTexto3()"> <!-- Manejo con JavaScript -->
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
        <div class="data" id="dat">
            <h3>Nombre:</h3>
            <input type="text" id="nameInput" oninput="updateAllNames()">
        </div>

        <div class="data2" id="data2">
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
<script src="../../Controller/inter/inter4.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>