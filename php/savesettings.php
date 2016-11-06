<?php
    $myfile = fopen("profiles.txt", "r") or die("Unable to open file!");
    
    // Output one line until end-of-file
    $socialprofiles = $_POST["user_facebook"] . ":";
    $socialprofiles .= $_POST["user_instagram"] . ":";
    $socialprofiles .= $_POST["user_twitter"] . ":";
    $socialprofiles .= $_POST["user_snapchat"] . ":";
    $socialprofiles .= $_POST["user_skype"] . ":";
    $socialprofiles .= $_POST["user_linkedin"] . ":";
    $socialprofiles .= $_POST["user_github"] . ":";
    $socialprofiles .= $_POST["user_quora"] . ":";
    $socialprofiles .= $_POST["user_google"] . ":";
    while(!feof($myfile)) {
        $txt = trim(fgets($myfile));
        $profile = explode(":", $txt);
        if ($_GET['user'] == $profile[0]) {
            $total .= $profile[0] . ":" . $profile[1] . ":" . $socialprofiles . "\n";
        } else {
            $total .= $txt . "\n";
        }
    }
    $total = trim($total);
    fclose($myfile);
    
    $myfile = fopen("profiles.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $total . "\n");
    fclose($myfile);
    header( 'Location: \main-page.php?user='.$_GET['user']);
?>