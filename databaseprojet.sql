DROP DATABASE IF EXISTS databaseprojet;
CREATE DATABASE databaseprojet;
USE databaseprojet;

CREATE TABLE user(
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_firstname VARCHAR(50) NOT NULL,
    user_lastname VARCHAR(50) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_birthday DATE NOT NULL
);


CREATE TABLE categorie (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (50) NOT NULL
);


CREATE TABLE payment (
    payment_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    payment_type VARCHAR (50) NOT NULL
);

CREATE TABLE type (
    type_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ope_type VARCHAR (50) NOT NULL
);


CREATE TABLE operation(
    ope_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ope_amount INT NOT NULL,
    type_id VARCHAR (50) NOT NULL,
    ope_date DATE NOT NULL, 
    ope_comment VARCHAR (255),
    ope_create_at DATE,
    ope_update_at DATE,
    user_id INT UNSIGNED NOT NULL,
    cate_id INT UNSIGNED NOT NULL,
    payment_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY (cate_id) REFERENCES categorie (id),
    FOREIGN KEY (payment_id) REFERENCES payment (id),
    FOREIGN KEY (type_id) REFERENCES type (ope_type)
);
