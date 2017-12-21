<?php

require_once("../../Autoloader.php");
Autoloader::register();

class queryTry {
  private $query = "";
  private $co = "";
  private $exec = "";
  private $res = "";

  public function __construct($query = ""){
    $this->query = $query;
  }
  
  public function execute(){
      try {
          $this->co = DBconnection::getInstance();
          $this->exec = $this->co->pdo->query($this->query);
          if ($this->exec === false){
              throw new exception("Bad request");
          }
          if (preg_match("/^SELECT/", $this->query) && $this->exec->rowCount()){
              $this->res = $this->exec->fetchAll();
          }
          else if (preg_match("/^SELECT/", $this->query) && !$this->exec->rowCount()){
              $this->res = "Aucun résultat pour $this->query";
          }
          else {
              $msg = $this->exec->rowCount();
              header("Location: ../view/console_SQL.php?msg=il y a $msg lignes qui ont ete traitees");
          }
          $msg = $this->exec->rowCount();
          header("Location: ../view/console_SQL.php?msg=requete effectuee avec succes, $msg donnees trouvees");
      }
      catch(Exception $e) {
          $msg = $e->getMessage();
          header("Location: ../view/console_SQL.php?error=$msg");
      }
  }
}
?>
