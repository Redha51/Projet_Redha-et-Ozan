<nav>
    <div class="nav-wrapper">
      <a href="indexAccount.php" class="brand-logo center">Logo</a>
      <a href="#" class="sidenav-trigger" data-target="mobile-nav">
      <i class="material-icons">menu</i>
      </a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
          <?php
          if ($_SESSION['isConnected']['is_admin'] == '1')
          {
            echo '<li id="admin"><a href="admin.php">Administration</a></li>';
          }
          ?>
            <li id="operation"><a href="dashboard.php">Mes operations</a></li>
            <li><a href="user_account.php">Mon compte</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
          </ul>
        </div>
    </div>
</nav>
<ul class="sidenav" id="mobile-nav">
  <li id="accueil"><a href="index_account.php">Accueil</a></li>
  <li id="moncompte"><a href="user_account.php">Mon compte</a></li>
  <li id="operation"><a href="dashboard.php">Mes operations</a></li>
  <?php
  if ($_SESSION['isConnected']['is_admin'] == '1')
  {
     echo '<li id="admin"><a href="admin.php">Administration</a></li>';
  }
  ?>
  <li id="deco"><a href="logout.php">Déconnexion</a></li>
</ul>