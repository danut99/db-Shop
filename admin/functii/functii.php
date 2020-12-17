<?php
class functii{
	private $host="localhost";
	private $user="root";
	private $db="db-shop";
	private $pass="";
	private $conn;

public function __construct(){
	$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
}
public function showData($table){
	$sql="SELECT * FROM $table";$q = $this->conn->query($sql) or die("failed!");
	while($r = $q->fetch(PDO::FETCH_ASSOC)){ //Funcția fetch_assoc () / mysqli_fetch_assoc () preia un rând de rezultate ca o matrice asociativă.
		$data[]=$r;
	}
	return $data;
}
public function getById($id,$table){

$sql="SELECT * FROM $table WHERE id = :id";
$q = $this->conn->prepare($sql);
$q->execute(array(':id'=>$id));
$data = $q->fetch(PDO::FETCH_ASSOC);
return $data;
}


public function update($id,$nume,$cod,$imagine,$pret,$nume_categorie,$detalii_produs,$table){
	$sql = "UPDATE $table SET nume=:nume,cod=:cod,imagine=:imagine,pret=:pret,nume_categorie=:nume_categorie,detalii_produs=:detalii_produs WHERE id=:id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':id'=>$id,':nume'=>$nume,':cod'=>$cod,':imagine'=>$imagine,':pret'=>$pret,':nume_categorie'=>$nume_categorie,':detalii_produs'=>$detalii_produs));
	return true;
	}
	public function insertData($nume,$cod,$imagine,$pret,$nume_categorie,$detalii_produs,$table){
	$sql = "INSERT INTO $table SET nume=:nume,cod=:cod,imagine=:imagine,pret=:pret,nume_categorie=:nume_categorie,detalii_produs=:detalii_produs";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':nume'=>$nume,':cod'=>$cod,':imagine'=>$imagine,':pret'=>$pret,':nume_categorie'=>$nume_categorie,':detalii_produs'=>$detalii_produs));
		return true;
	}

	public function deleteData($id,$table){
	$sql="DELETE FROM $table WHERE id=:id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':id'=>$id));
	return true;
	}	


	public function addCategorii($nume_categorie,$table){
	$sql = "INSERT INTO $table SET nume_categorie=:nume_categorie";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':nume_categorie'=>$nume_categorie));
		return true;
	}		

	function getcat($table,$nume_categorie)
 {
 	$sql = "SELECT * FROM $table WHERE nume_categorie=?";

 	$q = $this->conn->query($sql) or die("failed!");
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
	}
	return $data;}

	public function adaugaadmin($nume_admin,$parola,$table){
		$sql = "INSERT INTO $table SET nume_admin=:nume_admin,parola=:parola";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':nume_admin'=>$nume_admin,':parola'=>$parola));
			return true;
		}







}