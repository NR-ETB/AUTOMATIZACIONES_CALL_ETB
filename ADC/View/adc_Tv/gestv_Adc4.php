<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_tv.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion TV - ADC</title>
</head>
<body>

    <?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTA DECIMA -->
    <div class="cards" id="quest3">

        <h1 id="cod">PROCESO SUSCRIBER ID</h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' disabled>Señor@ xxxxx ¿te aparece un código de usuario y contraseña en el televisor?</textarea>
            </div>
        </div>

        <!-- HTML para el formulario -->
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="actualizarTexto()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="0">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <option value="1">SI</option>
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
            <img id="actionn" src="../images/modal2.png" alt="">
            <img src="../images/touch1.png" alt="">
            <img id="actionn" src="../images/copy2.png" alt="">
        </div>

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled>
            </textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/tv/tv5.js"></script>   
<script src="../../Controller/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>