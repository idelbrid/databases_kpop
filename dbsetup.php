<?php 
$ini = parse_ini_file('config.ini');
$dbtype = $ini['dbtype'];
$dbname = $ini['dbname'];
$dbhost = $ini['dbhost'];
$dbpass = $ini['dbpass'];
$dbuser = $ini['dbuser'];

$dsn = "$dbtype:host=$dbhost;dbname=$dbname";

try{
	$db = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
	print "An error occurred when connecting to the database: " . $e->getmessage();
	// print "dbname $dbname\n";
	// print "dbtype $dbtype\n";
	// print "dbhost $dbhost\n";
	// print "dbuser $dbuser\n";
	// print "dsn $dsn\n"
	die();
}

?>
