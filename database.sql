-- Active: 1687764265104@@127.0.0.1@3306@symfony_rest
DROP TABLE IF EXISTS movie;

CREATE TABLE movie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    resume TEXT,
    released DATE,
    length INT
);

INSERT INTO movie (title,resume,released,length) VALUES
('The godfather', 'a mafia movie', '1972-10-18', 175),
('The godfather 2', 'a mafia movie sequel', '1974-12-20', 202),
('Star Wars', 'a jedi movie', '1977-05-25', 121),
('Howl\'s Moving Castle', 'a japanese animation film', '2004-11-20', 119);