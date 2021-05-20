<?php
include("../config.php");
// $query = "select tbl_specification.*,tbl_category.* from tbl_specification inner join tbl_category on tbl_specification.cat_id=tbl_category.cat_id group by tbl_specification.stitle ORDER BY tbl_specification.sid ASC";

$query = "select tbl_specification.*,tbl_category.cat_name from tbl_specification inner join tbl_category on tbl_specification.cat_id=tbl_category.cat_id where tbl_category.cat_id='1' ORDER BY tbl_specification.sid ASC";
echo $query;
// exit();
$res = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<?php
		while($row=mysqli_fetch_array($res))
		{ 
			?>
				<tr>
					<td colspan="2"><?php echo $row['stitle']; ?></td>
				</tr>
				<?php
				$query1 = "select * from tbl_specification where stitle='".$row['stitle']."'";
				$res1 = mysqli_query($con,$query1);
				while($row1=mysqli_fetch_array($res1))
				{
				?>
				<tr>
					<?php
					if($row1['sub_title'] != NULL || $row1['svalue'] != NULL)
					{
					?>
						<th><?php echo $row1['sub_title']; ?></th>
						<th><?php echo $row1['svalue']; ?></th>
					<?php
					}
					?>
				</tr>
				<?php
				}
		}
		?>
	</table>
</body>
</html>
