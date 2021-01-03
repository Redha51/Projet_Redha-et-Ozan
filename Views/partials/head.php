<?php
require_once('libraries/Models/CoreModel.php');
require_once('libraries/Models/UserModel.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?=$pageTitle?></title>
    <link rel="stylesheet" href="/Projet_Redha/css/style.css" type="text/css">
    <link rel="stylesheet" href="/Projet_Redha/css/materialize.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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