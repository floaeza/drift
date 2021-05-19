(function() {
  var a = "\n//# sourceURL=",
    k = "' of type ",
    n = '<script type="text/javascript" src="',
    p = "SCRIPT",
    r = "array",
    t = "complete",
    u = "function",
    v = "google.charts.load",
    w = "hasOwnProperty",
    x = "number",
    y = "object",
    z = "pre-45",
    A = "propertyIsEnumerable",
    B = "string",
    C = "text/javascript",
    D = "toLocaleString";

  function E() {
    return function(b) {
      return b
    }
  }

  function F() {
    return function() {}
  }

  function G(b) {
    return function() {
      return this[b]
    }
  }
  var I, J = J || {};
  J.scope = {};
  J.Wp = function(b, c, d) {
    if (null == b) throw new TypeError("The 'this' value for String.prototype." + d + " must not be null or undefined");
    if (c instanceof RegExp) throw new TypeError("First argument to String.prototype." + d + " must not be a regular expression");
    return b + ""
  };
  J.Ih = !1;
  J.im = !1;
  J.jm = !1;
  J.defineProperty = J.Ih || typeof Object.defineProperties == u ? Object.defineProperty : function(b, c, d) {
    b != Array.prototype && b != Object.prototype && (b[c] = d.value)
  };
  J.Kj = function(b) {
    return "undefined" != typeof window && window === b ? b : "undefined" != typeof global && null != global ? global : b
  };
  J.global = J.Kj(this);
  J.Vk = function(b) {
    if (b) {
      for (var c = J.global, d = ["Promise"], e = 0; e < d.length - 1; e++) {
        var f = d[e];
        f in c || (c[f] = {});
        c = c[f]
      }
      d = d[d.length - 1];
      e = c[d];
      b = b(e);
      b != e && null != b && J.defineProperty(c, d, {
        configurable: !0,
        writable: !0,
        value: b
      })
    }
  };
  J.Hq = function(b, c, d) {
    b instanceof String && (b = String(b));
    for (var e = b.length, f = 0; f < e; f++) {
      var g = b[f];
      if (c.call(d, g, f, b)) return {
        ak: f,
        Ol: g
      }
    }
    return {
      ak: -1,
      Ol: void 0
    }
  };
  J.Ai = "jscomp_symbol_";
  J.ug = function() {
    J.ug = F();
    J.global.Symbol || (J.global.Symbol = J.Symbol)
  };
  J.zl = 0;
  J.Symbol = function(b) {
    return J.Ai + (b || "") + J.zl++
  };
  J.Hd = function() {
    J.ug();
    var b = J.global.Symbol.iterator;
    b || (b = J.global.Symbol.iterator = J.global.Symbol("iterator"));
    typeof Array.prototype[b] != u && J.defineProperty(Array.prototype, b, {
      configurable: !0,
      writable: !0,
      value: function() {
        return J.gf(this)
      }
    });
    J.Hd = F()
  };
  J.gf = function(b) {
    var c = 0;
    return J.wk(function() {
      return c < b.length ? {
        done: !1,
        value: b[c++]
      } : {
        done: !0
      }
    })
  };
  J.wk = function(b) {
    J.Hd();
    b = {
      next: b
    };
    b[J.global.Symbol.iterator] = function() {
      return this
    };
    return b
  };
  J.Tg = function(b) {
    J.Hd();
    var c = b[Symbol.iterator];
    return c ? c.call(b) : J.gf(b)
  };
  J.$h = !1;
  J.Vk(function(b) {
    function c(b) {
      this.$ = g.xa;
      this.ja = void 0;
      this.Wb = [];
      var c = this.jd();
      try {
        b(c.resolve, c.reject)
      } catch (q) {
        c.reject(q)
      }
    }

    function d() {
      this.Ma = null
    }

    function e(b) {
      return b instanceof c ? b : new c(function(c) {
        c(b)
      })
    }
    if (b && !J.$h) return b;
    d.prototype.hf = function(b) {
      null == this.Ma && (this.Ma = [], this.Pi());
      this.Ma.push(b)
    };
    d.prototype.Pi = function() {
      var b = this;
      this.jf(function() {
        b.wj()
      })
    };
    var f = J.global.setTimeout;
    d.prototype.jf = function(b) {
      f(b, 0)
    };
    d.prototype.wj = function() {
      for (; this.Ma && this.Ma.length;) {
        var b =
          this.Ma;
        this.Ma = [];
        for (var c = 0; c < b.length; ++c) {
          var d = b[c];
          delete b[c];
          try {
            d()
          } catch (H) {
            this.Qi(H)
          }
        }
      }
      this.Ma = null
    };
    d.prototype.Qi = function(b) {
      this.jf(function() {
        throw b;
      })
    };
    var g = {
      xa: 0,
      Ja: 1,
      ka: 2
    };
    c.prototype.jd = function() {
      function b(b) {
        return function(e) {
          d || (d = !0, b.call(c, e))
        }
      }
      var c = this,
        d = !1;
      return {
        resolve: b(this.$k),
        reject: b(this.$d)
      }
    };
    c.prototype.$k = function(b) {
      if (b === this) this.$d(new TypeError("A Promise cannot resolve to itself"));
      else if (b instanceof c) this.rl(b);
      else {
        a: switch (typeof b) {
          case y:
            var d =
              null != b;
            break a;
          case u:
            d = !0;
            break a;
          default:
            d = !1
        }
        d ? this.Zk(b) : this.Lf(b)
      }
    };
    c.prototype.Zk = function(b) {
      var c = void 0;
      try {
        c = b.then
      } catch (q) {
        this.$d(q);
        return
      }
      typeof c == u ? this.sl(c, b) : this.Lf(b)
    };
    c.prototype.$d = function(b) {
      this.ph(g.ka, b)
    };
    c.prototype.Lf = function(b) {
      this.ph(g.Ja, b)
    };
    c.prototype.ph = function(b, c) {
      if (this.$ != g.xa) throw Error("Cannot settle(" + b + ", " + c | "): Promise already settled in state" + this.$);
      this.$ = b;
      this.ja = c;
      this.yj()
    };
    c.prototype.yj = function() {
      if (null != this.Wb) {
        for (var b = this.Wb,
            c = 0; c < b.length; ++c) b[c].call(), b[c] = null;
        this.Wb = null
      }
    };
    var h = new d;
    c.prototype.rl = function(b) {
      var c = this.jd();
      b.ic(c.resolve, c.reject)
    };
    c.prototype.sl = function(b, c) {
      var d = this.jd();
      try {
        b.call(c, d.resolve, d.reject)
      } catch (H) {
        d.reject(H)
      }
    };
    c.prototype.then = function(b, d) {
      function e(b, c) {
        return typeof b == u ? function(c) {
          try {
            f(b(c))
          } catch (ca) {
            g(ca)
          }
        } : c
      }
      var f, g, h = new c(function(b, c) {
        f = b;
        g = c
      });
      this.ic(e(b, f), e(d, g));
      return h
    };
    c.prototype["catch"] = function(b) {
      return this.then(void 0, b)
    };
    c.prototype.ic = function(b,
      c) {
      function d() {
        switch (e.$) {
          case g.Ja:
            b(e.ja);
            break;
          case g.ka:
            c(e.ja);
            break;
          default:
            throw Error("Unexpected state: " + e.$);
        }
      }
      var e = this;
      null == this.Wb ? h.hf(d) : this.Wb.push(function() {
        h.hf(d)
      })
    };
    c.resolve = e;
    c.reject = function(b) {
      return new c(function(c, d) {
        d(b)
      })
    };
    c.race = function(b) {
      return new c(function(c, d) {
        for (var f = J.Tg(b), g = f.next(); !g.done; g = f.next()) e(g.value).ic(c, d)
      })
    };
    c.all = function(b) {
      var d = J.Tg(b),
        f = d.next();
      return f.done ? e([]) : new c(function(b, c) {
        function g(c) {
          return function(d) {
            h[c] = d;
            l--;
            0 == l && b(h)
          }
        }
        var h = [],
          l = 0;
        do h.push(void 0), l++, e(f.value).ic(g(h.length - 1), c), f = d.next(); while (!f.done)
      })
    };
    return c
  });
  var K = K || {};
  K.global = this;
  K.P = function(b) {
    return void 0 !== b
  };
  K.L = function(b) {
    return typeof b == B
  };
  K.ek = function(b) {
    return "boolean" == typeof b
  };
  K.Tb = function(b) {
    return typeof b == x
  };
  K.od = function(b, c, d) {
    b = b.split(".");
    d = d || K.global;
    b[0] in d || !d.execScript || d.execScript("var " + b[0]);
    for (var e; b.length && (e = b.shift());) !b.length && K.P(c) ? d[e] = c : d = d[e] && d[e] !== Object.prototype[e] ? d[e] : d[e] = {}
  };
  K.define = function(b, c) {
    K.od(b, c)
  };
  K.ea = !0;
  K.ba = "en";
  K.bd = !0;
  K.yi = !1;
  K.Wh = !K.ea;
  K.Ge = !1;
  K.Gs = function(b) {
    if (K.Md()) throw Error("goog.provide can not be used within a goog.module.");
    K.tf(b)
  };
  K.tf = function(b, c) {
    K.od(b, c)
  };
  K.Fi = /^[a-zA-Z_$][a-zA-Z0-9._$]*$/;
  K.Vd = function(b) {
    if (!K.L(b) || !b || -1 == b.search(K.Fi)) throw Error("Invalid module identifier");
    if (!K.Md()) throw Error("Module " + b + " has been loaded incorrectly. Note, modules cannot be loaded as normal scripts. They require some kind of pre-processing step. You're likely trying to load a module via a script tag or as a part of a concatenated bundle without rewriting the module. For more info see: https://github.com/google/closure-library/wiki/goog.module:-an-ES6-module-like-alternative-to-goog.provide.");
    if (K.na.Wd) throw Error("goog.module may only be called once per module.");
    K.na.Wd = b
  };
  K.Vd.get = function() {
    return null
  };
  K.Vd.cr = function() {
    return null
  };
  K.na = null;
  K.Md = function() {
    return null != K.na
  };
  K.Vd.ld = function() {
    K.na.ld = !0
  };
  K.xt = function(b) {
    if (K.Wh) throw b = b || "", Error("Importing test-only code into non-debug environment" + (b ? ": " + b : "."));
  };
  K.Nq = F();
  K.vb = function(b) {
    b = b.split(".");
    for (var c = K.global, d; d = b.shift();)
      if (K.eb(c[d])) c = c[d];
      else return null;
    return c
  };
  K.mr = function(b, c) {
    c = c || K.global;
    for (var d in b) c[d] = b[d]
  };
  K.kp = function(b, c, d, e) {
    if (K.De) {
      var f;
      b = b.replace(/\\/g, "/");
      var g = K.la;
      e && "boolean" !== typeof e || (e = e ? {
        module: "goog"
      } : {});
      for (var h = 0; f = c[h]; h++) g.Ub[f] = b, g.Qd[b] = e;
      for (e = 0; c = d[e]; e++) b in g.gb || (g.gb[b] = {}), g.gb[b][c] = !0
    }
  };
  K.$t = !1;
  K.$m = !0;
  K.Hk = function(b) {
    K.global.console && K.global.console.error(b)
  };
  K.Ss = F();
  K.La = "";
  K.Sa = F();
  K.jp = function() {
    throw Error("unimplemented abstract method");
  };
  K.lp = function(b) {
    b.Id = void 0;
    b.ar = function() {
      if (b.Id) return b.Id;
      K.ea && (K.zg[K.zg.length] = b);
      return b.Id = new b
    }
  };
  K.zg = [];
  K.hi = !0;
  K.vi = K.ea;
  K.Fk = {};
  K.De = !1;
  K.Ye = "detect";
  K.Bi = "transpile.js";
  K.De && (K.la = {
      Qd: {},
      Ub: {},
      gb: {},
      Bh: {},
      me: {},
      tb: {}
    }, K.tg = function() {
      var b = K.global.document;
      return null != b && "write" in b
    }, K.zj = function() {
      if (K.P(K.global.Be) && K.L(K.global.Be)) K.La = K.global.Be;
      else if (K.tg()) {
        var b = K.global.document;
        var c = b.currentScript;
        b = c ? [c] : b.getElementsByTagName(p);
        for (c = b.length - 1; 0 <= c; --c) {
          var d = b[c].src,
            e = d.lastIndexOf("?");
          e = -1 == e ? d.length : e;
          if ("base.js" == d.substr(e - 7, 7)) {
            K.La = d.substr(0, e - 7);
            break
          }
        }
      }
    }, K.Gd = function(b, c) {
      (K.global.Cm || K.Wl)(b, c) && (K.la.me[b] = !0)
    }, K.fi = !(K.global.atob ||
      !K.global.document || !K.global.document.all), K.dh = !1, K.ck = function(b, c, d) {
      K.Gd("", 'goog.retrieveAndExec_("' + b + '", ' + c + ", " + d + ");")
    }, K.Yd = [], K.du = function(b, c) {
      return K.hi && K.P(K.global.JSON) ? "goog.loadModule(" + K.global.JSON.stringify(c + a + b + "\n") + ");" : 'goog.loadModule(function(exports) {"use strict";' + c + "\n;return exports});\n//# sourceURL=" + b + "\n"
    }, K.Dk = function() {
      var b = K.Yd.length;
      if (0 < b) {
        var c = K.Yd;
        K.Yd = [];
        for (var d = 0; d < b; d++) K.Wg(c[d])
      }
      K.dh = !1
    }, K.ms = function(b) {
      K.Eg(b) && K.Li(b) && K.Wg(K.La + K.Bd(b))
    },
    K.Eg = function(b) {
      var c = (b = K.Bd(b)) && K.la.Qd[b] || {},
        d = c.lang || "es3";
      return b && ("goog" == c.module || K.$g(d)) ? K.La + b in K.la.tb : !1
    }, K.Li = function(b) {
      if ((b = K.Bd(b)) && b in K.la.gb)
        for (var c in K.la.gb[b])
          if (!K.pk(c) && !K.Eg(c)) return !1;
      return !0
    }, K.Wg = function(b) {
      if (b in K.la.tb) {
        var c = K.la.tb[b];
        delete K.la.tb[b];
        K.Vj(c)
      }
    }, K.gs = F(), K.Vl = function(b) {
      K.global.document.write(n + b + '">\x3c/script>')
    }, K.Mi = function(b) {
      var c = K.global.document,
        d = c.createElement("script");
      d.type = C;
      d.src = b;
      d.defer = !1;
      d.async = !1;
      c.head.appendChild(d)
    },
    K.Wl = function(b, c) {
      if (K.tg()) {
        var d = K.global.document;
        if (!K.Ge && d.readyState == t) {
          if (/\bdeps.js$/.test(b)) return !1;
          throw Error('Cannot write "' + b + '" after document load');
        }
        void 0 === c ? K.fi ? (K.dh = !0, c = " onreadystatechange='goog.onScriptLoad_(this, " + ++K.Sg + ")' ", d.write(n + b + '"' + c + ">\x3c/script>")) : K.Ge ? K.Mi(b) : K.Vl(b) : d.write('<script type="text/javascript">' + K.Wk(c) + "\x3c/script>");
        return !0
      }
      return !1
    }, K.Wk = function(b) {
      return b.replace(/<\/(SCRIPT)/ig, "\\x3c/$1")
    }, K.$g = function(b) {
      if ("always" == K.Ye) return !0;
      if ("never" == K.Ye) return !1;
      K.Gc || (K.Gc = K.gj());
      if (b in K.Gc) return K.Gc[b];
      throw Error("Unknown language mode: " + b);
    }, K.Gc = null, K.Sg = 0, K.As = function(b, c) {
      b.readyState == t && K.Sg == c && K.Dk();
      return !0
    }, K.eu = function(b) {
      function c(b) {
        if (!(b in f.me || b in f.Bh)) {
          f.Bh[b] = !0;
          if (b in f.gb)
            for (var g in f.gb[b])
              if (!K.pk(g))
                if (g in f.Ub) c(f.Ub[g]);
                else throw Error("Undefined nameToPath for " + g);
          b in e || (e[b] = !0, d.push(b))
        }
      }
      var d = [],
        e = {},
        f = K.la;
      c(b);
      for (var g = 0; g < d.length; g++) b = d[g], K.la.me[b] = !0;
      var h = K.na;
      K.na =
        null;
      for (g = 0; g < d.length; g++)
        if (b = d[g]) {
          var l = f.Qd[b] || {},
            m = K.$g(l.lang || "es3");
          "goog" == l.module || m ? K.ck(K.La + b, "goog" == l.module, m) : K.Gd(K.La + b)
        } else throw K.na = h, Error("Undefined script input");
      K.na = h
    }, K.Bd = function(b) {
      return b in K.la.Ub ? K.la.Ub[b] : null
    }, K.zj(), K.global.Dm || K.Gd(K.La + "deps.js"));
  K.Ed = null;
  K.Ml = function() {
    if (null == K.Ed) {
      try {
        var b = !eval('"use strict";let x = 1; function f() { return typeof x; };f() == "number";')
      } catch (c) {
        b = !1
      }
      K.Ed = b
    }
    return K.Ed
  };
  K.Tl = function(b) {
    return "(function(){" + b + "\n;})();\n"
  };
  K.fs = function(b) {
    var c = K.na;
    try {
      K.na = {
        Wd: void 0,
        ld: !1
      };
      if (K.za(b)) var d = b.call(void 0, {});
      else if (K.L(b)) K.Ml() && (b = K.Tl(b)), d = K.Ck.call(void 0, b);
      else throw Error("Invalid module definition");
      var e = K.na.Wd;
      if (!K.L(e) || !e) throw Error('Invalid module name "' + e + '"');
      K.na.ld ? K.tf(e, d) : K.vi && Object.seal && typeof d == y && null != d && Object.seal(d);
      K.Fk[e] = d
    } finally {
      K.na = c
    }
  };
  K.Ck = function(b) {
    eval(b);
    return {}
  };
  K.ts = function(b) {
    b = b.split("/");
    for (var c = 0; c < b.length;) "." == b[c] ? b.splice(c, 1) : c && ".." == b[c] && b[c - 1] && ".." != b[c - 1] ? b.splice(--c, 2) : c++;
    return b.join("/")
  };
  K.zk = function(b) {
    if (K.global.Rh) return K.global.Rh(b);
    try {
      var c = new K.global.XMLHttpRequest;
      c.open("get", b, !1);
      c.send();
      return 0 == c.status || 200 == c.status ? c.responseText : null
    } catch (d) {
      return null
    }
  };
  K.Us = F();
  K.Rt = function(b, c) {
    var d = K.global.$jscomp;
    d || (K.global.$jscomp = d = {});
    var e = d.je;
    if (!e) {
      var f = K.La + K.Bi,
        g = K.zk(f);
      if (g) {
        eval(g + a + f);
        if (K.global.$gwtExport && K.global.$gwtExport.$jscomp && !K.global.$gwtExport.$jscomp.transpile) throw Error('The transpiler did not properly export the "transpile" method. $gwtExport: ' + JSON.stringify(K.global.$gwtExport));
        K.global.$jscomp.je = K.global.$gwtExport.$jscomp.transpile;
        d = K.global.$jscomp;
        e = d.je
      }
    }
    if (!e) {
      var h = " requires transpilation but no transpiler was found.";
      h += ' Please add "//javascript/closure:transpiler" as a data dependency to ensure it is included.';
      e = d.je = function(b, c) {
        K.Hk(c + h);
        return b
      }
    }
    return e(b, c)
  };
  K.aa = function(b) {
    var c = typeof b;
    if (c == y)
      if (b) {
        if (b instanceof Array) return r;
        if (b instanceof Object) return c;
        var d = Object.prototype.toString.call(b);
        if ("[object Window]" == d) return y;
        if ("[object Array]" == d || typeof b.length == x && "undefined" != typeof b.splice && "undefined" != typeof b.propertyIsEnumerable && !b.propertyIsEnumerable("splice")) return r;
        if ("[object Function]" == d || "undefined" != typeof b.call && "undefined" != typeof b.propertyIsEnumerable && !b.propertyIsEnumerable("call")) return u
      } else return "null";
    else if (c == u && "undefined" == typeof b.call) return y;
    return c
  };
  K.Rr = function(b) {
    return null === b
  };
  K.eb = function(b) {
    return null != b
  };
  K.isArray = function(b) {
    return K.aa(b) == r
  };
  K.Pb = function(b) {
    var c = K.aa(b);
    return c == r || c == y && typeof b.length == x
  };
  K.Dr = function(b) {
    return K.ia(b) && typeof b.getFullYear == u
  };
  K.za = function(b) {
    return K.aa(b) == u
  };
  K.ia = function(b) {
    var c = typeof b;
    return c == y && null != b || c == u
  };
  K.ng = function(b) {
    return b[K.Wa] || (b[K.Wa] = ++K.Fl)
  };
  K.pr = function(b) {
    return !!b[K.Wa]
  };
  K.Xk = function(b) {
    null !== b && "removeAttribute" in b && b.removeAttribute(K.Wa);
    try {
      delete b[K.Wa]
    } catch (c) {}
  };
  K.Wa = "closure_uid_" + (1E9 * Math.random() >>> 0);
  K.Fl = 0;
  K.$q = K.ng;
  K.Os = K.Xk;
  K.cj = function(b) {
    var c = K.aa(b);
    if (c == y || c == r) {
      if (b.clone) return b.clone();
      c = c == r ? [] : {};
      for (var d in b) c[d] = K.cj(b[d]);
      return c
    }
    return b
  };
  K.Ui = function(b, c, d) {
    return b.call.apply(b.bind, arguments)
  };
  K.Ti = function(b, c, d) {
    if (!b) throw Error();
    if (2 < arguments.length) {
      var e = Array.prototype.slice.call(arguments, 2);
      return function() {
        var d = Array.prototype.slice.call(arguments);
        Array.prototype.unshift.apply(d, e);
        return b.apply(c, d)
      }
    }
    return function() {
      return b.apply(c, arguments)
    }
  };
  K.bind = function(b, c, d) {
    K.bind = Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? K.Ui : K.Ti;
    return K.bind.apply(null, arguments)
  };
  K.fb = function(b, c) {
    var d = Array.prototype.slice.call(arguments, 1);
    return function() {
      var c = d.slice();
      c.push.apply(c, arguments);
      return b.apply(this, c)
    }
  };
  K.os = function(b, c) {
    for (var d in c) b[d] = c[d]
  };
  K.now = K.bd && Date.now || function() {
    return +new Date
  };
  K.Vj = function(b) {
    if (K.global.execScript) K.global.execScript(b, "JavaScript");
    else if (K.global.eval) {
      if (null == K.oc)
        if (K.global.eval("var _evalTest_ = 1;"), "undefined" != typeof K.global._evalTest_) {
          try {
            delete K.global._evalTest_
          } catch (e) {}
          K.oc = !0
        } else K.oc = !1;
      if (K.oc) K.global.eval(b);
      else {
        var c = K.global.document,
          d = c.createElement(p);
        d.type = C;
        d.defer = !1;
        d.appendChild(c.createTextNode(b));
        c.body.appendChild(d);
        c.body.removeChild(d)
      }
    } else throw Error("goog.globalEval not available");
  };
  K.oc = null;
  K.Yq = function(b, c) {
    function d(b) {
      b = b.split("-");
      for (var c = [], d = 0; d < b.length; d++) c.push(e(b[d]));
      return c.join("-")
    }

    function e(b) {
      return K.xf[b] || b
    }
    if ("." == String(b).charAt(0)) throw Error('className passed in goog.getCssName must not start with ".". You passed: ' + b);
    var f = K.xf ? "BY_WHOLE" == K.mj ? e : d : E();
    b = c ? b + "-" + f(c) : f(b);
    return K.global.Qh ? K.global.Qh(b) : b
  };
  K.gt = function(b, c) {
    K.xf = b;
    K.mj = c
  };
  K.dr = function(b, c) {
    c && (b = b.replace(/\{\$([^}]+)}/g, function(b, e) {
      return null != c && e in c ? c[e] : b
    }));
    return b
  };
  K.er = E();
  K.Cf = function(b, c) {
    K.od(b, c, void 0)
  };
  K.Gq = function(b, c, d) {
    b[c] = d
  };
  K.bb = function(b, c) {
    function d() {}
    d.prototype = c.prototype;
    b.Nc = c.prototype;
    b.prototype = new d;
    b.prototype.constructor = b;
    b.Si = function(b, d, g) {
      for (var e = Array(arguments.length - 2), f = 2; f < arguments.length; f++) e[f - 2] = arguments[f];
      return c.prototype[d].apply(b, e)
    }
  };
  K.Si = function(b, c, d) {
    var e = arguments.callee.caller;
    if (K.yi || K.ea && !e) throw Error("arguments.caller not defined.  goog.base() cannot be used with strict mode code. See http://www.ecma-international.org/ecma-262/5.1/#sec-C");
    if (e.Nc) {
      for (var f = Array(arguments.length - 1), g = 1; g < arguments.length; g++) f[g - 1] = arguments[g];
      return e.Nc.constructor.apply(b, f)
    }
    f = Array(arguments.length - 2);
    for (g = 2; g < arguments.length; g++) f[g - 2] = arguments[g];
    g = !1;
    for (var h = b.constructor; h; h = h.Nc && h.Nc.constructor)
      if (h.prototype[c] ===
        e) g = !0;
      else if (g) return h.prototype[c].apply(b, f);
    if (b[c] === e) return b.constructor.prototype[c].apply(b, f);
    throw Error("goog.base called from a method of one name to a method of a different name");
  };
  K.scope = function(b) {
    if (K.Md()) throw Error("goog.scope is not supported within a goog.module.");
    b.call(K.global)
  };
  K.qa = function(b, c) {
    var d = c.constructor,
      e = c.wl;
    d && d != Object.prototype.constructor || (d = function() {
      throw Error("cannot instantiate an interface (no constructor defined).");
    });
    d = K.qa.hj(d, b);
    b && K.bb(d, b);
    delete c.constructor;
    delete c.wl;
    K.qa.ff(d.prototype, c);
    null != e && (e instanceof Function ? e(d) : K.qa.ff(d, e));
    return d
  };
  K.qa.ui = K.ea;
  K.qa.hj = function(b, c) {
    function d() {
      var c = b.apply(this, arguments) || this;
      c[K.Wa] = c[K.Wa];
      this.constructor === d && e && Object.seal instanceof Function && Object.seal(c);
      return c
    }
    if (!K.qa.ui) return b;
    var e = !K.qa.sk(c);
    return d
  };
  K.qa.sk = function(b) {
    return b && b.prototype && b.prototype[K.Di]
  };
  K.qa.Pe = ["constructor", w, "isPrototypeOf", A, D, "toString", "valueOf"];
  K.qa.ff = function(b, c) {
    for (var d in c) Object.prototype.hasOwnProperty.call(c, d) && (b[d] = c[d]);
    for (var e = 0; e < K.qa.Pe.length; e++) d = K.qa.Pe[e], Object.prototype.hasOwnProperty.call(c, d) && (b[d] = c[d])
  };
  K.Kt = F();
  K.Di = "goog_defineClass_legacy_unsealable";
  K.gj = function() {
    function b(b, c) {
      e ? d[b] = !0 : c() ? d[b] = !1 : e = d[b] = !0
    }

    function c(b) {
      try {
        return !!eval(b)
      } catch (h) {
        return !1
      }
    }
    var d = {
        es3: !1
      },
      e = !1,
      f = K.global.navigator && K.global.navigator.userAgent ? K.global.navigator.userAgent : "";
    b("es5", function() {
      return c("[1,].length==1")
    });
    b("es6", function() {
      var b = f.match(/Edge\/(\d+)(\.\d)*/i);
      return b && 15 > Number(b[1]) ? !1 : c('(()=>{"use strict";class X{constructor(){if(new.target!=String)throw 1;this.x=42}}let q=Reflect.construct(X,[],String);if(q.x!=42||!(q instanceof String))throw 1;for(const a of[2,3]){if(a==2)continue;function f(z={a}){let a=0;return z.a}{function f(){return 0;}}return f()==3}})()')
    });
    b("es6-impl", function() {
      return !0
    });
    b("es7", function() {
      return c("2 ** 2 == 4")
    });
    b("es8", function() {
      return c("async () => 1, true")
    });
    return d
  };
  K.debug = {};
  K.debug.Error = function(b) {
    if (Error.captureStackTrace) Error.captureStackTrace(this, K.debug.Error);
    else {
      var c = Error().stack;
      c && (this.stack = c)
    }
    b && (this.message = String(b))
  };
  K.bb(K.debug.Error, Error);
  K.debug.Error.prototype.name = "CustomError";
  K.a = {};
  K.a.fa = {
    Ia: 1,
    km: 2,
    fc: 3,
    zm: 4,
    bn: 5,
    an: 6,
    ro: 7,
    Im: 8,
    Zc: 9,
    Um: 10,
    Xh: 11,
    fo: 12
  };
  K.f = {};
  K.f.Yc = !1;
  K.f.Zh = !1;
  K.f.af = {
    Ne: "\u00a0"
  };
  K.f.startsWith = function(b, c) {
    return 0 == b.lastIndexOf(c, 0)
  };
  K.f.endsWith = function(b, c) {
    var d = b.length - c.length;
    return 0 <= d && b.indexOf(c, d) == d
  };
  K.f.aj = function(b) {
    return 0 == K.f.mf("tel:", b.substr(0, 4))
  };
  K.f.Up = function(b, c) {
    return 0 == K.f.mf(c, b.substr(b.length - c.length, c.length))
  };
  K.f.Vp = function(b, c) {
    return b.toLowerCase() == c.toLowerCase()
  };
  K.f.yl = function(b, c) {
    for (var d = b.split("%s"), e = "", f = Array.prototype.slice.call(arguments, 1); f.length && 1 < d.length;) e += d.shift() + f.shift();
    return e + d.join("%s")
  };
  K.f.aq = function(b) {
    return b.replace(/[\s\xa0]+/g, " ").replace(/^\s+|\s+$/g, "")
  };
  K.f.Kd = function(b) {
    return /^[\s\xa0]*$/.test(b)
  };
  K.f.Gr = function(b) {
    return 0 == b.length
  };
  K.f.Sb = K.f.Kd;
  K.f.gk = function(b) {
    return K.f.Kd(K.f.Mk(b))
  };
  K.f.Fr = K.f.gk;
  K.f.Br = function(b) {
    return !/[^\t\n\r ]/.test(b)
  };
  K.f.yr = function(b) {
    return !/[^a-zA-Z]/.test(b)
  };
  K.f.Sr = function(b) {
    return !/[^0-9]/.test(b)
  };
  K.f.zr = function(b) {
    return !/[^a-zA-Z0-9]/.test(b)
  };
  K.f.Yr = function(b) {
    return " " == b
  };
  K.f.Zr = function(b) {
    return 1 == b.length && " " <= b && "~" >= b || "\u0080" <= b && "\ufffd" >= b
  };
  K.f.It = function(b) {
    return b.replace(/(\r\n|\r|\n)+/g, " ")
  };
  K.f.$i = function(b) {
    return b.replace(/(\r\n|\r|\n)/g, "\n")
  };
  K.f.vs = function(b) {
    return b.replace(/\xa0|\s/g, " ")
  };
  K.f.us = function(b) {
    return b.replace(/\xa0|[ \t]+/g, " ")
  };
  K.f.$p = function(b) {
    return b.replace(/[\t\r\n ]+/g, " ").replace(/^[\t\r\n ]+|[\t\r\n ]+$/g, "")
  };
  K.f.trim = K.bd && String.prototype.trim ? function(b) {
    return b.trim()
  } : function(b) {
    return b.replace(/^[\s\xa0]+|[\s\xa0]+$/g, "")
  };
  K.f.trimLeft = function(b) {
    return b.replace(/^[\s\xa0]+/, "")
  };
  K.f.trimRight = function(b) {
    return b.replace(/[\s\xa0]+$/, "")
  };
  K.f.mf = function(b, c) {
    b = String(b).toLowerCase();
    c = String(c).toLowerCase();
    return b < c ? -1 : b == c ? 0 : 1
  };
  K.f.bh = function(b, c, d) {
    if (b == c) return 0;
    if (!b) return -1;
    if (!c) return 1;
    for (var e = b.toLowerCase().match(d), f = c.toLowerCase().match(d), g = Math.min(e.length, f.length), h = 0; h < g; h++) {
      d = e[h];
      var l = f[h];
      if (d != l) return b = parseInt(d, 10), !isNaN(b) && (c = parseInt(l, 10), !isNaN(c) && b - c) ? b - c : d < l ? -1 : 1
    }
    return e.length != f.length ? e.length - f.length : b < c ? -1 : 1
  };
  K.f.wr = function(b, c) {
    return K.f.bh(b, c, /\d+|\D+/g)
  };
  K.f.Cj = function(b, c) {
    return K.f.bh(b, c, /\d+|\.\d+|\D+/g)
  };
  K.f.ys = K.f.Cj;
  K.f.Zt = function(b) {
    return encodeURIComponent(String(b))
  };
  K.f.Yt = function(b) {
    return decodeURIComponent(b.replace(/\+/g, " "))
  };
  K.f.ah = function(b, c) {
    return b.replace(/(\r\n|\r|\n)/g, c ? "<br />" : "<br>")
  };
  K.f.ua = function(b, c) {
    if (c) b = b.replace(K.f.ne, "&amp;").replace(K.f.Me, "&lt;").replace(K.f.Je, "&gt;").replace(K.f.Te, "&quot;").replace(K.f.We, "&#39;").replace(K.f.Oe, "&#0;"), K.f.Yc && (b = b.replace(K.f.He, "&#101;"));
    else {
      if (!K.f.Gh.test(b)) return b; - 1 != b.indexOf("&") && (b = b.replace(K.f.ne, "&amp;")); - 1 != b.indexOf("<") && (b = b.replace(K.f.Me, "&lt;")); - 1 != b.indexOf(">") && (b = b.replace(K.f.Je, "&gt;")); - 1 != b.indexOf('"') && (b = b.replace(K.f.Te, "&quot;")); - 1 != b.indexOf("'") && (b = b.replace(K.f.We, "&#39;")); - 1 != b.indexOf("\x00") &&
        (b = b.replace(K.f.Oe, "&#0;"));
      K.f.Yc && -1 != b.indexOf("e") && (b = b.replace(K.f.He, "&#101;"))
    }
    return b
  };
  K.f.ne = /&/g;
  K.f.Me = /</g;
  K.f.Je = />/g;
  K.f.Te = /"/g;
  K.f.We = /'/g;
  K.f.Oe = /\x00/g;
  K.f.He = /e/g;
  K.f.Gh = K.f.Yc ? /[\x00&<>"'e]/ : /[\x00&<>"']/;
  K.f.xh = function(b) {
    return K.f.contains(b, "&") ? !K.f.Zh && "document" in K.global ? K.f.yh(b) : K.f.Il(b) : b
  };
  K.f.Vt = function(b, c) {
    return K.f.contains(b, "&") ? K.f.yh(b, c) : b
  };
  K.f.yh = function(b, c) {
    var d = {
      "&amp;": "&",
      "&lt;": "<",
      "&gt;": ">",
      "&quot;": '"'
    };
    var e = c ? c.createElement("div") : K.global.document.createElement("div");
    return b.replace(K.f.di, function(b, c) {
      var f = d[b];
      if (f) return f;
      "#" == c.charAt(0) && (c = Number("0" + c.substr(1)), isNaN(c) || (f = String.fromCharCode(c)));
      f || (e.innerHTML = b + " ", f = e.firstChild.nodeValue.slice(0, -1));
      return d[b] = f
    })
  };
  K.f.Il = function(b) {
    return b.replace(/&([^;]+);/g, function(b, d) {
      switch (d) {
        case "amp":
          return "&";
        case "lt":
          return "<";
        case "gt":
          return ">";
        case "quot":
          return '"';
        default:
          return "#" != d.charAt(0) || (d = Number("0" + d.substr(1)), isNaN(d)) ? b : String.fromCharCode(d)
      }
    })
  };
  K.f.di = /&([^;\s<&]+);?/g;
  K.f.Rl = function(b) {
    return K.f.ah(b.replace(/  /g, " &#160;"), void 0)
  };
  K.f.Fs = function(b) {
    return b.replace(/(^|[\n ]) /g, "$1" + K.f.af.Ne)
  };
  K.f.Jt = function(b, c) {
    for (var d = c.length, e = 0; e < d; e++) {
      var f = 1 == d ? c : c.charAt(e);
      if (b.charAt(0) == f && b.charAt(b.length - 1) == f) return b.substring(1, b.length - 1)
    }
    return b
  };
  K.f.truncate = function(b, c, d) {
    d && (b = K.f.xh(b));
    b.length > c && (b = b.substring(0, c - 3) + "...");
    d && (b = K.f.ua(b));
    return b
  };
  K.f.Tt = function(b, c, d, e) {
    d && (b = K.f.xh(b));
    e && b.length > c ? (e > c && (e = c), b = b.substring(0, c - e) + "..." + b.substring(b.length - e)) : b.length > c && (e = Math.floor(c / 2), b = b.substring(0, e + c % 2) + "..." + b.substring(b.length - e));
    d && (b = K.f.ua(b));
    return b
  };
  K.f.fe = {
    "\x00": "\\0",
    "\b": "\\b",
    "\f": "\\f",
    "\n": "\\n",
    "\r": "\\r",
    "\t": "\\t",
    "\x0B": "\\x0B",
    '"': '\\"',
    "\\": "\\\\",
    "<": "<"
  };
  K.f.yc = {
    "'": "\\'"
  };
  K.f.quote = function(b) {
    b = String(b);
    for (var c = ['"'], d = 0; d < b.length; d++) {
      var e = b.charAt(d),
        f = e.charCodeAt(0);
      c[d + 1] = K.f.fe[e] || (31 < f && 127 > f ? e : K.f.Af(e))
    }
    c.push('"');
    return c.join("")
  };
  K.f.Fq = function(b) {
    for (var c = [], d = 0; d < b.length; d++) c[d] = K.f.Af(b.charAt(d));
    return c.join("")
  };
  K.f.Af = function(b) {
    if (b in K.f.yc) return K.f.yc[b];
    if (b in K.f.fe) return K.f.yc[b] = K.f.fe[b];
    var c = b.charCodeAt(0);
    if (31 < c && 127 > c) var d = b;
    else {
      if (256 > c) {
        if (d = "\\x", 16 > c || 256 < c) d += "0"
      } else d = "\\u", 4096 > c && (d += "0");
      d += c.toString(16).toUpperCase()
    }
    return K.f.yc[b] = d
  };
  K.f.contains = function(b, c) {
    return -1 != b.indexOf(c)
  };
  K.f.nf = function(b, c) {
    return K.f.contains(b.toLowerCase(), c.toLowerCase())
  };
  K.f.iq = function(b, c) {
    return b && c ? b.split(c).length - 1 : 0
  };
  K.f.Cb = function(b, c, d) {
    var e = b;
    0 <= c && c < b.length && 0 < d && (e = b.substr(0, c) + b.substr(c + d, b.length - c - d));
    return e
  };
  K.f.remove = function(b, c) {
    return b.replace(c, "")
  };
  K.f.Ls = function(b, c) {
    c = new RegExp(K.f.Zd(c), "g");
    return b.replace(c, "")
  };
  K.f.Rs = function(b, c, d) {
    c = new RegExp(K.f.Zd(c), "g");
    return b.replace(c, d.replace(/\$/g, "$$$$"))
  };
  K.f.Zd = function(b) {
    return String(b).replace(/([-()\[\]{}+?*.$\^|,:#<!\\])/g, "\\$1").replace(/\x08/g, "\\x08")
  };
  K.f.repeat = String.prototype.repeat ? function(b, c) {
    return b.repeat(c)
  } : function(b, c) {
    return Array(c + 1).join(b)
  };
  K.f.Ds = function(b, c, d) {
    b = K.P(d) ? b.toFixed(d) : String(b);
    d = b.indexOf("."); - 1 == d && (d = b.length);
    return K.f.repeat("0", Math.max(0, c - d)) + b
  };
  K.f.Mk = function(b) {
    return null == b ? "" : String(b)
  };
  K.f.Pp = function(b) {
    return Array.prototype.join.call(arguments, "")
  };
  K.f.ir = function() {
    return Math.floor(2147483648 * Math.random()).toString(36) + Math.abs(Math.floor(2147483648 * Math.random()) ^ K.now()).toString(36)
  };
  K.f.Jb = function(b, c) {
    var d = 0;
    b = K.f.trim(String(b)).split(".");
    c = K.f.trim(String(c)).split(".");
    for (var e = Math.max(b.length, c.length), f = 0; 0 == d && f < e; f++) {
      var g = b[f] || "",
        h = c[f] || "";
      do {
        g = /(\d*)(\D*)(.*)/.exec(g) || ["", "", "", ""];
        h = /(\d*)(\D*)(.*)/.exec(h) || ["", "", "", ""];
        if (0 == g[0].length && 0 == h[0].length) break;
        d = K.f.fd(0 == g[1].length ? 0 : parseInt(g[1], 10), 0 == h[1].length ? 0 : parseInt(h[1], 10)) || K.f.fd(0 == g[2].length, 0 == h[2].length) || K.f.fd(g[2], h[2]);
        g = g[3];
        h = h[3]
      } while (0 == d)
    }
    return d
  };
  K.f.fd = function(b, c) {
    return b < c ? -1 : b > c ? 1 : 0
  };
  K.f.qr = function(b) {
    for (var c = 0, d = 0; d < b.length; ++d) c = 31 * c + b.charCodeAt(d) >>> 0;
    return c
  };
  K.f.Jl = 2147483648 * Math.random() | 0;
  K.f.rq = function() {
    return "goog_" + K.f.Jl++
  };
  K.f.Nt = function(b) {
    var c = Number(b);
    return 0 == c && K.f.Kd(b) ? NaN : c
  };
  K.f.Lr = function(b) {
    return /^[a-z]+([A-Z][a-z]*)*$/.test(b)
  };
  K.f.$r = function(b) {
    return /^([A-Z][a-z]*)+$/.test(b)
  };
  K.f.Mt = function(b) {
    return String(b).replace(/\-([a-z])/g, function(b, d) {
      return d.toUpperCase()
    })
  };
  K.f.Pt = function(b) {
    return String(b).replace(/([A-Z])/g, "-$1").toLowerCase()
  };
  K.f.Qt = function(b, c) {
    c = K.L(c) ? K.f.Zd(c) : "\\s";
    return b.replace(new RegExp("(^" + (c ? "|[" + c + "]+" : "") + ")([a-z])", "g"), function(b, c, f) {
      return c + f.toUpperCase()
    })
  };
  K.f.Tp = function(b) {
    return String(b.charAt(0)).toUpperCase() + String(b.substr(1)).toLowerCase()
  };
  K.f.parseInt = function(b) {
    isFinite(b) && (b = String(b));
    return K.L(b) ? /^\s*-?0x/i.test(b) ? parseInt(b, 16) : parseInt(b, 10) : NaN
  };
  K.f.Dt = function(b, c, d) {
    b = b.split(c);
    for (var e = []; 0 < d && b.length;) e.push(b.shift()), d--;
    b.length && e.push(b.join(c));
    return e
  };
  K.f.cs = function(b, c) {
    if (c) typeof c == B && (c = [c]);
    else return b;
    for (var d = -1, e = 0; e < c.length; e++)
      if ("" != c[e]) {
        var f = b.lastIndexOf(c[e]);
        f > d && (d = f)
      }
    return -1 == d ? b : b.slice(d + 1)
  };
  K.f.zq = function(b, c) {
    var d = [],
      e = [];
    if (b == c) return 0;
    if (!b.length || !c.length) return Math.max(b.length, c.length);
    for (var f = 0; f < c.length + 1; f++) d[f] = f;
    for (f = 0; f < b.length; f++) {
      e[0] = f + 1;
      for (var g = 0; g < c.length; g++) e[g + 1] = Math.min(e[g] + 1, d[g + 1] + 1, d[g] + Number(b[f] != c[g]));
      for (g = 0; g < d.length; g++) d[g] = e[g]
    }
    return e[c.length]
  };
  K.m = {};
  K.m.oa = K.ea;
  K.m.$b = function(b, c) {
    c.unshift(b);
    K.debug.Error.call(this, K.f.yl.apply(null, c));
    c.shift()
  };
  K.bb(K.m.$b, K.debug.Error);
  K.m.$b.prototype.name = "AssertionError";
  K.m.Uh = function(b) {
    throw b;
  };
  K.m.md = K.m.Uh;
  K.m.Fa = function(b, c, d, e) {
    var f = "Assertion failed";
    if (d) {
      f += ": " + d;
      var g = e
    } else b && (f += ": " + b, g = c);
    b = new K.m.$b("" + f, g || []);
    K.m.md(b)
  };
  K.m.kt = function(b) {
    K.m.oa && (K.m.md = b)
  };
  K.m.assert = function(b, c) {
    K.m.oa && !b && K.m.Fa("", null, c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.ma = function(b) {
    K.m.oa && K.m.md(new K.m.$b("Failure" + (b ? ": " + b : ""), Array.prototype.slice.call(arguments, 1)))
  };
  K.m.Gp = function(b, c) {
    K.m.oa && !K.Tb(b) && K.m.Fa("Expected number but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.Jp = function(b, c) {
    K.m.oa && !K.L(b) && K.m.Fa("Expected string but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.up = function(b, c) {
    K.m.oa && !K.za(b) && K.m.Fa("Expected function but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.Hp = function(b, c) {
    K.m.oa && !K.ia(b) && K.m.Fa("Expected object but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.rp = function(b, c) {
    K.m.oa && !K.isArray(b) && K.m.Fa("Expected array but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.sp = function(b, c) {
    K.m.oa && !K.ek(b) && K.m.Fa("Expected boolean but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.tp = function(b, c) {
    !K.m.oa || K.ia(b) && b.nodeType == K.a.fa.Ia || K.m.Fa("Expected Element but got %s: %s.", [K.aa(b), b], c, Array.prototype.slice.call(arguments, 2));
    return b
  };
  K.m.vp = function(b, c, d) {
    !K.m.oa || b instanceof c || K.m.Fa("Expected instanceof %s but got %s.", [K.m.mg(c), K.m.mg(b)], d, Array.prototype.slice.call(arguments, 3));
    return b
  };
  K.m.Ip = function() {
    for (var b in Object.prototype) K.m.ma(b + " should not be enumerable in Object.prototype.")
  };
  K.m.mg = function(b) {
    return b instanceof Function ? b.displayName || b.name || "unknown type name" : b instanceof Object ? b.constructor.displayName || b.constructor.name || Object.prototype.toString.call(b) : null === b ? "null" : typeof b
  };
  K.f.ap = F();
  K.f.H = function() {
    this.Mc = "";
    this.zi = K.f.H.Ze
  };
  K.f.H.prototype.va = !0;
  K.f.H.prototype.ha = G("Mc");
  K.f.H.prototype.toString = function() {
    return "Const{" + this.Mc + "}"
  };
  K.f.H.u = function(b) {
    if (b instanceof K.f.H && b.constructor === K.f.H && b.zi === K.f.H.Ze) return b.Mc;
    K.m.ma("expected object of type Const, got '" + b + "'");
    return "type_error:Const"
  };
  K.f.H.from = function(b) {
    return K.f.H.lj(b)
  };
  K.f.H.Ze = {};
  K.f.H.lj = function(b) {
    var c = new K.f.H;
    c.Mc = b;
    return c
  };
  K.f.H.EMPTY = K.f.H.from("");
  K.j = {};
  K.Ca = K.bd;
  K.j.Aa = !1;
  K.j.Uk = function(b) {
    return b[b.length - 1]
  };
  K.j.bs = K.j.Uk;
  K.j.indexOf = K.Ca && (K.j.Aa || Array.prototype.indexOf) ? function(b, c, d) {
    return Array.prototype.indexOf.call(b, c, d)
  } : function(b, c, d) {
    d = null == d ? 0 : 0 > d ? Math.max(0, b.length + d) : d;
    if (K.L(b)) return K.L(c) && 1 == c.length ? b.indexOf(c, d) : -1;
    for (; d < b.length; d++)
      if (d in b && b[d] === c) return d;
    return -1
  };
  K.j.lastIndexOf = K.Ca && (K.j.Aa || Array.prototype.lastIndexOf) ? function(b, c, d) {
    return Array.prototype.lastIndexOf.call(b, c, null == d ? b.length - 1 : d)
  } : function(b, c, d) {
    d = null == d ? b.length - 1 : d;
    0 > d && (d = Math.max(0, b.length + d));
    if (K.L(b)) return K.L(c) && 1 == c.length ? b.lastIndexOf(c, d) : -1;
    for (; 0 <= d; d--)
      if (d in b && b[d] === c) return d;
    return -1
  };
  K.j.forEach = K.Ca && (K.j.Aa || Array.prototype.forEach) ? function(b, c, d) {
    Array.prototype.forEach.call(b, c, d)
  } : function(b, c, d) {
    for (var e = b.length, f = K.L(b) ? b.split("") : b, g = 0; g < e; g++) g in f && c.call(d, f[g], g, b)
  };
  K.j.Jf = function(b, c) {
    for (var d = K.L(b) ? b.split("") : b, e = b.length - 1; 0 <= e; --e) e in d && c.call(void 0, d[e], e, b)
  };
  K.j.filter = K.Ca && (K.j.Aa || Array.prototype.filter) ? function(b, c, d) {
    return Array.prototype.filter.call(b, c, d)
  } : function(b, c, d) {
    for (var e = b.length, f = [], g = 0, h = K.L(b) ? b.split("") : b, l = 0; l < e; l++)
      if (l in h) {
        var m = h[l];
        c.call(d, m, l, b) && (f[g++] = m)
      }
    return f
  };
  K.j.map = K.Ca && (K.j.Aa || Array.prototype.map) ? function(b, c, d) {
    return Array.prototype.map.call(b, c, d)
  } : function(b, c, d) {
    for (var e = b.length, f = Array(e), g = K.L(b) ? b.split("") : b, h = 0; h < e; h++) h in g && (f[h] = c.call(d, g[h], h, b));
    return f
  };
  K.j.reduce = K.Ca && (K.j.Aa || Array.prototype.reduce) ? function(b, c, d, e) {
    e && (c = K.bind(c, e));
    return Array.prototype.reduce.call(b, c, d)
  } : function(b, c, d, e) {
    var f = d;
    K.j.forEach(b, function(d, h) {
      f = c.call(e, f, d, h, b)
    });
    return f
  };
  K.j.reduceRight = K.Ca && (K.j.Aa || Array.prototype.reduceRight) ? function(b, c, d, e) {
    e && (c = K.bind(c, e));
    return Array.prototype.reduceRight.call(b, c, d)
  } : function(b, c, d, e) {
    var f = d;
    K.j.Jf(b, function(d, h) {
      f = c.call(e, f, d, h, b)
    });
    return f
  };
  K.j.some = K.Ca && (K.j.Aa || Array.prototype.some) ? function(b, c, d) {
    return Array.prototype.some.call(b, c, d)
  } : function(b, c, d) {
    for (var e = b.length, f = K.L(b) ? b.split("") : b, g = 0; g < e; g++)
      if (g in f && c.call(d, f[g], g, b)) return !0;
    return !1
  };
  K.j.every = K.Ca && (K.j.Aa || Array.prototype.every) ? function(b, c, d) {
    return Array.prototype.every.call(b, c, d)
  } : function(b, c, d) {
    for (var e = b.length, f = K.L(b) ? b.split("") : b, g = 0; g < e; g++)
      if (g in f && !c.call(d, f[g], g, b)) return !1;
    return !0
  };
  K.j.count = function(b, c, d) {
    var e = 0;
    K.j.forEach(b, function(b, g, h) {
      c.call(d, b, g, h) && ++e
    }, d);
    return e
  };
  K.j.find = function(b, c, d) {
    c = K.j.findIndex(b, c, d);
    return 0 > c ? null : K.L(b) ? b.charAt(c) : b[c]
  };
  K.j.findIndex = function(b, c, d) {
    for (var e = b.length, f = K.L(b) ? b.split("") : b, g = 0; g < e; g++)
      if (g in f && c.call(d, f[g], g, b)) return g;
    return -1
  };
  K.j.Iq = function(b, c, d) {
    c = K.j.Aj(b, c, d);
    return 0 > c ? null : K.L(b) ? b.charAt(c) : b[c]
  };
  K.j.Aj = function(b, c, d) {
    for (var e = K.L(b) ? b.split("") : b, f = b.length - 1; 0 <= f; f--)
      if (f in e && c.call(d, e[f], f, b)) return f;
    return -1
  };
  K.j.contains = function(b, c) {
    return 0 <= K.j.indexOf(b, c)
  };
  K.j.Sb = function(b) {
    return 0 == b.length
  };
  K.j.clear = function(b) {
    if (!K.isArray(b))
      for (var c = b.length - 1; 0 <= c; c--) delete b[c];
    b.length = 0
  };
  K.j.tr = function(b, c) {
    K.j.contains(b, c) || b.push(c)
  };
  K.j.vg = function(b, c, d) {
    K.j.splice(b, d, 0, c)
  };
  K.j.vr = function(b, c, d) {
    K.fb(K.j.splice, b, d, 0).apply(null, c)
  };
  K.j.insertBefore = function(b, c, d) {
    var e;
    2 == arguments.length || 0 > (e = K.j.indexOf(b, d)) ? b.push(c) : K.j.vg(b, c, e)
  };
  K.j.remove = function(b, c) {
    c = K.j.indexOf(b, c);
    var d;
    (d = 0 <= c) && K.j.Cb(b, c);
    return d
  };
  K.j.Qs = function(b, c) {
    c = K.j.lastIndexOf(b, c);
    return 0 <= c ? (K.j.Cb(b, c), !0) : !1
  };
  K.j.Cb = function(b, c) {
    return 1 == Array.prototype.splice.call(b, c, 1).length
  };
  K.j.Ps = function(b, c, d) {
    c = K.j.findIndex(b, c, d);
    return 0 <= c ? (K.j.Cb(b, c), !0) : !1
  };
  K.j.Ms = function(b, c, d) {
    var e = 0;
    K.j.Jf(b, function(f, g) {
      c.call(d, f, g, b) && K.j.Cb(b, g) && e++
    });
    return e
  };
  K.j.concat = function(b) {
    return Array.prototype.concat.apply([], arguments)
  };
  K.j.join = function(b) {
    return Array.prototype.concat.apply([], arguments)
  };
  K.j.vh = function(b) {
    var c = b.length;
    if (0 < c) {
      for (var d = Array(c), e = 0; e < c; e++) d[e] = b[e];
      return d
    }
    return []
  };
  K.j.clone = K.j.vh;
  K.j.extend = function(b, c) {
    for (var d = 1; d < arguments.length; d++) {
      var e = arguments[d];
      if (K.Pb(e)) {
        var f = b.length || 0,
          g = e.length || 0;
        b.length = f + g;
        for (var h = 0; h < g; h++) b[f + h] = e[h]
      } else b.push(e)
    }
  };
  K.j.splice = function(b, c, d, e) {
    return Array.prototype.splice.apply(b, K.j.slice(arguments, 1))
  };
  K.j.slice = function(b, c, d) {
    return 2 >= arguments.length ? Array.prototype.slice.call(b, c) : Array.prototype.slice.call(b, c, d)
  };
  K.j.Ns = function(b, c, d) {
    function e(b) {
      return K.ia(b) ? "o" + K.ng(b) : (typeof b).charAt(0) + b
    }
    c = c || b;
    d = d || e;
    for (var f = {}, g = 0, h = 0; h < b.length;) {
      var l = b[h++],
        m = d(l);
      Object.prototype.hasOwnProperty.call(f, m) || (f[m] = !0, c[g++] = l)
    }
    c.length = g
  };
  K.j.kf = function(b, c, d) {
    return K.j.lf(b, d || K.j.Pa, !1, c)
  };
  K.j.Mp = function(b, c, d) {
    return K.j.lf(b, c, !0, void 0, d)
  };
  K.j.lf = function(b, c, d, e, f) {
    for (var g = 0, h = b.length, l; g < h;) {
      var m = g + h >> 1;
      var q = d ? c.call(f, b[m], m, b) : c(e, b[m]);
      0 < q ? g = m + 1 : (h = m, l = !q)
    }
    return l ? g : ~g
  };
  K.j.sort = function(b, c) {
    b.sort(c || K.j.Pa)
  };
  K.j.Ft = function(b, c) {
    for (var d = Array(b.length), e = 0; e < b.length; e++) d[e] = {
      index: e,
      value: b[e]
    };
    var f = c || K.j.Pa;
    K.j.sort(d, function(b, c) {
      return f(b.value, c.value) || b.index - c.index
    });
    for (e = 0; e < b.length; e++) b[e] = d[e].value
  };
  K.j.ul = function(b, c, d) {
    var e = d || K.j.Pa;
    K.j.sort(b, function(b, d) {
      return e(c(b), c(d))
    })
  };
  K.j.Ct = function(b, c, d) {
    K.j.ul(b, function(b) {
      return b[c]
    }, d)
  };
  K.j.Xr = function(b, c, d) {
    c = c || K.j.Pa;
    for (var e = 1; e < b.length; e++) {
      var f = c(b[e - 1], b[e]);
      if (0 < f || 0 == f && d) return !1
    }
    return !0
  };
  K.j.Kb = function(b, c, d) {
    if (!K.Pb(b) || !K.Pb(c) || b.length != c.length) return !1;
    var e = b.length;
    d = d || K.j.nj;
    for (var f = 0; f < e; f++)
      if (!d(b[f], c[f])) return !1;
    return !0
  };
  K.j.bq = function(b, c, d) {
    d = d || K.j.Pa;
    for (var e = Math.min(b.length, c.length), f = 0; f < e; f++) {
      var g = d(b[f], c[f]);
      if (0 != g) return g
    }
    return K.j.Pa(b.length, c.length)
  };
  K.j.Pa = function(b, c) {
    return b > c ? 1 : b < c ? -1 : 0
  };
  K.j.xr = function(b, c) {
    return -K.j.Pa(b, c)
  };
  K.j.nj = function(b, c) {
    return b === c
  };
  K.j.Kp = function(b, c, d) {
    d = K.j.kf(b, c, d);
    return 0 > d ? (K.j.vg(b, c, -(d + 1)), !0) : !1
  };
  K.j.Lp = function(b, c, d) {
    c = K.j.kf(b, c, d);
    return 0 <= c ? K.j.Cb(b, c) : !1
  };
  K.j.Op = function(b, c, d) {
    for (var e = {}, f = 0; f < b.length; f++) {
      var g = b[f],
        h = c.call(d, g, f, b);
      K.P(h) && (e[h] || (e[h] = [])).push(g)
    }
    return e
  };
  K.j.Ot = function(b, c, d) {
    var e = {};
    K.j.forEach(b, function(f, g) {
      e[c.call(d, f, g, b)] = f
    });
    return e
  };
  K.j.Is = function(b, c, d) {
    var e = [],
      f = 0,
      g = b;
    d = d || 1;
    void 0 !== c && (f = b, g = c);
    if (0 > d * (g - f)) return [];
    if (0 < d)
      for (b = f; b < g; b += d) e.push(b);
    else
      for (b = f; b > g; b += d) e.push(b);
    return e
  };
  K.j.repeat = function(b, c) {
    for (var d = [], e = 0; e < c; e++) d[e] = b;
    return d
  };
  K.j.flatten = function(b) {
    for (var c = [], d = 0; d < arguments.length; d++) {
      var e = arguments[d];
      if (K.isArray(e))
        for (var f = 0; f < e.length; f += 8192)
          for (var g = K.j.flatten.apply(null, K.j.slice(e, f, f + 8192)), h = 0; h < g.length; h++) c.push(g[h]);
      else c.push(e)
    }
    return c
  };
  K.j.rotate = function(b, c) {
    b.length && (c %= b.length, 0 < c ? Array.prototype.unshift.apply(b, b.splice(-c, c)) : 0 > c && Array.prototype.push.apply(b, b.splice(0, -c)));
    return b
  };
  K.j.qs = function(b, c, d) {
    c = Array.prototype.splice.call(b, c, 1);
    Array.prototype.splice.call(b, d, 0, c[0])
  };
  K.j.fu = function(b) {
    if (!arguments.length) return [];
    for (var c = [], d = arguments[0].length, e = 1; e < arguments.length; e++) arguments[e].length < d && (d = arguments[e].length);
    for (e = 0; e < d; e++) {
      for (var f = [], g = 0; g < arguments.length; g++) f.push(arguments[g][e]);
      c.push(f)
    }
    return c
  };
  K.j.Bt = function(b, c) {
    c = c || Math.random;
    for (var d = b.length - 1; 0 < d; d--) {
      var e = Math.floor(c() * (d + 1)),
        f = b[d];
      b[d] = b[e];
      b[e] = f
    }
  };
  K.j.hq = function(b, c) {
    var d = [];
    K.j.forEach(c, function(c) {
      d.push(b[c])
    });
    return d
  };
  K.j.eq = function(b, c, d) {
    return K.j.concat.apply([], K.j.map(b, c, d))
  };
  K.h = {};
  K.h.i = {};
  K.h.i.ai = !1;
  K.h.i.Le = K.h.i.ai || ("ar" == K.ba.substring(0, 2).toLowerCase() || "fa" == K.ba.substring(0, 2).toLowerCase() || "he" == K.ba.substring(0, 2).toLowerCase() || "iw" == K.ba.substring(0, 2).toLowerCase() || "ps" == K.ba.substring(0, 2).toLowerCase() || "sd" == K.ba.substring(0, 2).toLowerCase() || "ug" == K.ba.substring(0, 2).toLowerCase() || "ur" == K.ba.substring(0, 2).toLowerCase() || "yi" == K.ba.substring(0, 2).toLowerCase()) && (2 == K.ba.length || "-" == K.ba.substring(2, 3) || "_" == K.ba.substring(2, 3)) || 3 <= K.ba.length && "ckb" == K.ba.substring(0, 3).toLowerCase() &&
    (3 == K.ba.length || "-" == K.ba.substring(3, 4) || "_" == K.ba.substring(3, 4));
  K.h.i.mb = {
    ii: "\u202a",
    li: "\u202b",
    Re: "\u202c",
    ji: "\u200e",
    mi: "\u200f"
  };
  K.h.i.O = {
    Ua: 1,
    Va: -1,
    sa: 0
  };
  K.h.i.ec = "right";
  K.h.i.cc = "left";
  K.h.i.Bn = K.h.i.Le ? K.h.i.cc : K.h.i.ec;
  K.h.i.An = K.h.i.Le ? K.h.i.ec : K.h.i.cc;
  K.h.i.Dl = function(b) {
    return typeof b == x ? 0 < b ? K.h.i.O.Ua : 0 > b ? K.h.i.O.Va : K.h.i.O.sa : null == b ? null : b ? K.h.i.O.Va : K.h.i.O.Ua
  };
  K.h.i.zb = "A-Za-z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u02b8\u0300-\u0590\u0800-\u1fff\u200e\u2c00-\ufb1c\ufe00-\ufe6f\ufefd-\uffff";
  K.h.i.Eb = "\u0591-\u06ef\u06fa-\u07ff\u200f\ufb1d-\ufdff\ufe70-\ufefc";
  K.h.i.$j = /<[^>]*>|&[^;]+;/g;
  K.h.i.Ta = function(b, c) {
    return c ? b.replace(K.h.i.$j, "") : b
  };
  K.h.i.cl = new RegExp("[" + K.h.i.Eb + "]");
  K.h.i.Ik = new RegExp("[" + K.h.i.zb + "]");
  K.h.i.Dd = function(b, c) {
    return K.h.i.cl.test(K.h.i.Ta(b, c))
  };
  K.h.i.or = K.h.i.Dd;
  K.h.i.rg = function(b) {
    return K.h.i.Ik.test(K.h.i.Ta(b, void 0))
  };
  K.h.i.Lk = new RegExp("^[" + K.h.i.zb + "]");
  K.h.i.hl = new RegExp("^[" + K.h.i.Eb + "]");
  K.h.i.qk = function(b) {
    return K.h.i.hl.test(b)
  };
  K.h.i.lk = function(b) {
    return K.h.i.Lk.test(b)
  };
  K.h.i.Pr = function(b) {
    return !K.h.i.lk(b) && !K.h.i.qk(b)
  };
  K.h.i.Jk = new RegExp("^[^" + K.h.i.Eb + "]*[" + K.h.i.zb + "]");
  K.h.i.el = new RegExp("^[^" + K.h.i.zb + "]*[" + K.h.i.Eb + "]");
  K.h.i.qh = function(b, c) {
    return K.h.i.el.test(K.h.i.Ta(b, c))
  };
  K.h.i.Vr = K.h.i.qh;
  K.h.i.vl = function(b, c) {
    return K.h.i.Jk.test(K.h.i.Ta(b, c))
  };
  K.h.i.Nr = K.h.i.vl;
  K.h.i.Mg = /^http:\/\/.*/;
  K.h.i.Qr = function(b, c) {
    b = K.h.i.Ta(b, c);
    return K.h.i.Mg.test(b) || !K.h.i.rg(b) && !K.h.i.Dd(b)
  };
  K.h.i.Kk = new RegExp("[" + K.h.i.zb + "][^" + K.h.i.Eb + "]*$");
  K.h.i.fl = new RegExp("[" + K.h.i.Eb + "][^" + K.h.i.zb + "]*$");
  K.h.i.tj = function(b, c) {
    return K.h.i.Kk.test(K.h.i.Ta(b, c))
  };
  K.h.i.Mr = K.h.i.tj;
  K.h.i.uj = function(b, c) {
    return K.h.i.fl.test(K.h.i.Ta(b, c))
  };
  K.h.i.Tr = K.h.i.uj;
  K.h.i.gl = /^(ar|ckb|dv|he|iw|fa|nqo|ps|sd|ug|ur|yi|.*[-_](Arab|Hebr|Thaa|Nkoo|Tfng))(?!.*[-_](Latn|Cyrl)($|-|_))($|-|_)/i;
  K.h.i.Ur = function(b) {
    return K.h.i.gl.test(b)
  };
  K.h.i.Wi = /(\(.*?\)+)|(\[.*?\]+)|(\{.*?\}+)|(<.*?>+)/g;
  K.h.i.nr = function(b, c) {
    c = (void 0 === c ? K.h.i.Dd(b) : c) ? K.h.i.mb.mi : K.h.i.mb.ji;
    return b.replace(K.h.i.Wi, c + "$&" + c)
  };
  K.h.i.Cq = function(b) {
    return "<" == b.charAt(0) ? b.replace(/<\w+/, "$& dir=rtl") : "\n<span dir=rtl>" + b + "</span>"
  };
  K.h.i.Dq = function(b) {
    return K.h.i.mb.li + b + K.h.i.mb.Re
  };
  K.h.i.Aq = function(b) {
    return "<" == b.charAt(0) ? b.replace(/<\w+/, "$& dir=ltr") : "\n<span dir=ltr>" + b + "</span>"
  };
  K.h.i.Bq = function(b) {
    return K.h.i.mb.ii + b + K.h.i.mb.Re
  };
  K.h.i.rj = /:\s*([.\d][.\w]*)\s+([.\d][.\w]*)\s+([.\d][.\w]*)\s+([.\d][.\w]*)/g;
  K.h.i.xk = /left/gi;
  K.h.i.bl = /right/gi;
  K.h.i.Bl = /%%%%/g;
  K.h.i.ns = function(b) {
    return b.replace(K.h.i.rj, ":$1 $4 $3 $2").replace(K.h.i.xk, "%%%%").replace(K.h.i.bl, K.h.i.cc).replace(K.h.i.Bl, K.h.i.ec)
  };
  K.h.i.sj = /([\u0591-\u05f2])"/g;
  K.h.i.tl = /([\u0591-\u05f2])'/g;
  K.h.i.ss = function(b) {
    return b.replace(K.h.i.sj, "$1\u05f4").replace(K.h.i.tl, "$1\u05f3")
  };
  K.h.i.Sl = /\s+/;
  K.h.i.Zj = /[\d\u06f0-\u06f9]/;
  K.h.i.dl = .4;
  K.h.i.Bf = function(b, c) {
    var d = 0,
      e = 0,
      f = !1;
    b = K.h.i.Ta(b, c).split(K.h.i.Sl);
    for (c = 0; c < b.length; c++) {
      var g = b[c];
      K.h.i.qh(g) ? (d++, e++) : K.h.i.Mg.test(g) ? f = !0 : K.h.i.rg(g) ? e++ : K.h.i.Zj.test(g) && (f = !0)
    }
    return 0 == e ? f ? K.h.i.O.Ua : K.h.i.O.sa : d / e > K.h.i.dl ? K.h.i.O.Va : K.h.i.O.Ua
  };
  K.h.i.vq = function(b, c) {
    return K.h.i.Bf(b, c) == K.h.i.O.Va
  };
  K.h.i.ht = function(b, c) {
    b && (c = K.h.i.Dl(c)) && (b.style.textAlign = c == K.h.i.O.Va ? K.h.i.ec : K.h.i.cc, b.dir = c == K.h.i.O.Va ? "rtl" : "ltr")
  };
  K.h.i.it = function(b, c) {
    switch (K.h.i.Bf(c)) {
      case K.h.i.O.Ua:
        b.dir = "ltr";
        break;
      case K.h.i.O.Va:
        b.dir = "rtl";
        break;
      default:
        b.removeAttribute("dir")
    }
  };
  K.h.i.Wm = F();
  K.b = {};
  K.b.C = function() {
    this.Ec = "";
    this.Ci = K.b.C.ca
  };
  K.b.C.prototype.va = !0;
  K.b.C.prototype.ha = G("Ec");
  K.b.C.prototype.Fd = !0;
  K.b.C.prototype.ab = function() {
    return K.h.i.O.Ua
  };
  K.ea && (K.b.C.prototype.toString = function() {
    return "TrustedResourceUrl{" + this.Ec + "}"
  });
  K.b.C.u = function(b) {
    if (b instanceof K.b.C && b.constructor === K.b.C && b.Ci === K.b.C.ca) return b.Ec;
    K.m.ma("expected object of type TrustedResourceUrl, got '" + b + k + K.aa(b));
    return "type_error:TrustedResourceUrl"
  };
  K.b.C.format = function(b, c) {
    b = K.b.C.Kf(b, c);
    return K.b.C.sb(b)
  };
  K.b.C.Kf = function(b, c) {
    var d = K.f.H.u(b);
    if (!K.b.C.Kh.test(d)) throw Error("Invalid TrustedResourceUrl format: " + d);
    return d.replace(K.b.C.bi, function(b, f) {
      if (!Object.prototype.hasOwnProperty.call(c, f)) throw Error('Found marker, "' + f + '", in format string, "' + d + '", but no valid label mapping found in args: ' + JSON.stringify(c));
      b = c[f];
      return b instanceof K.f.H ? K.f.H.u(b) : encodeURIComponent(String(b))
    })
  };
  K.b.C.bi = /%{(\w+)}/g;
  K.b.C.Kh = /^(?:https:)?\/\/[0-9a-z.:[\]-]+\/|^\/[^\/\\]|^about:blank(#|$)/i;
  K.b.C.Mq = function(b, c, d) {
    b = K.b.C.Kf(b, c);
    c = /\?/.test(b) ? "&" : "?";
    for (var e in d) null != d[e] && (b += c + encodeURIComponent(e) + "=" + encodeURIComponent(String(d[e])), c = "&");
    return K.b.C.sb(b)
  };
  K.b.C.pc = function(b) {
    return K.b.C.sb(K.f.H.u(b))
  };
  K.b.C.Pq = function(b) {
    for (var c = "", d = 0; d < b.length; d++) c += K.f.H.u(b[d]);
    return K.b.C.sb(c)
  };
  K.b.C.ca = {};
  K.b.C.sb = function(b) {
    var c = new K.b.C;
    c.Ec = b;
    return c
  };
  K.async = {};
  K.async.bc = function(b, c, d) {
    this.yk = d;
    this.kj = b;
    this.Yk = c;
    this.Ac = 0;
    this.wc = null
  };
  K.async.bc.prototype.get = function() {
    if (0 < this.Ac) {
      this.Ac--;
      var b = this.wc;
      this.wc = b.next;
      b.next = null
    } else b = this.kj();
    return b
  };
  K.async.bc.prototype.put = function(b) {
    this.Yk(b);
    this.Ac < this.yk && (this.Ac++, b.next = this.wc, this.wc = b)
  };
  K.debug.Z = {};
  K.debug.cn = F();
  K.debug.Z.Bb = [];
  K.debug.Z.Xd = [];
  K.debug.Z.Zg = !1;
  K.debug.Z.register = function(b) {
    K.debug.Z.Bb[K.debug.Z.Bb.length] = b;
    if (K.debug.Z.Zg)
      for (var c = K.debug.Z.Xd, d = 0; d < c.length; d++) b(K.bind(c[d].Ul, c[d]))
  };
  K.debug.Z.ps = function(b) {
    K.debug.Z.Zg = !0;
    for (var c = K.bind(b.Ul, b), d = 0; d < K.debug.Z.Bb.length; d++) K.debug.Z.Bb[d](c);
    K.debug.Z.Xd.push(b)
  };
  K.debug.Z.Xt = function(b) {
    var c = K.debug.Z.Xd;
    b = K.bind(b.u, b);
    for (var d = 0; d < K.debug.Z.Bb.length; d++) K.debug.Z.Bb[d](b);
    c.length--
  };
  K.a.yn = F();
  K.a.c = function(b) {
    this.Al = b
  };
  K.a.c.prototype.toString = G("Al");
  K.a.c.Xl = new K.a.c("A");
  K.a.c.Yl = new K.a.c("ABBR");
  K.a.c.$l = new K.a.c("ACRONYM");
  K.a.c.am = new K.a.c("ADDRESS");
  K.a.c.em = new K.a.c("APPLET");
  K.a.c.fm = new K.a.c("AREA");
  K.a.c.gm = new K.a.c("ARTICLE");
  K.a.c.hm = new K.a.c("ASIDE");
  K.a.c.lm = new K.a.c("AUDIO");
  K.a.c.mm = new K.a.c("B");
  K.a.c.nm = new K.a.c("BASE");
  K.a.c.om = new K.a.c("BASEFONT");
  K.a.c.pm = new K.a.c("BDI");
  K.a.c.qm = new K.a.c("BDO");
  K.a.c.tm = new K.a.c("BIG");
  K.a.c.um = new K.a.c("BLOCKQUOTE");
  K.a.c.vm = new K.a.c("BODY");
  K.a.c.ze = new K.a.c("BR");
  K.a.c.wm = new K.a.c("BUTTON");
  K.a.c.xm = new K.a.c("CANVAS");
  K.a.c.ym = new K.a.c("CAPTION");
  K.a.c.Am = new K.a.c("CENTER");
  K.a.c.Bm = new K.a.c("CITE");
  K.a.c.Em = new K.a.c("CODE");
  K.a.c.Fm = new K.a.c("COL");
  K.a.c.Gm = new K.a.c("COLGROUP");
  K.a.c.Hm = new K.a.c("COMMAND");
  K.a.c.Jm = new K.a.c("DATA");
  K.a.c.Km = new K.a.c("DATALIST");
  K.a.c.Lm = new K.a.c("DD");
  K.a.c.Mm = new K.a.c("DEL");
  K.a.c.Nm = new K.a.c("DETAILS");
  K.a.c.Om = new K.a.c("DFN");
  K.a.c.Pm = new K.a.c("DIALOG");
  K.a.c.Qm = new K.a.c("DIR");
  K.a.c.Rm = new K.a.c("DIV");
  K.a.c.Sm = new K.a.c("DL");
  K.a.c.Vm = new K.a.c("DT");
  K.a.c.Ym = new K.a.c("EM");
  K.a.c.Zm = new K.a.c("EMBED");
  K.a.c.en = new K.a.c("FIELDSET");
  K.a.c.fn = new K.a.c("FIGCAPTION");
  K.a.c.gn = new K.a.c("FIGURE");
  K.a.c.hn = new K.a.c("FONT");
  K.a.c.jn = new K.a.c("FOOTER");
  K.a.c.kn = new K.a.c("FORM");
  K.a.c.ln = new K.a.c("FRAME");
  K.a.c.mn = new K.a.c("FRAMESET");
  K.a.c.nn = new K.a.c("H1");
  K.a.c.on = new K.a.c("H2");
  K.a.c.pn = new K.a.c("H3");
  K.a.c.qn = new K.a.c("H4");
  K.a.c.rn = new K.a.c("H5");
  K.a.c.sn = new K.a.c("H6");
  K.a.c.tn = new K.a.c("HEAD");
  K.a.c.un = new K.a.c("HEADER");
  K.a.c.vn = new K.a.c("HGROUP");
  K.a.c.wn = new K.a.c("HR");
  K.a.c.xn = new K.a.c("HTML");
  K.a.c.zn = new K.a.c("I");
  K.a.c.Cn = new K.a.c("IFRAME");
  K.a.c.Dn = new K.a.c("IMG");
  K.a.c.En = new K.a.c("INPUT");
  K.a.c.Fn = new K.a.c("INS");
  K.a.c.Kn = new K.a.c("ISINDEX");
  K.a.c.Mn = new K.a.c("KBD");
  K.a.c.Nn = new K.a.c("KEYGEN");
  K.a.c.On = new K.a.c("LABEL");
  K.a.c.Qn = new K.a.c("LEGEND");
  K.a.c.Rn = new K.a.c("LI");
  K.a.c.Sn = new K.a.c("LINK");
  K.a.c.Vn = new K.a.c("MAP");
  K.a.c.Wn = new K.a.c("MARK");
  K.a.c.Xn = new K.a.c("MATH");
  K.a.c.Yn = new K.a.c("MENU");
  K.a.c.Zn = new K.a.c("META");
  K.a.c.$n = new K.a.c("METER");
  K.a.c.bo = new K.a.c("NAV");
  K.a.c.co = new K.a.c("NOFRAMES");
  K.a.c.eo = new K.a.c("NOSCRIPT");
  K.a.c.io = new K.a.c("OBJECT");
  K.a.c.jo = new K.a.c("OL");
  K.a.c.ko = new K.a.c("OPTGROUP");
  K.a.c.lo = new K.a.c("OPTION");
  K.a.c.mo = new K.a.c("OUTPUT");
  K.a.c.no = new K.a.c("P");
  K.a.c.oo = new K.a.c("PARAM");
  K.a.c.qo = new K.a.c("PRE");
  K.a.c.so = new K.a.c("PROGRESS");
  K.a.c.Q = new K.a.c("Q");
  K.a.c.to = new K.a.c("RP");
  K.a.c.uo = new K.a.c("RT");
  K.a.c.vo = new K.a.c("RUBY");
  K.a.c.xo = new K.a.c("S");
  K.a.c.zo = new K.a.c("SAMP");
  K.a.c.Ao = new K.a.c(p);
  K.a.c.Bo = new K.a.c("SECTION");
  K.a.c.Co = new K.a.c("SELECT");
  K.a.c.Do = new K.a.c("SMALL");
  K.a.c.Eo = new K.a.c("SOURCE");
  K.a.c.Fo = new K.a.c("SPAN");
  K.a.c.Go = new K.a.c("STRIKE");
  K.a.c.Ho = new K.a.c("STRONG");
  K.a.c.Io = new K.a.c("STYLE");
  K.a.c.Jo = new K.a.c("SUB");
  K.a.c.Ko = new K.a.c("SUMMARY");
  K.a.c.Lo = new K.a.c("SUP");
  K.a.c.Mo = new K.a.c("SVG");
  K.a.c.No = new K.a.c("TABLE");
  K.a.c.Oo = new K.a.c("TBODY");
  K.a.c.Po = new K.a.c("TD");
  K.a.c.Qo = new K.a.c("TEMPLATE");
  K.a.c.Ro = new K.a.c("TEXTAREA");
  K.a.c.So = new K.a.c("TFOOT");
  K.a.c.To = new K.a.c("TH");
  K.a.c.Uo = new K.a.c("THEAD");
  K.a.c.Vo = new K.a.c("TIME");
  K.a.c.Wo = new K.a.c("TITLE");
  K.a.c.Xo = new K.a.c("TR");
  K.a.c.Yo = new K.a.c("TRACK");
  K.a.c.$o = new K.a.c("TT");
  K.a.c.bp = new K.a.c("U");
  K.a.c.cp = new K.a.c("UL");
  K.a.c.ep = new K.a.c("VAR");
  K.a.c.fp = new K.a.c("VIDEO");
  K.a.c.gp = new K.a.c("WBR");
  K.I = {};
  K.I.lc = function(b) {
    return function() {
      return b
    }
  };
  K.I.dn = K.I.lc(!1);
  K.I.Zo = K.I.lc(!0);
  K.I.ho = K.I.lc(null);
  K.I.bk = E();
  K.I.error = function(b) {
    return function() {
      throw Error(b);
    }
  };
  K.I.ma = function(b) {
    return function() {
      throw b;
    }
  };
  K.I.lock = function(b, c) {
    c = c || 0;
    return function() {
      return b.apply(this, Array.prototype.slice.call(arguments, 0, c))
    }
  };
  K.I.xs = function(b) {
    return function() {
      return arguments[b]
    }
  };
  K.I.Es = function(b, c) {
    var d = Array.prototype.slice.call(arguments, 1);
    return function() {
      var c = Array.prototype.slice.call(arguments);
      c.push.apply(c, d);
      return b.apply(this, c)
    }
  };
  K.I.cu = function(b, c) {
    return K.I.nl(b, K.I.lc(c))
  };
  K.I.Eq = function(b, c) {
    return function(d) {
      return c ? b == d : b === d
    }
  };
  K.I.cq = function(b, c) {
    var d = arguments,
      e = d.length;
    return function() {
      var b;
      e && (b = d[e - 1].apply(this, arguments));
      for (var c = e - 2; 0 <= c; c--) b = d[c].call(this, b);
      return b
    }
  };
  K.I.nl = function(b) {
    var c = arguments,
      d = c.length;
    return function() {
      for (var b, f = 0; f < d; f++) b = c[f].apply(this, arguments);
      return b
    }
  };
  K.I.np = function(b) {
    var c = arguments,
      d = c.length;
    return function() {
      for (var b = 0; b < d; b++)
        if (!c[b].apply(this, arguments)) return !1;
      return !0
    }
  };
  K.I.Cs = function(b) {
    var c = arguments,
      d = c.length;
    return function() {
      for (var b = 0; b < d; b++)
        if (c[b].apply(this, arguments)) return !0;
      return !1
    }
  };
  K.I.ws = function(b) {
    return function() {
      return !b.apply(this, arguments)
    }
  };
  K.I.create = function(b, c) {
    function d() {}
    d.prototype = b.prototype;
    var e = new d;
    b.apply(e, Array.prototype.slice.call(arguments, 1));
    return e
  };
  K.I.Mh = !0;
  K.I.Qp = function(b) {
    var c = !1,
      d;
    return function() {
      if (!K.I.Mh) return b();
      c || (d = b(), c = !0);
      return d
    }
  };
  K.I.once = function(b) {
    var c = b;
    return function() {
      if (c) {
        var b = c;
        c = null;
        b()
      }
    }
  };
  K.I.tq = function(b, c, d) {
    var e = 0;
    return function(f) {
      K.global.clearTimeout(e);
      var g = arguments;
      e = K.global.setTimeout(function() {
        b.apply(d, g)
      }, c)
    }
  };
  K.I.Lt = function(b, c, d) {
    function e() {
      g = K.global.setTimeout(f, c);
      b.apply(d, l)
    }

    function f() {
      g = 0;
      h && (h = !1, e())
    }
    var g = 0,
      h = !1,
      l = [];
    return function(b) {
      l = arguments;
      g ? h = !0 : e()
    }
  };
  K.I.Js = function(b, c, d) {
    function e() {
      f = 0
    }
    var f = 0;
    return function() {
      f || (f = K.global.setTimeout(e, c), b.apply(d, arguments))
    }
  };
  K.g = {};
  K.g.userAgent = {};
  K.g.userAgent.A = {};
  K.g.userAgent.A.$f = function() {
    var b = K.g.userAgent.A.Mj();
    return b && (b = b.userAgent) ? b : ""
  };
  K.g.userAgent.A.Mj = function() {
    return K.global.navigator
  };
  K.g.userAgent.A.zh = K.g.userAgent.A.$f();
  K.g.userAgent.A.zt = function(b) {
    K.g.userAgent.A.zh = b || K.g.userAgent.A.$f()
  };
  K.g.userAgent.A.wb = function() {
    return K.g.userAgent.A.zh
  };
  K.g.userAgent.A.J = function(b) {
    return K.f.contains(K.g.userAgent.A.wb(), b)
  };
  K.g.userAgent.A.Sk = function() {
    return K.f.nf(K.g.userAgent.A.wb(), "WebKit")
  };
  K.g.userAgent.A.Df = function(b) {
    for (var c = /(\w[\w ]+)\/([^\s]+)\s*(?:\((.*?)\))?/g, d = [], e; e = c.exec(b);) d.push([e[1], e[2], e[3] || void 0]);
    return d
  };
  K.object = {};
  K.object.is = function(b, c) {
    return b === c ? 0 !== b || 1 / b === 1 / c : b !== b && c !== c
  };
  K.object.forEach = function(b, c, d) {
    for (var e in b) c.call(d, b[e], e, b)
  };
  K.object.filter = function(b, c, d) {
    var e = {},
      f;
    for (f in b) c.call(d, b[f], f, b) && (e[f] = b[f]);
    return e
  };
  K.object.map = function(b, c, d) {
    var e = {},
      f;
    for (f in b) e[f] = c.call(d, b[f], f, b);
    return e
  };
  K.object.some = function(b, c, d) {
    for (var e in b)
      if (c.call(d, b[e], e, b)) return !0;
    return !1
  };
  K.object.every = function(b, c, d) {
    for (var e in b)
      if (!c.call(d, b[e], e, b)) return !1;
    return !0
  };
  K.object.Xq = function(b) {
    var c = 0,
      d;
    for (d in b) c++;
    return c
  };
  K.object.Vq = function(b) {
    for (var c in b) return c
  };
  K.object.Wq = function(b) {
    for (var c in b) return b[c]
  };
  K.object.contains = function(b, c) {
    return K.object.ej(b, c)
  };
  K.object.lr = function(b) {
    var c = [],
      d = 0,
      e;
    for (e in b) c[d++] = b[e];
    return c
  };
  K.object.Yf = function(b) {
    var c = [],
      d = 0,
      e;
    for (e in b) c[d++] = e;
    return c
  };
  K.object.kr = function(b, c) {
    var d = K.Pb(c),
      e = d ? c : arguments;
    for (d = d ? 0 : 1; d < e.length && (b = b[e[d]], K.P(b)); d++);
    return b
  };
  K.object.dj = function(b, c) {
    return null !== b && c in b
  };
  K.object.ej = function(b, c) {
    for (var d in b)
      if (b[d] == c) return !0;
    return !1
  };
  K.object.Bj = function(b, c, d) {
    for (var e in b)
      if (c.call(d, b[e], e, b)) return e
  };
  K.object.Jq = function(b, c, d) {
    return (c = K.object.Bj(b, c, d)) && b[c]
  };
  K.object.Sb = function(b) {
    for (var c in b) return !1;
    return !0
  };
  K.object.clear = function(b) {
    for (var c in b) delete b[c]
  };
  K.object.remove = function(b, c) {
    var d;
    (d = c in b) && delete b[c];
    return d
  };
  K.object.add = function(b, c, d) {
    if (null !== b && c in b) throw Error('The object already contains the key "' + c + '"');
    K.object.set(b, c, d)
  };
  K.object.get = function(b, c, d) {
    return null !== b && c in b ? b[c] : d
  };
  K.object.set = function(b, c, d) {
    b[c] = d
  };
  K.object.mt = function(b, c, d) {
    return c in b ? b[c] : b[c] = d
  };
  K.object.At = function(b, c, d) {
    if (c in b) return b[c];
    d = d();
    return b[c] = d
  };
  K.object.Kb = function(b, c) {
    for (var d in b)
      if (!(d in c) || b[d] !== c[d]) return !1;
    for (d in c)
      if (!(d in b)) return !1;
    return !0
  };
  K.object.clone = function(b) {
    var c = {},
      d;
    for (d in b) c[d] = b[d];
    return c
  };
  K.object.Kl = function(b) {
    var c = K.aa(b);
    if (c == y || c == r) {
      if (K.za(b.clone)) return b.clone();
      c = c == r ? [] : {};
      for (var d in b) c[d] = K.object.Kl(b[d]);
      return c
    }
    return b
  };
  K.object.St = function(b) {
    var c = {},
      d;
    for (d in b) c[b[d]] = d;
    return c
  };
  K.object.Se = ["constructor", w, "isPrototypeOf", A, D, "toString", "valueOf"];
  K.object.extend = function(b, c) {
    for (var d, e, f = 1; f < arguments.length; f++) {
      e = arguments[f];
      for (d in e) b[d] = e[d];
      for (var g = 0; g < K.object.Se.length; g++) d = K.object.Se[g], Object.prototype.hasOwnProperty.call(e, d) && (b[d] = e[d])
    }
  };
  K.object.create = function(b) {
    var c = arguments.length;
    if (1 == c && K.isArray(arguments[0])) return K.object.create.apply(null, arguments[0]);
    if (c % 2) throw Error("Uneven number of arguments");
    for (var d = {}, e = 0; e < c; e += 2) d[arguments[e]] = arguments[e + 1];
    return d
  };
  K.object.ij = function(b) {
    var c = arguments.length;
    if (1 == c && K.isArray(arguments[0])) return K.object.ij.apply(null, arguments[0]);
    for (var d = {}, e = 0; e < c; e++) d[arguments[e]] = !0;
    return d
  };
  K.object.kq = function(b) {
    var c = b;
    Object.isFrozen && !Object.isFrozen(b) && (c = Object.create(b), Object.freeze(c));
    return c
  };
  K.object.Ir = function(b) {
    return !!Object.isFrozen && Object.isFrozen(b)
  };
  K.object.Uq = function(b, c, d) {
    if (!b) return [];
    if (!Object.getOwnPropertyNames || !Object.getPrototypeOf) return K.object.Yf(b);
    for (var e = {}; b && (b !== Object.prototype || c) && (b !== Function.prototype || d);) {
      for (var f = Object.getOwnPropertyNames(b), g = 0; g < f.length; g++) e[f[g]] = !0;
      b = Object.getPrototypeOf(b)
    }
    return K.object.Yf(e)
  };
  K.g.userAgent.v = {};
  K.g.userAgent.v.Ug = function() {
    return K.g.userAgent.A.J("Opera")
  };
  K.g.userAgent.v.Qk = function() {
    return K.g.userAgent.A.J("Trident") || K.g.userAgent.A.J("MSIE")
  };
  K.g.userAgent.v.Ud = function() {
    return K.g.userAgent.A.J("Edge")
  };
  K.g.userAgent.v.Pk = function() {
    return K.g.userAgent.A.J("Firefox")
  };
  K.g.userAgent.v.Vg = function() {
    return K.g.userAgent.A.J("Safari") && !(K.g.userAgent.v.Sd() || K.g.userAgent.v.Td() || K.g.userAgent.v.Ug() || K.g.userAgent.v.Ud() || K.g.userAgent.v.Ng() || K.g.userAgent.A.J("Android"))
  };
  K.g.userAgent.v.Td = function() {
    return K.g.userAgent.A.J("Coast")
  };
  K.g.userAgent.v.Rk = function() {
    return (K.g.userAgent.A.J("iPad") || K.g.userAgent.A.J("iPhone")) && !K.g.userAgent.v.Vg() && !K.g.userAgent.v.Sd() && !K.g.userAgent.v.Td() && K.g.userAgent.A.J("AppleWebKit")
  };
  K.g.userAgent.v.Sd = function() {
    return (K.g.userAgent.A.J("Chrome") || K.g.userAgent.A.J("CriOS")) && !K.g.userAgent.v.Ud()
  };
  K.g.userAgent.v.Ok = function() {
    return K.g.userAgent.A.J("Android") && !(K.g.userAgent.v.Cg() || K.g.userAgent.v.hk() || K.g.userAgent.v.Pd() || K.g.userAgent.v.Ng())
  };
  K.g.userAgent.v.Pd = K.g.userAgent.v.Ug;
  K.g.userAgent.v.xc = K.g.userAgent.v.Qk;
  K.g.userAgent.v.Ra = K.g.userAgent.v.Ud;
  K.g.userAgent.v.hk = K.g.userAgent.v.Pk;
  K.g.userAgent.v.Wr = K.g.userAgent.v.Vg;
  K.g.userAgent.v.Cr = K.g.userAgent.v.Td;
  K.g.userAgent.v.Kr = K.g.userAgent.v.Rk;
  K.g.userAgent.v.Cg = K.g.userAgent.v.Sd;
  K.g.userAgent.v.Ar = K.g.userAgent.v.Ok;
  K.g.userAgent.v.Ng = function() {
    return K.g.userAgent.A.J("Silk")
  };
  K.g.userAgent.v.Nb = function() {
    function b(b) {
      b = K.j.find(b, e);
      return d[b] || ""
    }
    var c = K.g.userAgent.A.wb();
    if (K.g.userAgent.v.xc()) return K.g.userAgent.v.Lj(c);
    c = K.g.userAgent.A.Df(c);
    var d = {};
    K.j.forEach(c, function(b) {
      d[b[0]] = b[1]
    });
    var e = K.fb(K.object.dj, d);
    return K.g.userAgent.v.Pd() ? b(["Version", "Opera"]) : K.g.userAgent.v.Ra() ? b(["Edge"]) : K.g.userAgent.v.Cg() ? b(["Chrome", "CriOS"]) : (c = c[2]) && c[1] || ""
  };
  K.g.userAgent.v.wa = function(b) {
    return 0 <= K.f.Jb(K.g.userAgent.v.Nb(), b)
  };
  K.g.userAgent.v.Lj = function(b) {
    var c = /rv: *([\d\.]*)/.exec(b);
    if (c && c[1]) return c[1];
    c = "";
    var d = /MSIE +([\d\.]+)/.exec(b);
    if (d && d[1])
      if (b = /Trident\/(\d.\d)/.exec(b), "7.0" == d[1])
        if (b && b[1]) switch (b[1]) {
          case "4.0":
            c = "8.0";
            break;
          case "5.0":
            c = "9.0";
            break;
          case "6.0":
            c = "10.0";
            break;
          case "7.0":
            c = "11.0"
        } else c = "7.0";
        else c = d[1];
    return c
  };
  K.g.userAgent.U = {};
  K.g.userAgent.U.nk = function() {
    return K.g.userAgent.A.J("Presto")
  };
  K.g.userAgent.U.rk = function() {
    return K.g.userAgent.A.J("Trident") || K.g.userAgent.A.J("MSIE")
  };
  K.g.userAgent.U.Ra = function() {
    return K.g.userAgent.A.J("Edge")
  };
  K.g.userAgent.U.Pg = function() {
    return K.g.userAgent.A.Sk() && !K.g.userAgent.U.Ra()
  };
  K.g.userAgent.U.ik = function() {
    return K.g.userAgent.A.J("Gecko") && !K.g.userAgent.U.Pg() && !K.g.userAgent.U.rk() && !K.g.userAgent.U.Ra()
  };
  K.g.userAgent.U.Nb = function() {
    var b = K.g.userAgent.A.wb();
    if (b) {
      b = K.g.userAgent.A.Df(b);
      var c = K.g.userAgent.U.Jj(b);
      if (c) return "Gecko" == c[0] ? K.g.userAgent.U.Tj(b) : c[1];
      b = b[0];
      var d;
      if (b && (d = b[2]) && (d = /Trident\/([^\s;]+)/.exec(d))) return d[1]
    }
    return ""
  };
  K.g.userAgent.U.Jj = function(b) {
    if (!K.g.userAgent.U.Ra()) return b[1];
    for (var c = 0; c < b.length; c++) {
      var d = b[c];
      if ("Edge" == d[0]) return d
    }
  };
  K.g.userAgent.U.wa = function(b) {
    return 0 <= K.f.Jb(K.g.userAgent.U.Nb(), b)
  };
  K.g.userAgent.U.Tj = function(b) {
    return (b = K.j.find(b, function(b) {
      return "Firefox" == b[0]
    })) && b[1] || ""
  };
  K.async.th = function(b) {
    K.global.setTimeout(function() {
      throw b;
    }, 0)
  };
  K.async.ra = function(b, c, d) {
    var e = b;
    c && (e = K.bind(b, c));
    e = K.async.ra.Ch(e);
    K.za(K.global.setImmediate) && (d || K.async.ra.Nl()) ? K.global.setImmediate(e) : (K.async.ra.nh || (K.async.ra.nh = K.async.ra.Pj()), K.async.ra.nh(e))
  };
  K.async.ra.Nl = function() {
    return K.global.Window && K.global.Window.prototype && !K.g.userAgent.v.Ra() && K.global.Window.prototype.setImmediate == K.global.setImmediate ? !1 : !0
  };
  K.async.ra.Pj = function() {
    var b = K.global.MessageChannel;
    "undefined" === typeof b && "undefined" !== typeof window && window.postMessage && window.addEventListener && !K.g.userAgent.U.nk() && (b = function() {
      var b = document.createElement("IFRAME");
      b.style.display = "none";
      b.src = "";
      document.documentElement.appendChild(b);
      var c = b.contentWindow;
      b = c.document;
      b.open();
      b.write("");
      b.close();
      var d = "callImmediate" + Math.random(),
        e = "file:" == c.location.protocol ? "*" : c.location.protocol + "//" + c.location.host;
      b = K.bind(function(b) {
        if (("*" ==
            e || b.origin == e) && b.data == d) this.port1.onmessage()
      }, this);
      c.addEventListener("message", b, !1);
      this.port1 = {};
      this.port2 = {
        postMessage: function() {
          c.postMessage(d, e)
        }
      }
    });
    if ("undefined" !== typeof b && !K.g.userAgent.v.xc()) {
      var c = new b,
        d = {},
        e = d;
      c.port1.onmessage = function() {
        if (K.P(d.next)) {
          d = d.next;
          var b = d.pf;
          d.pf = null;
          b()
        }
      };
      return function(b) {
        e.next = {
          pf: b
        };
        e = e.next;
        c.port2.postMessage(0)
      }
    }
    return "undefined" !== typeof document && "onreadystatechange" in document.createElement(p) ? function(b) {
      var c = document.createElement(p);
      c.onreadystatechange = function() {
        c.onreadystatechange = null;
        c.parentNode.removeChild(c);
        c = null;
        b();
        b = null
      };
      document.documentElement.appendChild(c)
    } : function(b) {
      K.global.setTimeout(b, 0)
    }
  };
  K.async.ra.Ch = K.I.bk;
  K.debug.Z.register(function(b) {
    K.async.ra.Ch = b
  });
  K.async.Ea = function() {
    this.Sc = this.Fb = null
  };
  K.async.Ea.Xc = 100;
  K.async.Ea.Mb = new K.async.bc(function() {
    return new K.async.cd
  }, function(b) {
    b.reset()
  }, K.async.Ea.Xc);
  K.async.Ea.prototype.add = function(b, c) {
    var d = K.async.Ea.Mb.get();
    d.set(b, c);
    this.Sc ? this.Sc.next = d : this.Fb = d;
    this.Sc = d
  };
  K.async.Ea.prototype.remove = function() {
    var b = null;
    this.Fb && (b = this.Fb, this.Fb = this.Fb.next, this.Fb || (this.Sc = null), b.next = null);
    return b
  };
  K.async.cd = function() {
    this.next = this.scope = this.qd = null
  };
  K.async.cd.prototype.set = function(b, c) {
    this.qd = b;
    this.scope = c;
    this.next = null
  };
  K.async.cd.prototype.reset = function() {
    this.next = this.scope = this.qd = null
  };
  K.async.N = function(b, c) {
    K.async.N.Jc || K.async.N.dk();
    K.async.N.Rc || (K.async.N.Jc(), K.async.N.Rc = !0);
    K.async.N.le.add(b, c)
  };
  K.async.N.dk = function() {
    if (-1 != String(K.global.Promise).indexOf("[native code]")) {
      var b = K.global.Promise.resolve(void 0);
      K.async.N.Jc = function() {
        b.then(K.async.N.Fc)
      }
    } else K.async.N.Jc = function() {
      K.async.ra(K.async.N.Fc)
    }
  };
  K.async.N.Lq = function(b) {
    K.async.N.Jc = function() {
      K.async.ra(K.async.N.Fc);
      b && b(K.async.N.Fc)
    }
  };
  K.async.N.Rc = !1;
  K.async.N.le = new K.async.Ea;
  K.ea && (K.async.N.Ts = function() {
    K.async.N.Rc = !1;
    K.async.N.le = new K.async.Ea
  });
  K.async.N.Fc = function() {
    for (var b; b = K.async.N.le.remove();) {
      try {
        b.qd.call(b.scope)
      } catch (c) {
        K.async.th(c)
      }
      K.async.Ea.Mb.put(b)
    }
    K.async.N.Rc = !1
  };
  K.a.m = {};
  K.a.m.Ep = F();
  K.a.m.wp = F();
  K.a.m.Bp = F();
  K.a.m.Ap = F();
  K.a.m.xp = F();
  K.a.m.yp = F();
  K.a.m.zp = F();
  K.a.m.Cp = F();
  K.a.m.Dp = F();
  K.a.m.uq = function(b) {
    return K.ia(b) ? b.constructor.displayName || b.constructor.name || Object.prototype.toString.call(b) : void 0 === b ? "undefined" : null === b ? "null" : typeof b
  };
  K.a.m.tc = function(b) {
    return (b = b && b.ownerDocument) && (b.defaultView || b.parentWindow) || window
  };
  K.g.userAgent.platform = {};
  K.g.userAgent.platform.Bg = function() {
    return K.g.userAgent.A.J("Android")
  };
  K.g.userAgent.platform.Kg = function() {
    return K.g.userAgent.A.J("iPod")
  };
  K.g.userAgent.platform.Jg = function() {
    return K.g.userAgent.A.J("iPhone") && !K.g.userAgent.A.J("iPod") && !K.g.userAgent.A.J("iPad")
  };
  K.g.userAgent.platform.Ig = function() {
    return K.g.userAgent.A.J("iPad")
  };
  K.g.userAgent.platform.Hg = function() {
    return K.g.userAgent.platform.Jg() || K.g.userAgent.platform.Ig() || K.g.userAgent.platform.Kg()
  };
  K.g.userAgent.platform.Lg = function() {
    return K.g.userAgent.A.J("Macintosh")
  };
  K.g.userAgent.platform.kk = function() {
    return K.g.userAgent.A.J("Linux")
  };
  K.g.userAgent.platform.Rg = function() {
    return K.g.userAgent.A.J("Windows")
  };
  K.g.userAgent.platform.Dg = function() {
    return K.g.userAgent.A.J("CrOS")
  };
  K.g.userAgent.platform.Nb = function() {
    var b = K.g.userAgent.A.wb();
    var c = "";
    K.g.userAgent.platform.Rg() ? (c = /Windows (?:NT|Phone) ([0-9.]+)/, c = (b = c.exec(b)) ? b[1] : "0.0") : K.g.userAgent.platform.Hg() ? (c = /(?:iPhone|iPod|iPad|CPU)\s+OS\s+(\S+)/, c = (b = c.exec(b)) && b[1].replace(/_/g, ".")) : K.g.userAgent.platform.Lg() ? (c = /Mac OS X ([0-9_.]+)/, c = (b = c.exec(b)) ? b[1].replace(/_/g, ".") : "10") : K.g.userAgent.platform.Bg() ? (c = /Android\s+([^\);]+)(\)|;)/, c = (b = c.exec(b)) && b[1]) : K.g.userAgent.platform.Dg() && (c = /(?:CrOS\s+(?:i686|x86_64)\s+([0-9.]+))/,
      c = (b = c.exec(b)) && b[1]);
    return c || ""
  };
  K.g.userAgent.platform.wa = function(b) {
    return 0 <= K.f.Jb(K.g.userAgent.platform.Nb(), b)
  };
  K.Ha = {};
  K.Ha.object = function(b, c) {
    return c
  };
  K.Ha.ee = function(b) {
    K.Ha.ee[" "](b);
    return b
  };
  K.Ha.ee[" "] = K.Sa;
  K.Ha.Rp = function(b, c) {
    try {
      return K.Ha.ee(b[c]), !0
    } catch (d) {}
    return !1
  };
  K.Ha.cache = function(b, c, d, e) {
    e = e ? e(c) : c;
    return Object.prototype.hasOwnProperty.call(b, e) ? b[e] : b[e] = d(c)
  };
  K.userAgent = {};
  K.userAgent.re = !1;
  K.userAgent.pe = !1;
  K.userAgent.qe = !1;
  K.userAgent.we = !1;
  K.userAgent.Wc = !1;
  K.userAgent.ue = !1;
  K.userAgent.Hh = !1;
  K.userAgent.Gb = K.userAgent.re || K.userAgent.pe || K.userAgent.qe || K.userAgent.Wc || K.userAgent.we || K.userAgent.ue;
  K.userAgent.Sj = function() {
    return K.g.userAgent.A.wb()
  };
  K.userAgent.ag = function() {
    return K.global.navigator || null
  };
  K.userAgent.Qe = K.userAgent.Gb ? K.userAgent.ue : K.g.userAgent.v.Pd();
  K.userAgent.Y = K.userAgent.Gb ? K.userAgent.re : K.g.userAgent.v.xc();
  K.userAgent.Fe = K.userAgent.Gb ? K.userAgent.pe : K.g.userAgent.U.Ra();
  K.userAgent.Xm = K.userAgent.Fe || K.userAgent.Y;
  K.userAgent.$c = K.userAgent.Gb ? K.userAgent.qe : K.g.userAgent.U.ik();
  K.userAgent.Hb = K.userAgent.Gb ? K.userAgent.we || K.userAgent.Wc : K.g.userAgent.U.Pg();
  K.userAgent.mk = function() {
    return K.userAgent.Hb && K.g.userAgent.A.J("Mobile")
  };
  K.userAgent.ao = K.userAgent.Wc || K.userAgent.mk();
  K.userAgent.yo = K.userAgent.Hb;
  K.userAgent.pj = function() {
    var b = K.userAgent.ag();
    return b && b.platform || ""
  };
  K.userAgent.po = K.userAgent.pj();
  K.userAgent.te = !1;
  K.userAgent.xe = !1;
  K.userAgent.se = !1;
  K.userAgent.ye = !1;
  K.userAgent.oe = !1;
  K.userAgent.Uc = !1;
  K.userAgent.Tc = !1;
  K.userAgent.Vc = !1;
  K.userAgent.Da = K.userAgent.te || K.userAgent.xe || K.userAgent.se || K.userAgent.ye || K.userAgent.oe || K.userAgent.Uc || K.userAgent.Tc || K.userAgent.Vc;
  K.userAgent.Un = K.userAgent.Da ? K.userAgent.te : K.g.userAgent.platform.Lg();
  K.userAgent.hp = K.userAgent.Da ? K.userAgent.xe : K.g.userAgent.platform.Rg();
  K.userAgent.jk = function() {
    return K.g.userAgent.platform.kk() || K.g.userAgent.platform.Dg()
  };
  K.userAgent.Tn = K.userAgent.Da ? K.userAgent.se : K.userAgent.jk();
  K.userAgent.vk = function() {
    var b = K.userAgent.ag();
    return !!b && K.f.contains(b.appVersion || "", "X11")
  };
  K.userAgent.ip = K.userAgent.Da ? K.userAgent.ye : K.userAgent.vk();
  K.userAgent.dm = K.userAgent.Da ? K.userAgent.oe : K.g.userAgent.platform.Bg();
  K.userAgent.In = K.userAgent.Da ? K.userAgent.Uc : K.g.userAgent.platform.Jg();
  K.userAgent.Hn = K.userAgent.Da ? K.userAgent.Tc : K.g.userAgent.platform.Ig();
  K.userAgent.Jn = K.userAgent.Da ? K.userAgent.Vc : K.g.userAgent.platform.Kg();
  K.userAgent.Gn = K.userAgent.Da ? K.userAgent.Uc || K.userAgent.Tc || K.userAgent.Vc : K.g.userAgent.platform.Hg();
  K.userAgent.qj = function() {
    var b = "",
      c = K.userAgent.Uj();
    c && (b = c ? c[1] : "");
    return K.userAgent.Y && (c = K.userAgent.Rf(), null != c && c > parseFloat(b)) ? String(c) : b
  };
  K.userAgent.Uj = function() {
    var b = K.userAgent.Sj();
    if (K.userAgent.$c) return /rv\:([^\);]+)(\)|;)/.exec(b);
    if (K.userAgent.Fe) return /Edge\/([\d\.]+)/.exec(b);
    if (K.userAgent.Y) return /\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(b);
    if (K.userAgent.Hb) return /WebKit\/(\S+)/.exec(b);
    if (K.userAgent.Qe) return /(?:Version)[ \/]?(\S+)/.exec(b)
  };
  K.userAgent.Rf = function() {
    var b = K.global.document;
    return b ? b.documentMode : void 0
  };
  K.userAgent.VERSION = K.userAgent.qj();
  K.userAgent.compare = function(b, c) {
    return K.f.Jb(b, c)
  };
  K.userAgent.tk = {};
  K.userAgent.wa = function(b) {
    return K.userAgent.Hh || K.Ha.cache(K.userAgent.tk, b, function() {
      return 0 <= K.f.Jb(K.userAgent.VERSION, b)
    })
  };
  K.userAgent.as = K.userAgent.wa;
  K.userAgent.Rb = function(b) {
    return Number(K.userAgent.Yh) >= b
  };
  K.userAgent.Er = K.userAgent.Rb;
  var L;
  var M = K.global.document,
    aa = K.userAgent.Rf();
  L = M && K.userAgent.Y ? aa || ("CSS1Compat" == M.compatMode ? parseInt(K.userAgent.VERSION, 10) : 5) : void 0;
  K.userAgent.Yh = L;
  K.a.ib = {
    Nh: !K.userAgent.Y || K.userAgent.Rb(9),
    Oh: !K.userAgent.$c && !K.userAgent.Y || K.userAgent.Y && K.userAgent.Rb(9) || K.userAgent.$c && K.userAgent.wa("1.9.1"),
    Ae: K.userAgent.Y && !K.userAgent.wa("9"),
    Ph: K.userAgent.Y || K.userAgent.Qe || K.userAgent.Hb,
    ei: K.userAgent.Y,
    Pn: K.userAgent.Y && !K.userAgent.Rb(9)
  };
  K.a.Oc = {};
  K.a.Oc.Ji = {
    area: !0,
    base: !0,
    br: !0,
    col: !0,
    command: !0,
    embed: !0,
    hr: !0,
    img: !0,
    input: !0,
    keygen: !0,
    link: !0,
    meta: !0,
    param: !0,
    source: !0,
    track: !0,
    wbr: !0
  };
  K.a.Oc.uk = function(b) {
    return !0 === K.a.Oc.Ji[b]
  };
  K.b.V = function() {
    this.Bc = "";
    this.pi = K.b.V.ca
  };
  K.b.V.prototype.va = !0;
  K.b.V.ca = {};
  K.b.V.pc = function(b) {
    b = K.f.H.u(b);
    return 0 === b.length ? K.b.V.EMPTY : K.b.V.kd(b)
  };
  K.b.V.prototype.ha = G("Bc");
  K.ea && (K.b.V.prototype.toString = function() {
    return "SafeScript{" + this.Bc + "}"
  });
  K.b.V.u = function(b) {
    if (b instanceof K.b.V && b.constructor === K.b.V && b.pi === K.b.V.ca) return b.Bc;
    K.m.ma("expected object of type SafeScript, got '" + b + k + K.aa(b));
    return "type_error:SafeScript"
  };
  K.b.V.kd = function(b) {
    return (new K.b.V).cb(b)
  };
  K.b.V.prototype.cb = function(b) {
    this.Bc = b;
    return this
  };
  K.b.V.EMPTY = K.b.V.kd("");
  K.ta = {};
  K.ta.url = {};
  K.ta.url.fj = function(b) {
    return K.ta.url.og().createObjectURL(b)
  };
  K.ta.url.Vs = function(b) {
    K.ta.url.og().revokeObjectURL(b)
  };
  K.ta.url.og = function() {
    var b = K.ta.url.Hf();
    if (null != b) return b;
    throw Error("This browser doesn't seem to support blob URLs");
  };
  K.ta.url.Hf = function() {
    return K.P(K.global.URL) && K.P(K.global.URL.createObjectURL) ? K.global.URL : K.P(K.global.webkitURL) && K.P(K.global.webkitURL.createObjectURL) ? K.global.webkitURL : K.P(K.global.createObjectURL) ? K.global : null
  };
  K.ta.url.Np = function() {
    return null != K.ta.url.Hf()
  };
  K.b.o = function() {
    this.Ga = "";
    this.ti = K.b.o.ca
  };
  K.b.o.Ka = "about:invalid#zClosurez";
  K.b.o.prototype.va = !0;
  K.b.o.prototype.ha = G("Ga");
  K.b.o.prototype.Fd = !0;
  K.b.o.prototype.ab = function() {
    return K.h.i.O.Ua
  };
  K.ea && (K.b.o.prototype.toString = function() {
    return "SafeUrl{" + this.Ga + "}"
  });
  K.b.o.u = function(b) {
    if (b instanceof K.b.o && b.constructor === K.b.o && b.ti === K.b.o.ca) return b.Ga;
    K.m.ma("expected object of type SafeUrl, got '" + b + k + K.aa(b));
    return "type_error:SafeUrl"
  };
  K.b.o.pc = function(b) {
    return K.b.o.ya(K.f.H.u(b))
  };
  K.b.Ue = /^(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm))$/i;
  K.b.o.Oq = function(b) {
    b = K.b.Ue.test(b.type) ? K.ta.url.fj(b) : K.b.o.Ka;
    return K.b.o.ya(b)
  };
  K.b.Th = /^data:([^;,]*);base64,[a-z0-9+\/]+=*$/i;
  K.b.o.Qq = function(b) {
    var c = b.match(K.b.Th);
    c = c && K.b.Ue.test(c[1]);
    return K.b.o.ya(c ? b : K.b.o.Ka)
  };
  K.b.o.Sq = function(b) {
    K.f.aj(b) || (b = K.b.o.Ka);
    return K.b.o.ya(b)
  };
  K.b.o.Tq = function(b) {
    return K.b.o.ya(K.b.C.u(b))
  };
  K.b.Ve = /^(?:(?:https?|mailto|ftp):|[^:/?#]*(?:[/?#]|$))/i;
  K.b.o.Ic = function(b) {
    if (b instanceof K.b.o) return b;
    b = b.va ? b.ha() : String(b);
    K.b.Ve.test(b) || (b = K.b.o.Ka);
    return K.b.o.ya(b)
  };
  K.b.o.Yb = function(b) {
    if (b instanceof K.b.o) return b;
    b = b.va ? b.ha() : String(b);
    K.b.Ve.test(b) || (b = K.b.o.Ka);
    return K.b.o.ya(b)
  };
  K.b.o.ca = {};
  K.b.o.ya = function(b) {
    var c = new K.b.o;
    c.Ga = b;
    return c
  };
  K.b.o.Zl = K.b.o.ya("about:blank");
  K.b.F = function() {
    this.Dc = "";
    this.si = K.b.F.ca
  };
  K.b.F.prototype.va = !0;
  K.b.F.ca = {};
  K.b.F.pc = function(b) {
    b = K.f.H.u(b);
    return 0 === b.length ? K.b.F.EMPTY : K.b.F.qb(b)
  };
  K.b.F.Xp = F();
  K.b.F.prototype.ha = G("Dc");
  K.ea && (K.b.F.prototype.toString = function() {
    return "SafeStyle{" + this.Dc + "}"
  });
  K.b.F.u = function(b) {
    if (b instanceof K.b.F && b.constructor === K.b.F && b.si === K.b.F.ca) return b.Dc;
    K.m.ma("expected object of type SafeStyle, got '" + b + k + K.aa(b));
    return "type_error:SafeStyle"
  };
  K.b.F.qb = function(b) {
    return (new K.b.F).cb(b)
  };
  K.b.F.prototype.cb = function(b) {
    this.Dc = b;
    return this
  };
  K.b.F.EMPTY = K.b.F.qb("");
  K.b.F.Ka = "zClosurez";
  K.b.F.create = function(b) {
    var c = "",
      d;
    for (d in b) {
      if (!/^[-_a-zA-Z0-9]+$/.test(d)) throw Error("Name allows only [-_a-zA-Z0-9], got: " + d);
      var e = b[d];
      if (null != e) {
        if (e instanceof K.f.H) e = K.f.H.u(e);
        else {
          e = String(e);
          var f = e.replace(K.b.o.ci, "$1").replace(K.b.o.$e, "url");
          K.b.F.Gi.test(f) ? K.b.F.Xj(e) ? e = K.b.F.ll(e) : (K.m.ma("String value requires balanced quotes, got: " + e), e = K.b.F.Ka) : (K.m.ma("String value allows only " + K.b.F.cf + " and simple functions, got: " + e), e = K.b.F.Ka)
        }
        c += d + ":" + e + ";"
      }
    }
    return c ? K.b.F.qb(c) :
      K.b.F.EMPTY
  };
  K.b.F.Xj = function(b) {
    for (var c = !0, d = !0, e = 0; e < b.length; e++) {
      var f = b.charAt(e);
      "'" == f && d ? c = !c : '"' == f && c && (d = !d)
    }
    return c && d
  };
  K.b.F.cf = "[-,.\"'%_!# a-zA-Z0-9]";
  K.b.F.Gi = new RegExp("^" + K.b.F.cf + "+$");
  K.b.o.$e = /\b(url\([ \t\n]*)('[ -&(-\[\]-~]*'|"[ !#-\[\]-~]*"|[!#-&*-\[\]-~]*)([ \t\n]*\))/g;
  K.b.o.ci = /\b(hsl|hsla|rgb|rgba|(rotate|scale|translate)(X|Y|Z|3d)?)\([-0-9a-z.%, ]+\)/g;
  K.b.F.ll = function(b) {
    return b.replace(K.b.o.$e, function(b, d, e, f) {
      var c = "";
      e = e.replace(/^(['"])(.*)\1$/, function(b, d, e) {
        c = d;
        return e
      });
      b = K.b.o.Ic(e).ha();
      return d + c + b + c + f
    })
  };
  K.b.F.concat = function(b) {
    function c(b) {
      K.isArray(b) ? K.j.forEach(b, c) : d += K.b.F.u(b)
    }
    var d = "";
    K.j.forEach(arguments, c);
    return d ? K.b.F.qb(d) : K.b.F.EMPTY
  };
  K.b.M = function() {
    this.Cc = "";
    this.ri = K.b.M.ca
  };
  K.b.M.prototype.va = !0;
  K.b.M.ca = {};
  K.b.M.mq = function(b, c) {
    if (K.f.contains(b, "<")) throw Error("Selector does not allow '<', got: " + b);
    var d = b.replace(/('|")((?!\1)[^\r\n\f\\]|\\[\s\S])*\1/g, "");
    if (!/^[-_a-zA-Z0-9#.:* ,>+~[\]()=^$|]+$/.test(d)) throw Error("Selector allows only [-_a-zA-Z0-9#.:* ,>+~[\\]()=^$|] and strings, got: " + b);
    if (!K.b.M.Wj(d)) throw Error("() and [] in selector must be balanced, got: " + b);
    c instanceof K.b.F || (c = K.b.F.create(c));
    b = b + "{" + K.b.F.u(c) + "}";
    return K.b.M.rb(b)
  };
  K.b.M.Wj = function(b) {
    for (var c = {
        "(": ")",
        "[": "]"
      }, d = [], e = 0; e < b.length; e++) {
      var f = b[e];
      if (c[f]) d.push(c[f]);
      else if (K.object.contains(c, f) && d.pop() != f) return !1
    }
    return 0 == d.length
  };
  K.b.M.concat = function(b) {
    function c(b) {
      K.isArray(b) ? K.j.forEach(b, c) : d += K.b.M.u(b)
    }
    var d = "";
    K.j.forEach(arguments, c);
    return K.b.M.rb(d)
  };
  K.b.M.pc = function(b) {
    b = K.f.H.u(b);
    return 0 === b.length ? K.b.M.EMPTY : K.b.M.rb(b)
  };
  K.b.M.prototype.ha = G("Cc");
  K.ea && (K.b.M.prototype.toString = function() {
    return "SafeStyleSheet{" + this.Cc + "}"
  });
  K.b.M.u = function(b) {
    if (b instanceof K.b.M && b.constructor === K.b.M && b.ri === K.b.M.ca) return b.Cc;
    K.m.ma("expected object of type SafeStyleSheet, got '" + b + k + K.aa(b));
    return "type_error:SafeStyleSheet"
  };
  K.b.M.rb = function(b) {
    return (new K.b.M).cb(b)
  };
  K.b.M.prototype.cb = function(b) {
    this.Cc = b;
    return this
  };
  K.b.M.EMPTY = K.b.M.rb("");
  K.b.l = function() {
    this.Ga = "";
    this.oi = K.b.l.ca;
    this.nc = null
  };
  K.b.l.prototype.Fd = !0;
  K.b.l.prototype.ab = G("nc");
  K.b.l.prototype.va = !0;
  K.b.l.prototype.ha = G("Ga");
  K.ea && (K.b.l.prototype.toString = function() {
    return "SafeHtml{" + this.Ga + "}"
  });
  K.b.l.u = function(b) {
    if (b instanceof K.b.l && b.constructor === K.b.l && b.oi === K.b.l.ca) return b.Ga;
    K.m.ma("expected object of type SafeHtml, got '" + b + k + K.aa(b));
    return "type_error:SafeHtml"
  };
  K.b.l.ua = function(b) {
    if (b instanceof K.b.l) return b;
    var c = null;
    b.Fd && (c = b.ab());
    return K.b.l.pa(K.f.ua(b.va ? b.ha() : String(b)), c)
  };
  K.b.l.rr = function(b) {
    if (b instanceof K.b.l) return b;
    b = K.b.l.ua(b);
    return K.b.l.pa(K.f.ah(K.b.l.u(b)), b.ab())
  };
  K.b.l.sr = function(b) {
    if (b instanceof K.b.l) return b;
    b = K.b.l.ua(b);
    return K.b.l.pa(K.f.Rl(K.b.l.u(b)), b.ab())
  };
  K.b.l.from = K.b.l.ua;
  K.b.l.bf = /^[a-zA-Z0-9-]+$/;
  K.b.l.Ei = {
    action: !0,
    cite: !0,
    data: !0,
    formaction: !0,
    href: !0,
    manifest: !0,
    poster: !0,
    src: !0
  };
  K.b.l.ki = {
    APPLET: !0,
    BASE: !0,
    EMBED: !0,
    IFRAME: !0,
    LINK: !0,
    MATH: !0,
    META: !0,
    OBJECT: !0,
    SCRIPT: !0,
    STYLE: !0,
    SVG: !0,
    TEMPLATE: !0
  };
  K.b.l.create = function(b, c, d) {
    K.b.l.Pl(String(b));
    return K.b.l.Za(String(b), c, d)
  };
  K.b.l.Pl = function(b) {
    if (!K.b.l.bf.test(b)) throw Error("Invalid tag name <" + b + ">.");
    if (b.toUpperCase() in K.b.l.ki) throw Error("Tag name <" + b + "> is not allowed for SafeHtml.");
  };
  K.b.l.jq = function(b, c, d, e) {
    b && K.b.C.u(b);
    var f = {};
    f.src = b || null;
    f.srcdoc = c && K.b.l.u(c);
    b = K.b.l.kc(f, {
      sandbox: ""
    }, d);
    return K.b.l.Za("iframe", b, e)
  };
  K.b.l.nq = function(b, c, d, e) {
    if (!K.b.l.Yi()) throw Error("The browser does not support sandboxed iframes.");
    var f = {};
    f.src = b ? K.b.o.u(K.b.o.Ic(b)) : null;
    f.srcdoc = c || null;
    f.sandbox = "";
    b = K.b.l.kc(f, {}, d);
    return K.b.l.Za("iframe", b, e)
  };
  K.b.l.Yi = function() {
    return K.global.HTMLIFrameElement && "sandbox" in K.global.HTMLIFrameElement.prototype
  };
  K.b.l.pq = function(b, c) {
    K.b.C.u(b);
    b = K.b.l.kc({
      src: b
    }, {}, c);
    return K.b.l.Za("script", b)
  };
  K.b.l.oq = function(b, c) {
    for (var d in c) {
      var e = d.toLowerCase();
      if ("language" == e || "src" == e || "text" == e || "type" == e) throw Error('Cannot set "' + e + '" attribute');
    }
    d = "";
    b = K.j.concat(b);
    for (e = 0; e < b.length; e++) d += K.b.V.u(b[e]);
    b = K.b.l.pa(d, K.h.i.O.sa);
    return K.b.l.Za("script", c, b)
  };
  K.b.l.qq = function(b, c) {
    c = K.b.l.kc({
      type: "text/css"
    }, {}, c);
    var d = "";
    b = K.j.concat(b);
    for (var e = 0; e < b.length; e++) d += K.b.M.u(b[e]);
    b = K.b.l.pa(d, K.h.i.O.sa);
    return K.b.l.Za("style", c, b)
  };
  K.b.l.lq = function(b, c) {
    b = K.b.o.u(K.b.o.Ic(b));
    (K.g.userAgent.v.xc() || K.g.userAgent.v.Ra()) && K.f.contains(b, ";") && (b = "'" + b.replace(/'/g, "%27") + "'");
    return K.b.l.Za("meta", {
      "http-equiv": "refresh",
      content: (c || 0) + "; url=" + b
    })
  };
  K.b.l.Ej = function(b, c, d) {
    if (d instanceof K.f.H) d = K.f.H.u(d);
    else if ("style" == c.toLowerCase()) d = K.b.l.Qj(d);
    else {
      if (/^on/i.test(c)) throw Error('Attribute "' + c + '" requires goog.string.Const value, "' + d + '" given.');
      if (c.toLowerCase() in K.b.l.Ei)
        if (d instanceof K.b.C) d = K.b.C.u(d);
        else if (d instanceof K.b.o) d = K.b.o.u(d);
      else if (K.L(d)) d = K.b.o.Ic(d).ha();
      else throw Error('Attribute "' + c + '" on tag "' + b + '" requires goog.html.SafeUrl, goog.string.Const, or string, value "' + d + '" given.');
    }
    d.va && (d = d.ha());
    return c + '="' + K.f.ua(String(d)) + '"'
  };
  K.b.l.Qj = function(b) {
    if (!K.ia(b)) throw Error('The "style" attribute requires goog.html.SafeStyle or map of style properties, ' + typeof b + " given: " + b);
    b instanceof K.b.F || (b = K.b.F.create(b));
    return K.b.F.u(b)
  };
  K.b.l.sq = function(b, c, d, e) {
    c = K.b.l.create(c, d, e);
    c.nc = b;
    return c
  };
  K.b.l.concat = function(b) {
    function c(b) {
      K.isArray(b) ? K.j.forEach(b, c) : (b = K.b.l.ua(b), e += K.b.l.u(b), b = b.ab(), d == K.h.i.O.sa ? d = b : b != K.h.i.O.sa && d != b && (d = null))
    }
    var d = K.h.i.O.sa,
      e = "";
    K.j.forEach(arguments, c);
    return K.b.l.pa(e, d)
  };
  K.b.l.fq = function(b, c) {
    var d = K.b.l.concat(K.j.slice(arguments, 1));
    d.nc = b;
    return d
  };
  K.b.l.ca = {};
  K.b.l.pa = function(b, c) {
    return (new K.b.l).cb(b, c)
  };
  K.b.l.prototype.cb = function(b, c) {
    this.Ga = b;
    this.nc = c;
    return this
  };
  K.b.l.Za = function(b, c, d) {
    var e = null;
    var f = "<" + b + K.b.l.xl(b, c);
    K.eb(d) ? K.isArray(d) || (d = [d]) : d = [];
    K.a.Oc.uk(b.toLowerCase()) ? f += ">" : (e = K.b.l.concat(d), f += ">" + K.b.l.u(e) + "</" + b + ">", e = e.ab());
    (b = c && c.dir) && (e = /^(ltr|rtl|auto)$/i.test(b) ? K.h.i.O.sa : null);
    return K.b.l.pa(f, e)
  };
  K.b.l.xl = function(b, c) {
    var d = "";
    if (c)
      for (var e in c) {
        if (!K.b.l.bf.test(e)) throw Error('Invalid attribute name "' + e + '".');
        var f = c[e];
        K.eb(f) && (d += " " + K.b.l.Ej(b, e, f))
      }
    return d
  };
  K.b.l.kc = function(b, c, d) {
    var e = {},
      f;
    for (f in b) e[f] = b[f];
    for (f in c) e[f] = c[f];
    for (f in d) {
      var g = f.toLowerCase();
      if (g in b) throw Error('Cannot override "' + g + '" attribute, got "' + f + '" with value "' + d[f] + '"');
      g in c && delete e[g];
      e[f] = d[f]
    }
    return e
  };
  K.b.l.Tm = K.b.l.pa("<!DOCTYPE html>", K.h.i.O.sa);
  K.b.l.EMPTY = K.b.l.pa("", K.h.i.O.sa);
  K.b.l.ze = K.b.l.pa("<br>", K.h.i.O.sa);
  K.a.S = {};
  K.a.S.Ln = {
    bm: "afterbegin",
    cm: "afterend",
    rm: "beforebegin",
    sm: "beforeend"
  };
  K.a.S.ur = function(b, c, d) {
    b.insertAdjacentHTML(c, K.b.l.u(d))
  };
  K.a.S.wi = {
    MATH: !0,
    SCRIPT: !0,
    STYLE: !0,
    SVG: !0,
    TEMPLATE: !0
  };
  K.a.S.oh = function(b, c) {
    if (K.m.oa && K.a.S.wi[b.tagName.toUpperCase()]) throw Error("goog.dom.safe.setInnerHtml cannot be used to set content of " + b.tagName + ".");
    b.innerHTML = K.b.l.u(c)
  };
  K.a.S.tt = function(b, c) {
    b.outerHTML = K.b.l.u(c)
  };
  K.a.S.wt = function(b, c) {
    b.style.cssText = K.b.F.u(c)
  };
  K.a.S.yq = function(b, c) {
    b.write(K.b.l.u(c))
  };
  K.a.S.ft = function(b, c) {
    c = c instanceof K.b.o ? c : K.b.o.Yb(c);
    b.href = K.b.o.u(c)
  };
  K.a.S.pt = function(b, c) {
    c = c instanceof K.b.o ? c : K.b.o.Yb(c);
    b.src = K.b.o.u(c)
  };
  K.a.S.jt = function(b, c) {
    b.src = K.b.C.u(c)
  };
  K.a.S.lt = function(b, c) {
    b.src = K.b.C.u(c)
  };
  K.a.S.nt = function(b, c) {
    b.src = K.b.C.u(c)
  };
  K.a.S.ot = function(b, c) {
    b.srcdoc = K.b.l.u(c)
  };
  K.a.S.qt = function(b, c, d) {
    b.rel = d;
    K.f.nf(d, "stylesheet") ? b.href = K.b.C.u(c) : b.href = c instanceof K.b.C ? K.b.C.u(c) : c instanceof K.b.o ? K.b.o.u(c) : K.b.o.Yb(c).ha()
  };
  K.a.S.st = function(b, c) {
    b.data = K.b.C.u(c)
  };
  K.a.S.ql = function(b, c) {
    b.src = K.b.C.u(c)
  };
  K.a.S.vt = function(b, c) {
    b.text = K.b.V.u(c)
  };
  K.a.S.rt = function(b, c) {
    c = c instanceof K.b.o ? c : K.b.o.Yb(c);
    b.href = K.b.o.u(c)
  };
  K.a.S.Bs = function(b, c, d, e, f) {
    b = b instanceof K.b.o ? b : K.b.o.Yb(b);
    return (c || window).open(K.b.o.u(b), d ? K.f.H.u(d) : "", e, f)
  };
  K.b.hb = {};
  K.b.hb.il = function(b, c) {
    return K.b.l.pa(c, null)
  };
  K.b.hb.Zs = function(b, c) {
    return K.b.V.kd(c)
  };
  K.b.hb.at = function(b, c) {
    return K.b.F.qb(c)
  };
  K.b.hb.ct = function(b, c) {
    return K.b.M.rb(c)
  };
  K.b.hb.et = function(b, c) {
    return K.b.o.ya(c)
  };
  K.b.hb.Ut = function(b, c) {
    return K.b.C.sb(c)
  };
  K.s = {};
  K.s.Hs = function(b) {
    return Math.floor(Math.random() * b)
  };
  K.s.Wt = function(b, c) {
    return b + Math.random() * (c - b)
  };
  K.s.Yp = function(b, c, d) {
    return Math.min(Math.max(b, c), d)
  };
  K.s.Yg = function(b, c) {
    b %= c;
    return 0 > b * c ? b + c : b
  };
  K.s.ds = function(b, c, d) {
    return b + d * (c - b)
  };
  K.s.rs = function(b, c, d) {
    return Math.abs(b - c) <= (d || 1E-6)
  };
  K.s.he = function(b) {
    return K.s.Yg(b, 360)
  };
  K.s.Gt = function(b) {
    return K.s.Yg(b, 2 * Math.PI)
  };
  K.s.wh = function(b) {
    return b * Math.PI / 180
  };
  K.s.Cl = function(b) {
    return 180 * b / Math.PI
  };
  K.s.pp = function(b, c) {
    return c * Math.cos(K.s.wh(b))
  };
  K.s.qp = function(b, c) {
    return c * Math.sin(K.s.wh(b))
  };
  K.s.angle = function(b, c, d, e) {
    return K.s.he(K.s.Cl(Math.atan2(e - c, d - b)))
  };
  K.s.op = function(b, c) {
    b = K.s.he(c) - K.s.he(b);
    180 < b ? b -= 360 : -180 >= b && (b = 360 + b);
    return b
  };
  K.s.sign = function(b) {
    return 0 < b ? 1 : 0 > b ? -1 : b
  };
  K.s.js = function(b, c, d, e) {
    d = d || function(b, c) {
      return b == c
    };
    e = e || function(c) {
      return b[c]
    };
    for (var f = b.length, g = c.length, h = [], l = 0; l < f + 1; l++) h[l] = [], h[l][0] = 0;
    for (var m = 0; m < g + 1; m++) h[0][m] = 0;
    for (l = 1; l <= f; l++)
      for (m = 1; m <= g; m++) d(b[l - 1], c[m - 1]) ? h[l][m] = h[l - 1][m - 1] + 1 : h[l][m] = Math.max(h[l - 1][m], h[l][m - 1]);
    var q = [];
    l = f;
    for (m = g; 0 < l && 0 < m;) d(b[l - 1], c[m - 1]) ? (q.unshift(e(l - 1, m - 1)), l--, m--) : h[l - 1][m] > h[l][m - 1] ? l-- : m--;
    return q
  };
  K.s.ie = function(b) {
    return K.j.reduce(arguments, function(b, d) {
      return b + d
    }, 0)
  };
  K.s.Ri = function(b) {
    return K.s.ie.apply(null, arguments) / arguments.length
  };
  K.s.kl = function(b) {
    var c = arguments.length;
    if (2 > c) return 0;
    var d = K.s.Ri.apply(null, arguments);
    return K.s.ie.apply(null, K.j.map(arguments, function(b) {
      return Math.pow(b - d, 2)
    })) / (c - 1)
  };
  K.s.Ht = function(b) {
    return Math.sqrt(K.s.kl.apply(null, arguments))
  };
  K.s.Jr = function(b) {
    return isFinite(b) && 0 == b % 1
  };
  K.s.Hr = function(b) {
    return isFinite(b)
  };
  K.s.Or = function(b) {
    return 0 == b && 0 > 1 / b
  };
  K.s.hs = function(b) {
    if (0 < b) {
      var c = Math.round(Math.log(b) * Math.LOG10E);
      return c - (parseFloat("1e" + c) > b ? 1 : 0)
    }
    return 0 == b ? -Infinity : NaN
  };
  K.s.Xs = function(b, c) {
    return Math.floor(b + (c || 2E-15))
  };
  K.s.Ws = function(b, c) {
    return Math.ceil(b - (c || 2E-15))
  };
  K.s.W = function(b, c) {
    this.x = K.P(b) ? b : 0;
    this.y = K.P(c) ? c : 0
  };
  K.s.W.prototype.clone = function() {
    return new K.s.W(this.x, this.y)
  };
  K.ea && (K.s.W.prototype.toString = function() {
    return "(" + this.x + ", " + this.y + ")"
  });
  K.s.W.prototype.Kb = function(b) {
    return b instanceof K.s.W && K.s.W.Kb(this, b)
  };
  K.s.W.Kb = function(b, c) {
    return b == c ? !0 : b && c ? b.x == c.x && b.y == c.y : !1
  };
  K.s.W.xq = function(b, c) {
    var d = b.x - c.x;
    b = b.y - c.y;
    return Math.sqrt(d * d + b * b)
  };
  K.s.W.ks = function(b) {
    return Math.sqrt(b.x * b.x + b.y * b.y)
  };
  K.s.W.azimuth = function(b) {
    return K.s.angle(0, 0, b.x, b.y)
  };
  K.s.W.Et = function(b, c) {
    var d = b.x - c.x;
    b = b.y - c.y;
    return d * d + b * b
  };
  K.s.W.wq = function(b, c) {
    return new K.s.W(b.x - c.x, b.y - c.y)
  };
  K.s.W.ie = function(b, c) {
    return new K.s.W(b.x + c.x, b.y + c.y)
  };
  I = K.s.W.prototype;
  I.ceil = function() {
    this.x = Math.ceil(this.x);
    this.y = Math.ceil(this.y);
    return this
  };
  I.floor = function() {
    this.x = Math.floor(this.x);
    this.y = Math.floor(this.y);
    return this
  };
  I.round = function() {
    this.x = Math.round(this.x);
    this.y = Math.round(this.y);
    return this
  };
  I.translate = function(b, c) {
    b instanceof K.s.W ? (this.x += b.x, this.y += b.y) : (this.x += Number(b), K.Tb(c) && (this.y += c));
    return this
  };
  I.scale = function(b, c) {
    c = K.Tb(c) ? c : b;
    this.x *= b;
    this.y *= c;
    return this
  };
  K.s.ob = function(b, c) {
    this.width = b;
    this.height = c
  };
  K.s.ob.Kb = function(b, c) {
    return b == c ? !0 : b && c ? b.width == c.width && b.height == c.height : !1
  };
  K.s.ob.prototype.clone = function() {
    return new K.s.ob(this.width, this.height)
  };
  K.ea && (K.s.ob.prototype.toString = function() {
    return "(" + this.width + " x " + this.height + ")"
  });
  I = K.s.ob.prototype;
  I.Ni = function() {
    return this.width * this.height
  };
  I.aspectRatio = function() {
    return this.width / this.height
  };
  I.Sb = function() {
    return !this.Ni()
  };
  I.ceil = function() {
    this.width = Math.ceil(this.width);
    this.height = Math.ceil(this.height);
    return this
  };
  I.floor = function() {
    this.width = Math.floor(this.width);
    this.height = Math.floor(this.height);
    return this
  };
  I.round = function() {
    this.width = Math.round(this.width);
    this.height = Math.round(this.height);
    return this
  };
  I.scale = function(b, c) {
    c = K.Tb(c) ? c : b;
    this.width *= b;
    this.height *= c;
    return this
  };
  K.a.Jh = !1;
  K.a.ve = !1;
  K.a.Sh = K.a.Jh || K.a.ve;
  K.a.vd = function(b) {
    return b ? new K.a.lb(K.a.Qa(b)) : K.a.oj || (K.a.oj = new K.a.lb)
  };
  K.a.Fj = function() {
    return document
  };
  K.a.wd = function(b) {
    return K.a.zd(document, b)
  };
  K.a.zd = function(b, c) {
    return K.L(c) ? b.getElementById(c) : c
  };
  K.a.Nj = function(b) {
    return K.a.lg(document, b)
  };
  K.a.lg = function(b, c) {
    return K.a.zd(b, c)
  };
  K.a.Dh = K.a.wd;
  K.a.getElementsByTagName = function(b, c) {
    return (c || document).getElementsByTagName(String(b))
  };
  K.a.Ad = function(b, c, d) {
    return K.a.qc(document, b, c, d)
  };
  K.a.Ij = function(b, c, d) {
    return K.a.yd(document, b, c, d)
  };
  K.a.Uf = function(b, c) {
    var d = c || document;
    return K.a.ed(d) ? d.querySelectorAll("." + b) : K.a.qc(document, "*", b, c)
  };
  K.a.xd = function(b, c) {
    var d = c || document;
    return (d.getElementsByClassName ? d.getElementsByClassName(b)[0] : K.a.yd(document, "*", b, c)) || null
  };
  K.a.kg = function(b, c) {
    return K.a.xd(b, c)
  };
  K.a.ed = function(b) {
    return !(!b.querySelectorAll || !b.querySelector)
  };
  K.a.qc = function(b, c, d, e) {
    b = e || b;
    var f = c && "*" != c ? String(c).toUpperCase() : "";
    if (K.a.ed(b) && (f || d)) return b.querySelectorAll(f + (d ? "." + d : ""));
    if (d && b.getElementsByClassName) {
      e = b.getElementsByClassName(d);
      if (f) {
        b = {};
        for (var g = c = 0, h; h = e[g]; g++) f == h.nodeName && (b[c++] = h);
        b.length = c;
        return b
      }
      return e
    }
    e = b.getElementsByTagName(f || "*");
    if (d) {
      b = {};
      for (g = c = 0; h = e[g]; g++) f = h.className, typeof f.split == u && K.j.contains(f.split(/\s+/), d) && (b[c++] = h);
      b.length = c;
      return b
    }
    return e
  };
  K.a.yd = function(b, c, d, e) {
    var f = e || b,
      g = c && "*" != c ? String(c).toUpperCase() : "";
    return K.a.ed(f) && (g || d) ? f.querySelector(g + (d ? "." + d : "")) : K.a.qc(b, c, d, e)[0] || null
  };
  K.a.Eh = K.a.Ad;
  K.a.Lc = function(b, c) {
    K.object.forEach(c, function(c, e) {
      c && c.va && (c = c.ha());
      "style" == e ? b.style.cssText = c : "class" == e ? b.className = c : "for" == e ? b.htmlFor = c : K.a.Ee.hasOwnProperty(e) ? b.setAttribute(K.a.Ee[e], c) : K.f.startsWith(e, "aria-") || K.f.startsWith(e, "data-") ? b.setAttribute(e, c) : b[e] = c
    })
  };
  K.a.Ee = {
    cellpadding: "cellPadding",
    cellspacing: "cellSpacing",
    colspan: "colSpan",
    frameborder: "frameBorder",
    height: "height",
    maxlength: "maxLength",
    nonce: "nonce",
    role: "role",
    rowspan: "rowSpan",
    type: "type",
    usemap: "useMap",
    valign: "vAlign",
    width: "width"
  };
  K.a.pg = function(b) {
    return K.a.qg(b || window)
  };
  K.a.qg = function(b) {
    b = b.document;
    b = K.a.Qb(b) ? b.documentElement : b.body;
    return new K.s.ob(b.clientWidth, b.clientHeight)
  };
  K.a.Gj = function() {
    return K.a.td(window)
  };
  K.a.Zq = function(b) {
    return K.a.td(b)
  };
  K.a.td = function(b) {
    var c = b.document,
      d = 0;
    if (c) {
      d = c.body;
      var e = c.documentElement;
      if (!e || !d) return 0;
      b = K.a.qg(b).height;
      if (K.a.Qb(c) && e.scrollHeight) d = e.scrollHeight != b ? e.scrollHeight : e.offsetHeight;
      else {
        c = e.scrollHeight;
        var f = e.offsetHeight;
        e.clientHeight != f && (c = d.scrollHeight, f = d.offsetHeight);
        d = c > b ? c > f ? c : f : c < f ? c : f
      }
    }
    return d
  };
  K.a.fr = function(b) {
    return K.a.vd((b || K.global || window).document).Sf()
  };
  K.a.Sf = function() {
    return K.a.Tf(document)
  };
  K.a.Tf = function(b) {
    var c = K.a.ud(b);
    b = K.a.tc(b);
    return K.userAgent.Y && K.userAgent.wa("10") && b.pageYOffset != c.scrollTop ? new K.s.W(c.scrollLeft, c.scrollTop) : new K.s.W(b.pageXOffset || c.scrollLeft, b.pageYOffset || c.scrollTop)
  };
  K.a.Hj = function() {
    return K.a.ud(document)
  };
  K.a.ud = function(b) {
    return b.scrollingElement ? b.scrollingElement : !K.userAgent.Hb && K.a.Qb(b) ? b.documentElement : b.body || b.documentElement
  };
  K.a.xb = function(b) {
    return b ? K.a.tc(b) : window
  };
  K.a.tc = function(b) {
    return b.parentWindow || b.defaultView
  };
  K.a.hd = function(b, c, d) {
    return K.a.vf(document, arguments)
  };
  K.a.vf = function(b, c) {
    var d = String(c[0]),
      e = c[1];
    if (!K.a.ib.Nh && e && (e.name || e.type)) {
      d = ["<", d];
      e.name && d.push(' name="', K.f.ua(e.name), '"');
      if (e.type) {
        d.push(' type="', K.f.ua(e.type), '"');
        var f = {};
        K.object.extend(f, e);
        delete f.type;
        e = f
      }
      d.push(">");
      d = d.join("")
    }
    d = b.createElement(d);
    e && (K.L(e) ? d.className = e : K.isArray(e) ? d.className = e.join(" ") : K.a.Lc(d, e));
    2 < c.length && K.a.ef(b, d, c, 2);
    return d
  };
  K.a.ef = function(b, c, d, e) {
    function f(d) {
      d && c.appendChild(K.L(d) ? b.createTextNode(d) : d)
    }
    for (; e < d.length; e++) {
      var g = d[e];
      K.Pb(g) && !K.a.Nd(g) ? K.j.forEach(K.a.Od(g) ? K.j.vh(g) : g, f) : f(g)
    }
  };
  K.a.Fh = K.a.hd;
  K.a.createElement = function(b) {
    return K.a.Oa(document, b)
  };
  K.a.Oa = function(b, c) {
    return b.createElement(String(c))
  };
  K.a.createTextNode = function(b) {
    return document.createTextNode(String(b))
  };
  K.a.jj = function(b, c, d) {
    return K.a.wf(document, b, c, !!d)
  };
  K.a.wf = function(b, c, d, e) {
    for (var f = K.a.Oa(b, "TABLE"), g = f.appendChild(K.a.Oa(b, "TBODY")), h = 0; h < c; h++) {
      for (var l = K.a.Oa(b, "TR"), m = 0; m < d; m++) {
        var q = K.a.Oa(b, "TD");
        e && K.a.ce(q, K.f.af.Ne);
        l.appendChild(q)
      }
      g.appendChild(l)
    }
    return f
  };
  K.a.gq = function(b) {
    var c = K.j.map(arguments, K.f.H.u);
    c = K.b.hb.il(K.f.H.from("Constant HTML string, that gets turned into a Node later, so it will be automatically balanced."), c.join(""));
    return K.a.hh(c)
  };
  K.a.hh = function(b) {
    return K.a.ih(document, b)
  };
  K.a.ih = function(b, c) {
    var d = K.a.Oa(b, "DIV");
    K.a.ib.ei ? (K.a.S.oh(d, K.b.l.concat(K.b.l.ze, c)), d.removeChild(d.firstChild)) : K.a.S.oh(d, c);
    return K.a.bj(b, d)
  };
  K.a.bj = function(b, c) {
    if (1 == c.childNodes.length) return c.removeChild(c.firstChild);
    for (b = b.createDocumentFragment(); c.firstChild;) b.appendChild(c.firstChild);
    return b
  };
  K.a.fk = function() {
    return K.a.Qb(document)
  };
  K.a.Qb = function(b) {
    return K.a.Sh ? K.a.ve : "CSS1Compat" == b.compatMode
  };
  K.a.canHaveChildren = function(b) {
    if (b.nodeType != K.a.fa.Ia) return !1;
    switch (b.tagName) {
      case "APPLET":
      case "AREA":
      case "BASE":
      case "BR":
      case "COL":
      case "COMMAND":
      case "EMBED":
      case "FRAME":
      case "HR":
      case "IMG":
      case "INPUT":
      case "IFRAME":
      case "ISINDEX":
      case "KEYGEN":
      case "LINK":
      case "NOFRAMES":
      case "NOSCRIPT":
      case "META":
      case "OBJECT":
      case "PARAM":
      case p:
      case "SOURCE":
      case "STYLE":
      case "TRACK":
      case "WBR":
        return !1
    }
    return !0
  };
  K.a.appendChild = function(b, c) {
    b.appendChild(c)
  };
  K.a.append = function(b, c) {
    K.a.ef(K.a.Qa(b), b, arguments, 1)
  };
  K.a.ae = function(b) {
    for (var c; c = b.firstChild;) b.removeChild(c)
  };
  K.a.yg = function(b, c) {
    c.parentNode && c.parentNode.insertBefore(b, c)
  };
  K.a.xg = function(b, c) {
    c.parentNode && c.parentNode.insertBefore(b, c.nextSibling)
  };
  K.a.wg = function(b, c, d) {
    b.insertBefore(c, b.childNodes[d] || null)
  };
  K.a.removeNode = function(b) {
    return b && b.parentNode ? b.parentNode.removeChild(b) : null
  };
  K.a.gh = function(b, c) {
    var d = c.parentNode;
    d && d.replaceChild(b, c)
  };
  K.a.If = function(b) {
    var c, d = b.parentNode;
    if (d && d.nodeType != K.a.fa.Xh) {
      if (b.removeNode) return b.removeNode(!1);
      for (; c = b.firstChild;) d.insertBefore(c, b);
      return K.a.removeNode(b)
    }
  };
  K.a.Qf = function(b) {
    return K.a.ib.Oh && void 0 != b.children ? b.children : K.j.filter(b.childNodes, function(b) {
      return b.nodeType == K.a.fa.Ia
    })
  };
  K.a.Vf = function(b) {
    return K.P(b.firstElementChild) ? b.firstElementChild : K.a.rc(b.firstChild, !0)
  };
  K.a.Zf = function(b) {
    return K.P(b.lastElementChild) ? b.lastElementChild : K.a.rc(b.lastChild, !1)
  };
  K.a.bg = function(b) {
    return K.P(b.nextElementSibling) ? b.nextElementSibling : K.a.rc(b.nextSibling, !0)
  };
  K.a.ig = function(b) {
    return K.P(b.previousElementSibling) ? b.previousElementSibling : K.a.rc(b.previousSibling, !1)
  };
  K.a.rc = function(b, c) {
    for (; b && b.nodeType != K.a.fa.Ia;) b = c ? b.nextSibling : b.previousSibling;
    return b
  };
  K.a.cg = function(b) {
    if (!b) return null;
    if (b.firstChild) return b.firstChild;
    for (; b && !b.nextSibling;) b = b.parentNode;
    return b ? b.nextSibling : null
  };
  K.a.jg = function(b) {
    if (!b) return null;
    if (!b.previousSibling) return b.parentNode;
    for (b = b.previousSibling; b && b.lastChild;) b = b.lastChild;
    return b
  };
  K.a.Nd = function(b) {
    return K.ia(b) && 0 < b.nodeType
  };
  K.a.Jd = function(b) {
    return K.ia(b) && b.nodeType == K.a.fa.Ia
  };
  K.a.Qg = function(b) {
    return K.ia(b) && b.window == b
  };
  K.a.hg = function(b) {
    var c;
    if (K.a.ib.Ph && !(K.userAgent.Y && K.userAgent.wa("9") && !K.userAgent.wa("10") && K.global.SVGElement && b instanceof K.global.SVGElement) && (c = b.parentElement)) return c;
    c = b.parentNode;
    return K.a.Jd(c) ? c : null
  };
  K.a.contains = function(b, c) {
    if (!b || !c) return !1;
    if (b.contains && c.nodeType == K.a.fa.Ia) return b == c || b.contains(c);
    if ("undefined" != typeof b.compareDocumentPosition) return b == c || !!(b.compareDocumentPosition(c) & 16);
    for (; c && b != c;) c = c.parentNode;
    return c == b
  };
  K.a.qf = function(b, c) {
    if (b == c) return 0;
    if (b.compareDocumentPosition) return b.compareDocumentPosition(c) & 2 ? 1 : -1;
    if (K.userAgent.Y && !K.userAgent.Rb(9)) {
      if (b.nodeType == K.a.fa.Zc) return -1;
      if (c.nodeType == K.a.fa.Zc) return 1
    }
    if ("sourceIndex" in b || b.parentNode && "sourceIndex" in b.parentNode) {
      var d = b.nodeType == K.a.fa.Ia,
        e = c.nodeType == K.a.fa.Ia;
      if (d && e) return b.sourceIndex - c.sourceIndex;
      var f = b.parentNode,
        g = c.parentNode;
      return f == g ? K.a.sf(b, c) : !d && K.a.contains(f, c) ? -1 * K.a.rf(b, c) : !e && K.a.contains(g, b) ? K.a.rf(c,
        b) : (d ? b.sourceIndex : f.sourceIndex) - (e ? c.sourceIndex : g.sourceIndex)
    }
    e = K.a.Qa(b);
    d = e.createRange();
    d.selectNode(b);
    d.collapse(!0);
    b = e.createRange();
    b.selectNode(c);
    b.collapse(!0);
    return d.compareBoundaryPoints(K.global.Range.START_TO_END, b)
  };
  K.a.rf = function(b, c) {
    var d = b.parentNode;
    if (d == c) return -1;
    for (; c.parentNode != d;) c = c.parentNode;
    return K.a.sf(c, b)
  };
  K.a.sf = function(b, c) {
    for (; c = c.previousSibling;)
      if (c == b) return -1;
    return 1
  };
  K.a.Ef = function(b) {
    var c, d = arguments.length;
    if (!d) return null;
    if (1 == d) return arguments[0];
    var e = [],
      f = Infinity;
    for (c = 0; c < d; c++) {
      for (var g = [], h = arguments[c]; h;) g.unshift(h), h = h.parentNode;
      e.push(g);
      f = Math.min(f, g.length)
    }
    g = null;
    for (c = 0; c < f; c++) {
      h = e[0][c];
      for (var l = 1; l < d; l++)
        if (h != e[l][c]) return g;
      g = h
    }
    return g
  };
  K.a.Qa = function(b) {
    return b.nodeType == K.a.fa.Zc ? b : b.ownerDocument || b.document
  };
  K.a.Wf = function(b) {
    return b.contentDocument || b.contentWindow.document
  };
  K.a.Xf = function(b) {
    try {
      return b.contentWindow || (b.contentDocument ? K.a.xb(b.contentDocument) : null)
    } catch (c) {}
    return null
  };
  K.a.ce = function(b, c) {
    if ("textContent" in b) b.textContent = c;
    else if (b.nodeType == K.a.fa.fc) b.data = String(c);
    else if (b.firstChild && b.firstChild.nodeType == K.a.fa.fc) {
      for (; b.lastChild != b.firstChild;) b.removeChild(b.lastChild);
      b.firstChild.data = String(c)
    } else {
      K.a.ae(b);
      var d = K.a.Qa(b);
      b.appendChild(d.createTextNode(String(c)))
    }
  };
  K.a.gg = function(b) {
    if ("outerHTML" in b) return b.outerHTML;
    var c = K.a.Qa(b);
    c = K.a.Oa(c, "DIV");
    c.appendChild(b.cloneNode(!0));
    return c.innerHTML
  };
  K.a.Ff = function(b, c) {
    var d = [];
    return K.a.pd(b, c, d, !0) ? d[0] : void 0
  };
  K.a.Gf = function(b, c) {
    var d = [];
    K.a.pd(b, c, d, !1);
    return d
  };
  K.a.pd = function(b, c, d, e) {
    if (null != b)
      for (b = b.firstChild; b;) {
        if (c(b) && (d.push(b), e) || K.a.pd(b, c, d, e)) return !0;
        b = b.nextSibling
      }
    return !1
  };
  K.a.Xe = {
    SCRIPT: 1,
    STYLE: 1,
    HEAD: 1,
    IFRAME: 1,
    OBJECT: 1
  };
  K.a.dc = {
    IMG: " ",
    BR: "\n"
  };
  K.a.Ld = function(b) {
    return K.a.sg(b) && K.a.Og(b)
  };
  K.a.mh = function(b, c) {
    c ? b.tabIndex = 0 : (b.tabIndex = -1, b.removeAttribute("tabIndex"))
  };
  K.a.Fg = function(b) {
    var c;
    return (c = K.a.Tk(b) ? !b.disabled && (!K.a.sg(b) || K.a.Og(b)) : K.a.Ld(b)) && K.userAgent.Y ? K.a.Yj(b) : c
  };
  K.a.sg = function(b) {
    return K.userAgent.Y && !K.userAgent.wa("9") ? (b = b.getAttributeNode("tabindex"), K.eb(b) && b.specified) : b.hasAttribute("tabindex")
  };
  K.a.Og = function(b) {
    b = b.tabIndex;
    return K.Tb(b) && 0 <= b && 32768 > b
  };
  K.a.Tk = function(b) {
    return "A" == b.tagName || "INPUT" == b.tagName || "TEXTAREA" == b.tagName || "SELECT" == b.tagName || "BUTTON" == b.tagName
  };
  K.a.Yj = function(b) {
    b = !K.za(b.getBoundingClientRect) || K.userAgent.Y && null == b.parentElement ? {
      height: b.offsetHeight,
      width: b.offsetWidth
    } : b.getBoundingClientRect();
    return K.eb(b) && 0 < b.height && 0 < b.width
  };
  K.a.sc = function(b) {
    if (K.a.ib.Ae && null !== b && "innerText" in b) b = K.f.$i(b.innerText);
    else {
      var c = [];
      K.a.Cd(b, c, !0);
      b = c.join("")
    }
    b = b.replace(/ \xAD /g, " ").replace(/\xAD/g, "");
    b = b.replace(/\u200B/g, "");
    K.a.ib.Ae || (b = b.replace(/ +/g, " "));
    " " != b && (b = b.replace(/^\s*/, ""));
    return b
  };
  K.a.jr = function(b) {
    var c = [];
    K.a.Cd(b, c, !1);
    return c.join("")
  };
  K.a.Cd = function(b, c, d) {
    if (!(b.nodeName in K.a.Xe))
      if (b.nodeType == K.a.fa.fc) d ? c.push(String(b.nodeValue).replace(/(\r\n|\r|\n)/g, "")) : c.push(b.nodeValue);
      else if (b.nodeName in K.a.dc) c.push(K.a.dc[b.nodeName]);
    else
      for (b = b.firstChild; b;) K.a.Cd(b, c, d), b = b.nextSibling
  };
  K.a.eg = function(b) {
    return K.a.sc(b).length
  };
  K.a.fg = function(b, c) {
    c = c || K.a.Qa(b).body;
    for (var d = []; b && b != c;) {
      for (var e = b; e = e.previousSibling;) d.unshift(K.a.sc(e));
      b = b.parentNode
    }
    return K.f.trimLeft(d.join("")).replace(/ +/g, " ").length
  };
  K.a.dg = function(b, c, d) {
    b = [b];
    for (var e = 0, f = null; 0 < b.length && e < c;)
      if (f = b.pop(), !(f.nodeName in K.a.Xe))
        if (f.nodeType == K.a.fa.fc) {
          var g = f.nodeValue.replace(/(\r\n|\r|\n)/g, "").replace(/ +/g, " ");
          e += g.length
        } else if (f.nodeName in K.a.dc) e += K.a.dc[f.nodeName].length;
    else
      for (g = f.childNodes.length - 1; 0 <= g; g--) b.push(f.childNodes[g]);
    K.ia(d) && (d.Ks = f ? f.nodeValue.length + c - e - 1 : 0, d.node = f);
    return f
  };
  K.a.Od = function(b) {
    if (b && typeof b.length == x) {
      if (K.ia(b)) return typeof b.item == u || typeof b.item == B;
      if (K.za(b)) return typeof b.item == u
    }
    return !1
  };
  K.a.sd = function(b, c, d, e) {
    if (!c && !d) return null;
    var f = c ? String(c).toUpperCase() : null;
    return K.a.rd(b, function(b) {
      return (!f || b.nodeName == f) && (!d || K.L(b.className) && K.j.contains(b.className.split(/\s+/), d))
    }, !0, e)
  };
  K.a.Nf = function(b, c, d) {
    return K.a.sd(b, null, c, d)
  };
  K.a.rd = function(b, c, d, e) {
    b && !d && (b = b.parentNode);
    for (d = 0; b && (null == e || d <= e);) {
      if (c(b)) return b;
      b = b.parentNode;
      d++
    }
    return null
  };
  K.a.Mf = function(b) {
    try {
      return b && b.activeElement
    } catch (c) {}
    return null
  };
  K.a.gr = function() {
    var b = K.a.xb();
    return K.P(b.devicePixelRatio) ? b.devicePixelRatio : b.matchMedia ? K.a.zc(3) || K.a.zc(2) || K.a.zc(1.5) || K.a.zc(1) || .75 : 1
  };
  K.a.zc = function(b) {
    return K.a.xb().matchMedia("(min-resolution: " + b + "dppx),(min--moz-device-pixel-ratio: " + b + "),(min-resolution: " + 96 * b + "dpi)").matches ? b : 0
  };
  K.a.Pf = function(b) {
    return b.getContext("2d")
  };
  K.a.lb = function(b) {
    this.X = b || K.global.document || document
  };
  I = K.a.lb.prototype;
  I.vd = K.a.vd;
  I.Fj = G("X");
  I.wd = function(b) {
    return K.a.zd(this.X, b)
  };
  I.Nj = function(b) {
    return K.a.lg(this.X, b)
  };
  I.Dh = K.a.lb.prototype.wd;
  I.getElementsByTagName = function(b, c) {
    return (c || this.X).getElementsByTagName(String(b))
  };
  I.Ad = function(b, c, d) {
    return K.a.qc(this.X, b, c, d)
  };
  I.Ij = function(b, c, d) {
    return K.a.yd(this.X, b, c, d)
  };
  I.Uf = function(b, c) {
    return K.a.Uf(b, c || this.X)
  };
  I.xd = function(b, c) {
    return K.a.xd(b, c || this.X)
  };
  I.kg = function(b, c) {
    return K.a.kg(b, c || this.X)
  };
  I.Eh = K.a.lb.prototype.Ad;
  I.Lc = K.a.Lc;
  I.pg = function(b) {
    return K.a.pg(b || this.xb())
  };
  I.Gj = function() {
    return K.a.td(this.xb())
  };
  I.hd = function(b, c, d) {
    return K.a.vf(this.X, arguments)
  };
  I.Fh = K.a.lb.prototype.hd;
  I.createElement = function(b) {
    return K.a.Oa(this.X, b)
  };
  I.createTextNode = function(b) {
    return this.X.createTextNode(String(b))
  };
  I.jj = function(b, c, d) {
    return K.a.wf(this.X, b, c, !!d)
  };
  I.hh = function(b) {
    return K.a.ih(this.X, b)
  };
  I.fk = function() {
    return K.a.Qb(this.X)
  };
  I.xb = function() {
    return K.a.tc(this.X)
  };
  I.Hj = function() {
    return K.a.ud(this.X)
  };
  I.Sf = function() {
    return K.a.Tf(this.X)
  };
  I.Mf = function(b) {
    return K.a.Mf(b || this.X)
  };
  I.appendChild = K.a.appendChild;
  I.append = K.a.append;
  I.canHaveChildren = K.a.canHaveChildren;
  I.ae = K.a.ae;
  I.yg = K.a.yg;
  I.xg = K.a.xg;
  I.wg = K.a.wg;
  I.removeNode = K.a.removeNode;
  I.gh = K.a.gh;
  I.If = K.a.If;
  I.Qf = K.a.Qf;
  I.Vf = K.a.Vf;
  I.Zf = K.a.Zf;
  I.bg = K.a.bg;
  I.ig = K.a.ig;
  I.cg = K.a.cg;
  I.jg = K.a.jg;
  I.Nd = K.a.Nd;
  I.Jd = K.a.Jd;
  I.Qg = K.a.Qg;
  I.hg = K.a.hg;
  I.contains = K.a.contains;
  I.qf = K.a.qf;
  I.Ef = K.a.Ef;
  I.Qa = K.a.Qa;
  I.Wf = K.a.Wf;
  I.Xf = K.a.Xf;
  I.ce = K.a.ce;
  I.gg = K.a.gg;
  I.Ff = K.a.Ff;
  I.Gf = K.a.Gf;
  I.Ld = K.a.Ld;
  I.mh = K.a.mh;
  I.Fg = K.a.Fg;
  I.sc = K.a.sc;
  I.eg = K.a.eg;
  I.fg = K.a.fg;
  I.dg = K.a.dg;
  I.Od = K.a.Od;
  I.sd = K.a.sd;
  I.Nf = K.a.Nf;
  I.rd = K.a.rd;
  I.Pf = K.a.Pf;
  K.b.ga = {};
  K.b.ga.Ys = function(b) {
    K.b.ga.Db();
    return K.b.l.pa(b, null)
  };
  K.b.ga.$s = function(b) {
    K.b.ga.Db();
    return K.b.F.qb(b)
  };
  K.b.ga.bt = function(b) {
    K.b.ga.Db();
    return K.b.M.rb(b)
  };
  K.b.ga.dt = function(b) {
    K.b.ga.Db();
    return K.b.o.ya(b)
  };
  K.b.ga.ke = function(b) {
    K.b.ga.Db();
    return K.b.C.sb(b)
  };
  K.b.ga.Db = K.Sa;
  K.b.ga.ut = function(b) {
    K.b.ga.Db = b
  };
  K.fh = {};
  K.fh.wo = F();
  K.Thenable = F();
  K.Thenable.prototype.then = F();
  K.Thenable.Ke = "$goog_Thenable";
  K.Thenable.df = function(b) {
    b.prototype.then = b.prototype.then;
    b.prototype[K.Thenable.Ke] = !0
  };
  K.Thenable.Gg = function(b) {
    if (!b) return !1;
    try {
      return !!b[K.Thenable.Ke]
    } catch (c) {
      return !1
    }
  };
  K.Promise = function(b, c) {
    this.$ = K.Promise.R.xa;
    this.ja = void 0;
    this.pb = this.Na = this.da = null;
    this.nd = !1;
    0 < K.Promise.Xa ? this.Qc = 0 : 0 == K.Promise.Xa && (this.uc = !1);
    K.Promise.Ba && (this.ge = [], N(this, Error("created")), this.yf = 0);
    if (b != K.Sa) try {
      var d = this;
      b.call(c, function(b) {
        O(d, K.Promise.R.Ja, b)
      }, function(b) {
        if (K.ea && !(b instanceof K.Promise.kb)) try {
          if (b instanceof Error) throw b;
          throw Error("Promise rejected.");
        } catch (f) {}
        O(d, K.Promise.R.ka, b)
      })
    } catch (e) {
      O(this, K.Promise.R.ka, e)
    }
  };
  K.Promise.Ba = !1;
  K.Promise.Xa = 0;
  K.Promise.R = {
    xa: 0,
    Lh: 1,
    Ja: 2,
    ka: 3
  };
  K.Promise.Ce = function() {
    this.next = this.context = this.Ab = this.Vb = this.Ya = null;
    this.gc = !1
  };
  K.Promise.Ce.prototype.reset = function() {
    this.context = this.Ab = this.Vb = this.Ya = null;
    this.gc = !1
  };
  K.Promise.Xc = 100;
  K.Promise.Mb = new K.async.bc(function() {
    return new K.Promise.Ce
  }, function(b) {
    b.reset()
  }, K.Promise.Xc);
  K.Promise.Of = function(b, c, d) {
    var e = K.Promise.Mb.get();
    e.Vb = b;
    e.Ab = c;
    e.context = d;
    return e
  };
  K.Promise.al = function(b) {
    K.Promise.Mb.put(b)
  };
  K.Promise.resolve = function(b) {
    if (b instanceof K.Promise) return b;
    var c = new K.Promise(K.Sa);
    O(c, K.Promise.R.Ja, b);
    return c
  };
  K.Promise.reject = function(b) {
    return new K.Promise(function(c, d) {
      d(b)
    })
  };
  K.Promise.Hc = function(b, c, d) {
    K.Promise.Xg(b, c, d, null) || K.async.N(K.fb(c, b))
  };
  K.Promise.race = function(b) {
    return new K.Promise(function(c, d) {
      b.length || c(void 0);
      for (var e = 0, f; e < b.length; e++) f = b[e], K.Promise.Hc(f, c, d)
    })
  };
  K.Promise.all = function(b) {
    return new K.Promise(function(c, d) {
      var e = b.length,
        f = [];
      if (e)
        for (var g = function(b, d) {
            e--;
            f[b] = d;
            0 == e && c(f)
          }, h = function(b) {
            d(b)
          }, l = 0, m; l < b.length; l++) m = b[l], K.Promise.Hc(m, K.fb(g, l), h);
      else c(f)
    })
  };
  K.Promise.mp = function(b) {
    return new K.Promise(function(c) {
      var d = b.length,
        e = [];
      if (d)
        for (var f = function(b, f, g) {
            d--;
            e[b] = f ? {
              Dj: !0,
              value: g
            } : {
              Dj: !1,
              reason: g
            };
            0 == d && c(e)
          }, g = 0, h; g < b.length; g++) h = b[g], K.Promise.Hc(h, K.fb(f, g, !0), K.fb(f, g, !1));
      else c(e)
    })
  };
  K.Promise.Kq = function(b) {
    return new K.Promise(function(c, d) {
      var e = b.length,
        f = [];
      if (e)
        for (var g = function(b) {
            c(b)
          }, h = function(b, c) {
            e--;
            f[b] = c;
            0 == e && d(f)
          }, l = 0, m; l < b.length; l++) m = b[l], K.Promise.Hc(m, g, K.fb(h, l));
      else c(void 0)
    })
  };
  K.Promise.bu = function() {
    var b, c, d = new K.Promise(function(d, f) {
      b = d;
      c = f
    });
    return new K.Promise.ni(d, b, c)
  };
  K.Promise.prototype.then = function(b, c, d) {
    K.Promise.Ba && N(this, Error("then"));
    return ba(this, K.za(b) ? b : null, K.za(c) ? c : null, d)
  };
  K.Thenable.df(K.Promise);
  K.Promise.prototype.cancel = function(b) {
    this.$ == K.Promise.R.xa && K.async.N(function() {
      var c = new K.Promise.kb(b);
      P(this, c)
    }, this)
  };

  function P(b, c) {
    if (b.$ == K.Promise.R.xa)
      if (b.da) {
        var d = b.da;
        if (d.Na) {
          for (var e = 0, f = null, g = null, h = d.Na; h && (h.gc || (e++, h.Ya == b && (f = h), !(f && 1 < e))); h = h.next) f || (g = h);
          f && (d.$ == K.Promise.R.xa && 1 == e ? P(d, c) : (g ? (e = g, e.next == d.pb && (d.pb = e), e.next = e.next.next) : Q(d), R(d, f, K.Promise.R.ka, c)))
        }
        b.da = null
      } else O(b, K.Promise.R.ka, c)
  }

  function S(b, c) {
    b.Na || b.$ != K.Promise.R.Ja && b.$ != K.Promise.R.ka || T(b);
    b.pb ? b.pb.next = c : b.Na = c;
    b.pb = c
  }

  function ba(b, c, d, e) {
    var f = K.Promise.Of(null, null, null);
    f.Ya = new K.Promise(function(b, h) {
      f.Vb = c ? function(d) {
        try {
          var f = c.call(e, d);
          b(f)
        } catch (q) {
          h(q)
        }
      } : b;
      f.Ab = d ? function(c) {
        try {
          var f = d.call(e, c);
          !K.P(f) && c instanceof K.Promise.kb ? h(c) : b(f)
        } catch (q) {
          h(q)
        }
      } : h
    });
    f.Ya.da = b;
    S(b, f);
    return f.Ya
  }
  K.Promise.prototype.Gl = function(b) {
    this.$ = K.Promise.R.xa;
    O(this, K.Promise.R.Ja, b)
  };
  K.Promise.prototype.Hl = function(b) {
    this.$ = K.Promise.R.xa;
    O(this, K.Promise.R.ka, b)
  };

  function O(b, c, d) {
    b.$ == K.Promise.R.xa && (b === d && (c = K.Promise.R.ka, d = new TypeError("Promise cannot resolve to itself")), b.$ = K.Promise.R.Lh, K.Promise.Xg(d, b.Gl, b.Hl, b) || (b.ja = d, b.$ = c, b.da = null, T(b), c != K.Promise.R.ka || d instanceof K.Promise.kb || K.Promise.Ki(b, d)))
  }
  K.Promise.Xg = function(b, c, d, e) {
    if (b instanceof K.Promise) return K.Promise.Ba && N(b, Error("then")), S(b, K.Promise.Of(c || K.Sa, d || null, e)), !0;
    if (K.Thenable.Gg(b)) return b.then(c, d, e), !0;
    if (K.ia(b)) try {
      var f = b.then;
      if (K.za(f)) return K.Promise.El(b, f, c, d, e), !0
    } catch (g) {
      return d.call(e, g), !0
    }
    return !1
  };
  K.Promise.El = function(b, c, d, e, f) {
    function g(b) {
      l || (l = !0, e.call(f, b))
    }

    function h(b) {
      l || (l = !0, d.call(f, b))
    }
    var l = !1;
    try {
      c.call(b, h, g)
    } catch (m) {
      g(m)
    }
  };

  function T(b) {
    b.nd || (b.nd = !0, K.async.N(b.xj, b))
  }

  function Q(b) {
    var c = null;
    b.Na && (c = b.Na, b.Na = c.next, c.next = null);
    b.Na || (b.pb = null);
    return c
  }
  K.Promise.prototype.xj = function() {
    for (var b; b = Q(this);) K.Promise.Ba && this.yf++, R(this, b, this.$, this.ja);
    this.nd = !1
  };

  function R(b, c, d, e) {
    if (d == K.Promise.R.ka && c.Ab && !c.gc)
      if (0 < K.Promise.Xa)
        for (; b && b.Qc; b = b.da) K.global.clearTimeout(b.Qc), b.Qc = 0;
      else if (0 == K.Promise.Xa)
      for (; b && b.uc; b = b.da) b.uc = !1;
    if (c.Ya) c.Ya.da = null, K.Promise.Ag(c, d, e);
    else try {
      c.gc ? c.Vb.call(c.context) : K.Promise.Ag(c, d, e)
    } catch (f) {
      K.Promise.vc.call(null, f)
    }
    K.Promise.al(c)
  }
  K.Promise.Ag = function(b, c, d) {
    c == K.Promise.R.Ja ? b.Vb.call(b.context, d) : b.Ab && b.Ab.call(b.context, d)
  };

  function N(b, c) {
    if (K.Promise.Ba && K.L(c.stack)) {
      var d = c.stack.split("\n", 4)[3];
      c = c.message;
      c += Array(11 - c.length).join(" ");
      b.ge.push(c + d)
    }
  }

  function U(b, c) {
    if (K.Promise.Ba && c && K.L(c.stack) && b.ge.length) {
      for (var d = ["Promise trace:"], e = b; e; e = e.da) {
        for (var f = b.yf; 0 <= f; f--) d.push(e.ge[f]);
        d.push("Value: [" + (e.$ == K.Promise.R.ka ? "REJECTED" : "FULFILLED") + "] <" + String(e.ja) + ">")
      }
      c.stack += "\n\n" + d.join("\n")
    }
  }
  K.Promise.Ki = function(b, c) {
    0 < K.Promise.Xa ? b.Qc = K.global.setTimeout(function() {
      U(b, c);
      K.Promise.vc.call(null, c)
    }, K.Promise.Xa) : 0 == K.Promise.Xa && (b.uc = !0, K.async.N(function() {
      b.uc && (U(b, c), K.Promise.vc.call(null, c))
    }))
  };
  K.Promise.vc = K.async.th;
  K.Promise.yt = function(b) {
    K.Promise.vc = b
  };
  K.Promise.kb = function(b) {
    K.debug.Error.call(this, b)
  };
  K.bb(K.Promise.kb, K.debug.Error);
  K.Promise.kb.prototype.name = "cancel";
  K.Promise.ni = function(b, c, d) {
    this.fh = b;
    this.resolve = c;
    this.reject = d
  };
  /*
   Portions of this code are from MochiKit, received by
   The Closure Authors under the MIT license. All other code is Copyright
   2005-2009 The Closure Authors. All Rights Reserved.
  */
  K.async.w = function(b, c) {
    this.Kc = [];
    this.eh = b;
    this.zf = c || null;
    this.yb = this.ub = !1;
    this.ja = void 0;
    this.de = this.Vi = this.dd = !1;
    this.Pc = 0;
    this.da = null;
    this.hc = 0;
    K.async.w.Ba && (this.gd = null, Error.captureStackTrace && (b = {
      stack: ""
    }, Error.captureStackTrace(b, K.async.w), typeof b.stack == B && (this.gd = b.stack.replace(/^[^\n]*\n/, ""))))
  };
  K.async.w.xi = !1;
  K.async.w.Ba = !1;
  I = K.async.w.prototype;
  I.cancel = function(b) {
    if (this.ub) this.ja instanceof K.async.w && this.ja.cancel();
    else {
      if (this.da) {
        var c = this.da;
        delete this.da;
        b ? c.cancel(b) : (c.hc--, 0 >= c.hc && c.cancel())
      }
      this.eh ? this.eh.call(this.zf, this) : this.de = !0;
      this.ub || this.$a(new K.async.w.jb(this))
    }
  };
  I.uf = function(b, c) {
    this.dd = !1;
    V(this, b, c)
  };

  function V(b, c, d) {
    b.ub = !0;
    b.ja = d;
    b.yb = !c;
    W(b)
  }

  function X(b) {
    if (b.ub) {
      if (!b.de) throw new K.async.w.Zb(b);
      b.de = !1
    }
  }
  I.Ib = function(b) {
    X(this);
    V(this, !0, b)
  };
  I.$a = function(b) {
    X(this);
    da(this, b);
    V(this, !1, b)
  };

  function da(b, c) {
    K.async.w.Ba && b.gd && K.ia(c) && c.stack && /^[^\n]+(\n   [^\n]+)+/.test(c.stack) && (c.stack = c.stack + "\nDEFERRED OPERATION:\n" + b.gd)
  }

  function Y(b, c, d) {
    return Z(b, c, null, d)
  }

  function ea(b, c) {
    Z(b, null, c, void 0)
  }

  function Z(b, c, d, e) {
    b.Kc.push([c, d, e]);
    b.ub && W(b);
    return b
  }
  I.then = function(b, c, d) {
    var e, f, g = new K.Promise(function(b, c) {
      e = b;
      f = c
    });
    Z(this, e, function(b) {
      b instanceof K.async.w.jb ? g.cancel() : f(b)
    });
    return g.then(b, c, d)
  };
  K.Thenable.df(K.async.w);
  K.async.w.prototype.Xi = function() {
    var b = new K.async.w;
    Z(this, b.Ib, b.$a, b);
    b.da = this;
    this.hc++;
    return b
  };

  function fa(b) {
    return K.j.some(b.Kc, function(b) {
      return K.za(b[1])
    })
  }

  function W(b) {
    b.Pc && b.ub && fa(b) && (K.async.w.Ll(b.Pc), b.Pc = 0);
    b.da && (b.da.hc--, delete b.da);
    for (var c = b.ja, d = !1, e = !1; b.Kc.length && !b.dd;) {
      var f = b.Kc.shift(),
        g = f[0],
        h = f[1];
      f = f[2];
      if (g = b.yb ? h : g) try {
        var l = g.call(f || b.zf, c);
        K.P(l) && (b.yb = b.yb && (l == c || l instanceof Error), b.ja = c = l);
        if (K.Thenable.Gg(c) || typeof K.global.Promise === u && c instanceof K.global.Promise) e = !0, b.dd = !0
      } catch (m) {
        c = m, b.yb = !0, da(b, c), fa(b) || (d = !0)
      }
    }
    b.ja = c;
    e ? (e = K.bind(b.uf, b, !0), l = K.bind(b.uf, b, !1), c instanceof K.async.w ? (Z(c, e, l), c.Vi = !0) : c.then(e, l)) : K.async.w.xi && c instanceof Error && !(c instanceof K.async.w.jb) && (d = b.yb = !0);
    d && (b.Pc = K.async.w.ml(c))
  }
  K.async.w.rh = function(b) {
    var c = new K.async.w;
    c.Ib(b);
    return c
  };
  K.async.w.Rq = function(b) {
    var c = new K.async.w;
    c.Ib();
    Y(c, function() {
      return b
    });
    return c
  };
  K.async.w.ma = function(b) {
    var c = new K.async.w;
    c.$a(b);
    return c
  };
  K.async.w.Sp = function() {
    var b = new K.async.w;
    b.cancel();
    return b
  };
  K.async.w.au = function(b, c, d) {
    return b instanceof K.async.w ? Y(b.Xi(), c, d) : Y(K.async.w.rh(b), c, d)
  };
  K.async.w.Zb = function(b) {
    K.debug.Error.call(this);
    this.tb = b
  };
  K.bb(K.async.w.Zb, K.debug.Error);
  K.async.w.Zb.prototype.message = "Deferred has already fired";
  K.async.w.Zb.prototype.name = "AlreadyCalledError";
  K.async.w.jb = function(b) {
    K.debug.Error.call(this);
    this.tb = b
  };
  K.bb(K.async.w.jb, K.debug.Error);
  K.async.w.jb.prototype.message = "Deferred was canceled";
  K.async.w.jb.prototype.name = "CanceledError";
  K.async.w.Ie = function(b) {
    this.Ob = K.global.setTimeout(K.bind(this.sh, this), 0);
    this.vj = b
  };
  K.async.w.Ie.prototype.sh = function() {
    delete K.async.w.Lb[this.Ob];
    throw this.vj;
  };
  K.async.w.Lb = {};
  K.async.w.ml = function(b) {
    b = new K.async.w.Ie(b);
    K.async.w.Lb[b.Ob] = b;
    return b.Ob
  };
  K.async.w.Ll = function(b) {
    var c = K.async.w.Lb[b];
    c && (K.global.clearTimeout(c.Ob), delete K.async.w.Lb[b])
  };
  K.async.w.Fp = function() {
    var b = K.async.w.Lb,
      c;
    for (c in b) {
      var d = b[c];
      K.global.clearTimeout(d.Ob);
      d.sh()
    }
  };
  K.B = {};
  K.B.D = {};
  K.B.D.ad = "closure_verification";
  K.B.D.Vh = 5E3;
  K.B.D.be = [];
  K.B.D.Bk = function(b, c) {
    b = K.j.map(b, K.b.ga.ke);
    return K.B.D.jh(b, c)
  };
  K.B.D.jh = function(b, c) {
    function d() {
      var e = b.shift();
      e = K.B.D.Xb(e, c);
      b.length && Z(e, d, d, void 0);
      return e
    }
    if (!b.length) return K.async.w.rh(null);
    var e = K.B.D.be.length;
    K.j.extend(K.B.D.be, b);
    if (e) return K.B.D.kh;
    b = K.B.D.be;
    K.B.D.kh = d();
    return K.B.D.kh
  };
  K.B.D.load = function(b, c) {
    b = K.b.ga.ke(b);
    return K.B.D.Xb(b, c)
  };
  K.B.D.Xb = function(b, c) {
    var d = c || {};
    c = d.document || document;
    var e = K.b.C.u(b),
      f = K.a.createElement(p),
      g = {
        lh: f,
        uh: void 0
      },
      h = new K.async.w(K.B.D.Zi, g),
      l = null,
      m = K.eb(d.timeout) ? d.timeout : K.B.D.Vh;
    0 < m && (l = window.setTimeout(function() {
      K.B.D.jc(f, !0);
      h.$a(new K.B.D.Error(K.B.D.ac.TIMEOUT, "Timeout reached for loading script " + e))
    }, m), g.uh = l);
    f.onload = f.onreadystatechange = function() {
      f.readyState && "loaded" != f.readyState && f.readyState != t || (K.B.D.jc(f, d.Zp || !1, l), h.Ib(null))
    };
    f.onerror = function() {
      K.B.D.jc(f, !0,
        l);
      h.$a(new K.B.D.Error(K.B.D.ac.gi, "Error while loading script " + e))
    };
    g = d.attributes || {};
    K.object.extend(g, {
      type: C,
      charset: "UTF-8"
    });
    K.a.Lc(f, g);
    K.a.S.ql(f, b);
    K.B.D.Oj(c).appendChild(f);
    return h
  };
  K.B.D.es = function(b, c, d) {
    b = K.b.ga.ke(b);
    return K.B.D.jl(b, c, d)
  };
  K.B.D.jl = function(b, c, d) {
    K.global[K.B.D.ad] || (K.global[K.B.D.ad] = {});
    var e = K.global[K.B.D.ad],
      f = K.b.C.u(b);
    if (K.P(e[c])) return K.async.w.ma(new K.B.D.Error(K.B.D.ac.Ii, "Verification object " + c + " already defined."));
    b = K.B.D.Xb(b, d);
    var g = new K.async.w(K.bind(b.cancel, b));
    Y(b, function() {
      var b = e[c];
      K.P(b) ? (g.Ib(b), delete e[c]) : g.$a(new K.B.D.Error(K.B.D.ac.Hi, "Script " + f + " loaded, but verification object " + c + " was not defined."))
    });
    ea(b, function(b) {
      K.P(e[c]) && delete e[c];
      g.$a(b)
    });
    return g
  };
  K.B.D.Oj = function(b) {
    var c = K.a.getElementsByTagName("HEAD", b);
    return !c || K.j.Sb(c) ? b.documentElement : c[0]
  };
  K.B.D.Zi = function() {
    if (this && this.lh) {
      var b = this.lh;
      b && b.tagName == p && K.B.D.jc(b, !0, this.uh)
    }
  };
  K.B.D.jc = function(b, c, d) {
    K.eb(d) && K.global.clearTimeout(d);
    b.onload = K.Sa;
    b.onerror = K.Sa;
    b.onreadystatechange = K.Sa;
    c && window.setTimeout(function() {
      K.a.removeNode(b)
    }, 0)
  };
  K.B.D.ac = {
    gi: 0,
    TIMEOUT: 1,
    Hi: 2,
    Ii: 3
  };
  K.B.D.Error = function(b, c) {
    var d = "Jsloader error (code #" + b + ")";
    c && (d += ": " + c);
    K.debug.Error.call(this, d);
    this.code = b
  };
  K.bb(K.B.D.Error, K.debug.Error);
  var google = {
    G: {}
  };
  google.G.K = {};
  google.G.K.nb = {};
  google.G.K.nb.ls = function(b, c) {
    return {
      format: b,
      Oi: c
    }
  };
  google.G.K.nb.Rj = function(b) {
    return K.b.C.format(b.format, b.Oi)
  };
  google.G.K.nb.load = function(b, c) {
    b = K.b.C.format(b, c);
    var d = K.B.D.Xb(b, {
      attributes: {
        async: !1,
        defer: !1
      }
    });
    return new Promise(function(b) {
      Y(d, b)
    })
  };
  google.G.K.nb.Bk = function(b) {
    b = K.j.map(b, google.G.K.nb.Rj);
    if (K.j.Sb(b)) return Promise.resolve();
    var c = {
        attributes: {
          async: !1,
          defer: !1
        }
      },
      d;
    !K.userAgent.Y || K.userAgent.wa(11) ? K.j.forEach(b, function(b) {
      d = K.B.D.Xb(b, c)
    }) : d = K.B.D.jh(b, c);
    return new Promise(function(b) {
      Y(d, b)
    })
  };
  google.G.K.T = {};
  if (K.vb(v)) throw Error("Google Charts loader.js can only be loaded once.");
  google.G.K.T.Ql = {
    41: z,
    42: z,
    43: z,
    44: z,
    1: "1.0",
    "1.0": "current",
    "1.1": "upcoming",
    current: "45.2",
    upcoming: "45.2"
  };
  google.G.K.T.Nk = function(b) {
    var c, d = b,
      e = b.match(/^testing-/);
    e && (d = d.replace(/^testing-/, ""));
    b = d;
    do(c = google.G.K.T.Ql[d]) && (d = c); while (c);
    c = (e ? "testing-" : "") + d;
    return {
      version: d == z ? b : c,
      Gk: c
    }
  };
  google.G.K.T.Ah = null;
  google.G.K.T.Ek = function(b) {
    var c = google.G.K.T.Nk(b),
      d = K.f.H.from("https://www.gstatic.com/charts/%{version}/loader.js");
    return google.G.K.nb.load(d, {
      version: c.Gk
    }).then(function() {
      var d = K.vb("google.charts.loader.VersionSpecific.load") || K.vb("google.charts.loader.publicLoad") || K.vb("google.charts.versionSpecific.load");
      if (!d) throw Error("Bad version: " + b);
      google.G.K.T.Ah = function(b) {
        b = d(c.version, b);
        if (null == b || null == b.then) {
          var e = K.vb("google.charts.loader.publicSetOnLoadCallback") || K.vb("google.charts.versionSpecific.setOnLoadCallback");
          b = new Promise(function(b) {
            e(b)
          });
          b.then = e
        }
        return b
      }
    })
  };
  google.G.K.T.Rd = null;
  google.G.K.T.mc = null;
  google.G.K.T.Ak = function(b, c) {
    google.G.K.T.Rd || (google.G.K.T.Rd = google.G.K.T.Ek(b));
    return google.G.K.T.mc = google.G.K.T.Rd.then(function() {
      return google.G.K.T.Ah(c)
    })
  };
  google.G.K.T.pl = function(b) {
    if (!google.G.K.T.mc) throw Error("Must call google.charts.load before google.charts.setOnLoadCallback");
    return b ? google.G.K.T.mc.then(b) : google.G.K.T.mc
  };
  google.G.load = function(b) {
    for (var c = [], d = 0; d < arguments.length; ++d) c[d - 0] = arguments[d];
    d = 0;
    "visualization" === c[d] && d++;
    var e = "current";
    K.L(c[d]) && (e = c[d], d++);
    var f = {};
    K.ia(c[d]) && (f = c[d]);
    return google.G.K.T.Ak(e, f)
  };
  K.Cf(v, google.G.load);
  google.G.ol = google.G.K.T.pl;
  K.Cf("google.charts.setOnLoadCallback", google.G.ol);
}).call(this);


/*
 *
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/js/jsapi_compiled_format_module.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/js/jsapi_compiled_corechart_module.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/js/jsapi_compiled_ui_module.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/js/jsapi_compiled_default_module.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/third_party/dygraphs/dygraph-tickers-combined.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/js/jsapi_compiled_fw_module.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/js/jsapi_compiled_bar_module.js”.  StatisticsController.php:1
Loading failed for the <script> with source “https://www.gstatic.com/charts/45.2/third_party/webfontloader/webfont.js”.  StatisticsController.php:1
Synchronous XMLHttpRequest on the main thread is deprecated because of its detrimental effects to the end user’s experience. For more help http://xhr.spec.whatwg.org/
 * */
