###KPOP DATABASES PROJECT###

This repository contains html/php code for a website based on a kpop database, which we have designed. The database schema was created using the db-create-11.sql script. 

* **dbsetup.php** - script used to create a connection to the database. 
	* Uses a config.ini file, which must be created for the user's system.
* **demo.php** - a php/html page used for practice and troubleshooting... Content to be moved to index.php
	* Uses **dbsetup.php**.
* **index.php** - required, to my knowledge. Eventually to be used as a home page for the website.
* **config_template.ini** - A template for the aformentioned **config.ini**
* **song-list.php** - a page for listing all songs. Provides links to song-show.php and a form to fill to find songs.
	* Uses **dbsetup.php** 
* **song-show.php** - a page for showing a particular song's information. Uses a get parameter to retrieve data.
	* Uses **dbsetup.php**