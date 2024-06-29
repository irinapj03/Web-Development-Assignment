<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>

    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
    body {
	font-family: 'Open Sans', sans-serif;
    display: grid;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
}

input[type=email] {
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 30px;
    text-indent: 10px;
}

input[type=password] {
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 60px;
    text-indent: 10px;
    
}

::placeholder {
    color: grey;
}

button {
    width: 40%;
    height: 25px;
    border-radius: 15px;
    border: 1px solid black;
    margin: 10px;
    position: relative;
    left: 20px;
}

.forgot {
    float: right;
    text-indent: 20px;
}

button:hover {
    background-color: grey;
    color: white;
}

img {
    width: 100px;
    height: 100px;
    position: relative;
    right: 500px;
}

</style>

<body>
    <?php
        include("conn.php");
        session_start();
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $useremail=$_POST['email'];
            $userpassword=$_POST['password'];

            $sql="SELECT*FROM users WHERE user_email='$useremail' and user_password='$userpassword'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result);
            
            if(mysqli_num_rows($result)>0) {
                $_SESSION['mySession']=$row['id'];
                $role = $row['user_role'];
                
                if($role == 'admin') {
                    header("location:homepage.php");
                }
                elseif ($role == 'user') {
                    header("location:profile.php");
                }
                
            }
            
            else {
                echo '<script>alert("Your Email or Password is invalid. Please try again");</script>';
            }
            mysqli_close($con);
        }
    ?>
    <img src="PetLovers.png">
    <div class="form-center">
        <h1>Login</h1>
        <form method="post">
            <div id="box">
                <div>
                    <label>Email address:</label>
                    <input type="email" placeholder="Enter email" name="email" required><br><br>
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" placeholder="Enter Password" name="password" required><br><br>
                </div>
                <div>
                    <input type="checkbox" name="remember">
                    <label>Remember me</label>
                </div>
                <div>
                    <button value="submit">Login</button>
                    <button value="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>