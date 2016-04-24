<?php
require_once './dbsetup.php';
function getQuery($name){
    // echo "$name";
    $get = $_GET[$name];
    // echo "yo $get";
    $sql = "SELECT name,website,num_members,artist FROM fanclub WHERE $name = '$get';";
    // print_r($sql);
    return $sql;
}
function update($artist, $name,$website,$members){
    echo "im in update<br>";
    global $db;

    if(empty($db))
        echo "no db";
    if($db)
        echo "indeed has db<br>";
    echo "$artist $name $website $members";
    //$updatesql = "UPDATE fanclub SET (name,website,num_members)=(:name,:website,:num_members) WHERE artist=:artist";
    $query = $db->prepare("UPDATE fanclub SET (website, num_members) = (:url, :mems) WHERE artist=:artist;");
 //    $stmt = $db->prepare('bogus sql');
//    if(!$stmt){
//    	echo "\nPDO::errorInfo():\n";
//	print_r($db->errorInfo());
//    }
    echo "before execute";
    $query->execute(array(':url' => $website, ':mems' => $members, ':artist' => $artist));
    $err = $query->errorInfo();
    foreach($err as $row){
        echo "<br>" . $row . "<br>";
        foreach($row as $a)
            echo "<br>" . $a . "<br>";
    }
    if($query->rowCount==1){echo 'success';}
    else{echo 'update fail';}
    $sqls = "SELECT name,website,num_members,artist FROM fanclub WHERE name = '$name';";
    echo $sqls;
    return $sqls;
}
?>

<html>
	<head>
		<title>Korean Pop | K-pop FanBase-list details</title>
	</head>
	<body>
        <?php include_once './header.php'?>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php

if($_GET['name']){
    $name = $_GET['name'];
    // echo "yehn" . $name;
    goto exea;
}elseif($_GET['artist']){
    $name = $_GET['artist'];
    // echo "yeha" . $name;
    goto exeb;
}else{
    if($_POST){
        echo "im here yo, " . $_POST['artist'];
        //UPDATE
        $name = $_POST['name'];
        update($_POST['artist'],$_POST['name'],$_POST['website'],$_POST['members']);
        goto exec;
    }else{
        echo "im not here";
        echo "No found artist, redircting to fanbase list";
        header( "refresh:2; url=fanclub-list.php" );
    }
}

    // $sql = "SELECT name,website,num_members,artist FROM fanclub WHERE name = '$name';";
    exea:
    $sql = getQuery('name');
    goto exec;

    exeb:
    $sql = getQuery('artist');
    goto exec;

    exec:
    // if($db->query($sql)->num_rows==0){
    //      echo "No found artist, redircting to fanbase list";
    //     header( "refresh:2; url=fanclub-list.php" );
    // }else{
        foreach($db->query($sql) as $row){
        $name = $row['name'];
        $artist = $row['artist'];
        $website = $row['website'];
        $members = $row['num_members'];
    // }
    $sql2 = "SELECT * FROM part_of WHERE fanclub_name = '$name';";
    $fans = array();
    foreach($db->query($sql2) as $row){
        $fan = $row['fan_username'];

        if(!in_array($fan, $fans)){
            // echo '$fan doesnot exist ';
            array_push($fans,$fan);
        }
    }
    
    //is above keeped? maybe echo if error
    if(empty($name)) $name=" ";
    if(empty($website)) $website=" ";
    if(empty($members)) $members=0;
    echo "
        <h2>$artist 's Fanbase Details</h2>
        <a href='
        fanclub-update.php?artist=" . urlencode($artist) . "&name=" . urlencode($name) . "&members=$members&website=" . urlencode($website) . "
        '>Edit</a>
        <ul>
            <li>Artist: $artist</li>
            <li>Fanbase name: $name</li>
            <li>members: $members</li>
            <li>Site: <a href='$website' target='_blank'>$website</a>
            </li>
            <li>Fans: </li><ul>";
        foreach($fans as $afan){
           if($afan!=NULL| !empty($afan)){
                echo "<li>$afan</li>";
            }
            else{
                echo "NONE";
            }
        }
    echo "</ul></li>
        </ul>
    ";
    }
    
?>
        <br><a href="fanclub-list.php">Or click to go back to view all fanbases</a>

        <?php include_once './footer.php'?>
