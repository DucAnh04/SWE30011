<?php
// Database connection parameters
$hostname = "127.0.0.1"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = "123456"; // Your MySQL password
$database = "iot"; // Your MySQL database name

// Connect to the database
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from your table
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Database Table</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Temperature</th>
        <th>Humidity</th>
    </tr>
    <?php
    // Loop through the retrieved data and display it in a table
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["Temperature"] . "</td>";
            echo "<td>" . $row["Humidity"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
    ?>
</table>

</body>
</html>
