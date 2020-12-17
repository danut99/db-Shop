<?php
require_once "functii/magazin.php";
session_start();
// Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_SESSION['loggedin'])) {
header('Location: login.html');
exit;
}
// pt membrii inregistrati
$id_utilizator=$_SESSION['loggedin'];
$magazin = new magazin();
if (! empty($_GET["action"])) {
 switch ($_GET["action"]) {
 case "add":
 if (! empty($_POST["cantitate"])) {

 $produs = $magazin->getProductByCode($_GET["cod"]);
 $rezshop = $magazin->getCartItemByProduct($produs[0]["id"], $id_utilizator);

 if (! empty($rezshop)) {
 // Modificare cantitate in cos
 $cantitatenoua = $rezshop[0]["cantitate"] + $_POST["cantitate"];
 $magazin->updateCartQuantity($cantitatenoua, $rezshop[0]["id"]);
 } else {
 // Adaugare in tabelul cos
 $magazin->addToCart($produs[0]["id"], $_POST["cantitate"], $id_utilizator);
 }
 }
 break;
 case "remove":
 // Sterg o sg inregistrare
 $magazin->deleteCartItem($_GET["id"]);
 break;
 case "empty":
 // Sterg cosul
 $magazin->emptyCart($id_utilizator);
 break;
 }
}
?>
<HTML>


<style >

#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;
}

#shopping-cart table td {
	background-color: #FFFFFF;
}
.txt-heading {
	margin-bottom: 10px;
	text-align: left;
    border-bottom: #609edc 5px solid;
}
.txt-heading img {
	float:right;

}
.txt-heading-label {
	display: inline-block;
    background: #97c0ea;
    padding: 10px 10px 6px 10px;
    color: #5a5a5a;

}
.test {
	display: inline-block;
    background: orange;
    padding: 10px 10px 6px 10px;
    

}
.test a{
	color: red;
text-decoration:none;
	font-weight: bold;

}
#sidebar_title{
	color:black;
	font-weight: bold;

}
.txt-heading-label a{
	text-decoration:none;
	color: black;
		font-weight: bold;
}


</style>





<HEAD>
<TITLE>creare cos permanent in PHP</TITLE>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

</HEAD>
<BODY>
 <div id="shopping-cart">
 
<div class="txt-heading"><div class="txt-heading-label">Cosul meu</div> <div class="txt-heading-label"> <a href="index.php"> Magazin Produse </a></div> <div class="test"> <a href="logout.php"> Delogheaza-ma </a></div> <a id="btnEmpty"
href="cos.php?action=empty"><img src="produse/empty-cart.png" alt="empty-cart" title="Empty Cart" /></a></div>

<?php
$cartItem = $magazin->getMemberCartItem($id_utilizator);
if (! empty($cartItem)) {
 $item_total = 0;

 ?>
<table cellpadding="10" cellspacing="1">
 <tbody>
 <tr>
 <th style="text-align: left;"><strong>Name</strong></th>
  <th style="text-align: left;"><strong>Image</strong></th>
 <th style="text-align: left;"><strong>Code</strong></th>
 <th style="text-align: right;"><strong>Quantity</strong></th>
 <th style="text-align: right;"><strong>Price</strong></th>
 <th style="text-align: center;"><strong>Action</strong></th>
 </tr>
 <?php
 foreach ($cartItem as $item) {
 ?>

<tr>
 <td
 style="text-align: left; border-bottom: black 1px solid;"><strong><?php echo
$item["nume"]; ?></strong></td>


<td
 style="text-align: left; border-bottom: black 1px solid;">        <strong><img width='130' height='130' src="produse/<?php echo  $item["imagine"]; ?>"></strong></td>







 <td
 style="text-align: left; border-bottom: black 1px solid;"><?php echo $item["cod"];
?></td>
 <td
 style="text-align: right; border-bottom: black 1px solid;"><?php echo
$item["cantitate"]; ?></td>
 <td
 style="text-align: right; border-bottom: black 1px solid;"><?php echo
"$".$item["pret"]; ?></td>
 <td
 style="text-align: center; border-bottom: black 1px solid;"><a
 href="cos.php?action=remove&id=<?php echo $item["cos_id"]; ?>"
 class="btnRemoveAction">Sterge produs</a></td>
 </tr>
<?php
 $item_total += ($item["pret"] * $item["cantitate"]);
 }
 ?>
<tr>
 <td colspan="3" align=right><strong>Total:</strong></td>
 <td align=right><?php echo "$".$item_total; ?></td>
 <td></td>
 <td> <form method="post" action="chech.php">
 	  <input type="hidden" name="total" value="<?php echo $item_total ?>" >
      <input name="send"  type="submit" value="plateste" class="btnAddAction" />
      </form>
 </tr>
 </tbody>
 </table>
 <?php
}
?>
</div>
<div><a href="index.php">Alegeti alt produs</a></div>
<?php //require_once "product-list.php"; ?>

</BODY>







</HTML>