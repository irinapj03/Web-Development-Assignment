<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Volunteer Requests</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: snow;
        }

        h1 {
            padding-left: 5px;
        }
        
        table {
            width: 50%;
            border-collapse: collapse;
            margin-left: 50px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
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
        include 'navigation_bar.php'
    ?>
    
    <h1>Confirmed Volunteer Requests</h1><br>

    <?php

        $result = mysqli_query($con, "SELECT * FROM volunteer_requests WHERE status = 'Accept'");

        if ($result === false) {
            echo "Error: " . mysqli_error($con);
        } 
        
        else {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>First Name</th> <th>Last Name</th> <th>Email</th> </tr>";
                while ($appointment = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $appointment['first_name'] . "</td>";
                    echo "<td>" . $appointment['last_name'] . "</td>";
                    echo "<td>" . $appointment['user_email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } 
            
            else {
                echo '<p>No confirmed appointments yet.</p>';
            }
        }
    ?>
</body>
</html>
