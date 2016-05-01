###KPOP DATABASES PROJECT###

This repository contains html/php code for a website based on a kpop database, which we have designed. The database schema was created using the db-create-11.sql script. 



##Home page, database setup code, and style##

* **dbsetup.php** - script used to create a connection to the database. 
	* Uses a **config.ini** file, which must be created for the user's system.
* **index.php** - Home page of the website.
* **config_template.ini** - A template for the aformentioned **config.ini**
* **footer.php** - configures the footer placed at the end of every page. Uses bootstrap to provide a button that (un)folds the menu on the left.
* **header.php** - uses bootstrap to make a folding menu on the left with links to **song-list.php**, **fanclub-list.php**, **TVshow-list.php**, and **artist-list.php**.
* **css/** holds css bootstrap
* **fonts/** contains fonts used
* **js/** contains the javascript for bootstrap
##Song pages##

* **song-list.php** - a page for listing all songs. Provides links to **song-show.php**, **likes-list.php**, and **song-add.php**, a button to **song-delete.php**, and a form to fill to find songs.
* **song-show.php** - a page for showing a particular song's information. Uses get parameters or post parameters to retrieve data. Can from here navigate to **song-update.php**, to **likes-list.php**, or back to **song-list.php**.
* **song-add.php** - a page for submitting a new song into the database.
	* Sends form to itself to verify the data is acceptable.
	* If valid add, inserts into DB and redirects to **song-show.php** 
	* Must have album and artist existing already
* **song-update.php** - a page for updating song entities in the DB. Upon submission of the form, goes to **song-show.php**
	* Cannot alter song name, album, or artist.
* **likes-list.php** - a page for listing all those who like a song.
* **song-delete.php** - a page that deletes a song (submitted via POST) from the DB. Redirects to **song-list.php** after completion of delete. 

##TV Show pages##

* **TVshow-list.php** page for listing all TV shows in the database. Provides a search function and links to **TVshow-show.php**
* **TVshow-show.php** a page showing details of a TV show. Provides a link back to **TVshow-list.php** and to **TVshow-update.php**
* **TVshow-update.php** a page with a form used to update an existing TV show in database. Sends form to **TVshow-show.php** for processing.

##Artist pages##

* **artist-list.php** a page with a table of artists in the database, a search for artists, and links to **artist-show.php**.
* **artist-show.php** a page which shows details of an artist in the database. Provides links to **artist-update.php** or back to **artist-list.php**. 
* **artist-update.php** a page with a form used to update an existing artist in the database. Does not allow updating artist name. Sends form to **artist-show.php** for processing.

##Fanclub pages## 

* **fanclub-list.php** a page with a table of fanclubs, a search for fanclubs, and links to **fanclub-show.php**.
* **fanclub-show.php** a page which shows details of a fanclub in the database. Provides links to **fanclub-update.php** and back to **fanclub-list.php**. 
* **fanclub-update.php** a page with a form used to update an existing artist in the database. Sends form to **fanclub-show.php** for processing.

##Database creation and data loading scripts##

These scripts are postgresql and only need to be run once to set up the database and initialize it with data. To do this, run in this order: 

1) **db-create-11.sql**
2) **db-populate_scripts/db-load-team-11.sql**
3) **db-constraints-11.sql**

* **db-create-11.sql** - creates the tables with no foreign key constraints.
* **db-populate_scrpits/db-load-team-11.sql** - calls the members' data insert scripts. 
* **db-load-idelbrid.sql** - loads languages, countries, companies, songs, likes, producers, produces
* **db-load-ylu21.sql** - loads fans, fanclubs, albums, part_of, and buys
* **db-load-ahe6.sql** - loads weeks, song ranks, TV shows, venues, performances, appearances, song ranks, and album ranks
* **db-load-jdeng5.sql** - loads artists, features, trainees, and memberOf
* **db-constraints-11.sql** - creates the constraints, including all of the foreign key constraints. This needs to be done after the main load file, because otherwise during the load foreign key constraints will not be upheld.
* **likeslist.sql** - a script to load extra likes (randomly generated) because it was sad that so many songs were unliked. 
	* This should be loaded after constraints are added if it is used at all.


