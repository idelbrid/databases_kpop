/* Appears On:
artists we have: g-dragon, sung si-kyung, kim jin-pyo, yoon do-hyun, lena park, psy
shows we have: family outing, happy together, strong heart, infinity challenge, folden fishery, star king, hello baby, running man 
appears_on(artist_name, show_name, episode_date)*/

START TRANSACTION;

ALTER TABLE appears_on ADD COLUMN episode_date date;

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
('Yoo Do-hyun', 'Running Man', date('2012-07-01')),
('PSY', 'Running Man', date('2015-07-03')),
('PSY', 'Star King', date('2013-02-02')),
('PSY', 'Infinity Challenge', date('2011-07-02')),
('PSY', 'Happy Together', date('2009-12-03'));


END;


