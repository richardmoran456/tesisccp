CREATE TABLE
    IF NOT EXISTS modulos (
        modulo_id int unsigned NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(140) NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (modulo_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;


    INSERT INTO `modulos` (`modulo_id`, `nombre`, `created_at`, `modified_at`) VALUES (NULL, 'Gerencia', '2024-01-14 21:36:34.000000', CURRENT_TIMESTAMP);