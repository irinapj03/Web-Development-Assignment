<?php
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $appointmentID = $_POST['appointment_id'];
        $status = $_POST['status'];

        $sql = "UPDATE appointment SET status = ? WHERE appointment_id = ?";
        
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'si', $status, $appointmentID);

            if (mysqli_stmt_execute($stmt)) {
                if ($status == 'Confirm') {
                    echo "<script type='text/javascript'>alert('Appointment confirmed successfully.'); window.location.href='pet_appointments.php';</script>";
                } else if ($status == 'Reject') {
                    echo "<script type='text/javascript'>alert('Appointment has been rejected.'); window.location.href='pet_appointments.php';</script>";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }xa
?>
