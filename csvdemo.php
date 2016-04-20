<?php
//function readFile($name){
	$file = fopen("fancafe.csv","r");
	$lines = array();
	while(!feof($file)){
		$lines[] = fgetcsv($file, 1000);		
	}
	fclose($file);
	//return $lines;
//}	

//	$result = readFile('fancafe.csv');
	//echo '<pre>';
	//print_r($lines);
	foreach($lines as $line){
		//print_r($line);
		//for($i=0;$i<sizeof($line);$i++){
			echo "<pre>";
			print_r($line[0]);
			print_r($line[1]);
			print_r($line[2]);
			print_r($line[3]);
			echo "<br />\n";
			echo "</pre>";
		//}
	}
	//echo '</pre>';
?>

<html>
	<head>hello world!</head>
</html>
