<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="browsePets.css">
    <title>Browse Pets</title>
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
    <h1>Browse Pets</h1>
    <?php
        include 'conn.php';
       
        $result = mysqli_query($con, "SELECT * FROM pets");

        if (!$result) {
            die ("Error in SQL query:" . mysqli_error($con));
        }
    ?>
    <div class="pets">
    <?php while ($pet = mysqli_fetch_assoc($result)): ?>
        <div class="pet">
            
            <div class="pet-info">
                <div class="pet_image">
                    <img src="image/<?php echo $pet['image']; ?>" alt="pet image">
                </div>
                <p>Name: <?php echo ($pet['name']); ?></p>
                <p>Age: <?php echo ($pet['age']); ?> years old</p>
                <p>Color: <?php echo ($pet['color']); ?></p>
                <p>Status: <?php echo ($pet['status']); ?></p>
            </div>
        </div>
    <?php endwhile; ?>
    </div>

    <?php
        mysqli_free_result($result);
        
        mysqli_close($con);
    ?>
        
</body>
</html>