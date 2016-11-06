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


function generatelink($file, $username, $media)
{
    $values=findusername($file, $username);
    if ($media=="facebook") {
    $name=$values[2];
    $link= "https://www.facebook.com/".$name;
    } elseif ($media=="instagram") {
    $name=$values[3];
    $link= "https://www.instagram.com/".$name."/";
    } elseif ($media=="twitter") {
    $name=$values[4];
    $link="https://twitter.com/".$name."?lang=en/";
    } elseif ($media=="snapchat") {
    $name=$values[5];
    $link="https://feelinsonice.appspot.com/web/deeplink/snapcode?username=".$name."&size=400&type=PNG";
    } elseif($media=="linkedin") {
    $name=$values[6];
    $link="https://www.linkedin.com/in/".$name;
    }
    $link = 'Location: ' . $link;
    header( $link );
    
}

generatelink($_GET['file'], $_GET['username'], $_GET['media']);

?>