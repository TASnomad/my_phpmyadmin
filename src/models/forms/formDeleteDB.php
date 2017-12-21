<?php
require_once("../../Autoloader.php");

function deleteDB($error = ""){
  $filed = [];
  $field['name'] = "Nom de la base";
  $field['type'] = "text";
  $field['error'] = $error;
  $field['placeholder'] = 'Entrez le nom de la base à supprimer';
  $form = new formObject('Supprimer une base', [0 => $field], '../controllers/.php');
  echo $form->toString();
}
?>
