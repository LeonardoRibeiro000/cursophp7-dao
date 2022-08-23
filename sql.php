<?php

class Sql extends PDO {
  private $conn;

  public function __construct() {
    $this->conn = new PDO ("mysql:host=localhost;dbname=dbphp7", "root", "");

  }

  private function setParams($statements, $parameters = array()){
   
    foreach ($parameters as $key => $value) {
      $statment->bindParam($key, $value);
    }
  }

  private function setParam($statment, $key, $value){
    $statment->bindParam($key, $value);
  }


  public function execQuery($rawQuery, $params = array()):array {
    $stmt = $this->conn->prepare($rawQuery);
    $this->setParams($stmt, $params);
    $stmt->execute();
    return $stmt;
  }
  public function select($rawquery, $params = array()){
    $stmt = $this->execQuery($rawQuery, $params);
    return $stmt->fetchAll(PDO:FETCH_ASSOC);

  }


  
}