<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dentisti";
$codiceFiscalone = $_POST['codiceFisc'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";

$sql = "SELECT * from dentone where codiceFIsc = '$codiceFiscalone'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "codiceFisc: " . $row["codiceFIsc"]. " - Name: " . $row["nome"]. " " . $row["cognome"].  " email " . $row["email"].  "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
