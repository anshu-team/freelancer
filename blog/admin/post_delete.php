<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$pquery = "delete from tbl_post where pid='$id'";
mysqli_query($con,$pquery);
header("location:post");
?>