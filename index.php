<?php
session_start();
session_destroy();
require_once('Views/partials/head.php');

echo 'Bienvenue dans le site (page statique)';


require_once('Views/partials/footer.php');
?>