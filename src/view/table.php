<!DOCTYPE html>
<html>
  <head>
    <?php
			if (session_status() != PHP_SESSION_DISABLED)
				session_start();
			if (!isset($_SESSION["user"]))
				header("Location: index.php");
			error_reporting(E_ALL | E_STRICT);
			ini_set("display_errors", 1);
			require_once("header.php");
			require_once("../../Autoloader.php");
			require_once("../models/forms/formSQLConsole.php");
			Autoloader::register();
			$dbs = Database::getAllDBs();
		?>
    <meta charset="utf-8">
    <title>Table view</title>
  </head>
  <body>
    <?php require_once('../models/nav/nav.php'); ?>
		<div class="row">
      <div class="col s6 m6 offset-m3 l4 offset-l2 z-depth-6 card-panel white">
				<h5>Créer une table</h5>
				<form class="col s12" action="../controllers/table.php" method="POST">
					<div class="row">
						<div class="input-field col s6">
							<input type="text" name="name" id="name" required>
							<label for="name">Nom de la DB</label>
						</div>
					</div>
          <div class="row">
						<div class="input-field col s6">
							<input type="text" name="name" id="name" required>
							<label for="name">Nom de la tale</label>
						</div>
					</div>
					<div class="row">
						<button class='col m4 s8 btn waves-effect waves-light cyan darken-1' type='submit' name='action'>
							Créer
							<i class='material-icons right'>send</i>
						</button>
					</div>
				</form>
			</div>
    </div>
  </body>
</html>
