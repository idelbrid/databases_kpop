<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Korean Pop | TV Show Appearances</title>
	</head>
	<body>
	<?php
	$stmt = "SELECT artist_name, show_name, episode_date FROM appears_on ORDER BY artist_name, show_name, episode_date;";
	if(!$stmt){
		echo "PDO::errorInfo():\n";
		print_r($db->errorInfo());
		die();
	}
	?>
	<?php include_once './header.php'?>
		<h2>Artist List</h2>
		<section id="search">
			<form action="./TVappearance-show.php" method="get">
				<label>Artist name: <input type="text" name="name" required></label>
				<input type="submit" value="Search">
			</form>
		</section>
		<table class="table">
		<tr>
			<th>Artist</th>
			<th>TV Show</th>
			<th> Episode Dates </th>
			<th>Link to Details</th>
		</tr>
		<?php
			foreach ($db->query($stmt) as $row)
			{
				$artist_name = $row['artist_name'];
				$show_name = $row['show_name'];
				$episode_date = $row['episode_date'];
				$link = "./artist-show.php?name=";
			echo "<tr><td>$name</td><td>$debut_date</td><td><a href=$link" . urlencode($name) .">more information</a></td></tr>";
			}
		?>
		
		</table>
	<?php include_once './footer.php'?>