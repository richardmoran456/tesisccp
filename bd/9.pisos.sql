CREATE TABLE
    IF NOT EXISTS pisos (
        piso_id int unsigned NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(140) NOT NULL,
        fk_ala int unsigned NOT NULL,
        created_at datetime NOT NULL,
        modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (piso_id),
        FOREIGN KEY (fk_ala) REFERENCES alas (ala_id)
    ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;