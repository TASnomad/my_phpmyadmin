<?php 
    //demarrage de la session
    if (!isset($_SESSION['user'])){
        session_start();
    }
?>

<nav>
    <div class="nav-wrapper cyan darken-1">
      <div class="row">
        <div class="col s12">
          <a href="index.php" class="brand-logo">DamboBarreauBriand'S PhpMyAdmin</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <?php
          if (isset($_SESSION['user']))
                {
                  echo "
                    <ul id='nav-mobile' class='right hide-on-med-and-down'>\n
                      <li><a href='console_SQL.php'><i class='material-icons left'>computer</i> SQL_Console</a></li>\n
                      <li><a href='datas.sql'><i class='material-icons left'>list</i> Datas</a></li>\n
                    </ul>\n
                    <ul class='side-nav' id='mobile-demo'>\n
                      <li><a href='console_SQL.php'><i class='material-icons left'>computer</i> SQL_Console</a></li>\n
                      <li><a href='datas.php'><i class='material-icons left'>list</i> Datas</a></li>\n
                    </ul>";
                }
          ?>
        </div>
      </div>
    </div>
</nav>
