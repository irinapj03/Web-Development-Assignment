<?php
    include("session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        
        body::before {
            font-family: 'Montserrat', sans-serif;
            background-image: url('https://www.worldatlas.com/r/w1200/upload/8b/72/3e/shutterstock-690150508.jpg');
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.5;
        }
        #editBtn {
            margin-top: 80px;
            margin-left: 50px;
            font-size: 20px;
            padding: 10px 60px;
            border: 1px solid black;
            border-radius: 20px;
            background-color: #fdd700;
            font-family: inherit;
        }

        #editBtn:hover {
            background-color: #daa520;
            color: white;
            cursor: pointer;
            font-family: inherit;
        }
    </style>
</head>
<body>
    <?php
        include 'conn.php';
        include 'navigation_bar.php';
    ?>

    <h1>About Us</h1>

    <?php
        $result = mysqli_query($con, "SELECT about_us FROM about_us");
        $row = mysqli_fetch_assoc($result);
        $aboutus = $row['about_us'];

        mysqli_close($con);
    ?>

    <div style="margin-top: 80px; margin-left: 50px;">
        <?php echo $aboutus; ?>
    </div>

    <input type="button" id="editBtn" value="Edit" onclick="window.location.href='edit_about_us.php'">
</body>
</html>