<?php
require_once './dbsetup.php';

function getQuery($name){
    $get = $_GET[$name];
    $sql = "SELECT name, start_date, end_date, type, channel, country, language FROM TV_SHOW WHERE $name = '$get';";
    return $sql;
}

function update($name, $start_date, $end_date, $type, $channel, $country, $language){
    echo " updated successfully<br>";
    global $db;
    $query = $db->prepare("UPDATE TV_SHOW SET (name, start_date, end_date, type, channel, country, language) = (:name, :start_date, :end_date, :type, :channel, :country, :language) WHERE name=:name;");
    $queryresult = $query->execute(array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':type' => $type, ':channel' => $channel, ':country' => $country, ':language' => $language));
    echo "Update successful? $queryresult<br>";
    foreach($query->errorInfo() as $row){
        echo "row $row<br>";
	foreach($row as $a){
	    echo "value $a<br>";
	}
    }
    $sqls = "SELECT name, start_date, end_date, type, channel, country, language FROM TV_SHOW WHERE name = '$name';";
    return $sqls;
}
?>

<html>
    <head>
        <title>Korean Pop | TV Shows</title>
    </head>
    <body>
        <?php include_once './header.php'?>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php

if($_POST['name']){
    echo $_POST['name'];
    $sql = update($_POST['name'],$_POST['start_date'],$_POST['end_date'],$_POST['type'],$_POST['channel'],$_POST['country'],$_POST['language']);
    goto exec;
}
elseif($_GET['name']){
    $name = $_GET['name'];
    goto exea;

}else{
        echo "Now redirecting to TV Show list";
}

    $sql = "SELECT name, start_date, end_date, type, channel, country, language FROM TV_SHOW WHERE name = '$name';";
    exea:
    $sql = getQuery('name');
    goto exec;

    exec:
    if(!($db->query($sql)->fetch())){
         echo "Sorry, TV Show is not found";

    }else{
        foreach($db->query($sql) as $row){
        $name = $row['name'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $type = $row['type'];
        $channel = $row['channel'];
        $country = $row['country'];
        $language = $row['language'];
    }
    
    if(empty($name)) $name=" ";
    if(empty($start_date)) $start_date=" ";
    if(empty($end_date)) $end_date=" ";
    if(empty($type)) $type=" ";
    if(empty($channel)) $channel=" ";
    if(empty($country)) $country=" ";
    if(empty($language)) $language=" ";
    echo "
        <h2>$name's Page</h2>
        <a href='
        TVshow-update.php?name=" . urlencode($name) . "
        '>Edit</a>
        <ul>
            <li>Name of TV Show: $name</li>
            <li>Start Date: $start_date</li>
            <li>End Date: $end_date</li>
            <li>Type: $type</li>
            <li>Channel: $channel</li>
            <li>Country: $country</li>
            <li>Language: $language</li>
            <ul>";
    echo "</ul></li>
        </ul>
    ";
    }
    
?>
        <br><a href="TVshow-list.php">Click here to go back</a>

    <?php include_once './footer.php'?>
