<?php
    include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="volunteer.css">
    <title>Volunteer Request</title>
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
    <h1>Request to Volunteer</h1><br><br>
    <div>
        <form method="post">
        <div>
            <input class="firstName" type="text" placeholder="Enter your name" name="first_name" required>
            <input class="lastName" type="text" placeholder="Enter your name" name="last_name" required><br><br>
        </div>
        <div>
            <label>First Name</label>
            <label class="lastNametext">Last Name</label><br><br>
        </div>

        <?php
            include("conn.php");

            $user_id = $_SESSION['mySession'];
            $sql = "SELECT user_email, user_phone FROM users WHERE id = $user_id";
            $result = mysqli_query($con,$sql);

            echo '<div>';
                while ($row=mysqli_fetch_array($result)) {
                    $user_email = $row['user_email'];
                    $user_phone = $row['user_phone'];
                    echo '<input type="email" required value="'.$user_email.'">';
                    echo '<input class="lastName" type="tel" required value="'.$user_phone.'"><br><br>';
                }
            echo '</div>';
        ?>
        <div>
            <label>Email</label>
            <label class="phoneNumbertext">Phone Number:</label>
        </div>
            <button class="appointmentBtn" value="submit" name="submitBtn">Submit</button>
        </div>
        </form>
    </div>

    <?php
        include("conn.php");
        

        if(isset($_POST['submitBtn'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $user_id = $_SESSION['mySession'];
            $sql = "SELECT user_email, user_phone FROM users WHERE id = $user_id";
            $result = mysqli_query($con,$sql);

            while ($row=mysqli_fetch_array($result)) {
                $user_email = $row['user_email'];
                $user_phone = $row['user_phone'];
                $sql = "INSERT INTO volunteer_requests (first_name, last_name, user_email, user_phone, user_id) VALUES ('$first_name','$last_name','$user_email','$user_phone', '$user_id')";
    
                $stmt = mysqli_prepare($con,$sql);
                mysqli_stmt_execute($stmt);
                $check = mysqli_stmt_affected_rows($stmt);
                
                if($check > 0) {
                    echo '<script>alert("Request Successful!");window.location.href="profile.php";</script>'; 
                }
            }
        }
    ?>

</body>
</html>