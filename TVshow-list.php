<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Korean Pop | TV Shows</title>
	</head>
	<body>
	<?php
	$stmt = "SELECT name FROM TV_SHOW ORDER BY name;";
	if(!$stmt){
		echo "PDO::errorInfo():\n";
		print_r($db->errorInfo());
		die();
	}
	?>
	<?php include_once './header.php'?>
		<h2>TV Shows</h2>
		<section id="search">
			<p> 
			Look up your favorite Korean TV Shows!
			</p>
			<form action="./TVshow-show.php" method="GET">
				<label> TV Show: <input type="text" name="name" required></label>
				<input type="submit" value="Search">
			</form>
		</section>
		<table class="table">
		<tr>
			<th>TV Show</th>
			<th>Link to Details</th>
		</tr>
		<?php
			foreach ($db->query($stmt) as $row)
			{
				$show_name = $row['name'];
				$link = "./TVshow-show.php?name=";
			echo "<tr><td>$show_name</td><td><a href=$link" . urlencode($show_name) .">details</a></td></tr>";
			}
		?>
		
		</table>
	<?php include_once './footer.php'?>