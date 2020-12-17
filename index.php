<?php
session_start();
require_once "functii/magazin.php";
require_once "functii/categorii.php";
?>
<HTML>
<HEAD>
<TITLE>Creare cos cumparaturi </TITLE>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</HEAD>
<BODY>
<div id="product-grid">
 <div class="txt-heading"><div class="txt-heading-label">Magazin</div> <div class="txt-heading-label"> <a href="Cos.php"> Cosul meu </a></div> <div class="txt-heading-label"> <a href="index.php"> All products </a></div><div class="test"> <a href="logout.php">
<?php
if (isset($_SESSION['loggedin'])){
	echo  '     <li><a href="logout.php"> Deconectare </a></li> ';
}
else{
	echo ' <li><a href="login.html" >  Autentificare </a> <a> / </a>  <a href="registration.html" >  Înregistrare</a> </li> ';
}
?> </a></div></div>
<div class="content_wrapper">
	<?php if(!isset($_GET['action'])){ ?>
	  <div class="sidebar">
	    <ul id="cats">		
	  		 <div id="sidebar_title">Categorii</div>
			<?php
		 	$obj=new magazin();
 		 	foreach($obj->getcat() as $cos) {

 			 $nume_categorie= $cos['nume_categorie'];
        	 echo "<li><a href='index.php?cat=$nume_categorie'>$nume_categorie</a></li>";
        	 
        	}
      
         	?>
	 	</ul>
<?php get_pro_by_cat_id();?>
	</div>
</div>
 <?php
$magazin = new magazin();
 $query = "SELECT * FROM produse";
 $produse = $magazin->getAllProduct($query);
 if (! empty($produse)) {
 foreach ($produse as $produs ) {
 ?>
 <div class="product-item">
 <form method="post" action="cos.php?action=add&cod=<?php echo
$produs["cod"]; ?>">
 <div class="product-image">
 <img width='130' height='130'  src="produse/<?php echo $produs["imagine"]; ?> ">
 </div>
 <div>
 <strong><?php echo $produs["nume"]; ?></strong>
 </div>
 <div class="product-price"><?php echo "$".$produs["pret"]; ?></div>
 <div>
 <input type="text" name="cantitate" value="1" size="2" />
 <br>
  <br>
 <a class="btnAddAction" href='detalii.php?id=<?php echo $produs["id"] ?> '  >Detalii</a>
 <br>
   <br>
 <input name="cart-btn" type="submit" value="Add to cart" class="btnAddAction" />
 </div>
 </form>
 </div>
 <?php
 }}}
 ?>
</div>
</BODY>
</HTML>
<style >


.txt-heading {
	margin-bottom: 10px;
	text-align: left;
    border-bottom: #609edc 5px solid;
}
.txt-heading-label {
	display: inline-block;
    background: #97c0ea;
    padding: 10px 10px 6px 10px;
    color: #5a5a5a;
}
#sidebar_title{
	color:black;
	font-weight: bold;

}
a{
	text-decoration:none;
	color: black;
		font-weight: bold;
}

#cats {
	padding-top:200px;
	list-style-type: none;
	display: inline;
	float:left;
	text-decoration: none
}
#cats li{
	font-weight: bold;
	margin: 20px 10px;
	padding: 2px;
	border: #CCC 1px solid;
	background-color: grey;
}
#cats li a{
	text-decoration:none;
	color: black;
}



#product-grid {
	margin-bottom: 30px;
	text-align: center;
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
	width: 150px;

}

.btnAddAction {
	background-color: #eb9e4f;
	border: 0;
	padding: 3px 10px;
	color: #3e3e3e;
	margin-left: 2px;
	border-radius: 2px;
	cursor:pointer;
}
.test {
	display: inline-block;
    background: orange;
    padding: 10px 10px 6px 10px;
	float:right;

    

}
.test a{
	color: red;
text-decoration:none;
	font-weight: bold;
float:right;

}
</style>