<?php
require_once './dbsetup.php';

?>

<html>
	<head>
		<title>Korean Pop | K-pop FanBase-list details</title>
	</head>
	<body>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php
if($_GET['name']){
    echo "yeh" . $GET['name'];
    $name = $_GET['name'];
    $sql = "SELECT name,website,num_members,artist FROM fanclub WHERE name = '$name';";
    foreach($db->query($sql) as $row){
        $artist = $row['artist'];
        $website = $row['website'];
        $members = $row['num_members'];
    }
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
    echo "
        <h2>$artist 's Fanbase Details</h2>
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
}else{
    echo "No artist specified, redircting to fanbase list";
    header( "refresh:2; url=fan-list.php" );
}
?>
        <br><a href="fan-list.php">Or click to go back to view all fanbases</a>

    </body>
</html>
