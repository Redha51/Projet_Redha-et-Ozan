<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');
?>
<div class="container">
    <div class="row">
        <div class="col s12">
                <a href="operation.php" id="btnoperation" class="waves-effect waves-light btn" type="btn">Créer une nouvelle opération</a>
        </div>
    </div>
</div>

<?php
require_once('Views/partials/footer.php');
?>