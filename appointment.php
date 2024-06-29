<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="appointment.css">
    <title>Book Appointment</title>
</head>
<body>
    <div class="topnav">
        <img class="logo" src="PetLovers.png">
        <a class="active" href="profile.php">Home</a>
        <a href="about.php">About</a>
        <div class="dropdown">
            <a>
                <button class="dropBtn">Volunteer</button>
            </a>
            <div class="dropdowncontentvolunteer">
                <a href="volunteerRequest.php">Request to Volunteer</a>
            </div>
        </div>
        <div class="dropdown">
            <a>
                <button class="dropBtn">Donate</button>
            </a>
            <div class="dropdowncontentdonate">
                <a href="donate.php">Donate</a>
            </div>
        </div>
        <div class="dropdown">
            <a>
                <button class="dropBtn">Adopt</button>
            </a>
            <div class="dropdowncontentadopt">
                <a href="browsePets.php">Browse Pets</a>
                <a href="appointment.php">Book Appointment</a>
            </div>
        </div>
    </div><br><br>
    <h1>Book An Appointment</h1>
    <div>
        <form method="post">
        <div>
            <label>Name</label>
        </div>
        <div id="box">
            <input type="text" placeholder="Enter your name" name="name" required><br><br>
        </div>
        <div>
            <label>Email</label>
        </div>
        <?php
            include("conn.php");
            $user_id = $_SESSION['mySession'];
            $sql = "SELECT user_email FROM users WHERE id = $user_id";
            $result = mysqli_query($con,$sql);

            echo '<div>';
                while ($row=mysqli_fetch_array($result)) {
                    $user_email = $row['user_email'];
                    echo '<input type="email" required value="'.$user_email.'"><br><br>';
                }
            echo '</div>';
        ?>
        <div>
            <label>Reason of Appointment</label>
        </div>
        <div>
            <textarea placeholder="Enter your message" name="reason" required></textarea><br><br>
        </div>
            <button name="submitBtn" class="appointmentBtn" value="submit">Submit</button>
        </form>
    </div>
    <?php
        include("conn.php");
        
        if(isset($_POST['submitBtn'])) {
            $name = $_POST['name'];
            $reason = $_POST['reason'];
            $user_id = $_SESSION['mySession'];
            $sql = "SELECT user_email FROM users WHERE id = $user_id";
            $result = mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($result)) {
                $user_email = $row['user_email'];
                $sql = "INSERT INTO appointment (name, user_email, reason, user_id) VALUES ('$name','$user_email','$reason', '$user_id')";
    
                $stmt = mysqli_prepare($con,$sql);
                mysqli_stmt_execute($stmt);
                $check = mysqli_stmt_affected_rows($stmt);
                
                if($check > 0) {
                    echo '<script>alert("Appointment Successful!");window.location.href="profile.php";</script>'; 
                }
            }
        }
    ?>
</body>
</html>