<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shelter Info</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: snow;
        }

        textarea {
            margin-top: 50px;
            margin-left: 15px;
            font-family: Arial, sans-serif;
        }

        #saveBtn {
            width: 100px;
            height: 35px;
            border: 1px solid black;
            border-radius: 5px;
            margin: 20px 0 0 15px;
            cursor: pointer;
            background-color: #fdd700;
            font-family: inherit;
        }

        #saveBtn:hover {
            background-color: #daa520;
            font-family: inherit;
        }
    </style>

</head>
<body>
    <?php
        include 'conn.php';
        include 'navigation_bar.php';
    ?>

    <h1>Edit About Us</h1>

    <?php

        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newaboutus = $_POST['aboutus'];
            $stmt = mysqli_prepare($con, "UPDATE about_us SET about_us = ?");
            mysqli_stmt_bind_param($stmt, 's', $newaboutus);
            mysqli_stmt_execute($stmt);

            $message = 'About us updated successfully';
        }

        $result = mysqli_query($con, "SELECT about_us FROM about_us");
        $row = mysqli_fetch_assoc($result);
        $aboutus = $row['about_us'];

        echo "<form method='post'>";
            echo "<textarea name='aboutus' rows='10' cols='202'>$aboutus</textarea>";
            echo "<input type='submit' id='saveBtn' value='Save'>";
        echo "</form>";
    ?>
    
    <script>
        var message = "<?php echo $message; ?>";
        if (message !== '') {
            alert(message);
            window.location.href = 'about_us.php';
        }
    </script>
</body>
</html>