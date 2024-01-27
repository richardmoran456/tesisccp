CREATE TABLE
    IF NOT EXISTS usuarios (
        usuario_id int unsigned NOT NULL AUTO_INCREMENT,
        nombre_completo VARCHAR(140) NOT NULL,
        avatar VARCHAR(255) NULL,
        username VARCHAR(140) NOT NULL,
        passwd VARCHAR(140) NOT NULL,
        fk_departamento int unsigned NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (usuario_id),
        FOREIGN KEY (fk_departamento) REFERENCES departamentos (departamento_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;