<?php
session_start();
   $_SESSION["isLoggedIn"] = false;
   $_SESSION["email"] = "";
   echo "<script>
            alert('User Successfully Signed Out ');
            window.location.href='index.php';
            </script>";
?>