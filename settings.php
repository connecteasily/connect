<!DOCTYPE hml>
<html>
<head>
    <title> Sign Up </title>
    <link rel="stylesheet" type="text/css" href="/css/settings.css"> 
    <link rel="stylesheet" type="text/css" href="/css/common.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"><!-- google font for "connect"-->
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" type="text/css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Raleway:100" type="text/css" rel="stylesheet" >
</head>
<body>
    <header> <h3 id="logo">Connect.</h3>
    <div class="content">
    <form action= <?php $link = "php/savesettings.php?user=" . $_GET['user']; echo $link; ?> method="post">
        
        <!--FACEBOOK PROFILE INPUT-->
        <div>
            <label for="facebook"><b>FACEBOOK:</b></label>
            <span class="username-input">
                <input type="text" id="facebook" name="user_facebook" value="Enter your facebook username here"
                    onfocus="if (this.value == 'Enter your facebook username here') this.value=''"
                    onfocusout="if (this.value =='') this.value='Enter your facebook username here'" />
                <button tabindex="-1" class="delete-username" type="button" 
                        onclick="document.getElementById('facebook').value = 'Enter your facebook username here'">x</button>
            </span>
            <span class="question-mark"><img src="question-mark.png"/><span class="facebook-info"> Your facebook username can be found in the general settings of your facebook profile. 
            For more guidelines, click <a href="https://spryfox.zendesk.com/hc/en-us/articles/218505798-How-do-I-find-my-Facebook-username-"> here</a></span></span>
        </div>
        
        <!--INSTAGRAM PROFILE INPUT-->
        <div>
            <label for="instagram"><b>INSTRAGRAM:</b></label>
            <span class="username-input">
                <input type="text" id="instagram" name="user_instagram" value="Enter your instagram username here"
                        onfocus="if (this.value == 'Enter your instagram username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your instagram username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('instagram').value = 'Enter your instagram username here'">x</button>
            </span>
        </div>
        
        <!--TWITTER PROFILE INPUT-->
       <!-- <div>
            <label for="twitter"><b>TWITTER:</b></label>
            <span class="username-input">
                <input type="text" id="twitter" name="user_twitter" value="Enter your twitter username here"
                        onfocus="if (this.value == 'Enter your twitter username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your twitter username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('twitter').value = 'Enter your twitter username here'">x</button>
            </span>
        </div>-->
        
        <!--SNAPCHAT PROFILE INPUT-->
        <div>
            <label for="snapchat"><b>SNAPCHAT:</b></label>
            <span class="username-input">
                <input type="text" id="snapchat" name="user_snapchat" value="Enter your snapchat username here"
                        onfocus="if (this.value == 'Enter your snapchat username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your snapchat username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('snapchat').value = 'Enter your snapchat username here'">x</button>
            </span>
        </div>
        
        <!--SKYPE PROFILE INPUT-->
        <!--<div>
            <label for="skype"><b>SKYPE:</b></label>
            <span class="username-input">
                <input type="text" id="skype" name="user_skype" value="Enter your Skype username here"
                        onfocus="if (this.value == 'Enter your Skype username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your Skype username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('skype').value = 'Enter your skype username here'">x</button>
            </span>
        </div>-->
        
        <!--LINKEDIN PROFILE INPUT-->
        <div>
            <label for="linkedin"><b>LINKEDIN:</b></label>
            <span class="username-input">
                <input type="text" id="linkedin" name="user_linkedin" value="Enter your linkedin username here"
                        onfocus="if (this.value == 'Enter your linkedin username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your linkedin username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('linkedin').value = 'Enter your linkedin username here'">x</button>
            </span>
        </div>
            
        <!--GITHUB PROFILE INPUT-->
       <!-- <div>
            <label for="github"><b>GITHUB:</b></label>
            <span class="username-input">
                <input type="text" id="github" name="user_github" value="Enter your github username here"
                        onfocus="if (this.value == 'Enter your github username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your github username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('github').value = 'Enter your github username here'">x</button>
            </span>
        </div>-->
            
        <!--QUORA PROFILE INPUT-->
        <!--<div>
            <label for="quora"><b>QUORA:</b></label>
            <span class="username-input">
                <input type="text" id="quora" name="user_quora" value="Enter your Quora username here"
                        onfocus="if (this.value == 'Enter your Quora username here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your Quora username here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('quora').value = 'Enter your quora username here'">x</button>
            </span>      
        </div>-->
        
        <!--GOOGLE PROFILE INPUT-->
       <!-- <div>
            <label for="google"><b>GOOGLE:</b></label>
            <span class="username-input">
                <input type="text" id="google" name="user_google" value="Enter your Google email address here"
                        onfocus="if (this.value == 'Enter your Google email address here') this.value=''"
                        onfocusout="if (this.value =='') this.value='Enter your Google email address here'" />
                <button tabindex="-1" class="delete-username" type="button"
                        onclick="document.getElementById('google').value = 'Enter your google username here'">x</button>
            </span>
        </div>-->
            
        <!--Submit Button-->
        <div>
            <button class="button" type="submit" value="UPDATE" name="cmd"><img class="save-button" src="/img/save.png"></img></button>
        </div>
        <div class="nav">
<a href="index.html"><img src="/img/home-grey.png" id="home"> </a>
<a href="settings.php"> <img src="/img/settings-grey.png" id="settings"></a> 
<a href="logout.html"><img src="/img/sign-out-grey.png" id="sign-out"></a> 
</div>
    </form>
    </div>
   

</body>

</html>