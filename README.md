###KPOP DATABASES PROJECT###

This repository contains html/php code for a website based on a kpop database, which we have designed. The database schema was created using the db-create-11.sql script. 

* **dbsetup.php** - script used to create a connection to the database. 
	* Uses a **config.ini** file, which must be created for the user's system.
* **index.php** - Home page of the website. Minimal currently.
* **config_template.ini** - A template for the aformentioned **config.ini**
* **song-list.php** - a page for listing all songs. Provides links to **song-show.php**, **likes-list.php**, **song-add.php**, and a form to fill to find songs.
* **song-show.php** - a page for showing a particular song's information. Uses a get parameter to retrieve data.
* **song-add.php** - a page for submitting a new song into the database.
	* Sends form to **song-show.php** 
	* Must have album and artist existing already
* **song-update.php** - a page for updating song entities in the DB. Upon submission of the form, goes to **song-show.php**
	* Cannot alter song name, album, or artist. Changing the key would blow things up, unless using update CASCADE
* **likes-list.php** - a page for listing all those who like a song.
* **song-delete.php** - a page that deletes a song (submitted via POST) from the DB. Redirects to **song-list.php** after completion of delete. 

