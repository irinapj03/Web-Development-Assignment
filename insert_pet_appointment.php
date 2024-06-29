<?php
    include 'conn.php';

    $submit = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!isset($_POST['timestamp'])) {
            die('Timestamp value not set in form submission');
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $reason_of_appointment = $_POST['reason_of_appointment'];
        $timestamp = $_POST['timestamp']; 

        $sql = "INSERT INTO pet_appointments (name, email, reason_of_appointment, timestamp) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $reason_of_appointment, $timestamp);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script type='text/javascript'>alert('Appointment made successfully.'); window.location.href='browse_pets.php';</script>"; //! change the file where the user will be directed after the form is submitted
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>