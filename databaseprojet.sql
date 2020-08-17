DROP DATABASE IF EXISTS databaseprojet;
CREATE DATABASE databaseprojet;
USE databaseprojet;

CREATE TABLE user(
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_firstname VARCHAR(50) NOT NULL,
    user_lastame VARCHAR(50) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_birthday DATE NOT NULL,
    user_create_at DATE,
    user_uptade_at DATE
);

CREATE TABLE operation(
    ope_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ope_amount INT NOT NULL,
    ope_type VARCHAR (50) NOT NULL,
    ope_date DATE NOT NULL, 
    ope_comment VARCHAR (255),
    ope_create_at DATE,
    ope_uptade_at DATE,
    user_id INT UNSIGNED NOT NULL,
    cate_id INT UNSIGNED NOT NULL,
    payment_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY (cate_id) REFERENCES categorie (cate_id),
    FOREIGN KEY (payment_id) REFERENCES payment (payment_id)

);

CREATE TABLE categorie (
    cate_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cate_name VARCHAR (50) NOT NULL,
    cate_create_at DATE,
    cate_uptade_at DATE
);

CREATE TABLE payment (
    payment_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    payment_name VARCHAR (50) NOT NULL,
    payment_create_at DATE,
    payment_uptade_at DATE
);