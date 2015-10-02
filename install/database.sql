CREATE DATABASE IF NOT EXISTS persistentlogin COLLATE utf8_general_ci;

CREATE USER 'sess_admin'@'localhost' IDENTIFIED BY 'secret';

GRANT SELECT, INSERT, UPDATE, DELETE ON persistentlogin.* TO 'sess_admin'@'localhost';
