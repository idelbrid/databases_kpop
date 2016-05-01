<?php
require_once './dbsetup.php';

$sql = "SELECT name, album, artist FROM song ORDER BY artist, album, name";
try{
	$songstmt = $db->query("SELECT DISTINCT name FROM song ORDER BY name");
	$albumstmt = $db->query("SELECT DISTINCT album FROM song ORDER BY album");
	$artiststmt = $db->query("SELECT DISTINCT artist FROM song ORDER BY artist");

} catch (Exception $e) {echo "There was a problem! $e->getMessage()";}

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
			<select name="song_name">
				<?php
				foreach($songstmt as $row)
				{
					$song = $row['name'];
					$enc = htmlspecialchars($song);
					echo "<option value=\"$enc\">$song</option>";
				}
				?>
			</select>
            <br>
            <label>Song's Album Name</label>
			<select name="album">
				<?php
				foreach($albumstmt as $row)
				{
					$album = $row['album'];
					$enc = htmlspecialchars($album);
					echo "<option value=\"$enc\">$album</option>";
				}
				?>
			</select>
            <br>
            <label>Song's Artist Name</label>
			<select name="artist">
				<?php
				foreach($artiststmt as $row)
				{
					$artist = $row['artist'];
					$enc = htmlspecialchars($artist);
					echo "<option value=\"$enc\">$artist</option>";
				}
				?>
			</select>
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
				$jsname = json_encode($name);
                $htname = htmlspecialchars($name, ENT_QUOTES);
                $htalbum = htmlspecialchars($album, ENT_QUOTES);
                $htartist = htmlspecialchars($artist, ENT_QUOTES);
                $htscript = htmlspecialchars("return confirm('Confirm delete of ' + $jsname);");
                echo <<<EOD
				<td><form action='./song-delete.php' method='POST' id='' 
                    onSubmit="$htscript"> 
                    <input type='hidden' value="$htname" name='song_name'>
                    <input type='hidden' value="$htalbum" name='album'>
                    <input type='hidden' value="$htartist" name='artist'>
                    <input type='submit' value='DELETE'>
                </form></td></tr>
EOD;
               
			}
			?>
		</table>
		</p>
	<?php include_once './footer.php'?>