<?php
require_once("../../Autoloader.php");

function getLoginForm($error = ""){
    $field = [];
    $field['name'] = "login";
    $field['type'] = "text";
    if (isset($_GET['err'])){
      $error = $_GET['err'];
    }
    $filed['error'] = $error;
    $field2 = [];
    $field2['name'] = "password";
    $field2['type'] = "password";
    $form = new formObject("connexion", [O => $filed, 1 => $field2], '../controllers/login.php', "POST");
    echo $form->toString();
}
?>
