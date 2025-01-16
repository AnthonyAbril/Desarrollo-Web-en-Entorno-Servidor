CREATE DATABASE empresa_db;

USE empresa_db;

CREATE TABLE empleados (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100) NOT NULL,
 apellido VARCHAR(100) NOT NULL,
 salario DECIMAL(10, 2) NOT NULL,
 fecha_contratacion DATE NOT NULL,
 puesto VARCHAR(100) NOT NULL
);

INSERT INTO empleados (nombre, apellido, salario, fecha_contratacion, puesto) VALUES
('Juan', 'Pérez', 1500.00, '2021-03-15', 'Desarrollador'),
('Ana', 'González', 2000.00, '2020-07-01', 'Gerente'),
('Carlos', 'Martínez', 1200.00, '2022-01-10', 'Soporte Técnico');