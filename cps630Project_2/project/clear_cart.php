<?php
session_start();
if(!empty($_SESSION['shopping_cart']))
{
unset($_SESSION['shopping_cart']);
header('location:cart.php');
}

?>