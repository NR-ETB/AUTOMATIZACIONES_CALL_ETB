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
    <title>Gestion TV - ADC</title>
</head>
<body>

<?php include('../components/dashboard_gen.php'); ?>

    <?php
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la sexta pregunta (id_Tv = 6, por ejemplo)
    $sql = "SELECT meg_Tv FROM TELEVISION WHERE id_Tv = 2007";
    $result = $conn->query($sql);

    // Si la consulta devuelve algún resultado
    if ($result->num_rows > 0) {
        // Obtener la sexta pregunta
        $row = $result->fetch_assoc();
        $pregunta_septima = $row['meg_Tv'];
    } else {
        $pregunta_septima = "No se encontró la pregunta."; // Mensaje por defecto si no se encuentra la pregunta
    }

    $conn->close();
    ?>

    <!-- PREGUNTA SIETE -->
    <div class="cards" id="quest3">

        <h1 id="cod">MAL CONECTADO EL DECO <img id="acti" src="../images/touch.png" alt=""></h1>

        <div class='body-card' id="great">
            <div class='question_1'>
                <textarea class="great2" id='que2' placeholder='Escribe aquí la pregunta' disabled><?php echo htmlspecialchars($pregunta_septima); ?></textarea>
            </div>
        </div>

    </div>

    <?php
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la sexta pregunta (id_Tv = 6, por ejemplo)
    $sql = "SELECT meg_Tv FROM TELEVISION WHERE id_Tv = 2008";
    $result = $conn->query($sql);

    // Si la consulta devuelve algún resultado
    if ($result->num_rows > 0) {
        // Obtener la sexta pregunta
        $row = $result->fetch_assoc();
        $pregunta_septima2 = $row['meg_Tv'];
    } else {
        $pregunta_septima2 = "No se encontró la pregunta."; // Mensaje por defecto si no se encuentra la pregunta
    }

    $conn->close();
    ?>

    <!-- PREGUNTA SIETE PARTE DOS-->
    <div class="cards" id="quest33">

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' placeholder='Escribe aquí la pregunta' disabled><?php echo htmlspecialchars($pregunta_septima2); ?></textarea>
            </div>
        </div>

        <?php

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Comprobar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Definir la variable para el mensaje
        $respuestaTexto = '';

        // Verificar si se ha seleccionado una opción (sin enviar formulario)
        if (isset($_GET['respuesta']) && !empty($_GET['respuesta'])) {
            // Obtener el id de la respuesta seleccionada desde la URL
            $id_ResTv = $_GET['respuesta'];

            // Realizar la consulta para obtener la respuesta correspondiente
            $sql = "SELECT res_ResTv FROM RESPUESTA_TV WHERE id_ResTv = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_ResTv);  // Bind de parámetro
            $stmt->execute();
            $stmt->bind_result($res_ResTv);

            // Si hay un resultado, cargarlo en la variable
            if ($stmt->fetch()) {
                $respuestaTexto = $res_ResTv;  // Asignar el texto al textarea
            }

            // Cerrar la declaración
            $stmt->close();
        }

        // Consulta SQL para obtener las opciones del select (Solo los id_ResTv y pre_ResTv)
        $sql = "SELECT id_ResTv, pre_ResTv FROM RESPUESTA_TV WHERE id_ResTv IN (1002, 1011)";
        $result = $conn->query($sql);
        ?>

        <!-- HTML para el formulario -->
        <form method="GET" action="">
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="this.form.submit()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <?php
                        // Mostrar las opciones del select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Añadir la opción y asegurarnos de que el valor esté correctamente asignado
                                echo '<option value="' . $row['id_ResTv'] . '"';
                                if (isset($_GET['respuesta']) && $_GET['respuesta'] == $row['id_ResTv']) {
                                    echo ' selected'; // Seleccionar la opción previamente seleccionada
                                }
                                echo '>' . $row['pre_ResTv'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>

        <button onclick="ques3();">Siguiente >></button>

    </div>

    <?php
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la sexta pregunta (id_Tv = 6, por ejemplo)
    $sql = "SELECT meg_Tv FROM TELEVISION WHERE id_Tv = 2009";
    $result = $conn->query($sql);

    // Si la consulta devuelve algún resultado
    if ($result->num_rows > 0) {
        // Obtener la sexta pregunta
        $row = $result->fetch_assoc();
        $pregunta_octava = $row['meg_Tv'];
    } else {
        $pregunta_octava = "No se encontró la pregunta."; // Mensaje por defecto si no se encuentra la pregunta
    }

    $conn->close();
    ?>

    <!-- PREGUNTA OCHO -->
    <div class="cards" id="quest4" style="display: none;">

        <h1 id="cod">MAL CONECTADO EL DECO <img id="acti" src="../images/touch.png" alt=""></h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' placeholder='Escribe aquí la pregunta' disabled><?php echo htmlspecialchars($pregunta_octava); ?></textarea>
            </div>
        </div>

        <?php

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Comprobar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Definir la variable para el mensaje
        $respuestaTexto = '';

        // Verificar si se ha seleccionado una opción (sin enviar formulario)
        if (isset($_GET['respuesta']) && !empty($_GET['respuesta'])) {
            // Obtener el id de la respuesta seleccionada desde la URL
            $id_ResTv = $_GET['respuesta'];

            // Realizar la consulta para obtener la respuesta correspondiente
            $sql = "SELECT res_ResTv FROM RESPUESTA_TV WHERE id_ResTv = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_ResTv);  // Bind de parámetro
            $stmt->execute();
            $stmt->bind_result($res_ResTv);

            // Si hay un resultado, cargarlo en la variable
            if ($stmt->fetch()) {
                $respuestaTexto = $res_ResTv;  // Asignar el texto al textarea
            }

            // Cerrar la declaración
            $stmt->close();
        }

        // Consulta SQL para obtener las opciones del select (Solo los id_ResTv y pre_ResTv)
        $sql = "SELECT id_ResTv, pre_ResTv FROM RESPUESTA_TV WHERE id_ResTv IN (1004, 1012)";
        $result = $conn->query($sql);
        ?>

        <!-- HTML para el formulario -->
        <form method="GET" action="">
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="this.form.submit()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <?php
                        // Mostrar las opciones del select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Añadir la opción y asegurarnos de que el valor esté correctamente asignado
                                echo '<option value="' . $row['id_ResTv'] . '"';
                                if (isset($_GET['respuesta']) && $_GET['respuesta'] == $row['id_ResTv']) {
                                    echo ' selected'; // Seleccionar la opción previamente seleccionada
                                }
                                echo '>' . $row['pre_ResTv'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>

        <button onclick="ques4();">Siguiente >></button>

    </div>

    <?php
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la sexta pregunta (id_Tv = 6, por ejemplo)
    $sql = "SELECT meg_Tv FROM TELEVISION WHERE id_Tv = 2011";
    $result = $conn->query($sql);

    // Si la consulta devuelve algún resultado
    if ($result->num_rows > 0) {
        // Obtener la sexta pregunta
        $row = $result->fetch_assoc();
        $pregunta_novena = $row['meg_Tv'];
    } else {
        $pregunta_novena = "No se encontró la pregunta."; // Mensaje por defecto si no se encuentra la pregunta
    }

    $conn->close();
    ?>

    <!-- PREGUNTA NOVENA -->
    <div class="cards" id="quest5" style="display: none;">

        <h1 id="cod">MAL CONECTADO EL DECO <img id="acti" src="../images/touch.png" alt=""></h1>

        <div class='body-card'>
            <div class='question_1'>
                <textarea id='que2' placeholder='Escribe aquí la pregunta' disabled><?php echo htmlspecialchars($pregunta_novena); ?></textarea>
            </div>
        </div>

        <?php

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Comprobar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Definir la variable para el mensaje
        $respuestaTexto = '';

        // Verificar si se ha seleccionado una opción (sin enviar formulario)
        if (isset($_GET['respuesta']) && !empty($_GET['respuesta'])) {
            // Obtener el id de la respuesta seleccionada desde la URL
            $id_ResTv = $_GET['respuesta'];

            // Realizar la consulta para obtener la respuesta correspondiente
            $sql = "SELECT res_ResTv FROM RESPUESTA_TV WHERE id_ResTv = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_ResTv);  // Bind de parámetro
            $stmt->execute();
            $stmt->bind_result($res_ResTv);

            // Si hay un resultado, cargarlo en la variable
            if ($stmt->fetch()) {
                $respuestaTexto = $res_ResTv;  // Asignar el texto al textarea
            }

            // Cerrar la declaración
            $stmt->close();
        }

        // Consulta SQL para obtener las opciones del select (Solo los id_ResTv y pre_ResTv)
        $sql = "SELECT id_ResTv, pre_ResTv FROM RESPUESTA_TV WHERE id_ResTv IN (1005, 1015)";
        $result = $conn->query($sql);
        ?>

        <!-- HTML para el formulario -->
        <form method="GET" action="">
            <div class="body-card">
                <div class="question_2">
                    <select name="respuesta" id="respuesta" onchange="this.form.submit()"> <!-- Al cambiar, el formulario se enviará -->
                        <option value="">Selecciona una Opción...</option> <!-- Opción vacía por defecto -->
                        <?php
                        // Mostrar las opciones del select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Añadir la opción y asegurarnos de que el valor esté correctamente asignado
                                echo '<option value="' . $row['id_ResTv'] . '"';
                                if (isset($_GET['respuesta']) && $_GET['respuesta'] == $row['id_ResTv']) {
                                    echo ' selected'; // Seleccionar la opción previamente seleccionada
                                }
                                echo '>' . $row['pre_ResTv'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>

        <div class="bot">
            <button onclick="one_ini();"><< FINALIZAR GESTION >></button>
        </div>

    </div>

    <?php
    // Incluir la conexión a la base de datos
    include('../../Model/conexion.php');

    // Consulta SQL para obtener las primeras 5 preguntas de la tabla TELEVISION
    $sql = "SELECT meg_Tv FROM TELEVISION LIMIT 9";
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
                <?php echo htmlspecialchars($respuestaTexto); ?>
            </textarea>
        </div>
    </div>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/tv3.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</body>
</html>