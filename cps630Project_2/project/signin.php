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
<h1> Sign In </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="checksignin.php" method="post">


        <div>

        <h3>Account Information</h3>

        <hr>
        E-Mail  <br>
        <input type="text" name="email" style="width:250px;">
        <br>

        Password  <br>
        <input type="password" name="password" style="width:250px;">
        <br>


        </div>

<div style="margin-top:50px;">
<input type="submit" value="Continue">
</div>

</form>

</div>
</body>
</html>
