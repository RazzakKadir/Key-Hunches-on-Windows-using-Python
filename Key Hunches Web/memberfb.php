<?php
include "connect.php";
$name = mysqli_real_escape_string($connect,$_POST['name']);
$email = mysqli_real_escape_string($connect,$_POST['email']);
$message = mysqli_real_escape_string($connect,$_POST['message']);
$userid = mysqli_real_escape_string($connect,$_POST['userid']);

$sql = "Insert into mbcontact_t (mbcnt_Name, mbcnt_Email, mbcnt_Message, user_ID, mbcnt_Fbdatetime) VALUES
('$name','$email','$message','$userid','".date("Y-m-d H:i:s")."');";

mysqli_query($connect, $sql);

//echo $sql;
if(mysqli_affected_rows($connect)<=0)
{
  echo"<script>alert('Unable to send feedback! \\nPlease Try Again!');";
  die("window.history.go(-1);</script>");
}

echo "<script>alert('Message has successfully been sent! Thank You!');";
echo "window.location.href='home.php';</script>";

?>