<?php
require_once './dbsetup.php';
try{
$query = 'SELECT languages.language as lang, duration, release_date, copies_sold, '.
                'single, genre, music_video ' .
         'FROM song, languages ' .
         'WHERE name=:sname AND album=:salbum AND artist=:sartist AND song.language=languages.abbv;';
$stmt = $db->prepare($query);
} catch (Exception $e){ echo "exception " . $e->getmessage(); die;}
?>

<html>
	<head>
		<title>Song Detail</title>
	</head>
	<body>
<?php
if( isset( $_GET["song_name"]) and isset($_GET["album"]) and isset($_GET["artist"]))
{
	$name = $_GET["song_name"];
	$album = $_GET["album"];
	$artist = $_GET["artist"];
	echo "<h2>Song Details for $name</h2>";
	try
	{
		$stmt->execute(array(':sname' => $name, ':salbum' => $album,
									  ':sartist' => $artist));
        $row = $stmt->fetch();
        # foreach ($row as $key => $value){echo "$key $value";}
        $lang = $row["lang"];
        $length = $row["duration"];
        $release_date = $row['release_date'];
        $copies_sold = $row['copies_sold'];
        $issingle = $row['single'];
        $genre = $row['genre'];
        $music_video = $row['music_video'];
?>
     <p>
        <?php echo $name?> is a song from the record <?php echo $album?> by the K-pop
        artist <?php echo $artist?>. It was released on <?php echo $release_date?>
        <?php $answer = $issingle ? 'as a single.' : 'with the rest of the record.';
        echo $answer?>
         <?php $answer = $music_video ? "Additionally, $artist released ".
        "a music video to accompany the song." : "No official music video was resleased ".
        "for this song."; echo $answer?>

        <table border="1">
            <tr><td>Length</td><td><?php echo $length?></td></tr>
            <tr><td>Language</td><td><?php echo $lang?></td></tr>
            <tr><td>Copies Sold</td><td><?php echo $copies_sold?></td></tr>
            <tr><td>Genre</td><td><?php echo $genre?></td></tr>
            <tr><td>Release Date</td><td><?php echo $release_date?></td></tr>
            <tr><td>Released as a single?</td><td><?php echo $issingle?></td></tr>
            <tr><td>Has a music video?</td><td><?php echo $music_video?></td></tr>
        </table>
     </p>

<?php
	} catch (PDOException $e)
	{
		print 'A Database error occurred :( see! ' . $e->getmessage();
		die;
	}
}
else
{
	?>
	<form action="song-show.php" method="GET">
		<label>Please enter a song's name, album, and artist.</label>
        <br>
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
	<?php
}
?>
	</body>
</html>