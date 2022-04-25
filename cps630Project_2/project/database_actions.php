<?php
$db=mysqli_connect('localhost','root','','customer_service');
//insertion code//
if(isset($_POST['submit']))
{

	$table=$_POST['table'];

	if($table=='orders')
	{
		$date_issued=$_POST['date_issued'];
		$date_done=$_POST['date_done'];
	  $order_total_price=$_POST['order_total_price'];
	  $user_id=$_POST['user_id'];
	  $receipt_id=$_POST['receipt_id'];
    $delivery_id=$_POST['delivery_id'];

	  $query="INSERT INTO `orders`(`user_id`, `total_price`, `date_issued`, `date_done`, `delivery_id`, `receipt_id`) VALUES ('$user_id',''$order_total_price','$date_issued','$date_done','$delivery_id','$receipt_id')";

	  $result=mysqli_query($db,$query);
	  echo "<script>
            alert('Order Data Successfully Inserted');
            window.location.href='index.php';
            </script>";

	}

	else if($table=='product')
	{
	  $name=$_POST['name'];
	  $price=$_POST['price'];
	  $product_condition=$_POST['product_condition'];

	  $query="INSERT INTO `product`(`name`, `price`, `product_condition`) VALUES ('$name','$price','$product_condition')";
	  $result=mysqli_query($db,$query);
	  echo "<script>
            alert('Product Data Successfully Inserted');
            window.location.href='index.php';
            </script>";
	}
}
//end insertion code//


//update code//
if(isset($_POST['update']))
{

	$update_table=$_POST['update_table'];

	if($update_table=='orders')
	{
	  $update_order_total_price=$_POST['update_order_total_price'];
	  $update_user_id=$_POST['update_user_id'];
		$update_date_issued=$_POST['update_date_issued'];
		$update_date_done=$_POST['update_date_done'];
	  $update_order_id=$_POST['update_order_id'];
		$update_receipt_id=$_POST['update_receipt_id'];

	  $query="UPDATE `orders` SET `total_price`=$update_order_total_price, `date_issued`='$update_date_issued',`date_done`='$update_date_done',`user_id`='$update_user_id',`receipt_id`='$update_receipt_id' WHERE `id`='$update_order_id'";


	  $result=mysqli_query($db,$query);
	  echo "<script>
            alert('Orders Data Successfully Updated');
            window.location.href='index.php';
            </script>";

	}

	else if($update_table=='product')
	{
	  $update_name=$_POST['update_name'];
	  $update_price=$_POST['update_price'];
	  $update_product_condition=$_POST['update_product_condition'];
	  $update_product_id=$_POST['update_product_id'];

	  $query="UPDATE `product` SET `name`='$update_name',`price`='$update_price',`product_condition`='$update_product_condition' WHERE `id`='$update_product_id'";
	  $result=mysqli_query($db,$query);
	  echo "<script>
            alert('Product Data Successfully Updated');
            window.location.href='index.php';
            </script>";
	}
}
//end update code//

//selection code//
$output='';
if(isset($_POST['select_table']))
{
$select_table=$_POST['select_table'];
if($select_table =='product')
{
$select_table=$_POST['select_table'];
$product_column_name=$_POST['product_column_name'];
$product_value=$_POST['product_value'];
$select_query="SELECT * FROM `product` WHERE `$product_column_name`='$product_value'";
$select_result=mysqli_query($db,$select_query);
$total_results = mysqli_num_rows($select_result);
$output = '';
if ($total_results > 0) {
 $i=1;
 $output.='<div class="container">
  <h2>Selection Result</h2>
  <p>'.$total_results.' result(s)</p>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>#</th>
			  <th>product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Product Condition</th>
				<th>Image</th>
      </tr>
    </thead>
    <tbody>';
   while($row=mysqli_fetch_assoc($select_result))
   {

    $output.='<tr>
        <td>'.$i.'</td>
				<td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['price'].'</td>
        <td>'.$row['product_condition'].'</td>
				<td><image class="product_image" src="'.$row['image'].'"></td>
      </tr>';

  $i++;
   }
   $output.='  </tbody>
  </table>
</div>
';
  echo $output;
 }
 else {
	echo '<div class="container">
	 No results</p>';
 }
}
elseif($select_table=='orders')
{

$order_column_name=$_POST['order_column_name'];
$order_value=$_POST['order_value'];
$select_query="SELECT * FROM `orders` WHERE `$order_column_name`='$order_value'";
$select_result=mysqli_query($db,$select_query);
$total_results = mysqli_num_rows($select_result);
$output = '';
if ($total_results > 0) {
	$i = 1;
 	$output.='<div class="container">
  <h2>Selection Result</h2>
  <p>'.$total_results.' result(s)</p>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>#</th>
			  <th>Order ID</th>
        <th>Date Issued</th>
        <th>Date Done</th>
        <th>Total Price</th>
        <th>User ID</th>
        <th>Receipt ID</th>
      </tr>
    </thead>
    <tbody>';
   while($row=mysqli_fetch_assoc($select_result))
   {

    $output.='<tr>
        <td>'.$i.'</td>
				<td>'.$row['id'].'</td>
        <td>'.$row['date_issued'].'</td>
        <td>'.$row['date_done'].'</td>
        <td>'.$row['total_price'].'</td>
        <td>'.$row['user_id'].'</td>
        <td>'.$row['receipt_id'].'</td>
      </tr>';

  $i++;
   }
   $output.='  </tbody>
  </table>
</div>
';
  echo $output;
  }
  else {
	  echo '<div class="container">
	   No results</p>';
  }
 }
}
//end selection code//

