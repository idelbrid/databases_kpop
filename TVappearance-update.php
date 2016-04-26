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
        $artist_name = $_GET['artist_name'];
        $show_name = $_GET['show_name'];
        $episode_date = $_GET['episode_date'];

        echo "$artist_name, $show_name, $episode_date";
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
            <?php echo $artist_name; ?>
            <input type=hidden name="artist_name" value="<?php echo $artist_name; ?>">
        </label><br>
        <label>TV Show: 
            <input type=text name="show_name" value="<?php echo $show_name; ?>">
        </label><br>
        <label>Date: 
            <input type=text name="episode_date" value="<?php echo $episode_date; ?>">
        </label><br>
        <input type=submit value=submit>
        <button onclick='window.history.back();'>cancel</button>
</form>
    
    <?php include_once './footer.php'?>
