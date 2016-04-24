INSERT INTO week (
	SELECT date FROM generate_series( '2007-04-22'::date, 
	    '2016-04-19'::date, '7 days'::interval) date
);

INSERT INTO languages VALUES
('Korean', 'KOR'),
('Japanese', 'JPN'),
('English', 'ENG'),
('Chinese', 'CHI');

INSERT INTO country VALUES
('South Korea', 'KOR'),
('Japan', 'JPN'),
('United States of America', 'USA'),
('China', 'CHN');

INSERT INTO fan VALUES('heaven_Taewoo248', 'Oh Tae-woo', date('1996-03-25'), 'M'),
('yichen', 'Yichen', date('1995-03-14'), 'F'),
('fish_yeon605', 'Yoo Se-yeon', date('1994-02-12'), 'F'),
('salad_sooyeon402', 'Yoo Soo-yeon', date('1994-12-12'), 'F'),
('snowflake320', 'Gu Nam-hyun', date('1999-12-02'), 'M'),
('annie', 'He Annie', date('1995-07-20'), 'F'),
('luhanlove3', 'Le Rongqing', date('1980-02-15'), 'F'),
('winnielouu', 'Lou Weiqing', date('1994-02-12'), 'F'),
('Emma233', 'Emma Noah', date('2000-09-05'), 'F'),
('Davi89', 'Davi Abigail', date('1989-03-01'), 'M'),
('Ian', 'Ian', date('1993-09-10'), 'M'),
('Fred Durst', 'Jon', date('1988-05-10'), 'M');


INSERT INTO company VALUES
('S.M. Entertainment', 'Lee Soo-man', 246100000, 'KOR'),
('JYP Entertainment', 'J.Y. Park', 43700000, 'KOR'),
('FNC Entertainment', 'Han Seong-ho', 32038000000, 'KOR'),
('CJ E&M', 'Kim Sung-soo', 1.640000000, 'KOR'),
('Rainbow Bridge World', NULL, NULL, 'KOR'),
('YMC Entertainment', 'Cho Yoo-myung', NULL, 'KOR'),
('YG Entertainment', 'Yang Hyun-suk', 150000000, 'KOR'),
('LOEN Entertainment', 'Shin Won-soo', 323000000000, 'KOR');

INSERT INTO artist VALUES
('G-Dragon', date('2009-08-18'), 'YG Entertainment'),
('Sung Si-kyung', date('2000-01-01'), 'LOEN Entertainment'),
('Kim Jin-pyo', date('1995-01-01'), NULL),
('Yoon Do-hyun', date('1993-01-01'), NULL),
('Lena Park', date('1993-01-01'), 'LOEN Entertainment'),
('PSY', date('2001-01-12'), 'YG Entertainment'),
('Girls'' Generation', date('2007-08-05'), 'S.M. Entertainment'),
('Leessang', date('01-01-2002'), NULL);

INSERT INTO album VALUES 
('The Boys', 'Girls'' Generation', date('2011-11-19'), 457100, 'Electropop'),
('Girls'' Generation (Japanese)', 'Girls'' Generation', date('2011-06-01'), 11937, 'K-pop'),
('I Got a Boy', 'Girls'' Generation', date('2013-01-01'), 301500, 'K-pop'),
('Lion Heart', 'Girls'' Generation', date('2015-08-19'), 148825, 'Electropop'),
('Girls & Peace', 'Girls'' Generation', date('2012-11-28'), 1600, 'Bubblegum Pop'),
('Love & Peace', 'Girls'' Generation', date('2013-12-10'), 1700, 'Electropop'),
('Girls'' Generation', 'Girls'' Generation', date('2007-11-01'), 
126269, 'K-pop'),
('Psy 6 (Six Rules), Part 1', 'PSY', date('2012-07-15'), 
106594, 'Hip hop');


