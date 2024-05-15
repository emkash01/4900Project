DROP TABLE IF EXISTS movie_rating;
DROP TABLE IF EXISTS show_rating;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS movie;
DROP TABLE IF EXISTS shows;

CREATE TABLE users (
   id SERIAL PRIMARY KEY,
   username VARCHAR(255)
);

CREATE TABLE movie (
   id SERIAL PRIMARY KEY,
   pic VARCHAR(1000), -- temporarily varchar
   title VARCHAR(255), --colum named name and text based column
   actor VARCHAR[],
   synop TEXT,
   genra VARCHAR[],
   sites VARCHAR[],
   duration VARCHAR(100),
   trailer VARCHAR(1000)
);

CREATE TABLE movie_rating (
  id SERIAL PRIMARY KEY,
  user_id INTEGER REFERENCES users(id),
  movie_id INTEGER REFERENCES movie(id),
  rating DOUBLE PRECISION
);

CREATE TABLE shows (
   id SERIAL PRIMARY KEY,
   pic VARCHAR(1000),
   title VARCHAR(255), --colum named name and text based column
   actor VARCHAR[], -- shouldn't this be array as well
   synop TEXT,
   genra VARCHAR[],
   sites VARCHAR[],
   duration VARCHAR(100),
   trailer VARCHAR(1000)
);


create table show_rating(
    id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES users(id),
    show_id INTEGER REFERENCES shows(id),
    rating DOUBLE PRECISION
);

INSERT into users(username) VALUES ('emkash');

INSERT INTO movie (pic, title, actor, synop, genra, sites, duration, trailer)
VALUES
    ('Movie_images/Oppenheimer_(film).jpg', 'Oppenheimer', '{"Cillian Murphy"}', 'A biographical film about J. Robert Oppenheimer and his role in the development of the atomic bomb.', '{"Biography", "Drama", "History"}', '{"Theatrical Release"}', '2h 30m', 'https://www.youtube.com/embed/bK6ldnjE3Y0?si=nnhrcEJlTJYTb1Sj'),
    ('Movie_images/CACivilWar.jpg', 'Captain America: Civil War', '{"Chris Evans", "Robert Downey Jr."}', 'Political interference in the Avengers activities causes a rift between former allies Captain America and Iron Man.', '{"Action", "Adventure", "Superhero"}', '{"Theatrical Release"}', '2h 27m', 'https://www.youtube.com/embed/9azO_bO9cyk?si=tuGrI8qGHkBQu05Z'),
    ('Movie_images/HTTYD3.jpg', 'How to Train Your Dragon: The Hidden World', '{"Jay Baruchel", "America Ferrera"}', 'When Hiccup discovers Toothless is not the only Night Fury, he must seek "The Hidden World", a secret Dragon Utopia before a hired tyrant finds it first.', '{"Animation", "Adventure", "Family"}', '{"Theatrical Release"}', '1h 44m', 'https://www.youtube.com/embed/Hq4qAtN_gC0?si=ll0UXK4byyAq8qIq'),
    ('Movie_images/Deadpool3.jpg', 'Deadpool 3', '{"Ryan Reynolds"}', 'In the third installment of the Deadpool franchise, the irreverent mercenary Deadpool brings his unique brand of justice and humor back to the screen.', '{"Action", "Comedy", "Superhero"}', '{"Theatrical Release"}', '2h 10m', 'https://www.youtube.com/embed/uJMCNJP2ipI?si=vO6aqddYEGa_XauP'),
    ('Movie_images/MadameWeb.jpg', 'Madame Web', '{"Dakota Johnson"}', 'Madame Web, a clairvoyant mutant who can see within the spider world, gets her own story.', '{"Action", "Adventure", "Superhero"}', '{"Theatrical Release"}', '2h 15m', 'https://www.youtube.com/embed/s_76M4c4LTo?si=7t9aNd6Jw7cucXyA'),
    ('Movie_images/Barbie.jpg','Barbie','{"Margor Robbie", "Ryan Gosling"}', 'barbie but live action','{"Adventure", "Comedy", "Fantasy"}','{"Max","Amazon"}','1h 54m','https://www.youtube.com/embed/pBk4NYhWNMM?si=eCgX8u24x60MuCbU'),
    ('Movie_images/FlowerMoon.jpg','Killers of the FLower Moon','{"Leonardo DiCaprio","Robert De Niro", "Lily Gladstone"}','Native american and cowboy','{"History","Crime","Drama"}','{"Apple TV", "Amazon"}','3h 26m','https://www.youtube.com/embed/7cx9nCHsemc?si=hcesIxwDR1y-kYgh'),
    ('Movie_images/PoorThings.jpg','Poor Things','{"Emma Stone","Mark Ruffalo","Willem Dafoe"}','The incredible tale about the fantastical evolution of Bella Baxter, a young woman brought back to life by the brilliant and unorthodox scientist Dr. Godwin Baxter.','{"Comedy","Drama","Romance"}','{"Amazon"}','2h 21m','https://www.youtube.com/embed/RlbR5N6veqw?si=chkQFUPSuuH7SDIu'),
    ('Movie_images/PastLives.jpg','Past Lives', '{"Greta Lee","Teo Yoo","John Magaro"}','Nora and Hae Sung, two deeply connected childhood friends, are wrested apart after Nora''s family emigrates from South Korea. Twenty years later, they are reunited for one fateful week as they confront notions of love and destiny.','{"Drama","Romance"}','{"Paramount","Amazon"}','1h 45m','https://www.youtube.com/embed/kA244xewjcI?si=T91FBMs4lURfwTe0'),
    ('Movie_images/TZI.jpg','The Zone of Interest','{"Christian Friedel"," Sandra Huller","Johann Karthaus"}','Auschwitz commandant Rudolf Höss and his wife Hedwig strive to build a dream life for their family in a house and garden beside the camp.','{"Drama","War","History"}','{"Amazon"}', '1h 45m','https://www.youtube.com/embed/r-vfg3KkV54?si=-YlsHTPLN0Z4jDKy');


