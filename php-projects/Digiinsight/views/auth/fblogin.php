

<?php
//echo $authUrl;
if(!empty($authUrl)) {
    echo '<a href="'.$authUrl.'"><img src="'.base_url().'_static/assets/img/flogin.png" alt=""/></a>';
}else{
?>
<html>
<title>DigiInsight login via facebook </title>
<head>
<script type="text/javascript">
function loaded()
{
    window.opener.location.reload();
    window.setTimeout(CloseMe, 500);
}

function CloseMe() 
{
    window.close();
}
 </script>
 </head>
<body onLoad="loaded()">
<div class="wrapper">

    <h1>Facebook Profile Details </h1>
    <?php
    echo '<div class="welcome_txt">Welcome <b>'.$userData['first_name'].'</b></div>';
    echo '<div class="fb_box">';
    echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>';
    echo '<p><b>Facebook ID : </b>' . $userData['oauth_uid'].'</p>';
    echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';
    echo '<p><b>Email : </b>' . $userData['email'].'</p>';
    echo '<p><b>Gender : </b>' . $userData['gender'].'</p>';
    echo '<p><b>Locale : </b>' . $userData['locale'].'</p>';
    echo '<p><b>FB Profile Link : </b>' . $userData['profile_url'].'</p>';
    echo '<p><b>You are login with : </b>Facebook</p>';
    echo '<p><b>Logout from <a href="'.base_url().'index.php/user_authentication/logout">Facebook</a></b></p>';
    echo '</div>';
    ?>
</div>
<?php } ?>
</body>
</html>
