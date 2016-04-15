BEGIN;

CREATE TABLE country(
	name VARCHAR unique,
	abbv CHAR(3) primary key
);
CREATE TABLE languages(
	language VARCHAR unique,
	abbv CHAR (3) primary key

);
CREATE TABLE company(
	name VARCHAR primary key,
	ceo VARCHAR,
	revenue INTEGER CHECK(revenue >= 0),
	country CHAR(3), 

	FOREIGN KEY (country)
	REFERENCES country(abbv)
);

CREATE TABLE fan (
	username VARCHAR PRIMARY KEY,
	name VARCHAR,
	birth_date DATE,
	gender CHAR

);
CREATE TABLE artist(
	name VARCHAR PRIMARY KEY,
	debut_date DATE,
	company_name VARCHAR,
	
	FOREIGN KEY (company_name)
	REFERENCES company(name)
);
CREATE TABLE venue (
	name VARCHAR PRIMARY KEY,
	country CHAR(3) REFERENCES country(abbv),
	region VARCHAR,
	city VARCHAR,
	indoors_outdoors BOOLEAN,
	max_occupancy INTEGER
);

CREATE TABLE performance (
	performance_date DATE,
	tickets_sold INTEGER,
	venue_name VARCHAR REFERENCES venue(name),
	artist_name VARCHAR REFERENCES artist(name),
	PRIMARY KEY (performance_date, venue_name, artist_name)
);


CREATE TABLE fanclub (
	name VARCHAR PRIMARY KEY,
	website VARCHAR,
	num_members INTEGER,
	artist VARCHAR REFERENCES artist(name)
);

CREATE TABLE album (
	name VARCHAR,
	artist_name VARCHAR REFERENCES artist(name),
	release_date DATE,
	copies_sold INT,
	genre VARCHAR,
	PRIMARY KEY (name, artist_name)
); 

CREATE TABLE attends (
	fan_username VARCHAR REFERENCES fan(username),
	performance_date DATE,
	venue_name VARCHAR,
	artist_name VARCHAR,
	FOREIGN KEY (performance_date, venue_name, artist_name) 
	REFERENCES performance(performance_date, venue_name, artist_name)
);

CREATE TABLE buys (
	fan_username VARCHAR REFERENCES fan(username),
	album_name VARCHAR,
	artist_name VARCHAR,
	FOREIGN KEY (album_name, artist_name)
	REFERENCES album(name, artist_name)
); 

CREATE TABLE fanclub_membership(
	fan_username VARCHAR REFERENCES fan(username),
	fanclub_name VARCHAR REFERENCES fanclub(name)
);

CREATE TABLE trainee(
	name VARCHAR, 
	birth_date DATE,
	debuted BOOLEAN,
	gender CHAR(1),
	nationality VARCHAR,
	role VARCHAR,
	stage_name VARCHAR,
	company VARCHAR,
	
	PRIMARY KEY (name, birth_date),
	FOREIGN KEY (company)
	REFERENCES company(name)
);

CREATE TABLE part_of(
	fanclub_name VARCHAR PRIMARY KEY,
	artist_name VARCHAR REFERENCES artist(name)
);


CREATE TABLE song( 
	name VARCHAR NOT NULL,
	album VARCHAR NOT NULL,
	artist VARCHAR NOT NULL,
	language CHAR(3) REFERENCES languages(abbv),
	duration INTERVAL,
	release_date DATE, 
	copies_sold INTEGER,
	single BOOLEAN,
	genre VARCHAR,
	music_video BOOLEAN,
	PRIMARY KEY (name, album, artist),
	FOREIGN KEY (album, artist)
	REFERENCES album(name, artist_name)
);

CREATE TABLE features (
	song_name VARCHAR, 
	song_album VARCHAR,
	song_artist VARCHAR,
	artist_name VARCHAR REFERENCES artist(name),

	FOREIGN KEY (song_name, song_album, song_artist)
	REFERENCES song(name, album, artist)
);

CREATE TABLE supports(
	fan_username VARCHAR REFERENCES fan(username),
	artist_name VARCHAR REFERENCES artist(name)
);

CREATE TABLE memberOf(
	trainee_name VARCHAR,
	trainee_birthdate DATE,
	start_date DATE,
	end_date DATE,
	FOREIGN KEY (trainee_name,trainee_birthdate)
	REFERENCES trainee(name,birth_date)
);


CREATE TABLE week (
	day_starting_week DATE PRIMARY KEY
);


CREATE TABLE TV_SHOW (
	name VARCHAR PRIMARY KEY,
	start_date DATE,
	end_date DATE,
	type VARCHAR,
	channel VARCHAR,
	country CHAR(3) REFERENCES country(abbv),
	language CHAR(3) REFERENCES languages(abbv)

);


CREATE TABLE song_ranks(
	rank VARCHAR,
	song_name VARCHAR,
	song_artist VARCHAR,
	song_album VARCHAR,
	week DATE REFERENCES week(day_starting_week),
	PRIMARY KEY (song_name, week),
	FOREIGN KEY (song_name, song_album, song_artist)
	REFERENCES song(name, album, artist)

);

CREATE TABLE album_ranks(
	rank VARCHAR,
	album VARCHAR,
	album_artist VARCHAR,
	week DATE REFERENCES week(day_starting_week),
	PRIMARY KEY (album, week),
	FOREIGN KEY (album, album_artist)
	REFERENCES album(name, artist_name)

);

CREATE TABLE appears_on (
	artist_name VARCHAR REFERENCES artist(name), 
	show_name VARCHAR REFERENCES TV_SHOW(name),
	PRIMARY KEY (artist_name, show_name)
	
);



CREATE TABLE producer(
	prod_name VARCHAR primary key,
	birth_date DATE
);


CREATE TABLE likes(
	fan_username VARCHAR REFERENCES fan(username),
	song VARCHAR,
	album VARCHAR,
	artist VARCHAR,
	FOREIGN KEY (song, album, artist)
	REFERENCES song(name, album, artist)
);

CREATE TABLE produces(
	producer VARCHAR REFERENCES producer(prod_name),
	song VARCHAR,
	song_album VARCHAR,
	song_artist VARCHAR,
	FOREIGN KEY (song, song_album, song_artist)
	REFERENCES song(name, album, artist)
);

ALTER TABLE tv_show ADD CHECK(start_date < end_date);
ALTER TABLE performance ADD CHECK (tickets_sold >= 0);
ALTER TABLE tv_show ADD CHECK(start_date >= date('1956-01-01') AND
                              end_date >= date('1956-01-01'));
ALTER TABLE venue ADD CHECK (max_occupancy > 0);
ALTER TABLE song ADD CHECK (release_date > date('01-01-1980'));
ALTER TABLE song ADD CHECK (duration >= interval '0 seconds');
ALTER TABLE song ADD CHECK (copies_sold >= 0);
ALTER TABLE company ADD CHECK (revenue >= 0);
ALTER TABLE performance ADD CHECK (tickets_sold >= 0);
ALTER TABLE fanclub ADD CHECK (num_members >= 0);
ALTER TABLE artist ADD CHECK (debut_date > date('01-01-1980'));
ALTER TABLE album ADD CHECK (copies_sold >= 0);
ALTER TABLE memberOf ADD CHECK (start_date >= DATE('1980-01-01') AND end_date >= DATE('1980-01-01'));



COMMIT;






