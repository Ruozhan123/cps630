<?php
include('db.php');
$query="SELECT * FROM `product`";
$result=mysqli_query($db,$query);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>CPS 630 Project</title>
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

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Db Maintain
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target="#myModal">Insert</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#selectModal">Select</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#updateModal">Update</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#searchModal">Search</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal">Delete</a>

            </div>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link " href="cart.php"><button id="createPostBtn" class="btn btn-outline-info my-2 my-sm-0" type="button">Shopping Cart</button></a>
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
      </div>
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- The form -->
<form class="example" action="action_page.php">
  <input type="text"  placeholder="Search.." id="search_text" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
      </div>
    </section>
  <!--   <div class="card" style="position: fixed;bottom: 30%;right: 3%;height: 500px;width: 300px;" id = "drag1" class = "b" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="card-header">
          Shopping Cart
        </div>
        <form action="checkout.html">
            <button style="text-align:center; position: absolute; bottom:5%; right: 35%" type="submit" class="btn btn-info">Checkout</button>
        </form>
      </div> -->
    <div class="container">

        <div class="row">

                  <?php
                  while($row=mysqli_fetch_assoc($result))
                  	{?>

                  <div class="col-md-4">
                 <div class="card mb-4 shadow-sm">
                  <div class="postimages">
                 <img id="drag2" draggable = "true" ondragstart="drag(event)" class="card-img-top" width="100%" height="100%" role="img" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE4LqQX?ver=1f00&q=90&m=6&h=705&w=1253&b=%23FFFFFFFF&f=jpg&o=f&p=140&aim=true"><rect width="100%" height="100%" fill="#55595c"/>
                </div>
                 <div class="card-body">
                 <p style = "text-align : center" class="card-text"><?php echo $row['name']; ?></p>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item">Price: $<?php echo $row['price']; ?></li>
                  <li class="list-group-item">Condition: <?php echo $row['product_condition']; ?></li>
                  </ul>
                  <!-- <input type="number" name="quantity" value="1"> -->
                  <form method="post" action="cart.php?action=add&product_id=<?php echo $row['id']?>" enctype="multipart/form-data">
                  	<input type="number" class="form-control" name="quantity" value="1">
                  	<br>
                  <input type="hidden" name ="hidden_name" class="form-control" value="<?php  echo $row['name'];  ?>">
                  <input type="hidden" name ="hidden_price" class="form-control" value="<?php  echo $row['price'];  ?>">
                  <input type="hidden" name ="hidden_condition" class="form-control" value="<?php  echo $row['product_condition'];  ?>">
                  <button type="submit" class="btn btn-danger" name="add-to-cart" style="margin-left: 30%">ADD TO CART</button>
                  </form>
                  </div>
                  </div>
                  </div>

               <?php
               }
               ?>

              </div>
          </div>
    <div id="result">

    </div>

     <div id="search_result">

    </div>

  </main>

<!-- Insert modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Database Insertion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <form action="database_actions.php" method="POST" enctype= "multipart/form-data" onsubmit="return insertion_validation()">
  <div class="form-group">
    <label for="exampleInputEmail1">Table</label>
    <select name="table" id="table" class="form-control"  onchange="show_div()" required="">
      <option value="">Select Table</option>
      <option value="order">Order Table</option>
      <option value="product">Product Table</option>
    </select>
  </div>
  <div style="display: none" id="product_div">
  <div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" >
  </div>
  <div class="form-group">
 <label for="price">Price</label>
 <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" >
  </div>
  <div class="form-group">
    <label for="product_condition">Product Condition</label>
    <input type="text" class="form-control" name="product_condition" id="product_condition" placeholder="Enter Product Condition" >
  </div>
 </div>

<div style="display: none" id="order_div">
  <div class="form-group">
    <label for="date_issued">Date Issued</label>
    <input type="date" class="form-control" name="date_issued" id="date_issued" >
  </div>
   <div class="form-group">
    <label for="date_done">Date Done</label>
    <input type="date" class="form-control" name="date_done" id="date_done" >
  </div>
  <div class="form-group">
    <label for="total_price">Total Price</label>
    <input type="number" class="form-control" name="order_total_price" id="order_total_price" >
  </div>
  <div class="form-group">
    <label for="payment_code">Payment Code</label>
    <input type="text" class="form-control" name="payment_code" id="payment_code" placeholder="Enter Payment Code" >
  </div>
  <div class="form-group">
    <label for="user_id">User ID</label>
    <input type="number" class="form-control" name="user_id" id="user_id" placeholder=""  >
  </div>
  <div class="form-group">
    <label for="user_id">Trip ID</label>
    <input type="number" class="form-control" name="trip_id" id="trip_id" placeholder=""  >
  </div>
  <div class="form-group">
    <label for="user_id">Reciept ID</label>
    <input type="number" class="form-control" name="reciept_id" id="reciept_id" placeholder=""  >
  </div>
