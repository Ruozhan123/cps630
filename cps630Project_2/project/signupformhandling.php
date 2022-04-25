<?php

$db=mysqli_connect('localhost','root','','customer_service');

//insertion code//
	  $address = $_POST['street'] . ', ' . $_POST['city'] . " " . $_POST['province'] . ", " . $_POST['postalcode'];
	  $firstname = $_POST['firstname'];
	  $phonenumber = $_POST['phonenumber'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];
		$salt = base64_encode(openssl_random_pseudo_bytes(12));
		$saltpassword = md5($password.$salt);
	  $query="INSERT INTO `user`(`name`, `tel_no`, `email`, `address`, `password`, `salt`) VALUES ('$firstname','$phonenumber','$email','$address','$saltpassword','$salt')";

	  $result=mysqli_query($db,$query);
	  echo "<script>
            alert('User Successfully Signed Up ');
            window.location.href='index.php';
            </script>";

//end insertion code//

?>
