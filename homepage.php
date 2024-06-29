<?php
    include("session.php");

    include("conn.php");
    $user_id=$_SESSION['mySession'];
    $sql = "SELECT user_role FROM users WHERE id='$user_id'" ;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) == 1) {
        $role = $row['user_role'];
        
        if($role == 'user') {
            header("location:profile.php");
            exit();
        }
    }

    else {
        header("location:homepage.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Admin Homepaage</title>
</head>
<body>
    <?php
    include ("conn.php");
    include ("navigation_bar.php");

    $user_id=$_SESSION['mySession'];
    $sql = "SELECT*FROM users WHERE id='$user_id' AND user_role = 'admin'" ;
    $result = mysqli_query($con,$sql);
    $user_icon = "profilepic.png";


    echo '<div class="container">';
        while ($row=mysqli_fetch_array($result)){
            echo '<div id="box1">';
            echo '<img src="profilepic/'.$user_icon.'" width="50">';
            echo '<h3 class="content">'.$row['user_name'].'</h3>';
            echo '<p class="content">'.$row['user_email'].'</p>';
            echo '<p class="content">'.$row['user_phone'].'</p>';
            echo '<p class="content">'.$row['user_address'].'</p>';
            echo '<p class="content">'.$row['user_dob'].'</p>';
            echo '<a class = "button" href ="manageprofileAdmin.php?id='.$row['id'].'">Manage Profile</a>';
            echo '<a class = "button" href ="logout.php?id='.$row['id'].'">Logout</a>';
            echo '</div>';
        }

            echo '<div class="adminBtn-space">';
                echo '<a class = "adminBtn" href = "volunteer_requests.php">Volunteer Requests</a>';
                echo '<a class = "adminBtn" href = "donation_list.php">Donation List</a>';
                echo '<a class = "adminBtn" href = "pet_appointments.php">Pet Appointments</a>';
                echo '<a class = "adminBtn" href = "feedback_list.php">Feedback</a>';
                echo '<a class = "adminBtn" href = "view_pets.php">Pet Lists</a>';
            echo '</div>';
    echo '</div>';
    ?>
    
</body>
</html>