DROP TABLE movie;
CREATE TABLE movie(
	id SERIAL PRIMARY KEY,
	pic VARCHAR(100000), -- temporarily varchar
	title VARCHAR(255),--colum named name and text based column
	actor VARCHAR[],
	synop VARCHAR(100000),
	rating DOUBLE PRECISION,
	genra VARCHAR[],
	sites VARCHAR[],
	duration VARCHAR(100000),
	trailer VARCHAR(100000)
);
CREATE TABLE shows(
    id SERIAL PRIMARY KEY,
    pic VARCHAR(100000), -- temporarily varchar
    title VARCHAR(255),--colum named name and text based column
    actor VARCHAR[], -- shouldnt this be array as well
    synop VARCHAR(1000),
    rating DOUBLE PRECISION,
    genra VARCHAR[],
    sites VARCHAR[],
    duration VARCHAR(100000),
    trailer VARCHAR(100000)
);

INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FOppenheimer_%2528film%2529&psig=AOvVaw3UDE3CRtVxmmvgYsUIgV6z&ust=1709854003663000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCICSxdXk4IQDFQAAAAAdAAAAABAE','Oppenheimer','{"RDJ"}','banger movie', 8.4, '{"Historical"}', '{"hbo"}', '3 hours','https://www.youtube.com/watch?v=bK6ldnjE3Y0&ab_channel=UniversalPictures');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fvariety.com%2Fgallery%2Fbarbie-movie-posters-cast%2F&psig=AOvVaw3pIPuVqddXw7mjWBePlafP&ust=1709855086252000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCLjF39no4IQDFQAAAAAdAAAAABAS','Barbie','{"Margor Robbie", "Ryan Gosling"}', 'barbie but live action',6.9,'{"Adventure", "Comedy", "Fantasy"}','{"Max","Amazon"}','1h 54m','https://www.youtube.com/watch?v=E6sHWQcCUsQ&pp=ygUOYmFyYmllIHRyYWlsZXI%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FKillers_of_the_Flower_Moon_%2528film%2529&psig=AOvVaw3dsD6VGbrWEtgVg_1GBAYl&ust=1709855918204000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCPD_u-br4IQDFQAAAAAdAAAAABAG','Killers of the FLower Moon','{"Leonardo DiCaprio","Robert De Niro", "Lily Gladstone"}','Native american and cowboy',7.7,'{"History","Crime","Drama"}','{"Apple TV", "Amazon"}','3h 26m','https://www.youtube.com/watch?v=EP34Yoxs3FQ&pp=ygUia2lsbGVycyBvZiB0aGUgZmxvd2VyIG1vb24gdHJhaWxlcg%3D%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.com%2FTHINGS-MOVIE-POSTER-ORIGINAL-RUFFALO%2Fdp%2FB0CJ6M3YTL&psig=AOvVaw38dvnymKsYQ7wOKZ_x_ZVG&ust=1709856989425000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCLjHpeXv4IQDFQAAAAAdAAAAABAE','Poor Things','{"Emma Stone","Mark Ruffalo","Willem Dafoe"}','The incredible tale about the fantastical evolution of Bella Baxter, a young woman brought back to life by the brilliant and unorthodox scientist Dr. Godwin Baxter.',8.2,'{"Comedy","Drama","Romance"}','{"Amazon"}','2h 21m','https://www.youtube.com/watch?v=0JdlYZ8vPkA&pp=ygUYcG9vciB0aGluZ3MgdHJhaWxlciAyMDI0');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.imdb.com%2Ftitle%2Ftt13238346%2F&psig=AOvVaw2MPAx3J8rE77m340n-ZQu3&ust=1709857609982000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCLCyko3y4IQDFQAAAAAdAAAAABAW','Past Lives', '{"Greta Lee","Teo Yoo","John Magaro"}','Nora and Hae Sung, two deeply connected childhood friends, are wrested apart after Nora''s family emigrates from South Korea. Twenty years later, they are reunited for one fateful week as they confront notions of love and destiny.',7.9,'{"Drama","Romance"}','{"Paramount","Amazon"}','1h 45m','https://www.youtube.com/watch?v=WJTnve_kdu0&pp=ygUXcGFzdCBsaXZlcyB0cmFpbGVyIDIwMjQ%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.imdb.com%2Ftitle%2Ftt7160372%2F&psig=AOvVaw0sJSBuaw0szURTS3BSKhH_&ust=1709858392842000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCNDuuIL14IQDFQAAAAAdAAAAABAE','The Zone of Interest','{"Christian Friedel"," Sandra Huller","Johann Karthaus"}','Auschwitz commandant Rudolf Höss and his wife Hedwig strive to build a dream life for their family in a house and garden beside the camp.',7.6,'{"Drama","War","History"}','{"Amazon"}', '1h 45m','https://www.youtube.com/watch?v=r-vfg3KkV54&pp=ygUhVGhlIFpvbmUgb2YgSW50ZXJlc3QgdHJhaWxlciAyMDI0');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt17009710/mediaviewer/rm3574749441/?ref_=tt_ov_i','Anatomy of a Fall','{"Sandra Huller", "Swann Arlaud", "Milo Machado-Graner"}','A woman is suspected of murder after her husband''s death; their half-blind son faces a moral dilemma as the main witness.',7.8,'{"Crime","Drama","Thriller"}','{"Amazon"}','2h 31m','https://www.youtube.com/watch?v=dKtIG68cQuI&pp=ygUeYW5hdG9teSBvZiBhIGZhbGwgdHJhaWxlciAyMDI0' );
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt14849194/mediaviewer/rm472142593/?ref_=tt_ov_i','The Holdovers', '{"Paul Giamatti", "Da''Vine Joy Randolph", "Dominic Sessa"}','A cranky history teacher at a prep school is forced to remain on campus over the holidays with a grieving cook and a troubled student who has no place to go.',8.0,'{"Drama","Comedy"}','{"Peacock","Amazon"}','2h 13m','https://www.youtube.com/watch?v=AhKLpJmHhIg&pp=ygUadGhlIGhvbGRvdmVycyB0cmFpbGVyIDIwMjQ%3D' );
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt13651794/mediaviewer/rm189157889/?ref_=tt_ov_i','May December','{"Natalie Portman","Chris Tenzis","Charles Melton"}','Twenty years after their notorious tabloid romance gripped the nation, a married couple buckles under pressure when an actress arrives to do research for a film about their past.',6.9,'{"Comedy","Drama"}','{"Netflix"}','1h 57m','https://www.youtube.com/watch?v=4VdAParM4h8&pp=ygUZbWF5IGRlY2VtYmVyIHRyYWlsZXIgMjAyNA%3D%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt23561236/mediaviewer/rm192366593/?ref_=tt_ov_i','American Fiction','{"Jeffrey Wright","tracee Ellis Ross"," John Ortiz"}','A novelist who''s fed up with the establishment profiting from Black entertainment uses a pen name to write a book that propels him into the heart of the hypocrisy and madness he claims to disdain.',7.6,'{"Drama","Comedy"}', '{"Amazon"}', '1h 57m','https://www.youtube.com/watch?v=Y7D4tNdbNm4&pp=ygUcYW1lcmljYW4gZmljdGlvbiByYWlsZXIgMjAyNA%3D%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt13521006/mediaviewer/rm339957249/?ref_=tt_ov_i','Beau Is Afraid', '{"Joaquin Pheonix","Patti LuPone","Amy Ryan"}','Following the sudden death of his mother, a mild-mannered but anxiety-ridden man confronts his darkest fears as he embarks on an epic, Kafkaesque odyssey back home.',6.7,'{"Comedy","Horror","Drama"}','{"Paramount","Amazon"}','2h 59m','https://www.youtube.com/watch?v=kGBM7sJDulw&pp=ygUaYmVhdSBvcyBhZnJhaWQgcmFpbGVyIDIwMjQ%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt21027780/mediaviewer/rm4035203329/?ref_=tt_ov_i','Fallen Leaves','{"Alma Poysti","Jussi Vatanen","Janne Hyytiainen"}','In modern-day Helsinki, two lonely souls in search of love meet by chance in a karaoke bar. However, their path to happiness is beset by obstacles - from lost phone numbers to mistaken addresses, alcoholism, and a charming stray dog.',7.4,'{"Comedy","Drama"}', '{"MUBI","Amazon"}','1h 21m','https://www.youtube.com/watch?v=AI3IASNvKeQ&pp=ygUZZmFsbGVuIGxlYXZlcyByYWlsZXIgMjAyNA%3D%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt8760708/mediaviewer/rm4216980993/?ref_=tt_ov_i','M3gan', '{"Allison Williams","Violet McGraw","Ronny Chieng"}','A robotics engineer at a toy company builds a life-like doll that begins to take on a life of its own.',6.4,'{"Horror","Sci-Fi","Thriller"}','{"Amazon"}','1h 42m','https://www.youtube.com/watch?v=BRb4U99OU80&pp=ygUSbWVnYW4gdHJhaWxlciAyMDI0');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('https://www.imdb.com/title/tt5535276/mediaviewer/rm3842791169/?ref_=tt_ov_i','Maestro', '{"Carey Mulligan","Bradley Cooper","Matt Bomer"}','This love story chronicles the lifelong relationship of conductor-composer Leonard Bernstein and actress Felicia Montealegre Cohn Bernstein.',6.6,'{"Biography","Drama","History"}','{"Netflix"}', '2h 9m', 'https://www.youtube.com/watch?v=gJP2QblqLA0&pp=ygUUbWFlc3RybyB0cmFpbGVyIDIwMjQ%3D');
INSERT INTO movie(pic,title, actor, synop, rating, genra, sites, duration, trailer)
VALUES();

INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('Dragon Ball Z','Sean Schemmel','goated anime', 9.2, 'Action', 'CrunchyRoll', '117 hours','https://www.youtube.com/watch?v=Byo4rgMHUM4');
INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('Chowder','Nicky Jones','funny', 8.0, 'Comedy', 'Cartoon network', '19 hours','https://www.youtube.com/watch?v=Cr0b7wzCH0E');
INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('Naruto','Maile Flanagan','very cool show', 7.3, 'Action', 'CrunchyRoll', '84 hours','https://www.youtube.com/watch?v=-G9BqkgZXRA');
INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('The Marvelous Misadventures of Flapjack','Thurop Van Orman','very strange show', 8.2, 'Comedy', 'Hulu', '21 hours','https://www.youtube.com/watch?v=htxbg6XK8wk');
INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('One Piece','Colleen Clinkenbeard','very long anime', 7.8, 'Adventure', 'Netflix', '437 hours','https://www.youtube.com/watch?v=MCb13lbVGE0');
INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('Teen Titans','Scott menville','really cool', 9.1, 'Action', 'CrunchyRoll', '8 hours','https://www.youtube.com/watch?v=yL75mtNZ6PA');
INSERT INTO shows(title, actor, synop, rating, genra, sites, duration, trailer)
VALUES('Fate/Zero','Matthew Mercer','goated anime', 9.4, 'Psychological Thriller', 'CrunchyRoll', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');

SELECT * FROM shows;





