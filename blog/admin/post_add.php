<?php
include("../config.php");
if(isset($_REQUEST['add-post']))
{
  $catid = mysqli_real_escape_string($con,$_REQUEST['catid']);
  $ptitle = mysqli_real_escape_string($con,$_REQUEST['ptitle']);
  $short_desc = mysqli_real_escape_string($con,$_REQUEST['short_desc']);
  $pdesc = mysqli_real_escape_string($con,$_REQUEST['pdesc']);
  $pauthor = mysqli_real_escape_string($con,$_REQUEST['pauthor']);
  $pdate = date('d F Y, h:i:s A');
  $pmonth = mysqli_real_escape_string($con,$_REQUEST['pmonth']);

  $pquery = "insert into tbl_post(catid,ptitle,pdesc,pauthor,pdate,pmonth) values('$catid','$ptitle','$pdesc','$pauthor','$pdate','$pmonth')";
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
                  <h3 class="card-title">Add Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="card-body">
                     <div class="form-group row">
                      <label for="cat_id" class="col-sm-2 col-form-label">Catgory</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="catid" name="catid" required="">
                          <option value="">--SELECT--</option>
                          <?php
                          $cquery = "select * from tbl_category";
                          $cres = mysqli_query($con,$cquery);
                          while($crow=mysqli_fetch_array($cres))
                          {
                          ?>
                            <option value="<?php echo $crow['catid']; ?>">
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
                        <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="Title" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Short Description" required=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pdesc" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="pdesc" name="pdesc" placeholder="Description" required=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pauthor" class="col-sm-2 col-form-label">Author Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="pauthor" name="pauthor" placeholder="Author Name" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pmonth" class="col-sm-2 col-form-label">Month</label>
                      <div class="col-sm-10">
                        <select id="pmonth" name="pmonth" required="" class="form-control">
                          <option value="">Select Month</option>
                          <option value="January">January</option>
                          <option value="February">February</option>
                          <option value="March">March</option>
                          <option value="April">April</option>
                          <option value="May">May</option>
                          <option value="June">June</option>
                          <option value="July">July</option>
                          <option value="August">August</option>
                          <option value="September">September</option>
                          <option value="October">October</option>
                          <option value="November">November</option>
                          <option value="December">December</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="add-post" id="add-post" class="btn btn-info">Submit</button>
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
