<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contract_management_skarvi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$term_contract_id = $_POST['term_contract_id'];
$counterpartyname = $_POST['counterpartyname'];
$cargodescriptionname = $_POST['cargodescriptionname'];
$termcontractfrom = $_POST['termcontractfrom'];
$termcontractto = $_POST['termcontractto'];
$quantity = $_POST['quantity'];

// Update Termcontract table
$stmt_termcontract = $conn->prepare("UPDATE Termcontract SET Counterpartyname=?, Cargodescriptionname=?, Termcontractfrom=?, Termcontractto=?, Quantity=? WHERE id=?");
$stmt_termcontract->bind_param("sssssi", $counterpartyname, $cargodescriptionname, $termcontractfrom, $termcontractto, $quantity, $term_contract_id);
$stmt_termcontract->execute();

// Update Counterparty table (if counterparty name is edited)
$stmt_counterparty = $conn->prepare("UPDATE Counterparty SET Counterpartyname=? WHERE Counterpartyname=?");
$stmt_counterparty->bind_param("ss", $counterpartyname, $_POST['prev_counterpartyname']);
$stmt_counterparty->execute();

// Update CargoDescription table (if cargo description name is edited)
$stmt_cargodescription = $conn->prepare("UPDATE CargoDescription SET Cargodescriptionname=? WHERE Cargodescriptionname=?");
$stmt_cargodescription->bind_param("ss", $cargodescriptionname, $_POST['prev_cargodescriptionname']);
$stmt_cargodescription->execute();

$stmt_termcontract->close();
$stmt_counterparty->close();
$stmt_cargodescription->close();
$conn->close();

echo "Term contract and related records updated successfully.";
?>
