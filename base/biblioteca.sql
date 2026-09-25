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
('Dom Casmurro', 'Machado de Assis', 'Romance', 1899, 3),
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Literatura', 1943, 0),
('1984', 'George Orwell', 'Ficção', 1949, 2);