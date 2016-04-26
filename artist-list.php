<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Korean Pop | K-pop Artist-list</title>
	</head>
	<body>
	<?php
	$stmt = "SELECT name, debut_date FROM artist ORDER BY name, debut_date;";
	if(!$stmt){
		echo "PDO::errorInfo():\n";
		print_r($db->errorInfo());
		die();
	}
	?>
	<?php include_once './header.php'?>
		<h2>Artist List</h2>
		<section id="search">
			<form action="./artist-show.php" method="get">
				<label>Artist name: <input type="text" name="name" required></label>
				<input type="submit" value="Search">
			</form>
		</section>
		<table class="table">
		<tr>
			<th>Artist</th>
			<th>Debut Date</th>
			<th>Link to Details</th>
		</tr>
		<?php
			foreach ($db->query($stmt) as $row)
			{
				$name = $row['name'];
				$debut_date = $row['debut_date'];
				$link = "./artist-show.php?name=";
			echo "<tr><td>$name</td><td>$debut_date</td><td><a href=$link" . urlencode($name) .">more information</a></td></tr>";
			}
		?>
		
		</table>
	<?php include_once './footer.php'?>