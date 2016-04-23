<?php
require_once './dbsetup.php';

date_default_timezone_set("America/New_York");
$sql = "SELECT COUNT(*) FROM artist";
$result = $db->query($sql);
$count = $result->fetchColumn();
?>

<style>
    ul#menu li {
        display: inline;
    }
    ul#menu li a {
        color: WHITE;
        background-color: #33CCFF;
        padding: 10px 20px;
        text-decoration: none;
    }
    ul#menu li a:hover{
        background-color: cadetblue;
    }
</style>

<html>
<head>
    <title>K-pop Home</title>
</head>
<body>
<h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
<hr>

<ul id="menu">
    <li><a href="./song-list.php">Songs</a></li>
    <li><a href="./fanclub-list.php">Fanclubs</a></li>
<!--    <li><a href="/js/default.asp">JavaScript</a></li>-->
<!--    <li><a href="/php/default.asp">PHP</a></li>-->
</ul>
<h2>Welcome to the K-pop database website!</h2>
<p>
    We have all sorts of data about so much K-pop somehow. We have over
    <?php echo $count?> K-pop artists in our database!
    To browse or search songs in our database, click <a href="song-list.php">here</a>
</p>
<p><a href="https://docs.google.com/document/d/1DKID1yrGWr69chy9pl7-sWqJ75DdYPC0oAfABnHSBiU/#">Project Design (Google Doc)</a></p>
</body>

<html>

