<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contract_management_skarvi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO Termcontract (Counterpartyname, Cargodescriptionname, Termcontractfrom, Termcontractto, Quantity) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $counterpartyname, $cargodescriptionname, $termcontractfrom, $termcontractto, $quantity);

$counterpartyname = $_POST['counterpartyname'];
$cargodescriptionname = $_POST['cargodescriptionname'];
$termcontractfrom = $_POST['termcontractfrom'];
$termcontractto = $_POST['termcontractto'];
$quantity = $_POST['quantity'];

$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
