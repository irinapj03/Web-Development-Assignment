<?php
    include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Requests</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            background: snow;
        }

        h1 {
            
            padding-left: 5px;
            margin-top: 10px;
        }

        table {
            width: 70%;
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

    <h1>Volunteer Requests</h1><br>

    <?php
        $result = mysqli_query($con, "SELECT  * FROM volunteer_requests WHERE status NOT IN ('Accept', 'Reject')");

        if ($result === false) {
            echo "Error: " . mysqli_error($con);
        } else {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Phone Number</th> <th>Timestamp</th>  <th>Request Status</th></tr>";
                while ($request = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $request['first_name'] . "</td>";
                    echo "<td>" . $request['last_name'] . "</td>";
                    echo "<td>" . $request['user_email'] . "</td>";
                    echo "<td>" . $request['user_phone'] . "</td>";
                    echo "<td>" . $request['timestamp'] . "</td>";
                    echo "<td>";
                    echo "<form action='update_v_request.php' method='POST'>";
                    echo "<input type='hidden' name='volunteer_id' value='" . $request['volunteer_id'] . "'>";
                    echo "<input type='submit' name='status' value='Accept' class='confirmbtn'>";
                    echo "<input type='submit' name='status' value='Reject'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<div style='margin-left: 55px';>No volunteer requests.</div>";
            }
        }
    ?>
</body>
</html>