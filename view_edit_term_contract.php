<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View/Edit Term Contract</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17l-5-5h10l-5 5z" fill="%23000"/></svg>') no-repeat right 0.75rem center/1.5rem #f3f3f3;
            cursor: pointer;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>View/Edit Term Contract</h2>
    <form action="edit_term_contract.php" method="GET">
        <label for="term_contract_id">Select Term Contract to Edit:</label>
        <select id="term_contract_id" name="term_contract_id" required>
            <option value="" disabled selected>Select</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "contract_management_skarvi";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $counterparty_search = $_GET['counterparty_search'];

            $sql = "SELECT id, Counterpartyname, Cargodescriptionname FROM Termcontract WHERE Counterpartyname LIKE '%$counterparty_search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>ID: " . $row['id'] . " | Counterparty: " . $row["Counterpartyname"] . " | Cargo Description: " . $row["Cargodescriptionname"] . "</option>";
                }
            } else {
                echo "<option value=''>No Term Contracts found</option>";
            }

            $conn->close();
            ?>
        </select><br><br>
        <input type="submit" value="Edit">
    </form>
</body>
</html>
