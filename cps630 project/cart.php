<!-- Header section end -->
<?php   
session_start();  
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
                     'item_condition'          =>     $_POST["hidden_condition"]  
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
                'item_condition'          =>     $_POST["hidden_condition"]   
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
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Shopping Cart</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
  <script>
    function allowDrop(ev) {
      ev.preventDefault();
    }

    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
    }
    </script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
      <a class="navbar-brand mb-0 h1" href="index.html">CPS 630</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.html">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reviews.html">Reviews</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Types of Services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="services/onlineshopping.html">Online Shopping</a>
              <a class="dropdown-item" href="services/delivery.html">Delivery</a>
            </div>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link " href="#"><button id="createPostBtn" class="btn btn-outline-info my-2 my-sm-0" type="button">Shopping Cart</button></a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.html"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.html"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign in</button></a>
            </li>
        </ul>
      </div>
    </nav>
  </header>

  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>CPS 630 Shopping Cart</h1>

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
                 <img id="drag2" draggable = "true" ondragstart="drag(event)" class="card-img-top" width="100%" height="100%" role="img" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE4LqQX?ver=1f00&q=90&m=6&h=705&w=1253&b=%23FFFFFFFF&f=jpg&o=f&p=140&aim=true"><rect width="100%" height="100%" fill="#55595c"/>
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
       
        <span><h2>Total Bill : $<?php echo number_format($total); ?></h2></span>
        <?php } ?>
        <a href="clear_cart.php" style="color: white" class="btn btn-warning">CLEAR CART</a> 
                 <a href="index.php" class="btn btn-success">CONTINUE SHOPPING</a>   
              </div>
  </main>

</body>

</html>
