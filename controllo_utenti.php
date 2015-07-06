<?php
//inclusione dei file init
include_once("init.php");

//raccolta dei dati provenienti dal login
$nome = $_POST['username'];
$pass = $_POST['password'];

// mi connetto al MySql Server
$link = mysql_connect('localhost', 'marcowebwork', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());}

// seleziono il database 
mysql_select_db('my_marcowebwork', $link);

//query che seleziona i campi nome e cognome
 $query = "SELECT * FROM utenti WHERE nome = '$nome' AND cognome = '$pass' ";
 $ris = mysql_query($query, $link) or die (mysql_error());
 $riga=mysql_fetch_array($ris);  
 
/*Prelevo l'identificativo dell'utente */
$cod=$riga['nome'];
 
// controllo il valore di num/
if ($cod == NULL) $trovato = 0 ;
else $trovato = 1;  
 
// Username e password corrette //
if($trovato == 1) {
    echo 'dati validi, puoi proseguire';
    header("Refresh: 4; url=lista_utenti.php");

    $_SESSION["user"] = $cod;
}
else {
    echo 'utente non trovato, verrai riportato al login'; 
      header("Refresh: 4; url=log.php");}
    

?>