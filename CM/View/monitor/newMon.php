<?php

include('../../Model/conexion.php');

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'monitoreo');

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Lista de parámetros necesarios
$params = [
    'inte_Cli',
    'id_Est', 'id_Seg', 
    'id_Ges', 'id_Mon', 
    'id_Med', 'id_Com', 
    'id_Sub', 'id_Con', 
    'id_Estf', 'id_Sop', 
    'id_Niv', 'id_Inte', 
    'id_Dia', 'id_Rea', 
    'id_Ubi', 'id_Sum', 
    'id_Sol', 'ont_Cli', 
    'slot_Cli', 'cst_Cli', 
    'pqr_Cli', 'obs_Cli', 
    'fechyhorini_Cli', 'fechyhorfin_Cli'
];

// Comprobar si todos los parámetros están presentes
$missingParams = [];
foreach ($params as $param) {
    if (!isset($_GET[$param])) {
        $missingParams[] = $param;
    }
}

if (empty($missingParams)) {
    // Obtener y validar las variables desde el método GET
    $idEst = intval($_GET['id_Est']);
    $idSeg = intval($_GET['id_Seg']);
    $idGes = intval($_GET['id_Ges']);
    $idMon = intval($_GET['id_Mon']);
    $idMed = intval($_GET['id_Med']);
    $idCom = intval($_GET['id_Com']);
    $idSub = intval($_GET['id_Sub']);
    $idCon = intval($_GET['id_Con']);
    $idEstf = intval($_GET['id_Estf']);
    $idSop = intval($_GET['id_Sop']);
    $idNiv = intval($_GET['id_Niv']);
    $idInte = intval($_GET['id_Inte']);
    $idDia = intval($_GET['id_Dia']);
    $idRea = intval($_GET['id_Rea']);
    $idUbi = intval($_GET['id_Ubi']);
    $idSum = intval($_GET['id_Sum']);
    $idSol = intval($_GET['id_Sol']);
    $ontCli = $_GET['ont_Cli']; // Asumido como string
    $slotCli = $_GET['slot_Cli']; // Asumido como string
    $cstCli = $_GET['cst_Cli']; // Asumido como string
    $pqrCli = $_GET['pqr_Cli']; // Asumido como string
    $obsCli = $_GET['obs_Cli']; // Asumido como string
    $inteCli = $_GET['inte_Cli']; // Asumido como string
    $fechyhoriniCli = $_GET['fechyhorini_Cli']; // Asumido como string
    $fechyhorfinCli = $_GET['fechyhorfin_Cli']; // Asumido como string

    // Asignar valores fijos para rol
    $idRol = 4;  // Valor fijo para rol

    // Preparar la consulta SQL para insertar un nuevo cliente
    $sql = "INSERT INTO cliente (
        id_Rol, id_Est, id_Seg, id_Ges,
        id_Mon, id_Med, id_Com, id_Sub, id_Con, id_Estf,
        id_Sop, id_Niv, id_Inte, id_Dia, id_Rea, id_Ubi,
        id_Sum, id_Sol, ont_Cli, slot_Cli, cst_Cli, pqr_Cli, obs_Cli, inte_cli,
        fechyhorini_Cli, fechyhorfin_Cli
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("issssssssssssssssssssssiss", 
        $idRol,  
        $idEst, 
        $idSeg, 
        $idGes, 
        $idMon, 
        $idMed, 
        $idCom, 
        $idSub, 
        $idCon, 
        $idEstf, 
        $idSop, 
        $idNiv, 
        $idInte, 
        $idDia, 
        $idRea, 
        $idUbi, 
        $idSum, 
        $idSol, 
        $ontCli, 
        $slotCli, 
        $cstCli, 
        $pqrCli, 
        $obsCli, 
        $inteCli,
        $fechyhoriniCli, 
        $fechyhorfinCli
    );
    // Ejecutar la declaración
    if ($stmt->execute()) {
        // echo "Nuevo cliente agregado exitosamente.";
    } else {
       // echo "Error al agregar cliente: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // echo "Faltan los siguientes parámetros: " . implode(", ", $missingParams);
}

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_new.css">
    <link rel="stylesheet" href="../css/comp.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Añadir Nuevo</title>
</head>
<body>

<?php
    include('../components/dashboard.php');
?>

<div class="container-general">

<div>

    <form action="newMon.php" class="label1-2" method="GET">

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los estados
        $sql = "SELECT id_Est, nom_Est FROM estado";
        $result = $conn->query($sql);
        ?>

        <div class="item-1">
            <p class="lp1" style="left: 15px; top: 0px;">ESTADO</p>
            <select name="id_Est" id="estado" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Est'] . '">' . $row['nom_Est'] . '</option>';
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
        // Cerrar la conexión
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

        // Consulta para obtener los seguimientos
        $sql = "SELECT id_Seg, tip_Seg FROM seguimiento";
        $result = $conn->query($sql);
        ?>

        <div class="item-2">
            <p class="lp1" style="right: 85px; top: 0px;">SEGUIMIENTO</p>
            <select name="id_Seg" id="id_Seg" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Seg'] . '">' . $row['tip_Seg'] . '</option>';
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
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener las gestiones
        $sql = "SELECT id_Ges, nom_Ges FROM gestion";
        $result = $conn->query($sql);
        ?>

        <div class="item-3">
            <p class="lp1" style="right: 125px; top: 0px;">GESTION</p>
            <select name="id_Ges" id="id_Ges" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Ges'] . '">' . $row['nom_Ges'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay gestiones disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los monitores
        $sql = "SELECT id_Mon, nom_Mon FROM monitor";
        $result = $conn->query($sql);
        ?>

        <div class="item-4">
            <p class="lp1" style="right: 185px; top: 0px;">MONITOR</p>
            <select name="id_Mon" id="id_Mon" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Mon'] . '">' . $row['nom_Mon'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay monitores disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los medios
        $sql = "SELECT id_Med, nom_Med FROM medios";
        $result = $conn->query($sql);
        ?>

        <div class="item-5">
            <p class="lp2" style="right: 1620px; top: 180px;">MEDIOS</p>
            <select name="id_Med" id="id_Med" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Med'] . '">' . $row['nom_Med'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay medios disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener las opciones de comunicación
        $sql = "SELECT id_Com, nom_Com FROM comunicacion";
        $result = $conn->query($sql);
        ?>

        <div class="item-6">
            <p class="lp2" style="right: 1740px; top: 180px;">COMUNICACION</p>
            <select name="id_Com" id="id_Com" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Com'] . '">' . $row['nom_Com'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay opciones de comunicación disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener las subcategorías
        $sql = "SELECT id_Sub, nom_Sub FROM subcategoria";
        $result = $conn->query($sql);
        ?>

        <div class="item-7" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 565px; top: -10px;">SUBCATEGORIA</p>
            <select name="id_Sub" id="id_Sub" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Sub'] . '">' . $row['nom_Sub'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay subcategorías disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los tipos de contacto
        $sql = "SELECT id_Con, tip_Con FROM contacto";
        $result = $conn->query($sql);
        ?>

        <div class="item-8" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 605px; top: -10px;">CONTACTO</p>
            <select name="id_Con" id="id_Con" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Con'] . '">' . $row['tip_Con'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay opciones de contacto disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los estados finales
        $sql = "SELECT id_Estf, nom_Estf FROM estado_final";
        $result = $conn->query($sql);
        ?>

        <div class="item-9" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 2055px; top: 180px;">ESTADO FINAL</p>
            <select name="id_Estf" id="id_EstFinal" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Estf'] . '">' . $row['nom_Estf'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay estados finales disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los tipos de soporte
        $sql = "SELECT id_Sop, tip_Sop FROM soporte";
        $result = $conn->query($sql);
        ?>

        <div class="item-10" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 2115px; top: 180px;">SOPORTE</p>
            <select name="id_Sop" id="id_Soporte" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Sop'] . '">' . $row['tip_Sop'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay tipos de soporte disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los niveles
        $sql = "SELECT id_Niv, tip_Niv FROM nivel";
        $result = $conn->query($sql);
        ?>

        <div class="item-11" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 2165px; top: 180px;">NIVEL</p>
            <select name="id_Niv" id="id_Nivel" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Niv'] . '">' . $row['tip_Niv'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay niveles disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los intentos (o puedes utilizar una consulta similar si hay una tabla)
        $sql = "SELECT id_Inte, can_Inte FROM intentos"; // Asegúrate de que la tabla exista
        $result = $conn->query($sql);
        ?>

        <div class="item-12" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 2240px; top: 180px;">INTENTOS</p>
            <select name="id_Inte" id="intentos" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Inte'] . '">' . $row['can_Inte'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay intentos disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los diagnósticos (o puedes usar una tabla similar si hay una)
        $sql = "SELECT id_Dia, nom_Dia FROM diagnostico"; // Asegúrate de que la tabla exista
        $result = $conn->query($sql);
        ?>

        <div class="item-13" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 3700px; top: 360px;">DIAGNOSTICO</p>
            <select name="id_Dia" id="diagnostico" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Dia'] . '">' . $row['nom_Dia'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay diagnósticos disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>


        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener las opciones de reaprovisionamiento
        $sql = "SELECT id_Rea, tip_Rea FROM reaprovisionamiento"; // Asegúrate de que la tabla exista
        $result = $conn->query($sql);
        ?>

        <div class="item-14" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 3825px; top: 360px;">REAPROVISIONAMIENTO</p>
            <select name="id_Rea" id="reaprovisionamiento" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Rea'] . '">' . $row['tip_Rea'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay opciones disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener las ubicaciones
        $sql = "SELECT id_Ubi, equi_Ubi FROM ubicacion"; // Asegúrate de que la tabla exista
        $result = $conn->query($sql);
        ?>

        <div class="item-15" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 3825px; top: 360px;">UBICACION</p>
            <select name="id_Ubi" id="ubicacion" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Ubi'] . '">' . $row['equi_Ubi'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay ubicaciones disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los valores de la tabla correspondiente (ajusta la tabla según tu base de datos)
        $sql = "SELECT id_Sum, est_Sum FROM suma"; // Cambia los nombres de la tabla y columnas según corresponda
        $result = $conn->query($sql);
        ?>

        <div class="item-16" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 3860px; top: 360px;">SUMA</p>
            <select name="id_Sum" id="suma" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Sum'] . '">' . $row['est_Sum'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay opciones disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <div class="item-17" style="right: 2430px; position: relative; top: 190px;">
            <p class="lp2" style="right: 4110px; top: 520px;">ID ONT</p>
            <input class="dat2" type="text" name="ont_Cli" id="id_ont" required placeholder="Ingresa la ID ONT">
        </div>

        <div class="item-18" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 5420px; top: 520px;">SLOT/PUERTO</p>
            <input class="dat2" type="text" name="slot_Cli" id="slot_puerto" required placeholder="Ingresa el SLOT/PUERTO">
        </div>

        <div class="item-19" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 5448px; top: 520px;">CS-TEL</p>
            <input class="dat2" type="text" name="cst_Cli" id="cs_tel" required placeholder="Ingresa el CS-TEL">
        </div>

        <div class="item-20" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 5490px; top: 520px;">PQR</p>
            <input class="dat2" type="text" name="pqr_Cli" id="pqr" required placeholder="Ingresa la PQR">
        </div>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los valores de la tabla correspondiente (ajusta la tabla según tu base de datos)
        $sql = "SELECT id_Sol, tip_Sol FROM solucion"; // Cambia los nombres de la tabla y columnas según corresponda
        $result = $conn->query($sql);
        ?>

        <div class="item-21" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 6965px; top: 700px;">SOLUCION</p>
            <select name="id_Sol" id="sol" class="dat2" required>
                <option value="">Selecciona...</option>
                <?php
                if ($result->num_rows > 0) {
                    // Generar las opciones dinámicamente
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_Sol'] . '">' . $row['tip_Sol'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay opciones disponibles</option>';
                }
                ?>
            </select>
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

        <div class="item-22" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 7080px; top: 700px;">FECHA Y HORA INICIO</p>
            <input class="dat2" type="datetime-local" name="fechyhorini_Cli" id="fecha_hora_inicio" required>
        </div>

        <div class="item-23" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 7080px; top: 700px;">FECHA Y HORA FIN</p>
            <input class="dat2" type="datetime-local" name="fechyhorfin_Cli" id="fecha_hora_fin">
        </div>

        <div class="item-24" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 8240px; top: 890px;">OBSERVACIONES</p>
            <textarea class="dat2" name="obs_Cli" id="observaciones" required placeholder="Escribe tus observaciones aquí..."></textarea>
        </div>

        <div class="item-23" style="right: 1230px; position: relative; top: 190px;">
            <button class="btn-five2" type="submit" style="right: 8220px; top: 920px;">AÑADIR</button>
        </div>

        <?php
        include('../../Model/conexion.php');

        // Consulta para obtener los códigos de validación (ajusta la tabla y columnas según corresponda)
        $sql = "SELECT id_Usu, nom_Usu FROM usuario"; // Cambia esto a la tabla y columnas correctas
        $result = $conn->query($sql);
        ?>

        <div class="item-25" style="right: 1230px; position: relative; top: 190px;">
            <p class="lp2" style="right: 8780px; top: 1000px;">CANTIDAD REAL DE INTENTOS</p>
            <input name="inte_Cli" id="inte" class="dat2" placeholder="Ingresa la Cantidad de Intentos">
        </div>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>

    </form>

</div>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/new.js"></script>
<script src="../../Controller/gen.js"></script> 
</body>
</html>