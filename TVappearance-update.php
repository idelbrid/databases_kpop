<?php
require_once './dbsetup.php';

?>

<html>
	<head>
		<title>Korean Pop | TV Show Appearances</title>
	</head>
	<body>
        <?php include_once './header.php'?>
    <h1 style="text-align:center;"><a href="index.php">K-Pop Database</a></h1>
    <hr>
<?php
    if($_GET['artist_name']&$_GET['show_name']&$_GET['episode_date']){
        $artist = $_GET['artist_name'];
        $show = $_GET['show_name'];
        $date = $_GET['episode_date'];

        echo "$artist, $name, $members";
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
        <h2>Editing $artist 's TV Show Appearances</h2>";
        
?>

<form action='TVappearance-show.php' method='post'>
        <label>Artist: 
            <?php echo $artist; ?>
            <input type=hidden name="artist" value="<?php echo $artist; ?>">
        </label><br>
        <label>TV Show: 
            <input type=text name="show" value="<?php echo $show; ?>">
        </label><br>
        <label>Date: 
            <input type=text name="date" value="<?php echo $date; ?>">
        </label><br>
        <input type=submit value=submit>
        <button onclick='window.history.back();'>cancel</button>
</form>
    
    <?php include_once './footer.php'?>
