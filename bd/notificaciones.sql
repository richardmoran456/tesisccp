CREATE TABLE
    IF NOT EXISTS notificaciones (
        notificacion_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        fk_departamento INT UNSIGNED NOT NULL,
        leido enum ("si", "no") DEFAULT "no",
        descripcion_notificacion VARCHAR(500) NOT NULL,
        url_notificacion VARCHAR(500) NOT NULL,
        created_at DATETIME NOT NULL,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (notificacion_id),
        FOREIGN KEY (fk_departamento) REFERENCES departamentos (departamento_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;