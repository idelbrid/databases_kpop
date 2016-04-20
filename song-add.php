<?php
    require_once './dbsetup.php';
    $langquery = 'SELECT language, abbv FROM languages;';
    $langst = $db->query($langquery);

    $genrequery = 'SELECT UNIQUE genre FROM song;';
    $genrest = $db->query($genrequery);
?>
<html>
<head>
    <title>Adding Song to Database</title>
</head>
<body>
<h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
<hr>
<h2>Add Song</h2>
<form action="song-show.php" method="post">
    <label>Please enter a song's name, album, and artist.</label>
    <br>
    <label>Song Name</label>
    <input type="text" name="song_name" value="Gangnam Style"/>
    <br>
    <label>Song's Album Name</label>
    <input type="text" name="album" value="Psy 6 (Six Rules), Part 1"/>
    <br>
    <label>Song's Artist Name</label>
    <input type="text" name="artist" value="PSY"/>
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
    <input type="time" value="00:03:15" max="00:10:00" name="duration">
    <br>
    <label>Song's Release Date</label>
    <input type="date" value="2008-01-21" min="1980-01-01" name="release_date">
    <br>
    <label>Copies Sold</label>
    <input type="number" value="48000" name="copies_sold">
    <br>
    <label>Released as a Single?</label>
    <input type="checkbox" name="single">
    <br>
    <label>Genre</label>
    <select>
        <?php
        foreach($genrest as $row)
        {
            $genre = $row;
            echo "<option value='$genre'>$genre</option>";
        }
        ?>
    </select>
    <br>
    <label>Has a Music Video?</label>
    <input type="checkbox" name="music_video">
    <br>
    <input type="submit" value="Enter"/>
</form>