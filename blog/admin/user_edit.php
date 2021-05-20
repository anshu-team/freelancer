<?php
include("../config.php");
$id = base64_decode(urldecode($_GET['id']));
$user_query = "select * from tbl_user where uid='$id'";
$user_res = mysqli_query($con,$user_query);
$user_row = mysqli_fetch_array($user_res);
if(isset($_REQUEST['update-user']))
{
    if(move_uploaded_file($_FILES['image']['tmp_name'],"Image/".$_FILES['image']['name']))
    {
        $himage = $_FILES['image']['name'];
        $image = "Image/".$_REQUEST['himage'];
        if(file_exists($image))
        {
            unlink($image);
        }
    }
    else
    {
        $himage = $_REQUEST['himage'];
    }
    $name = mysqli_real_escape_string($con,$_REQUEST['name']);
    $email = mysqli_real_escape_string($con,$_REQUEST['email']);
   
    $user_query = "update tbl_user set name='$name',email='$email',image='$himage' where uid=$id";
    mysqli_query($con,$user_query);
    header("location:user");
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
              <h1>Users</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
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
                  <h3 class="card-title">Update User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="card-body">
                     <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="" value="<?php echo $user_row['name']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="" value="<?php echo $user_row['email']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label">Image</label>
                      <div class="col-sm-10">
                        <input type="hidden" name="himage" id="himage" value="<?php echo $user_row['image']; ?>">
                        <input type="file" class="form-control" id="image" name="image">
                      </div>
                    </div>
                    <img class="img-circle elevation-2" src="Image/<?php echo $user_row['image']; ?>" alt="" height="60" width="60">
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="update-user" id="update-user" class="btn btn-info">Submit</button>
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
