<?php

session_start();
include_once "functii/functii.php";

if(!isset($_SESSION['admin'])){

 echo "<script>window.open('login.html','_self')</script>";

}

?>



<!DOCTYPE html><!-- HTML5 Declaration -->

<html>
<head>
<title>Web Developer</title>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<style type="text/css">
header{
  height:40px;
  background:rgba(250, 250, 250,0.7);
  border:0.01px solid rgba(235, 235, 235,0.9);
  padding:15px;
}
.navbar-header{
  width:40%;
  float:left;
}
a.admin_name{
  text-decoration:none;
  color:red;
}
.navbar-right-header{
  width:60%;
  float:left;
}
.navbar-right-header ul{
  list-style:none;
  cursor:pointer;
  margin:0 15px;
}
ul.dropdown-navbar-right{
  float:right;
  width:auto;
  position:relative;
}

ul.dropdown-navbar-right ul li{
  padding:5px 15px;
}


.body_container{
 width:100%;
 clear:both;
}
.left_sidebar{
 width:25%;
 float:left;
 background:rgba(250, 250, 250,0.7);
 box-shadow: 0 1px 4px 0 rgba(0,0,0,0.2), 0 2px 10px 0 rgba(0,0,0,0.19);
}
.left_sidebar_box{
 padding-bottom:55px;
}

.content{
 width:75%;
 float:left;
}
.content_box{
 padding:15px;
}
/* Left Sidebar Here */
.left_sidebar_box ul{
  position:relative;
  display:block;
  width:auto;
}
.left_sidebar_box ul li{
  line-height:40px;
  position:relative;
}
.arrow{
  position:absolute;
  top:13px;
  right:1px;
  padding:0 10px 0 3px;
}
.left_sidebar_box ul a{
  padding:5px 15px;
  color:black;
  text-decoration:none;
  font-weight:bold;
}
.left_sidebar_box ul li:hover{
  background:rgba(0,0,0,0.07);
}
.left_sidebar_box ul ul li{
  position:relative;
}
.left_sidebar_box ul ul li:hover{
  background:rgba(0,0,0,0.03);
}
.left_sidebar_box ul ul li a{
  margin-left:20px;
}
/* Left Sidebar Ends */
</style>
<body>
 <div class="container">
   <div class="header">
     <div class="navbar-header">
	  <h3><a class="admin_name">Welcome - <?php echo $_SESSION['nume']; ?></a></h3>
	 </div><!-- /.navbar-header -->
	 
	 <div class="navbar-right-header">
	 
	 <ul class="dropdown-navbar-right">
	   <li>
	    
		 <ul class="subnavbar-right">
		   <li> <i class="fa fa-user"></i>  <a    href="logout.php">Logout</a></li>
		 </ul>
	   </li>
	 </ul>
	 
	 </div><!-- /.navbar-right-header -->
	 
   </div><!-- /.header -->
   
   <div class="body_container">
     <div class="left_sidebar">
	   <div class="left_sidebar_box">
	   
	   <ul class="left_sidebar_first_level">

         <li><a href="../index.php" target="_blank" ><i class="fa fa-home"></i>Magazin</a></li>	   
	     
		 <li>
		  <a href=""><i class="fa fa-product-hunt"></i>&nbsp;produse </a>
		 
		   <ul class="left_sidebar_second_level">
		     <li><a href="index.php?action=add_pro">Adaugare produs</a></li>
			 <li><a href="vizualizare.php">vizualizare produse</a></li>
		   </ul>
		 </li>
		 
		 <li>
		  <a href=""><i class="fa fa-plus"></i>&nbsp;categorii </a>
		 
		   <ul class="left_sidebar_second_level">
		     <li><a href="index.php?action=add_cat">Adaugare categorie</a></li>
			 <li><a href="vizualizarecategorii.php">vizualizare categorii</a></li>
		   </ul>
		 </li>

		 <li>
		  <a href=""><i class="fa fa-first-order"></i>&nbsp;Comenzi </a>
		 
		   <ul class="left_sidebar_second_level">
			 <li><a href="vizualizarecomenzi.php">vizualizare Comenzi</a></li>
		   </ul>
		 </li>
		 <li>
		  <a href=""><i class="fa fa-user"></i>&nbsp;Utilizatori </a>
		 
		   <ul class="left_sidebar_second_level">
			 <li><a href="vizutilizatori.php">vizualizare utilizatori</a></li>
		   </ul>
		 </li>
		 <li>
		  <a href=""><i class="fa fa-user-secret"></i>&nbsp;Admini </a>
		 
		   <ul class="left_sidebar_second_level">
			 <li><a href="index.php?action=add_admin">Adauga admini</a></li>
		   </ul>
		 </li>
		

		 </ul>
	   </div>
	   
	 </div>
	 
	 <div class="content">
	   <div class="content_box">
	   <?php 
	   if(isset($_GET['action'])){
	    $action = $_GET['action'];
	   }else{
	    $action ='';
	   }
	   
	   switch($action){
	    case 'add_pro';
		include 'insert.php';
		break;
		
		case 'edit_pro';
		include 'update.php';
		break;
		
		case 'add_cat';
		include 'adaugarecategorie.php';
		break;
		case 'add_admin';
		include 'adaugaadmin.php';
		break;
		
		
		
	   }
	   
	   ?>
	   </div><!-- /.content_box -->
	   
	 </div><!-- /.content -->
	 
   </div><!-- /.body_container -->
   
 </div><!-- /.container -->
 
</body>

</html>







