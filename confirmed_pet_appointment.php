<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Pet Appointments</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: snow;
        }

        h1 {
            margin-top: 10px;
            padding-left: 5px;
        }
    
        table {
            width: 50%;
            border-collapse: collapse;
            margin-left: 50px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #fdd700;
        }
    </style>

</head>
<body>
    <?php
        include 'conn.php';
        include 'navigation_bar.php';
    ?>

    <h1>Confirmed Pet Appointments</h1><br>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php 

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT name, user_email, status FROM appointment WHERE Status = 'Confirm'";

        $result = mysqli_query($con, $sql);

        if (!$result) {
            die("Error executing SQL query: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["user_email"]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>