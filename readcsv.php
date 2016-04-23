<?php
	require_once './dbsetup.php';

function addTo($row){
	echo "$row[0], $row[1], $row[2], $row[3]<br />\n";
	$query = "INSERT INTO fanclub(name,website,num_members,artist) VALUES ('$row[1]', '$row[2]', $row[3], '$row[0]');";
	return $query;
}

	$file = fopen("fancafe.csv","r");
	$lines = array();
	while(!feof($file)){
		$lines[] = fgetcsv($file, 1000);		
	}
	fclose($file);

	foreach($lines as $line){
//		echo "ehh\n";
//		if($db){ echo "find yo \n";}
		try{
			$stmt = $db->prepare(addTo($line));
		}catch(Exception $e){echo "exception " . $e->getMessage(); die;}
		$stmt->execute();
//		pg_close();
		//var_dump($result);
		//echo "<pre>";
		//	print_r($line[0]);
		//	print_r($line[1]);
		//	print_r($line[2]);
		//	print_r($line[3]);
		//	echo "<br />\n";
		//	echo "</pre>";
	}
	pg_close($db);
?>

<html>
	<head>yeh hello world!</head>
</html>
