<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');
?>

<form method="post" action="connexion.php">
<div class="container">
    <div class="row">
    <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Connexion</h2>
        <div class="input-field col s12">
                <input name="email" type="email">
                <label for="zmail">Email</label>
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
                <a href="./inscription.php">Registration</a>
                </p>
        </div>
</div>

<?php
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

require_once('Views/partials/footer.php');
?>
<script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('#connexion').hide();
});
</script>
