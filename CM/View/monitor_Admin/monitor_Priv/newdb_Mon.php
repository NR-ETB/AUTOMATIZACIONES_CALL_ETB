<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style_new.css">
    <link rel="stylesheet" href="../../css/comp2.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Añadir Nueva Base</title>
</head>
<body>

<?php
    include('../../components/dashboard_AdminPriv.php');
?>

<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia por tu servidor de base de datos
$username = "root"; // Cambia por tu usuario de base de datos
$password = ""; // Cambia por tu contraseña de base de datos
$dbname = "monitoreo"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csvFile'])) {
    // Obtener el archivo CSV
    $csvFile = $_FILES['csvFile']['tmp_name'];

    // Verificar que el archivo es CSV
    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
        // Saltar la primera fila (encabezado)
        fgetcsv($handle);

        // Leer cada línea del archivo CSV
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) { // Cambia el delimitador si es necesario
            // Escapar los valores para evitar inyección SQL
            $id_Rol = $conn->real_escape_string($data[0]);
            $id_Est = $conn->real_escape_string($data[1]);
            $id_Seg = $conn->real_escape_string($data[2]);
            $id_Ges = $conn->real_escape_string($data[3]);
            $id_Mon = $conn->real_escape_string($data[4]);
            $id_Med = $conn->real_escape_string($data[5]);
            $id_Com = $conn->real_escape_string($data[6]);
            $id_Sub = $conn->real_escape_string($data[7]);
            $id_Con = $conn->real_escape_string($data[8]);
            $id_Estf = $conn->real_escape_string($data[9]);
            $id_Sop = $conn->real_escape_string($data[10]);
            $id_Niv = $conn->real_escape_string($data[11]);
            $id_Inte = $conn->real_escape_string($data[12]);
            $id_Dia = $conn->real_escape_string($data[13]);
            $id_Rea = $conn->real_escape_string($data[14]);
            $id_Ubi = $conn->real_escape_string($data[15]);
            $id_Sum = $conn->real_escape_string($data[16]);
            $id_Sol = $conn->real_escape_string($data[17]);
            $ont_Cli = $conn->real_escape_string($data[18]);
            $slot_Cli = $conn->real_escape_string($data[19]);
            $cst_Cli = $conn->real_escape_string($data[20]);
            $pqr_Cli = $conn->real_escape_string($data[21]);
            $inte_Cli = $conn->real_escape_string($data[22]);
            $obs_Cli = $conn->real_escape_string($data[23]);
            $fechyhorini_Cli = date('Y-m-d H:i:s', strtotime($data[24]));
            $fechyhorfin_Cli = date('Y-m-d H:i:s', strtotime($data[25]));            

            // Comprobar si las claves foráneas existen
            $sql_check_rol = "SELECT id_Rol FROM rol WHERE id_Rol = '$id_Rol'";
            $result_rol = $conn->query($sql_check_rol);
            if ($result_rol->num_rows == 0) {
                echo "Error: El id_Rol '$id_Rol' no existe en la tabla rol.<br>";
                continue;
            }

            $sql = "INSERT INTO cliente (
                id_Rol, id_Est, id_Seg, id_Ges, id_Mon, id_Med, id_Com, id_Sub, id_Con, id_Estf,
                id_Sop, id_Niv, id_Inte, id_Dia, id_Rea, id_Ubi, id_Sum, id_Sol, ont_Cli, slot_Cli,
                cst_Cli, pqr_Cli, inte_Cli, obs_Cli, fechyhorini_Cli, fechyhorfin_Cli
            ) VALUES (
                $id_Rol, $id_Est, $id_Seg, $id_Ges, $id_Mon, $id_Med, $id_Com, $id_Sub, $id_Con, $id_Estf,
                $id_Sop, $id_Niv, $id_Inte, $id_Dia, $id_Rea, $id_Ubi, $id_Sum, $id_Sol, '$ont_Cli', '$slot_Cli',
                '$cst_Cli', '$pqr_Cli', '$inte_Cli', '$obs_Cli', '$fechyhorini_Cli', '$fechyhorfin_Cli'
            )";
            
            if ($conn->query($sql) === TRUE) {
                echo "Nuevo cliente insertado correctamente.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        fclose($handle);
    } else {
        echo "Error al leer el archivo CSV.";
    }
}

$conn->close();
?>

<div class="container-general">
    <div class="uplo" onclick="document.getElementById('csvFile').click();">
        <img src="../../images/icons/upload.png" alt="Subir archivo">
        <p>Presiona el <span>ICONO</span> para realizar el cargue de la <br> información en el formato específico <span>CSV</span></p>
    </div>

    <!-- Input de tipo file, oculto para que no sea visible -->
    <input type="file" id="csvFile" name="csvFile" accept=".csv" onchange="uploadFile(event)" style="display: none;">
    <div id="fileName" class="file-name"></div> <!-- Muestra el nombre del archivo seleccionado -->
</div>

<script src="../../bootstrap/jquery.js"></script>
<script src="../../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../../Controller/new.js"></script>
<script src="../../../Controller/gen.js"></script> 

<script>
    // Función para manejar la carga del archivo
    function uploadFile(event) {
        var fileInput = event.target;
        var fileName = fileInput.files[0].name;

        // Mostrar el nombre del archivo seleccionado
        document.getElementById('fileName').textContent = 'Archivo seleccionado: ' + fileName;

        // Crear un FormData para enviar el archivo al servidor
        var formData = new FormData();
        formData.append("csvFile", fileInput.files[0]);

        // Realizar la petición AJAX para subir el archivo
        $.ajax({
            url: 'newdb_Mon.php', // Archivo PHP que manejará la carga
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Archivo cargado correctamente');
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorMessage) {
                alert('Error al cargar el archivo: ' + errorMessage);
            }
        });
    }
</script>

</body>
</html>
