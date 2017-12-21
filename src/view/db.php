<!DOCTYPE html>
<html>
	<head>
		<?php
			if (session_status() != PHP_SESSION_DISABLED)
				session_start();
			if (!isset($_SESSION["login"]))
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
		<title>Database Viewver</title>
	</head>
	<body>
		<?php require_once('../models/nav/nav.php'); ?>
		<div class="row">
			<div class="col s12 m6 offset-m3 l4 offset-l4 z-depth-6 card-panel white">
				<table>
					<thead>
						<tr>
							<th>Base de données</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($dbs as $one) : ?>
						<tr>
							<td>
								<a href="dbCtl.php?db=<?php echo $one ?>">
									<?php echo $one ?>
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
