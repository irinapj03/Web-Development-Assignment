<?php
    include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="donate.css">
    <title>Donation</title>

    <script>
        function checkMethod(){
            var getSelectedMethod = document.querySelector('input[name="paymethod"]:checked');

            if(getSelectedMethod !=null){
                var selectedValue = getSelectedMethod.value;

                document.getElementById("containdebit").style.display="none";
                document.getElementById("containfpx").style.display="none";

                if (selectedValue == "Debit/Credit"){
                    document.getElementById("containdebit").style.display="block";
                    document.getElementById("containfpx").style.display="none";
                }

                

                else if (selectedValue == "FPX"){
                    document.getElementById("containfpx").style.display="block";
                    document.getElementById("containdebit").style.display="none";
                } 
            }
            else{
                document.getElementById("error").innerHTML="You have not choosen a payment method";
            }
        }
    </script>
</head>
<body>
    <div class="topnav">
        <img class="logo" src="PetLovers.png">
        <a class="active" href="profile.php">Home</a>
        <a href="about.php">About</a>
        <div class="dropdown">
            <a>
                <button class="dropBtn">Volunteer</button>
            </a>
            <div class="dropdowncontentvolunteer">
                <a href="volunteerRequest.php">Request to Volunteer</a>
            </div>
        </div>
        <div class="dropdown">
            <a>
                <button class="dropBtn">Donate</button>
            </a>
            <div class="dropdowncontentdonate">
                <a href="donate.php">Donate</a>
            </div>
        </div>
        <div class="dropdown">
            <a>
                <button class="dropBtn">Adopt</button>
            </a>
            <div class="dropdowncontentadopt">
                <a href="browsePets.php">Browse Pets</a>
                <a href="appointment.php">Book Appointment</a>
            </div>
        </div>
    </div><br><br>
    <h1>Donation</h1>
    <form method = "post">
        <a class="font">
            <div>
                <label>Enter An Amount:</label><br>
                <input type="text" placeholder="Enter amount" name="amount" required><br><br>
            </div>

            <div id="paymentMethod">
                <label>Select Payment Method</label><br><br>
                <input type="radio" name="paymethod" id="Debit/Credit" value="Debit/Credit" required onclick="checkMethod()">Debit Card/Credit Card<br><br>
                <input type="radio" name="paymethod" id="FPX" value="FPX" required onclick="checkMethod()">FPX Online Banking<br><br>

            </div>
            
            <h4 id="error" style= "color:red"> </h4>
        </a>
        
            
            <div id="containdebit" style="display:none;">
                <a class="font">
                    <label>Credit Card/Debit Card Number:</label><br>
                    <input type="text" placeholder="Enter card number" name="card_num"><br><br>

                    <label>Security Code:</label><br>
                    <input type="text" placeholder="CVV" name="sec_code"><br><br>

                    <button id="confirmBtn" value="confirmDebit" name="confirmDebit">Confirm</button>
                    <button id="confirmBtn" value="cancelDebit" name="cancelDebit">Cancel</button>

                <a>
                
            </div>
            
            <div id="containfpx" style="display:none;">
                <a class="font">
                    <label>Select Bank:</label><br><br>
                    <select name="bank">
                        <option value="">Select bank</option>
                        <option value="Bank 1">RHB Bank</option>
                        <option value="Bank 2">CIMB Clicks</option>
                        <option value="Bank 3">Maybank 2U</option>
                        <option value="Bank 4">Affin Bank</option>
                        <option value="Bank 5">Hong Leong Connect</option>
                    </select>

                    <br><br>

                    <button id="confirmBtn" value="confirmFpx" name="confirmFpx">Confirm</button>
                    <button id="confirmBtn" value="cancelFpx" name="cancelFpx">Cancel</button>
                <a->
                
            </div>
    </form>
    <?php
        include("conn.php");

        if(isset($_POST['confirmDebit'])) {
            $amount = $_POST['amount'];
            $date = date("Y-m-d");
            $user_id=$_SESSION['mySession'];

            $sql="INSERT INTO donations (amount, date, user_id) VALUES ('$amount', '$date', '$user_id')";
            $result = mysqli_query($con, $sql);

            if($result){
                echo "<script>alert('Donation successful using Debit');</script>";
                echo "<script>window.location.href='profile.php';</script>";
            }
            else {
                echo "<script>alert('Error: Unable to process donation');</script>";
            }
        }

        else if(isset($_POST['confirmFpx'])) {
            $amount = $_POST['amount'];
            $date = date("Y-m-d");
            $user_id=$_SESSION['mySession'];

            $sql="INSERT INTO donations (amount, date, user_id) VALUES ('$amount', '$date', '$user_id')";
            $result = mysqli_query($con, $sql);

            if($result){
                echo "<script>alert('Donation successful using FPX');</script>";
                echo "<script>window.location.href='profile.php';</script>";
            }
            else {
                echo "<script>alert('Error: Unable to process donation');</script>";
            }
        }
    ?>
</body>
</html>