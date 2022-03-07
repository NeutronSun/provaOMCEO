<!-- Copyright (c) 22 Giugno anno 0, 2022, SafJNest and/or its affiliates. All rights reserved.
SAFJNEST PROPRIETARY/CONFIDENTIAL. Use is subject to license terms.-->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dentisti";

$codiceFiscalone = $_POST['codiceFisc'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());  
}
echo "Connected successfully <br>";

$sql = "INSERT INTO dentone VALUES('.$email.', '.$codiceFiscalone.', '.$nome.', '.$cognome.')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
?>