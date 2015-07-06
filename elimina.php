<?php
//prelevo il codice id da eliminare
$id = $_GET['id'];
// mi connetto al MySql Server
$link = mysql_connect('localhost', 'marcowebwork', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());}

// seleziono il database 
mysql_select_db('my_marcowebwork', $link);


$query = "DELETE FROM utenti WHERE id=$id";
 $ris = mysql_query($query, $link);
     echo 'utente eliminato, torna indietro';
     header("Refresh: 4; url=lista_utenti.php");
?>