<?php

// mi connetto al MySql Server
$link = mysql_connect('localhost', 'marcowebwork', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());}

// seleziono il database 
mysql_select_db('my_marcowebwork', $link);

//includo init.php
include_once("init.php"); 

//verifica della sessione
      if ($_SESSION["user"] == ""){
header("location: log.php");}
else{echo 'sessione attiva';}
      
//leggo tutti i dati della tabella
$query = "SELECT * FROM utenti";
 $ris = mysql_query($query, $link) or die (mysql_error());
$num = mysql_numrows($ris); 
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
     $i=0;
     while ($i < $num) {
         $nome=mysql_result($ris,$i,"nome");
         $cognome=mysql_result($ris,$i,"cognome");
         $email=mysql_result($ris,$i,"email");
         $id=mysql_result($ris,$i,"id");
 ?>
 <!--inserimento dei dati estrapolati-->
  <tr>
     <td><?php echo $nome;?>
     <td><?php echo $cognome;?>
     <td><?php echo $email;?>
     <td><?php echo $id;?></td>
<?php echo "<td><a href='dettaglio.php?id=$id'>modifica</td></a>";?>
<?php echo "<td><a href='elimina.php?id=$id'>elimina</td></a>";?>
  </tr>

 <?php 
 $i++; 
 } 
 ?> 
 <div id="logoutButton">
        <a href="logout.php">logout</a>
    </div>
 </body>
</html>


