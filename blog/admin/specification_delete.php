<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$squery = "delete from tbl_specification where sid='$id'";
mysqli_query($con,$squery);
header("location:specification");
?>