<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raman | Staff Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Records</h1>
    <form action="athletesearch.php" method="post">
        <input type="text" name="ath" placeholder="Enter athlete to search">
        <input type = "submit" name="submit">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "olympics";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM records";
    $result = $conn->query($sql);
    ?>

    <table>
        <tr>
            <th>Record ID</th>
            <th>Athlete</th>
            <th>Game</th>
            <th>Record Value</th>

        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["record_id"] . "</td>";
                echo "<td>" . $row["athlete"] . "</td>";
                echo "<td>" . $row["game"] . "</td>";
                echo "<td>" . $row["record_value"] . "</td>";
   
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

</body>
</html>