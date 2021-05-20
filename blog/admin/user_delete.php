<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$query = "select * from tbl_user where uid='$id'";
$res = mysqli_query($con,$query);
$row = mysqli_fetch_array($res);
$image = "Image/".$row['image'];
if(file_exists($image))
{
	unlink($image);
}
else
{
	 echo 'Could not delete '.$image.', file does not exist';
}
$user_query = "delete from tbl_user where uid='$id'";
mysqli_query($con,$user_query);
header("location:user");
?>