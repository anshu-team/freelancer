"use strict"; function _typeof(e) { return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) { return typeof e } : function (e) { return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e })(e) } function _typeof(e) { return (_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) { return typeof e } : function (e) { return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e })(e) } !function (e, t) { "object" === ("undefined" == typeof exports ? "undefined" : _typeof(exports)) && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self).Headroom = t() }(void 0, function () { function e() { return "undefined" != typeof window } function f(e) { return (r = e) && r.document && 9 === r.document.nodeType ? (o = (n = e).document, s = o.body, i = o.documentElement, { scrollHeight: function () { return Math.max(s.scrollHeight, i.scrollHeight, s.offsetHeight, i.offsetHeight, s.clientHeight, i.clientHeight) }, height: function () { return n.innerHeight || i.clientHeight || s.clientHeight }, scrollY: function () { return void 0 !== n.pageYOffset ? n.pageYOffset : (i || s.parentNode || s).scrollTop } }) : (t = e, { scrollHeight: function () { return Math.max(t.scrollHeight, t.offsetHeight, t.clientHeight) }, height: function () { return Math.max(t.offsetHeight, t.clientHeight) }, scrollY: function () { return t.scrollTop } }); var t, n, o, s, i, r } function t(e, o, s) { var t, n = function () { var t = !1; try { var e = { get passive() { t = !0 } }; window.addEventListener("test", e, e), window.removeEventListener("test", e, e) } catch (e) { t = !1 } return t }(), i = !1, r = f(e), a = r.scrollY(), l = {}; function u() { var e = Math.round(r.scrollY()), t = r.height(), n = r.scrollHeight(); l.scrollY = e, l.lastScrollY = a, l.direction = a < e ? "down" : "up", l.distance = Math.abs(e - a), l.isOutOfBounds = e < 0 || n < e + t, l.top = e <= o.offset, l.bottom = n <= e + t, l.toleranceExceeded = l.distance > o.tolerance[l.direction], s(l), a = e, i = !1 } function c() { i || (i = !0, t = requestAnimationFrame(u)) } var d = !!n && { passive: !0, capture: !1 }; return e.addEventListener("scroll", c, d), u(), { destroy: function () { cancelAnimationFrame(t), e.removeEventListener("scroll", c, d) } } } function o(e, t) { var n; t = t || {}, Object.assign(this, o.options, t), this.classes = Object.assign({}, o.options.classes, t.classes), this.elem = e, this.tolerance = (n = this.tolerance) === Object(n) ? n : { down: n, up: n }, this.initialised = !1, this.frozen = !1 } return o.prototype = { constructor: o, init: function () { return o.cutsTheMustard && !this.initialised && (this.addClass("initial"), this.initialised = !0, setTimeout(function (e) { e.scrollTracker = t(e.scroller, { offset: e.offset, tolerance: e.tolerance }, e.update.bind(e)) }, 100, this)), this }, destroy: function () { this.initialised = !1, Object.keys(this.classes).forEach(this.removeClass, this), this.scrollTracker.destroy() }, unpin: function () { !this.hasClass("pinned") && this.hasClass("unpinned") || (this.addClass("unpinned"), this.removeClass("pinned"), this.onUnpin && this.onUnpin.call(this)) }, pin: function () { this.hasClass("unpinned") && (this.addClass("pinned"), this.removeClass("unpinned"), this.onPin && this.onPin.call(this)) }, freeze: function () { this.frozen = !0, this.addClass("frozen") }, unfreeze: function () { this.frozen = !1, this.removeClass("frozen") }, top: function () { this.hasClass("top") || (this.addClass("top"), this.removeClass("notTop"), this.onTop && this.onTop.call(this)) }, notTop: function () { this.hasClass("notTop") || (this.addClass("notTop"), this.removeClass("top"), this.onNotTop && this.onNotTop.call(this)) }, bottom: function () { this.hasClass("bottom") || (this.addClass("bottom"), this.removeClass("notBottom"), this.onBottom && this.onBottom.call(this)) }, notBottom: function () { this.hasClass("notBottom") || (this.addClass("notBottom"), this.removeClass("bottom"), this.onNotBottom && this.onNotBottom.call(this)) }, shouldUnpin: function (e) { return "down" === e.direction && !e.top && e.toleranceExceeded }, shouldPin: function (e) { return "up" === e.direction && e.toleranceExceeded || e.top }, addClass: function (e) { this.elem.classList.add.apply(this.elem.classList, this.classes[e].split(" ")) }, removeClass: function (e) { this.elem.classList.remove.apply(this.elem.classList, this.classes[e].split(" ")) }, hasClass: function (e) { return this.classes[e].split(" ").every(function (e) { return this.classList.contains(e) }, this.elem) }, update: function (e) { e.isOutOfBounds || !0 !== this.frozen && (e.top ? this.top() : this.notTop(), e.bottom ? this.bottom() : this.notBottom(), this.shouldUnpin(e) ? this.unpin() : this.shouldPin(e) && this.pin()) } }, o.options = { tolerance: { up: 0, down: 0 }, offset: 0, scroller: e() ? window : null, classes: { frozen: "headroom--frozen", pinned: "headroom--pinned", unpinned: "headroom--unpinned", top: "headroom--top", notTop: "headroom--not-top", bottom: "headroom--bottom", notBottom: "headroom--not-bottom", initial: "headroom" } }, o.cutsTheMustard = !!(e() && function () { }.bind && "classList" in document.documentElement && Object.assign && Object.keys && requestAnimationFrame), o }), function (i, f, h) { function p(e, t) { return _typeof(e) === t } function m() { return "function" != typeof f.createElement ? f.createElement(arguments[0]) : v ? f.createElementNS.call(f, "http://www.w3.org/2000/svg", arguments[0]) : f.createElement.apply(f, arguments) } function a(e, t) { return function () { return e.apply(t, arguments) } } function s(e) { return e.replace(/([A-Z])/g, function (e, t) { return "-" + t.toLowerCase() }).replace(/^ms-/, "-ms-") } function r(e, t, n, o) { var s, i, r, a, l, u = "modernizr", c = m("div"), d = ((l = f.body) || ((l = m(v ? "svg" : "body")).fake = !0), l); if (parseInt(n, 10)) for (; n--;)(r = m("div")).id = o ? o[n] : u + (n + 1), c.appendChild(r); return (s = m("style")).type = "text/css", s.id = "s" + u, (d.fake ? d : c).appendChild(s), d.appendChild(c), s.styleSheet ? s.styleSheet.cssText = e : s.appendChild(f.createTextNode(e)), c.id = u, d.fake && (d.style.background = "", d.style.overflow = "hidden", a = g.style.overflow, g.style.overflow = "hidden", g.appendChild(d)), i = t(c, e), d.fake ? (d.parentNode.removeChild(d), g.style.overflow = a, g.offsetHeight) : c.parentNode.removeChild(c), !!i } function y(e, t) { var n = e.length; if ("CSS" in i && "supports" in i.CSS) { for (; n--;)if (i.CSS.supports(s(e[n]), t)) return !0; return !1 } if ("CSSSupportsRule" in i) { for (var o = []; n--;)o.push("(" + s(e[n]) + ":" + t + ")"); return r("@supports (" + (o = o.join(" or ")) + ") { #modernizr { position: absolute; } }", function (e) { return "absolute" == function (e, t, n) { var o; if ("getComputedStyle" in i) { o = getComputedStyle.call(i, e, t); var s = i.console; null !== o ? n && (o = o.getPropertyValue(n)) : s && s[s.error ? "error" : "log"].call(s, "getComputedStyle returning null, its possible modernizr test results are inaccurate") } else o = !t && e.currentStyle && e.currentStyle[n]; return o }(e, null, "position") }) } return h } function o(e, t, n, o, s) { var i = e.charAt(0).toUpperCase() + e.slice(1), r = (e + " " + d.join(i + " ") + i).split(" "); return p(t, "string") || p(t, "undefined") ? function (e, t, n, o) { function s() { r && (delete w.style, delete w.modElem) } if (o = !p(o, "undefined") && o, !p(n, "undefined")) { var i = y(e, n); if (!p(i, "undefined")) return i } for (var r, a, l, u, c, d = ["modernizr", "tspan", "samp"]; !w.style && d.length;)r = !0, w.modElem = m(d.shift()), w.style = w.modElem.style; for (l = e.length, a = 0; a < l; a++)if (u = e[a], c = w.style[u], !!~("" + u).indexOf("-") && (u = u.replace(/([a-z])-([a-z])/g, function (e, t, n) { return t + n.toUpperCase() }).replace(/^-/, "")), w.style[u] !== h) { if (o || p(n, "undefined")) return s(), "pfx" != t || u; try { w.style[u] = n } catch (e) { } if (w.style[u] != c) return s(), "pfx" != t || u } return s(), !1 }(r, t, o, s) : function (e, t, n) { var o; for (var s in e) if (e[s] in t) return !1 === n ? e[s] : p(o = t[e[s]], "function") ? a(o, n || t) : o; return !1 }(r = (e + " " + b.join(i + " ") + i).split(" "), t, n) } function e(e, t, n) { return o(e, h, h, t, n) } var l = [], u = [], t = { _version: "3.6.0", _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 }, _q: [], on: function (e, t) { var n = this; setTimeout(function () { t(n[e]) }, 0) }, addTest: function (e, t, n) { u.push({ name: e, fn: t, options: n }) }, addAsyncTest: function (e) { u.push({ name: null, fn: e }) } }, c = function () { }; c.prototype = t, (c = new c).addTest("json", "JSON" in i && "parse" in JSON && "stringify" in JSON); var g = f.documentElement, v = "svg" === g.nodeName.toLowerCase(); c.addTest("csspointerevents", function () { var e = m("a").style; return e.cssText = "pointer-events:auto", "auto" === e.pointerEvents }); var n = "Moz O ms Webkit", d = t._config.usePrefixes ? n.split(" ") : []; t._cssomPrefixes = d; var b = t._config.usePrefixes ? n.toLowerCase().split(" ") : []; t._domPrefixes = b; var C = { elem: m("modernizr") }; c._q.push(function () { delete C.elem }); 
var w = { style: C.elem.style }; 
c._q.unshift(function () { delete w.style }), 
t.testAllProps = o, 
t.testAllProps = e, 
c.addTest("boxshadow", e("boxShadow", "1px 1px", !0)), 
c.addTest("flexbox", e("flexBasis", "1px", !0)), 
function () { 
    var e, t, n, o, s, i; 
    for (var r in u) if (u.hasOwnProperty(r)) { 
        if (e = [], (t = u[r]).name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length)) 
        for (n = 0; n < t.options.aliases.length; n++)e.push(t.options.aliases[n].toLowerCase()); 
        for (o = p(t.fn, "function") ? t.fn() : t.fn, s = 0; s < e.length; s++)1 === (i = e[s].split(".")).length ? c[i[0]] = o : (!c[i[0]] || c[i[0]] instanceof Boolean || (c[i[0]] = new Boolean(c[i[0]])), c[i[0]][i[1]] = o), l.push((o ? "" : "no-") + i.join("-")) 
    } 
}(), 
function (e) { 
    var t = g.className, 
    n = c._config.classPrefix || ""; 
    if (v && (t = t.baseVal), c._config.enableJSClass) { 
            var o = new RegExp("(^|\\s)" + n + "no-js(\\s|$)"); 
            t = t.replace(o, "$1" + n + "js$2") 
        } 
        c._config.enableClasses && (t += " " + n + e.join(" " + n), v ? g.className.baseVal = t : g.className = t) 
}(l), 
delete t.addTest, delete t.addAsyncTest; 
for (var x = 0; x < c._q.length; x++)c._q[x](); i.Modernizr = c 
}(window, document), 
jQuery(document).ready(function (t) {
    var n, e, o; 
    t(window).width() < 640 && (n = { 
        menuIcon: t(".menu-toggle"), 
        dropdownArrow: t("span.dropdown-arrow"), 
        menuNav: t(".main-navigation"), 
        wavesButtonSelector: ".button" 
    }, 
    e = function (e) { 
        t("body").hasClass("admin-bar"), 
        t(this).toggleClass("is-opened"), 
        n.menuNav.toggleClass("is-extended").removeClass("init"), 
        t("body").toggleClass("is-menu-opened") 
    }, 
    o = function (e) { 
        e.stopImmediatePropagation(), 
        t(this).toggleClass("is-extended") 
    }, 
    { 
        init: function () { 
            t(".menu-item-has-children > .sub-menu").each(function () { 
                t("<button class='dropdown-arrow'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>").insertBefore(t(this)) 
            }), 
            function () { 
                n.menuIcon.on("click", e), 
                t("li.menu-item-has-children").on("click", 
                t(this).closest("span.dropdown-arrow"), o) 
            }() 
        } 
    }).init() 
}), 
function () { 
    var e = -1 < navigator.userAgent.toLowerCase().indexOf("webkit"), 
    t = -1 < navigator.userAgent.toLowerCase().indexOf("opera"), 
    n = -1 < navigator.userAgent.toLowerCase().indexOf("msie"); 
    (e || t || n) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () { 
        var e, t = location.hash.substring(1); 
        /^[A-z0-9_-]+$/.test(t) && (e = document.getElementById(t)) && (/^(?:a|select|input|button|textarea)$/i.test(e.tagName) || (e.tabIndex = -1), e.focus()) 
    }, !1) 
}(),
jQuery(document).ready(function (e) { 
    var t = e(window).width(), 
    n = e(".menu-primary-container").width(); 
    if (t <= 100 + e(".site-branding").width() + n && e("body").addClass("long-menu"), 
    e("#site-navigation .sub-menu a").on("focusin", function () { e(this).closest(".menu-item-has-children").addClass("focus") }), 
    e("#site-navigation .sub-menu a").on("focusout", function () { e(this).closest(".menu-item-has-children").removeClass("focus") }), 
    e(window).width() < 640) { 
        var o = e(".main-navigation .menu .menu-item"); 
        if (0 < o.length) { 
            var s = e(o[o.length - 1]), 
            i = e(".menu-toggle"); 
            i.on("click", function () { i.toggleClass("opened") }), 
            s.on("keydown", function (e) { 
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey || (e.preventDefault(), i.focus())) 
            }),
            i.on("keydown", function (e) { 
                ("Tab" === e.key || 9 === e.keyCode) && e.shiftKey && i.hasClass("opened") && (e.preventDefault(), s.find("a").focus()) 
            }) 
        } 
    } 
});