<?php
    include("navigation_bar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profile</title>
    <script>
        function checkPassword(form) {
            var password = form.password.value;
            var confirm_pass = form.confpassword.value;

            if (password != confirm_pass) {
                alert("Passwords do not match!")
                return false;
            }
            else {
                alert("Record updated!")
                return true;
            }   
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    
        body {
            font-family: 'Montserrat', sans-serif;
            }

            input[type=text] {
            width: 300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 170px;
            text-indent: 10px;
        }

        input[type=email] {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 105px;
            text-indent: 10px; 
        }

        input[type=tel] {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 95px;
            text-indent: 10px;
        }

        .password {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 75px;
            text-indent: 10px;
        }

        .conf {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 75px;
            text-indent: 10px;
        }

        input[type=date] {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 118px;
            text-indent: 5px;
            color: black;
        }

        textarea {
            width:300px;
            border-radius: 10px;
            background-color: #d9d9d9;
            border: none;
            height: 20px;
            position: relative;
            left: 155px;
            text-indent: 10px;
        }

        .button {
            width: 10%;
            height: 25px;
            border-radius: 15px;
            border: 1px solid black;
            margin: 20px;
            position: relative;
            left: 90px;
        }

        .button:hover {
            background-color: grey;
            color: white;
        }
        
        h1 {
            margin-left: 50px;
            margin-top: 60px;
        }

        form {
            margin-left: 50px;
        }
    </style>
</head>
<body>
    <h1>Manage Profile</h1>
    <?php
        include("conn.php");
        $id=intval($_GET['id']);
        $result=mysqli_query($con,"SELECT*FROM users WHERE id=$id and user_role = 'admin'");
        while($row=mysqli_fetch_array($result))
            {
    ?>

    <form action="updateAdmin.php" method="post" onsubmit="return checkPassword(this);">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        
        <div>
            <label>Name:</label>
            <input type="text" name="username" required value="<?php echo $row['user_name']?>"><br><br>
        </div>
        <div>
            <label>Email Address:</label>
            <input type="email" name="email" required value="<?php echo $row['user_email']?>"><br><br>
        </div>
        <div>
            <label>Phone Number:</label>
            <input type="tel" name="phone" required value="<?php echo $row['user_phone']?>"><br><br>
        </div>
        <div>
            <label>Address:</label>
            <textarea name="address" required> <?php echo $row['user_address']?> </textarea><br><br>
        </div>
        <div>
            <label>Date of Birth:</label>
            <input type="date" name="dob" required value="<?php echo $row['user_dob']?>"><br><br>
        </div>
        <div>
            <label> Change Password:</label>
            <input class="password" type="password" name="password" required value="<?php echo $row['user_password']?>"><br><br>
        </div>
        <div>
            <label>Confirm Password:</label>
            <input class="conf" type="password" name="confpassword" required value="<?php echo $row['user_password']?>"><br><br>
        </div>
        
        <div>
            <button class="button" type="submit" name="regbtn">Update</button>
            <button class="button" type="reset">Reset</button>
        </div>
    </form>

    <?php        
    }
    mysqli_close($con);
    ?>
</body>
</html>