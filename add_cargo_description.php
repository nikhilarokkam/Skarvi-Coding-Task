<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contract_management_skarvi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO CargoDescription (Cargodescriptionname) VALUES (?)");
$stmt->bind_param("s", $cargodescriptionname);

// Set parameters and execute
$cargodescriptionname = $_POST['cargodescriptionname'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
