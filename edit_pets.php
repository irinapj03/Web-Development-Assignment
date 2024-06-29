<?php
    include 'conn.php';
    include 'navigation_bar.php';

    $petID = $_GET['id']; 

    $result = mysqli_query($con, "SELECT * FROM pets WHERE petID = $petID");

    if ($result === false) {
        echo "Error: " . mysqli_error($con);
    } else {
        $pet = mysqli_fetch_assoc($result);
    }

    try {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $breed = $_POST['breed'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $color = $_POST['color'];
            $weight = $_POST['weight'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $petID = $_POST['petID'];

            if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image = $_FILES['image']['name'];
            } else {
                $image = isset($pet['image']) ? $pet['image'] : '';
            } 

            $stmt = mysqli_prepare($con, "UPDATE pets SET name = ?, type = ?, breed = ?, age = ?, gender = ?, color = ?, weight = ?, description = ?, image = ?, status = ? WHERE petID = ?");

            if ($stmt === false) {
                throw new Exception("Error in preparing the statement: " . mysqli_error($con));
            }

            mysqli_stmt_bind_param($stmt, "ssssssssssi", $name, $type, $breed, $age, $gender, $color, $weight, $description, $image, $status, $petID);

            $result = mysqli_stmt_execute($stmt);

            if ($result === false) {
                throw new Exception("Error in executing the statement: " . mysqli_error($con));
            } else {
                mysqli_stmt_close($stmt);
                header("Location: view_pets.php");
                exit;

            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?><br>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .submitBtn {
        border: 1px black solid;
    }
    
    .submitBtn:hover {
        background-color: grey;
        color: white;
    }
</style>

<h2 style="margin-left: 50px;">Edit Pet</h2>

<div style="width: 600px; padding: 20px; background-color: #fdd700; border: none; border-radius: 15px; margin: 0 auto;">
    <form method="POST" enctype="multipart/form-data" style="margin-left: 5px; margin-top: 20px;">
    <label>Name: <input type="text" name="name" value="<?php echo $pet['name']; ?>"></label>
        
        <br><br>

        <label>Type: <input type="text" name="type" value="<?php echo $pet['type']; ?>"></label>
        
        <br><br>
        
        <label>Breed: <input type="text" name="breed" value="<?php echo $pet['breed']; ?>"></label>
        
        <br><br>
        
        <label>Age: <input type="text" name="age" value="<?php echo $pet['age']; ?>"></label>
        
        <br><br>
        
        <label>Gender <input type="text" name="gender" value="<?php echo $pet['gender']; ?>"></label>
        
        <br><br>
        
        <label>Color: <input type="text" name="color" value="<?php echo $pet['color']; ?>"></label>
        
        <br><br>
        
        <div style="margin-left: 270px; margin-top: -249px;">
        <label>Weight: <input type="text" name="weight" value="<?php echo $pet['weight']; ?>"></label>
        
        <br><br>
        
        <label>Description: <textarea name="description"><?php echo $pet['description']; ?></textarea></label>
        
        <br><br>
        
        <label>Image: <input type="file" name="image" value="<?php echo $pet['image']; ?>"></label>
        
        <br><br>

        <label>Status:</label>

        <input type="radio" id="notadopted" name="status" value="Not adopted" <?php echo ($pet['status'] == 'Not adopted') ? 'checked' : ''; ?>>
        <label for="notadopted">Not adopted</label>

        <input type="radio" id="adopted" name="status" value="Adopted" <?php echo ($pet['status'] == 'Adopted') ? 'checked' : ''; ?>>
        <label for="adopted">Adopted</label>
        </div>

        <br><br>
        
        <input type="hidden" name="petID" value="<?php echo $pet['petID']; ?>">
        <input type="submit" class="submitBtn" value="Update" style="margin-top: 50px; font-family: inherit;">
</div>
</form>