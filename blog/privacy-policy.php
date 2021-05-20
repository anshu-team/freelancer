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


                                <article id="post-3" class="entry post-3 page type-page status-publish hentry">
                                    <div class="entry-padding-area">
                                        <header class="entry-header">
                                            <h1 class="entry-title">Privacy Policy</h1>
                                        </header>
                                        <div class="entry-content">
                                            <h2>Who we are</h2>
                                            <p>An anonymized string created from your email address (also called a hash)
                                                may be provided to the Gravatar service to see if you are using it. The
                                                Gravatar service privacy policy is available here:
                                                https://automattic.com/privacy/. After approval of your comment, your
                                                profile picture is visible to the public in the context of your comment.
                                            </p>
                                            <h3>Contact forms</h3>
                                            <h3>Cookies</h3>
                                            <p>If you visit our login page, we will set a temporary cookie to determine
                                                if your browser accepts cookies. This cookie contains no personal data
                                                and is discarded when you close your browser.</p>
                                            <p>Articles on this site may include embedded content (e.g. videos, images,
                                                articles, etc.). Embedded content from other websites behaves in the
                                                exact same way as if the visitor has visited the other website.</p>
                                            <h3>Industry regulatory disclosure requirements</h3>
                                        </div>
                                    </div>
                                </article>
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
                                    <input type="submit" name="btn-search" id="btn-search" class="search-submit"
                                        value="Search" />
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
                                        <a
                                            href="post-detail?id=<?php echo $ro['pid']; ?>"><?php echo $ro['ptitle']; ?></a>
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
                                <h2 class="widget-title">Archives</h2> <label class="screen-reader-text"
                                    for="archives-dropdown-2">Archives</label>
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
</body>

</html>