CREATE TABLE
    IF NOT EXISTS tareas (
        tarea_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        titulo_tarea VARCHAR(140) NOT NULL,
        descripcion_tarea VARCHAR(500) NOT NULL,
        estatus_tarea VARCHAR(140) NULL DEFAULT 'abierto',
        fk_creado INT UNSIGNED NOT NULL,
        fk_departamento_origen INT UNSIGNED NOT NULL,
        fk_departamento_destino INT UNSIGNED NOT NULL,
        created_at DATETIME NOT NULL,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        close_at DATETIME NOT NULL,
        PRIMARY KEY (tarea_id),
        FOREIGN KEY (fk_creado) REFERENCES usuarios (usuario_id),
        FOREIGN KEY (fk_departamento_origen) REFERENCES departamentos (departamento_id),
        FOREIGN KEY (fk_departamento_destino) REFERENCES departamentos (departamento_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;

-- estatus_tarea;
-- abierto,
-- cerrado,
-- completado
CREATE TABLE
    IF NOT EXISTS historial_tareas (
        historial_tarea_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        descripcion_tarea VARCHAR(500) NOT NULL,
        fk_usuario INT UNSIGNED NOT NULL,
        fk_tarea INT UNSIGNED NOT NULL,
        created_at DATETIME NOT NULL,
        modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (historial_tarea_id),
        FOREIGN KEY (fk_usuario) REFERENCES usuarios (usuario_id),
        FOREIGN KEY (fk_tarea) REFERENCES tareas (tarea_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;