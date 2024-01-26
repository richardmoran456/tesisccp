CREATE TABLE
    IF NOT EXISTS huespedes (
        huesped_id int unsigned NOT NULL AUTO_INCREMENT,
        nombre_completo VARCHAR(140) NOT NULL,
        documento VARCHAR(20) NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (huesped_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;