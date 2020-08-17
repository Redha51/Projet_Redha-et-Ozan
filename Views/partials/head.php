<?php
require_once('libraries/Models/CoreModels.php');
require_once('libraries/Models/UserModel.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?=$pageTitle?></title>
    <link rel="stylesheet" href="/Projet_Redha/css/materialize.min.css" type="text/css">
    <script src="/Projet_Redha/js/materialize.min.js"></script>

</head>
<body>
<header>
<?php 
    $user = new User();
    if ($user::isConnected()):
        include('navUserConnected.php');
    else:
        include('navUserNotConnected.php');
    endif
?>
</header>