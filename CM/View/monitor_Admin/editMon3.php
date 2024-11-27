<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_new2.css">
    <link rel="stylesheet" href="../css/comp2.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Gestionar Ahora (MASIVO)</title>
</head>
<body>

<?php
    include('../components/dashboard_Admin.php');
?>

<div class="container-general">

    <div class="label1">
        <form action="editMon3.php" method="POST">
        <div style="display: flex;">
            <?php
                include('../../Model/conexion.php');

                // Consulta para obtener las ubicaciones
                $sqlUbi = "SELECT id_Ubi, equi_Ubi FROM ubicacion";
                $resultUbi = $conn->query($sqlUbi);

                // Consulta para obtener los slots
                $sqlSlot = "SELECT id_Cli, slot_Cli FROM cliente";
                $resultSlot = $conn->query($sqlSlot);
            ?>
            <!-- Filtro por Ubicación -->
            <div>
                <p>UBICACION</p>
                <select name="id_Ubi" id="ubicacion" class="dat2" style="width: 302px;">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultUbi->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultUbi->fetch_assoc()) {
                            echo '<option value="' . $row['id_Ubi'] . '">' . $row['equi_Ubi'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay ubicaciones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Filtro por Slot -->
            <div style="margin-left: 35px;">
                <p>SLOT</p>
                <select name="id_Slot" id="slot" class="dat2" style="width: 302px;">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultSlot->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultSlot->fetch_assoc()) {
                            echo '<option value="' . $row['slot_Cli'] . '">' . $row['slot_Cli'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay slots disponibles</option>';
                    }
                    ?>
                </select>
            </div>

                <?php
                // Cerrar la conexión
                $conn->close();
                ?>
                
            </div>
                <div class="ini-b" style="right: 940px;">
                    <button class="btn-prima" style="left: 1070px;" type="submit">BUSCAR</button>
                </div>
            </form>
    </div>

    <button style="left: 835px;" class="btn-second" type="button" onclick="redit3();">LIMPIAR</button>

    <div style="position: relative; bottom: 100px;">
        <div class="acti">
            <button id="downloadPdf" style="display: none;">PDF</button>
            <button id="exportButton">CVS</button>
        </div>

        <?php
        include('../../Model/conexion.php');

        // Conexión a la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Manejo de errores de conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Inicializamos la consulta base
        $consulta = "SELECT 
                        cli.id_Cli,
                        cli.ont_Cli AS ID_ONT, 
                        cli.slot_Cli AS SLOT_PUERTO, 
                        cli.cst_Cli AS CS_TEL, 
                        ges.nom_Ges AS TIPO_DE_GESTION, 
                        est.nom_Est AS ESTADO,
                        dia.nom_Dia AS DIAGNOSTICO,
                        sop.tip_Sop AS SOPORTE_PREVENTIVO,
                        sol.tip_Sol AS SOLUCION,
                        niv.tip_Niv AS NIVEL,
                        cli.pqr_Cli AS PQR, 
                        seg.tip_Seg AS SEGUIMIENTO,
                        rea.tip_Rea AS REAPROVISIONAMIENTO,
                        cli.fechyhorini_Cli AS FECH_Y_HORA_INICIO 
                    FROM 
                        cliente cli
                    INNER JOIN 
                        rol ON cli.id_Rol = rol.id_Rol
                    INNER JOIN 
                        estado est ON cli.id_Est = est.id_Est
                    INNER JOIN 
                        gestion ges ON cli.id_Ges = ges.id_Ges
                    INNER JOIN 
                        diagnostico dia ON cli.id_Dia = dia.id_Dia
                    INNER JOIN 
                        soporte sop ON cli.id_Sop = sop.id_Sop
                    INNER JOIN 
                        solucion sol ON cli.id_Sol = sol.id_Sol
                    INNER JOIN 
                        nivel niv ON cli.id_Niv = niv.id_Niv
                    INNER JOIN 
                        seguimiento seg ON cli.id_Seg = seg.id_Seg
                    INNER JOIN 
                        reaprovisionamiento rea ON cli.id_Rea = rea.id_Rea";

        $checked = '';

        // Filtrar por Slot si se ha seleccionado
        if (isset($_POST['id_Slot']) && !empty($_POST['id_Slot'])) {
            $slot_seleccionado = $_POST['id_Slot'];
            // Filtramos por el slot seleccionado
            $consulta .= " WHERE cli.slot_Cli = '$slot_seleccionado'";
            $checked = 'checked';      
        }

        // Filtrar por Ubicación si se ha seleccionado
        if (isset($_POST['id_Ubi']) && !empty($_POST['id_Ubi'])) {
            $id_ubicacion = $_POST['id_Ubi'];
            $consulta .= " WHERE cli.id_Ubi = $id_ubicacion";
            $checked = 'checked';          
        }

        // Ejecutar la consulta
        $result = $conexion->query($consulta);

        // Cerrar la conexión
        $conexion->close();
        ?>

<form id="form_no" method="POST" action="editMon3.php">
    <div class="connew-2" id="connew2-2" style="height: 580px; overflow-y: scroll;">
        <div class="table-product" id="con-sopo-inter">
            <div class="con-table2">
                <table class="table-general table-sopor table-produc" id="dataTable">
                    <tr>
                        <th>SELECCION</th>
                        <th>ID_ONT</th>
                        <th>SLOT_PUERTO</th>
                        <th>CS_TEL</th>
                        <th>TIPO_DE_GESTION</th>
                        <th>ESTADO</th>
                        <th>REAPROVISIONAMIENTO</th>
                        <th>DIAGNOSTICO</th>
                        <th>SOPORTE_PREVENTIVO</th>
                        <th>SOLUCION</th>
                        <th>NIVEL</th>
                        <th>PQR</th>
                        <th>SEGUIMIENTO</th>
                        <th>FECH_Y_HORA_INICIO</th>
                    </tr>
                    <tbody>
                    <?php
                        // Asumiendo que $result contiene los clientes
                        if ($result->num_rows > 0) {
                            while ($fila = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td style='padding-left: 35px; padding-top: 5px;'>
                                    <input type='checkbox' style='height: 25px; width: 25px;' name='seleccionados[]' value='" . $fila['id_Cli'] . "' $checked>
                                </td>";
                                echo "<td>" . htmlspecialchars($fila['ID_ONT']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['SLOT_PUERTO']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['CS_TEL']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['TIPO_DE_GESTION']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['ESTADO']) . "</td>";
                                echo "<td style='width: 200px; min-width: 200px;'>" . htmlspecialchars($fila['REAPROVISIONAMIENTO']) . "</td>";
                                echo "<td style='width: 200px; min-width: 200px;'>" . htmlspecialchars($fila['DIAGNOSTICO']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['SOPORTE_PREVENTIVO']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['SOLUCION']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['NIVEL']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['PQR']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['SEGUIMIENTO']) . "</td>";
                                echo "<td>" . htmlspecialchars($fila['FECH_Y_HORA_INICIO']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='13'>No se encontraron resultados para la búsqueda.</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="label1-2" style="height: 690px;">

        <?php
            include('../../Model/conexion.php');

            // Establecer conexión
            $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

            // Verificar conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Verificar si 'ontCli' está presente en GET (o POST si es el caso)
            if (isset($_GET['ontCli'])) {
                $ontCli = $_GET['ontCli'];
            } else {
                // Si no está presente, asignamos un valor por defecto o manejamos el error
                $ontCli = null; // O cualquier valor por defecto
                // O puedes redirigir al usuario a otra página o mostrar un mensaje de error
            }

            // Consulta para obtener el estado actual del cliente (si ontCli es válido)
            if ($ontCli) {
                $sqlCliente = "SELECT id_Est FROM cliente WHERE id_Cli = ?";
                $stmtCliente = $conexion->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli); // 's' para string
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                // Obtener el estado actual del cliente
                $idEstadoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idEstadoActual = $rowCliente['id_Est'];
                }
            }

            // Consulta para obtener todos los estados disponibles
            $sql = "SELECT id_Est, nom_Est FROM estado";
            $result = $conexion->query($sql);
        ?>

        <?php
            include('../../Model/conexion.php');

            // Establecer conexión con la base de datos
            $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Verificar si el formulario fue enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
                $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

                // Verificar si se seleccionó un nuevo estado
                if (isset($_POST['id_Est']) && !empty($_POST['id_Est'])) {
                    $nuevoEstado = $_POST['id_Est']; // ID del nuevo estado

                    // Verificar si el nuevo estado existe en la tabla 'estado'
                    $sqlEstado = "SELECT id_Est FROM estado WHERE id_Est = ?";
                    $stmtEstado = $conexion->prepare($sqlEstado);
                    $stmtEstado->bind_param("i", $nuevoEstado); // 'i' para integer
                    $stmtEstado->execute();
                    $resultEstado = $stmtEstado->get_result();

                    // Si el estado no existe, mostramos un mensaje de error y no hacemos el update
                    if ($resultEstado->num_rows == 0) {
                        echo "El nuevo estado seleccionado no existe. Por favor, selecciona un estado válido.";
                        exit; // Detenemos la ejecución del script
                    }

                    // Actualizar el estado de los clientes seleccionados solo si el estado existe
                    $sqlUpdate = "UPDATE cliente SET id_Est = ? WHERE id_Cli = ?";
                    $stmtUpdate = $conexion->prepare($sqlUpdate);

                    if ($stmtUpdate) {
                        foreach ($clientesSeleccionados as $idCliente) {
                            $stmtUpdate->bind_param("ii", $nuevoEstado, $idCliente); // 'ii' para integer
                            $stmtUpdate->execute();
                        }

                        $stmtUpdate->close();
                    }

                    $stmtEstado->close();
                } else {
                    // echo "No se seleccionó un nuevo estado.";
                }
            }
        ?>

            <div class="item-1">
                <p class="lp1" style="left: 15px; top: 0px;">ESTADO</p>
                <select name="id_Est" id="estado" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el estado actual
                            $selected = ($row['id_Est'] == $idEstadoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Est'] . '" ' . $selected . '>' . $row['nom_Est'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay estados disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod2" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>

            </div>

        <?php
            // Cerrar la declaración y la conexión
            if (isset($stmtCliente)) {
                $stmtCliente->close();
            }
            $conexion->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET (o POST si es el caso)
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
            // O puedes redirigir al usuario a otra página o mostrar un mensaje de error
        }

        // Consulta para obtener el seguimiento actual del cliente (si ontCli es válido)
        if ($ontCli) {
            $sqlCliente = "SELECT id_Seg FROM cliente WHERE ont_Cli = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);
            $stmtCliente->bind_param("s", $ontCli); // 's' para string
            $stmtCliente->execute();
            $resultCliente = $stmtCliente->get_result();

            // Obtener el seguimiento actual del cliente
            $idSeguimientoActual = null;
            if ($resultCliente->num_rows > 0) {
                $rowCliente = $resultCliente->fetch_assoc();
                $idSeguimientoActual = $rowCliente['id_Seg'];
            }
        }

        // Consulta para obtener todos los seguimientos disponibles
        $sqlSeguimiento = "SELECT id_Seg, tip_Seg FROM seguimiento";
        $resultSeguimiento = $conexion->query($sqlSeguimiento);
        ?>

        <?php
            // Establecer conexión con la base de datos
            $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Verificar si se ha enviado el formulario y si los campos necesarios están presentes
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
                $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

                // Verificar si se seleccionó un nuevo seguimiento
                if (isset($_POST['id_Seg']) && !empty($_POST['id_Seg'])) {
                    $nuevoSeguimiento = $_POST['id_Seg']; // ID del nuevo seguimiento

                    // Verificar si el nuevo seguimiento existe en la tabla 'seguimiento'
                    $sqlSeguimiento = "SELECT id_Seg FROM seguimiento WHERE id_Seg = ?";
                    $stmtSeguimiento = $conexion->prepare($sqlSeguimiento);
                    $stmtSeguimiento->bind_param("i", $nuevoSeguimiento); // 'i' para integer
                    $stmtSeguimiento->execute();
                    $resultSeguimiento = $stmtSeguimiento->get_result();

                    // Si el seguimiento no existe, mostramos un mensaje de error y no hacemos el update
                    if ($resultSeguimiento->num_rows == 0) {
                        echo "El nuevo seguimiento seleccionado no existe. Por favor, selecciona un seguimiento válido.";
                        exit; // Detenemos la ejecución del script
                    }

                    // Actualizar el seguimiento de los clientes seleccionados solo si el seguimiento existe
                    $sqlUpdate = "UPDATE cliente SET id_Seg = ? WHERE id_Cli = ?";
                    $stmtUpdate = $conexion->prepare($sqlUpdate);

                    if ($stmtUpdate) {
                        foreach ($clientesSeleccionados as $idCliente) {
                            $stmtUpdate->bind_param("ii", $nuevoSeguimiento, $idCliente); // 'ii' para integer
                            $stmtUpdate->execute();
                        }

                        $stmtUpdate->close();
                    }

                    $stmtSeguimiento->close();
                } else {
                    // echo "No se seleccionó un nuevo seguimiento.";
                }
            }
        ?>

        <!-- Formulario de selección de Seguimiento -->
        <div class="item-2">
            <p class="lp1" style="right: 85px; top: 0px;">SEGUIMIENTO</p>
                <select name="id_Seg" id="id_Seg" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultSeguimiento->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultSeguimiento->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el seguimiento actual
                            $selected = ($row['id_Seg'] == $idSeguimientoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Seg'] . '" ' . $selected . '>' . $row['tip_Seg'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay seguimientos disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod3" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET (o POST si es el caso)
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
            // O puedes redirigir al usuario a otra página o mostrar un mensaje de error
        }

        // Consulta para obtener la gestión actual del cliente (si ontCli es válido)
        if ($ontCli) {
            $sqlCliente = "SELECT id_Ges FROM cliente WHERE ont_Cli = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);
            $stmtCliente->bind_param("s", $ontCli); // 's' para string
            $stmtCliente->execute();
            $resultCliente = $stmtCliente->get_result();

            // Obtener la gestión actual del cliente
            $idGestionActual = null;
            if ($resultCliente->num_rows > 0) {
                $rowCliente = $resultCliente->fetch_assoc();
                $idGestionActual = $rowCliente['id_Ges'];
            }
        }

        // Consulta para obtener todas las gestiones disponibles
        $sqlGestion = "SELECT id_Ges, nom_Ges FROM gestion";
        $resultGestion = $conexion->query($sqlGestion);
        ?>

        <?php
            // Establecer conexión con la base de datos
            $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Verificar si se ha enviado el formulario y si los campos necesarios están presentes
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
                $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

                // Verificar si se seleccionó una nueva gestión
                if (isset($_POST['id_Ges']) && !empty($_POST['id_Ges'])) {
                    $nuevaGestion = $_POST['id_Ges']; // ID de la nueva gestión

                    // Verificar si la gestión seleccionada existe en la tabla 'gestion'
                    $sqlGestion = "SELECT id_Ges FROM gestion WHERE id_Ges = ?";
                    $stmtGestion = $conexion->prepare($sqlGestion);
                    $stmtGestion->bind_param("i", $nuevaGestion); // 'i' para integer
                    $stmtGestion->execute();
                    $resultGestion = $stmtGestion->get_result();

                    // Si la gestión no existe, mostramos un mensaje de error y no hacemos el update
                    if ($resultGestion->num_rows == 0) {
                        echo "La gestión seleccionada no existe. Por favor, selecciona una gestión válida.";
                        exit; // Detenemos la ejecución del script
                    }

                    // Actualizar la gestión de los clientes seleccionados solo si la gestión existe
                    $sqlUpdate = "UPDATE cliente SET id_Ges = ? WHERE id_Cli = ?";
                    $stmtUpdate = $conexion->prepare($sqlUpdate);

                    if ($stmtUpdate) {
                        foreach ($clientesSeleccionados as $idCliente) {
                            $stmtUpdate->bind_param("ii", $nuevaGestion, $idCliente); // 'ii' para integer
                            $stmtUpdate->execute();
                        }

                        $stmtUpdate->close();
                    }

                    $stmtGestion->close();
                } else {
                    // echo "No se seleccionó una nueva gestión.";
                }
            }
        ?>

        <!-- Formulario de selección de Gestión -->
        <div class="item-3">
            <p class="lp1" style="right: 125px; top: 0px;">GESTION</p>
                <select name="id_Ges" id="id_Ges" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultGestion->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultGestion->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con la gestión actual
                            $selected = ($row['id_Ges'] == $idGestionActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Ges'] . '" ' . $selected . '>' . $row['nom_Ges'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay gestiones disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod4" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>

        <!-- Formulario de ingreso de PQR -->
        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET (o POST si es el caso)
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
        }

        // Consulta para obtener el valor de PQR si ontCli es válido
        $pqrValor = null;
        if ($ontCli) {
            $sqlClientePqr = "SELECT pqr_Cli FROM cliente WHERE id_Cli = ?";
            $stmtPqr = $conexion->prepare($sqlClientePqr);
            $stmtPqr->bind_param("s", $ontCli); // 's' para string
            $stmtPqr->execute();
            $resultPqr = $stmtPqr->get_result();

            // Obtener el valor de pqr_Cli si existe
            if ($resultPqr->num_rows > 0) {
                $rowPqr = $resultPqr->fetch_assoc();
                $pqrValor = $rowPqr['pqr_Cli'];
            }

            $stmtPqr->close();
        }

        ?>

        <?php
            // Verificar si se ha enviado el formulario y si los campos necesarios están presentes
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pqr_Cli']) && isset($_POST['seleccionados'])) {
                // Obtener el nuevo valor de pqr_Cli y los clientes seleccionados
                $nuevoPqr = $_POST['pqr_Cli']; // Nuevo valor de pqr_Cli
                $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

                // Establecer conexión con la base de datos
                $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
                
                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Verificar si el nuevo valor de pqr_Cli existe en la tabla correspondiente
                $sqlPqr = "SELECT pqr_Cli FROM cliente WHERE id_Cli = ?";
                $stmtPqr = $conexion->prepare($sqlPqr);
                $stmtPqr->bind_param("i", $nuevoPqr); // 'i' para integer
                $stmtPqr->execute();
                $resultPqr = $stmtPqr->get_result();

                // Crear una consulta para actualizar el valor de pqr_Cli para todos los clientes seleccionados
                $sqlUpdatePqr = "UPDATE cliente SET pqr_Cli = ? WHERE id_Cli = ?";

                if ($stmtUpdatePqr = $conexion->prepare($sqlUpdatePqr)) {
                    // Iterar sobre los clientes seleccionados y actualizar su pqr_Cli
                    foreach ($clientesSeleccionados as $idCliente) {
                        // Asegurarse de que $idCliente es un entero, y $nuevoPqr es una cadena
                        $stmtUpdatePqr->bind_param("si", $nuevoPqr, $idCliente); // 's' para string, 'i' para integer
                        $stmtUpdatePqr->execute();
                    }

                    // Cerrar la declaración
                    $stmtUpdatePqr->close();
                } else {
                    // En caso de error en la preparación de la consulta
                    // echo "Error al preparar la consulta: " . $conexion->error;
                }
            }
        ?>

        <div class="item-4">
            <p class="lp1" style="right: 170px; top: 0px;">PQR</p>
            <input class="dat2" style="top: 0; right: 255px;" type="text" name="pqr_Cli" id="pqr" value="<?php echo htmlspecialchars($pqrValor); ?>" placeholder="Ingresa la PQR MASIVA">
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtPqr)) {
            $stmtPqr->close();
        }
        $conexion->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
        }

        // Consulta para obtener el nivel actual del cliente (si ontCli es válido)
        if ($ontCli) {
            $sqlCliente = "SELECT id_Niv FROM cliente WHERE ont_Cli = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);
            $stmtCliente->bind_param("s", $ontCli); // 's' para string
            $stmtCliente->execute();
            $resultCliente = $stmtCliente->get_result();

            // Obtener el nivel actual del cliente
            $idNivelActual = null;
            if ($resultCliente->num_rows > 0) {
                $rowCliente = $resultCliente->fetch_assoc();
                $idNivelActual = $rowCliente['id_Niv'];
            }
        }

        // Consulta para obtener todos los niveles disponibles
        $sqlNivel = "SELECT id_Niv, tip_Niv FROM nivel";
        $resultNivel = $conexion->query($sqlNivel);
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión con la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
            $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

            // Verificar si se seleccionó un nuevo nivel
            if (isset($_POST['id_Niv']) && !empty($_POST['id_Niv'])) {
                $nuevoNivel = $_POST['id_Niv']; // ID del nuevo nivel

                // Verificar si el nuevo nivel existe en la tabla 'nivel'
                $sqlNivel = "SELECT id_Niv FROM nivel WHERE id_Niv = ?";
                $stmtNivel = $conexion->prepare($sqlNivel);
                $stmtNivel->bind_param("i", $nuevoNivel); // 'i' para integer
                $stmtNivel->execute();
                $resultNivel = $stmtNivel->get_result();

                // Si el nivel existe, actualizamos el nivel de los clientes seleccionados
                $clientesSeleccionados = implode(',', array_map('intval', $clientesSeleccionados)); // Asegura que todos los IDs sean enteros
                $sqlUpdate = "UPDATE cliente SET id_Niv = ? WHERE id_Cli IN ($clientesSeleccionados)";
                $stmtUpdate = $conexion->prepare($sqlUpdate);

                if ($stmtUpdate) {
                    $stmtUpdate->bind_param("i", $nuevoNivel);
                    $stmtUpdate->execute();

                    if ($stmtUpdate->affected_rows > 0) {
                        // echo "Se han actualizado los niveles de " . $stmtUpdate->affected_rows . " clientes.";
                    } else {
                        // echo "No se realizaron cambios en los clientes seleccionados.";
                    }

                    $stmtUpdate->close();
                } else {
                    // echo "Error al preparar la consulta de actualización.";
                }

                $stmtNivel->close();
            } else {
            // echo "No se seleccionó un nuevo nivel.";
            }
        } else {
            // echo "No se seleccionaron clientes.";
        }

        ?>

        <!-- Formulario de selección de Nivel -->
        <div class="item-5">
            <p class="lp2" style="right: 1620px; top: 180px;">NIVEL</p>
                <select name="id_Niv" id="id_Nivel" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultNivel->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultNivel->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el nivel actual
                            $selected = ($row['id_Niv'] == $idNivelActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Niv'] . '" ' . $selected . '>' . $row['tip_Niv'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay niveles disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod6" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
        }

        // Consulta para obtener el diagnóstico actual del cliente (si ontCli es válido)
        if ($ontCli) {
            $sqlCliente = "SELECT id_Dia FROM cliente WHERE ont_Cli = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);
            $stmtCliente->bind_param("s", $ontCli); // 's' para string
            $stmtCliente->execute();
            $resultCliente = $stmtCliente->get_result();

            // Obtener el diagnóstico actual del cliente
            $idDiagnosticoActual = null;
            if ($resultCliente->num_rows > 0) {
                $rowCliente = $resultCliente->fetch_assoc();
                $idDiagnosticoActual = $rowCliente['id_Dia'];
            }
        }

        // Consulta para obtener todos los diagnósticos disponibles
        $sqlDiagnostico = "SELECT id_Dia, nom_Dia FROM diagnostico";
        $resultDiagnostico = $conexion->query($sqlDiagnostico);
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión con la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
            $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

            // Verificar si se seleccionó un nuevo diagnóstico
            if (isset($_POST['id_Dia']) && !empty($_POST['id_Dia'])) {
                $nuevoDiagnostico = $_POST['id_Dia']; // ID del nuevo diagnóstico

                // Verificar si el nuevo diagnóstico existe en la tabla 'diagnostico'
                $sqlDiagnostico = "SELECT id_Dia FROM diagnostico WHERE id_Dia = ?";
                $stmtDiagnostico = $conexion->prepare($sqlDiagnostico);
                $stmtDiagnostico->bind_param("i", $nuevoDiagnostico); // 'i' para integer
                $stmtDiagnostico->execute();
                $resultDiagnostico = $stmtDiagnostico->get_result();

                // Si el diagnóstico existe, actualizamos el diagnóstico de los clientes seleccionados
                $clientesSeleccionados = implode(',', array_map('intval', $clientesSeleccionados)); // Asegura que todos los IDs sean enteros
                $sqlUpdate = "UPDATE cliente SET id_Dia = ? WHERE id_Cli IN ($clientesSeleccionados)";
                $stmtUpdate = $conexion->prepare($sqlUpdate);

                if ($stmtUpdate) {
                    $stmtUpdate->bind_param("i", $nuevoDiagnostico);
                    $stmtUpdate->execute();

                    if ($stmtUpdate->affected_rows > 0) {
                        // echo "Se han actualizado los diagnósticos de " . $stmtUpdate->affected_rows . " clientes.";
                    } else {
                        // echo "No se realizaron cambios en los clientes seleccionados.";
                    }

                    $stmtUpdate->close();
                } else {
                    // echo "Error al preparar la consulta de actualización.";
                }

                $stmtDiagnostico->close();
            } else {
                // echo "No se seleccionó un nuevo diagnóstico.";
            }
        } else {
            // echo "No se seleccionaron clientes.";
        }
        ?>

        <!-- Formulario de selección de Diagnóstico -->
        <div class="item-6">
            <p class="lp2" style="right: 1730px; top: 180px;">DIAGNOSTICO</p>
                <select name="id_Dia" id="diagnostico" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultDiagnostico->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultDiagnostico->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el diagnóstico actual
                            $selected = ($row['id_Dia'] == $idDiagnosticoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Dia'] . '" ' . $selected . '>' . $row['nom_Dia'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay diagnósticos disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod7" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
        }

        // Consulta para obtener el reaprovisionamiento actual del cliente (si ontCli es válido)
        if ($ontCli) {
            $sqlCliente = "SELECT id_Rea FROM cliente WHERE ont_Cli = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);
            $stmtCliente->bind_param("s", $ontCli); // 's' para string
            $stmtCliente->execute();
            $resultCliente = $stmtCliente->get_result();

            // Obtener el reaprovisionamiento actual del cliente
            $idReaprovisionamientoActual = null;
            if ($resultCliente->num_rows > 0) {
                $rowCliente = $resultCliente->fetch_assoc();
                $idReaprovisionamientoActual = $rowCliente['id_Rea'];
            }
        }

        // Consulta para obtener todos los reaprovisionamientos disponibles
        $sqlReaprovisionamiento = "SELECT id_Rea, tip_Rea FROM reaprovisionamiento";
        $resultReaprovisionamiento = $conexion->query($sqlReaprovisionamiento);
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión con la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
            $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

            // Verificar si se seleccionó un nuevo reaprovisionamiento
            if (isset($_POST['id_Rea']) && !empty($_POST['id_Rea'])) {
                $nuevoReaprovisionamiento = $_POST['id_Rea']; // ID del nuevo reaprovisionamiento

                // Verificar si el nuevo reaprovisionamiento existe en la tabla 'reaprovisionamiento'
                $sqlReaprovisionamiento = "SELECT id_Rea FROM reaprovisionamiento WHERE id_Rea = ?";
                $stmtReaprovisionamiento = $conexion->prepare($sqlReaprovisionamiento);
                $stmtReaprovisionamiento->bind_param("i", $nuevoReaprovisionamiento); // 'i' para integer
                $stmtReaprovisionamiento->execute();
                $resultReaprovisionamiento = $stmtReaprovisionamiento->get_result();

                // Si el reaprovisionamiento existe, actualizamos el reaprovisionamiento de los clientes seleccionados
                $clientesSeleccionados = implode(',', array_map('intval', $clientesSeleccionados)); // Asegura que todos los IDs sean enteros
                $sqlUpdate = "UPDATE cliente SET id_Rea = ? WHERE id_Cli IN ($clientesSeleccionados)";
                $stmtUpdate = $conexion->prepare($sqlUpdate);

                if ($stmtUpdate) {
                    $stmtUpdate->bind_param("i", $nuevoReaprovisionamiento);
                    $stmtUpdate->execute();

                    if ($stmtUpdate->affected_rows > 0) {
                        // echo "Se han actualizado los reaprovisionamientos de " . $stmtUpdate->affected_rows . " clientes.";
                    } else {
                        // echo "No se realizaron cambios en los clientes seleccionados.";
                    }

                    $stmtUpdate->close();
                } else {
                    // echo "Error al preparar la consulta de actualización.";
                }

                $stmtReaprovisionamiento->close();
            } else {
                // echo "No se seleccionó un nuevo reaprovisionamiento.";
            }
        } else {
            // echo "No se seleccionaron clientes.";
        }

        ?>

        <!-- Formulario de selección de Reaprovisionamiento -->
        <div class="item-7" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 605px; top: -10px;">REAPROVISIONAMIENTO</p>
                <select name="id_Rea" id="reaprovisionamiento" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultReaprovisionamiento->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultReaprovisionamiento->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el reaprovisionamiento actual
                            $selected = ($row['id_Rea'] == $idReaprovisionamientoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Rea'] . '" ' . $selected . '>' . $row['tip_Rea'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod8" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

        // Verificar conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si 'ontCli' está presente en GET
        if (isset($_GET['ontCli'])) {
            $ontCli = $_GET['ontCli'];
        } else {
            // Si no está presente, asignamos un valor por defecto o manejamos el error
            $ontCli = null; // O cualquier valor por defecto
        }

        // Consulta para obtener la solución actual del cliente (si ontCli es válido)
        if ($ontCli) {
            $sqlCliente = "SELECT id_Sol FROM cliente WHERE ont_Cli = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);
            $stmtCliente->bind_param("s", $ontCli); // 's' para string
            $stmtCliente->execute();
            $resultCliente = $stmtCliente->get_result();

            // Obtener la solución actual del cliente
            $idSolActual = null;
            if ($resultCliente->num_rows > 0) {
                $rowCliente = $resultCliente->fetch_assoc();
                $idSolActual = $rowCliente['id_Sol'];
            }
        }

        // Consulta para obtener todas las soluciones disponibles
        $sqlSol = "SELECT id_Sol, tip_Sol FROM solucion";
        $resultSol = $conexion->query($sqlSol);
        ?>

        <?php
        include('../../Model/conexion.php');

        // Establecer conexión con la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si el formulario fue enviado y si se seleccionaron clientes
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
            $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

            // Verificar si se seleccionó una nueva solución
            if (isset($_POST['id_Sol']) && !empty($_POST['id_Sol'])) {
                $nuevaSolucion = $_POST['id_Sol']; // ID de la nueva solución

                // Verificar si la nueva solución existe en la tabla 'solucion'
                $sqlSolucion = "SELECT id_Sol FROM solucion WHERE id_Sol = ?";
                $stmtSolucion = $conexion->prepare($sqlSolucion);
                $stmtSolucion->bind_param("i", $nuevaSolucion); // 'i' para integer
                $stmtSolucion->execute();
                $resultSolucion = $stmtSolucion->get_result();

                // Actualizar la solución de los clientes seleccionados solo si la solución existe
                $sqlUpdate = "UPDATE cliente SET id_Sol = ? WHERE id_Cli = ?";
                $stmtUpdate = $conexion->prepare($sqlUpdate);

                if ($stmtUpdate) {
                    foreach ($clientesSeleccionados as $idCliente) {
                        $stmtUpdate->bind_param("ii", $nuevaSolucion, $idCliente); // 'ii' para integer
                        $stmtUpdate->execute();
                    }

                    $stmtUpdate->close();
                }

                $stmtSolucion->close();
            } else {
                // echo "No se seleccionó una solución válida.";
            }
        }
        ?>

        <!-- Formulario de selección de Solución -->
        <div class="item-8" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 605px; top: -10px;">SOLUCION</p>
                <select name="id_Sol" id="sol" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($resultSol->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $resultSol->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con la solución actual
                            $selected = ($row['id_Sol'] == $idSolActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Sol'] . '" ' . $selected . '>' . $row['tip_Sol'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones disponibles</option>';
                    }
                    ?>
                </select>
                <button class="btn-six" id="cod9" style="display: none;">
                    <img src="../images/icons/cod.png" alt="">
                </button>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>

        <?php
        // Incluir la conexión a la base de datos
        include('../../Model/conexion.php');

        // Establecer conexión con la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'monitoreo');
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Verificar si el formulario fue enviado y si se seleccionaron clientes
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seleccionados'])) {
            $clientesSeleccionados = $_POST['seleccionados']; // Array de ids de clientes

            // Verificar que al menos un cliente ha sido seleccionado
            if (!empty($clientesSeleccionados)) {

                // Sentencia SQL para actualizar la fecha y hora de inicio para todos los clientes seleccionados
                $sqlUpdate = "UPDATE cliente SET fechyhorini_Cli = NOW() WHERE id_Cli = ?";

                // Preparar la consulta
                $stmtUpdate = $conexion->prepare($sqlUpdate);
                if ($stmtUpdate) {
                    // Iterar sobre los clientes seleccionados y actualizar la fecha y hora
                    foreach ($clientesSeleccionados as $idCliente) {
                        // Vinculamos el parámetro 'i' para el idCliente
                        $stmtUpdate->bind_param("i", $idCliente);  // Solo se pasa el idCliente, ya que NOW() es gestionado por MySQL

                        // Ejecutamos la consulta para cada cliente
                        if ($stmtUpdate->execute()) {
                            // echo "La fecha y hora de inicio se ha registrado correctamente para el cliente con id: $idCliente.<br>";
                        } else {
                            // echo "Error al registrar la fecha y hora para el cliente con id: $idCliente. " . $stmtUpdate->error . "<br>";
                        }
                    }

                    // Cerrar la declaración
                    $stmtUpdate->close();
                } else {
                    echo "Error al preparar la consulta: " . $conexion->error;
                }
            } else {
                // echo "No se han seleccionado clientes.";
            }
        } else {
            // echo "No se recibieron datos del formulario.";
        }

        ?>

        <div class="item-9" style="right: 1230px; position: relative; top: 160px;">
            <p class="lp2" style="right: 2055px; top: 180px;">OBSERVACIONES</p>
            <textarea class="dat2" name="obs_Cli" id="observaciones" placeholder="Escribe tus observaciones aquí..."></textarea>
        </div>

        <?php
        // Cerrar la declaración y la conexión
        if (isset($stmtCliente)) {
            $stmtCliente->close();
        }
        $conexion->close();
        ?>

        <div class="item-92" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 2055px; top: 150px;">FECHA Y HORA INICIO</p>
            <input class="dat2" type="datetime-local" name="fechyhorini_Cli" id="fecha_hora_inicio">
        </div>

        <button class="btn-five2" type="submit" style="margin-top: 1270px; margin-left: 40px; width: 1245px; position: absolute;">EDITAR</button>

    </div>

</form>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/edit.js"></script>    
<script src="../../Controller/gen.js"></script> 

</body>
</html>