<?php
$conn = mysqli_connect('localhost', 'root', '', 'krish123_super');
if (mysqli_connect_errno()) {
    printf('error', mysqli_connect_error());
}

// Get the table name from the query parameter
$tableName = $_GET['table'] ?? '';

if (!empty($tableName)) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Table Records</title>
        <style>
            body {
                text-align: center;
            }

            table {
                margin: 0 auto; /* Center-align the table */
                border-collapse: collapse;
                width: 80%; /* Adjust the width as needed */
            }

            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            h4 {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

        <?php
        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<h4>Records of $tableName</h4>";
            echo "<table>";

            // Fetch column names dynamically
            $fields = mysqli_fetch_fields($result);
            echo "<tr>";
            foreach ($fields as $field) {
                echo "<th>$field->name</th>";
            }
            echo "</tr>";

            // Fetch and display rows dynamically
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($fields as $field) {
                    $columnName = $field->name;
                    echo "<td>".$row[$columnName]."</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No records found for $tableName";
        }
        ?>

    </body>
    </html>

<?php
} else {
    echo "Invalid table name";
}

// Close connection
$conn->close();
?>
