<?php
require_once './dbsetup.php';
try{
$query = 'SELECT languages.language as lang, duration, release_date, copies_sold, '.
                'single, genre, music_video ' .
         'FROM song, languages ' .
         'WHERE name=:sname AND album=:salbum AND artist=:sartist AND song.language=languages.abbv;';

$features_query = 'SELECT artist_name AS featured_artist '.
                    'FROM features ' .
                    'WHERE song_name=:sname AND song_album=:salbum AND song_artist=:sartist';
$rank_query = 'SELECT rank, day_starting_week AS week' .
                'FROM song_ranks' .
                'WHERE name=:sname AND album:salbum AND artist=:sartist' ;
$stmt = $db->prepare($query);
$features_stmt = $db->prepare($features_query);
$rank_stmt = $db->prepare($rank_stmt);

} catch (Exception $e){ echo "exception " . $e->getmessage(); die;}
?>

<html>
	<head>
		<title>Song Detail</title>
	</head>
	<body>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php
if( !empty($_GET['song_name']) and isset( $_GET["song_name"]) and
    !empty($_GET['album']) and isset($_GET["album"]) and
    !empty($_GET['artist']) and isset($_GET["artist"]))
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
        if (!empty($row))
        {
            $lang = $row["lang"];
            $length = $row["duration"];
            $release_date = $row['release_date'] ? $row['release_date'] : "-";
            $copies_sold = $row['copies_sold'];
            $issingle = $row['single'] ? 'Yes' : 'No';
            $boolissingle = $row['single'];
            $genre = $row['genre'];
            $music_video = $row['music_video'] ? 'Yes' : 'No';
            $boolmusic_video = $row['music_video'];
            $features_stmt->execute(array(':sname' => $name, ':salbum' => $album,
                ':sartist' => $artist));

            $featured = array();
            $feature_string = '';
            # $featured_artists = $features_stmt->fetch();
            while ($fartist = $features_stmt->fetch())
            {
//                echo $fartist[0];
                $featured[] = $fartist[0];
            }

            for($i=0; $i < sizeof($featured); $i++)  # needs to be tested with such a song
            {
                $feature_string .= $featured[$i];
                if (sizeof($featured) > 2 and $i < sizeof($featured) - 1)
                    $feature_string .= ',';
                if ($i < sizeof($featured) - 1)
                    $feature_string .= ' ';
                if ($i == sizeof($featured) - 2)
                    $feature_string .= 'and ';
            }
            $ranks = array();
            ?>
            <p>
                <?php echo $name; echo !empty($featured) ?
                    " (featuring ".$feature_string.')' : ''?>
                is a song from the record <?php echo $album ?> by the K-pop
                artist <?php echo $artist; ?>. It was released on <?php echo $release_date ?>
                <?php $answer = $boolissingle ? 'as a single.' : 'with the rest of the record.';
                echo $answer ?>
                <?php $answer = $boolmusic_video ?
                    "Additionally, $artist released a music video to accompany the song." :
                    "No official music video was released for this song.";
                echo $answer ?>
<!--                This song-->
<!--                --><?php //$answer = empty($featured) ?
//                    "does not feature any other artists." :
//                    "features $feature_string.";
//                echo $answer ?>

            <table border="1">
                <tr>
                    <td>Length</td>
                    <td><?php echo $length ?></td>
                </tr>
                <tr>
                    <td>Language</td>
                    <td><?php echo $lang ?></td>
                </tr>
                <tr>
                    <td>Copies Sold</td>
                    <td><?php echo $copies_sold ?></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><?php echo $genre ?></td>
                </tr>
                <tr>
                    <td>Release Date</td>
                    <td><?php echo $release_date ?></td>
                </tr>
                <tr>
                    <td>Released as a single?</td>
                    <td><?php echo $issingle ?></td>
                </tr>
                <tr>
                    <td>Has a music video?</td>
                    <td><?php echo $music_video ?></td>
                </tr>
            </table>
            </p>

            <?php
        }
        else
        {
            echo "No data found for this song! :(";
        }
    } catch (PDOException $e)
	{
		print 'A Database error occurred :( see! ' . $e->getmessage();
		die;
	}
}
else
{
    echo "<h3>Form problem</h3>";
    echo "Sorry! Invalid song information given! Please try again with the search below.<br>"
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
        <a href="song-list.php">Back to browse songs</a>

    </body>
</html>