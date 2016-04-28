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
		<h2>TV Show Appearances</h2>
		<section id="search">
			<p> 
			Look up what TV shows your favorite K-pop idols have appeared in!
			</p>
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
				$link = "./TVappearance-show.php?name=";
			echo "<tr><td>$artist_name</td><td>$show_name</td><td>$episode_date</td><td><a href=$link" . urlencode($artist_name) .">details</a></td></tr>";
			}
		?>
		
		</table>
	<?php include_once './footer.php'?>