<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Term Contract</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Term Contract</h2>
    <form action="add_term_contract.php" method="POST">
        <label for="counterpartyname">Counterparty Name:</label>
        <select id="counterpartyname" name="counterpartyname" required>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "contract_management_skarvi";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Counterpartyname FROM Counterparty";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Counterpartyname'] . "'>" . $row['Counterpartyname'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="cargodescriptionname">Cargo Description Name:</label>
        <select id="cargodescriptionname" name="cargodescriptionname" required>
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Cargodescriptionname FROM CargoDescription";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Cargodescriptionname'] . "'>" . $row['Cargodescriptionname'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="termcontractfrom">Term Contract From:</label>
        <input type="date" id="termcontractfrom" name="termcontractfrom" required><br><br>

        <label for="termcontractto">Term Contract To:</label>
        <input type="date" id="termcontractto" name="termcontractto" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
