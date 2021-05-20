<?php
include("config.php");
$id = $_GET['id'];
$pquery = "select tbl_post.*,tbl_category.catname from tbl_post inner join tbl_category on tbl_post.catid=tbl_category.catid where tbl_post.pid='$id'";
$pres = mysqli_query($con,$pquery);
$pp = mysqli_query($con,$pquery);
$ppp = mysqli_fetch_array($pp);
if(isset($_REQUEST['btn-comment']))
{
$pid = mysqli_real_escape_string($con,$_REQUEST['pid']);
$comment = mysqli_real_escape_string($con,$_REQUEST['comment']);
$name = mysqli_real_escape_string($con,$_REQUEST['name']);
$email = mysqli_real_escape_string($con,$_REQUEST['email']);
$website = mysqli_real_escape_string($con,$_REQUEST['website']);
$cdate = date('d F Y, h:i:s A');

$cquery = "insert into tbl_comment(pid,comment,name,email,website,cdate) values('$pid','$comment','$name','$email','$website','$cdate')";
mysqli_query($con,$cquery);
}
$c =  "select count(comment) from tbl_comment where pid='$id'";
$cc = mysqli_query($con,$c);
$ccc = mysqli_fetch_array($cc);
$t = $ccc[0];
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
                <?php
                while($prow=mysqli_fetch_array($pres))
                {
                ?>
                <article id="post-103"
                    class="entry post-103 post type-post status-publish format-standard hentry category-game-design tag-beta-testers tag-game-design">
                    <div class="entry-padding-area">
                        <header class="entry-header">
                            <div class="entry-categories">
                                <ul class="post-categories">
                                    <li><a href="#"
                                            rel="category tag"><?php echo $prow['catname']; ?></a></li>
                                </ul>
                            </div>
                            <h2 class="entry-title"><a href="#"
                                    rel="bookmark"><?php echo $prow['ptitle']; ?></a></h2>
                        </header>
                        <div class="entry-content">
                            <p>
                                <?php echo $prow['pdesc']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="entry-padding-area footer">
                        <footer class="entry-footer">
                            <span class="posted-on">
                                <a href="#" rel="bookmark"><time class="entry-date published"
                                        datetime="2021-01-01T05:17:44+00:00"><?php echo $prow['pdate']; ?></time></a></span><span
                                class="byline"> by <span class="author vcard"><a class="url fn n"
                                        href="#"><?php echo $prow['pauthor']; ?></a></span></span><span
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
                        <div class="nav-previous">
                            <a href="#" rel="prev">Design Documents for games</a>
                        </div>
                    </div>
                </nav>
                <div id="comments" class="comments-area">
                    <h2 class="comments-title">
                        <?php echo $t; ?> thoughts on “<span><?php echo $ppp['ptitle']; ?></span>”
                    </h2>
                    <ol class="comment-list">
                        <?php
                        $cqueryy = "select * from tbl_comment where pid='$id'";
                        $cress = mysqli_query($con,$cqueryy);
                        while($croww=mysqli_fetch_array($cress))
                        {
                        ?>
                        <li id="comment-184" class="comment even thread-even depth-1">
                            <article id="div-comment-184" class="comment-body">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img alt=""
                                            src="http://1.gravatar.com/avatar/75d23af433e0cea4c0e45a56dba18b30?s=32&amp;d=mm&amp;r=g"
                                            srcset="http://1.gravatar.com/avatar/75d23af433e0cea4c0e45a56dba18b30?s=64&amp;d=mm&amp;r=g 2x"
                                            class="avatar avatar-32 photo" height="32" width="32"
                                            loading="lazy"> <b class="fn"><a
                                                href="https://www.google.co.in/"
                                                rel="external nofollow ugc" class="url"><?php echo $croww['name']; ?></a></b>
                                        <span class="says">says:</span>
                                    </div><!-- .comment-author -->
                                    <div class="comment-metadata">
                                        <a ><time >
                                                    <?php echo $croww['cdate']; ?>
                                                </time></a>
                                    </div><!-- .comment-metadata -->
                                    <em class="comment-awaiting-moderation">Your comment is awaiting
                                        moderation.</em>
                                </footer><!-- .comment-meta -->
                                <div class="comment-content">
                                    <p><?php echo $croww['comment']; ?></p>
                                </div><!-- .comment-content -->
                                <div class="reply"><a rel="nofollow" class="comment-reply-link"
                                        href="http://www.jamesclifton.com/2021/01/01/beta-testers/?replytocom=184#respond"
                                        data-commentid="184" data-postid="103"
                                        data-belowelement="div-comment-184"
                                        data-respondelement="respond" data-replyto="Reply to dsfdsfsd"
                                        aria-label="Reply to dsfdsfsd">Reply</a></div>
                            </article><!-- .comment-body -->
                        </li><!-- #comment-## -->
                        <?php
                        }
                        ?>
                    </ol>
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Leave a Reply
                            <small>
                                <a rel="nofollow" id="cancel-comment-reply-link" href="#"
                                    style="display:none;">Cancel reply</a>
                            </small>
                        </h3>
                        <form method="post" class="comment-form">
                            <p class="comment-notes">
                                <span id="email-notes">Your email address will not be published.</span>
                                Required
                                fields are marked <span class="required">*</span>
                            </p>
                            <p class="comment-form-comment">
                                <label for="comment">Comment</label>
                                <textarea id="comment" name="comment" cols="45" rows="8"
                                    required="required"></textarea>
                            </p>
                            <p class="comment-form-author">
                                <label for="author">Name <span class="required">*</span></label>
                                <input id="name" name="name" type="text" size="30" required="required">
                            </p>
                            <p class="comment-form-email">
                                <label for="email">Email <span class="required">*</span></label>
                                <input id="email" name="email" type="email" size="30"
                                    aria-describedby="email-notes" required="required">
                            </p>
                            <p class="comment-form-url">
                                <label for="url">Website</label>
                                <input id="website" name="website" type="url" size="30" required="">
                            </p>
                            <p class="comment-form-cookies-consent">
                                <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent"
                                    type="checkbox" value="yes">
                                <label for="wp-comment-cookies-consent">Save my name, email, and website
                                    in this browser for the next
                                    time I comment.</label>
                            </p>
                            <p class="form-submit">
                                <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>">
                                <input type="submit" id="btn-comment" name="btn-comment" class="submit"
                                    value="Post Comment">
                            </p>
                        </form>
                    </div>
                </div>
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