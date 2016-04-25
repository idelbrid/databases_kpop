/* Appears On:
artists we have: g-dragon, sung si-kyung, kim jin-pyo, yoon do-hyun, lena park, psy
shows we have: family outing, happy together, strong heart, infinity challenge, folden fishery, star king, hello baby, running man 
appears_on(artist_name, show_name)*/

ALTER TABLE appears_on ADD COLUMN episode_date date;

INSERT INTO appears_on VALUES
('G-Dragon', 'Running Man', 2013-09-15),
('G-Dragon', 'Family Outing', 2008-08-03),
('G-Dragon', 'Happy Together', 2015-05-21),
('G-Dragon', 'Infinity Challenge', 2015-08-22),
('G-Dragon', 'Infinity Challenge', 2015-08-08),
('G-Dragon', 'Star King', 2007-03-11),
('G-Dragon', 'Strong Heart', 2009-10-06),
('Sung Si-kyung', 'Running Man', 2015-03-22),
('Sung Si-kyung', 'Happy Together', 2014-01-15),
('Sung Si-kyung', 'Strong Heart', 2011-09-20),
('Yoo Do-hyun', 'Running Man', 2012-07-01),
('PSY', 'Running Man', 2015-07-03),
('PSY', 'Star King', 2013-02-02),
('PSY', 'Infinity Challenge', 2011-07-02),
('PSY', 'Happy Together', 2009-12-03);





