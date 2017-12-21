<?php

require_once("../../Autoloader.php");
class queryTry {
  private $query = "";
  private $co = "";
  private $exec = "";
  private $res = "";

  public function __construct($query = ""){
    $this->query = $query;
    $co = DBconnection::getInstance();
    $exec = "";
  }
  
  public function execute(){
      try {
          $this->$exec = $this->co->execute($query);
          if (preg_match("/^SELECT/", $this->query) && $this->exec->rowCount()){
              $this->res = $this->exec->fetchAll();
          }
          else if (preg_match("/^SELECT/", $this->query) && !$this->exec->rowCount()){
              $this->res = "Aucun résultat pour $this->query";
          }
          else {
              header("Location: ../view/console_SQL.php?msg=il y a $this->exec() lignes qui ont ete traitees");
          }
          header("Location: ../view/console_SQL.php?msg=requete effectuee avec succes");
      }
      catch(Exception $e) {
          header("Location: ../view/console_SQL.php?error=$e");
      }
  }
}
?>
