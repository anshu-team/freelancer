<?php
include("config.php");
$id = $_GET['id'];
$pquery = "select tbl_post.*,tbl_category.catname from tbl_post inner join tbl_category on tbl_post.catid=tbl_category.catid where tbl_category.catid='$id'";
$pres = mysqli_query($con,$pquery);
$prow = mysqli_fetch_array($pres);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ("head.php"); ?>
</head>

<body class="home blog spacing-moderate hfeed">
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

        <?php include ("header.php"); ?>

        <div id="content" class="site-content">
            <section class="section-fullwidth section-main">
                <div class="row">
                    <div class="columns small-12 medium-8">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <header class="page-header">
                                    <h1 class="page-title">Category: <span><?php echo $prow['catname']; ?></span></h1>
                                </header>
                                <?php
                                $pres1 = mysqli_query($con,$pquery);
                                while($prow1=mysqli_fetch_array($pres1))
                                {
                                    ?>
                                <article id="post-103"
                                    class="entry post-103 post type-post status-publish format-standard hentry category-game-design tag-beta-testers tag-game-design">
                                    <div class="entry-padding-area">
                                        <header class="entry-header">
                                            <div class="entry-categories">
                                                <ul class="post-categories">
                                                    <li><a href="#"
                                                            rel="category tag"><?php echo $prow1['catname']; ?></a></li>
                                                </ul>
                                            </div>
                                            <h2 class="entry-title"><a
                                                    href="post-detail?id=<?php echo $prow1['pid']; ?>"
                                                    rel="bookmark"><?php echo $prow1['ptitle']; ?></a></h2>
                                        </header>
                                        <div class="entry-content">
                                            <p>
                                                <?php echo $prow1['short_desc']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="entry-padding-area footer">
                                        <footer class="entry-footer">
                                            <a class='read-more'
                                                href='post-detail?id=<?php echo $prow1['pid']; ?>'>Continue
                                                reading</a><span class="posted-on"><a href="#" rel="bookmark"><time
                                                        class="entry-date published"
                                                        datetime=""><?php echo $prow1['pdate']; ?></time></a></span><span
                                                class="byline"> by <span class="author vcard"><a class="url fn n"
                                                        href="#"><?php echo $prow1['pauthor']; ?></a></span></span><span
                                                class="comments-link"><a href="#">Leave
                                                    a comment</a></span>
                                        </footer>
                                    </div>
                                </article>
                                <?php
                                    }   
                                    ?>
                                <nav class="navigation posts-navigation" role="navigation" aria-label="Posts">
                                    <h2 class="screen-reader-text">Posts navigation</h2>
                                    <div class="nav-links">
                                        <div class="nav-previous"><a href="#">Older posts</a></div>
                                    </div>
                                </nav>
                            </main>
                        </div>
                    </div>
                    <div class="columns small-12 medium-4">
                        <aside id="secondary" class="widget-area" role="complementary">
                            <section id="search-2" class="widget widget_search">
                                <form role="search" method="post" class="search-form" action="blogsearch">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="search-field" placeholder="Search &hellip;"
                                            name="search" id="search" required="" />
                                    </label>
                                   <!--  <div style="display: block; position: relative; z-index: 1;" id="showlist">
                                    </div> -->
                                    <input type="submit" name="btn-search" id="btn-search" class="search-submit" value="Search" />
                                </form>
                            </section>
                            <section id="recent-posts-2" class="widget widget_recent_entries">
                                <h2 class="widget-title">Recent Posts</h2>
                                <ul>
                                    <?php
                                        $qu = "select * from tbl_post ORDER BY pdate DESC";
                                        $re = mysqli_query($con,$qu);
                                        while($ro=mysqli_fetch_array($re))
                                        {
                                            ?>
                                    <li>
                                        <a href="post-detail?id=<?php echo $ro['pid']; ?>"><?php echo $ro['ptitle']; ?></a>
                                    </li>
                                    <?php
                                        }
                                        ?>
                                </ul>
                            </section>
                            <section id="recent-comments-2" class="widget widget_recent_comments">
                                <h2 class="widget-title">Recent Comments</h2>
                                <ul id="recentcomments"></ul>
                            </section>
                            <section id="archives-2" class="widget widget_archive">
                                <h2 class="widget-title">Archives</h2>
                                <label class="screen-reader-text" for="archives-dropdown-2">Archives</label>
                                <select name="month" id="archives-dropdown-2" onchange=" getmyear(this.value);">
                                    <option value="">Select Month</option>
                                    <?php
                                        for ($i = 0; $i < 12; $i++) {
                                            $time = strtotime(sprintf('-%d months', $i));
                                            $label = date('F Y', $time);
                                            $value = date('F Y', $time);
                                            echo "<option value='$value'>$label</option>";
                                        }
                                        ?>
                                </select>
                                <!-- <script type="text/javascript">
                                (function() {
                                    var dropdown = document.getElementById("archives-dropdown-2");

                                    function onSelectChange() {
                                        if (dropdown.options[dropdown.selectedIndex].value !== '') {
                                            document.location.href = this.options[this.selectedIndex].value;
                                        }
                                    }
                                    dropdown.onchange = onSelectChange;
                                })();
                                </script> -->
                            </section>
                            <section id="categories-2" class="widget widget_categories">
                                <h2 class="widget-title">Categories</h2>
                                <form method="get"><label class="screen-reader-text" for="cat">Categories</label><select
                                        name='cat' id='cat' class='postform' onchange="getdata(this.value);">
                                        <option value='-1'>Select Category</option>
                                        <?php
                                        $q = "select tbl_post.ptitle,tbl_category.* from tbl_post inner join tbl_category group by tbl_category.catname";
                                        $res = mysqli_query($con,$q);
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $qq = "SELECT COUNT(ptitle) FROM tbl_post where catid='".$row['catid']."'";
                                            $rr = mysqli_query($con,$qq);
                                            $rrr = mysqli_fetch_array($rr);
                                            $total = $rrr[0];
                                            ?>
                                        <option class="level-0" value="<?php echo $row['catid']; ?>">
                                            <?php echo $row['catname']; ?>(<?php echo $total; ?>)</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </form>
                                <script type="text/javascript">
                                function getdata(val) {
                                    $.ajax({
                                        type: "POST",
                                        url: "getdata",
                                        data: "catid=" + val,
                                        success: function(data) {
                                            document.getElementById("primary").innerHTML = data;
                                        }
                                    });
                                }
                                </script>
                                <script>
                                function msearch(datavalue) {
                                    if (datavalue != '') {
                                        $.ajax({
                                            url: "blogsearch",
                                            type: "post",
                                            data: {
                                                datapost1: datavalue
                                            },
                                            success: function(result) {
                                                $("#showlist").html(result);
                                            }
                                        });
                                    } else {
                                        $("#showlist").html('');
                                    }
                                }
                                </script>
                                <script type="text/javascript">
                                function getmyear(val) {
                                    var data = val;
                                    $.ajax({
                                        type: "POST",
                                        url: "getmonthyear",
                                        data: {
                                            data: data
                                        },
                                        success: function(data) {
                                            document.getElementById("primary").innerHTML = data;
                                        }
                                    });
                                }
                                </script>
                            </section>
                        </aside>
                    </div>
                </div>
            </section>
        </div>
        <?php include ("footer.php"); ?>
    </div>
</body>

</html>