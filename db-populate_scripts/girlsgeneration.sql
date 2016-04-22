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

INSERT INTO company VALUES
('S.M. Entertainment', 'Lee Soo-man', 246100000, 'KOR'),
('JYP Entertainment', 'J.Y. Park', 43700000, 'KOR');

INSERT INTO artist VALUES
('Girls'' Generation', date('2007-08-05'), 'S.M. Entertainment');

INSERT INTO album VALUES
('Girls'' Generation', 'Girls'' Generation', date('2007-11-01'), 
126269, 'K-pop');

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
'KOR', interval '00:04:25', date('2007-08-02'), NULL, TRUE, 'K-pop', TRUE);