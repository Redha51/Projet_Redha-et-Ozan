<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');

$_SESSION["newUser"] = false;
var_dump($_SESSION['newUser']);

if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthday'])
   && isset($_POST['email']) && isset($_POST['password'])):
    $user = new User();
    $user->setLastName($_POST['lastname']);
    $user->setFirstName($_POST['firstname']);
    $user->setBirthday($_POST['birthday']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->register();
    
    var_dump($_POST['birthday']);
endif;
?>

<form method="post" action="#">
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Registration</h2>
            <div class="row">
                <form class="col m8 offset-m2 s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="lastname" type="text"  class="form-input">
                            <label for="lastname">Lastname</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="firstname" type="text" class="form-input">
                            <label for="firstname">Firstname</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="birthday" type="text" class="datepicker">
                            <label for="birthday">Birthday</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="email" type="email" class="form-input">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="password" type="password" class="form-input">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field col s12">
                            <label>
                                <input type="checkbox" id="checkbox" onclick="activation()"/>
                                <span>J'accepte la RGPD</span>
                            </label>
                        </div>
                    </div>
    <div class="row">
        <div class="col m6">
        <p class="right-align"><button id="sendbtn" class="btn waves-effect waves-light right-align" type="submit">Sign in
    </button></p>
        </div>
    </div>
</form>

<?php
require_once('Views/partials/footer.php');
?>