<?php
if (isset($_POST['console_SQL']) && $_POST['console_SQL'] != ''){
  if (!preg_match("/\"/", $_POST['console_SQL'])){
    $sql = $_POST['console_SQL'];
    echo "$sql";
  }
  else {
    header("Location: ../view/console_SQL.php?err=format invalide");
  }
}
else{
  header("Location: ../view/console_SQL.php?err=veuillez remplir le tous les champs");
}

?>
