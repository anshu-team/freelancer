<div class="columns small-12 medium-4">
    <aside id="secondary" class="widget-area" role="complementary">
        <section id="search-2" class="widget widget_search">
            <form role="search" method="get" class="search-form" action="#">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>
        </section>
        <section id="recent-posts-2" class="widget widget_recent_entries">
            <h2 class="widget-title">Recent Posts</h2>
            <ul>
                <li>
                    <a href="#/2021/01/01/beta-testers/">BETA TESTERS</a>
                </li>
                <li>
                    <a href="#/2020/12/01/design-documents-for-games/">Design
                        Documents for games</a>
                </li>
                <li>
                    <a href="#/2020/11/01/questions-to-ask-yourself-before-you-design-a-game/">Questions
                        to ask yourself before you design a game</a>
                </li>
                <li>
                    <a href="#/2020/10/01/copyright-for-game-design/">Copyright
                        for Game Design</a>
                </li>
                <li>
                    <a href="#/2020/09/01/you-get-what-you-pay-for/">You
                        get what you pay for.</a>
                </li>
            </ul>
        </section>
        <section id="recent-comments-2" class="widget widget_recent_comments">
            <h2 class="widget-title">Recent Comments</h2>
            <ul id="recentcomments"></ul>
        </section>
        <section id="archives-2" class="widget widget_archive">
            <h2 class="widget-title">Archives</h2> <label class="screen-reader-text"
                for="archives-dropdown-2">Archives</label>
            <select id="archives-dropdown-2" name="archive-dropdown">
                <option value="">Select Month</option>
                <option value="#/2021/01/"> January 2021 (1)</option>
                <option value="#/2020/12/"> December 2020 (1)</option>
                <option value="#/2020/11/"> November 2020 (1)</option>
                <option value="#/2020/10/"> October 2020 (1)</option>
                <option value="#/2020/09/"> September 2020 (1)</option>
                <option value="#/2020/08/"> August 2020 (1)</option>
                <option value="#/2020/07/"> July 2020 (1)</option>
                <option value="#/2020/05/"> May 2020 (1)</option>
                <option value="#/2020/04/"> April 2020 (1)</option>
                <option value="#/2020/03/"> March 2020 (3)</option>
                <option value="#/2020/01/"> January 2020 (4)</option>
            </select>
            <script type="text/javascript">
            (function() {
                var dropdown = document.getElementById("archives-dropdown-2");

                function onSelectChange() {
                    if (dropdown.options[dropdown.selectedIndex].value !== '') {
                        document.location.href = this.options[this.selectedIndex].value;
                    }
                }
                dropdown.onchange = onSelectChange;
            })();
            </script>
        </section>
        <section id="categories-2" class="widget widget_categories">
            <h2 class="widget-title">Categories</h2>
            <form action="#" method="get"><label class="screen-reader-text" for="cat">Categories</label><select
                    name="cat" id="cat" class="postform">
                    <option value="-1">Select Category</option>
                    <option class="level-0" value="15">Comics (5)</option>
                    <option class="level-0" value="5">Ebay (6)</option>
                    <option class="level-0" value="23">Game Design (4)</option>
                    <option class="level-0" value="9">google (2)</option>
                    <option class="level-0" value="3">Other (1)</option>
                </select>
            </form>
            <script type="text/javascript">
            (function() {
                var dropdown = document.getElementById("cat");

                function onCatChange() {
                    if (dropdown.options[dropdown.selectedIndex].value > 0) {
                        dropdown.parentNode.submit();
                    }
                }
                dropdown.onchange = onCatChange;
            })();
            </script>

        </section>
    </aside>
</div>