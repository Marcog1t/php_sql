<?php 
// mi connetto al MySql Server
$link = mysql_connect('localhost', 'marcowebwork', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// seleziono il database 
mysql_select_db('my_marcowebwork', $link);
//carico init
include_once("init.php");   

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$id = $_POST['id'];

$query = "SELECT * FROM utenti";
 $ris = mysql_query($query, $link) or die (mysql_error());
?>