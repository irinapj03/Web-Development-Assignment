<?php
    include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profstyle.css">
    <title>Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
        }
        
        .button {
            background-color: grey;
            border: 1px #000000 solid;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            color: white;
            border-radius: 5px;
            font-size: 11px;
            margin-left: 10px;
            margin-top: 20px;
        }

        .button:hover {
            background-color:bisque;
            color: black;
        }
        .topnav {
            background-color: #d9d9d9;
            overflow: hidden;
            height: 80px;
            border-radius: 50px;
        }

        .topnav a {
            position: relative;
            left: 400px;
            float: left;
            text-decoration: none;
            font-size: 20px;
            padding: 25px;
            color: black;
        }

        .topnav a:hover {
            color: grey;
        }

        .logo {
            width: 90px;
            height: 90px;
            position: relative;
            right: 185px;
            bottom: 5px;
        }

        .dropdown {
            float: right;

        }

        .dropBtn {
            position: relative;
            right: 700px;
            bottom: 22px;
            font-size: 20px;
            padding: 24px 0px 25px 10px;
            color: black;
            border: none;
            outline: none;
            background-color: inherit;
            font-family: inherit;
            margin: 0px;
        }

        .dropBtn:hover {
            color: grey;
        }

        .dropdowncontentadopt {
            display: none;
            position: absolute;
            right: 450px;
            top: 85px;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(187, 182, 182, 0.2);
            z-index: 1;
        }

        .dropdowncontentdonate {
            display: none;
            position: absolute;
            right: 405px;
            top: 85px;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(187, 182, 182, 0.2);
            z-index: 1;
        }

        .dropdowncontentvolunteer {
            display: none;
            position: absolute;
            right: 170px;
            top: 85px;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(187, 182, 182, 0.2);
            z-index: 1;
        }

        .dropdowncontentadopt a { 
            left: 7px;
            float: none;
            color: black;
            padding: 25px;
            text-decoration: none;
            display: block;
            
        }

        .dropdowncontentadopt a:hover {
            color: grey;
        }

        .dropdown:hover .dropdowncontentadopt {
            display: block;
        }

        .dropdowncontentdonate a { 
            left: 7px;
            float: none;
            color: black;
            padding: 25px;
            text-decoration: none;
            display: block; 
        }

        .dropdowncontentdonate a:hover {
            color: grey;
        }

        .dropdown:hover .dropdowncontentdonate {
            display: block;
        }

        .dropdowncontentvolunteer a { 
            left: 7px;
            float: none;
            color: black;
            padding: 25px;
            text-decoration: none;
            display: block;
            
        }

        .dropdowncontentvolunteer a:hover {
            color: grey;
        }

        .dropdown:hover .dropdowncontentvolunteer {
            display: block;
        }

        .adoption {
            float: right;
            width: 200px;
            height: 200px;
        }

    </style>
</head>
<body>
    <div class="topnav">
        <img class="logo" src="PetLovers.png">
        <a class="dropdown" href="profile.php">Home</a>
        <a class="dropdown" href="about.php">About</a>
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
    </div>
    <?php
    include("conn.php");
    $user_id=$_SESSION['mySession'];
    $sql = "SELECT*FROM users WHERE id='$user_id'" ;
    $result = mysqli_query($con,$sql);
    $user_icon = "profilepic.png";

    
    $sql2 = "SELECT COUNT(*) AS donation_count FROM donations WHERE user_id='$user_id'";
    $result2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $donation_count=$row2['donation_count'];

    echo '<div class="container">';
        while ($row=mysqli_fetch_array($result)){
            echo '<div id="box1">';
            echo '<img src="profilepic/'.$user_icon.'" width="50">';
            echo '<h3>'.$row['user_name'].'</h3>';
            echo '<p>'.$row['user_email'].'</p>';
            echo '<p>'.$row['user_phone'].'</p>';
            echo '<p>'.$row['user_address'].'</p>';
            echo '<p>'.$row['user_dob'].'</p>';
            echo '<a href="feedback.php">Feedback Form Here</a>';
            echo '<a class = "button" href ="manageprofile.php?id='.$row['id'].'">Manage Profile</a>';
            echo '<a class = "button" href ="logout.php?id='.$row['id'].'">Logout</a>';
            echo '</div>';
        }

        echo '<div id="box2">';
        echo '<h3>Donation</h3>';
        echo 'Total donation made: '.$donation_count.'<br><br>';
        echo '<a href="viewReceipt.php">View Receipt</a>';
        echo '</div>';

        echo '<div id="box3">';
        echo '<h3>Volunteer</h3>';
        echo '<a href="viewVolunteer.php">View Volunteer Request</a>';
        echo '</div>';

        echo '<div id="box4">';
        echo '<h3>Adoption</h3>';
        echo '<a href="viewAppointment.php">View Appointment</a>';
        echo '<img class="adoption" src="AdoptionIcon.png">';
        echo '</div>';
    echo '</div>';
    ?>
    
</body>
</html>
