<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$cquery = "delete from tbl_category where catid='$id'";
mysqli_query($con,$cquery);
header("location:category");
?>