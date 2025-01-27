<?php
include("insert.php");

$sql = "SELECT requestno, fname, lname, accno, email, status, tier FROM memberrequest";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data from Database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Database Records</h2>

<table>
    <tr>
        <th>request no</th>
        <th>fname</th>
        <th>lname</th>
        <th>accno</th>
        <th>email</th>
        <th>status</th>
        <th>tier</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["requestno"]. "</td>
                    <td>" . $row["fname"]. "</td>
                    <td>" . $row["lname"]. "</td>
                    <td>" . $row["accno"]. "</td>
                    <td>" . $row["email"]. "</td>
                    <td>" . $row["status"]. "</td>
                    <td>" . $row["tier"]. "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
