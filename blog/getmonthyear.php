<?php
include("config.php");
if(isset($_REQUEST['data']))
{
	$pdate = $_REQUEST['data'];
	$pquery = "select tbl_post.*,tbl_category.catname from tbl_post inner join tbl_category on tbl_post.catid=tbl_category.catid where tbl_post.pdate LIKE '%$pdate%'";
    $pres = mysqli_query($con,$pquery);
	?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="page-header">
            <h1 class="page-title">Month: <span><?php echo $pdate; ?></span></h1>
        </header>
        <?php
            while($prow = mysqli_fetch_array($pres))
        {
        ?>
        <article id="post-103"
            class="entry post-103 post type-post status-publish format-standard hentry category-game-design tag-beta-testers tag-game-design">
            <div class="entry-padding-area">
                <header class="entry-header">
                    <div class="entry-categories">
                        <ul class="post-categories">
                            <li><a href="#" rel="category tag"><?php echo $prow['catname']; ?></a></li>
                        </ul>
                    </div>
                    <h2 class="entry-title"><a href="post-detail?id=<?php echo $prow['pid']; ?>"
                            rel="bookmark"><?php echo $prow['ptitle']; ?></a></h2>
                </header>
                <div class="entry-content">
                    <p>
                        <?php echo $prow['short_desc']; ?>
                    </p>
                </div>
            </div>
            <div class="entry-padding-area footer">
                <footer class="entry-footer">
                    <a class='read-more' href='post-detail?id=<?php echo $prow['pid']; ?>'>Continue reading</a><span
                        class="posted-on"><a href="#" rel="bookmark"><time class="entry-date published"
                                datetime=""><?php echo $prow['pdate']; ?></time></a></span><span class="byline"> by
                        <span class="author vcard"><a class="url fn n"
                                href="#"><?php echo $prow['pauthor']; ?></a></span></span><span class="comments-link"><a
                            href="#">Leave a comment</a></span>
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
<?php
}
?>