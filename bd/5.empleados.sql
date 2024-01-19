CREATE TABLE
    IF NOT EXISTS empleados (
        empleado_id int unsigned NOT NULL AUTO_INCREMENT,
        nombre_completo VARCHAR(140) NOT NULL,
        documento VARCHAR(20) NOT NULL,
        url_imagen VARCHAR(140) NOT NULL,
        url_resumen VARCHAR(140) NOT NULL,
        fk_puesto int unsigned NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (empleado_id),
        FOREIGN KEY (fk_puesto) REFERENCES puestos (puesto_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;