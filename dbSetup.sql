DROP TABLE movie IF EXISTS movie
CREATE TABLE movie(
	id SERIAL PRIMARY KEY,
	title VARCHAR(255),--colum named name and text based column
	actor VARCHAR(100),
	synop VARCHAR(1000),
	rating DOUBLE PRECISION,
	genra VARCHAR(100),
	sites VARCHAR(100),
	duration VARCHAR(100),
	trailer VARCHAR(100)
);

INSERT INTO movie(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('Oppenheimer','RDJ','banger movie', 8.4, 'Historical', 'hbo', '3 hours','https://www.youtube.com/watch?v=bK6ldnjE3Y0&ab_channel=UniversalPictures');

SELECT * FROM movie;




