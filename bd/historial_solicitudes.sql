CREATE TABLE
    IF NOT EXISTS historial_solicitudes (
        historial_solicitud_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        descripcion_solicitud VARCHAR(500) NOT NULL,
        fk_usuario INT UNSIGNED NOT NULL,
        fk_solicitud INT UNSIGNED NOT NULL,
        created_at DATETIME NOT NULL,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (historial_solicitud_id),
        FOREIGN KEY (fk_usuario) REFERENCES usuarios (usuario_id),
        FOREIGN KEY (fk_solicitud) REFERENCES solicitudes (solicitud_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;