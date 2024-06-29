<?php
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $requestID = $_POST['volunteer_id'];
        $status = $_POST['status'];

        $sql = "UPDATE volunteer_requests SET `status` = ? WHERE volunteer_id = ?";
        
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'si', $status, $requestID);

            if (mysqli_stmt_execute($stmt)) {
                if ($status == 'Accept') {
                    echo "<script type='text/javascript'>alert('Request accepted successfully.'); window.location.href='volunteer_requests.php';</script>";
                } else if ($status == 'Reject') {
                    echo "<script type='text/javascript'>alert('Request has been rejected.'); window.location.href='volunteer_requests.php';</script>";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>