<?php
    require_once './dbsetup.php';
    $langquery = 'SELECT language, abbv FROM languages;';
    $langst = $db->query($langquery);

    $genrequery = 'SELECT DISTINCT genre FROM song;';
    $genrest = $db->query($genrequery);

    $albumst = $db->query('SELECT DISTINCT name as album FROM album ORDER BY album;');
    $artistst = $db->query('SELECT DISTINCT artist_name as artist FROM album ORDER BY artist_name;');
?>
<html>
<head>
    <title>Adding Song to Database</title>
</head>
<body>
<?php include_once './header.php'?>

<h2>Adding a Song to the Database</h2>
<form action="song-show.php" method="post">
    <label>Please enter a song's name, album, and artist.</label>
    <br>
    <label>Song Name</label>
    <input type="text" name="song_name" value="Gangnam Style" required/>
    <br>
    <label>Song's Album Name</label>
    <select name="album">
    <?php
        foreach($albumst as $row){
            $val = $row['album'];
            $select = $val == 'Psy 6 (Six Rules), Part 1'? ' selected="selected" ' : '';
            echo "<option value=\"$val\" $select>$val</option>";
        }
    ?>
    </select>
    <br>
    <select name="artist">
    <label>Song's Artist Name</label>
    <?php
        foreach($artistst as $row){
            $val = $row['artist'];
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
//            echo $abbv;
            echo "<option value='$abbv'>$lang</option>";
        }
    ?>
    </select>
    <br>
    <label>Song's Duration</label>
    <input type="number" value="3" min="0" max="9" step="1" name="minutes" required> min
    <input type="number" value="43" min="0" max="59" step="1" name="seconds" required> sec
    <br>
    <label>Song's Release Date</label>
    <input type="date" value="2008-01-21" min="1980-01-01" name="release_date" required>
    <br>
    <label>Copies Sold</label>
    <input type="number" value="48000" name="copies_sold">
    <br>
    <label>Released as a Single?</label>
    <input type="checkbox" name="single">
    <br>
    <label>Genre</label>
    <select name="genre">
        <?php
        foreach($genrest as $row)
        {
            $genre = $row['genre'];
            echo "<option value='$genre'>$genre</option>";
        }
        ?>
    </select>
    <br>
    <label>Has a Music Video?</label>
    <input type="checkbox" name="music_video">
    <br>
    <input type="hidden" name="ins_del_mod" value="insert">
    <input type="submit" value="Enter"/>
</form>
<a href="song-list.php">Back to browse songs</a>

    <?php include_once './footer.php'?>