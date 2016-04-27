INSERT INTO week (
	SELECT date FROM generate_series( '2007-04-22'::date, 
	    '2016-04-19'::date, '7 days'::interval) date
);

INSERT INTO song_ranks VALUES
(1, 'The Boys', 'Girls'' Generation', 'The Boys', date('2011-10-23') );

INSERT INTO TV_SHOW VALUES
('Family Outing', date('2008-06-15'), date('2010-02-14'), 'Variety', 'SBS', 'KOR', 'KOR'),
('Happy Together', date('2001-11-08'), null, 'Variety', 'KBS2', 'KOR', 'KOR'),
('Strong Heart', date('2009-10-06'), date('2013-02-12'), 'Variety', 'SBS', 'KOR', 'KOR'),
('Infinity Challenge', date('2005-04-23'), date('2010-02-14'), 'Variety', 'MBC', 'KOR', 'KOR'),
('Golden Fishery', date('2006-07-07'), null, 'Variety', 'MBC', 'KOR', 'KOR'),
('Star King', date('2007-01-13'), null, 'Variety', 'SBS', 'KOR', 'KOR'),
('Hello Baby', date('2009-06-23'), date('2013-06-04'), 'Reality', 'KBS', 'KOR', 'KOR'),
('Running Man', date('2010-07-11'), null, 'Variety', 'SBS', 'KOR', 'KOR');

INSERT INTO venue VALUES
('SBS Open Hall', 'KOR', 'Gyeonggi-do', 'Seoul', TRUE, 2000),
('KBS New Wing Open Hall', 'KOR', 'Gyeonggi-do', 'Seoul', TRUE, 1824),
('MBC Dream Center', 'KOR', 'Gyeonggi-do', 'Goyang', TRUE, 2000),
('Bitmaru Broadcasting Center', 'KOR', 'Gyeonggi-do', 'Ilsan', TRUE, 2000),
('CJ E&M Center Studio', 'KOR', 'Gyeonggi-do', 'Seoul', TRUE, 2000);

INSERT INTO performance VALUES
(date('2015-06-20'), null, 'MBC Dream Center', 'Mamamoo'),
(date('2014-11-22'), null, 'MBC Dream Center', 'Mamamoo'),
(date('2014-11-19'), null, 'Bitmaru Broadcasting Center', 'Mamamoo'),
(date('2016-03-05'), null, 'MBC Dream Center', 'Mamamoo'),
(date('2015-08-22'), null, 'MBC Dream Center', 'Girls'' Generation'),
(date('2014-03-28'), null, 'KBS New Wing Open Hall', 'Girls'' Generation'),
(date('2016-04-14'), null, 'CJ E&M Center Studio', 'Block B');

INSERT INTO appears_on VALUES
('G-Dragon', 'Running Man', date('2013-09-15')),
('G-Dragon', 'Family Outing', date('2008-08-03')),
('G-Dragon', 'Happy Together', date('2015-05-21')),
('G-Dragon', 'Infinity Challenge', date('2015-08-22')),
('G-Dragon', 'Infinity Challenge', date('2015-08-08')),
('G-Dragon', 'Star King', date('2007-03-11')),
('G-Dragon', 'Strong Heart', date('2009-10-06')),
('Sung Si-kyung', 'Running Man', date('2015-03-22')),
('Sung Si-kyung', 'Happy Together', date('2014-01-15')),
('Sung Si-kyung', 'Strong Heart', date('2011-09-20')),
('Yoon Do-hyun', 'Running Man', date('2012-07-01')),
('PSY', 'Running Man', date('2015-07-03')),
('PSY', 'Star King', date('2013-02-02')),
('PSY', 'Infinity Challenge', date('2011-07-02')),
('PSY', 'Happy Together', date('2009-12-03'));

INSERT INTO song_ranks VALUES

(2, 'Toy', 'Block B', 'Blooming Period', date('2016-04-10')),
(4, 'Talk Love', 'K.Will', 'Descendants of the Sun', date('2016-04-10')),
(5, 'This Love', 'Davichi', 'Amaranth', date('2016-04-10')),
(1, 'Toy', 'Block B', 'Blooming Period', date('2016-04-03')),
(2, 'Talk Love', 'K.Will', null, date('2016-04-03')),
(16, 'You''re the Best', 'Mamamoo', 'Melting', date('2016-04-03')),
(19, 'You''re So Fine', 'CNBLUE', 'BLUEMING', date('2016-04-03'));

INSERT INTO album_ranks VALUES
(1, 'Blooming Period', 'Block B', date('2016-04-10')),
(2, 'BLUEMING', 'CNBLUE', date('2016-04-10')),
(5, 'Flight Log: Departure', 'GOT7', date('2016-04-10'));