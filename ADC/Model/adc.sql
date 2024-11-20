/* Apartado de creacion, utilizacion y eliminacion */
DROP DATABASE adc;
CREATE DATABASE adc;
USE adc;
/* Apartado de creacion, utilizacion y eliminacion */

/* Apartado de la creacion de tablas */
CREATE TABLE ROL(

		id_Rol INT PRIMARY KEY AUTO_INCREMENT,
        cat_Rol VARCHAR(15),
        priv_Rol CHAR(2)

)AUTO_INCREMENT=1;

CREATE TABLE USUARIO(

		id_Usu INT PRIMARY KEY AUTO_INCREMENT,
		id_Rol INT, FOREIGN KEY (id_Rol) REFERENCES ROL(id_Rol),
        nom_Usu VARCHAR(45),
        ema_Usu VARCHAR(65),
        cel_Usu BIGINT,
        con_Usu VARCHAR(45)

)AUTO_INCREMENT=10;

CREATE TABLE RESPUESTA_TV(
 
	id_ResTv INT PRIMARY KEY AUTO_INCREMENT,
	res_ResTv VARCHAR(800),
    pre_ResTv CHAR(2)

)AUTO_INCREMENT=1001;

CREATE TABLE TELEVISION(

	id_Tv INT PRIMARY KEY AUTO_INCREMENT,
    id_ResTv INT NULL, FOREIGN KEY (id_ResTv) REFERENCES RESPUESTA_TV(id_ResTv),
	meg_Tv VARCHAR(500)
    
)AUTO_INCREMENT=2001;

CREATE TABLE RESPUESTA_INTERNET(

	id_ResInte INT PRIMARY KEY AUTO_INCREMENT,
	res_ResInte VARCHAR(700),
    pre_ResInte CHAR(2)

)AUTO_INCREMENT=3001;

CREATE TABLE INTERNET(

	id_Inte INT PRIMARY KEY AUTO_INCREMENT,
	id_ResInte INT, FOREIGN KEY (id_ResInte) REFERENCES RESPUESTA_INTERNET(id_ResInte),
	meg_Inte VARCHAR(500)

)AUTO_INCREMENT=4001;

CREATE TABLE RESPUESTA_OTT(

	id_ResOtt INT PRIMARY KEY AUTO_INCREMENT,
	res_ResOtt VARCHAR(700),
    pre_ResOtt CHAR(2)

)AUTO_INCREMENT=5001;

CREATE TABLE OTT(

	id_Ott INT PRIMARY KEY AUTO_INCREMENT,
	id_ResOtt INT, FOREIGN KEY (id_ResOtt) REFERENCES RESPUESTA_OTT(id_ResOtt),
	meg_Ott VARCHAR(500)

)AUTO_INCREMENT=6001;

CREATE TABLE RESPUESTA_FTTH(

	id_ResFtth INT PRIMARY KEY AUTO_INCREMENT,
	res_ResFtth VARCHAR(700),
    pre_ResFtth CHAR(2)

)AUTO_INCREMENT=7001;

CREATE TABLE LINEA_FTTH(

	id_Ftth INT PRIMARY KEY AUTO_INCREMENT,
	id_ResFtth INT, FOREIGN KEY (id_ResFtth) REFERENCES RESPUESTA_FTTH(id_ResFtth),
	meg_Ftth VARCHAR(500)

)AUTO_INCREMENT=8001;

CREATE TABLE RESPUESTA_FTTC(

	id_ResFttc INT PRIMARY KEY AUTO_INCREMENT,
	res_ResFttc VARCHAR(700),
    pre_ResFttc CHAR(2)

)AUTO_INCREMENT=9001;

CREATE TABLE LINEA_FTTC(

	id_Fttc INT PRIMARY KEY AUTO_INCREMENT,
	id_ResFttc INT, FOREIGN KEY (id_ResFttc) REFERENCES RESPUESTA_FTTC(id_ResFttc),
	meg_Fttc VARCHAR(500)

)AUTO_INCREMENT=10001;
/* Apartado de la creacion de tablas */

