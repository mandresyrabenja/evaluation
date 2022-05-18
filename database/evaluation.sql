CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE car (
    numero VARCHAR(255) NOT NULL,
    insurance date,
    technical_visit date,
    car_model_id INT
) ENGINE=InnoDB;


CREATE TABLE car_brand (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE car_model (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    car_brand_id INT,
    car_type_id INT
) ENGINE=InnoDB;


CREATE TABLE car_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE driver (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;



CREATE TABLE travel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    end_km INT NOT NULL,
    end_time timestamp,
    endplace VARCHAR(255),
    fuel_price NUMERIC(10, 2),
    fuel_quantity INT NOT NULL,
    reason VARCHAR(255),
    start_km INT NOT NULL,
    start_place VARCHAR(255),
    start_time timestamp,
    car_id VARCHAR(255),
    driver_id INT
) ENGINE=InnoDB;