!function(t){function e(n){if(r[n])return r[n].exports;var o=r[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,e),o.l=!0,o.exports}var r={};e.m=t,e.c=r,e.d=function(t,r,n){e.o(t,r)||Object.defineProperty(t,r,{configurable:!1,enumerable:!0,get:n})},e.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(r,"a",r),r},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="//cache.soso.com/wenwen/deploy/js/zhuzhan/pc/search/",e(e.s=0)}([function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=r(1),o=(r.n(n),r(2)),i=(r.n(o),r(3)),a=(r.n(i),r(4));r.n(a);$(function(){$('#bottomSearch input[name="title"]').on("keydown",function(t){if(13==t.keyCode){var e=$.trim(this.value);e||e.length?window.location.reload():window.location.href=_gtag.search_url+encodeURIComponent(e)}}),$('#bottomSearch input[name="search"]').on("click",function(){return $.w.smartbox.redirectSearch(document.sophia.title.value,!0),!1});var t=void 0;$(window).scroll(function(){clearTimeout(t),t=$(document).scrollTop()>42?setTimeout(function(){$("#header").addClass("sticky")},50):setTimeout(function(){$("#header").removeClass("sticky")},50)}),$(".header-user-tab").on("mouseover",function(){var t=$(this).find(".header-user-submenu"),e=($(this).width()-t.width())/2;t.css("left",e+"px")})}),$(function(){if(!_gtag._jstag.found){var t=$("#searchTextForNt");t.length&&(t.val($("#sb").val()),t.focus())}$("#askBtn").on("click",function(){var t=$("#searchTextForNt").val(),e="/question/ask?w="+encodeURIComponent(t)+"&sourceid=0&ch=w.search.zerotiwen";window.open(e)})})},function(t,e){function r(t){var e=$(".ans_user_name");for(var r in t)if(r&&e&&e[0]&&0==r.indexOf("aa")){var n=e.filter("[aa='"+r+"']"),o='<a class="author_info" target="_blank" href="/user/center?ta='+t[r].qqStr+'"><strong>'+t[r].name+"</strong></a>";o+='<i class="dot-div">•</i>',$(o).insertAfter(n)}}var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};!function(){var t=$(".ans_user_name"),e=[];t&&t.length&&t.each(function(t,r){var n=$(r).attr("ao");n&&""!=n&&e.push(n);var o=$(r).attr("aa");o&&""!=o&&e.push(o);var i=$(r).attr("ai");i&&""!=i&&e.push(i)});var o=$("#result_list .sIt_title>a");o&&o.length&&o.each(function(t,r){var n=$(r).attr("qo");n&&""!=n&&e.push(n)});for(var i="",a=0,c=e.length;a<c;a++)i+=(0==a?"?sp=S":"&sp=S")+e[a];$.ajax({method:"GET",dataType:"json",cache:!1,url:"/wapi/ms/user-batch?qq=true&id="+e.toString(),success:function(t){if(null===t||"object"!=(void 0===t?"undefined":n(t)))return!1;r(t)}})}()},function(t,e){function r(t,e){var r=e.target||e.srcElement;DT.reportCLK("ww.search.his"+t,"ask",r.href)}function n(){if(null!=searchHistoryDiv){var t=$.w.cookie.getCookie("ww_sTitle"),e="";if(null==t||""==t)e="";else{var n=1,o=t.split("*");a=o.length;for(var i=o.length-1;i>=0;i--)if(0!=o[i].length){var s=o[i];s=s.replace(/&/gi,"&amp;"),s=s.replace(/</gi,"&lt;"),s=s.replace(/>/gi,"&gt;"),o.length<=1?e+='<li><a href="'+c+encodeURIComponent(o[i])+'&sp=0&ch=search.lishi.temp11" target="_self" cindex="'+n+'">'+s+"</a></li>":e+='<li><a href="'+c+encodeURIComponent(o[i])+'&sp=0&ch=search.lishi.temp22" target="_self" cindex="'+n+'">'+s+"</a></li>",n++}e=""+e}searchHistoryDiv.innerHTML=e,$(searchHistoryDiv).on("click","a[cindex]",function(t){r($(this).attr("cindex"),t)}),searchHistoryDiv.style.display="block"}}function o(t){if(null!=searchHistoryDiv){t=$.trim(t);var e=/(\*+)/g;t=t.replace(e,"");var r="";if(""!=t){t.length>30&&(t=t.substring(0,30));var o=$.w.cookie.getCookie("ww_sTitle");if(null==o||""==o)$.w.cookie.setCookie("ww_sTitle",t,8760);else{var i=o.split("*");if(i.length>0){var a=0;if(6==i.length){var c=!1;for(a=1;a<i.length;a++)i[a]!=t?r+=i[a]+"*":c=!0;c?r=i[0]+"*"+r+t:r+=t}else{for(a=0;a<i.length;a++)i[a]!=t&&(r+=i[a]+"*");r+=t}}$.w.cookie.setCookie("ww_sTitle",r,8760)}}n()}}function i(){$.w.cookie.delCookie("ww_sTitle"),$("#searchHistoryDiv").html('<li style="color:#888;">暂无搜索历史</li>')}var a=0,c=_gtag.search_url;$(function(){if(_gtag._jstag.found){$("a.clearHistory").on("click",function(){i()});var t=document.getElementById("searchHistoryDiv"),e=$("#sb").val(),r=e;null!=t&&""!=r&&o($.trim(r))}var n="";n=void 0===a||a<2?".temp11":".temp22";var c=$("#relatedSearch");if(c.length>0){var s=c.attr("ss_c");c.attr("ss_c",s+n)}var l=$("#relatedSearchT");if(l.length>0){var s=l.attr("ch");l.attr("ch",s+n)}var u=$("#interestSearch");if(u.length>0){var s=u.attr("ch");u.attr("ch",s+n);var h=u.attr("ss_c");u.attr("ss_c",h+n)}})},function(t,e){$(function(){if($(".convergeBox").length){var t=!1;$(".convergeBox").on("click",".support, .oppose",function(e){e.preventDefault(),e.stopPropagation();var r=$(this),n=$(".convergeBox").find(".answerWrap");if(r.addClass("active").siblings().removeClass("active"),r.hasClass("support"))n.eq(0).show(),n.eq(1).hide();else if(r.hasClass("oppose"))if(t)n.eq(1).show(),n.eq(0).hide();else{var o=r.attr("data-vp");$.ajax({type:"GET",url:"/s/c-answer",data:{id:_gtag.convergeId,tag:o,pno:0,psize:3,isbox:!0,tpv:1605},success:function(e){e&&e.length>0&&($(".answerWrap:visible").hide(),$(".answerWrap").after(e),t=!0)}})}return!1}),$(".convergeBox").on("click",".expand",function(){$(this).parent().text($(this).parent().attr("content")),$(this).remove(),DT.reportCLK("2015ww.gdss.all")}),$(".convergeBox .repository-title a").on("click",function(){DT.reportCLK("2015ww.gdss.title")})}})},function(t,e){function r(){$("#filter li").delegate("a",{click:function(){DT.reportCLK("ww.search.left"+$(this).attr("ch"))}})}function n(){$(".result_list li h3[pid] a").click(function(){DT.reportCLK("ww.search.title"+$(this).attr("ch"))}),$(".result_list li div.info a").click(function(){DT.reportCLK("ww.search.cate"+$(this).attr("ch"))})}function o(){$("#relatedSearchT td a").click(function(){DT.reportCLK("ww.search.rel"+$(this).attr("ch"))})}function i(){$("#interestSearch li a[type='1']").click(function(){DT.reportCLK("ww.search.rel_r"+$(this).attr("ch"))})}function a(){$("#interestSearch li a[type='2']").click(function(){DT.reportCLK("ww.search.maybe"+$(this).attr("ch"))})}function c(){$("#rads li a").click(function(){DT.reportCLK("ww.search.ad2"+$(this).attr("ch"))})}function s(){$("#top_ad li a").click(function(){DT.reportCLK("ww.search.ad1"+$(this).attr("ch"))})}$(function(){r(),n(),o(),i(),a(),c(),s(),$(".go-websearch").on("click","a",function(){DT.reportCLK("towebpage.pc")})})}]);
//# sourceMappingURL=main_e02e574.js.map