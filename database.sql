-- Active: 1687764265104@@127.0.0.1@3306@symfony_rest

DROP TABLE IF EXISTS genre_movie;
DROP TABLE IF EXISTS movie;
DROP TABLE IF EXISTS genre;

CREATE TABLE movie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    resume TEXT,
    released DATE,
    duration INT
);

CREATE TABLE genre (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255)
);

CREATE TABLE genre_movie (
    id_movie INT,
    id_genre INT,
    PRIMARY KEY (id_movie,id_genre),
    Foreign Key (id_movie) REFERENCES movie(id) ON DELETE CASCADE,
    Foreign Key (id_genre) REFERENCES genre(id) ON DELETE CASCADE
);

INSERT INTO movie (title,resume,released,duration) VALUES
('The godfather', 'a mafia movie', '1972-10-18', 175),
('The godfather 2', 'a mafia movie sequel', '1974-12-20', 202),
('Star Wars', 'a jedi movie', '1977-05-25', 121),
('Howl\'s Moving Castle', 'a japanese animation film', '2004-11-20', 119);

INSERT INTO genre (label) VALUES ('Horror'), ('Sci-fi'),('Romance'),('Thriller'), ('Action');

INSERT INTO genre_movie(id_movie,id_genre) VALUES (1,1), (2,1), (3,2), (3,5), (4,5),(4,3);


-- Faire une requête SQL qui récupère tous les films et leurs genres s'ils en ont
SELECT * FROM movie 
LEFT JOIN genre_movie ON movie.id=genre_movie.id_movie
LEFT JOIN genre ON genre.id=genre_movie.id_genre;