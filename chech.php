<?php

session_start();
// Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_POST['send'])) {
header('Location: login.html');
exit;
}

$total=$_POST['total'];
?>

            
  <form action="plata.php" method="post">
        Nume: <input type="text" name="nume" required><br>
        Prenume: <input type="text" name="prenume" required><br>
        Tara: <input type="text" name="tara" required><br>
        Judet: <input type="text" name="judet" required><br>
        Oras: <input type="text" name="oras" required><br>
        Strada: <input type="text" name="strada" required><br>
        Nr: <input type="text" name="numarul" required><br>
        Nr Card: <input type="text" name="card" required><br>
       
        
        Total plata: <input type="text" name="total" value="<?php echo $total ?>" READONLY><br>
        <input type="submit" name="test" value="Plateste">
        </form>