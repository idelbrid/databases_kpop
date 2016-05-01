<?php
require_once './dbsetup.php';
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
    if($_GET['name']){
        //&$_GET['start_date']&$_GET['end_date']&$_GET['type']&$_GET['channel']&$_GET['country']&$_GET['language']){
        $name = $_GET['name'];
        // $start_date = $_GET['start_date'];
        // $end_date = $_GET['end_date'];
        // $type = $_GET['type'];
        // $channel = $_GET['channel'];
        // $country = $_GET['country'];
        // $language = $_GET['language'];
        
    }else{
        echo "Edit page cannot be edit directly,";
        // echo "<script>
        //         setTimeout(history.back(), 5000);
        // </script>";
    }

    echo "
        <h2>Editing $name 's Details</h2>";
        
?>

<form action='TVshow-show.php' method='post'>
        <input type=hidden name="name" value="<?php echo $name; ?>">
        <label>Start date (YYYY-MM-DD):
            <input type=text name="start_date" value="<?php echo $start_date; ?>">
        </label><br>
        <label>End Date (YYYY-MM-DD): 
            <input type=text name="end_date" value="<?php echo $end_date; ?>">
        </label><br>
        <label> Type:  
            <input type=text name="type" value="<?php echo $type; ?>">
        </label><br>
        <label> Channel:
            <input type=text name="channel" value="<?php echo $channel; ?>">
        </label><br>
        <label> Country:
            <input type=text name="country" value="<?php echo $country; ?>">
        </label><br>
        <label> Language:
            <input type=text name="language" value="<?php echo $language; ?>">
        </label><br>
        <input type=submit value=submit>
        <button><a href="TVshow-show.php?name=<?php echo $name; ?>">cancel</button>
</form>
    
    <?php include_once './footer.php'?>
