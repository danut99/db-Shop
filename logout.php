<?php
require_once "functii/magazin.php";
session_start();
$obj=new magazin();
$utilizator_id= $_SESSION['loggedin'];
 $obj->delAllCos($utilizator_id);
session_destroy();
// Redirectare paginaprincipala produse:
header('Location: login.html');
?>