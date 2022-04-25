<?php
include_once('header.php');
$id = $_POST['hidden_id'];
include('db.php');
$query= "SELECT * FROM `reviews` WHERE id = '$id'";
$result = mysqli_query($db,$query);
				  echo '<div style="margin: auto; width: 50%" class="col-md-4"><br><br>
				  <h1> Reviews on this Product </h1>
					<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>';
                  while($row = mysqli_fetch_assoc($result))
                  	{
                      ?>

                  
                 <div class="card mb-4 shadow-sm">
                 <div class="card-body">
                 <h5 style = "text-align : center" class="card-text"> Ranking Number (1-5): <?php echo $row['ranking']; ?></h5><hr>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?php echo $row['review']; ?></li>
                  </ul>
                  <!-- <input type="number" name="quantity" value="1"> -->
                  
                  </div>
                  </div>

               <?php
               }
               ?></div>