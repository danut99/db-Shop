<?php

require_once "functii/baza.php";
class magazin extends DBController {
    function getAllProduct()
 {
 	if(!isset($_GET['cat'])){
 $query = "SELECT * FROM produse";
 $productResult = $this->getDBResult($query);
 return $productResult;
}
}
 
 function getMemberCartItem($id_utilizator)
 {
 $query = "SELECT produse.*, cos.id as cos_id,cos.cantitate FROM produse,cos WHERE
 				 produse.id = cos.produs_id AND cos.id_utilizator = ?";

 $params = array(
 	array(
 	"param_type" => "i",
 	"param_value" => $id_utilizator
 )
 );

 		$cartResult = $this->getDBResult($query, $params);
 		return $cartResult;
 }
 function getProductByCode($product_code)
 {
 	$query = "SELECT * FROM produse WHERE cod=?";

 	$params = array(
 	array(
 	"param_type" => "s",
 	"param_value" => $product_code
 	)
 	);

 
 $productResult = $this->getDBResult($query, $params);
 return $productResult;
 }
 function getCartItemByProduct($produs_id, $id_utilizator)
 {
 $query = "SELECT * FROM cos WHERE produs_id = ? AND id_utilizator = ?";

	$params = array(
	 array(
	 "param_type" => "i",
	 "param_value" => $produs_id
	 ),
	 array(
	 "param_type" => "i",
	 "param_value" => $id_utilizator
	 )
	 );

 $cartResult = $this->getDBResult($query, $params);
 return $cartResult;
 }
 function addToCart($produs_id, $cantitate, $id_utilizator)
 {
 $query = "INSERT INTO cos (produs_id,cantitate,id_utilizator) VALUES (?, ?, ?)";

 $params = array(
 	array(
	 "param_type" => "i",
	 "param_value" => $produs_id
	 ),
	array(
	 "param_type" => "i",
	 "param_value" => $cantitate
	 ),
 	array(
	 "param_type" => "i",
	 "param_value" => $id_utilizator
	 )
 );

 $this->updateDB($query, $params);
 }
 function updateCartQuantity($cantitate, $cos_id)
 {
 $query = "UPDATE cos SET cantitate = ? WHERE id= ?";

 $params = array(
 	array(
	 "param_type" => "i",
	 "param_value" => $cantitate
	 ),
 	array(
	 "param_type" => "i",
	 "param_value" => $cos_id
	 )
 );
 	$this->updateDB($query, $params);
 }
 function deleteCartItem($cos_id)
 {
 $query = "DELETE FROM cos WHERE id = ?";

 $params = array(
 	array(
	 "param_type" => "i",
	 "param_value" => $cos_id
 	)
 	);

 $this->updateDB($query, $params);
 }
 function emptyCart($id_utilizator)
 {
 $query = "DELETE FROM cos WHERE id_utilizator = ?";

 $params = array(
 	array(
	 "param_type" => "i",
	 "param_value" => $id_utilizator
	 )
 );

 $this->updateDB($query, $params);
 }


public function delAllCos($id) {
    $sql = "DELETE FROM cos WHERE id_utilizator = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }



public function addComanda($id_utilizator,$nume,$prenume,$tara, $judet,$oras,$strada,$numarul,$total) {
    $sql = "INSERT INTO comenzi (id_utilizator,nume,prenume,tara,judet,oras,strada,numarul,total) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id_utilizator,$nume,$prenume,$tara, $judet,$oras,$strada,$numarul,$total]);
  }





}

