<?php
require_once './dbsetup.php';

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
    if($_GET['artist']&$_GET['name']&$_GET['members']&$_GET['website']){
        $artist = $_GET['artist'];
        $name = $_GET['name'];
        $members = $_GET['members'];
        $website = $_GET['website'];
        echo "$artist, $name, $members, $website";
    //     goto form:
    }else{
        echo "Edit page cannot be edit directly,";
        echo "<script>
                setTimeout(history.back(), 5000);
        </script>";
    }
    
    //is above keeped? maybe echo if error
    // form:
    echo "
        <h2>Editing $artist 's Fanbase Details</h2>";
        
?>

<form action='fanclub-show.php' method='post'>
        <label>Artist: 
            <?php echo $artist; ?>
            <input type=hidden name="artist" value="<?php echo $artist; ?>">
        </label><br>
        <label>Fanbase name: 
            <input type=text name="name" value="<?php echo $name; ?>">
        </label><br>
        <label>members: 
            <input type=text name="members" value="<?php echo $members; ?>">
        </label><br>
        <label>website page: 
            <input type=text name="website" value="<?php echo $website; ?>">
        </label><br>
        <input type=submit value=submit>
        <button onclick='window.history.back();'>cancel</button>
</form>
    
    <?php include_once './footer.php'?>
