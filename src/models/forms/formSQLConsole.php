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
?>
