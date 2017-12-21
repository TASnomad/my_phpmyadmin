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

			if (!isset($_GET["db"]))
				header("Location: db.php");
			$db = new Database($_GET["db"]);
			$tables = $db->getTablesNames();
			var_dump($tables);
		?>
		<meta charset="utf-8">
		<title>BDD: <?php echo $_GET["db"] ?></title>
	</head>
	<body>
		<?php require_once('../models/nav/nav.php'); ?>
		<div class="row">
			<form class="col s12 offset-s3" action="../controllers/db.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="name" id="name" required>
						<input type="hidden" name="oldName" value="<?php echo $_GET['db']; ?>">
						<label for="name">Nouveau nom de la DB</label>
					</div>
				</div>
				<div class="row">
					<button class='col s1 offset-s2 btn waves-effect waves-light cyan darken-1' type='submit' name='rename'>
						Renommer
						<i class='material-icons right'>send</i>
					</button>
				</div>
			</form>
		</div>
		<div class="row">
			<?php if(empty($tables)) : ?>
				<h5 class="center-align col s6 offset-s3 amber lighten-1 card-panel">
					Aucunes tables pour la Base de données: <?php echo $_GET["db"]; ?>
				</h5>

			<?php else : ?>
				<h5 class="center-align col s6 offset-s3 white card-panel">
					<?php echo count($tables)." tables dans ".$_GET['db']; ?>
				</h5>
				<div class="col s6 offset-s3 z-depth-6 card-panel white">
				<?php foreach($tables as $one) : ?>
					<h5 class="center-align"><?php echo $one; ?></h5>
				<?php endforeach; ?>
				</div>

			<?php endif; ?>

		</div>
	</body>
</html>
