INSERT INTO artist VALUES
('G-Dragon', date('2009-08-18'), 'YG Entertainment'),
('Sung Si-kyung', date('2000-01-01'), 'LOEN Entertainment'),
('Kim Jin-pyo', date('1995-01-01'), NULL),
('Yoon Do-hyun', date('1993-01-01'), NULL),
('Lena Park', date('1993-01-01'), 'LOEN Entertainment'),
('PSY', date('2001-01-12'), 'YG Entertainment'),
('Girls'' Generation', date('2007-08-05'), 'S.M. Entertainment'),
('Leessang', date('01-01-2002'), NULL),
('Ailee', date('2012-02-06'), 'YMC Entertainment'),
('BIGBANG', date('2006-08-19'), 'YG Entertainment'),
('CNBLUE', date('2010-01-14'), 'FNC Entertainment'),
('Davichi', date('2008-02-04'), 'CJ E&M'),
('EXO', date('2012-01-30'), 'S.M. Entertainment'),
('Mamamoo', date('2014-06-19'), 'Rainbow Bridge World'),
('Miss A', date('2010-07-01'), 'JYP Entertainment'),
('Super Junior', date('2005-11-06'), 'S.M. Entertainment'),
('TVXQ', date('2004-01-14'), 'S.M. Entertainment'),
('Wonder Girls', date('2001-02-10'), 'JYP Entertainment'),
('Kim Tae-yeon', date('2015-11-08'), 'S.M. Entertainment'),
('GOT7', date('2014-01-16'), 'JYP Entertainment'),
('K.Will', date('2007-03-06'), 'StarShip Entertainment'),
('Block B', date('2011-04-15'), 'YMC Entertainment');

INSERT INTO features VALUES 
('Blue/Tree Frog', 'Psy 6 (Six Rules), Part 1', 'PSY', 'G-Dragon'),
('Passionate Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Sung Si-kyung'),
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Kim Jin-pyo'),
('What Would Have Been?', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Lena Park'),
('Never Say Goodbye', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Yoon Do-hyun'),
('Year of 77', 'Psy 6 (Six Rules), Part 1', 'PSY', 'Leessang');

INSERT INTO trainee VALUES
('Jung Yunho', date('1986-02-06'), TRUE, 'M','KOR','Leader','U-KNOW','S.M. Entertainment'),
('Shim Changmin', date('1988-02-18'), TRUE, 'M','KOR','Main vocal','Max','S.M. Entertainment'),
('Kim Jae Joong', date('1986-01-26'), TRUE, 'M','KOR','Vocal', 'JaeJoong', 'S.M. Entertainment'),
('Park Yoo Chun', date('1986-06-04'), TRUE, 'M','KOR','Composer','Micky','S.M. Entertainment'),
('Kim Junsu', date('1986-12-15'), TRUE, 'M','KOR','Leade dancer','Xia','S.M. Entertainment'),
('Jung Soo Yeon', date('1989-04-18'), TRUE, 'F','USA','Vocal','Jessica','S.M. Entertainment'),
('Seo He Rin', date('2002-02-26'), FALSE, 'F','KOR', NULL,'Herin','S.M. Entertainment'),
('Dong Si Cheng', date('1986-02-06'), FALSE, 'M','KOR', NULL,'WinWin','S.M. Entertainment');

INSERT INTO memberOf VALUES
('Jung Yunho', date('1986-02-06'), date('2004-02-06'), date('2010-04-03'),'TVXQ'),
('Shim Changmin', date('1988-02-18'), date('2004-02-06'), date('2010-04-03'), 'TVXQ'),
('Kim Jae Joong', date('1986-01-26'), date('2004-02-06'), date('2010-04-03'), 'TVXQ'),
('Park Yoo Chun', date('1986-06-04'), date('2004-02-06'), date('2010-04-03'), 'TVXQ'),
('Kim Junsu', date('1986-12-15'), date('2004-02-06'), date('2010-04-03'), 'TVXQ'),
('Jung Soo Yeon', date('1989-04-18'), date('2007-08-05'), date('2015-08-06'), 'Girls'' Generation');

