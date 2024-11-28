<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/comp.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="shortcut icon" href="">
    <title>Busqueda Rapida</title>
</head>
<body>

    <?php
        include('../components/dashboard.php');
    ?>

    <div class="container-general">

        <div class="label1">
            <form action="searchMon.php" method="GET">

                <div>
                    <p>ID ONT:</p>
                    <input id="telefonoInput" class="dat" type="text" name="ont" placeholder="Ingresa la ID ONT aqui">
                </div>

                <div class="ini-b">
                    <button class="btn-prima" type="submit" onclick="searchcli();">BUSCAR</button>
                </div>
            </form>
        </div>

        <button class="btn-second" type="button" onclick="rsearch();">LIMPIAR</button>

        <?php
        // Verificar si se ha enviado una ont para la búsqueda
        if (isset($_GET['ont']) || isset($_GET['serv'])) {
            $ont = isset($_GET['ont']) ? filter_var($_GET['ont'], FILTER_SANITIZE_STRING) : null;
            $id_Servicio = isset($_GET['serv']) ? filter_var($_GET['serv'], FILTER_SANITIZE_STRING) : null;

            include('../../Model/conexion.php');

            // Verificar la conexión
            if ($conn === false) {
                die("Error en la conexión a la base de datos: " . mysqli_connect_error());
            }

            // Consulta SQL para obtener los datos del cliente basado en la ont_Cli
            $sql = "SELECT
                cli.ont_Cli AS ID_CUENTA_SERVICIO, 
                cli.ont_Cli AS ID_ONT, 
                ubi.cen_Ubi AS CENTRAL, 
                cli.slot_Cli AS SLOT,
                ubi.equi_Ubi AS EQUIPO 
                FROM 
                    cliente cli
                INNER JOIN 
                    ubicacion ubi ON cli.id_Ubi = ubi.id_Ubi
                WHERE cli.ont_Cli = ?;";

            // Preparar la consulta
            $stmt = $conn->prepare($sql);

            // Verificar si la preparación de la consulta fue exitosa
            if ($stmt === false) {
                die("Error al preparar la consulta: " . $conn->error);
            }

            // Enlazar parámetros
            $stmt->bind_param("s", $ont);

            // Ejecutar la consulta
            if ($stmt->execute() === false) {
                die("Error al ejecutar la consulta: " . $stmt->error);
            }

            // Obtener resultados
            $result = $stmt->get_result();

            // Mostrar los resultados en el modal
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Solo tomamos la primera fila
                ?>
                <div class="connew-2" id="connew2-2" style="height: 570px; display: block;">
                    <div class="label1-2">
                        <div class="item-1">
                            <p class="lp1" style="right: 10px; bottom: 15px; font-size: 20px;">ID CUENTA SERVICIO</p>
                            <input class="dat2" type="text" value="<?php echo htmlspecialchars($row["ID_CUENTA_SERVICIO"]);?>" disabled>
                        </div>    
                        <div class="item-2">
                            <p class="lp1" style="left: 64px; bottom: 15px; font-size: 20px;">ID ONT</p>
                            <input class="dat2" type="text" value="<?php echo htmlspecialchars($row["ID_ONT"]);?>" disabled>
                        </div>    
                        <div class="item-3">
                            <p class="lp1" style="left: 53px; bottom: 15px; font-size: 20px;">CENTRAL</p>
                            <input class="dat2" type="text" value="<?php echo htmlspecialchars($row["CENTRAL"]);?>" disabled>
                        </div>    
                        <div class="item-4">
                            <p class="lp2" style="right: 1200px; bottom: 15px; font-size: 20px;">SLOT/PUERTO</p>
                            <input class="dat2" type="text" value="<?php echo htmlspecialchars($row["SLOT"]);?>" disabled>
                        </div>    
                        <div class="item-6">
                            <p class="lp2" style="right: 1170px; bottom: 15px; font-size: 20px;">EQUIPO</p>
                            <input class="dat2" type="text" value="<?php echo htmlspecialchars($row["EQUIPO"]);?>" disabled>
                        </div> 
                        <div class="ini-b3">
                            <button class="btn-four"><?php echo htmlspecialchars($row["EQUIPO"]);?></button>
                            <button class="btn-three" onclick="tabcli();"><img src="../images/icons/amp.png" alt=""></button>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "0 resultados";
            }

            // Cerrar la conexión y liberar recursos
            $stmt->close();
            $conn->close();
        } else {
            //echo "Por favor, ingresa una ONT o ID a buscar.";
        }
        ?>

        <?php
        // Verificar si se ha enviado una ont para la búsqueda
        if (isset($_GET['ont'])) {
            $ont = filter_var($_GET['ont'], FILTER_SANITIZE_STRING);

            include('../../Model/conexion.php');

            // Consulta SQL para obtener los datos del cliente basado en la ont_Cli
            $sql = "SELECT 
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
                monitor mon ON cli.id_Mon = mon.id_Mon
            WHERE 
                cli.ont_Cli = ?";

            // Preparar la consulta
            $stmt = $conn->prepare($sql);

            // Verificar si la preparación de la consulta fue exitosa
            if ($stmt === false) {
                die("Error al preparar la consulta: " . $conn->error);
            }

            // Enlazar parámetros
            $stmt->bind_param("s", $ont);

            // Ejecutar la consulta
            if ($stmt->execute() === false) {
                die("Error al ejecutar la consulta: " . $stmt->error);
            }

            // Obtener resultados
            $result = $stmt->get_result();

            // Mostrar los resultados en el modal
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Solo tomamos la primera fila
            ?>
            <!-- Modal Vista del Cliente -->
            <div class="modal fade" id="modal-vista" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Detalles del Cliente "<?php echo htmlspecialchars($row["ID_ONT"]); ?>"</h6>  
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>      
                        </div>
                        <div class="modal-body">
                            <div class="table-product" id="con-sopo-inter">
                                <div class="con-table2">
                                    <table class="table-general table-sopor table-produc">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['ID_ONT']); ?></td>
                                                <td><?php echo htmlspecialchars($row['SLOT_PUERTO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['CS_TEL']); ?></td>
                                                <td><?php echo htmlspecialchars($row['TIPO_DE_GESTION']); ?></td>
                                                <td><?php echo htmlspecialchars($row['ESTADO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['ESTADO_SUMA']); ?></td>
                                                <td><?php echo htmlspecialchars($row['DIAGNOSTICO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['REQUIERE_CONTACTO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['COMUNICACION']); ?></td>
                                                <td><?php echo htmlspecialchars($row['MEDIOS']); ?></td>
                                                <td><?php echo htmlspecialchars($row['CANTIDAD_DE_INTENTOS']); ?></td>
                                                <td><?php echo htmlspecialchars($row['SOPORTE_PREVENTIVO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['SOLUCION']); ?></td>
                                                <td><?php echo htmlspecialchars($row['NIVEL']); ?></td>
                                                <td><?php echo htmlspecialchars($row['PQR']); ?></td>
                                                <td><?php echo htmlspecialchars($row['SEGUIMIENTO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['MONITOR']); ?></td>
                                                <td><?php echo htmlspecialchars($row['FECH_Y_HORA_INICIO']); ?></td>
                                                <td><?php echo htmlspecialchars($row['FECH_Y_HORA_FIN']); ?></td>
                                                <td><?php echo htmlspecialchars($row['OBSERVACIONES']); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Vista del Cliente -->   
            <?php
            } else {
                echo "<div>No se encontraron clientes.</div>"; // Mensaje si no hay resultados
            }

            // Cerrar la conexión y liberar recursos
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
    

    <!-- Modal Loading -->
    <div class="modal fade modal-loading" tabindex="-1" id="modal-loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel">PROCESANDO TU PETICIÓN</h6>
                    </div>
                    <div class="modal-body">
                        <div class="con-spiner">
                            <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div>
                        <div class="text-spiner"><p>Por favor no cierre la pagina</p></div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal Loading -->

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../Controller/search.js"></script> 
<script src="../../Controller/gen.js"></script> 

</body>
</html>
