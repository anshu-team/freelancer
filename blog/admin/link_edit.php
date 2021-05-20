<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$cquery = "select * from tbl_link where linkid='$id'";
$cres = mysqli_query($con,$cquery);
$crow = mysqli_fetch_array($cres);
if(isset($_REQUEST['update-link']))
{
    $lname = mysqli_real_escape_string($con,$_REQUEST['lname']);
    $ldesc = mysqli_real_escape_string($con,$_REQUEST['ldesc']);
    $url = mysqli_real_escape_string($con,$_REQUEST['url']);
   
    $cquery = "update tbl_link set lname='$lname',ldesc='$ldesc',url='$url' where linkid=$id";
    mysqli_query($con,$cquery);
    header("location:link");
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
              <h1>Links</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Links</li>
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
                  <h3 class="card-title">Update Link</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="lname" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Name" required="" value="<?php echo $crow['lname']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ldesc" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="ldesc" name="ldesc" placeholder="Description" required="">
                          <?php echo $crow['ldesc']; ?>
                        </textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="url" class="col-sm-2 col-form-label">URL</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" required="" value="<?php echo $crow['url']; ?>">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="update-link" id="update-link" class="btn btn-info">Submit</button>
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
