<?php
require_once './dbsetup.php';

$sql = "SELECT name, album, artist FROM song";
?>

<html>
	<head>
		<title>Song Listing</title>
	</head>
	<body>
		<h2>Song Listing</h2>
		<p>
		<table border="1">
		<tr>
			<th>Song Name</th>
			<th>Album</th>
			<th>Artist</th>
		</tr>
		<?php
			foreach ($db->query($sql) as $row)
			{
				
				$name = $row['name'];
				$album = $row['album'];
				$artist = $row['artist'];
				echo "<tr><td>$name</td><td>$album</td><td>$artist</td></tr>";
			}
			?>
		</table>
		</p>
	</body>
	
</html>