</div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End Insert modal -->

<!-- select modal -->
<div class="modal" id="selectModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Database Selection</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <div class="form-group">
    <label for="select_table">Table</label>
    <select name="select_table" id="select_table" class="form-control"  onchange="show_select_div()" required="">
      <option value="">Select Table</option>
      <option value="order">Order Table</option>
      <option value="product">Product Table</option>
    </select>
  </div>
  <div style="display: none" id="product_select_div">
  <div class="form-group">
    <label for="product_column_name">Column</label>
    <select name="product_column_name" id="product_column_name" class="form-control">
      <option value="">Select Column</option>
      <option value="id">Product ID</option>
      <option value="name">Name</option>
      <option value="price">Price</option>
      <option value="product_condition">Product Condition</option>
    </select>
  </div>
  <div class="form-group">
    <label for="product_value">Value</label>
    <input type="text" class="form-control" name="Please value as column selected" id="product_value" >
  </div>
  <button  onclick="filter_data()" class="btn btn-primary">Submit</button>
 </div>

<div style="display: none" id="order_select_div">
  <div class="form-group">
    <select name="order_column_name" id="order_column_name" class="form-control">
      <option value="id">Order ID</option>
      <option value="total_price">Total Price</option>
      <option value="payment_code">Payment Code</option>
    </select>
  </div>
  <div class="form-group">
    <label for="order_value">Value</label>
    <input type="text" class="form-control" name="Please value as column selected" id="order_value" >
  </div>
  <button  onclick="filter_data()" class="btn btn-primary">Submit</button>
 </div>


</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End select modal -->

<!-- Update modal -->
<div class="modal" id="updateModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Database Updation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <form action="database_actions.php" method="POST" enctype= "multipart/form-data" onsubmit="return updation_validation()">
  <div class="form-group">
    <label for="exampleInputEmail1">Table</label>
    <select name="update_table" id="update_table" class="form-control"  onchange="show_update_div()" required="">
      <option value="">Select Table</option>
      <option value="order">Order Table</option>
      <option value="product">Product Table</option>
    </select>
  </div>
  <div style="display: none" id="product_update_div">
  <div class="form-group">
  <label for="update_name">Name</label>
  <input type="text" class="form-control" name="update_name" id="update_name" placeholder="Enter Name" >
  </div>
  <div class="form-group">
 <label for="update_price">Price</label>
 <input type="number" class="form-control" name="update_price" id="update_price" placeholder="Enter Price" >
  </div>
  <div class="form-group">
    <label for="update_product_condition">Product Condition</label>
    <input type="text" class="form-control" name="update_product_condition" id="update_product_condition" placeholder="Enter Product Condition" >
  </div>
  <div class="form-group">
    <label for="update_product_id">Product ID</label>
    <input type="text" class="form-control" name="update_product_id" id="update_product_id" placeholder="Enter Product ID" >
  </div>
 </div>

<div style="display: none" id="order_update_div">
  <div class="form-group">
    <label for="update_date_issued">Date Issued</label>
    <input type="date" class="form-control" name="update_date_issued" id="update_date_issued" >
  </div>
   <div class="form-group">
    <label for="update_date_done">Date Done</label>
    <input type="date" class="form-control" name="update_date_done" id="update_date_done" >
  </div>
  <div class="form-group">
    <label for="update_total_price">Total Price</label>
    <input type="number" class="form-control" name="update_order_total_price" id="update_order_total_price" >
  </div>
  <div class="form-group">
    <label for="update_payment_code">Payment Code</label>
    <input type="text" class="form-control" name="update_payment_code" id="update_payment_code" placeholder="Enter Payment Code" >
  </div>
  <div class="form-group">
    <label for="update_user_id">User ID</label>
    <input type="number" class="form-control" name="update_user_id" id="update_user_id" placeholder=""  >
  </div>
  <div class="form-group">
    <label for="update_trip_id">Trip ID</label>
    <input type="number" class="form-control" name="update_trip_id" id="update_trip_id" placeholder=""  >
  </div>
  <div class="form-group">
    <label for="update_reciept_id">Reciept ID</label>
    <input type="number" class="form-control" name="update_reciept_id" id="update_reciept_id" placeholder=""  >
  </div>
   <div class="form-group">
    <label for="update_order_id">Order ID</label>
    <input type="text" class="form-control" name="update_order_id" id="update_order_id" placeholder="Enter Order ID" >
  </div>
