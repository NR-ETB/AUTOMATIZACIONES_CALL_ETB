<?php
include('../../Model/conexion.php');

$conexion = new mysqli('localhost', 'root', '', 'monitoreo');

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// ID del registro a actualizar (suponiendo que se obtiene de un formulario)
$ontCli = $_GET['ont_Cli'] ?? null; // Aquí capturamos el ont_Cli

// Arreglo para almacenar la consulta SQL y los parámetros
$setClauses = [];
$params = [];
$paramTypes = '';

// Lista de campos que se pueden actualizar
$updatableFields = [
    'id_Est', 'id_Seg', 'id_Ges', 
    'id_Mon', 'id_Med', 'id_Com', 
    'id_Sub', 'id_Con', 'id_Estf', 
    'id_Sop', 'id_Niv', 'id_Inte', 
    'id_Dia', 'id_Rea', 'id_Ubi', 
    'id_Sum', 'id_Sol', 
    'slot_Cli', 'cst_Cli', 
    'pqr_Cli', 'obs_Cli', 
    'fechyhorini_Cli', 'fechyhorfin_Cli'
];

// Verificar qué parámetros están presentes y construir la consulta
foreach ($updatableFields as $field) {
    if (isset($_GET[$field]) && !empty($_GET[$field])) {
        $setClauses[] = "$field = ?";
        $params[] = $_GET[$field];
        $paramTypes .= 's'; // Asumimos que todos son strings; ajusta según tus necesidades
    }
}

