<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');

user::secureAcces();

echo 'Bievenue dans votre espace ' . $_SESSION ['isConnected']['user_lastname'].' '.$_SESSION ['isConnected']['user_firstname'];

require_once('Views/partials/footer.php');
?>


