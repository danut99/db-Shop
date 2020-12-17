<?php
session_start();
include_once "functii/functii.php";

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
    

$obj=new functii;

if(isset($_REQUEST['del_id'])){
	if($obj->deleteData($_REQUEST['del_id'],"comenzi")){
				echo"Your Data Successfully Deleted";
			}
}
?>
<div class="container">
	<div class="btn-group">
		</div>
		<h3 >All The Data from Comenzi</h3>
		<table width="750" border="1" class="table-striped">
			<tr class="success">
                <th scope="col">id</th>
                <th scope="col">id_utilizator</th>
                <th scope="col">nume</th>
                <th scope="col">prenume</th>
                <th scope="col">tara</th>
                <th scope="col">judet</th>
                <th scope="col">oras</th>
                <th scope="col">strada</th>
                <th scope="col">numar</th>
                <th scope="col">total plata</th>
                <th scope="col">action</th>
                
			</tr>
<?php
foreach($obj->showData("comenzi") as $value){
extract($value);
echo <<<show
<tr class="success">
<td>$id</td>
<td>$id_utilizator</td>
<td>$nume</td>
<td>$prenume</td>
<td>$tara</td>
<td>$judet</td>
<td>$oras</td>
<td>$strada</td>
<td>$numarul</td>
<td>$total</td>
<td>
<button class="btn"><a href="vizualizarecomenzi.php?del_id=$id">Delete</a></button></td>
</tr>
show;
}
?>
 <tr class="success">
  	<th scope="col" colspan="11" align="right">
  		<div class="btn-group">
  			<button class="btn"><a href="index.php">Go back Admin Panel </a></button>
  		</div>
  	</th>
  </tr>
</table>
</div>
<body>
	
</body>
</html>