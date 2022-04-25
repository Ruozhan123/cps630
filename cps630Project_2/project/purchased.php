<?php
include_once('header.php');
$db=mysqli_connect('localhost','root','','customer_service');
$truck = rand(100000,200000);
$user_id =  $_SESSION["userId"];
if (isset($_POST['branch']))
{
$branch = $_POST['branch'];
$address = $_POST['address'];
$date = $_POST['date'];
$query="INSERT INTO `delivery`(`branch`, `address`, `delivery_date`, `truck_id`) VALUES ('$branch','$address','$date','$truck')";
$result=mysqli_query($db,$query);
$delivery_id = $db->insert_id;
}
if (isset($_POST['CreditCardNumber'])) {
$creditCardName = $_POST['creditCardName'];
$CreditCardNumber = $_POST['CreditCardNumber'];
$creditCardExpMonth = $_POST['creditCardExpMonth'];
$creditCardExpYear = $_POST['creditCardExpYear'];
$creditCardCVC = $_POST['creditCardCVC'];
$itemIdArray = $_POST['itemId'];
$itemPriceArray = $_POST['itemPrice'];
$itemQuantityArray = $_POST['itemQuantity'];
$itemTotalPirceArray = $_POST['itemTotalPirce'];
$totalPrice = $_POST['totalPrice'];

$query="INSERT INTO `orders`(`total_price`, `user_id`, `delivery_id`) VALUES ('$totalPrice', '$user_id', '$delivery_id')";
$result=mysqli_query($db,$query);
$order_id = $db->insert_id;

foreach($itemIdArray as $index => $value) {
  $itemId =  $value;
  $itemPrice = $itemPriceArray[$index];
  $itemQuantity =$itemQuantityArray[$index];
  $itemTotalPirce = $itemTotalPirceArray[$index];
  $query="INSERT INTO `product_order`(`order_id`, `product_id`, `quantity`, `price`, `total_price`)
  VALUES ('$order_id','$itemId','$itemQuantity','$itemPrice','$itemTotalPirce')";
  $result=mysqli_query($db,$query);
}

$CreditCardNumber = md5($CreditCardNumber);
$creditCardCVC = md5($creditCardCVC);
$query1="INSERT INTO `order_payment`(`order_id`, `name`, `card_number`, `expired_month`, `expired_year`, `cvc`)
 VALUES ('$order_id','$creditCardName','$CreditCardNumber','$creditCardExpMonth', '$creditCardExpYear', '$creditCardCVC')";
$result1=mysqli_query($db,$query1);
}
unset($_SESSION['shopping_cart']);
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
<h1 style="font-size:75px;text-align:center;"> Thank You for Shopping Online With Us! </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="" method="post">


        <div style="text-align:center;margin:auto;">
		<img src="https://www.alwaysonpurpose.com/wp-content/uploads/2019/11/happypeople-1024x679.jpg" style=" width:75%;">
        </div>
<br>
<h3>Truck <?php echo $truck; ?> will deliver your package</h3><br>

		<form method="post" action="">
			<input type="button" value="Click here to track your package"></input>
		</form>
		<hr>
<form action="index.php">
<input type="submit" value="Return to Home Page"></input>
</form>


</form>

</div>
</body>
</html>
