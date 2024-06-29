<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Appointments</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            background: snow;
        }

        h1 {
            padding-left: 5px;
        }
        
        table {
            width: 80%;
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

        .confirmbtn {
            margin-right: 10px;
        }
    </style>

</head>
<body>
    <?php
        include 'conn.php';
        include 'navigation_bar.php';
    ?>

    <h1>Pet Appointments</h1><br>

    <?php
        $result = mysqli_query($con, "SELECT * FROM appointment WHERE status NOT IN ('Confirm', 'Reject')");

        if ($result === false) {
            echo "Error: " . mysqli_error($con);
        } else {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>Name</th> <th>Email</th> <th>Reason of Appointment</th> <th>Timestamp</th> <th>Appointment Status</th></tr>";
                while ($appointment = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $appointment['name'] . "</td>";
                    echo "<td>" . $appointment['user_email'] . "</td>";
                    echo "<td>" . $appointment['reason'] . "</td>";
                    echo "<td>" . $appointment['timestamp'] . "</td>";
                    echo "<td>";
                    echo "<form action='update_pet_appointment.php' method='POST'>";
                    echo "<input type='hidden' name='appointment_id' value='" . $appointment['appointment_id'] . "'>";
                    echo "<input type='submit' name='status' value='Confirm' class='confirmbtn'>";
                    echo "<input type='submit' name='status' value='Reject'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<div style='margin-left: 55px;'>No appointments found.</div>";
            }
        }
    ?>
</body>
</html>