<?php
require_once("../../Autoloader.php");

function reanameDB($error = ""){
  $filed = [];
  $field['name'] = "Nom de la base";
  $field['type'] = "text";
  $field['error'] = $error;
  $field['placeholder'] = 'Entrez le nom de la base à renommer';

  $filed2 = [];
  $field2['name'] = "Nouveau nom de la base";
  $field2['type'] = "text";
  $field2['placeholder'] = 'Entrez le nouveau nom de la base';
  $form = new formObject('Renommer une base', [0 => $field, 1 => $field2], '../controllers/.php');
  echo $form->toString();
}
?>
