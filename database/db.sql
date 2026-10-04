CREATE DATABASE mercado_db;
USE mercado_db;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descricao TEXT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    data_validade DATE NOT NULL
);