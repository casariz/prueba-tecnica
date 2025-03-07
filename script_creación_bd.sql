-- Crear base de datos y usarla
CREATE DATABASE IF NOT EXISTS prueba_tecnica;
USE prueba_tecnica;

-- Tabla de monedas: almacena el nombre y símbolo de cada moneda local
CREATE TABLE IF NOT EXISTS monedas (
    moneda_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    simbolo VARCHAR(10) NOT NULL
);

-- Tabla de ciudades: almacena el nombre de la ciudad y referencia a su moneda local
CREATE TABLE IF NOT EXISTS ciudades (
    ciudad_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    moneda_id INT NOT NULL,
    FOREIGN KEY (moneda_id) REFERENCES monedas(moneda_id)
);

-- Tabla de consultas: almacena el historial de conversiones realizadas
CREATE TABLE IF NOT EXISTS historial (
    historial_id INT AUTO_INCREMENT PRIMARY KEY,
    ciudad_id INT NOT NULL,
    presupuesto_cop DECIMAL(10,2) NOT NULL,
    presupuesto_local DECIMAL(10,2) NOT NULL,
    tasa_cambio DECIMAL(10,4) NOT NULL,
    fecha_consulta DATETIME NOT NULL,
    FOREIGN KEY (ciudad_id) REFERENCES ciudades(ciudad_id)
);


INSERT INTO monedas (nombre, simbolo) VALUES 
('Libra Esterlina', '£'),
('Dólar', '$'),
('Euro', '€'),
('Yen', '¥');

INSERT INTO ciudades (nombre, moneda_id) VALUES 
('London', 1),
('New York', 2),
('Paris', 3),
('Tokio', 4),
('Madrid', 3);
