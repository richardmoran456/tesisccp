CREATE TABLE
    IF NOT EXISTS puestos (
        puesto_id int unsigned NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(140) NOT NULL,
        fk_departamento int unsigned NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (puesto_id),
        FOREIGN KEY (fk_departamento) REFERENCES departamentos (departamento_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;