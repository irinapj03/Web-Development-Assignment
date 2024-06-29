<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .submitBtn:hover {
            background-color: grey;
            color: white;
        }
    </style>

</head>
<body>
    <?php
        include 'navigation_bar.php';
    ?>
    <br><br>

    <h1 style="margin-top: -1px; margin-left: 50px;">Add Pet</h1>



    <div style="width: 620px; padding: 20px; background-color: #fdd700; border: none; border-radius: 15px; margin: 0 auto;">
        <form action="insert_pets.php" method="POST" enctype="multipart/form-data" style="margin-left: 5px; margin-top: 0px;">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required>

            <br><br>

            <label for="type">Type:</label><br>
            <input type="text" id="type" name="type" required>

            <br><br>

            <label for="breed">Breed:</label><br>
            <input type="text" id="breed" name="breed" required>

            <br><br>

            <label for="age">Age:</label><br>
            <input type="number" id="petage" name="age" required>

            <br><br>

            <label for="gender">Gender:</label>

            <label for="male">Male</label>
            <input type="radio" id="gender" name="gender" value="male" required>

            <label for="female">Female</label>
            <input type="radio" id="gender" name="gender" value="male" required>

            <br><br>

            <label for="color">Color:</label><br>
            <input type="text" id="color" name="color"required>

            <br><br>

            <div style="margin-left: 320px; margin-top: -342px;">
            <label for="weight">Weight:</label><br>
            <input type="number" id="weight" name="weight" required>

            <br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="30"></textarea>

            <br><br>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image" accept="image/*" required>

            <br><br>

            <label for="status">Status:</label>
            
            <label for="notadopted">Not adopted</label>
            <input type="radio" id="notadopted" name="status" value="Not adopted" required> 

            <label for="adopted">Adopted</label>
            <input type="radio" id="adopted" name="status" value="Adopted" required>
            </div>

            <br><br>

            <input type="submit" class="submitBtn" name="submitBtn" value="Add Pet" style="margin-top: 60px; font-family: inherit; border: 1px solid black;">
        
        </form>
    </div>
</body>
</html>