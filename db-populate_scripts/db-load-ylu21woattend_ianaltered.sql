START TRANSACTION;
--ALTER TABLE fan DISABLE TRIGGER ALL;
--ALTER TABLE fanclub DISABLE TRIGGER ALL;
--ALTER TABLE part_of DISABLE TRIGGER ALL;
--ALTER TABLE album DISABLE TRIGGER ALL;
--ALTER TABLE buys DISABLE TRIGGER ALL;

INSERT INTO fan VALUES('heaven_Taewoo248', 'Oh Tae-woo', date('1996-03-25'), 'M'),
('yichen', 'Yichen', date('1995-03-14'), 'F'),
('fish_yeon605', 'Yoo Se-yeon', date('1994-02-12'), 'F'),
('salad_sooyeon402', 'Yoo Soo-yeon', date('1994-12-12'), 'F'),
('snowflake320', 'Gu Nam-hyun', date('1999-12-02'), 'M'),
('annie', 'He Annie', date('1995-07-20'), 'F'),
('luhanlove3', 'Le Rongqing', date('1980-02-15'), 'F'),
('winnielouu', 'Lou Weiqing', date('1994-02-12'), 'F'),
('Emma233', 'Emma Noah', date('2000-09-05'), 'F'),
('Davi89', 'Davi Abigail', date('1989-03-01'), 'M');
--('Ian', 'Ian', date('1993-09-10'), 'M'),
--('Fred Durst', 'Jon', date('1988-05-10'), 'M');

INSERT INTO company VALUES
('FNC Entertainment', 'Han Seong-ho', 32038000000, 'KOR'),
('CJ E&M', 'Kim Sung-soo', 1.640000000, 'KOR'),
('Rainbow Bridge World', NULL, NULL, 'KOR');
INSERT INTO company VALUES
('YMC Entertainment', 'Cho Yoo-myung', NULL, 'KOR');

INSERT INTO artist VALUES
('BIGBANG', date('2006-08-19'), 'YG Entertainment'),
('CNBLUE', date('2010-01-14'), 'FNC Entertainment'),
('Davichi', date('2008-02-04'), 'CJ E&M'),
('EXO', date('2012-01-30'), 'S.M. Entertainment'),
('Mamamoo', date('2014-06-19'), 'Rainbow Bridge World'),
('Miss A', date('2010-07-01'), 'JYP Entertainment'),
('Super Junior', date('2005-11-06'), 'S.M. Entertainment'),
('TVXQ', date('2004-01-14'), 'S.M. Entertainment'),
('Wonder Girls', date('2001-02-10'), 'JYP Entertainment'),
('Kim Tae-yeon', date('2015-11-08'), 'S.M. Entertainment');
INSERT INTO artist VALUES
('Ailee', date('2012-02-06'), 'YMC Entertainment');

INSERT INTO fanclub VALUES('Alien','http://cafe.daum.net/aileeonline',9821,'Ailee'),
('VIP','http://cafe.daum.net/YGBIGBANG',260583,'BIGBANG'),
('Boice','http://cafe.daum.net/cnblue4',3226,'CNBLUE'),
('Girls High','http://cafe.daum.net/kraw',6974,'Davichi'),
('EXO-L',NULL,NULL,'EXO'),
('Sone','http://cafe.daum.net/milkye',220666,'Girls'' Generation'),                                              
('MooMoo','http://cafe.daum.net/mamamoo',67276,'Mamamoo'),
('Say A','http://cafe.daum.net/missA',29533,'Miss A'),
('PSYcho','http://cafe.daum.net/psylove1',7212,'PSY'),
('Elfs','http://cafe.daum.net/secondemugame',146175,'Super Junior'),
('Cassiopeia','http://cafe.daum.net/soul48',543315,'TVXQ'),
('Wonderful','http://cafe.daum.net/wg070210',73164,'Wonder Girls');

