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
<div class="spacing">
<h1> Check-Out </h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom: 80px;"> </hr>

<form action="purchased.html" method="post">


        <div>

        <h3>Delivery</h3>
        <hr>
        Branch Location <div style="float:right;"> <h4> Delivery Map </h4><div style="height:300px;width:300px;border:2px solid black;"></div></div>
		<br>
        <select id="branch" name="province">
                  <option value="Branch1">Branch1</option>
                  <option value="Branch2">Branch2</option>
                  <option value="Branch3">Branch3</option>
                  <option value="Branch4">Branch4</option>
        </select>
        <br><br>

        Date and Time<br>

        <input type="date" id="datefield">
        <br><br>
		
		<h3>invoice Summary</h3>
        <hr style="max-width: 50%;margin: 0px;"><br>
		
		<div>
			Items: 
		</div>
		
		<br><br>
		
		<hr style="max-width: 50%;margin: 0px;background-color:black;">
		
		<div>
			Total Price:
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