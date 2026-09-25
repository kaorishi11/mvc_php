CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(100),
    ano_publicacao INT,
    quantidade INT NOT NULL DEFAULT 0
);

INSERT INTO livros (titulo, autor, genero, ano_publicacao, quantidade) VALUES
('O Cortiço', 'Aluísio Azevedo', 'Romance', 1890, 10),
('A Rainha Vermelha', 'Victoria Aveyard', 'Ficção', 2015, 5),
('A Cabeça do Santo', 'Socorro Acioli', 'Romance', 2014, 9),
('Romeu e Julieta', 'William Shakespeare', 'Ficção', 1597, 2);