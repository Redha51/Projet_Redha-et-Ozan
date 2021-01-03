<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');
if(isset($_POST['Connexion'])):
        if(isset($_POST['email']) && isset($_POST['password'])):
                $user = new User();
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
                $email = $user->getEmail();
                $password = $user->getPassword();
                $user->connexion($email, $password);           
        endif;
        endif;
// var_dump($_SESSION['newUser']);
if(isset($_SESSION['newUser']) && $_SESSION['newUser'] == true):
        echo '
                <div class="row" id="alert_box">
                        <div class="col s12 m12">
                        <div class="card green darken-1">
                        <div class="row">
                                <div class="col s12 m10">
                                <div class="card-content white-text">
                                <p>Vous avez été enregistré avec succès !</p>
                                <div class="col s10 m2">
                                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>';
endif;
?>
<form method="post" action="">
<div class="container">
    <div class="row">
    <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Connexion</h2>
        <div class="input-field col s12">
                <input name="email" type="email">
                <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
                <input name="password" type="password" class="form-input">
                <label for="password">Password</label>
        </div>
    </div>
    </div>
</div>
<div class="row">
        <div class="col m9 s8">
        <p class="right-align">
                <button class="btn waves-effect waves-light right-align" type="submit" name="Connexion">Connexion
                </button>
        </div>
</div>
<div class="row">
        <div class="col m9 s8">
                <p class="right-align">
                <a href="./inscription.php" class="waves-effect waves-light btn">Registration</a>
                </p>
        </div>
</div>
<?php
require_once('Views/partials/footer.php');
?>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#connexion').hide();
});
</script>
