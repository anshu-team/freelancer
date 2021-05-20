<?php
session_start();
include("../config.php");
if(!isset($_SESSION['email']))
{
  header("location:index");
}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="dashboard" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="contact" class="nav-link">Contact</a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Greenwave Technologies</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
     <?php
        $semail=$_SESSION['email'];
        
        $sq=mysqli_query($con,"select * from tbl_user where email='$semail'");
        while ($r=mysqli_fetch_array($sq)) 
        {
            $simg=$r['image'];
        }
        ?>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="Image/<?php echo $simg; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard" class="d-block"><?php echo $_SESSION['email']; ?></a>
      </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="user" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="category" class="nav-link">
            <i class="nav-icon fas fa-tag"></i>
            <p>
              Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="post" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Post
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="specification" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Technical Specification
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="contact" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
            <p>
              Contact
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>