/* Apartado de insercion de datos */
INSERT INTO RESPUESTA_TV (res_ResTv, pre_ResTv) VALUES
('Acércate a la parte trasera del decodificador allí vas a identificar un cable que se parece al de la línea telefónica puede ser de color gris o amarillo lo desconectas por 10 segundos lo conectas nuevamente y luego verificas que la otra punta de ese mismo cable este en el modem en el puerto de IPTV1 o IPTV2, asegúrate de que las dos puntas estén bien conectadas 📺🔌

Filtros en plataforma

• Reiniciar los decodificadores y la ONT
• Verificar plan tv comercial
• Normalizar plataformas
• Validar si la potencia en la ONT es menor a -27 dBm', 'SI'),
('Guion de finalización de chat', 'SI'),
('Guion de finalización de chat', 'SI'),
('Por favor conecta el nuevo cable o decodificador Señor@ xxxxx para validar la conexión', 'SI'),
('Guion de finalización de chat', 'SI'),
('Verifica por favor un dispositivo tipo adaptador coaxial donde están conectados los decodificadores es de color blanco o negro🧐, confírmame si lo visualizas y me envías foto 📷.

Desconecta uno de los cables y lo conectas directamente al modem🔌 en el puerto IPTV1 o IPTV2, prueba si el televisor ya tiene imagen 📺.

(Si funciona de esta manera el daño esta en el HPNA y se debe enviar visita)', 'SI'),
('Enviar visita', 'SI'),
('Enviar a encuesta', 'SI'),
('Validar en suma y suministrarle al cliente el código', 'SI'),
('Envía visita técnica', 'NO'),
('Continuar con el soporte', 'NO'),
('Verificar en suma el estado de los semáforos y validar con el cliente el cable HDMI o cable AV (Asesor)

NOTA: Si aun el cliente no cuenta con servicio continuar con el soporte

Para ambos casos

Vas a identificar el cable HDMI que está entre el televisor y el decodificador vas a intercambiar las puntas por favor, la punta que está conectada en el decodificador la pones en el televisor y la del televisor en el decodificador, luego en la parte trasera del decodificador hay un botón de encendido y apagado lo vas a apagar lo vuelves a encender y válidas 🔌📺 😀

Luego vas a ubicar en el control del televisor el botón denominado input vas a oprimirlo, este te va a mostrar varias opciones, ahí vas a seleccionar el puerto de HDMI en el cual anteriormente hayas conectado el cable🔌📺', 'NO'),
('Enviar visita técnica', 'NO'),
('Verifica los siguientes filtros en plataforma (Portal SUMA) y solicítale un momento a tu cliente

Filtros en plataforma
•	Reiniciar los decos y la ONT
•	Verificar plan tv comercial
•	Normalizar plataformas
•	Validar si la potencia en la ONT es menor a -27 dBm', 'NO'),
('Envía visita técnica', 'NO');

INSERT INTO TELEVISION (meg_Tv, id_ResTv) VALUES
('¿Cuántos decodificadores manejas? 📺 (Validar inventario de decos)', NULL),
('¿Desde cuándo se presenta la falla y cuantos decodificadores están en falla? 📺❌', NULL),
('Envíame foto del o los decodificadores que presenten falla por favor 📷📺', NULL),
('Envíame una foto de la parte trasera del modem y decodificador, en la parte de las conexiones 📸🔌', NULL),
('¿Te aparece algún código de error en el televisor? 📺', NULL),
('El cable que se parece al de la línea telefónica que puede ser de color gris o amarillo ¿está en buen estado?', 1001),
('Paso 1. Acércate a la parte trasera del decodificador allí vas a identificar un cable que se parece al de la línea telefónica puede ser de color gris o amarillo lo desconectas por 10 segundos lo conectas nuevamente y luego verificas que la otra punta de ese mismo cable este en el modem en el puerto de IPTV1 o IPTV2, asegúrate de que las dos puntas estén bien conectadas 📺🔌 

 Paso 2. Desconecta el decodificador directamente de la toma eléctrica por 10 segundos y lo conectas de nuevo 🔌', 1002),
('¿Funciona correctamente el/los decodificadores en falla? 📺🔌', 1002),
('¿Puedes realizar la prueba con otro cable o decodificador? 📺🔌', 1003),
('¿Te funciona correctamente el/los decodificadores en falla? 📺🔌', 1004),
('¿Te funciona correctamente el/los decodificadores en falla? 📺🔌', 1005),
('Señor@ xxxxx ¿la ausencia de señal es en todos los decodificadores? (de 3 decodificadores en adelante)', 1006),
('¿Te funciona correctamente el/los decodificadores en falla? 📺🔌', 1005),
('Señ@r xxxx permíteme que estoy realizando un reaprovisionamiento desde plataforma 🛠️', 1007),
('Señor@ xxxxx ¿te aparece un código de usuario y contraseña en el televisor?', 1008);

INSERT INTO ROL (cat_Rol, priv_Rol) VALUES
('Admin_Supremo', 'SI'),
('Administrador', 'SI'),
('Asesor', 'NO');

INSERT INTO USUARIO (id_Rol, nom_Usu, con_Usu, cel_Usu, ema_Usu) VALUES
(1, 'Nicolas', '1234', 1111111111,'dk@email.com'),
(2, 'Ana', '5678', 2222222222,'ana@email.com');
/* Apartado de insercion de datos */

SELECT meg_Tv FROM TELEVISION WHERE id_Tv = 2011;

SELECT * FROM RESPUESTA_TV;

SELECT * FROM TELEVISION;
/* Apartado de la creacion de la vista */

/* Apartado de la creacion de la vista */