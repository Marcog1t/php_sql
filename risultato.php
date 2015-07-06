<?php
include_once("init.php");
$nome = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

// mi connetto al MySql Server
$link = mysql_connect('localhost', 'marcowebwork', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// seleziono il database 
mysql_select_db('my_marcowebwork', $link);

// imposto ed eseguo la query
$query = "INSERT INTO utenti (nome, cognome, email) VALUES ( '$nome', '$pass', '$email')";
$result = mysql_query($query, $link) ;

echo 'sei registrato, adesso verrai portato alla pagina login';
header("Refresh: 3; url=index.php");
?>