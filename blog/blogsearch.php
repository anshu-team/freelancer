<?php
include('config.php');
	if(isset($_REQUEST['datapost1'])){
    $cid=$_REQUEST['datapost1'];
    $search_exploded = explode(" ", $cid);
    $serachspace=substr_count($cid,' ');
    $construct="";
    for($i=1;$i<=$serachspace;$i++){
        $construct .=" AND ptitle LIKE '%$search_exploded[$i]%'";
    }
    $qry="SELECT * FROM tbl_post WHERE ptitle LIKE '%$search_exploded[0]%' $construct limit 15";
    $res=mysqli_query($con,$qry);
    if(mysqli_num_rows($res)>0){
        while($row= mysqli_fetch_array($res)){ ?>
            <a style="text-decoration: none; color:black; display: inline-block; position: relative; display:block; z-index: 1; padding-top: 10px;justify-content: center; font-size: 16px;" href="post-detail?id=<?php echo $row['pid']; ?>"><?php echo $row['ptitle']; ?></a>
            <?php
        }
    }else{ ?>
        <td>
            <!-- <script type="text/javascript">
                alert("no record");
            </script> -->
            <?php echo $a="No Record"; ?> 
            <!-- <img src="img/not-found.jpg"> -->
        </td>
        <?php
    }
}
?>