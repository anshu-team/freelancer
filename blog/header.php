<?php
include("config.php");
?>
<header id="masthead" class="site-header start-style">
    <div class="site-header-inner">
        <div class="site-branding">
            <h1 class="site-title"><a href="http://localhost/freelancer" rel="home">James Clifton</a></h1>
            <p class="site-description">A man and his blog.</p>
        </div>
        <nav id="site-navigation" class="main-navigation navbar-expand-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu-primary-container" id="navbarSupportedContent">
                <ul id="primary-menu" class="navbar-nav menu">
                    <li
                        class="nav-item menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-26">
                        <a href="index" class="">Home</a>
                    </li>
                    <li class="nav-item menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children
                        menu-item-27">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false" href="#">Blog Pages</a>
                        <ul class="sub-menu dropdown-menu">
                            <?php
                                $cquery = "select * from tbl_category";
                                $cres = mysqli_query($con,$cquery);
                                while($crow=mysqli_fetch_array($cres))
                                {
                                ?>
                            <li
                                class="dropdown-item menu-item menu-item-type-taxonomy menu-item-object-category menu-item-91">
                                <a href="detail?id=<?php echo $crow['catid']; ?>"><?php echo $crow['catname']; ?></a>
                            </li>
                            <?php
                                }
                                ?>
                        </ul>
                    </li>
                    <li class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-39">
                        <a href="links">Links</a>
                    </li>
                    <li
                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-33">
                        <a href="privacy-policy">Privacy/Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>