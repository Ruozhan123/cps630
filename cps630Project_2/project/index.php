<?php
if(!(isset($_SESSION["isLoggedIn"]))){
	$_SESSION["isLoggedIn"] = false;
	$_SESSION["email"] = "";
}

include_once('header.php');
include('db.php');
$query= "SELECT * FROM `product`";
$result = mysqli_query($db,$query);

?>
<body>
  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>CPS 630 Project - Smart Customer Services</h1>
        <p class="lead text-muted">Group Members: Sanveer Gill, Devrajsinh Chudasama, Ruozhan Li</p>
		<?php if ($_SESSION["isLoggedIn"] == false)
			{
				echo '<p style="font-size: 30px; color: DodgerBlue">Sign in to get discounted prices on all items!</p>';
			}
			else
			{
				echo '<p style="font-size: 30px; color: DodgerBlue">Welcome! As a registered user, you receive a 20% discount on all items! </p>';
			}
		?>
      </div>
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


    <!--<div>
      <form class="example" action="action_page.php">
        <input type="text"  placeholder="Search.." id="search_text" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>-->
    </section>
    <div class="container">

        <div class="row">

                  <?php
                  while($row = mysqli_fetch_assoc($result))
                  	{
                        $image_src = $row['image'];
						$discounted_price = $row['price'] * 0.8;
						$price = $row['price'];
                      ?>

                  <div class="col-md-4">
                 <div class="card mb-4 shadow-sm">
                  <div class="postimages">
                 <img id="drag2" draggable = "true" ondragstart="drag(event)" class="card-img-top" width="100%" height="100%" role="img" src="<?php echo $image_src ?>"><rect width="100%" height="100%" fill="#55595c"/>
                </div>
                 <div class="card-body">
                 <p style = "text-align : center" class="card-text"><?php echo $row['name']; ?></p>
                  <ul class="list-group list-group-flush">
				  <?php if ($_SESSION["isLoggedIn"] == false)
						{
							echo '<li class="list-group-item">Price: $' . $row['price'] . '  </li>';
						}
						else
						{
							echo '<li class="list-group-item">Price: $<p style=" display:inline; text-decoration: line-through;">' . $row['price'] . ' </p>&nbsp;&nbsp;$' . $discounted_price . ' </li>';
							$price = $discounted_price;
						}
		?>
                  <li class="list-group-item">Condition: <?php echo $row['product_condition']; ?></li>
                  </ul>
                  <!-- <input type="number" name="quantity" value="1"> -->
                  <form method="post" action="cart.php?action=add&product_id=<?php echo $row['id']?>" enctype="multipart/form-data">
                  	<input type="number" class="form-control" name="quantity" value="1">
                  	<br>
				  <input type="hidden" name ="image" class="form-control" value="<?php  echo $image_src;  ?>">
                  <input type="hidden" name ="hidden_name" class="form-control" value="<?php  echo $row['name'];  ?>">
                  <input type="hidden" name ="hidden_price" class="form-control" value="<?php  echo $price;  ?>">
                  <input type="hidden" name ="hidden_condition" class="form-control" value="<?php  echo $row['product_condition'];  ?>">
                  <button type="submit" class="btn btn-primary" name="add-to-cart" style="margin-left: 30%">ADD TO CART</button><br><br>
                  </form>

				  <form method ="post" action="viewreviews.php">
				  <input type="hidden" name ="hidden_id" class="form-control" value="<?php  echo $row['id'];  ?>">
				  <button type="submit" class="btn btn-secondary" name="view-reviews" style="margin-left: 30%">View Reviews</button><br><br>
				  </form>
				  <form method ="post" action="reviews.php">
				  <input type="hidden" name ="hidden_id" class="form-control" value="<?php  echo $row['id'];  ?>">
				  <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#reviewModal" name="write-review" style="margin-left: 30%">Write Review</button>
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
      <option value="orders">Orders Table</option>
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
    <label for="user_id">User ID</label>
    <input type="number" class="form-control" name="user_id" id="user_id" placeholder=""  >
  </div>
  <div class="form-group">
    <label for="delivery_id">Delivery ID</label>
    <input type="number" class="form-control" name="delivery_id" id="delivery_id" placeholder=""  >
  </div>
  <div class="form-group">
    <label for="receipt_id">Receipt ID</label>
    <input type="number" class="form-control" name="receipt_id" id="receipt_id" placeholder=""  >
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
      <option value="orders">Orders Table</option>
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
              <option value="orders">Orders Table</option>
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
              <label for="update_order_total_price">Total Price</label>
              <input type="number" class="form-control" name="update_order_total_price" id="update_order_total_price" >
            </div>
            <div class="form-group">
              <label for="update_user_id">User ID</label>
              <input type="number" class="form-control" name="update_user_id" id="update_user_id" placeholder=""  >
            </div>
            <div class="form-group">
              <label for="update_receipt_id">Receipt ID</label>
              <input type="number" class="form-control" name="update_receipt_id" id="update_receipt_id" placeholder=""  >
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

<div class="modal" id="reviewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Write a Review</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="spacing">
<h1> Write a Review on (name) </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="" method="post" id="reviewForm">


        <div>

        <h3>On a scale of 1-5, how satisfied are you with this product?</h3>
        <hr>
		<br>

		<input style="margin-right: 3px;" type="radio" id="1" name="rating" value="1">
		1<br>

		<input style="margin-right: 3px;" type="radio" id="2" name="rating" value="2">
		2<br>

		<input style="margin-right: 3px;" type="radio" id="3" name="rating" value="3">
		3<br>

		<input style="margin-right: 3px;" type="radio" id="4" name="rating" value="4">
		4<br>

		<input style="margin-right: 3px;" type="radio" id="5" name="rating" value="5">
		5<br>

        <div style="margin-bottom:30px;"> </div>

		<h3> Give your personal feedback! </h3>     <hr style="max-width: 50%;margin: 0px;"><br>

		<textarea style="margin:0px;" rows="8" cols="80" name="writeReview" form="reviewForm"></textarea>



        </div>

<div style="margin-top:50px;">
<input type="submit" value="Submit Review">
</div>

</form>

</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

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
            <option value="orders">Orders Table</option>
            <option value="product">Product Table</option>
          </select>
        </div>

        <div class="form-group">
          <label for="search_id">ID</label>
          <input type="text" class="form-control" name="Enter ID" id="search_id" required="">
         </div>
        <button  onclick="search_data()" class="btn btn-primary">Search</button>
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
              <option value="orders">Orders Table</option>
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
<script>
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
    if(table=='orders')
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
   if(table=='orders')
    {
     var date_issued = document.getElementById("date_issued").value;
     var date_done = document.getElementById("date_done").value;
     var order_total_price = document.getElementById("order_total_price").value;
     var payment_code = document.getElementById("payment_code").value;
     var user_id = document.getElementById("user_id").value;
     var receipt_id = document.getElementById("receipt_id").value;
     if(date_issued.length == '')
     {
      alert('Please select issue date');
      return false;
     }
     if(date_done.length == '')
     {
      alert('Please select done date');
      return false;
     }
     if(order_total_price.length == '')
     {
      alert('Please enter order total price');
      return false;
     }
     if(user_id.length == '')
     {
      alert('Please enter user id');
      return false;
     }
     if(receipt_id.length == '')
     {
      alert('Please enter receipt id');
      return false;
     }
    }
    else
    {
     var name=document.getElementById("name").value;
     var price=document.getElementById("price").value;
     var product_condition=document.getElementById("product_condition").value;
     if(name.length =='')
     {
      alert('Please enter name');
      return false;
     }
     if(price.length =='')
     {
      alert('Please enter price');
      return false;
     }
     if(product_condition.length =='')
     {
      alert('Please enter product condition');
      return false;
     }
    }

  }

  function show_select_div()
  {

    var select_table = document.getElementById("select_table").value;

    if(select_table == 'orders')
    {
     document.getElementById("order_select_div").style.display = 'block';
     document.getElementById("product_select_div").style.display = 'none';
    }
    else if(select_table == 'product')
    {
     document.getElementById("product_select_div").style.display = 'block';
     document.getElementById("order_select_div").style.display = 'none';
    }
    else
    {
     document.getElementById("product_select_div").style.display='none';
     document.getElementById("order_select_div").style.display='none';
    }
  }

  function filter_data()
  {

     var select_table = document.getElementById("select_table").value;
     if(select_table == 'product')
     {
            var product_column_name = document.getElementById("product_column_name").value;
            var product_value = document.getElementById("product_value").value;

            if(product_column_name.length == '')
            {
             alert('Please select Product Column Name');
             return false;
            }
            if(product_value.length == '')
            {
             alert('Please enter value as column selected');
             return false;
            }

         $('#result').html('');
         $('#search_result').html('');
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
    else if(select_table='orders')
     {

            var order_column_name=document.getElementById("order_column_name").value;
            var order_value=document.getElementById("order_value").value;

            if(order_column_name.length == '')
            {
             alert('Please select Order Column Name');
             return false;
            }
            if(order_value.length == '')
            {
             alert('Please enter value as column selected');
             return false;
            }

          $('#result').html('');
          $('#search_result').html('');
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
    var update_table = document.getElementById("update_table").value;

    if(update_table == 'orders')
    {
     document.getElementById("order_update_div").style.display = 'block';
     document.getElementById("product_update_div").style.display = 'none';
    }
    else if(update_table=='product')
    {
     document.getElementById("order_update_div").style.display = 'none';
     document.getElementById("product_update_div").style.display = 'block';
    }
    else
    {
     document.getElementById("order_update_div").style.display = 'none';
     document.getElementById("product_update_div").style.display = 'none';
    }
  }

  function updation_validation()
  {
   var update_table = document.getElementById("update_table").value;
   if(update_table == 'orders')
    {
     var update_date_issued = document.getElementById("update_date_issued").value;
     var update_date_done = document.getElementById("update_date_done").value;
     var update_order_total_price = document.getElementById("update_order_total_price").value;
     var update_payment_code = document.getElementById("update_payment_code").value;
     var update_user_id = document.getElementById("update_user_id").value;
     var update_receipt_id = document.getElementById("update_receipt_id").value;
     var update_order_id = document.getElementById("update_order_id").value;
     if(update_date_issued.length == '' || update_date_done.length == '' || update_order_total_price.length == '' || update_payment_code.length == '' || update_user_id.length == '' || update_receipt_id.length == '')
     {
      alert('Please enter atleast one value to update');
      return false;
     }

     if(update_order_id.length == '')
     {
      alert('Please enter order id to update');
      return false;
     }
    }
    else
    {
     var update_name = document.getElementById("update_name").value;
     var update_price = document.getElementById("update_price").value;
     var update_product_condition = document.getElementById("update_product_condition").value;
     var update_product_id = document.getElementById("update_product_id").value;
     if(update_name.length == '' || update_price.length == '' || update_product_condition.length == '')
     {
      alert('Please enter atleast one value to update');
      return false;
     }

     if(update_product_id.length == '')
     {
       alert('Please enter product id to update');
       return false;
     }

    }

  }

  function search_data()
  {

            var search_table = document.getElementById("search_table").value;
            var search_id = document.getElementById("search_id").value;

            if(search_table.length == '')
            {
             alert('Please select Table');
             return false;
            }
            if(search_id.length == '')
            {
             alert('Please enter id');
             return false;
            }

        $('#search_result').html('');
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
