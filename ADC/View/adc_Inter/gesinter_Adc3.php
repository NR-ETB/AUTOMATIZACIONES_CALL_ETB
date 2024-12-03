<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_line.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion Telefonica - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2">

        <h1 id="cod">CONECTA – NO NAVEGA: CABLE<img id="acti" src="../images/touch.png" alt=""></h1>

        <div class="body-card" style="height: 230px;">
            <div class="question_1">
                <textarea id="que2" style="height: 190px;" disabled>Señ@r ¿La falla se presenta en todos los dispositivos o en algunos? 📱📲

Verifica que el cliente esté conectado a la red de ETB. Validarlo, en suma
                </textarea>
            </div>
        </div>

        <div class="body-card" style="height: 449px;">
            <div class="question_1">
                <textarea id="que2" style="height: 430px;" disabled>Señ@r xxx por favor indícame el nombre de red a la que te encuentras conectad@

Señor@ permíteme 3 minutos y ya vuelvo contigo ⏳😄

Gestión asesor: Sigue los siguientes pasos y valídalos, en SUMA

1.	Validar a cuál red no le permite conectarse (2.4G/5.0G)
2.	Cambiar nombre y contraseña de red.
3.	Reaprovisionar servicios
4.	Validar con más de un dispositivo que conecte el servicio
</textarea>
            </div>
        </div>

        <button onclick="ques2(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest3" style="display: none;">

        <h1 id="cod2">SELECCIONA LA GESTION A APLICAR...</h1>

        <div class="container-menu">

            <div class="menu" onclick="ques3();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>FALLA EN UN SOLO <br> DISPOSITIVO</p>
                </div>
            </div>

            <div class="menu" onclick="ques4();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>NO NAVEGA A LA VELOCIDAD CONTRATADA</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="ques6();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>FALLA REPETIDOR</p>
                </div>
            </div>

        </div>

    </div>

    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod">FALLA EN UN SOLO DISPOSITIVO<img id="acti" src="../images/touch.png" alt=""></h1>

        <div class="body-card" style="height: 260px;">
            <div class="question_1">
                <textarea id="que2" style="height: 190px;" disabled>Señ@r xxxx esta falla no es del servicio como tal ya que la presentas en un solo dispositivo puedes validar con tu técnico de confianza, ¿deseas que te colabore en algo más? 

Gestión asesor: enviar a encuesta si no requiere que le colabore en otro requerimiento</textarea>
            </div>
        </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="cards" id="quest5" style="display: none;">

        <h1 id="cod">NO NAVEGA A LA VELOCIDAD CONTRATADAO<img id="acti" src="../images/touch.png" alt=""></h1>

        <div class="body-card" style="height: 310px;">
            <div class="question_1">
                <textarea id="que2" style="height: 250px;" disabled>Señ@r xxx vas a realizar una medición de velocidad con un computador conectado de manera directa al modem, no al extensor wifi, ni a la land switch, sin derivaciones, ni conexiones vpn 🧐 con un cable color amarillo utp de categoría (CAT 6) para velocidades superiores a 100 megas, lo vas a conectar en el puerto del modem (LAN 1 / DATOS 1). Lo puedes realizar por medio de este link https://etb.com/medidor/ 🔌💻</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Megas contratadas ok?💻</textarea>
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

        <button onclick="ques5(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest6" style="display: none;">

        <h1 id="cod">NO NAVEGA A LA VELOCIDAD CONTRATADAO<img id="acti" src="../images/touch.png" alt=""></h1>

        <div class="body-card" style="height: 400px;">
            <div class="question_1">
                <textarea id="que2" style="height: 340px;" disabled>Ahora vas a ingresar al computador y sigues los siguientes pasos:

1.	Se habilita panel de control con tecla windows + r y se busca "Control"
2.	Abrir Centro de redes
3.	Cambiar configuración del adaptador
4.	Se da click derecho sobre la conexión cableada actual, luego click en estado
5.	Allí debe mostrar la velocidad que soporta la tarjeta de red</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" disabled>Señ@r xxx por favor envíame una foto de la capacidad que soporta tu dispositivo 💻😄</textarea>
            </div>
        </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="cards" id="quest7" style="display: none;">

        <h1 id="cod">TARJETA DE RED CON CAPACIDAD OK<img id="acti" src="../images/touch.png" alt=""></h1>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0;" disabled>Señor@ permíteme 3 minutos y ya vuelvo contigo ⏳😄</textarea>
            </div>
        </div>

        <div class="body-card" style="height: 280px;">
            <div class="question_1">
                <textarea id="que2" style="height: 220px;" disabled>Gestión asesor: Sigue los siguientes pasos y valídalos, en SUMA

1.	Verifica que los semáforos estén en verde y tenga la misma velocidad que indica en vista 360, realiza comparaciones 
2.	Realizar reaprovisionamiento de servicios</textarea>
            </div>
        </div>

        <button onclick="ques7(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest8" style="display: none;">

        <h1 id="cod">TARJETA DE RED SIN CAPACIDAD<img id="acti" src="../images/touch.png" alt=""></h1>

        <div class="body-card" style="height: 400px;">
            <div class="question_1">
                <textarea id="que2" style="height: 340px;" disabled>Validando la imagen que me acabas de enviar se evidencia que tu dispositivo no cuenta con una capacidad apta para recibir todas las megas contratadas 💻❌

Gestión asesor: Si no tiene la capacidad enviar a encuesta e infórmale al cliente que su servicio esta ok 
Nota: verificar megas contratadas vista 360 vs realizando soporte si notas alguna novedad de sincronización de megas escálalo a especialistas y no generes visita técnica, le informas al cliente tiempos de respuesta para la sincronización.</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
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
<script src="../../Controller/inter/inter4.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>