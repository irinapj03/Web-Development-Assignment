<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigation_bar.css">
    <title>Home</title>
</head>
<body>
    <div class="topnav">
        <img class="logo" src="PetLovers.png">
        <a class="active" href="homepage.php">Home</a>

        <a href="about_us.php">Edit Shelter Info</a>

        <div class="dropdown">
            <a>
                <button class="dropBtn">Pets</button>
            </a>
            <div class="dropdowncontentpets">
                <a href="add_pets.php">Add Pet</a>
                <a href="view_pets.php">View Pets</a>
            </div>
        </div>

        <div class="dropdown">
            <a>
                <button class="dropBtn">Appointments</button>
            </a>
            <div class="dropdowncontentappointment">
                <a href="confirmed_pet_appointment.php">Pet Appointment</a>
                <a href="confirmed_v_requests.php">Volunteer Requests</a>
            </div>
        </div>            
        
    </div>
</body>
</html>