INSERT INTO album VALUES('Vivid','Ailee',date('2015-10-01'),4554,'K-pop'),
('Bigbang Vol.1','BIGBANG',date('2006-12-21'),222460,'Hip-hop'),
('MADE Series','BIGBANG',date('2016-02-03'),189420,'K-pop'),
('First Step','CNBLUE',date('2011-03-21'),134732,'Rock'),
('2gether','CNBLUE',date('2015-09-14'),82789,'Electrorock'),
('Mystic Ballad','Davichi',date('2013-03-18'),17046,'Ballad'),
('Davichi Hug','Davichi',date('2015-01-21'),7340,'R&B'),
('EXODUS','EXO',date('2015-06-03'),1214805,'K-pop'),
--('Girls'' Generation','Girls'' Generation',date('2007-11-01'),126269,'K-pop'),
--('The Boys', 'Girls'' Generation', date('2011-11-19'), 457100, 'Electropop'),
--('Girls'' Generation (Japanese)', 'Girls'' Generation', date('2011-06-01'), 11937, 'K-pop'),
--('I Got a Boy', 'Girls'' Generation', date('2013-01-01'), 301500, 'K-pop'),
--('Lion Heart', 'Girls'' Generation', date('2015-08-19'), 148825, 'Electropop'),
--('Girls & Peace', 'Girls'' Generation', date('2012-11-28'), 1600, 'Bubblegum Pop'),
--('Love & Peace', 'Girls'' Generation', date('2013-12-10'), 1700, 'Electropop'),
('Melting', 'Mamamoo', date('2016-02-26'),26167, 'K-pop'),
('A Class', 'Miss A', date('2011-07-18'),31885, 'Dance-pop'),
--('Psy 6 (Six Rules), Part 1', 'PSY', date('2012-07-15'),106594, 'Hip hop'),
('Devil', 'Super Junior', date('2015-07-16'),262725, 'K-pop'),
('Mirotic', 'TVXQ', date('2008-09-26'),517010, 'K-pop'),
('Wonder Party', 'Wonder Girls', date('2012-06-03'),27201, 'K-pop'),
('Coup D''Etat', 'G-Dragon', date('2013-09-13'),209418, 'K-pop'),
('I', 'Kim Tae-yeon', date('2015-10-07'),119576, 'Pop rock');

INSERT INTO part_of VALUES('heaven_Taewoo248', 'Alien'),
('yichen','VIP'),
('fish_yeon605','Boice'),
('salad_sooyeon402','Cassiopeia'),
('snowflake320','Elfs'),
('annie','MooMoo'),
('luhanlove3','EXO-L'),
('winnielouu','Girls High'),
('Emma233','Say A'),
('Davi89','Wonderful'),
('Ian','PSYcho'),
('Fred Durst','Sone');

INSERT INTO buys VALUES('heaven_Taewoo248', 'Vivid','Ailee'),
('yichen','Coup D''Etat','G-Dragon'),
('fish_yeon605','First Step','CNBLUE'),
('salad_sooyeon402', 'Mirotic', 'TVXQ'),
('snowflake320', 'Devil', 'Super Junior'),
('annie', 'Melting', 'Mamamoo'),
('luhanlove3', 'EXODUS','EXO'),
('winnielouu', 'Davichi Hug','Davichi'),
('Emma233', 'A Class','Miss A'),
('Davi89', 'Wonder Party', 'Wonder Girls'),
('Ian', 'Psy 6 (Six Rules), Part 1','PSY'),
('Fred Durst', 'I', 'Kim Tae-yeon');

--ALTER TABLE fan ENABLE TRIGGER ALL;
--ALTER TABLE fanclub ENABLE TRIGGER ALL;
--ALTER TABLE part_of ENABLE TRIGGER ALL;
--ALTER TABLE album ENABLE TRIGGER ALL;
--ALTER TABLE buys ENABLE TRIGGER ALL;
COMMIT;
