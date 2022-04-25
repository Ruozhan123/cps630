<?php
include_once('header.php');
if($_SESSION["isLoggedIn"] == false){
    exit(header("Location: signin.php"));
}
$shopping_cart = $_SESSION["shopping_cart"];

$total = 0;
?>
<style>

.spacing{
        margin-left: 300px;
        margin-right: 300px;
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
<h1> Check-Out </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="purchased.php" method="post">


        <div>

        <h3>Delivery</h3>
        <hr>
        Branch Location <div style="float:right;"> <h4> Delivery Map </h4><div style="height:300px;width:300px;border:2px solid black;"></div></div>
		<br>
        <select id="branch" name="branch">
                  <option value="Branch1">Branch1</option>
                  <option value="Branch2">Branch2</option>
                  <option value="Branch3">Branch3</option>
                  <option value="Branch4">Branch4</option>
        </select>
        <br><br>
		Destination Address
		<br>
		<input type="text" name="address" style="width:300px;">
		<br>

        Date and Time<br>

        <input type="date" name="date" id="datefield">
        <br><br>

		<h3> Payment </h3>     <hr style="max-width: 50%;margin: 0px;"><br>

		Name on Card *<br>
		<input type="text" name="creditCardName" style="width:300px;">
		<br>
		Credit Card Number *<br>
		<input type="text" name="CreditCardNumber" style="width:300px;">
		<br>
		Exp Month *<br>
		<input type="text" name="creditCardExpMonth" style="width:300px;">
		<br>
		Exp Year *<br>
		<input type="text" name="creditCardExpYear" style="width:300px;" maxlength="4">
		<br>
		CVC *<br>
		<input type="text" name="creditCardCVC" style="width:300px;" maxlength="3">
		<br>

		<h3>invoice Summary</h3>
        <hr style="max-width: 50%;margin: 0px;"><br>

		<div>
			Items:
			<?php
			foreach($shopping_cart as $keys => $values)
                               {
                          ?>
    <div class="col-md-4">

                 <div class="card mb-4 shadow-sm">
                  <div class="postimages">
                 <img id="drag2" draggable = "true" ondragstart="drag(event)" class="card-img-top" width="100%" height="100%" role="img" src="<?php echo $values["item_img"]; ?>"><rect width="100%" height="100%" fill="#55595c"/>
                </div>
                 <div class="card-body">
                 <p style = "text-align : center" class="card-text"><?php echo $values["item_name"]; ?></p>
                  <ul class="list-group list-group-flush">
                  <input type="hidden" name="itemId[]" value=<?php echo $values["item_id"];?>>
                  <input type="hidden" name="itemPrice[]" value=<?php echo $values["item_price"];?>>
                  <input type="hidden" name="itemQuantity[]" value=<?php echo $values["item_quantity"];?>>
                  <input type="hidden" name="itemTotalPirce[]" value=<?php echo $values["item_quantity"];?>>
                  <li class="list-group-item">Price: $<?php echo $values["item_price"]; ?></li>
                  <li class="list-group-item">Condition: <?php echo $values['item_condition']; ?></li>
                   <li class="list-group-item">Quantity: <?php echo $values['item_quantity']; ?></li>
                   <li class="list-group-item">Total Price: $<?php echo $values['item_quantity'] * $values['item_price']; ?></li>
                  </ul>
                  <!-- <input type="number" name="quantity" value="1"> -->

                  <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" style="margin-left: 35%" class="btn btn-danger">Remove</a>

                  </div>
                  </div>
                  </div>
                  <?php

              $total = $total + ($values["item_quantity"] * $values["item_price"]);
                  }
				  ?>
		</div>
    <input type="hidden" name="totalPrice" value=<?php echo $total;?>>
		<br><br>

		<hr style="max-width: 50%;margin: 0px;background-color:black;">

		<div>
			<span><h2>Total Price : $<?php echo ($total); ?></h2></span>
		</div>

        </div>

<div style="margin-top:50px;">
<input type="submit" value="Process Payment and Continue">
</div>

</form>

</div>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if(dd<10){
  dd='0'+dd
}
if(mm<10){
  mm='0'+mm
}

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);
</script>
</body>
</html>
