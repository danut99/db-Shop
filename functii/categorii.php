
<?php 

$con = mysqli_connect("localhost","root","","db-shop");

if(mysqli_connect_errno()){
  echo "The Connection was not established: " . mysqli_connect_error();
}

function getCats(){

       global $con;
	   
       $get_cats ="select * from categorii";
		
		$run_cats = mysqli_query($con, $get_cats);
		
		while($row_cats=mysqli_fetch_array($run_cats)){
		   
			$id=$row_cats['id'];
			$nume_categorie = $row_cats['nume_categorie'];
			
			echo "<li><a href='index.php?cat=$nume_categorie'>$nume_categorie</a></li>";
		}
}

function get_pro_by_cat_id(){
    
	global $con;
	
	if(isset($_GET['cat'])){
		$cat_nume = $_GET['cat'];
		
		$get_cat_pro = "select * from produse where nume_categorie='$cat_nume' ";
		
		$run_cat_pro = mysqli_query($con, $get_cat_pro);
		
		$count_cats = mysqli_num_rows($run_cat_pro);
		
		  if($count_cats == 0){
		    echo "<h2 style='padding:20px;'>No products where found in this category!!</h2>";
		  }else {
		  
		  while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
		     $id = $row_cat_pro['id'];
			 
			 $nume = $row_cat_pro['nume'];
			 
			 $cod = $row_cat_pro['cod'];
			 $imagine = $row_cat_pro['imagine'];
		     $pret = $row_cat_pro['pret'];
		     $nume_categorie = $row_cat_pro['nume_categorie'];
		      $detalii_produs = $row_cat_pro['detalii_produs'];
			 
echo @<<<show
<div class="product-item">
<div class="product-item">
<form method="post" action="cos.php?action=add&cod=$cod">
<div class="product-image">
<img width='130' height='130' src="produse/$imagine">
</div>
<strong>  $nume </strong>
<div>
</div>
<div class="product-price">$pret </div>
<div>
<input type="text" name="cantitate" value="1" size="2" />
<br>
<br>
<a class="btnAddAction" href='detalii.php?id=$id'>Detalii</a>
<br>
<br>
<input name="cart-btn" type="submit" value="Add to cart" class="btnAddAction" />


</div>
</tr>
</form>
</div>
</div>
show;
			}
		  }
		}
}

?>










