<?php
include('../../../Model/conexion.php');

$conexion = new mysqli('localhost', 'root', '', 'monitoreo');

// Manejo de errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener todos los clientes
$consulta = "SELECT 
    cli.id_Cli,
    cli.ont_Cli AS ID_ONT, 
    cli.slot_Cli AS SLOT_PUERTO, 
    cli.cst_Cli AS CS_TEL, 
    ges.nom_Ges AS TIPO_DE_GESTION, 
    est.nom_Est AS ESTADO,
    sum.est_Sum AS ESTADO_SUMA,
    dia.nom_Dia AS DIAGNOSTICO,
    con.tip_Con AS REQUIERE_CONTACTO,
    com.nom_Com AS COMUNICACION,
    med.nom_Med AS MEDIOS,
    inte.can_Inte AS CANTIDAD_DE_INTENTOS,
    sop.tip_Sop AS SOPORTE_PREVENTIVO,
    sol.tip_Sol AS SOLUCION,
    niv.tip_Niv AS NIVEL,
    cli.pqr_Cli AS PQR, 
    seg.tip_Seg AS SEGUIMIENTO,
    mon.nom_Mon AS MONITOR,
    cli.fechyhorini_Cli AS FECH_Y_HORA_INICIO, 
    cli.fechyhorfin_Cli AS FECH_Y_HORA_FIN, 
    cli.obs_Cli AS OBSERVACIONES
    FROM 
        cliente cli
    INNER JOIN 
        rol ON cli.id_Rol = rol.id_Rol
    INNER JOIN 
        estado est ON cli.id_Est = est.id_Est
    INNER JOIN 
        gestion ges ON cli.id_Ges = ges.id_Ges
    INNER JOIN 
        suma sum ON cli.id_Sum = sum.id_Sum
    INNER JOIN 
        diagnostico dia ON cli.id_Dia = dia.id_Dia
    INNER JOIN 
        contacto con ON cli.id_Con = con.id_Con
    INNER JOIN 
        comunicacion com ON cli.id_Com = com.id_Com
    INNER JOIN 
        medios med ON cli.id_Med = med.id_Med
    INNER JOIN 
        intentos inte ON cli.id_Inte = inte.id_Inte
    INNER JOIN 
        soporte sop ON cli.id_Sop = sop.id_Sop
    INNER JOIN 
        solucion sol ON cli.id_Sol = sol.id_Sol
    INNER JOIN 
        nivel niv ON cli.id_Niv = niv.id_Niv
    INNER JOIN 
        seguimiento seg ON cli.id_Seg = seg.id_Seg
    INNER JOIN 
        monitor mon ON cli.id_Mon = mon.id_Mon";

$result = $conexion->query($consulta);

// Verificar si se ha enviado una solicitud para eliminar un cliente
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id']; // El ID del cliente que se desea eliminar

    // Consulta DELETE para eliminar el cliente con el ID_ONT proporcionado
    $delete_query = "DELETE FROM cliente WHERE id_Cli = ?"; // Se elimina el cliente por ID_ONT
    $stmt = $conexion->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        // Redireccionar o mostrar mensaje de éxito
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error al eliminar el cliente.";
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
    <title>Eliminar Cliente</title>
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
                        <th>ID_ONT</th>
                        <th>SLOT_PUERTO</th>
                        <th>CS_TEL</th>
                        <th>TIPO_DE_GESTION</th>
                        <th>ESTADO</th>
                        <th>ESTADO_SUMA</th>
                        <th>DIAGNOSTICO</th>
                        <th>REQUIERE_CONTACTO</th>
                        <th>COMUNICACION</th>
                        <th>MEDIOS</th>
                        <th>CANTIDAD_DE_INTENTOS</th>
                        <th>SOPORTE_PREVENTIVO</th>
                        <th>SOLUCION</th>
                        <th>NIVEL</th>
                        <th>PQR</th>
                        <th>SEGUIMIENTO</th>
                        <th>MONITOR</th>
                        <th>FECH_Y_HORA_INICIO</th>
                        <th>FECH_Y_HORA_FIN</th>
                        <th>OBSERVACIONES</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <tbody>
                        <?php
                        // Iterar sobre los resultados y mostrar cada fila en la tabla
                        if ($result->num_rows > 0) {
                            while ($fila = $result->fetch_assoc()) {
                                echo "<tr>"; 
                                echo "<td>" . htmlspecialchars($fila['ID_ONT']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['SLOT_PUERTO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['CS_TEL']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['TIPO_DE_GESTION']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['ESTADO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['ESTADO_SUMA']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['DIAGNOSTICO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['REQUIERE_CONTACTO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['COMUNICACION']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['MEDIOS']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['CANTIDAD_DE_INTENTOS']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['SOPORTE_PREVENTIVO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['SOLUCION']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['NIVEL']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['PQR']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['SEGUIMIENTO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['MONITOR']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['FECH_Y_HORA_INICIO']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['FECH_Y_HORA_FIN']) . "</td>"; 
                                echo "<td>" . htmlspecialchars($fila['OBSERVACIONES']) . "</td>"; 
                                // Agregar un formulario para cada fila con el ID_ONT del cliente
                                echo "<td>
                                    <form action='' method='GET'>
                                        <input type='hidden' name='delete_id' value='" . $fila['id_Cli'] . "' />
                                        <button type='submit' class='btn-prima' style='right: 0px; bottom: 12px;' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este cliente?\");'>Eliminar</button>
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
