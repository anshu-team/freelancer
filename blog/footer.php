<footer id="colophon" class="site-footer section-fullwidth">
    <div class="row">
        <div class="columns small-12">
            <div class="site-info">
                <div style="text-align:center; color: black; font-weight: bold;">
                    Copyright <a href="#">LB TECHUB</a> 2020-2021 | Developed By
                    <a href="#">ANSHUMAN</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js"></script> -->
<!-- <script type='text/javascript' src='js/starlight-scripts.js'></script> -->
<!-- <script src="https://twemoji.maxcdn.com/v/13.0.2/twemoji.min.js"></script> -->

<!-- <script>
function showmenu() {
    $("#myUl").each(function() {
        if ($(this).css('display') == 'none') {
            $(this).css('display', 'block');
        } else {
            $(this).css('display', 'none');
        }
    });
}
</script> -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script type='text/javascript' src='js/starlight-scripts.js'></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
<!-- <script type='text/javascript' src='js/emoji-release.min.js'></script> -->
<!-- <script type='text/javascript' src='js/jquery-core.js'></script> -->
<!-- <script type='text/javascript' src='js/jquery-migrate.js'></script> -->
<!-- <script type='text/javascript' src='js/wp-embed.js'></script> -->

<!-- <script type='text/javascript'>
$(document).ready(function() {
    var n, e, o;
    var t = $(window).width(),
        n = $(".menu-primary-container").width();
    $(window).width() < 640 && (n = {
            menuIcon: $(".menu-toggle"),
            dropdownArrow: $("span.dropdown-arrow"),
            menuNav: $(".main-navigation"),
            wavesButtonSelector: $(".button")
        },
        e = function(e) {
            $("body").hasClass("admin-bar"),
                $(this).toggleClass("is-opened"),
                n.menuNav.toggleClass("is-extended").removeClass("init"),
                $("body").toggleClass("is-menu-opened")
        },
        o = function(e) {
            e.stopImmediatePropagation(),
                $(this).toggleClass("is-extended")
        }, {
            init: function() {
                $(".menu-item-has-children > .sub-menu").each(function() {
                        $("<button class='dropdown-arrow'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>")
                            .insertBefore($(this))
                    }),
                    function() {
                        n.menuIcon.on("click", e),
                            $("li.menu-item-has-children").on("click", $(this).closest(
                                "span.dropdown-arrow"), o)
                    }()
            }
        }).init();
    if (t <= 100 + $(".site-branding").width() + n && $("body").addClass("long-menu"),
        $("#site-navigation .sub-menu a").on("focusin",
            function() {
                $(this).closest(".menu-item-has-children").addClass("focus")
            }),
        $("#site-navigation .sub-menu a").on("focusout",
            function() {
                $(this).closest(".menu-item-has-children").removeClass("focus")
            }),
        $(window).width() < 640) {
        var o = $(".main-navigation .menu .menu-item");
        if (0 < o.length) {
            var s = $(o[o.length - 1]),
                i = $(".menu-toggle");
            i.on("click", function() {
                    i.toggleClass("opened")
                }),
                s.on("keydown", function(e) {
                    $("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey || (e.preventDefault(), i
                        .focus()))
                }),
                i.on("keydown", function(e) {
                    $("Tab" === e.key || 9 === e.keyCode) && e.shiftKey && i.hasClass("opened") && (e
                        .preventDefault(), s.find("a").focus())
                })
        }
    }
})
</script> -->

<script>
(function($) {
    "use strict";
    // $(function() {
    //     var header = $(".start-style");
    //     $(window).scroll(function() {
    //         var scroll = $(window).scrollTop();

    //         if (scroll >= 10) {
    //             header.removeClass('start-style').addClass("scroll-on");
    //         } else {
    //             header.removeClass("scroll-on").addClass('start-style');
    //         }
    //     });
    // });
    $(document).ready(function() {
        $('body.hero-anime').removeClass('hero-anime');
    });

    $('body').on('mouseenter mouseleave', '.nav-item', function(e) {
        if ($(window).width() > 750) {
            var _d = $(e.target).closest('.nav-item');
            _d.addClass('show');
            setTimeout(function() {
                _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
            }, 1);
        }
    });
})(jQuery);
</script>