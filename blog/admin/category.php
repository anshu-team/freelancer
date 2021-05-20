<?php
include("../config.php");
$cquery = "select * from tbl_category";
$cres = mysqli_query($con,$cquery);
error_reporting(0);
if (isset($_POST["submit"])) 
{
  if (count($_POST["ids"]) > 0 )
  {

    $all = implode(",", $_POST["ids"]);
    $sql =mysqli_query($con,"DELETE FROM tbl_category WHERE catid in ($all)");
    if($sql) 
    {

      header("location:category");
    } 
    else 
    {
      $errmsg ="Error while deleting. Please Try again.";
    }
  } 
  else 
  {
    $errmsg = "You need to select atleast one checkbox to delete!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("head.php"); ?>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#select_all').on('click',function(){
        if(this.checked){
          $('.checkbox').each(function(){
            this.checked = true;
          });
        }else{
          $('.checkbox').each(function(){
            this.checked = false;
          });
        }
      });
      $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
          $('#select_all').prop('checked',true);
        }else{
          $('#select_all').prop('checked',false);
        }
      });
    });
  </script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Nav-Header Start -->
    <?php include("nav-header.php"); ?>
    <!-- Nav-Header End -->
    <!-- Content Wrapper. Contains page content -->
    <form method="post">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="mr-2">
                  <a href="category_add" class="btn btn-block btn-primary btn-bg">
                    <i class="fas fa-plus"></i> 
                  </a>
                </li>
                <li>
                  <button type="submit" id="submit" class="btn btn-block btn-danger btn-bg" name="submit" onclick="javascript:return confirm('Are u sure want to delete?');">
                    <i class="fas fa-trash"></i> 
                  </button>
                </li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h6 class="card-title"></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <p style="color:red; font-size:16px;">
                      <?php 
                      if($errmsg)
                      { 
                        echo $errmsg; 
                      } 
                      ?>
                    </p>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="select_all" /> Select all</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Edit/Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($crow=mysqli_fetch_array($cres))
                        {
                          $catid = $crow['catid'];
                          ?>
                          <tr>
                            <td>
                              <input type="checkbox" class="checkbox" name="ids[]" value="<?php echo htmlentities($crow['catid']);?>"/>
                            </td>
                            <td><?php echo $crow['catid']; ?></td>
                            <td><?php echo $crow['catname']; ?></td>
                            <td>
                              <a class="btn btn-info btn-md" href="category_edit?id=<?php echo urlencode(base64_encode($catid)); ?>">
                                <i class="fas fa-edit">
                                </i>
                              </a>
                              <a class="btn btn-danger btn-md" href="category_delete?id=<?php echo urlencode(base64_encode($catid)); ?>" onclick="javascript:return confirm('Are u sure want to delete?');">
                                <i class="fas fa-trash">
                                </i>
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
    </form>
    <!-- ./wrapper -->
    <?php include("footer.php"); ?>
  </body>
  </html>
