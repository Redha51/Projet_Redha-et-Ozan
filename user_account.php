<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');

user::secureAcces();

echo 'Voici votre compte personel ' .$_SESSION['isConnected']['user_firstname'];
var_dump($_SESSION);

?>
<form class='' action="" method="post">
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <div class="row">
                <form class="col m8 offset-m2 s12">
                    <div class="row">
                    <h5 class="center-align">Changer de mot de passe</h5>
                        <div class="input-field col s12">
                            <input type="password" name="OldPassword">
                            <label for="password">Ancien mot de passe</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="password" class="form-input" name="NewPassword">
                            <label for="password">Nouveau mot de passe</label>
                        </div>
                        <div class="input-field col s12">
                          <input type="password" class="form-input" name="NewPassword2"></input>
                          <label for="password">Confirmer nouveau mot de passe</label>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col m12">
                         <p class="right-align"><button class="btn btn-large waves-effect waves-light" name="ConfirmPw" type="submit">
                          Valider</button></p>
                        </div>
                    </div>
                    <h5 class="center-align">Changer votre email</h5>
                        <div class="input-field col s12">
                            <input type="email" name="OldEmail">
                            <label for="email">Ancienne Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="email" class="form-input" name="NewEmail">
                            <label for="email">Nouvel Email</label>
                        </div>
                        <div class="input-field col s12">
                          <input type="email" class="form-input" name="NewEmail2"></input>
                          <label for="email">Confirmer Nouvel Password</label>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col m12">
                         <p class="right-align"><button class="btn btn-large waves-effect waves-light" name="ConfirmMail" type="submit">
                          Valider</button></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- <form class='' action="" method="post">
	    <fieldset>
        <legend>Change Mail</legend>
		<p class="Old Email"><input type="email" name="OldEmail"placeholder="Old Email" required/></p>
        <p class="New Email"><input type="email" name="NewEmail" placeholder="New Email" required/></p>
        <p class="New Email"><input type="email" name="NewEmail2" placeholder="Confirm New Email" required/></p>

    </fieldset>
        <p class="Submit"><input type="submit" name="ConfirmMail" value="Confirm" /></p>
    </form> -->

<?php
    if(isset($_POST['ConfirmPw'])):
        if(empty($_POST['OldPassword']) || empty($_POST['NewPassword'])
        || empty($_POST['NewPassword2'])):
          echo 'Vous avez oublié d\'écrire votre mot de passe et / ou de le confirmer';
        elseif($_POST['NewPassword'] != $_POST['NewPassword2']):
          echo 'Les nouveaux mot de passe ne sont pas indentique';
        elseif(strlen($_POST['NewPassword']) < 6 || strtolower($_POST['NewPassword']) == ($_POST['NewPassword']) 
          || strtoupper($_POST['NewPassword']) == ($_POST['NewPassword'])):
          echo 'Le mot de passe doit avoir au moins 6 caratères, une majuscule,une minuscule !';
        else:
           $user = new User;
           $user->changePassword($_SESSION['isConnected']['user_id'],$_POST['NewPassword'],$_POST['OldPassword']);
        endif;
    endif;

      if(isset($_POST['ConfirmMail'])):
        if(empty($_POST['OldEmail']) || empty($_POST['NewEmail']) || empty($_POST['NewEmail2'])):
          echo 'Vous avez oublié d\'écrire votre email et / ou de le confirmer';
          elseif($_POST['NewEmail'] != $_POST['NewEmail2']):
            echo 'Les nouveaux emails ne sont pas indentique';
            elseif($_POST['OldEmail'] != $_SESSION['isConnected']['user_email']):
              echo 'Votre ancien email est incorrecte';          
        else:
          $user = new User;
          $user->changeEmail($_SESSION['isConnected']['user_id'],$_POST['NewEmail']);
          echo 'Vous avez changé votre email avec succès';
      endif;
    endif;

require_once('Views/partials/footer.php');
?>

