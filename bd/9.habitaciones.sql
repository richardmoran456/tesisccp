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
    habitacion_id int unsigned NOT NULL AUTO_INCREMENT,
    identificador_habitacion VARCHAR(140) NOT NULL,
    created_at datetime NOT NULL,
    modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    tipo_habitacion VARCHAR(140) NOT NULL,
    PRIMARY KEY (habitacion_id),
    FOREIGN KEY (fk_piso) REFERENCES pisos (piso_id)
  ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;