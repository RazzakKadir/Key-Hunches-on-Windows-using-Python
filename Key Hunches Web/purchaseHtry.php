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
  <style media="screen">
  body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    animation: bookcolor 20s ease infinite;
  }
  .book-box{
    width: 80%;
    height: 80%;
    top: 45%;
    left: 50%;
    color: white;
    border-radius: 30px 30px 30px 30px;
    box-shadow: 0 30px 60px 0 white;
    padding: 50px;
    margin:auto;
    margin-top: 30px;
    margin-bottom: 20px;

  }
  
  .book-box 
  .box p{
    color: white;
  }

  .home{
    border: 0.1px solid ;
    width: 100%;
    padding: 5px;
    transition: 0.5s;
    background: transparent;
    animation: color-change 20s ease infinite;
    font-weight: bold;

  }
  .home:hover{
    box-shadow: 0 0 10px 4px;
    color: white;

  }
  footer p {
    width: 100%;
    color:white;
    bottom: 0;
  }
  .bar{
    text-align: center;
  }
  .box{
    border-bottom: 6px solid white;
    padding-bottom: 20px;
  }
  @keyframes color-change {
      0% { color: white; }
      25% {color: black;}
      50% { color: white; }
      75% {color: black;}
      100% { color: white; }
  }
  @keyframes bookcolor {
      0% {
          background-color : #000000;
      }
      25% {
          background-color :#730c04;
      }
      50% {
          background-color :#000000;
      }
      75% {
          background-color :#730c04;
      }

      100% {
          background-color :#000000;
      }

  }
  </style>
</head>
<body>
<a href="home.php"><input type="button" class="home" value="HOME"></a>
<div class="book-box">
  <div class="bar">
    <u><h2>Malware Purchase History</h2></u>
    <span class="aside"><i>Your Username - <?php echo $_SESSION['user'] ?></i></span>
  </div>
  <?php

  $uid=$_SESSION['id'];

  include('connect.php');//add connection to the php page

  $query = "SELECT * FROM purchase_t WHERE user_ID = $uid";
    $myrecord = mysqli_query($connect, $query) or die("Query Error!".mysqli_error($connect));
    while ($row = mysqli_fetch_array($myrecord)) {
      $query2 = "SELECT * FROM malware_t WHERE malware_ID = " . $row['malware_ID'];
      $myrecord2 = mysqli_query($connect, $query2) or die("Query Error!".mysqli_error($connect));
      $malware = mysqli_fetch_array($myrecord2);
      mysqli_free_result($myrecord2);

  ?>
  <div class="box">
    <p><b>Malware Name : </b><?php echo $malware['malware_Name'] ?></p>
    <p><b>Malware Synopsis :</b><?php echo $malware['malware_Synopsis'] ?></p>
    <p><b>Malware Price : </b><?php echo $malware['malware_Price'] ?></p>
  </div>
<?php 
  }
  mysqli_free_result($myrecord);
?>
</div>

<footer>
  <center>
  <p style="color:white;">Developed by ARK </p>
  </center>
</footer>
</body>
</html>
