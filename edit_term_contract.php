<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Term Contract</title>
</head>
<body>
    <h2>Edit Term Contract</h2>
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

    $term_contract_id = $_GET['term_contract_id'];

    $sql = "SELECT * FROM Termcontract WHERE id = $term_contract_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
    <form action="update_term_contract.php" method="POST">
        <input type="hidden" name="term_contract_id" value="<?php echo $term_contract_id; ?>">
        <input type="hidden" name="prev_counterpartyname" value="<?php echo $row['Counterpartyname']; ?>">
        <input type="hidden" name="prev_cargodescriptionname" value="<?php echo $row['Cargodescriptionname']; ?>">

        <label for="counterpartyname">Counterparty Name:</label>
        <input type="text" id="counterpartyname" name="counterpartyname" value="<?php echo $row['Counterpartyname']; ?>"><br><br>

        <label for="cargodescriptionname">Cargo Description Name:</label>
        <input type="text" id="cargodescriptionname" name="cargodescriptionname" value="<?php echo $row['Cargodescriptionname']; ?>"><br><br>

        <label for="termcontractfrom">Term Contract From:</label>
        <input type="date" id="termcontractfrom" name="termcontractfrom" value="<?php echo $row['Termcontractfrom']; ?>"><br><br>

        <label for="termcontractto">Term Contract To:</label>
        <input type="date" id="termcontractto" name="termcontractto" value="<?php echo $row['Termcontractto']; ?>"><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['Quantity']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
    <?php
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
