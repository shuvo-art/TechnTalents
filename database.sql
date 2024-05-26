CREATE DATABASE myapp;
USE myapp;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    answer TEXT NOT NULL,
    correct TINYINT(1) DEFAULT 0,
    FOREIGN KEY (question_id) REFERENCES questions(id)
);

INSERT INTO users (email, password) VALUES ('a@gmail.com', '1234');