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

        <h1 id="cod">CONECTA – NO NAVEGA: - WIFI- VARIOS DISPOSITIVOS</h1>

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

            <div class="menu" onclick="ques9();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>FALLA REPETIDOR</p>
                </div>
            </div>

        </div>

    </div>

    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod">FALLA EN UN SOLO DISPOSITIVO</h1>

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

        <h1 id="cod">NO NAVEGA A LA VELOCIDAD CONTRATADAO</h1>

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

        <h1 id="cod">NO NAVEGA A LA VELOCIDAD CONTRATADAO</h1>

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

        <button onclick="ques6(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest7" style="display: none;">

        <h1 id="cod">TARJETA DE RED CON CAPACIDAD OK</h1>

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

        <h1 id="cod">TARJETA DE RED SIN CAPACIDAD</h1>

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

    <div class="cards" id="quest9" style="display: none;">

        <h1 id="cod">FALLA EN REPETIDOR</h1>

        <div class="body-card" style="height: 320px;">
            <div class="question_1">
                <textarea id="que2" style="height: 340px;" disabled>Envíame foto del repetidor donde se evidencie los bombillos encendidos por favor 😊
 
Vas a validar en la parte trasera del repetidor vas a identificar un cable conectado en un puerto llamado WAN lo desconectas y lo vuelves a conectar y verificas que ese mismo cable esta en datos 1 si no esta lo conectas en datos 1 por favor 😊</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
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

         <button onclick="ques10(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest10" style="display: none;">

        <h1 id="cod2">SELECCIONA LA GESTION A APLICAR...</h1>

        <div class="container-menu">

            <div class="menu" onclick="ques11();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>FALLA FIBERHOME</p>
                </div>
            </div>

            <div class="menu" onclick="ques12();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>CAMBIO DE CLAVE REPETIDOR</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="ques13();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>SOPORTE COBRE</p>
                </div>
            </div>

        </div>

    </div>

    <div class="cards" id="quest11" style="display: none;">

        <h1 id="cod">FALLA FIBERHOME</h1>

        <div class="body-card" style="height: 260px;">
            <div class="question_1">
                <textarea id="que2" style="height: 340px;" disabled>xxx ya para la configuración de tu repetidor de señal, lo debes realizar directamente tu por medio de nuestro aplicativo FIBERHOME📲, lo puedes descargar por medio de la APP STORE o PLAY STORE totalmente gratis, lo descargas te registras y de esta manera configuras tu red o tu repetidor de señal. ✔️</textarea>
            </div>
        </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="cards" id="quest12" style="display: none;">

        <h1 id="cod">CAMBIO DE CLAVE REPETIDOR</h1>

        <div class="body-card" style="height: 430px;">
            <div class="question_1">
                <textarea id="que2" style="height: 370px;" disabled>Ingresa a la app, selecciona tu servicio, vas a dar click sobre la flecha azul, vas a dar click sobre la flecha azul en la opción modem, desde esta opción podrás hacer el cambio dando click en el lápiz, cuando ya hayas ingresado la nueva clave das click en guardar 😃
 
xxx ya para la configuración de tu repetidor de señal, lo debes realizar directamente tu por medio de nuestro aplicativo FIBERHOME📲, lo puedes descargar por medio de la APP STORE o PLAY STORE totalmente gratis, lo descargas te registras y de esta manera configuras tu red o tu repetidor de señal. ✔️</textarea>
            </div>
        </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="cards" id="quest13" style="display: none;">

        <h1 id="cod">APERTURA DE PUERTOS</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0;" disabled>Cliente cuenta con ip?</textarea>
            </div>
        </div>

            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta4" onchange="actualizarTexto4()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

            <button onclick="ques14(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest14" style="display: none;">

        <h1 id="cod">RECOMENDACIONES DE LAS REDES</h1>

        <div class="body-card" style="height: 310px;">
            <div class="question_1">
                <textarea id="que2" style="height: 250px;" disabled>Sin embargo, te voy a comentar unos datos sobre las redes para que lo tengas en cuenta al momento de conectarte y así no te presente inconvenientes la red 2.4 te brinda mayor cobertura es decir que tiene más accesibilidad a ciertas partes del predio, pero no te brinda tanta velocidad muy diferente a la red 5G esta brinda mayor velocidad sin embargo no cuenta con la misma capacidad de cobertura que la 2.4 📱💻</textarea>
            </div>
        </div>

        <div class="bot">
            <button onclick="one_ini(),empty()"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <div class="cards" id="quest15" style="display: none;">

        <h1 id="cod">INTERNET- CABLE</h1>

        <div class="body-card" style="height: 400px;">
            <div class="question_1">
                <textarea id="que2" style="height: 350px;" disabled>Vas identificar el cable que viene de la pared hacia el modem vas a identificar el microfiltro es una caja pequeña color blanco o beige vas a desconectar el cable y vas a limpiar la entrada y lo vuelves a conectar 🛠️ luego lo desconectas desde el tomacorriente 🔧y pasado 30 segundos vuelve a conectar, cuando los leds del modem estén encendidos me informas.

Gestión asesor: verifica que en suma este de forma correcta los semáforos y todo este sincronizando correctamente.</textarea>
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
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>