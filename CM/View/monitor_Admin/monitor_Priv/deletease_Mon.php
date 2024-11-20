<?php
include('../../../Model/conexion.php');

$conexion = new mysqli('localhost', 'root', '', 'monitoreo');

// Manejo de errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener todos los usuarios
$consulta = "SELECT
            usu.id_Usu,
            r.cat_Rol AS ROL, 
            usu.nom_Usu AS NOMBRE_COMPLETO, 
            usu.ema_Usu AS EMAIL, 
            usu.tel_Usu AS TELEFONO,
            usu.usu_Usu AS USUARIO_MONITOREO 
            FROM 
                usuario usu
            INNER JOIN 
            rol r ON usu.id_Rol = r.id_Rol";

$result = $conexion->query($consulta);

// Verificar si se ha enviado una solicitud para eliminar un usuario
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Consulta DELETE para eliminar al usuario con el ID proporcionado
    $delete_query = "DELETE FROM usuario WHERE id_Usu = ?";
    $stmt = $conexion->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        // Redireccionar o mostrar mensaje de éxito
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/comp2.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Eliminar Asesor</title>
</head>
<body>

<?php include('../../components/dashboard_AdminPriv.php'); ?>

<div class="container-general">
    <div class="label1">
        <form action="historyMon.php" method="GET">
            <div>
                <p>ID ONT:</p>
                <input id="telefonoInput" class="dat" type="text" name="ont" placeholder="Ingresa la ID ONT aqui">
            </div>

            <div class="ini-b">
                <button class="btn-prima" type="submit" onclick="tabhys();">BUSCAR</button>
                <script>
                    function tabhys() {
                        $('#modal-loading').modal('toggle');
                        setTimeout(function() {
                            $('#modal-loading').modal('hide');
                            $('#modal_vista').modal('show');
                        }, 2000);
                    }
                </script>
            </div>
        </form>
    </div>

    <div class="acti">
        <button id="downloadPdf" style="display: none;">PDF</button>
        <button id="exportButton">CVS</button>
    </div>

    <div class="connew-2" id="connew2-2" style="height: 580px; overflow-y: scroll;">
        <div class="table-product" id="con-sopo-inter">
            <div class="con-table2">
                <table class="table-general table-sopor table-produc" id="dataTable">
                    <tr>
                        <th>ROL</th>
                        <th>NOMBRE COMPLETO</th>
                        <th>EMAIL</th>
                        <th>TELEFONO</th>
                        <th>USUARIO_MONITOREO</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <tbody>
                        <?php
                        // Iterar sobre los resultados y mostrar cada fila en la tabla
                        if ($result->num_rows > 0) {
                            while ($fila = $result->fetch_assoc()) {
                                echo "<tr>"; 
                                echo "<td>" . htmlspecialchars($fila['ROL']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['NOMBRE_COMPLETO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['EMAIL']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['TELEFONO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['USUARIO_MONITOREO']) . "</td>"; 
                                // Agregar un formulario para cada fila con el ID de usuario
                                echo "<td>
                                    <form action='' method='GET'>
                                        <input type='hidden' name='delete_id' value='" . $fila['id_Usu'] . "' />
                                        <button type='submit' class='btn-prima' style='right: 0px; bottom: 12px;' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</button>
                                    </form>
                                  </td>";
                                echo "</tr>"; 
                            }
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron resultados para la búsqueda.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Loading -->
<div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h6>
            </div>
            <div class="modal-body">
                <div class="con-spiner">
                    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
                <div class="text-spiner"><p>Por favor no cierres la página</p></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Loading -->

<script src="../../bootstrap/jquery.js"></script>
<script src="../../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../../Controller/delet.js"></script>   
<script src="../../../Controller/gen.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</body>
</html>
