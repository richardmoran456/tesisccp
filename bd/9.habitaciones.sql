-- Crea una tabla para almacenar información sobre los departamentos de una organización.
-- La tabla tiene las siguientes columnas:
--
-- * departamento_id: Identificador único del departamento.
-- * nombre: Nombre del departamento.
-- * abreviatura: Abreviatura del departamento.
-- * created_at: Fecha y hora de creación del departamento.
-- * modified_at: Fecha y hora de la última modificación del departamento.
--
-- La tabla utiliza el motor de almacenamiento InnoDB y la codificación de caracteres utf8mb4 COLLATE utf8mb4_spanish_ci.
CREATE TABLE
  IF NOT EXISTS habitaciones (
    habitacion_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    identificador_habitacion VARCHAR(140) NOT NULL,
    created_at DATETIME NOT NULL,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    tipo_habitacion VARCHAR(140) NOT NULL,
    estatus_habitacion enum ('disponible', 'ocupada', 'mantenimiento') DEFAULT 'disponible',
    fk_piso INT UNSIGNED NOT NULL,
    PRIMARY KEY (habitacion_id),
    FOREIGN KEY (fk_piso) REFERENCES pisos (piso_id)
  ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- Estados de la habitacion
-- :disponible bg-info
-- :ocupada bg-success
-- :mantenimiento bg-danger
CREATE TABLE
  IF NOT EXISTS huesped_habitaciones (
    huesped_hab_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    fk_huesped INT UNSIGNED NOT NULL,
    fk_habitacion INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (huesped_hab_id),
    FOREIGN KEY (fk_huesped) REFERENCES huespedes (huesped_id),
    FOREIGN KEY (fk_habitacion) REFERENCES habitaciones (habitacion_id)
  ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;