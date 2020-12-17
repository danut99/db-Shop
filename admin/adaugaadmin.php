<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Insert Data</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<?php
include_once "functii/functii.php";
		

	$obj=new functii;
  
	if(isset($_REQUEST['insert'])){
		extract($_REQUEST);
		if($obj->adaugaadmin($nume_admin,$parola,"admini")){
			header("location:index.php");
		}
		}

  echo @<<<show
  <div class="container">
  <div class="container">
  <h2>Add Product</h2>
  <h3>Please insert your data</h3>
  <form action="" method="post">
  <table width="400" class="table-borderd">
  <tr>
  <th scope="row">nume</th>
  <td><input type="text" name="nume_admin" value="$nume_admin" ></td>
  </tr>
  <tr>
  <th scope="row">parola</th>
  <td><input type="text" name="parola" value="$parola"></td>
  </tr>
  <tr>
  <th scope="row">&nbsp;</th>
  <td><input type="submit" name="insert" value="Insert" class="btn"></td>
  </tr>
  </table>
  </form>
  </div>
  show;



  if (!isset($_POST['nume_admin'], $_POST['parola'])) {
    // Nu s-au putut obține datele care ar fi trebuit trimise.
    exit('Complare formular registration !');
    }
    // Asigurați-vă că valorile înregistrării trimise nu sunt goale.
    if (empty($_POST['nume_admin']) || empty($_POST['parola'])) {
    // One or more values are empty.
    exit('Completare registration form');
    }
    
    if (preg_match('/[A-Za-z0-9]+/', $_POST['nume_admin']) == 0) {
     exit('Username nu este valid!');
    }
    if (strlen($_POST['parola']) > 20 || strlen($_POST['parola']) < 5) {
    exit('Password trebuie sa fie intre 5 si 20 charactere!');
    }
    // verificam daca contul userului exista.
    if ($stmt = $con->prepare('SELECT id, parola FROM admini WHERE nume_admin = ?')) {
    // hash parola folosind funcția PHP password_hash.
    $stmt->bind_param('s', $_POST['nume_admin']);
    $stmt->execute();
    $stmt->store_result();
    // Memoram rezultatul, astfel încât să putem verifica dacă contul există în baza de date.
    if ($stmt->num_rows > 0) {
    // Username exista
    echo 'Username exists, alegeti altul!';
    } else {
    if ($stmt = $con->prepare('INSERT INTO admini (nume_admin, parola) VALUES
    (?, ?)')) {
    // Nu dorim să expunem parole în baza noastră de date, așa că hash parola și utilizați
    //password_verify atunci când un utilizator se conectează.
    $parola = password_hash($_POST['parola'], PASSWORD_DEFAULT);
    $stmt->bind_param('sss', $_POST['nume_admin'], $parola);
    $stmt->execute();
    echo 'Success inregistrat!';
    header('Location: login.html');
    } else {
    // Ceva nu este în regulă cu declarația sql, verificați pentru a vă asigura că tabelul conturilor
    //există cu toate cele 3 câmpuri.
    echo 'Nu se poate face prepare statement!';
    }
    }
    $stmt->close();
    } else {
    // Ceva nu este în regulă cu declarația sql, verificați pentru a vă asigura că tabelul conturilor
    //există cu toate cele 3 câmpuri.
    echo 'Nu se poate face prepare statement! asdasd';
    }
    $con->close();








?>







  

  </body>
  </html>