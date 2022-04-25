<!-- Header section end -->
<?php
include_once('header.php');
include('db.php');

 if(isset($_POST["add-to-cart"]))
 {
      if(isset($_SESSION["shopping_cart"]))
      {


           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

           if(!in_array($_GET["product_id"], $item_array_id))
           {




                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'               =>     $_GET["product_id"],
                     'item_name'               =>     $_POST["hidden_name"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'          =>     $_POST["quantity"],
                     'item_condition'          =>     $_POST["hidden_condition"],
					 'item_img'                =>     $_POST["image"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="index.php"</script>';
           }
      }
      else
      {

           $item_array = array(
                'item_id'               =>     $_GET["product_id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"],
                'item_condition'          =>     $_POST["hidden_condition"],
				'item_img'                =>     $_POST["image"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }

 }


 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {

           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="cart.php"</script>';
                }
           }
      }
 }
 ?>
  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>CPS 630 - Smart Customer Services - Shopping Cart</h1>

      </div>
    </section>
    <div class="container">
    <div class="row">
      <?php
                          if(!empty($_SESSION["shopping_cart"]))
                          {
                               $total = 0;
                               $t_cost = 0;
                               foreach($_SESSION["shopping_cart"] as $keys => $values)
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

              }

               else
               {
                ?>
                <tr>
              <td>No Items in the Cart</td>
              <br>
              </tr>
      <?php
                }


                          ?>


                </div>
                <?php
        if(!empty($_SESSION["shopping_cart"]))
              {
                ?>

        <span><h2>Total Bill : $<?php echo ($total); ?></h2></span>
        <?php } ?>
        <a href="clear_cart.php" style="color: white" class="btn btn-success">CLEAR CART</a>
                 <a href="index.php" class="btn btn-success">CONTINUE SHOPPING</a>
		<a href="checkout.php" class="btn btn-success">CHECKOUT</a>
              </div>
  </main>

</body>

</html>
