<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pets</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            background: snow;
        }
        
        h1 {
            margin-top: -1px !important;
            padding-left: 5px;
        }
        
        .add_pet_button {
            background-color: navy;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 6px 2px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin-left: 50px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 2px;
            text-decoration: none;
            background-color: #f1f1f1;
            color: black;
            border: 1px solid black;
            text-align: center;
            transition: background-color 0.3s ease;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .button:hover {
            background-color: #4169e1;
            color: white;
        }

        .pets {
            display: flex;
            flex-wrap: wrap;
        }

        .pet {
            width: calc(33.33% - 10px);
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            width: 350px;
            height: 600px;
            background-color: #d9d9d9;
            float: right;
            padding: 10px;
            margin-left: 50px;
            border-radius: 5px;
            border: 1px #000000 solid;
            margin-top: 10px;
        }

        .pet_image {
            position: relative;
            width: 40%;
            padding-top: 40%; 
            overflow: hidden;
            border: 1px solid black;
            box-sizing: border-box;
            margin-left: 50px;
        }

        .pet_image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pet-info {
            padding: 10px;
            margin-left: -50px;
        }

        p {
            margin-top: 30px;
        }

        @media screen and (max-width: 767px) {
            .pet {
                flex-basis: calc(50% - 10px);
            }
        }

    </style>

</head>
<body>
    <?php
        include 'conn.php';
        include 'navigation_bar.php';

        $result = mysqli_query($con, "SELECT * FROM pets");

        if (!$result) {
            die ("Error in SQL query:" . mysqli_error($con));
        }
    ?><br><br>
    
    <h1>View Pets</h1>

    <a href="add_pets.php" class="add_pet_button">Add Pet</a>

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

            <?php
                echo '<a href="edit_pets.php?id=' . $pet['petID'] . '" class="button" style="margin-left: 50px;">Edit</a>';
                echo '<br>';
            ?>
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
