<!DOCTYPE hml>
<html>
<head>
<title> Connect </title>
<link rel="stylesheet" type="text/css" href="/css/main-page.css"> 
<link rel="stylesheet" type="text/css" href="/css/common.css">
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Roboto:100" type="text/css" rel="stylesheet" >
<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"><!-- google font for "connect"-->
<link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:100" type="text/css" rel="stylesheet" >


</head>
<body>
<header>
    <h3 id="logo">Connect.</h3>
    <a  id="googletonebutton" href="https://chrome.google.com/webstore/detail/google-tone/nnckehldicaciogcbchegobnafnjkcne" class="button">Install Google Tone</a>

</header>


<!-- 1. GOOGLE-SIGN-IN-->


<div class="content">
    <h1><?php echo $_GET['user'];?></h1>
    <div class="icons">
        <ul class='rig'>
            <li>
                <!-- 2. FACEBOOK PROFILE DISPLAY -->
                <span class="badge" id="Facebook"> <a href=<?php $link = "php/generatelinks.php?file=profiles.txt&username=".$_GET['user']."&media=facebook"; echo $link; ?>><img src="/img/facebook.png" class="b"> </a> </span>
                <!-- 3. Instagram badge-->
                <span class="badge" id="Instagram"><a href=<?php $link = "php/generatelinks.php?file=profiles.txt&username=".$_GET['user']."&media=instagram"; echo $link; ?>> <img src="/img/IG.png" class="b"></a></span>
                <!-- 4. Twitter follow button-->
                <span class="badge" id="Twitter"><a href=<?php $link = "php/generatelinks.php?file=profiles.txt&username=".$_GET['user']."&media=twitter"; echo $link; ?>></a></span>
            </li>
            <li>
               
                <!-- SNAPCHAT-->
                <span class="badge" id="Snapchat"><a href=<?php $link = "php/generatelinks.php?file=profiles.txt&username=".$_GET['user']."&media=snapchat"; echo $link; ?>> <img src="/img/snapchat.png" class="b"></a></span>
                <!--LinkedIn-->
                <span class="badge" id="LinkedIn"><a href=<?php $link = "php/generatelinks.php?file=profiles.txt&username=".$_GET['user']."&media=linkedin"; echo $link; ?>><img src="/img/linkedin.png" class="b"></a></span>
            </li>
        </ul>
    </div>
</div>
<div class="nav">
<a href="index.html"><img src="/img/home-grey.png" id="home"> </a>
<a href="settings.php"> <img src="/img/settings-grey.png" id="settings"></a> 
<a href="logout.html"><img src="/img/sign-out-grey.png" id="sign-out"></a>
</div>




</body>
</html>