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
    $likes_query = 'SELECT fan_username AS fan ' .
        'FROM likes ' .
        'WHERE song=:sname AND album=:salbum AND artist=:sartist;';
    $stmt = $db->prepare($query);
    $features_stmt = $db->prepare($features_query);
    $likes_stmt = $db->prepare($likes_query);
} catch (Exception $e){ echo "exception " . $e->getmessage(); die;}
?>

<html>
<head>
    <title>Who Likes This Song?</title>
</head>
<body>
<?php include_once './header.php'?>

<?php
if( !empty($_GET['song_name']) and isset( $_GET["song_name"]) and
    !empty($_GET['album']) and isset($_GET["album"]) and
    !empty($_GET['artist']) and isset($_GET["artist"]))
{
    $name = $_GET["song_name"];
    $album = $_GET["album"];
    $artist = $_GET["artist"];
    echo "<h2>Fans Who Like $name</h2>";
    try
    {
        $stmt->execute(array(':sname' => $name, ':salbum' => $album,
            ':sartist' => $artist));
        $likes_stmt->execute(array(':sname' => $name, ':salbum' => $album,
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
            if (!empty($feature_string))
                $feature_string = " (featuring $feature_string)";

            $fans = array();
            while ($row = $likes_stmt->fetch())
            {
                $fans[] = $row['fan'];
            }
            ?>
            <p> <?php if (empty($name))
                {
                    echo "No one likes $name$feature_string!";
                    echo " That's so sad :(";
                }
                else
                {
                    echo "These fans like $name$feature_string:";
                }?>


            <u1>
            <?php
            foreach ($fans as $fan)
            {
                echo "<li>$fan</li>";
            }
            ?>
            </u1>
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

    <?php include_once './footer.php'?>