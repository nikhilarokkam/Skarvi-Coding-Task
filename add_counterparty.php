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
$stmt = $conn->prepare("INSERT INTO Counterparty (Counterpartyname, Counterpartylocation) VALUES (?, ?)");
$stmt->bind_param("ss", $counterpartyname, $counterpartylocation);

// Set parameters and execute
$counterpartyname = $_POST['counterpartyname'];
$counterpartylocation = $_POST['counterpartylocation'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
