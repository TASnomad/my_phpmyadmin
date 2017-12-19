<nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href='#'>blog</a></li>
      <?php
      if(isset($_SESSION['identifiant'])){
        echo " <li><a href='gestion'>Gestion</a></li> \n";
        echo " <li><a href='deconnexion'>Déconnexion</a></li> \n";
      }
      else {
        echo " <li><a href='connexion'>Connexion</a> </li>";
      }
          ?>
    </ul>
</nav>