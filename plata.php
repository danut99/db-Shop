<?php
require_once "functii/magazin.php";
 
session_start();
// Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_SESSION['loggedin'])) {
header('Location: login.html');
exit;
$utilizator_id= $_SESSION['loggedin'];
}
$obj=new magazin();
    
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




 <?php
        if(isset($_POST['test'])){
            $nume=$_POST['nume'];
            $prenume=$_POST['prenume'];
            $tara=$_POST['tara'];
            $judet=$_POST['judet'];
            $oras=$_POST['oras'];
            $strada=$_POST['strada'];
            $numarul=$_POST['numarul'];
            $card=$_POST['card'];
            $total=$_POST['total'];
           ;

$utilizator_id= $_SESSION['loggedin'];


      $obj->delAllCos($utilizator_id);
    
      $obj->addComanda($utilizator_id,$nume,$prenume,$tara, $judet,$oras,$strada,$numarul,$total);
   
   if($obj){

echo @<<<show
<div> Plata ta a fost realizata.</div>
<div> Multumim ca ati ales DB-SHOP </div>
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align: left;"><strong>Nume Prenume  :</strong> <strong>$nume $prenume</strong>       </th>

</tr>
<tr>
<th style="text-align: left;"><strong>Adresa: </strong><strong>Tara: $tara ,  Judet: $judet ,  Oras: $oras ,  Strada: $strada ,  Numarul: $numarul</strong> </th>
</tr>
<tr>
<th style="text-align: left;"><strong>Id_client: </strong> <strong>$utilizator_id</strong> </th>
</tr>
<tr>
<td align=leftt><strong>Total plata: $total </strong></td>
<td align=right></td>
<td></td>
</form>
</tr>
</tbody>
</table>
show;

   


   }
    

    
    

            
        }
      ?>