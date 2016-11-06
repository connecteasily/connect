<?php
    $myfile = fopen("profiles.txt", "a") or die("Unable to open file!");
    $txt = $_POST["user_username"] . ":";
    fwrite($myfile, $txt);
    $txt = $_POST["user_password"] . ":" . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    $link = 'Location: \settings.php?user=' . $_POST["user_username"];
    header( $link );
?>