<?php
 ob_start();
  session_start();
  if(!(isset($_SESSION["isLoggedIn"]))){
	  $_SESSION["isLoggedIn"] = false;
	$_SESSION["email"] = "";
  $_SESSION["shopping_cart"] = array();
}

  $db_admin = "";
  if (isset($_GET['dbuser'])) {
   $db_admin = trim($_GET['dbuser']);
  }
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
<?php
function isHomePage()
{
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return preg_match("/(index|^)/i", $path);
}
?>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
      <a class="navbar-brand mb-0 h1" href="index.php">CPS 630</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
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
          <?php  if(isHomePage()) {
          ?>
          <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#searchModal">Search</a>
          </li>
          <?php if($db_admin == "admin") {
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Db Maintain
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target="#myModal">Insert</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#selectModal">Select</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#updateModal">Update</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal">Delete</a>
            </div>
          </li>
        <?php } }
        ?>

        </ul>

		<?php
		echo'
        <ul class="nav navbar-nav navbar-right">
		  <li class="nav-item">
            <a class="nav-link" id="browser"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="cart.php"><button id="createPostBtn" class="btn btn-outline-info my-2 my-sm-0" type="button">Shopping Cart</button></a>
          </li>
		  ';
			if ($_SESSION["isLoggedIn"] == false)
			{
			echo'
            <li class="nav-item">
              <a class="nav-link" href="signup.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign in</button></a>
            </li>';
			}
			else
			{
				$tempEmail = $_SESSION["email"];
				echo '<li class="nav-item">
              <a class="nav-link"><button class="btn btn-outline-info my-2 my-sm-0" >Signed In: ' . $tempEmail . '</button></a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="signout.php"><button class="btn btn-outline-info my-2 my-sm-0" >Sign Out</button></a>
            </li>';
			}
			?>
        </ul>
      </div>
    </nav>
  </header>
  <script>

	userAgent = navigator.userAgent;
         if(userAgent.match(/chrome/i)){
             browser = "Google Chrome";
           }else if(userAgent.match(/firefox/i)){
             browser = "Firefox";
           }  else if(userAgent.match(/Trident/i)){
             browser = "Internet Explorer";
           } else{
             browser="unknown";
           }

          document.getElementById('browser').innerHTML = "Browser: " + browser;

</script>
</html>
