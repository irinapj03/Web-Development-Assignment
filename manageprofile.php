<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <script>
        function checkPassword(form) {
            var password = form.password.value;
            var confirm_pass = form.confpassword.value;

            if (password != confirm_pass) {
                alert("Passwords do not match!")
                return false;
            }
            else {
                alert("Record updated!")
                return true;
            }   
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            }

            input[type=text] {
            width: 300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 170px;
            text-indent: 10px;
        }

        input[type=email] {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 105px;
            text-indent: 10px; 
        }

        input[type=tel] {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 95px;
            text-indent: 10px;
        }

        .password {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 75px;
            text-indent: 10px;
        }

        .conf {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 75px;
            text-indent: 10px;
        }

        input[type=date] {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 118px;
            text-indent: 5px;
            color: black;
        }

        textarea {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 155px;
            text-indent: 10px;
        }

        .button {
            width: 10%;
            height: 25px;
            border-radius: 15px;
            border: 1px solid black;
            margin: 20px;
            position: relative;
            left: 90px;
        }

        .button:hover {
            background-color: grey;
            color: white;
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
        
        h1 {
            margin-left: 50px;
        }

        form {
            margin-left: 50px;
        }
    </style>
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
    <h1>Manage Profile</h1>
   <?php
    include("conn.php");
    $id=intval($_GET['id']);
    $result=mysqli_query($con,"SELECT*FROM users WHERE id=$id");
    while($row=mysqli_fetch_array($result))
        {
    ?>

    <form action="update.php" method="post" onsubmit="return checkPassword(this);">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        
        <div>
            <label>Name:</label>
            <input type="text" name="username" required value="<?php echo $row['user_name']?>"><br><br>
        </div>
        <div>
            <label>Email Address:</label>
            <input type="email" name="email" required value="<?php echo $row['user_email']?>"><br><br>
        </div>
        <div>
            <label>Phone Number:</label>
            <input type="tel" name="phone" required value="<?php echo $row['user_phone']?>"><br><br>
        </div>
        <div>
            <label>Address:</label>
            <textarea name="address" required> <?php echo $row['user_address']?> </textarea><br><br>
        </div>
        <div>
            <label>Date of Birth:</label>
            <input type="date" name="dob" required value="<?php echo $row['user_dob']?>"><br><br>
        </div>
        <div>
            <label> Change Password:</label>
            <input class="password" type="password" name="password" required value="<?php echo $row['user_password']?>"><br><br>
        </div>
        <div>
            <label>Confirm Password:</label>
            <input class="conf" type="password" name="confpassword" required value="<?php echo $row['user_password']?>"><br><br>
        </div>
        
        <div>
            <button class="button" type="submit" name="regbtn">Update</button>
            <button class="button" type="reset">Reset</button>
        </div>
    </form>

    <?php        
    }
    mysqli_close($con);
    ?>
</body>
</html>