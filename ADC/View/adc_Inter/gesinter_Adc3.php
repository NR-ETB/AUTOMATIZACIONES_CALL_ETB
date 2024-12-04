<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <textarea id="que2" style="height: 790px; font-size: 19px;" disabled>Señor@ xxxx vamos a realizar una configuración de tarjeta de red, por favor conecta tu equipo por medio de un cable de red directamente conectado al modem 🔌 y realizas los siguientes pasos 😄💻

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
        <div class="data">
            <h3>Nombre:</h3>
            <input type="text">
        </div>

        <div class="data2">
            <h3>Dato:</h3>
            <input type="text">
        </div>

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled></textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/inter/inter3.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>