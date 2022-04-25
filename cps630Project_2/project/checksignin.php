<?php
session_start();
$db=mysqli_connect('localhost','root','','customer_service');
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$query="SELECT id, salt FROM `user` WHERE `email` = '$email'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);
$salt=$row['salt'];
$saltpassword = md5($password.$salt);
$query="SELECT id FROM `user` WHERE `email` = '$email' and `password` = '$saltpassword'";
$result=mysqli_query($db,$query);

if (mysqli_num_rows($result) == 0) {
   echo "<script>
            alert('User not found ');
			window.location.href='signin.php';
            </script>";
} else {
   $_SESSION["isLoggedIn"] = true;
   $_SESSION["email"] = $email;
   $_SESSION["userId"] = $row['id'];
   echo "<script>
            alert('User Successfully Signed In ');
            window.location.href='index.php';
            </script>";
}
?>
