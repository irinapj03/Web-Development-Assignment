<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <title>About</title>
</head>
<body>
    <div class="topnav">
        <img class="logo" src="PetLovers.png">
        <?php
            session_start();
            if(isset($_SESSION['mySession'])){ 
                echo '<a class="active" href="profile.php">Home</a>';
            }
            else {
                echo '<a class="active" href="home.php">Home</a>';
            }
        ?>
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
    <h1>About Us</h1>
    <?php
        include("conn.php");

        $sql = "SELECT * FROM  about_us";
        $result = mysqli_query($con,$sql);

        while ($row=mysqli_fetch_array($result)) {
            echo '<p>'.$row['about_us'].'</p>';
        }
    ?>
</body>
</html>