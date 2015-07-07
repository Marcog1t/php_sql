<?php

//includo init.php
include_once("init.php");
include_once("connessione.php");

      
//leggo tutti i dati della tabella
$query = "SELECT * FROM utenti";
$ris = mysql_query($query, $link) or die (mysql_error());
?>

<!--tabella di dati -->
<table border="0" cellspacing="2" cellpadding="2">
<tr>
    <th>Nome</font></th>
    <th>Cognome</font></th>
    <th>Email</font></th>
    <th>Id</font></th>
</tr>

 <!-- estrapolazione dei dati all'interno di $num-->
 <?php
     while ($riga = mysql_fetch_assoc($ris)) { ?> 
        <tr>
        <td><?php echo $riga["nome"];?> </td>
        <td><?php echo $riga["cognome"];?></td>
        <td><?php echo $riga["email"];?></td>
        <td><?php echo $riga["id"];?></td>
        <?php echo "<td><a href='dettaglio.php?id=$riga[id]'>modifica</td></a>";?>
        <?php echo "<td><a href='elimina.php?id=$riga[id]'>elimina</td></a>";}?>
        </tr>

<div id="logoutButton">
    <a href="logout.php">logout</a>
</div>