if (!empty($setClauses)) {
    // Crear la consulta SQL
    $sql = "UPDATE cliente SET " . implode(", ", $setClauses) . " WHERE ont_Cli = ?";
    $params[] = $ontCli; // Agregar el ontCli como parámetro para el WHERE
    $paramTypes .= 's'; // Agregar tipo de dato para el ontCli

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Bindear parámetros
    $stmt->bind_param($paramTypes, ...$params);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Cliente actualizado exitosamente.";
    } else {
        echo "Error al actualizar cliente: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_new2.css">
    <link rel="stylesheet" href="../css/comp.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Editar Ahora</title>
</head>
<body>

<?php
    include('../components/dashboard.php');
?>

<div class="container-general">

    <div class="label1">
        <form action="editMon.php" method="POST"> <!-- Cambiado a POST -->
                <div>
                    <p>ID ONT:</p>
                    <input id="telefonoInput" class="dat" type="tel" name="ont" placeholder="Ingresa la ID ONT aqui">
                </div>

                <div class="ini-b">
                    <button class="btn-prima" type="submit" onclick="searchcli();">BUSCAR</button>
                </div>
        </form>
    </div>

    <button class="btn-second" type="button" onclick="rsearch();">LIMPIAR</button>

    <!-- Vinculacion con el JavaScript del Proyecto -->
    <div>
        <script src="../bootstrap/jquery.js"></script>
        <script src="../bootstrap/bootstrap.bundle.min.js"></script>
        <script src="../../Controller/edit.js"></script>    
        <script src="../../Controller/gen.js"></script> 
    </div>

    <div>

        <form action="editMon.php" class="label1-2" method="GET">

            <?php
            include('../../Model/conexion.php');

            $conexion = new mysqli('localhost', 'root', '', 'monitoreo');

            // Verificar conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el estado actual del cliente
                $sqlCliente = "SELECT id_Est FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conexion->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idEstadoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idEstadoActual = $rowCliente['id_Est'];
                }

                // Consulta para obtener los estados
                $sql = "SELECT id_Est, nom_Est FROM estado";
                $result = $conexion->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
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
            $stmtCliente->close();
            $conn->close();
            ?>

            <div class="codigos2" id="codigo2" style="display: none;">
                        <ul>
                            <li>(1111) - COBRE</li>
                            <li>(1112) - FIBRA</li>
                        </ul>
            </div>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el seguimiento actual del cliente
                $sqlCliente = "SELECT id_Seg FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idSeguimientoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idSeguimientoActual = $rowCliente['id_Seg'];
                }

                // Consulta para obtener todos los seguimientos
                $sql = "SELECT id_Seg, tip_Seg FROM seguimiento";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-2">
                <p class="lp1" style="right: 85px; top: 0px;">SEGUIMIENTO</p>
                <select name="id_Seg" id="id_Seg" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
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
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener la gestión actual del cliente
                $sqlCliente = "SELECT id_Ges FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idGestionActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idGestionActual = $rowCliente['id_Ges'];
                }

                // Consulta para obtener todas las gestiones
                $sql = "SELECT id_Ges, nom_Ges FROM gestion";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-3">
                <p class="lp1" style="right: 125px; top: 0px;">GESTION</p>
                <select name="id_Ges" id="id_Ges" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con la gestión actual
                            $selected = ($row['id_Ges'] == $idGestionActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Ges'] . '" ' . $selected . '>' . $row['nom_Ges'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay gestiones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el monitor actual del cliente
                $sqlCliente = "SELECT id_Mon FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idMonitorActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idMonitorActual = $rowCliente['id_Mon'];
                }

                // Consulta para obtener todos los monitores
                $sql = "SELECT id_Mon, nom_Mon FROM monitor";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-4">
                <p class="lp1" style="right: 185px; top: 0px;">MONITOR</p>
                <select name="id_Mon" id="id_Mon" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el monitor actual
                            $selected = ($row['id_Mon'] == $idMonitorActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Mon'] . '" ' . $selected . '>' . $row['nom_Mon'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay monitores disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>  

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el id_Med actual del cliente
                $sqlCliente = "SELECT id_Med FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idMedActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idMedActual = $rowCliente['id_Med'];
                }

                // Consulta para obtener todos los medios
                $sql = "SELECT id_Med, nom_Med FROM medios";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-5">
                <p class="lp2" style="right: 1620px; top: 180px;">MEDIOS</p>
                <select name="id_Med" id="id_Med" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el id_Med actual
                            $selected = ($row['id_Med'] == $idMedActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Med'] . '" ' . $selected . '>' . $row['nom_Med'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay medios disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el id_Com actual del cliente
                $sqlCliente = "SELECT id_Com FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idComActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idComActual = $rowCliente['id_Com'];
                }

                // Consulta para obtener todas las opciones de comunicación
                $sql = "SELECT id_Com, nom_Com FROM comunicacion";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-6">
                <p class="lp2" style="right: 1740px; top: 180px;">COMUNICACION</p>
                <select name="id_Com" id="id_Com" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el id_Com actual
                            $selected = ($row['id_Com'] == $idComActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Com'] . '" ' . $selected . '>' . $row['nom_Com'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones de comunicación disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener la subcategoría actual del cliente
                $sqlCliente = "SELECT id_Sub FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idSubcategoriaActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idSubcategoriaActual = $rowCliente['id_Sub'];
                }

                // Consulta para obtener todas las subcategorías
                $sql = "SELECT id_Sub, nom_Sub FROM subcategoria";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-7" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 565px; top: -10px;">SUBCATEGORIA</p>
                <select name="id_Sub" id="id_Sub" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con la subcategoría actual
                            $selected = ($row['id_Sub'] == $idSubcategoriaActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Sub'] . '" ' . $selected . '>' . $row['nom_Sub'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay subcategorías disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el contacto actual del cliente
                $sqlCliente = "SELECT id_Con FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idContactoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idContactoActual = $rowCliente['id_Con'];
                }

                // Consulta para obtener todos los tipos de contacto
                $sql = "SELECT id_Con, tip_Con FROM contacto";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-8" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 605px; top: -10px;">CONTACTO</p>
                <select name="id_Con" id="id_Con" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el contacto actual
                            $selected = ($row['id_Con'] == $idContactoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Con'] . '" ' . $selected . '>' . $row['tip_Con'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones de contacto disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el estado final actual del cliente
                $sqlCliente = "SELECT id_Estf FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idEstadoFinalActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idEstadoFinalActual = $rowCliente['id_Estf'];
                }

                // Consulta para obtener todos los estados finales
                $sql = "SELECT id_Estf, nom_Estf FROM estado_final";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-9" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 2055px; top: 180px;">ESTADO FINAL</p>
                <select name="id_Estf" id="id_EstFinal" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el estado final actual
                            $selected = ($row['id_Estf'] == $idEstadoFinalActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Estf'] . '" ' . $selected . '>' . $row['nom_Estf'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay estados finales disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el tipo de soporte actual del cliente
                $sqlCliente = "SELECT id_Sop FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idSoporteActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idSoporteActual = $rowCliente['id_Sop'];
                }

                // Consulta para obtener todos los tipos de soporte
                $sql = "SELECT id_Sop, tip_Sop FROM soporte";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-10" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 2115px; top: 180px;">SOPORTE</p>
                <select name="id_Sop" id="id_Soporte" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el soporte actual
                            $selected = ($row['id_Sop'] == $idSoporteActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Sop'] . '" ' . $selected . '>' . $row['tip_Sop'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay tipos de soporte disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el nivel actual del cliente
                $sqlCliente = "SELECT id_Niv FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idNivelActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idNivelActual = $rowCliente['id_Niv'];
                }

                // Consulta para obtener todos los niveles
                $sql = "SELECT id_Niv, tip_Niv FROM nivel";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-11" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 2165px; top: 180px;">NIVEL</p>
                <select name="id_Niv" id="id_Nivel" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el nivel actual
                            $selected = ($row['id_Niv'] == $idNivelActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Niv'] . '" ' . $selected . '>' . $row['tip_Niv'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay niveles disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el intento actual del cliente
                $sqlCliente = "SELECT id_Inte FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idIntentoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idIntentoActual = $rowCliente['id_Inte'];
                }

                // Consulta para obtener todos los intentos
                $sql = "SELECT id_Inte, can_Inte FROM intentos";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-12" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 2240px; top: 180px;">INTENTOS</p>
                <select name="id_Inte" id="intentos" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el intento actual
                            $selected = ($row['id_Inte'] == $idIntentoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Inte'] . '" ' . $selected . '>' . $row['can_Inte'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay intentos disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el diagnóstico actual del cliente
                $sqlCliente = "SELECT id_Dia FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idDiagnosticoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idDiagnosticoActual = $rowCliente['id_Dia'];
                }

                // Consulta para obtener todos los diagnósticos
                $sql = "SELECT id_Dia, nom_Dia FROM diagnostico";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-13" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 3700px; top: 360px;">DIAGNOSTICO</p>
                <select name="id_Dia" id="diagnostico" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el diagnóstico actual
                            $selected = ($row['id_Dia'] == $idDiagnosticoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Dia'] . '" ' . $selected . '>' . $row['nom_Dia'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay diagnósticos disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el reaprovisionamiento actual del cliente
                $sqlCliente = "SELECT id_Rea FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idReaprovisionamientoActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idReaprovisionamientoActual = $rowCliente['id_Rea'];
                }

                // Consulta para obtener todas las opciones de reaprovisionamiento
                $sql = "SELECT id_Rea, tip_Rea FROM reaprovisionamiento";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-14" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 3825px; top: 360px;">REAPROVISIONAMIENTO</p>
                <select name="id_Rea" id="reaprovisionamiento" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el reaprovisionamiento actual
                            $selected = ($row['id_Rea'] == $idReaprovisionamientoActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Rea'] . '" ' . $selected . '>' . $row['tip_Rea'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener la ubicación actual del cliente
                $sqlCliente = "SELECT id_Ubi FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idUbicacionActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idUbicacionActual = $rowCliente['id_Ubi'];
                }

                // Consulta para obtener todas las ubicaciones
                $sql = "SELECT id_Ubi, equi_Ubi FROM ubicacion";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-15" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 3825px; top: 360px;">UBICACION</p>
                <select name="id_Ubi" id="ubicacion" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con la ubicación actual
                            $selected = ($row['id_Ubi'] == $idUbicacionActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Ubi'] . '" ' . $selected . '>' . $row['equi_Ubi'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay ubicaciones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el id_Sum actual del cliente
                $sqlCliente = "SELECT id_Sum FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idSumActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idSumActual = $rowCliente['id_Sum'];
                }

                // Consulta para obtener todas las opciones de suma
                $sql = "SELECT id_Sum, est_Sum FROM suma";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-16" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 3860px; top: 360px;">SUMA</p>
                <select name="id_Sum" id="suma" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el id_Sum actual
                            $selected = ($row['id_Sum'] == $idSumActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Sum'] . '" ' . $selected . '>' . $row['est_Sum'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener los datos del cliente
                $sqlCliente = "SELECT ont_Cli FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $ontValor = '';
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $ontValor = $rowCliente['ont_Cli']; // Guardar el valor existente
                }

                // Aquí puedes agregar otras consultas para obtener datos adicionales según sea necesario
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-17" style="right: 2430px; position: relative; top: 190px;">
                <p class="lp2" style="right: 4110px; top: 520px;">ID ONT</p>
                <input class="dat2" type="text" name="ont_Cli" id="id_ont" placeholder="Ingresa la ID ONT" value="<?php echo htmlspecialchars($ontValor); ?>">
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener los datos del cliente
                $sqlCliente = "SELECT slot_Cli FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $slotValor = '';
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $slotValor = $rowCliente['slot_Cli']; // Guardar el valor de SLOT/PUERTO
                }

                // Aquí puedes agregar otras consultas para obtener datos adicionales según sea necesario
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-18" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 5420px; top: 520px;">SLOT/PUERTO</p>
                <input class="dat2" type="text" name="slot_Cli" id="slot_puerto" placeholder="Ingresa el SLOT/PUERTO" value="<?php echo htmlspecialchars($slotValor); ?>">
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener los datos del cliente
                $sqlCliente = "SELECT cst_Cli FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $cstValor = '';
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $cstValor = $rowCliente['cst_Cli']; // Guardar el valor de CS-TEL
                }

                // Aquí puedes agregar otras consultas para obtener datos adicionales según sea necesario
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-19" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 5448px; top: 520px;">CS-TEL</p>
                <input class="dat2" type="text" name="cst_Cli" id="cs_tel" value="<?php echo htmlspecialchars($cstValor); ?>">
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener los datos del cliente, incluyendo PQR
                $sqlCliente = "SELECT pqr_Cli FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $pqrValor = '';
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $pqrValor = $rowCliente['pqr_Cli']; // Guardar el valor de PQR
                }

                // Aquí puedes agregar otras consultas para obtener datos adicionales según sea necesario
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-20" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 5490px; top: 520px;">PQR</p>
                <input class="dat2" type="text" name="pqr_Cli" id="pqr" value="<?php echo htmlspecialchars($pqrValor); ?>">
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el id_Sol actual del cliente
                $sqlCliente = "SELECT id_Sol FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idSolActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idSolActual = $rowCliente['id_Sol'];
                }

                // Consulta para obtener todas las opciones de solución
                $sql = "SELECT id_Sol, tip_Sol FROM solucion";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-21" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 6965px; top: 700px;">SOLUCION</p>
                <select name="id_Sol" id="sol" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el id_Sol actual
                            $selected = ($row['id_Sol'] == $idSolActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Sol'] . '" ' . $selected . '>' . $row['tip_Sol'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            $fechaHoraInicio = '';
            $fechaHoraFin = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont'];

                // Obtener datos de la base de datos
                $sqlCliente = "SELECT fechyhorini_Cli, fechyhorfin_Cli FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $fechaHoraInicio = $rowCliente['fechyhorini_Cli'];
                    $fechaHoraFin = $rowCliente['fechyhorfin_Cli'];
                }
            }
            ?>

            <div class="item-22" style="right: 1230px; position: relative; top: 190px;">    
                <p class="lp2" style="right: 7080px; top: 700px;">FECHA Y HORA INICIO</p>
                <input class="dat2" type="datetime-local" name="fechyhorini_Cli" id="fecha_hora_inicio" value="<?php echo htmlspecialchars($fechaHoraInicio); ?>">
            </div>

            <div class="item-23" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 7080px; top: 700px;">FECHA Y HORA FIN</p>
                <input class="dat2" type="datetime-local" name="fechyhorfin_Cli" id="fecha_hora_fin" value="<?php echo htmlspecialchars($fechaHoraInicio); ?>">
            </div>

            <?php
            $stmtCliente->close();
            $conn->close();
            ?>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener las observaciones
                $sqlCliente = "SELECT obs_Cli FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $observaciones = '';
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $observaciones = $rowCliente['obs_Cli']; // Guardar el valor de las observaciones
                }

                // Aquí puedes agregar otras consultas para obtener datos adicionales según sea necesario
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-24" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 8240px; top: 890px;">OBSERVACIONES</p>
                <textarea class="dat2" name="obs_Cli" id="observaciones"><?php echo htmlspecialchars($observaciones); ?></textarea>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            <div class="item-23" style="right: 1230px; position: relative; top: 190px;">
                <button class="btn-five2" type="submit" style="right: 8220px; top: 920px;">EDITAR</button>
            </div>

            <?php
            include('../../Model/conexion.php');

            // Comprobar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ont'])) {
                $ontCli = $_POST['ont']; // Obtener el valor de ont desde el formulario

                // Consulta para obtener el id_Usu actual del cliente
                $sqlCliente = "SELECT id_Usu FROM cliente WHERE ont_Cli = ?";
                $stmtCliente = $conn->prepare($sqlCliente);
                $stmtCliente->bind_param("s", $ontCli);
                $stmtCliente->execute();
                $resultCliente = $stmtCliente->get_result();

                $idUsuActual = null;
                if ($resultCliente->num_rows > 0) {
                    $rowCliente = $resultCliente->fetch_assoc();
                    $idUsuActual = $rowCliente['id_Usu'];
                }

                // Consulta para obtener todos los usuarios
                $sql = "SELECT id_Usu, nom_Usu FROM usuario";
                $result = $conn->query($sql);
            } else {
                // Manejo de error si no se envía el formulario
                exit;
            }
            ?>

            <div class="item-25" style="right: 1230px; position: relative; top: 190px;">
                <p class="lp2" style="right: 8800px; top: 1000px;">ASESOR CREADOR</p>
                <select name="id_Usu" id="usu" class="dat2">
                    <option value="">Selecciona...</option>
                    <?php
                    if ($result->num_rows > 0) {
                        // Generar las opciones dinámicamente
                        while ($row = $result->fetch_assoc()) {
                            // Marcar la opción como seleccionada si coincide con el id_Usu actual
                            $selected = ($row['id_Usu'] == $idUsuActual) ? 'selected' : '';
                            echo '<option value="' . $row['id_Usu'] . '" ' . $selected . '>' . $row['nom_Usu'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay opciones disponibles</option>';
                    }
                    ?>
                </select>
            </div>

            <?php
            // Cerrar la declaración y la conexión
            $stmtCliente->close();
            $conn->close();
            ?>

            </form>

    </div>

</div>

</body>
</html>