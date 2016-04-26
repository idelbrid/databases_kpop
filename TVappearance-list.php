<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Korean Pop | TV Show Appearances</title>
	</head>
	<body>
	<?php
	$stmt = "SELECT artist_name, show_name, episode_date FROM appears_on ORDER BY artist_name, show_name, episode_date";
	if(!$stmt){
		echo "PDO::errorInfo():\n";
		print_r($db->errorInfo());
		die();
	}
	?>
	<?php include_once './header.php'?>
		<h2>TV Show Appearances</h2>
		<section id="search">
			<form action="./TVappearance-show.php" method="get">
				<label>Search artist: <input type="text" name="artist_name" required></label>
			
				<label> Search show: <input type="text" name="show_name" required></label>
				<input type="submit" value ="submit">
			</form>
		</section>
		<table class="table">
		<tr>
			<th>Artist</th>
			<th>TV Show</th>
			<th>Date</th>
		</tr>
		<?php
			foreach ($db->query($stmt) as $row)
			{
				$artist_name = $row['artist_name'];
				$show_name = $row['show_name'];
				$episode_date = $row['episode_date'];
   			//$link = "./TVappearance-show.php?name=";
			echo "<tr><td>$artist_name</td><td>$show_name</td><td>$episode_date</td></tr>";
			//echo <tr><td>$row['artist']</td><td>$row['name']</td><td>lala</td></tr>";
			}
		?>
		</table>
	<?php include_once './footer.php'?>