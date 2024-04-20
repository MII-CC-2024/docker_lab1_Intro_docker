<h1>Mi WebApp</h1>
<?php
  echo "<h2>con PHP</h2>"
?>
<?php
$servername = "database";
$username = "web";
$password = "web";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>