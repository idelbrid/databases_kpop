/*TV Show (name, start_date, end_date, type, channel, country, language) */

START TRANSACTION;

INSERT INTO TV_SHOW VALUES
('Family Outing', date('2008-06-15'), date('2010-02-14'), 'Variety', 'SBS', 'KOR', 'KOR'),
('Happy Together', date('2001-11-08'), null, 'Variety', 'KBS2', 'KOR', 'KOR'),
('Strong Heart', date('2009-10-06'), date('2013-02-12'), 'Variety', 'SBS', 'KOR', 'KOR'),
('Infinity Challenge', date('2005-04-23'), date('2010-02-14'), 'Variety', 'MBC', 'KOR', 'KOR'),
('Golden Fishery', date('2006-07-07'), null, 'Variety', 'MBC', 'KOR', 'KOR'),
('Star King', date('2007-01-13'), null, 'Variety', 'SBS', 'KOR', 'KOR'),
('Hello Baby', date('2009-06-23'), date('2013-06-04'), 'Reality', 'KBS', 'KOR', 'KOR'),
('Running Man', date('2010-07-11'), null, 'Variety', 'SBS', 'KOR', 'KOR');

/*Venue (name, country, region, city, indoors_outdoors, max_occupancy)*/

INSERT INTO venue VALUES
('SBS Open Hall', 'KOR', 'Gyeonggi-do', 'Seoul', TRUE, 2000),
('KBS New Wing Open Hall', 'KOR', 'Gyeonggi-do', 'Seoul', TRUE, 1824),
('MBC Dream Center', 'KOR', 'Gyeonggi-do', 'Goyang', TRUE, 2000),
('Bitmaru Broadcasting Center', 'KOR', 'Gyeonggi-do', 'Ilsan', TRUE, 2000),
('CJ E&M Center Studio', 'KOR', 'Gyeonggi-do', 'Seoul', TRUE, 2000);

/* performance(performance_date, tickets sold, venue_name, artist_name) */

INSERT INTO performance VALUES
(date('2015-06-20'), null, 'MBC Dream Center', 'Mamamoo'),
(date('2014-11-22'), null, 'MBC Dream Center', 'Mamamoo'),
(date('2014-11-19'), null, 'Bitmaru Broadcasting Center', 'Mamamoo'),
(date('2016-03-05'), null, 'MBC Dream Center', 'Mamamoo'),
(date('2015-08-22'), null, 'MBC Dream Center', 'Girls'' Generation'),
(date('2014-03-28'), null, 'KBS New Wing Open Hall', 'Girls'' Generation'),
(date('2016-04-14'), null, 'CJ E&M Center Studio', 'Block B');


END;




