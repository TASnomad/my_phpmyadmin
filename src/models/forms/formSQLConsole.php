<?php 
require_once("../../Autoloader.php");

function createSQLConsole(){
    $textarea = [];
    $textarea['name'] = "console SQL";
    $textarea['type'] = "textarea";
    $textarea['placeholder'] = 'taper ici n importe qu elle requête SQL et - si possible - nous l executerons pour vous, en toute simplicité :)';
    $form = new formObject('Console SQL', [0 => $textarea], '../controllers/form/consoleSQL.php');
    echo $form->toString();
}
?>