INSERT INTO shows (pic, title, actor, synop, genra, sites, duration, trailer)
VALUES
    ('show_images/dbz.jpg','Dragon Ball Z','{Sean Schemmel, Chris Sabat, Monica Rial}','Dragon Ball Z follows the adventures of Goku and his friends as they defend Earth against powerful foes and intergalactic threats, with epic battles, transformations, and the pursuit of the magical Dragon Balls to save the world.', '{Action, Adventure, Fantasy}', '{CrunchyRoll, Hulu, Amazon}', '117 hours','https://www.youtube.com/watch?v=Byo4rgMHUM4'),
    ('show_images/chowder.jpg',  'Chowder', '{Nicky Jones, Dwight Schultz, John DiMaggio}', 'In  Marzipan City, excitable young food-loving Chowder is the apprentice of Mung Daal, a very old chef who runs a catering company with his wife Truffles and assistant Shnitzel.', '{Comedy, Adventure, Family}', '{Cartoon Network, Hulu, Amazon}', '19 hours','https://www.youtube.com/watch?v=Cr0b7wzCH0E'),
    ('show_images/naruto.jpg',  'Naruto', '{Maile Flanagan, Kate Higgins, Yuri Lowenthal}', 'Naruto Uzumaki ,a mischievous adolescent ninja, struggles as he searches for recognition and dreams of becoming the Hokage, which is the leader of the village, and strongest ninja', '{Action, Adventure, Comedy}', '{Hulu, Netflix ,CrunchyRoll}', '84 hours','https://www.youtube.com/watch?v=-G9BqkgZXRA'),
    ('show_images/flapjack.jpg', 'The Marvelous Misadventures of Flapjack','{Thurop Van Orman, Brian Doyle-Murray, Steve Little}','The comical seafaring adventures of a young, enthusiastic boy, his pirate captain mentor, and the talking whale that raised him from birth.', '{Comedy, Adventure, Horror}', '{Hulu, Amazon}', '21 hours','https://www.youtube.com/watch?v=htxbg6XK8wk'),
    ('show_images/one_piece.jpg', 'One Piece','{Colleen Clinkenbeard, Sonny Strait, Christopher Sabat}','Monkey D. Luffy sets off on an adventure with his pirate crew in hopes of finding the greatest treasure ever, known as the "One Piece."', '{Adventure, Action, Comedy}', '{Hulu, Crunchyroll, Netflix}', '437 hours','https://www.youtube.com/watch?v=MCb13lbVGE0');




