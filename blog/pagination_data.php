<?php
include("config.php")
$sql = "select * from tbl_post";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($con));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$data[] = $rows;
}
$results = array(
	"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
  "aaData"=>$data);
echo json_encode($results);
exit;
?>