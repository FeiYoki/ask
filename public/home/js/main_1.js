!function(o){function n(t){if(e[t])return e[t].exports;var a=e[t]={i:t,l:!1,exports:{}};return o[t].call(a.exports,a,a.exports,n),a.l=!0,a.exports}var e={};n.m=o,n.c=e,n.d=function(o,e,t){n.o(o,e)||Object.defineProperty(o,e,{configurable:!1,enumerable:!0,get:t})},n.n=function(o){var e=o&&o.__esModule?function(){return o.default}:function(){return o};return n.d(e,"a",e),e},n.o=function(o,n){return Object.prototype.hasOwnProperty.call(o,n)},n.p="//cache.soso.com/deploy/js/lib/security/xss/",n(n.s=0)}([function(o,n,e){var t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(o){return typeof o}:function(o){return o&&"function"==typeof Symbol&&o.constructor===Symbol&&o!==Symbol.prototype?"symbol":typeof o};!function(){function o(o){var t=e(1),r=t.getDomainType(),c=t.getSogouOrSogo(),i={},s=a("p_uin");i.content=o,i.urlWithoutParams=location.protocol+"//"+location.host+location.pathname,i.uin=s;var u=new Image;u.onload=u.onerror=function(){u=u.onload=u.onerror=null},u.src=("https:"===location.protocol?"//wenwenapi."+c+".com/dm":"//dm.wenwen."+r+".com")+"/f/"+r+"/xss?"+n(i)}function n(o){if("object"!=(void 0===o?"undefined":t(o)))return o;var n=[];for(var e in o)n.push(e+"="+encodeURIComponent(o[e]));return n.join("&")}function a(o){for(var n=escape(o)+"=",e=document.cookie.split(";"),t=0;t<e.length;t++){for(var a=e[t];" "==a.charAt(0);)a=a.substring(1,a.length);if(0==a.indexOf(n))return unescape(a.substring(n.length,a.length))}return null}if(0==location.pathname.indexOf("/qudetail.jsp")||0==location.pathname.indexOf("/z/q")||0==location.pathname.indexOf("/s/")||0==location.pathname.indexOf("/ms/")||0==location.pathname.indexOf("/guide/detail"))return!1;var r={},c=0,i=0;for(var s in document)/^on./.test(s)&&function(n,e){function t(i){var s=i._k;s||(s=i._k=++c);var u=s<<8|e;if(!(u in r)&&(r[u]=!0,i.nodeType==Node.ELEMENT_NODE)){var l;i[n]&&(l=i.getAttribute(n))&&0!=l.indexOf("document.sogou_ads")&&(window.$EDITORUI&&i.className&&i.className.indexOf("edui")>-1||(i[n]=null,o(l))),a&&"A"==i.tagName&&"javascript:"==i.protocol&&"javascript:;"!=(l=i.href.toString().toLowerCase())&&"javascript:void(0);"!=l&&"javascript:void(0)"!=l&&(i.href="javascript:;",o(l)),t(i.parentNode)}}var a="onclick"==n;document.addEventListener&&document.addEventListener(n.substr(2),function(o){t(o.target)},!0)}(s,i++)}()},function(o,n){n.getDomainType=function(){var o="wenwen",n=location.hostname.toLowerCase();switch(3==n.match(/\./g).length&&(n=n.slice(n.indexOf(".")+1)),n){case"wenwen.sogou.com":case"wenwen.sogo.com":case"wenwen.m.sogou.com":o="wenwen";break;case"ld.sogo.com":case"ld.sogou.com":o="ld";break;case"zhinan.sogo.com":case"zhinan.sogou.com":o="zhinan";break;case"baike.sogo.com":case"baike.sogou.com":case"baike.m.sogou.com":o="baike";break;case"zhuanjia.sogou.com":case"zhuanjia.sogo.com":o="zhuanjia"}return o},n.getSogouOrSogo=function(){return location.host.indexOf(".sogou.com")>-1?"sogou":"sogo"}}]);
//# sourceMappingURL=main.js.map