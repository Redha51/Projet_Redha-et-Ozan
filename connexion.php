<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/Models/CoreModels.php');
require_once('libraries/Models/UserModel.php');


?>

<form method="post" action="connexion.php">
<fieldset>
<legend>Connexion</legend>
<p>
<label for="email">Mail :</label><input name="email" type="text" id="email" /><br />
<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
</p>
</fieldset>
<p><input type="submit" value="Connexion" /></p></form>
<a href="./inscription.php">Registration</a>

<?php
if(isset($_POST['email']) && isset($_POST['password'])):
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $email = $user->getEmail();
        $password = $user->getPassword();
        $user->connexion($email, $password);
        header('location:index.php');

            
endif;
?>
