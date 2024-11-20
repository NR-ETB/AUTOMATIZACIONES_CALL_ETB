/* DB CENTRO DE MONITOREO (LUA) */

/* LINEAS DE USO, CREACION Y ELIMINACION DE LA BASE DE DATOS A EMPLEAR */
drop database monitoreo;
create database monitoreo;
use monitoreo;
/* LINEAS DE USO, CREACION Y ELIMINACION DE LA BASE DE DATOS A EMPLEAR */

/* LINEAS DE CREACION DE LAS TABLAS QUE COMPONEN LA BASE DE DATOS */
create table estado(
	id_Est INT PRIMARY KEY AUTO_INCREMENT,
    nom_Est VARCHAR (45)
)AUTO_INCREMENT=20001;

create table seguimiento(
	id_Seg INT PRIMARY KEY AUTO_INCREMENT,
    tip_Seg CHAR (2)
)AUTO_INCREMENT=30001;

create table gestion(
	id_Ges INT PRIMARY KEY AUTO_INCREMENT,
    nom_Ges VARCHAR (25)
)AUTO_INCREMENT=40001;

create table monitor(
	id_Mon INT PRIMARY KEY AUTO_INCREMENT,
    nom_Mon VARCHAR (85)
)AUTO_INCREMENT=50001;

create table medios(
	id_Med INT PRIMARY KEY AUTO_INCREMENT,
    nom_Med VARCHAR (85)
)AUTO_INCREMENT=60001;

create table comunicacion(
	id_Com INT PRIMARY KEY AUTO_INCREMENT,
    nom_Com VARCHAR (45)
)AUTO_INCREMENT=70001;

create table subcategoria(
	id_sub INT PRIMARY KEY AUTO_INCREMENT,
    nom_Sub VARCHAR (45)
)AUTO_INCREMENT=80001;

create table contacto(
	id_Con INT PRIMARY KEY AUTO_INCREMENT,
    tip_Con VARCHAR (45)
)AUTO_INCREMENT=90001;

create table estado_final(
	id_Estf INT PRIMARY KEY AUTO_INCREMENT,
    nom_Estf VARCHAR (45)
)AUTO_INCREMENT=100001;

create table soporte(
	id_Sop INT PRIMARY KEY AUTO_INCREMENT,
    tip_Sop VARCHAR (45)
)AUTO_INCREMENT=110001;

create table nivel(
	id_Niv INT PRIMARY KEY AUTO_INCREMENT,
    tip_Niv VARCHAR (45)
)AUTO_INCREMENT=120001;

create table intentos(
	id_Inte INT PRIMARY KEY AUTO_INCREMENT,
    can_Inte VARCHAR (45)
)AUTO_INCREMENT=130001;

create table diagnostico(
	id_Dia INT PRIMARY KEY AUTO_INCREMENT,
    nom_Dia VARCHAR (45)
)AUTO_INCREMENT=140001;

create table reaprovisionamiento(
	id_Rea INT PRIMARY KEY AUTO_INCREMENT,
    tip_Rea VARCHAR (45)
)AUTO_INCREMENT=150001;

create table ubicacion(
	id_Ubi INT PRIMARY KEY AUTO_INCREMENT,
    cen_Ubi VARCHAR (45),
    equi_Ubi VARCHAR (45)
)AUTO_INCREMENT=160001;

create table suma(
	id_Sum INT PRIMARY KEY AUTO_INCREMENT,
    est_Sum VARCHAR (45)
)AUTO_INCREMENT=170001;

create table solucion(
	id_Sol INT PRIMARY KEY AUTO_INCREMENT,
    tip_Sol VARCHAR (45)
)AUTO_INCREMENT=180001;

create table rol(
	id_Rol INT PRIMARY KEY AUTO_INCREMENT,
    cat_Rol VARCHAR (45),
    priv_Rol CHAR (2)
)AUTO_INCREMENT=1;

create table usuario(
	id_Usu INT PRIMARY KEY AUTO_INCREMENT,
    id_Rol INT, FOREIGN KEY (id_Rol) REFERENCES rol(id_Rol),
    nom_Usu VARCHAR (85),
	ema_Usu VARCHAR (45),
	con_Usu VARCHAR (15),
    tel_Usu BIGINT,
    usu_Usu VARCHAR (45)
)AUTO_INCREMENT=11;

CREATE TABLE cliente (
    id_Cli INT PRIMARY KEY AUTO_INCREMENT,
    id_Rol INT,
    id_Est INT,
    id_Seg INT,
    id_Ges INT,
    id_Mon INT,
    id_Med INT,
    id_Com INT,
    id_Sub INT,
    id_Con INT,
    id_Estf INT,
    id_Sop INT,
    id_Niv INT,
    id_Inte INT,
    id_Dia INT,
    id_Rea INT,
    id_Ubi INT,
    id_Sum INT,
    id_Sol INT,
    ont_Cli VARCHAR (25),
    fechyhorini_Cli DATETIME,
    fechyhorfin_Cli DATETIME,
    slot_Cli VARCHAR(15),
    cst_Cli VARCHAR(15),
    pqr_Cli VARCHAR(25),
    obs_Cli VARCHAR(250),
    inte_Cli VARCHAR(15)
)AUTO_INCREMENT=190001;
/* LINEAS DE CREACION DE LAS TABLAS QUE COMPONEN LA BASE DE DATOS */

