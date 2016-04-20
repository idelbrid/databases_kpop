<?php 
$ini = parse_ini_file('./config.ini');
//print_r($ini);
$dbtype = $ini['dbtype'];
$dbname = $ini['dbname'];
$dbhost = $ini['dbhost'];
$dbpass = $ini['dbpass'];
$dbuser = $ini['dbuser'];

$dsn = "$dbtype:host=$dbhost;dbname=$dbname";

try{
	$db = new PDO($dsn, $dbuser, $dbpass);
        print_r("yeh");
} catch (PDOException $e) {
	print "An error occurred when connecting to the database: " . $e->getmessage();
	print "<br>dbname $dbname<br>";
	print "dbtype $dbtype<br>";
	print "dbhost $dbhost<br>";
	print "dbuser $dbuser<br>";
	print "dsn $dsn";
	die();
}

?>
