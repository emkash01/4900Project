CREATE TABLE movie(
	id SERIAL PRIMARY KEY,
	name VARCHAR(255),--colum named name and text based column
	actor VARCHAR(100),
	rating DOUBLE PRECISION
);

INSERT INTO movie(name, actor, rating)
VALUES('Aladdin','RDJ', 8.4);

SELECT * FROM movie;

