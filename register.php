<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<script>
    var password = document.getElementsByClassName("password").value;
    var confirm_pass = document.getElementsByClassName("conf").value;

    if (password!= confirm_pass) {
        alert(Passwords do not match!);
        return false;
    }
    return true;
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
    body {
	font-family: 'Open Sans', sans-serif;
    display: grid;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
}

input[type=text] {
    width: 300px;
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 110px;
    text-indent: 10px;
}

input[type=email] {
    width:300px;
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 50px;
    text-indent: 10px; 
}

input[type=tel] {
    width:300px;
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 40px;
    text-indent: 10px;
}

.password {
    width:300px;
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 80px;
    text-indent: 10px;
}

.conf {
    width:300px;
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 17px;
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
    right: 450px;
}

input[type=date] {
    width:300px;
    border-radius: 10px;
    background-color: #d9d9d9;
    border: none;
    height: 20px;
    position: relative;
    left: 55px;
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
    left: 90px;
    text-indent: 10px;
}

</style>

<body>
    <img src="PetLovers Logo.png">
    <div class="form-center">
        <h1>Register</h1>
        <form method="post" action="server.php">
            <div id="box">
                <div>
                    <label>Name:</label>
                    <input type="text" placeholder="Enter username" name="username" required><br><br>
                </div>
                <div>
                    <label>Email Address:</label>
                    <input type="email" placeholder="Enter email" name="email" required><br><br>
                </div>
                <div>
                    <label>Phone Number:</label>
                    <input type="tel" placeholder="Enter phone number" name="phone" required><br><br>
                </div>
                <div>
                    <label>Address:</label>
                    <textarea placeholder="Enter address" name="address" required></textarea><br><br>
                </div>
                <div>
                    <label>Date of Birth:</label>
                    <input type="date" placeholder="Enter dob" name="dob" required><br><br>
                </div>
                <div>
                    <label>Password:</label>
                    <input class="password" type="password" placeholder="Enter password" name="password" required><br><br>
                </div>
                <div>
                    <label>Confirm Password:</label>
                    <input class="conf" type="password" placeholder="Confirm pasword" name="conf-password" required><br><br>
                </div>
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
