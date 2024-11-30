<?php
// Incluir la conexión a la base de datos
include('../../Model/conexion.php');

// Consulta SQL para obtener las primeras 5 preguntas de la tabla TELEVISION
$sql = "SELECT meg_Tv FROM TELEVISION LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $questions = [];
    while($row = $result->fetch_assoc()) {
        $questions[] = $row['meg_Tv'];
    }
} else {
    $questions = []; 
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_tv.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Gestion Linea Fija - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <!-- PREGUNTAS DE SONDEO -->
    <div class="cards" id="quest">

        <h1>Preguntas de Sondeo</h1>

        <div class="body-card">
            <div class="question_1">
                <textarea name="" id="que"></textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_2">
                <textarea name="" id="que"></textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_3">
                <textarea name="" id="que"></textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_4">
                <textarea name="" id="que"></textarea>
            </div>
        </div>

        <div class="body-card">
            <div class="question_5">
                <textarea name="" id="que"></textarea>
            </div>
        </div>

        <button onclick="ques_ini();">Siguiente >></button>

    </div>

    <!-- PREGUNTA SESIS -->
    <div class="cards" id="quest2" style="display: none;">

        <h1 id="cod2">SELECCIONA LA GESTION A APLICAR...</h1>

        <div class="container-menu">

            <div class="menu" onclick="one();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>CÓDIGOS DE ERROR MAS COMUNES DECODIFICADOR</p>
                </div>
            </div>

            <div class="menu" onclick="two();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>MAL CONECTADO EL DECO</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="three();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p id="au">AUSENCIA DE SEÑAL VARIOS DECODIFICADORES O TOTAL IMAGEN PIXELADA IMAGEN CONGELADA</p>
                </div>
            </div>

            <div class="menu" onclick="four();">
                <div>
                    <img src="../images/escen.png" alt="">
                    <p>PROCESO SUSCRIBER ID</p>
                </div>
            </div>

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
            <textarea name="respuestaTexto" id="respuestaTexto" disabled>
            </textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/tv.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>