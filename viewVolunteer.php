<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Volunteer Request</title>
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
    
    h1 {
        margin-left: 50px;
    }

    table {
        width: 90%;
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
        background-color: #d9d9d9;
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
    <h1>Volunteer Request Details</h1><br>
    <table>
        <tr>
            <th>Volunteer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
        </tr>
        <?php
        include("conn.php");
        
        $user_id = $_SESSION['mySession'];
        $sql = "SELECT * FROM  volunteer_requests WHERE user_id = $user_id";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) > 0 ) {
            while ($row=mysqli_fetch_array($result)) {
                echo '<tr>';
                    echo '<td>'.$row['volunteer_id'].'</td>';
                    echo '<td>'.$row['first_name'].'</td>';
                    echo '<td>'.$row['last_name'].'</td>';
                    echo '<td>'.$row['user_email'].'</td>';
                    echo '<td>'.$row['user_phone'].'</td>';
                    echo '<td>'.$row['status'].'</td>';
                echo '</tr>';
            }
        }

        else {
            echo '<td colspan = "6"; style="text-align: center;">No requests!</td>';
        }
        
        ?>
    </table>
    
</body>
</html>