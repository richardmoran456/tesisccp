CREATE TABLE
    IF NOT EXISTS eventos (
        evento_id int unsigned NOT NULL AUTO_INCREMENT,
        titulo_evento VARCHAR(255) NULL,
        descripcion_evento VARCHAR(500) NULL,
        inicio_evento datetime NOT NULL,
        finaliza_evento datetime NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (evento_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;