<?php
require_once './dbsetup.php';

function getQuery($artist_name, $show_name){
    // echo "$name";
    $get = $_GET[$artist_name];
    $get_s = $_GET[$show_name];
    // echo "yo $get";
    // echo "yo $get_s";
    $sql = "SELECT artist_name, show_name, episode_date 
            FROM appears_on 
            WHERE $artist_name = $get AND $show_name = $get_s;";
    // print_r($sql);
    return $sql;
}

function update($artist_name, $show_name, $episode_date){
    echo "Updated<br>";
    global $db;
    //if(empty($db))
    //    echo "no db";
    //if($db)
    //    echo "indeed has db<br>";
    //echo "$artist $name $website $members";
    $query = $db->prepare("UPDATE appears_on SET (show_name, episode_date) = (:show_name, :episode_date) WHERE artist_name=:artist_name;");
    $query->execute(array(':show_name' => $show_name, ':episode_date' => $episode_date, ':artist_name' => $artist_name));
    //$err = $query->errorInfo();
    //foreach($err as $row){
    //    echo "<br>" . $row . "<br>";
    //    foreach($row as $a)
    //        echo "<br>" . $a . "<br>";
    //}

    $sqls = "SELECT artist_name, show_name, episode_date FROM appears_on WHERE artist_name = '$artist_name';";
    //echo $sqls;
    return $sqls;
}
?>



<html>
	<head>
		<title>Korean Pop | K-pop Idol Appearances</title>
	</head>
	<body>
        <?php include_once './header.php'?>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php

if($_POST['artist_name']){
    $sql = update($_POST['artist_name'],$_POST['show_name'],$_POST['episode_date']);
    //echo $sql . "lala \n";
    goto exec;
}
if($_GET['artist_name'] && $_GET['show_name']){
    $artist_name = $_GET['artist_name'];
    $show_name = $_GET['show_name'];

    // echo "yehn" . $name;
    goto exeb;

}else{
    // echo "asasasa\n";
    // if($_POST['']){
    //     echo "im here yo, " . $_POST['artist'];
    //     //UPDATE
    //     $name = $_POST['name'];
    //     update($_POST['artist'],$_POST['name'],$_POST['website'],$_POST['members']);
    //     goto exec;

    // }else{
        echo "im not here";
        echo "No found artist, redircting to appearances list";
        header( "refresh:2; url=TVappearance-list.php" );
    // }
}

    // $sql = "SELECT name,website,num_members,artist FROM fanclub WHERE name = '$name';";
    // exea:
    // $sql = getQuery('show_name');
    // goto exec;

    exeb:
    $sql = getQuery('artist_name', 'show_name');
    

    exec:
    if(!($db->query($sql)->fetch())){
         echo "No found artist, redircting to TV appearances list";
        header( "refresh:2; url=TVappearance-list.php" );
    }else{
        foreach($db->query($sql) as $row){
        $artist_name = $row['artist_name'];
        $show_name = $row['show_name'];
        $EPdate = $row['episode_date'];
    }
    // $sql2 = "SELECT * FROM part_of WHERE fanclub_name = '$name';";
    // $fans = array();
    // foreach($db->query($sql2) as $row){
    //     $fan = $row['fan_username'];

    //     if(!in_array($fan, $fans)){
    //         // echo '$fan doesnot exist ';
    //         array_push($fans,$fan);
    //     }
    // }
    
    //is above keeped? maybe echo if error
    if(empty($artist_name)) $artist_name=" ";
    if(empty($show_name)) $show_name=" ";
    if(empty($EPdate)) $episode_date=0;
    echo "
        <h2>$artist 's TV Show Appearances</h2>
        <a href='
        TVappearance-update.php?artist_name=" . urlencode($artist_name) . "&show_name=" . urlencode($show_name) . "&episode_date=$episode_date."
        Edit</a>
        <ul>
            <li>Artist: $artist_name</li>
            <li>TV show: $show_name</li>
            <li>Date: $episode_date</li>
            </li>
          
    //    
    // ";
    }
    
?>
        <br><a href="TVappearance-list.php">Or click to go back to view all TV show appearances</a>

        <?php include_once './footer.php'?>
