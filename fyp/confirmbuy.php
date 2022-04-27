<?php
  session_start();   // if don't have session user..then
 include('connect.php');

	if(!isset($_SESSION['user']))  {
		die("<script>alert('Please login first before proceed!');
		window.location.href='login.html';</script>");
	}
?>
  <!DOCTYPE html>
  <head>
  <title>Key Hunches</title>
  <link rel="icon" type="img/ico" href="img/BG.jpg"/>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/bootstrap(css)/bootstrap.css"/>
  <link rel="stylesheet" href="css/bootstrap(css)/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/bootstrap(css)/bootstrap-grid.css"/>
  <script type="text/javascript" src="js/script.js"></script>
  <style media="screen">
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
  .box{
    border-bottom: 6px solid;
    animation: color-change 20s ease infinite;

  }
  .box p{
    font-size: 20px;
  }

  .box input{
    background: transparent;
    border: none;
    width:1000px;
    height:40px;   
  }

  .box input{
    color:white;
    font-size:15px;
  }
  
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
    box-shadow: 0 30px 60px 0;
    padding: 50px;
    margin:auto;
    margin-top: 30px;
    margin-bottom: 20px;
    animation: color-change 20s ease infinite;

  }

  .keyButton{
    margin-left: 5px;
    color: white;
    width: 20%;
    border: 1px solid ;
    padding: 5px;
    font-size: 18px;
    cursor: pointer;
    margin: 12px 10px ;
    transition: 0.5s;
    box-shadow: 0 0 10px 4px;
    animation: color-change 20s ease infinite;
  }

  footer p {
    width: 100%;
    color:white;
    bottom: 0;
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
    <a href="home.php" style="margin-bottom:30px;"><input type="button" class="home" value="HOME"></a>
    <div class="book-box">
      <div class="confirm">
        <div class="box">
        <?php
          //get id from url
          $mid=$_GET['id'];

          $userid = $_SESSION['id'];

          //connect to database
          include "connect.php";

          $query = "SELECT * from users_t where user_ID = $userid";
          //excute the sql query
          $myrecord = mysqli_query($connect, $query) or die("Query Error!".mysqli_error($connect));
          $userInfo = mysqli_fetch_array($myrecord);
          mysqli_free_result($myrecord);

          //write the sql query
          $sql = "SELECT * from malware_t where malware_ID =$mid";
          //excute the sql query
          $result=mysqli_query($connect,$sql) or die("Query Error!".mysqli_error($connect));

          //get the data from the database and display in html form
          if($rows=mysqli_fetch_array($result))
          {
        ?>
          <form method="post" action="malwarepurchase.php" enctype="multipart/form-data">
            <center><u><h2>Confirm buy</h2></u></center>
            <p style="display:none;">User Id</p><input type="hidden" class="purchase-form-text" name="userid" value="<?php echo $userInfo['user_ID']?>" readonly>
            <p style="display:none;">Malware Id</p><input type="hidden" class="purchase-form-text" name="malwareid" value="<?php echo $rows['malware_ID']?>" readonly>
            <p>Malware Name :</p><input type="text" class="purchase-form-text" name="name" value="<?php echo $rows['malware_Name']?>" readonly>
            <p>Synopsis :</p><input type="text" class="purchase-form-text" name="synopsis" value="<?php echo $rows['malware_Synopsis']?>" readonly>
            <p>Price :</p><input type="text"  class="purchase-form-text" name="price" value="<?php echo $rows['malware_Price']?>" readonly>
            <input type="submit" class="keyButton" value="Buy Now">
          </form>
        <?php
          }
          else
          {
            die("<script>alert('There is no such ');'</script>");
          }
        ?> 
         </div>
      </div>
    </div>
  <footer>
  <script>
    function myFunction() {
      alert("Please wait for us to send the Malware directly to your email!!!");
    }
  </script>
    <center>
    <p style="color:white;">Developed by ARK </p>
    </center>
    </footer>
  </body>
  </html>
