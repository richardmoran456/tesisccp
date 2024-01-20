CREATE TABLE
  IF NOT EXISTS equipos (
    equipo_id int unsigned NOT NULL AUTO_INCREMENT,
    modelo VARCHAR(140) NOT NULL,
    nserial VARCHAR(140) NOT NULL,
    estado VARCHAR(140) NOT NULL,
    descripcion_equipo VARCHAR(140) NOT NULL,
    tipo_equipo VARCHAR(140) NOT NULL,
    created_at datetime NOT NULL,
    modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (equipo_id)
  ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;