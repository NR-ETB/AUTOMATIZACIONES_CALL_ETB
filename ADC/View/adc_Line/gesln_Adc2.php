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

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled></textarea>
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