-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0214341/mediaviewer/rm1132797952/?ref_=tt_ov_i','Dragon Ball Z','{Sean Schemmel, Chris Sabat, Monica Rial}','Dragon Ball Z follows the adventures of Goku and his friends as they defend Earth against powerful foes and intergalactic threats, with epic battles, transformations, and the pursuit of the magical Dragon Balls to save the world.', '{Action, Adventure, Fantasy}', '{CrunchyRoll, Hulu, Amazon}', '117 hours','https://www.youtube.com/watch?v=Byo4rgMHUM4');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt1140100/mediaviewer/rm215754752/?ref_=tt_ov_i', 'Chowder', '{Nicky Jones, Dwight Schultz, John DiMaggio}', 'In  Marzipan City, excitable young food-loving Chowder is the apprentice of Mung Daal, a very old chef who runs a catering company with his wife Truffles and assistant Shnitzel.', '{Comedy, Adventure, Family}', '{Cartoon Network, Hulu, Amazon}', '19 hours','https://www.youtube.com/watch?v=Cr0b7wzCH0E');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0409591/mediaviewer/rm651630848/?ref_=tt_ov_i', 'Naruto', '{Maile Flanagan, Kate Higgins, Yuri Lowenthal}', 'Naruto Uzumaki ,a mischievous adolescent ninja, struggles as he searches for recognition and dreams of becoming the Hokage, which is the leader of the village, and strongest ninja', '{Action, Adventure, Comedy}', '{Hulu, Netflix ,CrunchyRoll}', '84 hours','https://www.youtube.com/watch?v=-G9BqkgZXRA');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt1178180/mediaviewer/rm1348214273/?ref_=tt_ov_i', 'The Marvelous Misadventures of Flapjack','{Thurop Van Orman, Brian Doyle-Murray, Steve Little}','The comical seafaring adventures of a young, enthusiastic boy, his pirate captain mentor, and the talking whale that raised him from birth.', '{Comedy, Adventure, Horror}', '{Hulu, Amazon}', '21 hours','https://www.youtube.com/watch?v=htxbg6XK8wk');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0388629/mediaviewer/rm63129601/?ref_=tt_ov_i', 'One Piece','{Colleen Clinkenbeard, Sonny Strait, Christopher Sabat}','Monkey D. Luffy sets off on an adventure with his pirate crew in hopes of finding the greatest treasure ever, known as the "One Piece."', '{Adventure, Action, Comedy}', '{Hulu, Crunchyroll, Netflix}', '437 hours','https://www.youtube.com/watch?v=MCb13lbVGE0');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0343314/mediaviewer/rm2117535233/?ref_=tt_ov_i', 'Teen Titans','{Scott Menville, Hynden Walch, Greg Cipes}','A team of five teenaged superheroes save the world from many villains around their city while experiencing things normal teens face today.', '{Action, Adventure, Sci-Fi}', '{Amazon, HBO Max}', '8 hours','https://www.youtube.com/watch?v=yL75mtNZ6PA');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt2051178/mediaviewer/rm2482316289/?ref_=tt_ov_i', 'Fate/Zero','{Matthew Mercer, Crispin Freeman, Kari Wahlgren}','Seven chosen mages and their summoned heroic spirits fight against each other to try and win the Holy Grail: a magical device that can grant any wish.', '{Action, Fantasy, Thriller}', '{CrunchyRoll, Funimation, Hulu}', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0760437/mediaviewer/rm2168394241/?ref_=tt_ov_i', 'Ben 10','{Tara Strong, Meagan Moore, Paul Eiding}','The story of Ben Tennyson, a typical kid who becomes very atypical after he discovers the Omnitrix, a mysterious alien device with the power to transform the wearer into ten different alien species.', '{Action, Sci-Fi, Adventure}', '{Amazon}', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt3225270/mediaviewer/rm2196038912/?ref_=tt_ov_i', 'Noragami','{Jason Liebrecht, Bryn Apprill, Micah Solusod}','A minor god seeking to gain widespread worship teams up with a human girl he saved to gain fame, recognition and at least one shrine dedicated to him.', '{Action, Fantasy, Comedy}', '{Crunchyroll, Funimation, Hulu}', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');
--
--
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('Movie_images\Oppenheimer_(film).jpg','Oppenheimer','{"RDJ"}','banger movie', '{"Historical"}', '{"hbo"}', '3 hours','https://www.youtube.com/watch?v=bK6ldnjE3Y0&ab_channel=UniversalPictures');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fvariety.com%2Fgallery%2Fbarbie-movie-posters-cast%2F&psig=AOvVaw3pIPuVqddXw7mjWBePlafP&ust=1709855086252000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCLjF39no4IQDFQAAAAAdAAAAABAS','Barbie','{"Margor Robbie", "Ryan Gosling"}', 'barbie but live action','{"Adventure", "Comedy", "Fantasy"}','{"Max","Amazon"}','1h 54m','https://www.youtube.com/watch?v=E6sHWQcCUsQ&pp=ygUOYmFyYmllIHRyYWlsZXI%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FKillers_of_the_Flower_Moon_%2528film%2529&psig=AOvVaw3dsD6VGbrWEtgVg_1GBAYl&ust=1709855918204000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCPD_u-br4IQDFQAAAAAdAAAAABAG','Killers of the FLower Moon','{"Leonardo DiCaprio","Robert De Niro", "Lily Gladstone"}','Native american and cowboy','{"History","Crime","Drama"}','{"Apple TV", "Amazon"}','3h 26m','https://www.youtube.com/watch?v=EP34Yoxs3FQ&pp=ygUia2lsbGVycyBvZiB0aGUgZmxvd2VyIG1vb24gdHJhaWxlcg%3D%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.com%2FTHINGS-MOVIE-POSTER-ORIGINAL-RUFFALO%2Fdp%2FB0CJ6M3YTL&psig=AOvVaw38dvnymKsYQ7wOKZ_x_ZVG&ust=1709856989425000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCLjHpeXv4IQDFQAAAAAdAAAAABAE','Poor Things','{"Emma Stone","Mark Ruffalo","Willem Dafoe"}','The incredible tale about the fantastical evolution of Bella Baxter, a young woman brought back to life by the brilliant and unorthodox scientist Dr. Godwin Baxter.','{"Comedy","Drama","Romance"}','{"Amazon"}','2h 21m','https://www.youtube.com/watch?v=0JdlYZ8vPkA&pp=ygUYcG9vciB0aGluZ3MgdHJhaWxlciAyMDI0');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.imdb.com%2Ftitle%2Ftt13238346%2F&psig=AOvVaw2MPAx3J8rE77m340n-ZQu3&ust=1709857609982000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCLCyko3y4IQDFQAAAAAdAAAAABAW','Past Lives', '{"Greta Lee","Teo Yoo","John Magaro"}','Nora and Hae Sung, two deeply connected childhood friends, are wrested apart after Nora''s family emigrates from South Korea. Twenty years later, they are reunited for one fateful week as they confront notions of love and destiny.','{"Drama","Romance"}','{"Paramount","Amazon"}','1h 45m','https://www.youtube.com/watch?v=WJTnve_kdu0&pp=ygUXcGFzdCBsaXZlcyB0cmFpbGVyIDIwMjQ%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.imdb.com%2Ftitle%2Ftt7160372%2F&psig=AOvVaw0sJSBuaw0szURTS3BSKhH_&ust=1709858392842000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCNDuuIL14IQDFQAAAAAdAAAAABAE','The Zone of Interest','{"Christian Friedel"," Sandra Huller","Johann Karthaus"}','Auschwitz commandant Rudolf Höss and his wife Hedwig strive to build a dream life for their family in a house and garden beside the camp.','{"Drama","War","History"}','{"Amazon"}', '1h 45m','https://www.youtube.com/watch?v=r-vfg3KkV54&pp=ygUhVGhlIFpvbmUgb2YgSW50ZXJlc3QgdHJhaWxlciAyMDI0');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt17009710/mediaviewer/rm3574749441/?ref_=tt_ov_i','Anatomy of a Fall','{"Sandra Huller", "Swann Arlaud", "Milo Machado-Graner"}','A woman is suspected of murder after her husband''s death; their half-blind son faces a moral dilemma as the main witness.','{"Crime","Drama","Thriller"}','{"Amazon"}','2h 31m','https://www.youtube.com/watch?v=dKtIG68cQuI&pp=ygUeYW5hdG9teSBvZiBhIGZhbGwgdHJhaWxlciAyMDI0' );
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt14849194/mediaviewer/rm472142593/?ref_=tt_ov_i','The Holdovers', '{"Paul Giamatti", "Da''Vine Joy Randolph", "Dominic Sessa"}','A cranky history teacher at a prep school is forced to remain on campus over the holidays with a grieving cook and a troubled student who has no place to go.','{"Drama","Comedy"}','{"Peacock","Amazon"}','2h 13m','https://www.youtube.com/watch?v=AhKLpJmHhIg&pp=ygUadGhlIGhvbGRvdmVycyB0cmFpbGVyIDIwMjQ%3D' );
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt13651794/mediaviewer/rm189157889/?ref_=tt_ov_i','May December','{"Natalie Portman","Chris Tenzis","Charles Melton"}','Twenty years after their notorious tabloid romance gripped the nation, a married couple buckles under pressure when an actress arrives to do research for a film about their past.','{"Comedy","Drama"}','{"Netflix"}','1h 57m','https://www.youtube.com/watch?v=4VdAParM4h8&pp=ygUZbWF5IGRlY2VtYmVyIHRyYWlsZXIgMjAyNA%3D%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt23561236/mediaviewer/rm192366593/?ref_=tt_ov_i','American Fiction','{"Jeffrey Wright","tracee Ellis Ross"," John Ortiz"}','A novelist who''s fed up with the establishment profiting from Black entertainment uses a pen name to write a book that propels him into the heart of the hypocrisy and madness he claims to disdain.','{"Drama","Comedy"}', '{"Amazon"}', '1h 57m','https://www.youtube.com/watch?v=Y7D4tNdbNm4&pp=ygUcYW1lcmljYW4gZmljdGlvbiByYWlsZXIgMjAyNA%3D%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt13521006/mediaviewer/rm339957249/?ref_=tt_ov_i','Beau Is Afraid', '{"Joaquin Pheonix","Patti LuPone","Amy Ryan"}','Following the sudden death of his mother, a mild-mannered but anxiety-ridden man confronts his darkest fears as he embarks on an epic, Kafkaesque odyssey back home.','{"Comedy","Horror","Drama"}','{"Paramount","Amazon"}','2h 59m','https://www.youtube.com/watch?v=kGBM7sJDulw&pp=ygUaYmVhdSBvcyBhZnJhaWQgcmFpbGVyIDIwMjQ%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt21027780/mediaviewer/rm4035203329/?ref_=tt_ov_i','Fallen Leaves','{"Alma Poysti","Jussi Vatanen","Janne Hyytiainen"}','In modern-day Helsinki, two lonely souls in search of love meet by chance in a karaoke bar. However, their path to happiness is beset by obstacles - from lost phone numbers to mistaken addresses, alcoholism, and a charming stray dog.','{"Comedy","Drama"}', '{"MUBI","Amazon"}','1h 21m','https://www.youtube.com/watch?v=AI3IASNvKeQ&pp=ygUZZmFsbGVuIGxlYXZlcyByYWlsZXIgMjAyNA%3D%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt8760708/mediaviewer/rm4216980993/?ref_=tt_ov_i','M3gan', '{"Allison Williams","Violet McGraw","Ronny Chieng"}','A robotics engineer at a toy company builds a life-like doll that begins to take on a life of its own.','{"Horror","Sci-Fi","Thriller"}','{"Amazon"}','1h 42m','https://www.youtube.com/watch?v=BRb4U99OU80&pp=ygUSbWVnYW4gdHJhaWxlciAyMDI0');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt5535276/mediaviewer/rm3842791169/?ref_=tt_ov_i','Maestro', '{"Carey Mulligan","Bradley Cooper","Matt Bomer"}','This love story chronicles the lifelong relationship of conductor-composer Leonard Bernstein and actress Felicia Montealegre Cohn Bernstein.','{"Biography","Drama","History"}','{"Netflix"}', '2h 9m', 'https://www.youtube.com/watch?v=gJP2QblqLA0&pp=ygUUbWFlc3RybyB0cmFpbGVyIDIwMjQ%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.ebay.com%2Fitm%2F225859872103&psig=AOvVaw0DE6VktTEE3oT88WkSH0jQ&ust=1710641055294000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCOD94NTY94QDFQAAAAAdAAAAABAH','Napoleon','{"Joaquin Phoenix","Vanessa kirby","Tahar Rahim"}','An epic that details the chequered rise and fall of French Emperor Napoleon Bonaparte and his relentless journey to power through the prism of his addictive, volatile relationship with his wife, Josephine.','{"Action","Adventure","Biography"}','{"Apple Tv","Amazon"}','2h 38m','https://www.youtube.com/watch?v=OAZWXUkrjPc&pp=ygUQbmFwb2xlYW4gdHJhaWxlcg%3D%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.google.com/imgres?imgurl=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FM%2FMV5BNDM4NTk0NjktZDJhMi00MmFmLTliMzEtN2RkZDY2OTNiMDgzXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg&tbnid=oMAn1DmQ_8NARM&vet=12ahUKEwja9Kj52feEAxX1K2IAHdPLDYYQMygAegQIARBQ..i&imgrefurl=https%3A%2F%2Fwww.imdb.com%2Ftitle%2Ftt6166392%2F&docid=smV4_mnwASSjTM&w=1638&h=2048&q=2023%20wonka&ved=2ahUKEwja9Kj52feEAxX1K2IAHdPLDYYQMygAegQIARBQ','Wonka','{"Timothee Chalamet","Gustave Die","Murray McArthur"}','With dreams of opening a shop in a city renowned for its chocolate, a young and poor Willy Wonka discovers that the industry is run by a cartel of greedy chocolatiers.','{"Adventure","Comedy","Family"}','{"Max, Amazon"}','1h 56m','https://www.youtube.com/watch?v=otNh9bTjXWg&pp=ygUNd29ua2EgdHJhaWxlcg%3D%3D');
-- INSERT INTO movie(pic,title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt5971474/mediaviewer/rm1618294017/?ref_=tt_ov_i','The Little Mermaid','{"Halle Bailey","Melissa McCarthy","Jonah Hauer-King"}','A young mermaid makes a deal with a sea witch to trade her beautiful voice for human legs so she can discover the world above water and impress a prince.','{"Adventure","Family","Fantasy"}','{"Amazon"}','2h 15m','https://www.youtube.com/watch?v=kpGo2_d3oYE&pp=ygUadGhlIGxpdHRlIG1lcm1haWQnIHRyYWlsZXI%3D');
--
--
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0214341/mediaviewer/rm1132797952/?ref_=tt_ov_i','Dragon Ball Z','{Sean Schemmel, Chris Sabat, Monica Rial}','Dragon Ball Z follows the adventures of Goku and his friends as they defend Earth against powerful foes and intergalactic threats, with epic battles, transformations, and the pursuit of the magical Dragon Balls to save the world.', '{Action, Adventure, Fantasy}', '{CrunchyRoll, Hulu, Amazon}', '117 hours','https://www.youtube.com/watch?v=Byo4rgMHUM4');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt1140100/mediaviewer/rm215754752/?ref_=tt_ov_i', 'Chowder', '{Nicky Jones, Dwight Schultz, John DiMaggio}', 'In  Marzipan City, excitable young food-loving Chowder is the apprentice of Mung Daal, a very old chef who runs a catering company with his wife Truffles and assistant Shnitzel.', '{Comedy, Adventure, Family}', '{Cartoon Network, Hulu, Amazon}', '19 hours','https://www.youtube.com/watch?v=Cr0b7wzCH0E');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0409591/mediaviewer/rm651630848/?ref_=tt_ov_i', 'Naruto', '{Maile Flanagan, Kate Higgins, Yuri Lowenthal}', 'Naruto Uzumaki ,a mischievous adolescent ninja, struggles as he searches for recognition and dreams of becoming the Hokage, which is the leader of the village, and strongest ninja', '{Action, Adventure, Comedy}', '{Hulu, Netflix ,CrunchyRoll}', '84 hours','https://www.youtube.com/watch?v=-G9BqkgZXRA');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt1178180/mediaviewer/rm1348214273/?ref_=tt_ov_i', 'The Marvelous Misadventures of Flapjack','{Thurop Van Orman, Brian Doyle-Murray, Steve Little}','The comical seafaring adventures of a young, enthusiastic boy, his pirate captain mentor, and the talking whale that raised him from birth.', '{Comedy, Adventure, Horror}', '{Hulu, Amazon}', '21 hours','https://www.youtube.com/watch?v=htxbg6XK8wk');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0388629/mediaviewer/rm63129601/?ref_=tt_ov_i', 'One Piece','{Colleen Clinkenbeard, Sonny Strait, Christopher Sabat}','Monkey D. Luffy sets off on an adventure with his pirate crew in hopes of finding the greatest treasure ever, known as the "One Piece."', '{Adventure, Action, Comedy}', '{Hulu, Crunchyroll, Netflix}', '437 hours','https://www.youtube.com/watch?v=MCb13lbVGE0');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0343314/mediaviewer/rm2117535233/?ref_=tt_ov_i', 'Teen Titans','{Scott Menville, Hynden Walch, Greg Cipes}','A team of five teenaged superheroes save the world from many villains around their city while experiencing things normal teens face today.', '{Action, Adventure, Sci-Fi}', '{Amazon, HBO Max}', '8 hours','https://www.youtube.com/watch?v=yL75mtNZ6PA');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt2051178/mediaviewer/rm2482316289/?ref_=tt_ov_i', 'Fate/Zero','{Matthew Mercer, Crispin Freeman, Kari Wahlgren}','Seven chosen mages and their summoned heroic spirits fight against each other to try and win the Holy Grail: a magical device that can grant any wish.', '{Action, Fantasy, Thriller}', '{CrunchyRoll, Funimation, Hulu}', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt0760437/mediaviewer/rm2168394241/?ref_=tt_ov_i', 'Ben 10','{Tara Strong, Meagan Moore, Paul Eiding}','The story of Ben Tennyson, a typical kid who becomes very atypical after he discovers the Omnitrix, a mysterious alien device with the power to transform the wearer into ten different alien species.', '{Action, Sci-Fi, Adventure}', '{Amazon}', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');
-- INSERT INTO shows(pic, title, actor, synop, genra, sites, duration, trailer)
-- VALUES('https://www.imdb.com/title/tt3225270/mediaviewer/rm2196038912/?ref_=tt_ov_i', 'Noragami','{Jason Liebrecht, Bryn Apprill, Micah Solusod}','A minor god seeking to gain widespread worship teams up with a human girl he saved to gain fame, recognition and at least one shrine dedicated to him.', '{Action, Fantasy, Comedy}', '{Crunchyroll, Funimation, Hulu}', '10 hours','https://www.youtube.com/watch?v=n-7PFiut1HI');

