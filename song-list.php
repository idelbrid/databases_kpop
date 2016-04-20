<?php
require_once './dbsetup.php';

$sql = "SELECT name, album, artist FROM song";
?>

<html>
	<head>
		<title>Song Listing</title>
	</head>
	<body>
	    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
	    <hr>
		<h2>Song Listing</h2>
		<p>
        Search for a song with the boxes below, or browse from the list.
        <form action="song-show.php" method="GET">
            <label>Song Name</label>
            <input type="text" name="song_name"/>
            <br>
            <label>Song's Album Name</label>
            <input type="text" name="album"/>
            <br>
            <label>Song's Artist Name</label>
            <input type="text" name="artist"/>
            <br>
            <input type="submit" value="Enter"/>
        </form>
		<table border="1">
		<tr>
			<th>Song Name</th>
			<th>Album</th>
			<th>Artist</th>
			<th>Link to Details</th>
			<th>Likes</th>
		</tr>
		<?php
			foreach ($db->query($sql) as $row)
			{
				$name = $row['name'];
				$album = $row['album'];
				$artist = $row['artist'];
                $link = "./song-show.php?".
                    "song_name=" . urlencode($name)."&" .
                    "album=" . urlencode($album) . "&" .
                    "artist=" . urlencode($artist);
				$fanlink = "./likes-list.php?" .
					"song_name=" . urlencode($name)."&" .
					"album=" . urlencode($album) . "&" .
					"artist=" . urlencode($artist);
				echo "<tr><td>$name</td><td>$album</td><td>$artist</td>" .
                "<td><a href=$link>Show Details</a> </td> " .
				"<td><a href=$fanlink>Likes</a></td></tr>";
			}
			?>
		</table>
		</p>
	</body>
	
</html>