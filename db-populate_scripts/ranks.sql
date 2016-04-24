/* ranks 
song_ranks(rank, song_name, song_artist, song_album, week)
album_ranks(rank, album, album_artist, week)

songs we have: snsd - i got a boy, dancing queen, baby maybe, talk talk, promise, express 999, lost in love, look at me, xyz, romantic st., the boys, telepathy, say yes, trick, how great is your love, 1, girl's generation, baby baby, complete, ooh la-la!, kissing you, merry-go-round, into the new world

albums we have: bigbang vol.1 big, made series, first step, 2get 

*/

INSERT INTO songs VALUES
('Toy', 'Blooming Period', 'Block B', 'KOR', interval '00:03:27', 2016-04-10, null, TRUE, 'K-pop', TRUE),
('Talk Love', 'Descendants of the Sun', 'K. Will', 'KOR', interval '00:03:37', 2016-03-17, null, TRUE, 'Ballad', TRUE),
('This Love', 'Amaranth', 'Davichi','KOR', interval '00:03:49', 2016-03-02, null, TRUE, 'Ballad', TRUE),
("You're the Best", 'Melting', 'Mamamoo', 'KOR', interval '00:03:52', 2016-02-25, null, TRUE, 'K-pop', TRUE),
("You're So Fine", 'CNBLUE', 'BLUEMING', 'KOR', interval '00:03:52', 2016-04-03, null, TRUE, 'K-pop', TRUE);


INSERT INTO album VALUES
('Blooming Period', 'Block B', 2016-04-10, 39800, 'K-pop'),
('BLUEMING', 'CNBLUE', 2016-04-04, 49064, 'Indie'),
('Flight Log: Departure', 'GOT7', 2016-03-21, 99977, 'R&B');

INSERT INTO song_ranks VALUES

(2, 'Toy', 'Block B', 'Blooming Period', 2016-04-10),
(4, 'Talk Love', 'K. Will', 'Descendants of the Sun', 2016-04-10),
(5, 'This Love', 'Davichi', 'Amaranth', 2016-04-10),
(1, 'Toy', 'Block B', 'Blooming Period' 2016-04-03),
(2, 'Talk Love', 'K. Will', null, 2016-04-03),
(16, "You're the Best", 'Mamamoo', 'Melting', 2016-04-03),
(19, "You're So Fine", 'CNBLUE', 'BLUEMING', 2016-04-03);



INSERT INTO album_ranks VALUES
(1, 'Blooming Period', 'Block B', 2016-04-10),
(2, 'BLUEMING', 'CNBLUE', 2016-04-10),
(5, 'Flight Log: Departure', 'GOT7', 2016-04-10);






