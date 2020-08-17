<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/Models/CoreModels.php');
require_once('libraries/Models/UserModel.php');
echo 'Bievenue dans votre espace '. $_SESSION ['isConnected']['user_lastname'].' '.$_SESSION ['isConnected']['user_firstname'];
?>