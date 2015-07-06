<?php
$id = $_GET['id'];

// mi connetto al MySql Server
$link = mysql_connect('localhost', 'marcowebwork', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());}

// seleziono il database 
mysql_select_db('my_marcowebwork', $link);

//carico init
include_once("init.php"); 

//codice per la sessione
  if ($_SESSION["user"] == ""){
header("location: log.php");}
else{ echo 'sessione attiva';}

//query ricerca tramite id
$query = "SELECT * FROM utenti WHERE id='$id'";
$ris = mysql_query($query, $link);
$num = mysql_numrows($ris);

//ciclio di lettura tabella sql
     $i=0;
     while ($i < $num) {
         $nome=mysql_result($ris,$i,"nome");
         $cognome=mysql_result($ris,$i,"cognome");
         $email=mysql_result($ris,$i,"email");
         $id=mysql_result($ris,$i,"id");
 $i++; } 

//form per la modifica
echo "<form id='loginForm' method='POST'>";
echo "<input type='text' name='nome' placeholder='$nome'>Nome<br>";
echo "<input type='text' name='cognome' placeholder='$cognome'>Cognome<br>";
echo "<input type='text' name='email' placeholder='$email'>Email<br>";
echo "<input type='text' name='id' placeholder='$id' readonly>Id<br>";
echo "<input type='submit' name='pulsante' value='modifica'>";
echo "</form>";

//se viene cliccato il tasto prendi le variabili e modifica i valori sul db, al termine torna alla lista
if(isset($_POST['pulsante'])){
$unome = $_POST['nome'];
$ucognome = $_POST['cognome'];
$uid = $_POST['id'];
$umail = $_POST['email'];
    
$update = "UPDATE utenti SET nome='$unome', email='$umail', cognome='$ucognome' WHERE id='$id'";
$risult = mysql_query($update, $link);
   header("location: lista_utenti.php");}