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

        <h1 id="cod">INTERMITENCIA Y LENTITUD - FTTH</h1>

        <div class="body-card" style="height: 400px;">
            <div class="question_1">
                <textarea id="que2" style="height: 340px;" disabled>En estos momentos vamos a apagar el modem🔴 y vamos a desconectar el cable 🔌de la energía por 10 segundos, y vas a encontrar un cable amarillo o blanco verifica que no presente ninguna ruptura, lo vas a estirar y ajusta las puntas 🙌 por favor con mucho cuidado. 🧐🔌

Señor@ xxxx por favor verifica el estado de los leds todos deben quedar en verde, prueba el servicio si ya te funciona 😄

Cambiar la visual de todos en verde por alguno en rojo</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
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

        <button onclick="ques2(),nexts(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest3" style="display: none;">

        <h1 id="cod">INTERMITENCIA Y LENTITUD - FTTH</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que3" style="bottom: 0;" disabled>Señ@r xxxx por favor verifique si ya tiene servicio 😄</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta2" onchange="actualizarTexto2()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques3(),nexts2(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod">INTERMITENCIA Y LENTITUD - FTTH</h1>

        <div class="body-card" style="height: 260px;">
            <div class="question_1">
                <textarea id="que4" style="height: 220px;" disabled>Señor@ xxxxx la intermitencia es por cable o wifi ?

Para ambos casos

Nota: Hacer un PING hacia internet (Modulo de Internet - Botón Consultas – PING 8.8.8.8)
</textarea>
            </div>
        </div>

        <button onclick="ques4(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest5" style="display: none;">

        <h1 id="cod2">SELECCIONA LA GESTION A APLICAR...</h1>

        <div class="container-menu">

            <div class="menu" onclick="ques5();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>FALLA WIFI</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="three();" style="opacity: 0;">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p id="au">AUSENCIA DE SEÑAL VARIOS DECODIFICADORES O TOTAL IMAGEN PIXELADA IMAGEN CONGELADA</p>
                </div>
            </div>

            <div class="menu" onclick="ques9();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>FALLA POR CABLE</p>
                </div>
            </div>

        </div>

    </div>

    <div class="cards" id="quest6" style="display: none;">

        <h1 id="cod">FALLA WIFI</h1>

        <div class="body-card" style="height: 190px;">
            <div class="question_1">
                <textarea id="que2" style="height: 130px;" disabled>En la parte trasera del modem vas a identificar un botón pequeño que dice WLAN o WIFI por favor oprime por 30 segundos lo apagas y lo enciendes, valida que el servicio esté funcionando de forma correcta 🧐</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta3" onchange="actualizarTexto3()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques6(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest7" style="display: none;">

        <h1 id="cod">FALLA WIFI</h1>

        <div class="body-card" style="height: 220px;">
            <div class="question_1">
                <textarea id="que2" style="height: 190px;" disabled>Señor@ vamos a realizar un cambio de clave wifi permíteme 3 minutos y ya vuelvo contigo ⏳😄

Realizamos el cambio de tu clave de forma exitosa, verifica por favor si con la nueva clave ya tienes servicio, por favor.</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta4" onchange="actualizarTexto4()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques7(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest8" style="display: none;">

        <h1 id="cod">FALLA WIFI</h1>

        <div class="body-card" style="height: 160px;">
            <div class="question_1">
                <textarea id="que2" style="height: 100px;" disabled>Verifica si tiene un signo de admiración en la red wifi, si lo tienes por favor dale olvidar a la red wifi y vuelves y te conectas 🧐</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta6" onchange="actualizarTexto6()"> <!-- Manejo con JavaScript -->
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

        <h1 id="cod">FALLA POR CLABLE</h1>

        <div class="body-card" style="height: 220px;">
            <div class="question_1">
                <textarea id="que2" style="height: 160px;" disabled>Por favor dirígete al computador y vas a digitar lo siguiente; Presionar en el teclado  Windows + R para abrir el cuadro de diálogo 'Ejecutar', escribir 'cmd' y presionar la tecla 'Enter'💻 escribir el comando 'PING + la dirección destino ' y me indicas si tienes perdidas de paquetes 🧐</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Tiene perdida de paquetes?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta6" onchange="actualizarTexto6()"> <!-- Manejo con JavaScript -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
                </div>
            </div>

        <button onclick="ques10(),empty();">Siguiente >></button>

    </div>

    <div class="cards" id="quest10" style="display: none;">

        <h1 id="cod">FALLA POR CLABLE</h1>

        <div class="body-card" style="height: 160px;">
            <div class="question_1">
                <textarea id="que2" style="height: 100px;" disabled>Validar que equipos aparecen conectados, luego verificar si son los actuales con el cliente, esta información con el fin de mirar una posible saturación de conexiones.</textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_1">
                <textarea id="que2" style="bottom: 0px;" disabled>¿Servicios ok?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta7" onchange="actualizarTexto7()"> <!-- Manejo con JavaScript -->
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

        <div class="actin" id="actin">
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
<script src="../../Controller/inter/inter3.js"></script>    
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>