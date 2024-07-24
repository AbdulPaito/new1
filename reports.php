<?php
// Step 1: Establish database connection
$host = 'localhost';  // Replace with your host
$user = ' ';   // Replace with your database username
$password = ' '; // Replace with your database password
$database = 'login'; // Replace with your database name

$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Execute query to fetch data
$query = "SELECT * FROM registration";
$result = mysqli_query($connection, $query);

// Check if query execution was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
         body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }
        /* General section styling */
        #report-section {
            position: relative;
        padding: 15px;
        position: relative;
        width: auto;
        margin-top: -36px;
        margin-left: -35px;
        }

        /* Heading styling */
        #report-section h1 {
            text-align: center;
        background: #1182fa;;
        color: #fff;
        padding: 20px 0;
        margin: 0;
        }

        /* Paragraph styling */
        #report-section p {
            font-size: 1.2em;
            color: #666;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Table styling */
        .reports-table {
            width: 100%;
        border-collapse: collapse;
        margin: 0;
        }

        .reports-table th,
        .reports-table td {
            padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        }

        .reports-table th {
            background: #f9f9f9;
        }

        .reports-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .reports-table tr:hover {
            background-color: #ddd;
        }
        .print-button, .delete-button {
        display: inline-block;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        }

        .print-button {
            background: #007bff;
            color: #fff;
        }

        .print-button:hover {
            background: #45a049;
        }

    </style>
</head>
<body>

<section id="report-section">
    <h1>Reports</h1>
    <table class="reports-table">
        <thead>
            <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>COURSE</th>
            <th>PRINT</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td></td>
                    <td><a class="print-button" href="?id=<?php echo $row['id']; ?>">Print</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

</body>
</html>