//search code//
$search_output='';
if(isset($_POST['search_table']))
{
$search_table=$_POST['search_table'];
if($search_table =='product')
{

$search_id = $_POST['search_id'];


$select_search_query = "SELECT * FROM `product` WHERE `id`='$search_id'";

$select_search_result = mysqli_query($db,$select_search_query);
$total_results = mysqli_num_rows($select_search_result);
$search_output = '';
if ($total_results > 0) {
 $i = 1;
 $search_output.='<div class="container">
  <h2>Search Result</h2>
  <p>'.$total_results.' result(s)</p>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>#</th>
			  <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Product Condition</th>
				<th>Image</th>
      </tr>
    </thead>
    <tbody>';
   while($search_row=mysqli_fetch_assoc($select_search_result))
   {

    $search_output.='<tr>
        <td>'.$i.'</td>
				<td>'.$search_row['id'].'</td>
        <td>'.$search_row['name'].'</td>
        <td>'.$search_row['price'].'</td>
        <td>'.$search_row['product_condition'].'</td>
				<td><image class="product_image" src="'.$search_row['image'].'"></td>
      </tr>';

    $i++;
   }
   $search_output.='  </tbody>
  </table>
</div>
';
 echo $search_output;
 }
 else {
	echo '<div class="container">
	 No results</p>';
 }
}
elseif($search_table=='orders')
{

$search_id=$_POST['search_id'];
$select_search_query = "SELECT * FROM `orders` WHERE `id`='$search_id'";
$select_search_result = mysqli_query($db,$select_search_query);
$total_results = mysqli_num_rows($select_search_result);
$search_output = '';
if ($total_results > 0) {
 $i = 1;
 $search_output.='<div class="container">
  <h2>Selection Result</h2>
  <p>'.$total_results.' result(s)</p>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>#</th>
			 <th>Order ID</th>
        <th>Date Issued</th>
        <th>Date Done</th>
        <th>Total Price</th>
        <th>User ID</th>
        <th>Receipt ID</th>
      </tr>
    </thead>
    <tbody>';
   while($row = mysqli_fetch_assoc($select_search_result))
   {

    $search_output.='<tr>
        <td>'.$i.'</td>
				<td>'.$row['id'].'</td>
        <td>'.$row['date_issued'].'</td>
        <td>'.$row['date_done'].'</td>
        <td>'.$row['total_price'].'</td>
        <td>'.$row['user_id'].'</td>
				<td>'.$row['trip_id'].'</td>
        <td>'.$row['receipt_id'].'</td>
      </tr>';

    $i++;
   }
   $search_output.='  </tbody>
  </table>
</div>
';
  echo $search_output;
  }
  else {
	 echo '<div class="container">
	 No results</p>';
  }
 }
}
//end search code//


//delete code//
if(isset($_POST['delete']))
{
	$delete_table=$_POST['delete_table'];
	$delete_id=$_POST['delete_id'];

	$delete_query="DELETE FROM `$delete_table` WHERE `id`='$delete_id'";

	$delete_result=mysqli_query($db,$delete_query);
	 echo "<script>
            alert(' Data Successfully Deleted');
            window.location.href='index.php';
            </script>";
}
//end delete code//
?>
