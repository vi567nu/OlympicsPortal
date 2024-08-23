<html>


<?php

$id = $_POST["athlete_id"];
$fn = $_POST["first_name"];
$ln = $_POST["last_name"];
$dob = $_POST["date_of_birth"];
$country = $_POST["country_id"];
$gender = $_POST["gender"];
$sport = $_POST["sport_id"];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olympics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO athlete VALUES ('$id','$fn','$ln','$dob','$country','$gender','$sport')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  exit();
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
</html>