<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Korean Pop | K-pop FanBase-list</title>
	</head>
	<body>
	<?php
	$stmt = "SELECT name,website,num_members,artist FROM fanclub ORDER BY artist, name, website, num_members;";
	if(!$stmt){
		echo "PDO::errorInfo():\n";
		print_r($db->errorInfo());
		die();
	}
	?>
	<h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
<hr>
		<h2>Fanbase List</h2>
		<section id="search">
			<form action="./fanclub-show.php" method="get">
				<label>Search artist: <input type="text" name="artist" required></label>
				<input type="submit" value="submit">
			</form>
		</section>
		<table border="1">
		<tr>
			<th>Artist</th>
			<th>Fanclub Name</th>
			<th>Link to Details</th>
		</tr>
		<?php
			foreach ($db->query($stmt) as $row)
			{
				$artist = $row['artist'];
				$name = $row['name'];
   			$link = "./fanclub-show.php?name=";
			echo "<tr><td>$artist</td><td>$name</td><td><a href=$link" . urlencode($name) .">go</a></td></tr>";
			//echo <tr><td>$row['artist']</td><td>$row['name']</td><td>lala</td></tr>";
			}
		?>
		</table>
	</body>
	
</html>