</div>

  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End update modal -->

<!-- search modal -->
<div class="modal" id="searchModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Database Search</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <div class="form-group">
    <label for="search_table">Table</label>
    <select name="search_table" id="search_table" class="form-control" required="">
      <option value="">Select Table</option>
      <option value="order">Order Table</option>
      <option value="product">Product Table</option>
    </select>
  </div>

  <div class="form-group">
    <label for="search_id">ID</label>
    <input type="text" class="form-control" name="Enter ID" id="search_id" required="">
  </div>
  <button  onclick="search_data()" class="btn btn-primary">Search</button>
 </div>


</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End search modal -->

<!-- delete modal -->
<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Database Deletion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 <form action="database_actions.php" method="POST" enctype= "multipart/form-data">
      <!-- Modal body -->
      <div class="modal-body">
  <div class="form-group">
    <label for="delete_table">Table</label>
    <select name="delete_table" id="delete_table" class="form-control" required="">
      <option value="">Select Table</option>
      <option value="car_order">Order Table</option>
      <option value="product">Product Table</option>
    </select>
  </div>

  <div class="form-group">
    <label for="delete_id"> Delete ID</label>
    <input type="text" class="form-control" name="delete_id" placeholder ="Enter ID" id="delete_id" required="">
  </div>
  <button type="submit" name="delete" class="btn btn-warning">Delete</button>
 </div>


