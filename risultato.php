<?php
include_once("init.php");
include_once("connessione.php");
$nome = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

if(get_magic_quotes_gpc())
	{
		$nome      = stripslashes($nome);
		$pass     = stripslashes($pass);
		$email = stripslashes($email);
	}

	$nome      = mysql_real_escape_string($nome);
	$pass     = mysql_real_escape_string($pass);
	$email = mysql_real_escape_string($email);   

// imposto ed eseguo la query
$query = "INSERT INTO utenti (nome, cognome, email) VALUES ( '$nome', '$pass', '$email')";
$result = mysql_query($query, $link) ;

echo 'sei registrato, adesso verrai portato alla pagina login';
header("Refresh: 3; url=index.php");
?>