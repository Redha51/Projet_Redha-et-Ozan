<?php
require_once('Views/partials/head.php');
require_once('libraries/Models/CoreModels.php');
require_once('libraries/Models/UserModel.php');
?>

<form method="post" action="">
<fieldset>
<legend>Registration</legend>
<p>
<label for="Lastname">Lastname :</label><input name="lastname" type="text" id="lastname" required/><br />
<label for="Firstname">Firstname :</label><input name="firstname" type="text" id="firstname" required/><br />
<label for="Birhday">Birthday :</label><input name="birthday" type="date" id="birthday" required/><br />
<label for="Email">Mail :</label><input name="email" type="text" id="email" /><br required/>
<label for="Password">Mot de Passe :</label><input type="password" name="password" id="password" required/>
</p>
</fieldset>
<p><input type="submit" value="Sign in" /></p></form>

<?php
if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthday'])
   && isset($_POST['email']) && isset($_POST['password']) ):
    $user = new User();
    $user->setLastName($_POST['lastname']);
    $user->setFirstName($_POST['firstname']);
    $user->setBirthday($_POST['birthday']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->register();
    echo "Vous avez été enregistré !";
endif;
?>
    
</div>