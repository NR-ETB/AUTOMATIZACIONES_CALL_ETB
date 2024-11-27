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
    <!-- Formulario de filtro -->
    <div class="label1">
        <form action="deletecli_Mon.php" method="GET">
            <div>
                <p>ID ONT:</p>
                <input id="telefonoInput" class="dat" type="text" name="ont" placeholder="Ingresa la ID ONT aquí">
            </div>

            <div class="ini-b">
                <button class="btn-prima" type="submit">BUSCAR</button>
            </div>
        </form>
    </div>

    <button class="btn-second" type="button" onclick="rdcli();">LIMPIAR</button>

    <!-- Botones de acciones adicionales -->
    <div class="acti">
        <button id="downloadPdf" style="display: none;">PDF</button>
        <button id="exportButton">CSV</button>
    </div>

    <?php
    // Conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta base
    $consulta = "
        SELECT 
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

    // Aplicar filtro si se envió el parámetro 'ont'
    if (isset($_GET['ont']) && !empty(trim($_GET['ont']))) {
        $ont = $conexion->real_escape_string(trim($_GET['ont']));
        $consulta .= " WHERE cli.ont_Cli = '$ont'";
    }

    // Ejecutar la consulta
    $result = $conexion->query($consulta);

    // Cerrar la conexión
    $conexion->close();
    ?>

    <!-- Tabla de resultados -->
    <div class="connew-2" id="connew2-2" style="height: 580px; overflow-y: scroll;">
        <div class="table-product" id="con-sopo-inter">
            <div class="con-table2">
                <table class="table-general table-sopor table-produc" id="dataTable">
                    <thead>
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
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($fila = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($fila['ID_ONT']) ?></td>
                                    <td><?= htmlspecialchars($fila['SLOT_PUERTO']) ?></td>
                                    <td><?= htmlspecialchars($fila['CS_TEL']) ?></td>
                                    <td><?= htmlspecialchars($fila['TIPO_DE_GESTION']) ?></td>
                                    <td><?= htmlspecialchars($fila['ESTADO']) ?></td>
                                    <td><?= htmlspecialchars($fila['ESTADO_SUMA']) ?></td>
                                    <td><?= htmlspecialchars($fila['DIAGNOSTICO']) ?></td>
                                    <td><?= htmlspecialchars($fila['REQUIERE_CONTACTO']) ?></td>
                                    <td><?= htmlspecialchars($fila['COMUNICACION']) ?></td>
                                    <td><?= htmlspecialchars($fila['MEDIOS']) ?></td>
                                    <td><?= htmlspecialchars($fila['CANTIDAD_DE_INTENTOS']) ?></td>
                                    <td><?= htmlspecialchars($fila['SOPORTE_PREVENTIVO']) ?></td>
                                    <td><?= htmlspecialchars($fila['SOLUCION']) ?></td>
                                    <td><?= htmlspecialchars($fila['NIVEL']) ?></td>
                                    <td><?= htmlspecialchars($fila['PQR']) ?></td>
                                    <td><?= htmlspecialchars($fila['SEGUIMIENTO']) ?></td>
                                    <td><?= htmlspecialchars($fila['MONITOR']) ?></td>
                                    <td><?= htmlspecialchars($fila['FECH_Y_HORA_INICIO']) ?></td>
                                    <td><?= htmlspecialchars($fila['FECH_Y_HORA_FIN']) ?></td>
                                    <td><?= htmlspecialchars($fila['OBSERVACIONES']) ?></td>
                                    <td>
                                        <form action="" method="GET">
                                            <input type="hidden" name="delete_id" value="<?= $fila['id_Cli'] ?>" />
                                            <button type="submit" class="btn-prima" style="right: 15px; bottom: 12px;" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="21">No se encontraron resultados.</td>
                            </tr>
                        <?php endif; ?>
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
