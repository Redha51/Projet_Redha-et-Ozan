<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');

// user::secureAcces();

var_dump($_SESSION['isConnected']['user_id']);
var_dump($_SESSION['isConnected']['user_lastname']);

require_once('Views/partials/footer.php');

?>

