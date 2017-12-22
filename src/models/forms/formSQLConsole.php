<?php
require_once("../../Autoloader.php");

function createSQLConsole($error = ""){
    $textarea = [];
    $textarea['name'] = "console SQL";
    $textarea['type'] = "textarea";
    $textarea['error'] = $error;
    $textarea['placeholder'] = 'taper ici n importe qu elle requête SQL et - si possible - nous l executerons pour vous, en toute simplicité :)';
    $form = new formObject('Console SQL', [0 => $textarea], '../controllers/consoleController.php');
    echo $form->toString();
}

function formSuccess($msg = ""){
    if ($msg == ""){
        return;
    }
    else {
        echo "
            <div class='row'>\n
			<div class='col s1'></div>\n
			<div class='col s10'>\n
				<a href='console_SQL.php'>\n
				<div class='card green darken-2'>\n
					<div class='card-content white-text'>\n
						<span class='card-title'>Succès !!!</span>\n
						<p>$msg</p>\n
					</div>\n
				</div>\n
				</a>\n
			<div class='col s1'></div>\n
		  </div>\n
        ";
    }
}

function formError($msg = ""){
    if ($msg == ""){
        return;
    }
    else {
        echo "
            <div class='row'>\n
			<div class='col s1'></div>\n
			<div class='col s10'>\n
				<a href='console_SQL.php'>\n
				<div class='card red darken-3'>\n
					<div class='card-content white-text'>\n
						<span class='card-title'>Error !!!</span>\n
						<p>$msg</p>\n
					</div>\n
				</div>\n
				</a>\n
			<div class='col s1'></div>\n
		  </div>\n
        ";
    }
}
?>
