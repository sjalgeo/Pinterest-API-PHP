<?php
    require "vendor/autoload.php";

    use DirkGroenen\Pinterest\Pinterest;

    $pinterest = new Pinterest(CLIENT_ID, CLIENT_SECRET);

    $loginurl = $pinterest->auth->getLoginUrl("https://bitlabs.nl/callback.php");
?>
<!DOCTYPE html>
<html>

    <head>

    </head>

    <body>
        
    </body>

</html>