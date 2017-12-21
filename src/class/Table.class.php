<?php

class Table{

  public function createTable($DBname, $Tablename, $oneName, $twoName, $threeType,
                                                   $oneType, $twoName, $threeType) {
    $conn = DBconnection::getInstance();
    $conn->pdo->exec("CREATE TABLE '$DBname' . '$Tablename' ( `$oneName` $oneType NOT NULL ,
                                                              `$twoName` $twoType NOT NULL ,
                                                              `$threeName` $threeType NOT NULL )");
  }
}

?>
