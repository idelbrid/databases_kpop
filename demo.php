<?php 
require_once './dbsetup.php';

date_default_timezone_set("America/New_York");
$sql = "SELECT COUNT * FROM artist";
$count = $db->query($sql);
?>

<html>
	<head>
		<title>K-pop Home</title>
	</head>
	<body>
		<h2>Welcome to the K-pop database website!</h2>
		<p>
			We have all sorts of data about so much K-pop somehow. We have over
			<?php ?>
		</p>
	</body>

<html>

