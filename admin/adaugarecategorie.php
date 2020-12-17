
<?php
include_once "functii/functii.php";

if(!isset($_SESSION['admin'])){

 echo "<script>window.open('login.html','_self')</script>";

}

?>


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
		

	$obj=new functii;
	if(isset($_REQUEST['insert'])){
		extract($_REQUEST);
		if($obj->addCategorii($nume_categorie,"categorii")){
			header("location:vizualizarecategorii.php");
		}
		}

  echo @<<<show
  <div class="container">
  <div class="container">
  <div class="btn-group">
  
  </div>
  <h2>Add Category</h2>
  <h3>Please insert your data</h3>
  <form action="adaugarecategorie.php" method="post">
  <table width="400" class="table-borderd">
  <tr>
  <th scope="row">Id</th>
  <td><input type="text" name="id" value="$id" readonly="readonly"></td>
  </tr>
  <tr>
  <th scope="row">Name</th>
  <td><input type="text" name="nume_categorie" value="$nume_categorie"></td>
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