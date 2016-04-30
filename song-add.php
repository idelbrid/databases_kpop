<?php
require_once './dbsetup.php';

function validate_add(
        $name, $album, $artist, $language, $minutes, $seconds, $release_date,
        $copies_sold, $single, $genre, $music_video){
    global $db;
    $good_album = $db->prepare('SELECT 1 FROM album WHERE :salbum=name AND :sartist=artist_name;');
    $good_album->execute([':salbum' => $album, ':sartist' => $artist]);
    if (!$good_album->fetch())
        return 'The album does not match the artist';
    $free_name = $db->prepare('SELECT 1 from song WHERE :sname=name AND :salbum=album AND :sartist=artist;');
    $free_name->execute([':sname' => $name, ':salbum' => $album, ':sartist' => $artist]);
    if ($free_name->fetch())
        return 'The song already exists';

    return '';

}

$langquery = 'SELECT language, abbv FROM languages;';
$langst = $db->query($langquery);

$genrequery = 'SELECT DISTINCT genre FROM song;';
$genrest = $db->query($genrequery);

$albumst = $db->query('SELECT DISTINCT name as album FROM album ORDER BY album;');
$artistst = $db->query('SELECT DISTINCT artist_name as artist FROM album ORDER BY artist_name;');
$post = false;

if( $_SERVER['REQUEST_METHOD'] == 'POST' and
    !empty($_POST['song_name']) and !empty($_POST['album']) and !empty($_POST['artist']))
{
    $post = true;
    $name = $_POST['song_name'];
    $album = $_POST['album'];
    $artist = $_POST['artist'];
    $language = $_POST['language'];
    $minutes = $_POST['minutes'];
    $seconds = $_POST['seconds'];
    $duration = "00:0$minutes:$seconds";
    $release_date = $_POST['release_date'];
    $copies_sold = $_POST['copies_sold'] ? $_POST['copies_sold'] : null;
    $single = $_POST['single'] ? 'TRUE' : 'FALSE';
    $genre = $_POST['genre'];
    $music_video = $_POST['music_video'] ? 'TRUE' : 'FALSE';

    $err = validate_add($name, $album, $artist, $language, $minutes, $seconds, $release_date,
        $copies_sold, $single, $genre, $music_video);
    
    if(!$err){
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
        if ($insertstmt->execute($replacements)){
            $link = "./song-show.php?".
                "song_name=" . urlencode($name)."&" .
                "album=" . urlencode($album) . "&" .
                "artist=" . urlencode($artist);
            header("Location:$link");
        }
        else $err = 'Failure inserting tuple into database';
    }

}

?>
<html>
    <style>
        .error {color: #FF0000;}
    </style>
<head>
    <title>Adding Song to Database</title>
</head>
<body>
<?php include_once './header.php'?>

<h2>Adding a Song to the Database</h2>
<span class="error"><?php if($err){ echo $err.'<br>';}?></span>
<form action="song-add.php" method="post">
    <label>Please enter a song's name, album, and artist.</label>
    <br>
    <label>Song Name</label>
    <input type="text" name="song_name" value="<?php if($name){echo $name;} else{echo "Gangnam Style";}?>" required/>
    <br>
    <label>Song's Album Name</label>
    <select name="album">
    <?php
        foreach($albumst as $row){
            $val = $row['album'];
            if ($post)
                $select = $val == $album ? ' selected="selected" ' : '';
            else
                $select = $val == 'Psy 6 (Six Rules), Part 1'? ' selected="selected" ' : '';
            echo "<option value=\"$val\" $select>$val</option>";
        }
    ?>
    </select>
    <br>
    <label>Song's Artist Name</label>
    <select name="artist">
    <?php
        foreach($artistst as $row){
            $val = $row['artist'];
            if($post)
                $select = $val == $artist ? ' selected="selected" ': '';
            else
                $select = $val == 'PSY'? ' selected="selected" ' : '';
            echo "<option value=\"$val\" $select>$val</option>";
        }
    ?>
    </select>
    <br>
    <label>Song's Language</label>
    <select name="language">
    <?php
        foreach($langst as $row)
        {
            $abbv = $row['abbv'];
            $lang = $row['language'];
            if ($language)
                $select = $abbv == $language ? ' selected="selected" ': '';
            else
                $select = '';
            echo "<option value='$abbv' $select>$lang</option>";
        }
    ?>
    </select>
    <br>
    <label>Song's Duration</label>
    <input type="number" value="<?php if($minutes){echo $minutes;} else{echo 3;}?>" min="0" max="9" step="1" name="minutes" required> min
    <input type="number" value="<?php if($seconds){echo $seconds;} else{echo 43;}?>" min="0" max="59" step="1" name="seconds" required> sec
    <br>
    <label>Song's Release Date</label>
    <input type="date" value="<?php if($release_date){echo $release_date;} else{echo '2008-01-21';}?>" min="1980-01-01" name="release_date" required>
    <br>
    <label>Copies Sold</label>
    <input type="number" value="<?php if($copies_sold){echo $copies_sold;} else {echo 0;}?>"
           min="0" step="1" name="copies_sold">
    <br>
    <label>Released as a Single?</label>
    <input type="checkbox" name="single" <?php if ($single=='TRUE'){echo 'checked="checked"';}?>>
    <br>
    <label>Genre</label>
    <select name="genre">
        <?php
        foreach($genrest as $row)
        {
            $thisgenre = $row['genre'];
            if($genre)
                $select = $thisgenre == $genre ? ' selected="selected" ': '';
            else
                $select = '';
            echo "<option value='$thisgenre' $select>$thisgenre</option>";
        }
        ?>
    </select>
    <br>
    <label>Has a Music Video?</label>
    <input type="checkbox" name="music_video" <?php if ($music_video=='TRUE'){echo 'checked="checked"';}?>>
    <br>
    <input type="hidden" name="ins_del_mod" value="insert">
    <input type="submit" value="Enter"/>
</form>
<a href="song-list.php">Back to browse songs</a>

    <?php include_once './footer.php'?>