INSERT INTO song VALUES
('Girls'' Generation', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:03:50', date('2007-11-01'), NULL, TRUE, 'K-pop', TRUE),
('Baby Baby', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:03:11', date('2008-03-13'), NULL, TRUE, 'K-pop', TRUE),
('Complete', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:03:56', date('2007-11-01'), NULL, FALSE, 'K-pop', FALSE),
('Ooh La-La!', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:03:54', date('2007-11-01'), NULL, FALSE, 'K-pop', FALSE),
('Kissing You', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:03:18', date('2008-01-13'), NULL, TRUE, 'K-pop', TRUE),
('Merry-Go-Round', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:03:14', date('2007-11-01'), NULL, FALSE, 'K-pop', FALSE),
('Into the New World', 'Girls'' Generation', 'Girls'' Generation',
'KOR', interval '00:04:25', date('2007-08-02'), NULL, TRUE, 'K-pop', TRUE),
('I Got a Boy', 'I Got a Boy', 'Girls'' Generation', 'KOR', 
interval '00:04:31', date('01-01-2013'), 1354672, TRUE, 'Bubblegum Pop', True),
('Dancing Queen', 'I Got a Boy', 'Girls'' Generation', 'KOR',
interval '00:03:35', date('2012-12-21'), 580428, TRUE, 'Soul', TRUE),
('Baby Maybe', 'I Got a Boy', 'Girls'' Generation', 'KOR', 
interval '00:03:43', date('01-01-2013'), NULL, FALSE, 'K-pop', TRUE),
('Talk Talk', 'I Got a Boy', 'Girls'' Generation', 'KOR', 
interval '00:02:46', date('01-01-2013'), NULL, FALSE, 'K-pop', FALSE),
('Promise', 'I Got a Boy', 'Girls'' Generation', 'KOR', 
interval '00:03:15', DATE('01-01-2013'), NULL, FALSE, 'Ballad', FALSE),
('Express 999', 'I Got a Boy', 'Girls'' Generation', 'KOR', 
interval '00:03:27', date('01-01-2013'), NULL, FALSE, 'K-pop', FALSE),
('Lost In Love', 'I Got a Boy', 'Girls'' Generation', 'KOR',
interval '00:04:00', date('01-01-2013'), NULL, FALSE, 'Ballad', FALSE),
('Look at Me', 'I Got a Boy', 'Girls'' Generation', 'KOR', 
interval '00:03:01', date('01-01-2013'), NULL, FALSE, 'K-pop', FALSE),
('XYZ', 'I Got a Boy', 'Girls'' Generation', 'KOR',
interval '00:03:15', date('01-01-2013'), NULL, FALSE, 'K-pop', FALSE),
('Romantic St.', 'I Got a Boy', 'Girls'' Generation', 'KOR',
interval '00:04:00', date('01-01-2013'), NULL, FALSE, 'K-pop', FALSE),
('The Boys', 'The Boys', 'Girls'' Generation', 'KOR',
interval '00:03:48', date('2011-10-19'), 3032658, TRUE, 'Electropop', TRUE),
('Telepathy', 'The Boys', 'Girls'' Generation', 'KOR',
interval '00:03:45', date('2011-10-19'), NULL, FALSE, 'K-pop', FALSE),
('Say Yes', 'The Boys', 'Girls'' Generation', 'KOR', 
interval '00:03:46', date('2011-10-19'), NULL, FALSE, 'K-pop', TRUE),
('Trick', 'The Boys', 'Girls'' Generation', 'KOR',
interval '00:03:15', date('2011-10-19'), NULL, FALSE, 'K-pop', FALSE),
('How Great Is Your Love', 'The Boys', 'Girls'' Generation', 'KOR',
interval '00:03:54', date('2011-10-19'), NULL, FALSE, 'K-pop', FALSE),
('Blue/Tree Frog', 'Psy 6 (Six Rules), Part 1', 'PSY', 'KOR',
interval '00:03:27', date('2012-07-15'), NULL, FALSE, 'Hip Hop', FALSE),
('Passionate Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'KOR',
interval '00:03:28', date('2012-07-15'), NULL, FALSE, 'K-pop', FALSE),
('Gangnam Style', 'Psy 6 (Six Rules), Part 1', 'PSY', 'KOR',
interval '00:03:39', date('2012-07-15'), 3900000, TRUE, 'Hip Hop', TRUE),
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'KOR',
interval '00:04:39', date('2012-07-15'), NULL, FALSE, 'Hip Hop', FALSE),
('What Would Have Been?', 'Psy 6 (Six Rules), Part 1', 'PSY', 'KOR',
interval '00:04:03', date('2012-07-15'), NULL, FALSE, 'Hip Hop', FALSE),
('Never Say Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'KOR',
interval '00:03:21', date('2012-07-15'), NULL, FALSE, 'K-pop', FALSE);


INSERT INTO song_ranks VALUES
(1, 'The Boys', 'Girls'' Generation', 'The Boys', date('2011-10-23') );


INSERT INTO features VALUES 
('Blue/Tree Frog', 'Psy 6 (Six Rules), Part 1', 'PSY', 'G-Dragon'),
('Passionate Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Sung Si-kyung'),
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Kim Jin-pyo'),
('What Would Have Been?', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Lena Park'),
('Never Say Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Yoon Do-hyun'),
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Leessang');


INSERT INTO likes VALUES
('Ian', 'Gangnam Style', 'Psy 6 (Six Rules), Part 1', 'PSY'),
('Fred Durst', 'Gangnam Style', 'Psy 6 (Six Rules), Part 1', 'PSY'),
('Ian', 'The Boys', 'The Boys', 'Girls'' Generation'),
('Ian', 'I Got a Boy', 'I Got a Boy', 'Girls'' Generation'),
('Fred Durst', 'Say Yes', 'The Boys', 'Girls'' Generation');
