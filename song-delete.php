<?php
require_once './dbsetup.php';

if( !empty($_POST['song_name']) and isset( $_POST["song_name"]) and
    !empty($_POST['album']) and isset($_POST["album"]) and
    !empty($_POST['artist']) and isset($_POST["artist"]))
{
    $post = true;
    $name = $_POST['song_name'];
    $album = $_POST['album'];
    $artist = $_POST['artist'];
}
if(!$post)
{
    echo "<html>Error in deleting! Could not find song.</html>";
    die;
}
$del_sql = 'DELETE FROM song '.
            'WHERE name=:sname AND album=:salbum AND artist=:sartist';
$del_stmt = $db->prepare($del_sql);
$del_output = $del_stmt->execute(array(
    ':sname' => $name,
    ':salbum' => $album,
    ':sartist' => $artist
));
if (!$del_output)
{
    echo "<html>Unknown error in deleting!.</html>";
    die;
}
else {
    ?>

    <html>
    <head>
        <meta http-equiv="refresh" content="0; url=./song-list.php">
        <!--    Deleting --><?php //echo $name;?>
    </head>
<body>
    <?php include_once './header.php' ?>
    <p>
        Deleting <?php echo $name; ?>
    </p>
    <?php include_once './footer.php' ?>
    <?php
}?>