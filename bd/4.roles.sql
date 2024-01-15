CREATE TABLE
    IF NOT EXISTS roles (
        rol_id int unsigned NOT NULL AUTO_INCREMENT,
        fk_modulo int unsigned NOT NULL,
        fk_usuario int unsigned NOT NULL,
        can_create BOOLEAN DEFAULT false,
        can_read BOOLEAN DEFAULT false,
        can_update BOOLEAN DEFAULT false,
        can_delete BOOLEAN DEFAULT false,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (rol_id),
        FOREIGN KEY (fk_modulo) REFERENCES modulos (modulo_id),
        FOREIGN KEY (fk_usuario) REFERENCES usuarios (usuario_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;