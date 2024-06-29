<?php
    include("session.php");

    include("conn.php");
    $user_id=$_SESSION['mySession'];
    $sql = "SELECT user_role FROM users WHERE id='$user_id'" ;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) == 1) {
        $role = $row['user_role'];
        
        if($role == 'admin') {
            header("location:homepage.php");
            exit();
        }
    }

    else {
        header("location:profile.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
    body {
        font-family: 'Montserrat', sans-serif;
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
    
    .dropBtn  {
        position: relative;
        right: 715px;
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
        right: 465px;
        top: 85px;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(187, 182, 182, 0.2);
        z-index: 1;
      }
    
    .dropdowncontentdonate {
        display: none;
        position: absolute;
        right: 420px;
        top: 85px;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(187, 182, 182, 0.2);
        z-index: 1;
      }
    
    .dropdowncontentvolunteer {
        display: none;
        position: absolute;
        right: 190px;
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
    
    h1, h3 {
        margin-left: 50px;
        
    }

    textarea {
        width: 500px;
        border-radius: 10px;
        background-color: #d9d9d9;
        border: 1px solid black;
        height: 100px;
        position: relative;
        left: 50px;
        text-indent: 10px;
        margin-top: 10px;
        text-align: justify;
    }

    ::placeholder {
        color: grey;
        font-family: 'Montserrat', sans-serif;
    }

    .feedbackBtn {
        width: 500px;
        height: 30px;
        margin-left: 50px;
        margin-top: 10px;
        border-radius: 20px;
        border: 1px solid black;
        font-family: 'Montserrat', sans-serif;
    }

    .feedbackBtn:hover {
        background-color: grey;
        color: white;
    }


</style>
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
    <h1>Feedback</h1><br><br>
    <form method="post">
        <h3>Please leave your feedback</h3>
        <div>
            <textarea placeholder="Enter your message" name="feedback" required></textarea><br><br>
        </div>
        <div>
            <button name="submitBtn" class="feedbackBtn" value="submit">Submit</button>
        </div>
    </form>
    <?php
        include("conn.php");

        if(isset($_POST['submitBtn'])) {
            $message = $_POST['feedback'];
            $user_id=$_SESSION['mySession'];
            $sql = "INSERT INTO feedback (feedback_message, user_id) VALUES ('$message', '$user_id')";
            $result = mysqli_query($con, $sql);

            if($result){
                echo '<script>alert("Feedback Submittedl!");window.location.href="profile.php";</script>'; 
            }
        }
    ?>
</body>
</html>