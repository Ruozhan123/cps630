<?php
include_once('header.php');
?>

<style>

.spacing{
        margin-left: 600px;
        margin-right: 600px;
        margin-top: 75px;

}

h1{margin-top: 50px; color: black;}
hr{margin-top: 30px}


h3, p {color:black;}
h3 {margin-top: 30px; font-size:1.3em}

input, p {margin-right: 50px;
                margin-bottom: 20px;}
.buttonM {margin-right: 20px;}






</style>

<body>
<div class="spacing">
<h1> Sign Up </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="signupformhandling.php" method="post">

        <div>
        <h3>Personal Information </h3>
        <hr>
        <h4> Full Name </h4>
        First Name * <input type="text" name="firstname" style="width:300px;">
        <br>
        Last Name * <input type="text" name="lastname" style="width:300px;">


        <h4>Gender</h4>


        <input class="buttonM" type="radio" name="G" value="Male">Male <br>
        <input class="buttonM" type="radio" name="G" value="Female">Female  <br>
        <input class="buttonM" style="margin-bottom: 0px;"type="radio" name="G" value="Other">Other


        </div>

        <div>
        <h3>Address</h3>
        <hr>
        Street Name * <br> <input type="text" name="street" style="width:250px;">
        <br>
        City * <br><input type="text" name="city" style="width:250px;">
        <br>
        Postal Code * <br><input type="text" name="postalcode" style="width:100px;">
        <br>
        <label for="province">Province * </label> <br>
        <select id="province" name="province">
                  <option value="Ontario">Ontario</option>
                  <option value="Quebec">Quebec</option>
                  <option value="Alberta">Alberta</option>
                  <option value="British Columbia">British Columbia</option>

                  <option value="Manitoba">Manitoba</option>
                  <option value="New Brunswick">New Brunswick</option>
                  <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                  <option value="Northwest Territories">Northwest Territories</option>

                  <option value="Nova Scotia">Nova Scotia</option>
                  <option value="Nunavut">Nunavut</option>
                  <option value="Prince Edward Island">Prince Edward Island</option>
                  <option value="Saskatchewan">Saskatchewan</option>
                  <option value="Yukon">Yukon</option>
        </select>

        </div>


        <div>

        <h3>Account Information</h3>

        <hr>
        E-Mail * <br>
        <input type="text" name="email" style="width:250px;">
        <br>

        Password * <br>
        <input type="password" name="password" style="width:250px;">
        <br>

        Phone Number  <br><input type="text" name="phonenumber" style="width:250px;">
        </div>

<div style="margin-top:50px;">
<input type="submit" value="Continue">
</div>

</form>

</div>
</body>
</html>
