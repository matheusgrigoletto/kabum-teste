"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-input-inputtypes-placeholder-mq-prefixed-setclasses-shiv-testallprops-testprop !*/
!function (e, t, n) {
  function r(e, t) {
    return (typeof e === "undefined" ? "undefined" : _typeof(e)) === t;
  }function i() {
    var e, t, n, i, o, a, l;for (var s in S) {
      if (S.hasOwnProperty(s)) {
        if (e = [], t = S[s], t.name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length)) for (n = 0; n < t.options.aliases.length; n++) {
          e.push(t.options.aliases[n].toLowerCase());
        }for (i = r(t.fn, "function") ? t.fn() : t.fn, o = 0; o < e.length; o++) {
          a = e[o], l = a.split("."), 1 === l.length ? Modernizr[l[0]] = i : (!Modernizr[l[0]] || Modernizr[l[0]] instanceof Boolean || (Modernizr[l[0]] = new Boolean(Modernizr[l[0]])), Modernizr[l[0]][l[1]] = i), C.push((i ? "" : "no-") + l.join("-"));
        }
      }
    }
  }function o(e) {
    var t = E.className,
        n = Modernizr._config.classPrefix || "";if (x && (t = t.baseVal), Modernizr._config.enableJSClass) {
      var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");t = t.replace(r, "$1" + n + "js$2");
    }Modernizr._config.enableClasses && (t += " " + n + e.join(" " + n), x ? E.className.baseVal = t : E.className = t);
  }function a(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, t, n) {
      return t + n.toUpperCase();
    }).replace(/^-/, "");
  }function l() {
    return "function" != typeof t.createElement ? t.createElement(arguments[0]) : x ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments);
  }function s() {
    var e = t.body;return e || (e = l(x ? "svg" : "body"), e.fake = !0), e;
  }function u(e, n, r, i) {
    var o,
        a,
        u,
        c,
        f = "modernizr",
        d = l("div"),
        p = s();if (parseInt(r, 10)) for (; r--;) {
      u = l("div"), u.id = i ? i[r] : f + (r + 1), d.appendChild(u);
    }return o = l("style"), o.type = "text/css", o.id = "s" + f, (p.fake ? p : d).appendChild(o), p.appendChild(d), o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(t.createTextNode(e)), d.id = f, p.fake && (p.style.background = "", p.style.overflow = "hidden", c = E.style.overflow, E.style.overflow = "hidden", E.appendChild(p)), a = n(d, e), p.fake ? (p.parentNode.removeChild(p), E.style.overflow = c, E.offsetHeight) : d.parentNode.removeChild(d), !!a;
  }function c(e, t) {
    return !!~("" + e).indexOf(t);
  }function f(e, t) {
    return function () {
      return e.apply(t, arguments);
    };
  }function d(e, t, n) {
    var i;for (var o in e) {
      if (e[o] in t) return n === !1 ? e[o] : (i = t[e[o]], r(i, "function") ? f(i, n || t) : i);
    }return !1;
  }function p(e) {
    return e.replace(/([A-Z])/g, function (e, t) {
      return "-" + t.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }function m(t, n, r) {
    var i;if ("getComputedStyle" in e) {
      i = getComputedStyle.call(e, t, n);var o = e.console;if (null !== i) r && (i = i.getPropertyValue(r));else if (o) {
        var a = o.error ? "error" : "log";o[a].call(o, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
      }
    } else i = !n && t.currentStyle && t.currentStyle[r];return i;
  }function h(t, r) {
    var i = t.length;if ("CSS" in e && "supports" in e.CSS) {
      for (; i--;) {
        if (e.CSS.supports(p(t[i]), r)) return !0;
      }return !1;
    }if ("CSSSupportsRule" in e) {
      for (var o = []; i--;) {
        o.push("(" + p(t[i]) + ":" + r + ")");
      }return o = o.join(" or "), u("@supports (" + o + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" == m(e, null, "position");
      });
    }return n;
  }function v(e, t, i, o) {
    function s() {
      f && (delete A.style, delete A.modElem);
    }if (o = r(o, "undefined") ? !1 : o, !r(i, "undefined")) {
      var u = h(e, i);if (!r(u, "undefined")) return u;
    }for (var f, d, p, m, v, g = ["modernizr", "tspan", "samp"]; !A.style && g.length;) {
      f = !0, A.modElem = l(g.shift()), A.style = A.modElem.style;
    }for (p = e.length, d = 0; p > d; d++) {
      if (m = e[d], v = A.style[m], c(m, "-") && (m = a(m)), A.style[m] !== n) {
        if (o || r(i, "undefined")) return s(), "pfx" == t ? m : !0;try {
          A.style[m] = i;
        } catch (y) {}if (A.style[m] != v) return s(), "pfx" == t ? m : !0;
      }
    }return s(), !1;
  }function g(e, t, n, i, o) {
    var a = e.charAt(0).toUpperCase() + e.slice(1),
        l = (e + " " + M.join(a + " ") + a).split(" ");return r(t, "string") || r(t, "undefined") ? v(l, t, i, o) : (l = (e + " " + F.join(a + " ") + a).split(" "), d(l, t, n));
  }function y(e, t, r) {
    return g(e, n, n, t, r);
  }var C = [],
      S = [],
      b = { _version: "3.6.0", _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 }, _q: [], on: function on(e, t) {
      var n = this;setTimeout(function () {
        t(n[e]);
      }, 0);
    }, addTest: function addTest(e, t, n) {
      S.push({ name: e, fn: t, options: n });
    }, addAsyncTest: function addAsyncTest(e) {
      S.push({ name: null, fn: e });
    } },
      Modernizr = function Modernizr() {};Modernizr.prototype = b, Modernizr = new Modernizr();var E = t.documentElement,
      x = "svg" === E.nodeName.toLowerCase();x || !function (e, t) {
    function n(e, t) {
      var n = e.createElement("p"),
          r = e.getElementsByTagName("head")[0] || e.documentElement;return n.innerHTML = "x<style>" + t + "</style>", r.insertBefore(n.lastChild, r.firstChild);
    }function r() {
      var e = C.elements;return "string" == typeof e ? e.split(" ") : e;
    }function i(e, t) {
      var n = C.elements;"string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), C.elements = n + " " + e, u(t);
    }function o(e) {
      var t = y[e[v]];return t || (t = {}, g++, e[v] = g, y[g] = t), t;
    }function a(e, n, r) {
      if (n || (n = t), f) return n.createElement(e);r || (r = o(n));var i;return i = r.cache[e] ? r.cache[e].cloneNode() : h.test(e) ? (r.cache[e] = r.createElem(e)).cloneNode() : r.createElem(e), !i.canHaveChildren || m.test(e) || i.tagUrn ? i : r.frag.appendChild(i);
    }function l(e, n) {
      if (e || (e = t), f) return e.createDocumentFragment();n = n || o(e);for (var i = n.frag.cloneNode(), a = 0, l = r(), s = l.length; s > a; a++) {
        i.createElement(l[a]);
      }return i;
    }function s(e, t) {
      t.cache || (t.cache = {}, t.createElem = e.createElement, t.createFrag = e.createDocumentFragment, t.frag = t.createFrag()), e.createElement = function (n) {
        return C.shivMethods ? a(n, e, t) : t.createElem(n);
      }, e.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + r().join().replace(/[\w\-:]+/g, function (e) {
        return t.createElem(e), t.frag.createElement(e), 'c("' + e + '")';
      }) + ");return n}")(C, t.frag);
    }function u(e) {
      e || (e = t);var r = o(e);return !C.shivCSS || c || r.hasCSS || (r.hasCSS = !!n(e, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), f || s(e, r), e;
    }var c,
        f,
        d = "3.7.3",
        p = e.html5 || {},
        m = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
        h = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
        v = "_html5shiv",
        g = 0,
        y = {};!function () {
      try {
        var e = t.createElement("a");e.innerHTML = "<xyz></xyz>", c = "hidden" in e, f = 1 == e.childNodes.length || function () {
          t.createElement("a");var e = t.createDocumentFragment();return "undefined" == typeof e.cloneNode || "undefined" == typeof e.createDocumentFragment || "undefined" == typeof e.createElement;
        }();
      } catch (n) {
        c = !0, f = !0;
      }
    }();var C = { elements: p.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video", version: d, shivCSS: p.shivCSS !== !1, supportsUnknownElements: f, shivMethods: p.shivMethods !== !1, type: "default", shivDocument: u, createElement: a, createDocumentFragment: l, addElements: i };e.html5 = C, u(t), "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports && (module.exports = C);
  }("undefined" != typeof e ? e : this, t), Modernizr.addTest("placeholder", "placeholder" in l("input") && "placeholder" in l("textarea"));var w = l("input"),
      _ = "autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),
      k = {};Modernizr.input = function (t) {
    for (var n = 0, r = t.length; r > n; n++) {
      k[t[n]] = !!(t[n] in w);
    }return k.list && (k.list = !(!l("datalist") || !e.HTMLDataListElement)), k;
  }(_);var N = "search tel url email datetime date month week time datetime-local number range color".split(" "),
      z = {};Modernizr.inputtypes = function (e) {
    for (var r, i, o, a = e.length, l = "1)", s = 0; a > s; s++) {
      w.setAttribute("type", r = e[s]), o = "text" !== w.type && "style" in w, o && (w.value = l, w.style.cssText = "position:absolute;visibility:hidden;", /^range$/.test(r) && w.style.WebkitAppearance !== n ? (E.appendChild(w), i = t.defaultView, o = i.getComputedStyle && "textfield" !== i.getComputedStyle(w, null).WebkitAppearance && 0 !== w.offsetHeight, E.removeChild(w)) : /^(search|tel)$/.test(r) || (o = /^(url|email)$/.test(r) ? w.checkValidity && w.checkValidity() === !1 : w.value != l)), z[e[s]] = !!o;
    }return z;
  }(N);var T = function () {
    var t = e.matchMedia || e.msMatchMedia;return t ? function (e) {
      var n = t(e);return n && n.matches || !1;
    } : function (t) {
      var n = !1;return u("@media " + t + " { #modernizr { position: absolute; } }", function (t) {
        n = "absolute" == (e.getComputedStyle ? e.getComputedStyle(t, null) : t.currentStyle).position;
      }), n;
    };
  }();b.mq = T;var j = "Moz O ms Webkit",
      M = b._config.usePrefixes ? j.split(" ") : [];b._cssomPrefixes = M;var P = function P(t) {
    var r,
        i = prefixes.length,
        o = e.CSSRule;if ("undefined" == typeof o) return n;if (!t) return !1;if (t = t.replace(/^@/, ""), r = t.replace(/-/g, "_").toUpperCase() + "_RULE", r in o) return "@" + t;for (var a = 0; i > a; a++) {
      var l = prefixes[a],
          s = l.toUpperCase() + "_" + r;if (s in o) return "@-" + l.toLowerCase() + "-" + t;
    }return !1;
  };b.atRule = P;var F = b._config.usePrefixes ? j.toLowerCase().split(" ") : [];b._domPrefixes = F;var L = { elem: l("modernizr") };Modernizr._q.push(function () {
    delete L.elem;
  });var A = { style: L.elem.style };Modernizr._q.unshift(function () {
    delete A.style;
  });b.testProp = function (e, t, r) {
    return v([e], n, t, r);
  };b.testAllProps = g;b.prefixed = function (e, t, n) {
    return 0 === e.indexOf("@") ? P(e) : (-1 != e.indexOf("-") && (e = a(e)), t ? g(e, t, n) : g(e, "pfx"));
  };b.testAllProps = y, i(), o(C), delete b.addTest, delete b.addAsyncTest;for (var q = 0; q < Modernizr._q.length; q++) {
    Modernizr._q[q]();
  }e.Modernizr = Modernizr;
}(window, document);
//# sourceMappingURL=modernizr.js.map
