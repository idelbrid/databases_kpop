<?php
require_once './dbsetup.php';
try{
$query = 'SELECT * FROM song WHERE name=:sname AND album=:salbum ' .
				  'AND artist=:sartist;';
$stmt = $db->prepare($query);
} catch (Exception $e){ print "exception " . $e->getmessage(); die;}
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
        $lang = $row["language"];
        $length = $row["duration"];
        $release_date = $row['release_date'];
        $copies_sold = $row['copies_sold'];
        $issingle = $row['single'];
        $genre = $row['genre'];
        $music_video = $row['music_video'];
?>
     <p><?php echo $name?> is a song from the record <?php echo $album?> by the K-pop
        artist <?php echo $artist?>. It was released on <?php echo $release_date?>
        <?php $answer = $issingle ? 'as a single.' : 'with the rest of the record.';
              echo $answer?> </p>

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