<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_home.css">
    <link rel="stylesheet" href="../css/comp.css">
    <title>Inicio - ADC</title>
</head>
<body>

<?php include('../components/dashboard_home.php'); ?>

    <!-- PREGUNTAS DE SONDEO -->
    <div class="cards" id="quest2">

        <h1 id="cod2">¿QUE SOLUCIONAREMOS HOY?</h1>

        <div class="container-menu">

            <div class="menu" onclick="tv();">
                <div>
                    <img src="../images/solu.png" alt="">
                    <p>Gestion  TV</p>
                </div>
            </div>

            <div class="menu" onclick="phone();">
                <div>
                    <img src="../images/solu.png" alt="">
                    <p>Gestion Telefonica</p>
                </div>
            </div>

        </div>

        <div class="container-menu">

            <div class="menu" onclick="net();">
                <div>
                    <img src="../images/solu.png" alt="">
                    <p>Gestion Internet</p>
                </div>
            </div>

            <div class="menu" onclick="ott();">
                <div>
                    <img src="../images/solu.png" alt="">
                    <p>Gestion OTT</p>
                </div>
            </div>

        </div>

    </div>

    <div class="bio2" id="bio2">

        <p>Bienvenido <br>
        Asesor</p>

        <div class="us">
            <img src="../images/user3.png" alt="">
        </div>

        <!-- Aquí cargamos el mensaje en el textarea -->
        <div class="txt">
            <textarea name="respuestaTexto" id="respuestaTexto" disabled>¡Bienvenid@ al equipo! 🎉

Tu talento y experiencia son esenciales para llevar nuestra automatización de chats al siguiente nivel. 🚀 Aquí, cada interacción cuenta y juntos crearemos soluciones que impacten positivamente a nuestros clientes.

Explora, innova y transforma con nosotros. ¡Estamos emocionados de verte crecer en este viaje! 💡</textarea>
        </div>

        <img src="../images/login.png" alt="">

    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/home.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>