<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    include ("conn.php");

    $sql = "UPDATE users SET
    user_name='$_POST[username]',
    user_email='$_POST[email]',
    user_phone='$_POST[phone]',
    user_address='$_POST[address]',
    user_dob='$_POST[dob]',
    user_password='$_POST[password]'

    WHERE id=$_POST[id] AND user_role = 'admin';";
    if(mysqli_query($con,$sql)){
        mysqli_close($con);
        header('Location:homepage.php');
    }
    ?>
</body>
</html>