<!DOCTYPE html>
<html>
<head>
<title>OMCEOPROVA</title>
<link rel="stylesheet" type="text/css" href="stile.css">
<script src="script.js"></script>
</head>
<body>
<div id="content">
  <div class="logo">
    <img src="img/logo.png" width="500">
  </div>

  <div id="form">
    <form action="ricerca.php" method="post">
      <input type="text" name="key" id="id_key" placeholder="Codice fiscale">
      <input type="submit" value="cerca" onclick="return check();" />
    </form>
  </div>

  <div id="dinamicHTML">
  <?php
  if (isset($_POST["key"])) {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $db = "dentoni"; 
    
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $queryCF = "SELECT * FROM utenti WHERE codiceFisc = '".$_POST['key']."';";
    $user = $conn->query($queryCF)->fetch_assoc();
    if($user != null){
      $query = "SELECT cod, descrizione FROM (categorie JOIN privilegi ON categorie.cod = privilegi.categoria) JOIN utenti ON utenti.codiceFisc = privilegi.codFisc WHERE utenti.codiceFisc = '".$_POST['key']."';";
      $result = $conn->query($query);
      makeTableUser($user);
      echo("<table>");
      echo("<tr>");
      echo("<th id = 'left'>Codice Della Categoria (tot ".$result->num_rows.") </th>");
      echo("<th id = 'right'>Descrizione</th>");
      echo("</tr>");
      
      while($row = $result->fetch_assoc()) {
        echo("<tr>");
        echo("<td>" . $row["cod"]. "</td>");
        echo("<td>" . $row["descrizione"]. "</td>");
        echo("</tr>");
      
      }
      
      echo("</table>");
      $conn->close();
    }else{
      echo("Non hai accesso a questa pagina.");
    }
}


  function makeTableUser($user) {
    echo("<table>");
    echo("<tr>");
    echo("<th id = 'left'>Nome</th>");
    echo("<th>Cognome</th>");
    echo("<th>Codice Fiscale</th>");
    echo("<th id = 'right'>Categoria</th>");
    echo("</tr>");
    echo("<tr>");
    echo("<td>" . $user["nome"]. "</td>");
    echo("<td>" . $user["cognome"]. "</td>");
    echo("<td>" . $user["codiceFisc"]. "</td>");
    echo("<td>" . $user["tipo"]. "</td>");
    echo("</tr>");
  }
  ?>
  </div>
</div>
</body>
</html>