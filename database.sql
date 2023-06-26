-- Active: 1687764265104@@127.0.0.1@3306@symfony_rest
DROP TABLE IF EXISTS movie;
DROP TABLE IF EXISTS genre;
DROP TABLE IF EXISTS genre_movie;

CREATE TABLE movie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    resume TEXT,
    released DATE,
    length INT
);

CREATE TABLE genre (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255)
);

CREATE TABLE genre_movie (
    id_movie INT,
    id_genre INT,
    PRIMARY KEY (id_movie,id_genre),
    Foreign Key (id_movie) REFERENCES movie(id),
    Foreign Key (id_genre) REFERENCES genre(id)
);

INSERT INTO movie (title,resume,released,length) VALUES
('The godfather', 'a mafia movie', '1972-10-18', 175),
('The godfather 2', 'a mafia movie sequel', '1974-12-20', 202),
('Star Wars', 'a jedi movie', '1977-05-25', 121),
('Howl\'s Moving Castle', 'a japanese animation film', '2004-11-20', 119);

INSERT INTO genre (label) VALUES ('Horror'), ('Sci-fi'),('Romance'),('Thriller'), ('Action');

INSERT INTO genre_movie(id_movie,id_genre) VALUES (1,1), (2,1), (3,2), (3,5), (4,5),(4,3);