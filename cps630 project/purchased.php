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
</head>

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
    <header>
        <nav style = "margin-left: 0px; margin-right: 0px"class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
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
                  <a class="nav-link" href="auth/signup.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="auth/login.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign in</button></a>
                </li>
            </ul>
          </div>
        </nav>
      </header>
<div class="spacing">
<h1 style="font-size:75px;text-align:center;"> Thank You for Shopping Online With Us! </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="" method="post">


        <div style="text-align:center;margin:auto;">
		<img src="https://www.alwaysonpurpose.com/wp-content/uploads/2019/11/happypeople-1024x679.jpg" style=" width:75%;">
        </div>
<br>
<h3>Truck "truck id here" will deliver your package</h3><br>

		<form method="post" action="">
			<input type="button" value="Click here to track your package"></input>
		</form>
		<hr>
<form action="">
<input type="submit" value="Return to Home Page"></input>
</form>


</form>

</div>
</body>
</html>