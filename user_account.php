<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');

user::secureAcces();

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

<?php
    if(isset($_POST['ConfirmPw'])):
        if(empty($_POST['OldPassword']) || empty($_POST['NewPassword'])
        || empty($_POST['NewPassword2'])):
        echo '<div class="row" id="alert_box">
        <div class="col s12 m12">
        <div class="card red darken-1">
        <div class="row">
                <div class="col s12 m10">
                <div class="card-content white-text">
                <p>Veuillez remplir tous les champs !</p>
                <div class="col s10 m2">
                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
        </div>
        </div>
        </div>';
        elseif($_POST['NewPassword'] != $_POST['NewPassword2']):
        echo '<div class="row" id="alert_box">
        <div class="col s12 m12">
        <div class="card red darken-1">
        <div class="row">
                <div class="col s12 m10">
                <div class="card-content white-text">
                <p>Les nouveaux mot de passe ne sont pas indentique !</p>
                <div class="col s10 m2">
                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>';

        elseif(strlen($_POST['NewPassword']) < 6 || strtolower($_POST['NewPassword']) == ($_POST['NewPassword']) 
          || strtoupper($_POST['NewPassword']) == ($_POST['NewPassword'])):
          echo '<div class="row" id="alert_box">
        <div class="col s12 m12">
        <div class="card red darken-1">
        <div class="row">
                <div class="col s12 m10">
                <div class="card-content white-text">
                <p>Le mot de passe doit avoir au moins 6 caratères, une majuscule,une minuscule !</p>
                <div class="col s10 m2">
                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>';
        else:
           $user = new User;
           $user->changePassword($_SESSION['isConnected']['user_id'],$_POST['NewPassword'],$_POST['OldPassword']);
        endif;
    endif;

      if(isset($_POST['ConfirmMail'])):
        if(empty($_POST['OldEmail']) || empty($_POST['NewEmail']) || empty($_POST['NewEmail2'])):
        echo '<div class="row" id="alert_box">
          <div class="col s12 m12">
          <div class="card red darken-1">
          <div class="row">
                  <div class="col s12 m10">
                  <div class="card-content white-text">
                  <p>Veuillez remplir tous les champs</p>
                  <div class="col s10 m2">
                  <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>';

          elseif($_POST['NewEmail'] != $_POST['NewEmail2']):
          echo '<div class="row" id="alert_box">
            <div class="col s12 m12">
            <div class="card red darken-1">
            <div class="row">
                    <div class="col s12 m10">
                    <div class="card-content white-text">
                    <p>Les nouveaux emails ne sont pas indentique !</p>
                    <div class="col s10 m2">
                    <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>';

            elseif($_POST['OldEmail'] != $_SESSION['isConnected']['user_email']):
              echo '<div class="row" id="alert_box">
              <div class="col s12 m12">
              <div class="card red darken-1">
              <div class="row">
                      <div class="col s12 m10">
                      <div class="card-content white-text">
                      <p>Votre ancien email est incorrecte !</p>
                      <div class="col s10 m2">
                      <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>';
        else:
          $user = new User;
          $user->changeEmail($_SESSION['isConnected']['user_id'],$_POST['NewEmail']);
          echo '<div class="row" id="alert_box">
              <div class="col s12 m12">
              <div class="card green darken-1">
              <div class="row">
                      <div class="col s12 m10">
                      <div class="card-content white-text">
                      <p>Vous avez changé votre email avec succès !</p>
                      <div class="col s10 m2">
                      <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>';
      endif;
    endif;

require_once('Views/partials/footer.php');
?>

