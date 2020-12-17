<?php

session_start();
if(!isset($_SESSION['admin'])){

 echo "<script>window.open('login.html','_self')</script>";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Show Table</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<?php
    
	include_once "functii/functii.php";
$obj=new functii;
if(isset($_REQUEST['status'])){
	echo"Your Data Successfully Updated";
}
if(isset($_REQUEST['status_insert'])){
	echo"Your Data Successfully Inserted";
}
if(isset($_REQUEST['del_id'])){
	if($obj->deleteData($_REQUEST['del_id'],"produse")){
				echo"Your Data Successfully Deleted";
			}
}
?>
<div class="container">
	<div class="btn-group">
		</div>
		<h3 >All The Data from products</h3>
		<table width="750" border="1" class="table-striped">
			<tr class="success">
				<th scope="col">Name</th>
				<th scope="col">Category</th>
				<th scope="col">code</th>
				<th scope="col">image</th>
				<th scope="col">price</th>
				<th scope="col">Action</th>
			</tr>
<?php
foreach($obj->showData("produse") as $value){
extract($value);
echo <<<show
<tr class="success">
<td>$nume</td>
<td>$nume_categorie</td>
<td>$cod</td>
<td><img src="imagini/$imagine" width='130' height='130' ></td>
<td>$pret</td>
<td><button class="btn"><a href="update.php?id=$id">Update</a></button>&nbsp;&nbsp;
<button class="btn"><a href="Vizualizare.php?del_id=$id">Delete</a></button></td>
</tr>
show;
}
?>
  <tr class="success">
  	<th scope="col" colspan="6" align="right">
  		<div class="btn-group">
  			<button class="btn"><a href="index.php?action=add_pro">Insert </a></button>
  			<button class="btn"><a href="index.php">Go back Admin Panel </a></button>
  		</div>
  	</th>
  </tr>

</table>
</div>
<body>
	
</body>
</html>