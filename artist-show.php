<?php
require_once './dbsetup.php';

function getQuery($name){
    $get = $_GET[$name];
    $sql = "SELECT name, debut_date, company_name FROM artist WHERE $name = '$get';";
    return $sql;
}

function update($name,$debut_date,$company_name){
    echo " updated successfully<br>";
    global $db;
    $query = $db->prepare("UPDATE artist SET (name, debut_date, company_name) = (:name::VARCHAR, :debut_date::DATE, :company_name::VARCHAR) WHERE name=:name::VARCHAR;");
    $queryresult = $query->execute(array(':name' => $name, ':debut_date' => $debut_date, ':company_name' => $company_name));
    //echo "Update successful? $queryresult<br>";
    //foreach($query->errorInfo() as $row){
    //    echo "row $row<br>";
	//foreach($row as $a){
	//    echo "value $a<br>";
	//}
    //}
	$sqls = "SELECT name, debut_date, company_name FROM artist WHERE name = '$name';";
	return $sqls;
}
?>

<html>
	<head>
		<title>Korean Pop | K-pop Artist details</title>
	</head>
	<body>
        <?php include_once './header.php'?>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php

if($_POST['name']){
	echo $_POST['name'];
    $sql = update($_POST['name'],$_POST['debut_date'],$_POST['company_name']);
    goto exec;
}
elseif($_GET['name']){
    $name = $_GET['name'];
    goto exea;
}elseif($_GET['artist']){
    $name = $_GET['artist'];
    goto exeb;
}else{
        echo "Now redirecring to artist list";
}

    $sql = "SELECT name,debut_date,company_name FROM artist WHERE name = '$name';";
    exea:
    $sql = getQuery('name');
    goto exec;

    exeb:
    $sql = getQuery('artist');
    goto exec;

    exec:
    if(!($db->query($sql)->fetch())){
         echo "Sorry, artist is not found";

    }else{
        foreach($db->query($sql) as $row){
        $name = $row['name'];
        $debut_date = $row['debut_date'];
        $company_name = $row['company_name'];
    }
    
    if(empty($name)) $name=" ";
    if(empty($debut_date)) $debut_date=" ";
    if(empty($company_name)) $company_name=" ";
    echo "
        <h2>$name's Page</h2>
        <a href='
        artist-update.php?name=" . urlencode($name) . "&debut_date=" . urlencode($debut_date) . "&company_name=" . urlencode($company_name) . "
        '>Edit</a>
        <ul>
            <li>Artist: $name</li>
            <li>Debut date: $debut_date</li>
            <li>Company's name: $company_name</li><ul>";
    echo "</ul></li>
        </ul>
    ";
    }
    
?>
        <br><a href="artist-list.php">Click here to go back</a>

    <?php include_once './footer.php'?>