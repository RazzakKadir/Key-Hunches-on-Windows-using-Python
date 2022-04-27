<?php
session_start();   // if don't have session user..then
 include('connect.php');

	if(!isset($_SESSION['user']))  {
		die("<script>alert('Please login first before proceed!');
		window.location.href='login.html';</script>");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Key Hunches</title>
  <link rel="icon" type="img/ico" href="img/BG.jpg"/>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/bootstrap(css)/bootstrap.css"/>
  <link rel="stylesheet" href="css/bootstrap(css)/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/bootstrap(css)/bootstrap-grid.css"/>
  <script type="text/javascript" src="js/script.js"></script>
  <style media='screen'>

  .keyButton{
      margin-left: 5px;
      color: black;
      width: 30%;
      border: 1px solid ;
      padding: 5px;
      font-size: 18px;
      cursor: pointer;
      margin: 12px 10px ;
      transition: 0.5s;
      box-shadow: 0 0 10px 4px;
      animation: color-change 20s ease infinite;
    }
    @keyframes color-change {
      0% { color: white; }
      25% {color: black;}
      50% { color: white; }
      75% {color: black;}
      100% { color: white; }
  }
  </style>
</head>
<body>
  <header id="navBar">
      <nav class="navbar navbar-expand-lg">
          <a class="navbarBrand" href="home.php"><img src="img/BG.jpg"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="" aria-hidden="true"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#keylogger">Keyloggers</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#aboutUs">About Us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact Us</a>
                  </li>
									<li class="nav-item dropdown">
										<div>
	                    <a class="nav-link dropdown" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<img src="img/user_profile.png"  >
                        <?php  if (isset($_SESSION['user'])) : ?>
                          <strong><?php echo $_SESSION['user']; ?></strong>
                        <?php endif ?>

	                    </a>
										</div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="purchaseHtry.php" style="color: red;">Purchase History</a>
                      <a class="dropdown-item" href="logout.php" style="color: red;">logout</a>
                    </div>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <div class="background" id="background"> 
</div>
<div class="greeting" id="greeting">
    <h1>Welcome to Key Hunches</h1>
</div> 
<div id="keylogger">
  <center>
    <center><h1>Key logger Malware</h1></center>
    <?php
        include('connect.php');//add connection to the php page


        $sql = "Select * from malware_t";//add a new sql query
        $result = mysqli_query($connect, $sql);// run the sql query and all the data store in variable result

        if(mysqli_num_rows($result)<=0)//if no result, then run the die () code
        {

        }
        else
        {

        }while ($rows =mysqli_fetch_array($result))
        {

        echo "<div class='container'>";
        echo "<div class='row'>";  
            echo "<div class='col-5'>";    
              echo "<img src='".$rows['photo_path']."'>";      
            echo "</div>";    
            echo "<div class='col-7'>";    
              echo "<u><h3>".$rows['malware_Name']."</h3></u>";      
              echo "<h3>Price :" .$rows ['malware_Price']. "</h3>";      
              echo "<p>Synopsis :" .$rows ['malware_Synopsis']."</p>";
              echo "<a href='confirmbuy.php?id=".$rows['malware_ID']."'><button class='keyButton'>Buy Malware</button></a>";            
            echo "</div>";    
          echo "</div>";
        echo "</div>";
       }?>
  </center>
</div>
<div id="aboutUs">
    <h1>About Us</h1>
    <p> We are here for you when you have a hunch about someone. We are solo based on Windows operating system, which is just for the time being.
        Maybe in the future, we will include other operating systems. Key Hunches is software that is an executable application, which you will have 
        to execute the program for the first time and the program will do the rest, that is why you will have to download into the victim's device manually.
        This means that you will have to get your hands a little dirty before we can help you. We collect all the keystrokes that are made by the victim on 
        their laptop or desktop. The main reason of the Key Hunches program is to help people who are desperate on spying or keeping an eye on their loved 
        ones or employees.
    </p>
</div>

<section id="contact">
      <div class="contact-section">
          <h1>Contact Us</h1>
          <?php
        
        $uid=$_SESSION['id'];

        include('connect.php');//add connection to the php page

        $sql = "Select * from users_t where user_ID =$uid ";//add a new sql query
        $result = mysqli_query($connect, $sql);// run the sql query and all the data store in variable result

        //get the data from the database and display in html form
        if($rows=mysqli_fetch_array($result))
        {
        ?>
          <form class="contact-form" method="post" action="memberfb.php">
              <input type="hidden" class="purchase-form-text" name="userid" value="<?php echo $uid?>" readonly>
              <input type="text" class="contact-form-text" name="name" value="<?php echo $rows ['user_Name']?>" readonly>
              <input type="email" class="contact-form-text" name="email" value="<?php echo $rows ['user_Email']?>" readonly>
              <textarea class="contact-form-text" name="message" placeholder="Your Message"></textarea>
              <input type="submit" class="contact-form-btn" value="Send">
          </form>
      </div>
    <?php }?>
  </section>

  <button onclick="topFunction()"id="topBtn"><i class="fa fa-angle-double-up" aria-hidden="true">UP</i></button>
<footer>
<script type="text/javascript" src="js/bootstrap(js)/bootstrapjquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/bootstrap(js)/bootstrap.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript">
mybutton = document.getElementById("topBtn");

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.documentElement.scrollTop = 0;
}
</script>
<center>
<p style="color:white;">Developed by ARK </p>
</center>
</footer>
</body>
</html>