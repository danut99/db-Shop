<?php
session_start();
// informatii conectare.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'db-shop';
// Încercați să vă conectați folosind informațiile de mai sus.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,
$DATABASE_NAME);
if ( mysqli_connect_errno() ) {
// Dacă există o eroare la conexiune, opriți scriptul și afișați eroarea.
exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Acum verificăm dacă datele din formularul de autentificare au fost trimise, isset () va verifica dacă datele există.
if ( !isset($_POST['nume_admin'], $_POST['parola']) ) {
// Nu s-au putut obține datele care ar fi trebuit trimise.
exit('Completati username si password !');
}
// Pregătiți SQL-ul nostru, pregătirea instrucțiunii SQL va împiedica injecția SQL.
if ($stmt = $con->prepare('SELECT ID, parola FROM admini WHERE nume_admin = ?')) {
// Parametrii de legare (s = șir, i = int, b = blob etc.), în cazul nostru numele de utilizator este un șir,
//așa că vom folosi „s”
$stmt->bind_param('s', $_POST['nume_admin']);
$stmt->execute();
// Stocați rezultatul astfel încât să putem verifica dacă contul există în baza de date.
$stmt->store_result();
if ($stmt->num_rows > 0) {
$stmt->bind_result($id, $parola);
$stmt->fetch();
// Contul există, acum verificăm parola.
// Notă: nu uitați să utilizați password_hash în fișierul de înregistrare pentru a stoca parolele hash.

// Verification success! User has loggedin!
// Creați sesiuni, astfel încât să știm că utilizatorul este conectat, acestea acționează practic ca cookie-
//uri, dar rețin datele de pe server.
session_regenerate_id();
$_SESSION['admin'] = TRUE;
$_SESSION['nume'] = $_POST['nume_admin'];
$_SESSION['ID'] = $id;
echo 'Welcome ' . $_SESSION['nume'] . '!';
header('Location:index.php');

// password incorrect



$stmt->close();
}
}
?>
