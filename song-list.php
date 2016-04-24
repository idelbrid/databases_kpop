<?php
require_once './dbsetup.php';

$sql = "SELECT name, album, artist FROM song ORDER BY artist, album, name";
?>

<html>
	<head>
		<title>Song Listing</title>
	</head>
	<body>
	    <?php include_once './header.php'?>

		<h2>Song Listing</h2>
		<p>
        Search for a song with the boxes below, or browse from the list.
		<br>If the song you are looking for
		isn't in our system, why not <a href="song-add.php">add it</a>?
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
		<table class="table">
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
				"<td><a href=$fanlink>Likes</a></td>";
				echo "<td><form action='./song-delete.php' method='POST' id='' " .
                               "onSubmit=\"return confirm('Confirm delete of $name');\"> " .
                               "<input type='hidden' value='$name' name='song_name'> " .
                               "<input type='hidden' value='$album' name='album'> " .
                               "<input type='hidden' value='$artist' name='artist'> " .
                               "<input type='submit' value='DELETE'> ".
                "</form></td></tr>";
			}
			?>
		</table>
		</p>
	<?php include_once './footer.php'?>