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

$counterparty_search = $_GET['counterparty_search'];

$sql = "SELECT * FROM Termcontract WHERE Counterpartyname LIKE '%$counterparty_search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Counterparty: " . $row["Counterpartyname"]. " - Cargo Description: " . $row["Cargodescriptionname"]. " - Term From: " . $row["Termcontractfrom"]. " - Term To: " . $row["Termcontractto"]. " - Quantity: " . $row["Quantity"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
