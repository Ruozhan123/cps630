<?php
include_once('header.php');
$id = $_POST['hidden_id'];
include('db.php');
$query= "SELECT image, name FROM `product` WHERE id = '$id'";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_row($result);
$image_src = $row[0];
$name = $row[1];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>CPS 630 Project - Smart Customer Services</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</head>

<style>

.spacing{
        margin-left: 500px;
        margin-right: 500px;
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
<h1> Write a Review on <?php echo $name; ?> </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="submitreview.php" method="post" id="reviewForm">


        <div>

        <h3>On a scale of 1-5, how satisfied are you with this product?</h3>
        <hr>
        <div style="float:right;"> <h4 style="text-align:center;"> <?php echo $name; ?> </h4>
		<div style="height:500px;width:500px;border:2px solid black;">
		<img id="drag2" draggable = "true" ondragstart="drag(event)" class="card-img-top" width="100%" height="100%" role="img" src="<?php echo $image_src ?>"><rect width="100%" height="100%" fill="#55595c"/></div></div>
		<br>
        
		<input style="margin-right: 3px;" type="radio" id="1" name="rating" value="1" checked="">
		1<br>
		
		<input style="margin-right: 3px;" type="radio" id="2" name="rating" value="2">
		2<br>
		
		<input style="margin-right: 3px;" type="radio" id="3" name="rating" value="3">
		3<br>
		
		<input style="margin-right: 3px;" type="radio" id="4" name="rating" value="4">
		4<br>
		
		<input style="margin-right: 3px;" type="radio" id="5" name="rating" value="5">
		5<br>
		<input type="hidden" name ="hidden_id" class="form-control" value="<?php  echo $id;  ?>">
        <div style="margin-bottom:150px;"> </div>

		<h3> Give your personal feedback! </h3>     <hr style="max-width: 50%;margin: 0px;"><br>

		<textarea style="margin:0px;" rows="8" cols="80" name="writeReview" form="reviewForm"></textarea>
		
		

        </div>
	
<div style="margin-top:50px;">
<input type="submit" value="Submit Review">
</div>

</form>

</div>

</body>
</html>