/* LINEAS DE REALACION, CON LAS LLAVES FORANEAS, PARA LA COMPOSICION DE LA TABLA CLIENTE */
ALTER TABLE cliente
ADD CONSTRAINT id_Rol FOREIGN KEY (id_Rol) REFERENCES rol(id_Rol);

ALTER TABLE cliente
ADD CONSTRAINT id_Est FOREIGN KEY (id_Est) REFERENCES estado(id_Est);

ALTER TABLE cliente
ADD CONSTRAINT id_Seg FOREIGN KEY (id_Seg) REFERENCES seguimiento(id_Seg);

ALTER TABLE cliente
ADD CONSTRAINT id_Ges FOREIGN KEY (id_Ges) REFERENCES gestion(id_Ges);

ALTER TABLE cliente
ADD CONSTRAINT id_Mon FOREIGN KEY (id_Mon) REFERENCES monitor(id_Mon);

ALTER TABLE cliente
ADD CONSTRAINT id_Med FOREIGN KEY (id_Med) REFERENCES medios(id_Med);

ALTER TABLE cliente
ADD CONSTRAINT id_Com FOREIGN KEY (id_Com) REFERENCES comunicacion(id_Com);

ALTER TABLE cliente
ADD CONSTRAINT id_Sub FOREIGN KEY (id_Sub) REFERENCES subcategoria(id_sub);

ALTER TABLE cliente
ADD CONSTRAINT id_Con FOREIGN KEY (id_Con) REFERENCES contacto(id_Con);

ALTER TABLE cliente
ADD CONSTRAINT id_Estf FOREIGN KEY (id_Estf) REFERENCES estado_final(id_Estf);

ALTER TABLE cliente
ADD CONSTRAINT id_Sop FOREIGN KEY (id_Sop) REFERENCES soporte(id_Sop);

ALTER TABLE cliente
ADD CONSTRAINT id_Niv FOREIGN KEY (id_Niv) REFERENCES nivel(id_Niv);

ALTER TABLE cliente
ADD CONSTRAINT id_Inte FOREIGN KEY (id_Inte) REFERENCES intentos(id_Inte);

ALTER TABLE cliente
ADD CONSTRAINT id_Dia FOREIGN KEY (id_Dia) REFERENCES diagnostico(id_Dia);

ALTER TABLE cliente
ADD CONSTRAINT id_Rea FOREIGN KEY (id_Rea) REFERENCES reaprovisionamiento(id_Rea);

ALTER TABLE cliente
ADD CONSTRAINT id_Ubi FOREIGN KEY (id_Ubi) REFERENCES ubicacion(id_Ubi);

ALTER TABLE cliente
ADD CONSTRAINT id_Sum FOREIGN KEY (id_Sum) REFERENCES suma(id_Sum);

ALTER TABLE cliente
ADD CONSTRAINT id_Sol FOREIGN KEY (id_Sol) REFERENCES solucion(id_Sol);
/* LINEAS DE REALACION, CON LAS LLAVES FORANEAS, PARA LA COMPOSICION DE LA TABLA CLIENTE */

INSERT INTO rol (cat_Rol, priv_Rol) VALUES
('Admin_Supremo', 'SI'),
('Administrador', 'SI'),
('Asesor', 'NO'),
('Cliente', 'NO');

INSERT INTO usuario (id_Rol, nom_Usu, con_Usu, tel_Usu, ema_Usu, usu_Usu) VALUES
(1, 'Nicolas', '1234', 1111111111,'dk@email.com', 'DK'),
(2, 'Ana', '5678', 2222222222,'ana@email.com', 'anabis');

INSERT INTO gestion (nom_Ges) VALUES
('Base'),
('En Linea');

INSERT INTO estado (nom_Est) VALUES
('Alarmado'),
('Falla Masiva'),
('Sin Alarmas'),
('Falla Masiva Energía');

INSERT INTO suma (est_Sum) VALUES
('Inactivo'),
('Activo');

INSERT INTO diagnostico (nom_Dia) VALUES
('Problemas de Red e Infraestructura'),
('Fuera de Linea'),
('Problema en Calidad de Servicio de Telefonia'),
('Otros'),
('Servicios OK'),
('Servicios en los'),
('No registra en Sistema'),
('Reinicio ONT');

INSERT INTO contacto (tip_Con) VALUES
('Requiere Contacto'),
('Soluciones en Linea'),
('N/A');

INSERT INTO comunicacion (nom_Com) VALUES
('Cliente Conectado'),
('Cliente No Conectado'),
('Otros');

INSERT INTO medios (nom_Med) VALUES
('Telefonico'),
('Whatsapp'),
('Otros');

INSERT INTO intentos (can_Inte) VALUES
('Fuera de Franja'),
('0'),
('1'),
('2'),
('3'),
('4'),
('Mas de 5');

