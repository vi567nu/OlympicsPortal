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
    <h1>Coaches</h1>
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

    $sql = "SELECT * FROM coaches";
    $result = $conn->query($sql);
    ?>

    <table>
        <tr>
            <th>Coach ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Country ID</th>
            <th>Sport ID</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["coach_id"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["country_id"] . "</td>";
                echo "<td>" . $row["sport_id"] . "</td>";
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