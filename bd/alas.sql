CREATE TABLE
  IF NOT EXISTS alas (
    ala_id int unsigned NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(140) NOT NULL,
    created_at datetime NOT NULL,
    modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ala_id)
  ) ENGINE = InnoDB DEFAULT CHARSET utf8mb4 COLLATE = utf8mb4_spanish_ci;