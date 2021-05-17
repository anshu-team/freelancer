<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="#">
<title>My Blog.</title>
<script type="text/javascript">
! function(e, a, t) {
    var n, r, o, i = a.createElement("canvas"),
        p = i.getContext && i.getContext("2d");

    function s(e, t) {
        var a = String.fromCharCode;
        p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
        e = i.toDataURL();
        return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
    }

    function c(e) {
        var t = a.createElement("script");
        t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
    }
    for (o = Array("flag", "emoji"), t.supports = {
            everything: !0,
            everythingExceptFlag: !0
        }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
        if (!p || !p.fillText) return !1;
        switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
            case "flag":
                return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([
                    55356, 56826, 55356, 56819
                ], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418,
                    56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447
                ], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203,
                    56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447
                ]);
            case "emoji":
                return !s([55357, 56424, 8205, 55356, 57212], [55357, 56424, 8203, 55356, 57212])
        }
        return !1
    }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports
        .everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
    t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t
        .readyCallback = function() {
            t.DOMReady = !0
        }, t.supports.everything || (n = function() {
            t.readyCallback()
        }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !
            1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
            "complete" === a.readyState && t.readyCallback()
        })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n
            .wpemoji)))
}(window, document, window._wpemojiSettings);
</script>
<style type="text/css">
.img.wp-smiley,
img.emoji {
    display: inline !important;
    border: none !important;
    box-shadow: none !important;
    height: 1em !important;
    width: 1em !important;
    margin: 0 .07em !important;
    vertical-align: -0.1em !important;
    background: none !important;
    padding: 0 !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.min.css" />
<link rel='stylesheet' href='css/wp-min.css' type='text/css' media='all' />
<link rel='stylesheet' href='css/master.min.css' type='text/css' media='all' />
<style type="text/css">
.site-title a,
.site-description,
.main-navigation .menu-item a,
.main-navigation .page_item a,
.main-navigation .menu-item a a,
.main-navigation .page_item a a,
.main-navigation .menu-toggle {
    color: #000000;
}

body {
    background-color: #f0f0f0;
}

.button,
.entry .read-more,
.comments-area .form-submit .submit,
.page-content .read-more,
.widget_contact_info .confit-phone,
.entry .sticky-post,
.page-content .sticky-post,
.comments-area .logged-in-as,
.product span.onsale {
    background-color: #0024f2;
}

a,
.entry-content a,
.main-navigation .menu-toggle:hover,
.main-navigation .menu-item a:hover,
.sub-menu a:hover {
    color: #0024f2;
}

.button,
.entry .read-more,
.comments-area .form-submit .submit,
.page-content .read-more,
.paged .nav-links .nav-next,
.paged .nav-links .nav-previous,
.entry.sticky,
.sticky.page-content {
    border-color: #0024f2;
}

.bbp_widget_login .bbp-login-form fieldset {
    box-shadow: 0 -5px #0024f2;
}

@media (max-width: 860px) {
    .widget-area .widget_search {
        background-color: #0024f2;
    }
}
</style>
<style type="text/css">
.recentcomments a {
    display: inline !important;
    padding: 0 !important;
    margin: 0 !important;
}
</style>
<style type="text/css">
.responsive-image img {
    height: auto;
}

.Navbar__ToggleShow {
    display: block !important;
}
</style>