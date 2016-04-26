<?php
require_once './dbsetup.php';
?>

<html>
	<head>
		<title>Korean Pop | K-pop Artist-list details</title>
	</head>
	<body>
        <?php include_once './header.php'?>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php
    if($_GET['name']&$_GET['debut_date']&$_GET['company_name']){
        $name = $_GET['name'];
        $debut_date = $_GET['debut_date'];
        $company_name = $_GET['company_name'];

    }else{
        echo "Edit page can not be edited directly";
        echo "<script>
                setTimeout(history.back(), 5000);
        </script>";
    }

    echo "
        <h2>Updating $name's informations</h2>";
?>

<form action='artist-show.php' method='post'>
        <label>Artist name: 
            <?php echo $name; ?>
           <input type= hidden name="name" value="<?php echo $name; ?>">
        </label><br>
        <label>Debut date: 
            <input type=text name="debut_date" value="<?php echo $debut_date; ?>">
        </label><br>
        <label>Company‘s name: 
            <input type=text name="company_name" value="<?php echo $company_name; ?>">
        </label><br>
        <input type=submit value=submit>
 		<a href="artist-list.php">
        <input type=button value=cancel />
     </a>
</form>
    
    <?php include_once './footer.php'?>