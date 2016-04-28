BEGIN TRANSACTION;

ALTER TABLE company ADD FOREIGN KEY (country) 
						REFERENCES country(abbv);

ALTER TABLE artist ADD FOREIGN KEY( company_name) 
						REFERENCES company(name);
						
ALTER TABLE venue ADD FOREIGN KEY(country)
						REFERENCES country(abbv);						
						
ALTER TABLE performance ADD FOREIGN KEY(venue_name)
							REFERENCES venue(name);
ALTER TABLE performance ADD FOREIGN KEY(artist_name)
							REFERENCES artist(name);
							
ALTER TABLE fanclub ADD FOREIGN KEY (artist)
						REFERENCES artist(name);
						
ALTER TABLE album ADD FOREIGN KEY (artist_name)
						REFERENCES artist(name);
						
ALTER TABLE attends ADD FOREIGN KEY (fan_username)
						REFERENCES fan(username);
ALTER TABLE attends ADD FOREIGN KEY (performance_date, venue_name, artist_name)
			REFERENCES performance(performance_date, venue_name, artist_name);
			
ALTER TABLE buys ADD FOREIGN KEY (fan_username)
				REFERENCES fan(username);
ALTER TABLE buys ADD FOREIGN KEY (album_name, artist_name)
				REFERENCES album(name, artist_name);
				
ALTER TABLE trainee ADD FOREIGN KEY (company)
			REFERENCES company(name);
			
ALTER TABLE part_of ADD FOREIGN KEY (fan_username)
				REFERENCES fan(username);
ALTER TABLE part_of ADD FOREIGN KEY (fanclub_name)
				REFERENCES fanclub(name) ON UPDATE CASCADE;
				
ALTER TABLE song ADD FOREIGN KEY(language)
				REFERENCES languages(abbv);
ALTER TABLE song ADD FOREIGN KEY(album, artist)
				REFERENCES album(name, artist_name);
				
ALTER TABLE features ADD FOREIGN KEY(artist_name) 
					REFERENCES artist(name);
ALTER TABLE features ADD FOREIGN KEY(song_name, song_album, song_artist)
				REFERENCES song(name, album, artist);
				
ALTER TABLE memberOf ADD FOREIGN KEY (artist)
					REFERENCES artist(name);
ALTER TABLE memberOf ADD FOREIGN KEY (trainee_name, trainee_birthdate)
				REFERENCES trainee(name, birth_date);
				
ALTER TABLE TV_SHOW ADD FOREIGN KEY (country)
						REFERENCES country(abbv);
ALTER TABLE TV_SHOW ADD FOREIGN KEY (language)
						REFERENCES languages(abbv);
						
ALTER TABLE song_ranks ADD FOREIGN KEY (week)
				REFERENCES week(day_starting_week);
ALTER TABLE song_ranks ADD FOREIGN KEY (song_name, song_album, song_artist)
				REFERENCES song(name, album, artist);
				
ALTER TABLE album_ranks ADD FOREIGN KEY (week)
						REFERENCES week(day_starting_week);
ALTER TABLE album_ranks ADD FOREIGN KEY (album, album_artist)
					REFERENCES album(name, artist_name);
					
ALTER TABLE appears_on ADD FOREIGN KEY (artist_name)
					REFERENCES artist(name);
ALTER TABLE appears_on ADD FOREIGN KEY( show_name )
					REFERENCES TV_SHOW(name);
					
ALTER TABLE likes ADD FOREIGN KEY (fan_username)
				REFERENCES fan(username);
ALTER TABLE likes ADD FOREIGN KEY (song, album, artist)
				REFERENCES song(name, album, artist);

ALTER TABLE produces ADD FOREIGN KEY( producer )
				REFERENCES producer(prod_name);
ALTER TABLE produces ADD FOREIGN KEY (song, song_album, song_artist)
				REFERENCES song(name, album, artist);

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




















