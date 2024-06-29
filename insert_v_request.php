<?php
    include 'conn.php';

    $submit = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['timestamp'])) {
            die('Timestamp value not set in form submission');
        }

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $reason_of_appointment = $_POST['reason_of_appointment'];
        $timestamp = $_POST['timestamp'];

        $sql = "INSERT INTO volunteer_requests (first_name, last_name, email, phone_number, timestamp, reason_of_appointment) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $first_name, $last_name, $email, $phone_number, $timestamp, $reason_of_appointment);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script type='text/javascript'>alert('Request submitted successfully.'); window.location.href='user_homepage.php';</script>"; //! change the file where the user will be directed after the form is submitted 
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>