<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$pquery = "select * from tbl_post where pid='$id'";
$pres = mysqli_query($con,$pquery);
$prow = mysqli_fetch_array($pres);
if(isset($_REQUEST['update-product']))
{
  $catid = mysqli_real_escape_string($con,$_REQUEST['catid']);
  $ptitle = mysqli_real_escape_string($con,$_REQUEST['ptitle']);
  $short_desc = mysqli_real_escape_string($con,$_REQUEST['short_desc']);
  $pdesc = mysqli_real_escape_string($con,$_REQUEST['pdesc']);
  $pauthor = mysqli_real_escape_string($con,$_REQUEST['pauthor']);
  $pdate = date('d F Y, h:i:s A');
  $pmonth = mysqli_real_escape_string($con,$_REQUEST['pmonth']);
   
  $pquery = "update tbl_post set catid='$catid',ptitle='$ptitle',short_desc='$short_desc',pdesc='$pdesc',pauthor='$pauthor',pdate='$pdate',pmonth='$pmonth' where pid=$id";
  mysqli_query($con,$pquery);
  header("location:post");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("head.php"); ?>
</head>
<body class="hold-transition sidebar-mi ni">
  <div class="wrapper">
    <!-- Nav-Header Start -->
    <?php include("nav-header.php"); ?>
    <!-- Nav-Header End -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Post</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Post</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Update Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="card-body">
                     <div class="form-group row">
                      <label for="cat_id" class="col-sm-2 col-form-label">Catgory</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="catid" name="catid">
                          <?php
                          $cquery = "select * from tbl_category";
                          $cres = mysqli_query($con,$cquery);
                          while($crow=mysqli_fetch_array($cres))
                          {
                          ?>
                            <option value="<?php echo $crow['catid']; ?>" <?php if($crow['catid']==$prow['catid']){ ?> selected <?php  }  ?>>
                              <?php echo $crow['catname']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="ptitle" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="Title" required="" value="<?php echo $prow['ptitle']; ?>">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Short Description"  required="">
                          <?php echo $prow['short_desc']; ?>
                        </textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pdesc" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="pdesc" name="pdesc" placeholder="Description"  required="">
                          <?php echo $prow['pdesc']; ?>
                        </textarea>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="pauthor" class="col-sm-2 col-form-label">Author Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="pauthor" name="pauthor" placeholder="Author Name" value="<?php echo $prow['pauthor']; ?>" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pmonth" class="col-sm-2 col-form-label">Month</label>
                      <div class="col-sm-10">
                        <select id="pmonth" name="pmonth" required="" class="form-control">
                          <option value="January" <?php if($prow['pmonth'] == "Januaray"){ ?> selected <?php } ?>>January</option>
                          <option value="February" <?php if($prow['pmonth'] == "February"){ ?> selected <?php } ?>>February</option>
                          <option value="March" <?php if($prow['pmonth'] == "March"){ ?> selected <?php } ?>>March</option>
                          <option value="April" <?php if($prow['pmonth'] == "April"){ ?> selected <?php } ?>>April</option>
                          <option value="May" <?php if($prow['pmonth'] == "May"){ ?> selected <?php } ?>>May</option>
                          <option value="June" <?php if($prow['pmonth'] == "June"){ ?> selected <?php } ?>>June</option>
                          <option value="July" <?php if($prow['pmonth'] == "July"){ ?> selected <?php } ?>>July</option>
                          <option value="August" <?php if($prow['pmonth'] == "August"){ ?> selected <?php } ?>>August</option>
                          <option value="September" <?php if($prow['pmonth'] == "September"){ ?> selected <?php } ?>>September</option>
                          <option value="October" <?php if($prow['pmonth'] == "October"){ ?> selected <?php } ?>>October</option>
                          <option value="November" <?php if($prow['pmonth'] == "November"){ ?> selected <?php } ?>>November</option>
                          <option value="December" <?php if($prow['pmonth'] == "December"){ ?> selected <?php } ?>>December</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="update-product" id="update-product" class="btn btn-info">Submit</button>
                    <button type="reset" class="btn btn-default float-right">Reset</button>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
  <?php include("footer.php"); ?>
</body>
</html>
