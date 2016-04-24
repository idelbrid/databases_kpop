<?php
require_once './dbsetup.php';
$getquery = 'SELECT languages.language as lang, duration, release_date, copies_sold, '.
    'single, genre, music_video ' .
    'FROM song, languages ' .
    'WHERE name=:sname AND album=:salbum AND artist=:sartist AND song.language=languages.abbv;';
$getst = $db->prepare($getquery);

$langquery = 'SELECT language, abbv FROM languages;';
$langst = $db->query($langquery);

$genrequery = 'SELECT DISTINCT genre FROM song;';
$genrest = $db->query($genrequery);

if( !empty($_GET['song_name']) and isset( $_GET["song_name"]) and
    !empty($_GET['album']) and isset($_GET["album"]) and
    !empty($_GET['artist']) and isset($_GET["artist"]))
{
    $get = true;
    $name = $_GET["song_name"];
    $album = $_GET["album"];
    $artist = $_GET["artist"];
}
if($get){
    try
    {
        $getst->execute(array(':sname' => $name, ':salbum' => $album,
            ':sartist' => $artist));
        $row = $getst->fetch();
        if (!empty($row))
        {
            $language = $row["lang"];
            $duration = $row["duration"];
            $release_date = $row['release_date'] ? $row['release_date'] : "-";
            $copies_sold = $row['copies_sold'];
            $single = $row['single'];
            $genre = $row['genre'];
            $music_video = $row['music_video'];

    
?>
<html>
<head>
    <title>Modifying Song in Database</title>
</head>
<body>
<?php include_once './header.php'?>

<h2>Modifying the Song <?php echo $name?></h2>
<p>Please make the modifications below:</p>
<form action="song-show.php" method="post">
    <input type="hidden" name="song_name" value="<?php echo $name?>">
    <input type="hidden" name="album" value="<?php echo $album?>">
    <input type="hidden" name="artist" value="<?php echo $artist?>">

    <label>Song's Language</label>
    <select name="language">
        <?php
        foreach($langst as $row)
        {
            $abbv = $row['abbv'];
            $lang = $row['language'];
            $selected = $abbv == $language ? 'selected' : '';
            echo "<option value='$abbv' $selected>$lang</option>";
        }
        ?>
    </select>
    <br>
    <?php
    $ar = explode(':', $duration);
    $minutes = $ar[1];
    $seconds = $ar[2];
    ?>

    <label>Song's Duration</label>
    <input type="number" value="<?php echo $minutes?>" min="0" max="9" step="1" name="minutes" required> min
    <input type="number" value="<?php echo $seconds?>" min="0" max="59" step="1" name="seconds"> sec
    <br>
    <label>Song's Release Date</label>
    <input type="date" value="<?php echo $release_date?>" min="1980-01-01" name="release_date">
    <br>
    <label>Copies Sold</label>
    <input type="number" value="<?php echo $copies_sold?>" min="0" step="1" name="copies_sold">
    <br>
    <label>Released as a Single?</label>
    <input type="checkbox" name="single" <?php if($single){echo 'checked="checked"';}?>>
    <br>
    <label>Genre</label>
    <select name="genre">
        <?php
        foreach($genrest as $row)
        {
            $mgenre = $row['genre'];
            $selected = $mgenre == $genre ? "selected" : '';
            echo "<option value='$mgenre' $selected>$mgenre</option>";
        }
        ?>
    </select>
    <br>
    <label>Has a Music Video?</label>
    <input type="checkbox" name="music_video" <?php if($music_video){echo 'checked="checked"';}?>>
    <br>
    <input type="hidden" name="ins_del_mod" value="mod">
    <input type="submit" value="Enter"/>
</form>
<?php
$link = "./song-show.php?".
    "song_name=" . urlencode($name)."&" .
    "album=" . urlencode($album) . "&" .
    "artist=" . urlencode($artist);
echo "<a href='$link'>" .
        '<input type="button" value="Cancel" />' .
     '</a>';
?>

    <?php include_once './footer.php'?>
    // maybe
        
<?php
        }
        else
        {
            echo "No data found for this song! :(";
            echo "<br>Why not <a href='song-add.php'> add it</a>?";

        }
    } catch (PDOException $e)
    {
        print 'A Database error occurred :( see! ' . $e->getmessage();
        die;
    }
?>

        
                
                        
<?php 
}
?>