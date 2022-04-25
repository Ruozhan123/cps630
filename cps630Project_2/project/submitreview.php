<?php
$db=mysqli_connect('localhost','root','','customer_service');
//insertion code//
	  $ranking = $_POST['rating'];
	  $review = $_POST['writeReview'];
	  $id = $_POST['hidden_id'];
	  $query="INSERT INTO `reviews`(`id`, `ranking`, `review`) VALUES ('$id','$ranking','$review')";
	  $result=mysqli_query($db,$query);
	  echo "<script>
            alert('Review Successfully Submitted');
            window.location.href='index.php';
            </script>";

//end insertion code//

?>
