<?php
include("../config.php");
if(isset($_REQUEST['add-user']))
{
  $name = mysqli_real_escape_string($con,$_REQUEST['name']);
  $email = mysqli_real_escape_string($con,$_REQUEST['email']);
  $password = mysqli_real_escape_string($con,md5($_REQUEST['password']));
  $cpassword = mysqli_real_escape_string($con,md5($_REQUEST['cpassword']));
  $image = $_FILES['image']['name'];

  $user_query = "select * from tbl_user where email='$email'";
  $user_res = mysqli_query($con,$user_query);
  if(mysqli_num_rows($user_res) > 0)
  {
    echo "<script type='text/javascript'>alert('Email already exists');</script>";
  }
  else
  {
    $user_query = "insert into tbl_user(name,email,password,image) values('$name','$email','$password','$image')";
    mysqli_query($con,$user_query);
    move_uploaded_file($_FILES['image']['tmp_name'],"Image/".$_FILES['image']['name']);
    header("location:user");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("head.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    function Validate()
    {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("cpassword").value;
      if (password != confirmPassword)
      {
            alert("Password does not match");
            return false;
      }
      return true;
    }
  </script>
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
                  <h3 class="card-title">Add User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="card-body">
                     <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"  required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="cpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" onchange="Validate();" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label">Image</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image" required="">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="add-user" id="add-user" class="btn btn-info">Submit</button>
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
