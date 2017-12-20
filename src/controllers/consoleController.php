<?php
if (isset($_POST['console_SQL'])){
  if (!preg_match("/\"/", $_POST['console_SQL'])){
    $sql = $_POST['console_SQL'];
  }
  else {
    header("Location: ../view/index.php?err=format invalide");
  }
}
else{
  header("Location: ../view/index.php?err=veuillez remplir le tous les champs");
}

?>
