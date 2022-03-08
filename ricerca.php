<!DOCTYPE html>
<html>
<head>
<title>OMCEOPROVA</title>
<link rel="stylesheet" type="text/css" href="stile.css">
<script src="script.js"></script>
</head>
<body>
<div id="content">
  <img src="img/logo.png" width="500">

  <div id="form">
    <form action="ricerca.php" method="post">
      <input type="text" name="key" id="id_key" placeholder="Codice fiscale">
      <input type="submit" value="cerca" onclick="return check();" />
    </form>
  </div>

  <div id="dinamicHTML">
  <?php
  if (isset($_POST["key"])) {
    $servername = "localhost"; //il DBMR è sul server web
    $username = "root"; 
    $password = ""; 
    $db = "dentoni"; 
    
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT cod, descrizione FROM (categorie JOIN privilegi ON categorie.cod = privilegi.categoria) JOIN utenti ON utenti.codiceFisc = privilegi.codFisc WHERE utenti.codiceFisc = '".$_POST['key']."';";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
    
        //recupero i valori dal database e costruisco la tabella
        echo("<table>");
        echo("<tr>");
        echo("<th id = 'left'>Codice Della Categoria </th>");
        echo("<th id = 'right'>Descrizione</th>");
        echo("</tr>");
    
        while($row = $result->fetch_assoc()) {
          echo("<tr>");
          echo("<td>" . $row["cod"]. "</td>");
          echo("<td>" . $row["descrizione"]. "</td>");
          echo("</tr>");
    
        }
    
        echo("</table>");
        echo("<br/>Risultati: <b>" . $result->num_rows . "</b>");
    
    } else {
        echo("<br/>Non sei registrato nel database sry</br>");
    }
    $conn->close();
}
  ?>
  </div>
</div>
</body>
</html>