<?php
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $color = $_POST['color'];
        $weight = $_POST['weight'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $image = basename($_FILES['image']['name']);

        $sql = "INSERT INTO pets (name, type, breed, age, gender, color, weight, description, status, image)
                VALUES ('$name', '$type', '$breed', '$age', '$gender', '$color', '$weight', '$description', '$status', '$image')";

        if (mysqli_query($con, $sql)) {
            move_uploaded_file($_FILES['image']['tmp_name'], "image/" . $_FILES['image']['name']);
            header('Location: view_pets.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
?>