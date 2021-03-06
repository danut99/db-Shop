<?php

class DBController
{
 private $host = "localhost";
 private $user = "root";
 private $password = "";
 private $database = "db-shop";
 private static $conn;
 function __construct()
 {
 $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
 }
 public static function getConnection()
 {
 if (empty($this->conn)) {
 new Database();
 }
 }
 function getDBResult($query, $params = array())
 {
 $sql_statement = $this->conn->prepare($query);
 if (! empty($params)) {
 $this->bindParams($sql_statement, $params);
 }
 $sql_statement->execute();
 $result = $sql_statement->get_result();

 if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 $resultset[] = $row;
 }
 }

 if (! empty($resultset)) {
 return $resultset;
 }
 }

public function getById($id_utilizator,$table){

$sql="SELECT * FROM $table WHERE id_utilizator = :id_utilizator";
$q = $this->conn->prepare($sql);
$q->execute(array(':id_utilizator'=>$id_utilizator));
$data = $q->fetch(PDO::FETCH_ASSOC);
return $data;
}


 
 function updateDB($query, $params = array())
 {
 $sql_statement = $this->conn->prepare($query);
 if (! empty($params)) {
 $this->bindParams($sql_statement, $params);
 }
 $sql_statement->execute();
 }
 function bindParams($sql_statement, $params)
 {
 $param_type = "";
 foreach ($params as $query_param) {
     $param_type .= $query_param["param_type"];
 }

 $bind_params[] = & $param_type;
 foreach ($params as $k => $query_param) {
 $bind_params[] = & $params[$k]["param_value"];
 }

 call_user_func_array(
 	array($sql_statement,'bind_param'),
 		 $bind_params);
 }

public function connect() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
    $pdo = new PDO($dsn, $this->user, $this->password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }






public function getcat() {
    $sql = "SELECT * FROM categorii ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }



public function getprodcat($categorie) {
    $sql = "SELECT * FROM produse WHERE nume_categorie=$categorie ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$categorie]);

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  


}
