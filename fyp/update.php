<?php
  include "connect.php";

  $target_dir = "uploads/";

  $uid = $_POST['uid'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $synopsis = $_POST['synopsis'];
  $target_file = $target_dir.basename($_FILES["photo"]["name"]);


    $sql = "Update malware_t SET
    malware_Name = '$name',
    malware_Price = '$price',
    malware_Synopsis = '$synopsis',
    photo_path = '$target_file' Where malware_ID = $uid";

mysqli_query($connect,$sql);
if(mysqli_affected_rows($connect)<=0)
{
  die("<script>alert('Unable to update data!');</script>");
  echo "<script>window.location.href='malwareUpdate.php?id=$uid';</script>";
}
mysqli_close($connect);

echo "<script>alert('Data updated successfully!');</script>";
echo "<script>window.location.href='addMalware.php';</script>";
?>
