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
		if($obj->insertData($nume,$cod,$imagine,$pret,$nume_categorie,$detalii_produs,"produse")){
			header("location:vizualizare.php");
		}
		}

  echo @<<<show
  <div class="container">
  <div class="container">
  <h2>Add Product</h2>
  <h3>Please insert your data</h3>
  <form action="insert.php" method="post">
  <table width="400" class="table-borderd">
  <tr>
  <th scope="row">Id</th>
  <td><input type="text" name="id" value="$id" readonly="readonly"></td>
  </tr>
  <tr>
  <th scope="row">Name</th>
  <td><input type="text" name="nume" value="$nume"></td>
  </tr>
  <tr>
  <th scope="row">Category</th>
  <td><select id="select" name="nume_categorie" value="$nume_categorie">
  show;
  $cat=new functii();
  foreach($obj->showData("categorii") as $value){
  extract($value);
 
  echo @<<<show
  <option value="$nume_categorie" name="nume_categorie" > $nume_categorie </option>
 
  show;
  }

  echo @<<<show
  </select>
  </td>
  </tr>
  <tr>
  <th scope="row">code</th>
  <td><input type="text" name="cod" value="$cod"></td>
  </tr>
  <tr>
  <th scope="row">image</th>
  <td><input type="file" name="imagine" value="$imagine"></td>
  </tr>
  <tr>
  <th scope="row">price</th>
  <td><input type="text" name="pret" value="$pret"></td>
  </tr>
  <tr>
  <th scope="row">detalii</th>
  <td>
  <textarea name="detalii_produs" value="$detalii_produs" rows="10" cols="50"></textarea> </td
  </tr>
  <tr>
  <th scope="row">&nbsp;</th>
  <td><input type="submit" name="insert" value="Insert" class="btn"></td>
  </tr>
  </table>
  </form>
  </div>
  show;
?>







  

  </body>
  </html>