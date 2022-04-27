<?php
include "connect.php";
$name = mysqli_real_escape_string($connect,$_POST['name']);
$email = mysqli_real_escape_string($connect,$_POST['email']);
$message = mysqli_real_escape_string($connect,$_POST['message']);

$sql = "Insert into contact_t (cnt_Name, cnt_Email, cnt_Message, cnt_fbdatetime) VALUES
('$name','$email','$message','".date("Y-m-d H:i:s")."');";

mysqli_query($connect, $sql);

//echo $sql;
if(mysqli_affected_rows($connect)<=0)
{
  echo"<script>alert('Unable to send feedback! \\nPlease Try Again!');";
  die("window.history.go(-1);</script>");
}

echo "<script>alert('Message has successfully been sent! Thank You!');";
echo "window.location.href='index.php';</script>";

?>