INSERT INTO soporte (tip_Sop) VALUES
('Falla Masiva');

INSERT INTO reaprovisionamiento (tip_Rea) VALUES
('Validacion de Conexion Fisica'),
('Tramites'),
('Agendamiento'),
('Modem Fuera de Linea'),
('Problemas de Energia Sector'),
('Daño de Red Externa (PRIMARIA)'),
('Daño de Red Externa (SECUNDARIA)'),
('UEN Empresas y Gobierno'),
('No Registra en SUMA / ASC'),
('Servicio Operativo');

INSERT INTO solucion (tip_Sol) VALUES
('Si'),
('No'),
('FM'),
('Otros');

INSERT INTO nivel (tip_Niv) VALUES
('N1'),
('N2'),
('Otros');

INSERT INTO seguimiento (tip_Seg) VALUES
('Si'),
('No');

INSERT INTO estado_final (nom_Estf) VALUES
('Alarmado'),
('Falla Masiva'),
('Alarmado No Solucionado'),
('Servicio Operativo');

INSERT INTO monitor (nom_Mon) VALUES
('GSH'),
('Laura Durarte'),
('Susana Quiceno'),
('Paula Jaime'),
('Leonela Blanco'),
('Michael Ramirez'),
('Jhojan Cuesta'),
('Heidy Vasquez'),
('Jose Vivas');

INSERT INTO subcategoria (nom_Sub) VALUES
('SOPORTE N1'),
('DMZ/ APERTURA DE PUERTOS'),
('DNS'),
('FILTRADO MAC'),
('CONFIGURACION DE CANAL'),
('ESTADO DE RED'),
('ESTADO DE SSID'),
('BORRADO DE TAREAS'),
('CONFIGURACIÓN DE DHCP'),
('USUARIO DE NAVEGACIÓN'),
('CONEXIÓN UTP MODEM'),
('CONEXIÓN FIBRA'),
('FIBRA ESTRESADA'),
('CONEXIONES DISPOSITIVOS CLIENTE'),
('CONEXIONES TELEFONIA'),
('CONEXIONES DECO'),
('CONEXIONES REPETIDORES'),
('CLIENTE NO CONTESTA'),
('FALLA DE ENERGIA');

INSERT INTO ubicacion(cen_Ubi, equi_Ubi) VALUES
('BOBAZTC60108v1', 'BACHUE'),
('BOCUZTC60110v1', 'CUNI'),
('BOCOZTC60120v1', 'CHICO');

INSERT INTO cliente (
    id_Rol, id_Est, id_Seg, id_Ges,
    id_Mon, id_Med, id_Com, id_Sub, id_Con, id_Estf,
    id_Sop, id_Niv, id_Inte, id_Dia, id_Rea, id_Ubi,
    id_Sum, id_Sol, ont_Cli, slot_Cli, cst_Cli, pqr_Cli, obs_Cli,
    fechyhorini_Cli, fechyhorfin_Cli
) VALUES
(
    4, 20001, 30001, 40001,
    50001, 60001, 70001, 80001, 90001, 100001,
    110001, 120001, 130001, 140001, 150001, 160001,
    170002, 180003, 'ZTEGCF51ADFC','slot_001', 'cst_001', 'pqr_001', 'Observaciones del cliente 1',
    NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR)
),
(
    4, 20001, 30001, 40001,
    50001, 60001, 70001, 80001, 90001, 100001,
    110001, 120001, 130001, 140001, 150001, 160001,
    170002, 180003, 'ZTEGD1B361C9','slot_002', 'cst_002', 'pqr_002', 'Observaciones del cliente 2',
    NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR)
);
                
SELECT 
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
    usuario usu ON cli.id_Usu = usu.id_Usu
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
    monitor mon ON cli.id_Mon = mon.id_Mon;
    
SELECT 
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
    cli.obs_Cli AS OBSERVACIONES
FROM 
    cliente cli
INNER JOIN 
    usuario usu ON cli.id_Usu = usu.id_Usu
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
WHERE cli.ont_cli = ?;

SELECT
    cli.ont_Cli AS ID_CUENTA_SERVICIO, 
    cli.ont_Cli AS ID_ONT, 
    ubi.cen_Ubi AS CENTRAL, 
    cli.slot_Cli AS SLOT,
    ubi.equi_Ubi AS EQUIPO 
FROM 
    cliente cli
INNER JOIN 
    usuario usu ON cli.id_Usu = usu.id_Usu
INNER JOIN 
    ubicacion ubi ON cli.id_Ubi = ubi.id_Ubi
WHERE cli.ont_Cli = ?;

SELECT
    usu.id_Rol AS ROL, 
    usu.nom_Usu AS NOMBRE_COMPLETO, 
    usu.ema_Usu AS EMAIL, 
    usu.tel_Usu AS TELEFONO,
    usu.usu_Usu AS USUARIO_MONITOREO 
FROM 
    usuario usu
INNER JOIN 
    rol r ON usu.id_Rol = r.id_Rol;

SELECT con_Usu FROM usuario WHERE usu_Usu = DK AND id_Rol <= 2;
