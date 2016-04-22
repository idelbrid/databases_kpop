<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Song Detail</title>
	</head>
	<body>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php
if( !empty($_POST['song_name']) and isset( $_POST["song_name"]) and
    !empty($_POST['album']) and isset($_POST["album"]) and
    !empty($_POST['artist']) and isset($_POST["artist"]))
{
    $post = true;
    $name = $_POST['song_name'];
    $album = $_POST['album'];
    $artist = $_POST['artist'];
}
if( !empty($_GET['song_name']) and isset( $_GET["song_name"]) and
    !empty($_GET['album']) and isset($_GET["album"]) and
    !empty($_GET['artist']) and isset($_GET["artist"]))
{
    $get = true;
    $name = $_GET["song_name"];
    $album = $_GET["album"];
    $artist = $_GET["artist"];   
}    
    
if($post)
{
    if( $_POST['ins_del_mod'] == 'insert')
    {
        try {
            $language = $_POST['language'];
            $minutes = $_POST['minutes'];
            $seconds = $_POST['seconds'];
            $duration = "00:0$minutes:$seconds";            $release_date = $_POST['release_date'];
            $copies_sold = $_POST['copies_sold'] ? $_POST['copies_sold'] : null;
            $single = $_POST['single'] ? 'TRUE' : 'FALSE';
            $genre = $_POST['genre'];
            $music_video = $_POST['music_video'] ? 'TRUE' : 'FALSE';

            $replacements = array(
                ':sname' => $name,
                ':salbum' => $album,
                ':sartist' => $artist,
                ':slanguage' => $language,
                ':sduration' => $duration,
                ':srelease_date' => $release_date,
                ':scopies_sold' => $copies_sold,
                ':ssingle' => $single,
                ':sgenre' => $genre,
                ':smusic_video' => $music_video
            );
            $insertsql = "INSERT INTO song VALUES" .
                "(:sname, :salbum, :sartist, :slanguage, :sduration, :srelease_date," .
                ":scopies_sold, :ssingle, :sgenre, :smusic_video);";
            $insertstmt = $db->prepare($insertsql);
            $insertstmt->execute($replacements);
        }
        catch(Exception $e){
            echo 'Error with inserting the song! '. $e->getMessage();
        }
    }
    elseif($_POST['ins_del_mod']=='mod')
    {
        try {
            $updatesql = "UPDATE song SET " .
                "(language, duration, release_date, copies_sold, single, genre, music_video) = " .
                "(:slanguage, :sduration, :srelease_date, :scopies_sold, :ssingle, :sgenre, " .
                ":smusic_video ) " .
                "WHERE name=:sname AND album=:salbum AND artist=:sartist;";
            $updatestmt = $db->prepare($updatesql);

            $language = $_POST['language'];
//            $duration = $_POST['duration'];
            $minutes = $_POST['minutes'];
            $seconds = $_POST['seconds'];
            $duration = "00:0$minutes:$seconds";
            $release_date = $_POST['release_date'];
            $copies_sold = $_POST['copies_sold'] ? $_POST['copies_sold'] : null;
            $single = $_POST['single'] ? 'TRUE' : 'FALSE';
            $genre = $_POST['genre'];
            $music_video = $_POST['music_video'] ? 'TRUE' : 'FALSE';

            $replacements = array(
                ':slanguage' => $language,
                ':sduration' => $duration,
                ':srelease_date' => $release_date,
                ':scopies_sold' => $copies_sold,
                ':ssingle' => $single,
                ':sgenre' => $genre,
                ':smusic_video' => $music_video,
                ':sname' => $name,
                ':salbum' => $album,
                ':sartist' => $artist
            );

            $updatestmt->execute($replacements);

        }
        catch(ErrorException $e){
            echo "Error with inserting the song! ". $e->getMessage();
        }
    }
}
if($get OR $post)
{
	echo "<h2>Song Details for $name</h2>";
	try
    {
        $all_query = 'SELECT languages.language as lang, duration, release_date, copies_sold, '.
            'single, genre, music_video ' .
            'FROM song, languages ' .
            'WHERE name=:sname AND album=:salbum AND artist=:sartist AND song.language=languages.abbv;';
        $stmt = $db->prepare($all_query);

        $features_query = 'SELECT artist_name AS featured_artist '.
            'FROM features ' .
            'WHERE song_name=:sname AND song_album=:salbum AND song_artist=:sartist';
        $features_stmt = $db->prepare($features_query);

        $rank_query = 'SELECT rank, day_starting_week AS week' .
            'FROM song_ranks' .
            'WHERE name=:sname AND album:salbum AND artist=:sartist' ;
        $rank_stmt = $db->prepare($rank_stmt);

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

            <p>
                <?php
                $link = "./song-update.php?".
                    "song_name=" . urlencode($name)."&" .
                    "album=" . urlencode($album) . "&" .
                    "artist=" . urlencode($artist);
                echo "Is the information above wrong? Click <a href=$link>here</a> to update it!";
                ?>
            </p>

            <?php
        }
        else
        {
            echo "No data found for this song! :(";
            echo "<br>Why not <a href='song-add.php'>add it</a>?";

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
        <br><a href="song-list.php">Back to browse songs</a>

    </body>
</html>