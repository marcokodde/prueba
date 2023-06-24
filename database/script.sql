CREATE DATABASE pruebas;

use pruebas;

CREATE TABLE productos(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  price integer,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE productos;
