    var uigs_para={};
    var trs = 0;
    var ltm= 0;
    var omo = document.onmousemove;
    var omd =  document.onmousedown;

    document.onmousemove = function (evt){
        uigs_para['mml']=(++trs);
        if(typeof(omo)=="function")omo(evt);
    }

    document.onmousedown = function (evt){
        ltm= new Date().getTime();
        if(typeof(omd)=="function")omd(evt);
    }

var $s = (function() {
    var a = "0.1.0",
    f = {},
    b = {};
    var c = f.$d = document,
    e = {};

    f.$ = function(j) {
        var h = c.getElementById(j);
        if (h && h.id != j && (h = document.all[j])) {
            if (h.id == j) {
                return h
            }
            for (var g = 0; g < h.length; g++) {
                if (h[j][g].id == j) {
                    return h[j][g]
                }
            }
            return null
        }
        return h
    };
    f.$$ = function(g, h) {
        if (g) {
            return g.getElementsByTagName(h)
        } else {
            return c.getElementsByTagName(h)
        }
    };
    f.$b = function(k, g, h) {
        if (k) {
            for (var j in g) {
                if (window.attachEvent) {
                    k.attachEvent("on" + g[j], h[j])
                } else {
                    k.addEventListener(g[j], h[j], false)
                }
            }
        }
    };

    f.t = function() {
        return (new Date()).getTime()
    };

   return f
})();
