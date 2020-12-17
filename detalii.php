<?php


require_once "functii/magazin.php";
require_once "functii/categorii.php";
session_start();
// Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_SESSION['loggedin'])) {
header('Location: login.html');
exit;
}

 ?>
 <div class="content_wrapper">
 <div id="sidebar">
 <div class="txt-heading"><div class="txt-heading-label">Magazin</div> <div class="txt-heading-label"> <a href="Cos.php"> Cosul meu </a></div> <div class="txt-heading-label"> <a href="index.php"> All products </a></div></div>
<div id="content_area">
<div id="products_box">
	   
<?php 
if(isset($_GET['id'])){
$id_produs = $_GET['id'];

$run_query_by_pro_id = mysqli_query($con, "select * from produse where id='$id_produs' ");

while($row_pro = mysqli_fetch_array($run_query_by_pro_id)){

  $id = $row_pro['id'];
  $nume = $row_pro['nume'];
  $pret = $row_pro['pret'];
  $detalii_produs = $row_pro['detalii_produs'];
  $imagine = $row_pro['imagine'];
  $cod = $row_pro['cod'];

echo @<<<show
<div class="product-item">
<div class="product-item">
<form method="post" action="cos.php?action=add&cod=$cod">
<div class="product-image">
<img src="produse/$imagine " width='150' height='150'>
</div>
<strong>  $nume </strong>
<div>
</div>
<div class="product-price">$detalii_produs </div>
<div class="product-price">Pret: $pret </div>
<div>
<input type="text" name="cantitate" value="1" size="2" />
<input name="cart-btn" type="submit" value="Add to cart" class="btnAddAction" />
</div>
</tr>
</form>
</div>
show;
 }
}
?>	
</div>
</div>
</div>
<style >

.txt-heading-label {
	display: inline-block;
    background: #97c0ea;
    padding: 10px 10px 6px 10px;
    color: #5a5a5a;
}

#product-grid {
	margin-bottom: 30px;
	text-align: center;
	padding-left: 60px;
}
.product-item {
	display: inline-block;
	background: #ffffff;
	margin: 15px 10px;
	padding: 5px;
	border: #CCC 1px solid;
	border-radius: 4px;
}

.product-item div {
	text-align: center;
	margin: 10px 5px;
	width: 300px;

}
</style>
