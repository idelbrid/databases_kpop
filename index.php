<?php
require_once './dbsetup.php';

date_default_timezone_set("America/New_York");
$sql = "SELECT COUNT(*) FROM artist";
$result = $db->query($sql);
$count = $result->fetchColumn();
?>
<?php include_once './header.php'?>
<!-- Page Content -->
        
                        <h2>Welcome to the K-pop database website!</h2>
<p>
    We have all sorts of data about so much K-pop somehow. We have over
    <?php echo $count?> K-pop artists in our database!
    To browse or search songs in our database, click <a href="song-list.php">here</a>
</p>
<p><a href="https://docs.google.com/document/d/1DKID1yrGWr69chy9pl7-sWqJ75DdYPC0oAfABnHSBiU/#">Project Design (Google Doc)</a></p>
<img class="img-responsive" src="https://lh3.googleusercontent.com/-ALad327dVuA/AAAAAAAAAAI/AAAAAAAAAF4/p-HPdSIpi1M/s0-c-k-no-ns/photo.jpg">
<?php include_once './footer.php'?>                     