<?php
    function findusername($file, $username) {
        $myfile = fopen($file, "r");
        $n=0;
        while(!feof($myfile) && $n!=1)
        {
            $l=fgets($myfile); //reads a line 
            $arrayofvalues=explode (":", $l);// turns every value of line into an element in an array 
            if ($arrayofvalues[0]==$username)
            $n++;
        }
         
        fclose($myfile);
        return $arrayofvalues;
    }
    $details = findusername('profiles.txt', $_POST['user_username']);
    if ($details[1] == $_POST['user_password']) {
        header( 'Location: \main-page.php?user='.$_POST['user_username']);
    }
    else {
        header( 'Location: \index.html');
    }
?>