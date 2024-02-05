Use destinia;

-- Creación de la tabla de Ubicaciones
CREATE TABLE Ubicaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    provincia VARCHAR(100) NOT NULL
);

-- Creación de la tabla de Hoteles
CREATE TABLE Hoteles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    estrellas INT NOT NULL,
    tipo_habitacion VARCHAR(100) NOT NULL,
    ubicacion_id INT,
    FOREIGN KEY (ubicacion_id) REFERENCES Ubicaciones(id)
);

-- Creación de la tabla de Apartamentos
CREATE TABLE Apartamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    num_apartamentos INT NOT NULL,
    capacidad_adultos INT NOT NULL,
    capacidad_ninios INT NOT NULL,
    ubicacion_id INT,
    FOREIGN KEY (ubicacion_id) REFERENCES Ubicaciones(id)
);

-- Inserts para Ubicaciones
INSERT INTO Ubicaciones (id, ciudad, provincia) VALUES (1, 'Valencia', 'Valencia');
INSERT INTO Ubicaciones (id, ciudad, provincia) VALUES (2, 'Almeria', 'Almeria');
INSERT INTO Ubicaciones (id, ciudad, provincia) VALUES (3, 'Mojacar', 'Almeria');
INSERT INTO Ubicaciones (id, ciudad, provincia) VALUES (4, 'Sanlucar', 'Cádiz');
INSERT INTO Ubicaciones (id, ciudad, provincia) VALUES (5, 'Málaga', 'Málaga');

-- Inserts para Hoteles
INSERT INTO Hoteles (nombre, estrellas, tipo_habitacion, ubicacion_id) VALUES ('Hotel Azul', 3, 'habitación doble con vistas', 1);
INSERT INTO Hoteles (nombre, estrellas, tipo_habitacion, ubicacion_id) VALUES ('Hotel Blanco', 4, 'habitación doble', 3);
INSERT INTO Hoteles (nombre, estrellas, tipo_habitacion, ubicacion_id) VALUES ('Hotel Rojo', 3, 'habitación sencilla', 4);
INSERT INTO Hoteles (nombre, estrellas, tipo_habitacion, ubicacion_id) VALUES ('Hotel Verde', 4, 'Habitación doble con vistas', 1);
INSERT INTO Hoteles (nombre, estrellas, tipo_habitacion, ubicacion_id) VALUES ('Blue Hotel', 3, 'Double room', 2);
INSERT INTO Hoteles (nombre, estrellas, tipo_habitacion, ubicacion_id) VALUES ('Hotel Negro', 4, 'Suite', NULL);

-- Inserts para Apartamentos
INSERT INTO Apartamentos (nombre, num_apartamentos, capacidad_adultos, capacidad_ninios, ubicacion_id) VALUES ('Apartamentos Beach', 10, 4, 2, 2);
INSERT INTO Apartamentos (nombre, num_apartamentos, capacidad_adultos, capacidad_ninios, ubicacion_id) VALUES ('Apartamentos Sol y playa', 50, 6, 5, 3);
INSERT INTO Apartamentos (nombre, num_apartamentos, capacidad_adultos, capacidad_ninios, ubicacion_id) VALUES ('Apartamentos Playa', 20, 5, 3, 3);
INSERT INTO Apartamentos (nombre, num_apartamentos, capacidad_adultos, capacidad_ninios, ubicacion_id) VALUES ('Blue Apartments', 10, 4, 4, 4);
INSERT INTO Apartamentos (nombre, num_apartamentos, capacidad_adultos, capacidad_ninios, ubicacion_id) VALUES ('Beach Apartments', 15, 6, 2, NULL);

-- PRUEBAS
SELECT * FROM Ubicaciones;
SELECT * FROM Apartamentos;
SELECT * FROM Hoteles;

SELECT Apartamentos.*, Ubicaciones.ciudad, Ubicaciones.provincia 
FROM Apartamentos 
INNER JOIN Ubicaciones ON Apartamentos.ubicacion_id = Ubicaciones.id 
WHERE nombre LIKE '%lue%' ORDER BY nombre;

SELECT Hoteles.*, Ubicaciones.ciudad, Ubicaciones.provincia 
FROM Hoteles 
INNER JOIN Ubicaciones ON Hoteles.ubicacion_id = Ubicaciones.id 
WHERE nombre LIKE '%lue%' ORDER BY nombre