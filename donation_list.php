<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation List</title>

    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
	        font-family: 'Montserrat', sans-serif;
        }

        table{
            border-collapse: collapse;
            width: 50%;
            margin-left: 50px;
        }

        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            background-color: #fdd700;
            color:black;
        }
        
        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px; 
            color:black;
        }


        .no-donation {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        h1 {
            margin-top: 20px;
        }

    </style>

</head>

<body>
    <?php
        include("conn.php");
        include("navigation_bar.php");
    ?>
    <h1>Donation List</h1><br>

    <?php
        $sql = "SELECT user_id, amount, timestamp FROM donations";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>User ID</th><th>Amount (RM)</th><th>Timestamp</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>RM " . $row['amount'] . "</td>";
                echo "<td>" . $row['timestamp'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        
        else {
            echo "<div class='no-donation'>No donation data available.</div>";
        }
    ?>
</body>
</html>
