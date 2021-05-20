<?php
include("../config.php");
if(isset($_REQUEST['add-sp']))
{
  $cat_id = mysqli_real_escape_string($con,$_REQUEST['cat_id']);
  $stitle = mysqli_real_escape_string($con,$_REQUEST['stitle']);
  $sub_title = mysqli_real_escape_string($con,$_REQUEST['sub_title']);
  $svalue = mysqli_real_escape_string($con,$_REQUEST['svalue']);

  $squery = "insert into tbl_specification(cat_id,stitle,sub_title,svalue) values('$cat_id','$stitle','$sub_title','$svalue')";
    mysqli_query($con,$squery);
  header("location:specification");
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
              <h1>Technical Specification</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Technical Specification</li>
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
                  <h3 class="card-title">Add Specification</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="cat_id" class="col-sm-2 col-form-label">Catgory</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="cat_id" name="cat_id">
                          <option value="">--SELECT--</option>
                          <?php
                          $cquery = "select * from tbl_category";
                          $cres = mysqli_query($con,$cquery);
                          while($crow=mysqli_fetch_array($cres))
                          {
                          ?>
                            <option value="<?php echo $crow['cat_id']; ?>">
                              <?php echo $crow['cat_name']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="stitle" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stitle" name="stitle" placeholder="Title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="sub_title" class="col-sm-2 col-form-label">Sub Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="svalue" class="col-sm-2 col-form-label">Value</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="svalue" name="svalue" placeholder="Value">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="add-sp" id="add-sp" class="btn btn-info">Submit</button>
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
