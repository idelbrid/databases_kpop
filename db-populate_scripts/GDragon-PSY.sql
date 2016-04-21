INSERT INTO company VALUES
('YG Entertainment', 'Yang Hyun-suk', 150000000, 'KOR'),
('LOEN Entertainment', 'Shin Won-soo', 323000000000, 'KOR');

INSERT INTO artist VALUES
('G-Dragon', date('2009-08-18'), 'YG Entertainment'),
('Sung Si-kyung', date('2000-01-01'), 'LOEN Entertainment'),
('Kim Jin-pyo', date('1995-01-01'), NULL),
('Yoon Do-hyun', date('1993-01-01'), NULL),
('Lena Park', date('1993-01-01'), 'LOEN Entertainment'),
('PSY', date('2001-01-12'), 'YG Entertainment');

INSERT INTO album VALUES
('Psy 6 (Six Rules), Part 1', 'PSY', date('2012-07-15'), 
106594, 'Hip hop');

INSERT INTO song VALUES
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

INSERT INTO features VALUES 
('Blue/Tree Frog', 'Psy 6 (Six Rules), Part 1', 'PSY', 'G-Dragon'),
('Passionate Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Sung Si-kyung'),
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Kim Jin-pyo'),
('What Would Have Been?', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Lena Park'),
('Never Say Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Yoon Do-hyun');

INSERT INTO artist VALUES
('Leessang', date('01-01-2002'), NULL);
INSERT INTO features VALUES
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Leessang');