</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End delete modal -->
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script >
	$(document).ready(function(){

					$('#search_text').keyup(function(){
			 	var text = $(this).val();
			 	data="<h2>No Result Found</h2>";
			    $('#result').html(data);
			if (text == null) {
				console.log('DATA NOT SEARCHED');
			}
			else{

				$('#result').html('');
				$.ajax({
					url :'search.php',
					method:'post',
					data:{text:text},
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}

		});
   });

  function show_div()
  {
    var table=document.getElementById("table").value;
    if(table=='order')
    {
     document.getElementById("order_div").style.display='block';
     document.getElementById("product_div").style.display='none';
    }
    else if(table=='product')
    {
     document.getElementById("product_div").style.display='block';
     document.getElementById("order_div").style.display='none';
    }
    else
    {
    document.getElementById("product_div").style.display='none';
     document.getElementById("order_div").style.display='none';
    }
  }

  function insertion_validation()
  {
   var table=document.getElementById("table").value;
   if(table=='order')
    {
     var date_issued=document.getElementById("date_issued").value;
     var date_done=document.getElementById("date_done").value;
     var order_total_price=document.getElementById("order_total_price").value;
     var payment_code=document.getElementById("payment_code").value;
     var user_id=document.getElementById("user_id").value;
     var trip_id=document.getElementById("trip_id").value;
     var reciept_id=document.getElementById("reciept_id").value;
     if(date_issued.length=='')
     {
      alert('Please select issue date');
      return false;
     }
     if(date_done.length=='')
     {
      alert('Please select done date');
      return false;
     }
     if(order_total_price.length=='')
     {
      alert('Please enter order total price');
      return false;
     }
     if(payment_code.length=='')
     {
      alert('Please enter payment code');
      return false;
     }
     if(user_id.length=='')
     {
      alert('Please enter user id');
      return false;
     }
     if(trip_id.length=='')
     {
      alert('Please enter trip id');
      return false;
     }
     if(reciept_id.length=='')
     {
      alert('Please enter reciept id');
      return false;
     }
    }
    else
    {
     var name=document.getElementById("name").value;
     var price=document.getElementById("price").value;
     var product_condition=document.getElementById("product_condition").value;
     if(name.length=='')
     {
      alert('Please enter name');
      return false;
     }
     if(price.length=='')
     {
      alert('Please enter price');
      return false;
     }
     if(product_condition.length=='')
     {
      alert('Please enter product condition');
      return false;
     }
    }

  }

  function show_select_div()
  {

    var select_table=document.getElementById("select_table").value;

    if(select_table=='order')
    {
     document.getElementById("order_select_div").style.display='block';
     document.getElementById("product_select_div").style.display='none';
    }
    else if(select_table=='product')
    {
     document.getElementById("product_select_div").style.display='block';
     document.getElementById("order_select_div").style.display='none';
    }
    else
    {
     document.getElementById("product_select_div").style.display='none';
     document.getElementById("order_select_div").style.display='none';
    }
  }

  function filter_data()
  {

     var select_table=document.getElementById("select_table").value;
     if(select_table=='product')
     {
            var product_column_name=document.getElementById("product_column_name").value;
            var product_value=document.getElementById("product_value").value;

            if(product_column_name.length=='')
            {
             alert('Please select Product Column Name');
             return false;
            }
            if(product_value.length=='')
            {
             alert('Please enter value as column selected');
             return false;
            }

         $('#result').html('');
        $.ajax({
          url :'database_actions.php',
          method:'post',
          data:{select_table:select_table,product_column_name:product_column_name,product_value:product_value},
          success:function(data)
          {

            $('#result').html(data);

          }
        });
      }
    else if(select_table='order')
     {

            var order_column_name=document.getElementById("order_column_name").value;
            var order_value=document.getElementById("order_value").value;

            if(order_column_name.length=='')
            {
             alert('Please select Order Column Name');
             return false;
            }
            if(order_value.length=='')
            {
             alert('Please enter value as column selected');
             return false;
            }

        $('#result').html('');
        $.ajax({
          url :'database_actions.php',
          method:'post',
          data:{select_table:select_table,order_column_name:order_column_name,order_value:order_value},
          success:function(data)
          {

            $('#result').html(data);

          }
        });

     }
     else
     {

     }


  }

  function show_update_div()
  {
    var update_table=document.getElementById("update_table").value;

    if(update_table=='order')
    {
     document.getElementById("order_update_div").style.display='block';
     document.getElementById("product_update_div").style.display='none';
    }
    else if(update_table=='product')
    {
     document.getElementById("order_update_div").style.display='none';
     document.getElementById("product_update_div").style.display='block';
    }
    else
    {
     document.getElementById("order_update_div").style.display='none';
     document.getElementById("product_update_div").style.display='none';
    }
  }

  function updation_validation()
  {
   var update_table=document.getElementById("update_table").value;
   if(update_table=='order')
    {
     var update_date_issued=document.getElementById("update_date_issued").value;
     var update_date_done=document.getElementById("update_date_done").value;
     var update_order_total_price=document.getElementById("update_order_total_price").value;
     var update_payment_code=document.getElementById("update_payment_code").value;
     var update_user_id=document.getElementById("update_user_id").value;
     var update_trip_id=document.getElementById("update_trip_id").value;
     var update_reciept_id=document.getElementById("update_reciept_id").value;
     var update_order_id=document.getElementById("update_order_id").value;
     if(update_date_issued.length=='' || update_date_done.length=='' || update_order_total_price.length=='' || update_payment_code.length=='' || update_user_id.length=='' || update_trip_id.length=='' || update_reciept_id.length=='')
     {
      alert('Please enter atleast one value to update');
      return false;
     }

     if(update_order_id.length=='')
     {
      alert('Please enter order id to update');
      return false;
     }
    }
    else
    {
     var update_name=document.getElementById("update_name").value;
     var update_price=document.getElementById("update_price").value;
     var update_product_condition=document.getElementById("update_product_condition").value;
     var update_product_id=document.getElementById("update_product_id").value;
     if(update_name.length=='' || update_price.length=='' || update_product_condition.length=='')
     {
      alert('Please enter atleast one value to update');
      return false;
     }

     if(update_product_id.length=='')
     {
       alert('Please enter product id to update');
       return false;
     }

    }

  }

  function search_data()
  {

            var search_table=document.getElementById("search_table").value;
            var search_id=document.getElementById("search_id").value;

            if(search_table.length=='')
            {
             alert('Please select Table');
             return false;
            }
            if(search_id.length=='')
            {
             alert('Please enter id');
             return false;
            }

        $('#result').html('');
        $.ajax({
          url :'database_actions.php',
          method:'post',
          data:{search_table:search_table,search_id:search_id},
          success:function(data)
          {

            $('#search_result').html(data);

          }
        });


  }

   </script>
