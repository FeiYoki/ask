!function(e){function t(n){if(a[n])return a[n].exports;var s=a[n]={i:n,l:!1,exports:{}};return e[n].call(s.exports,s,s.exports,t),s.l=!0,s.exports}var a={};t.m=e,t.c=a,t.d=function(e,a,n){t.o(e,a)||Object.defineProperty(e,a,{configurable:!1,enumerable:!0,get:n})},t.n=function(e){var a=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(a,"a",a),a},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="//cache.soso.com/wenwen/deploy/js/zhuzhan/pc/category/",t(t.s=1)}([function(e,t){e.exports=preact},function(e,t,a){"use strict";function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function s(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function o(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}function r(e,t){var a=-1;return t.map(function(t,n){parseInt(e.id)===parseInt(t.id)&&(a=n)}),a}function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function c(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function l(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}function u(e,t){var a=-1;return t.map(function(t,n){parseInt(e.id)===parseInt(t.id)&&(a=n)}),a}function p(e){var t=[];return e.each(function(){var e=$(this);t.push(e.data("id"))}),t}Object.defineProperty(t,"__esModule",{value:!0});var h=a(0),d=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),g=function(e){function t(e){n(this,t);var a=s(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));return a.state={results:[],newTags:[],searching:!1},a.handleSearchTags=a.handleSearchTags.bind(a),a.handlerKeySelect=a.handlerKeySelect.bind(a),a.handleAddSearchTag=a.handleAddSearchTag.bind(a),a}return o(t,e),d(t,[{key:"handleSearchBlur",value:function(){var e=this.props.getInputState;"function"==typeof e&&e("blur")}},{key:"handleSearchTags",value:function(e){var t=this,a=$(e.target),n=$.trim(a.val()),s=this.props.getInputState;"function"==typeof s&&s("focus"),n.length?$.ajax({type:"GET",cache:!1,url:(window.location.protocol.indexOf("https")>-1?"https://wenwenapi.sogou.com/suggsearch":"http://sugg.search.wenwen.sogou.com")+"/sugg/ajaj_json.jsp?type=wentag&key="+n+"&src=qun.tag&ret_type=ret_jsonp&_"+Math.random(),dataType:"jsonp",jsonp:"callback",jsonpCallback:"jsonpcallback",success:function(e){if(e&&e.result&&$.isArray(e.result)){var a=e.result;t.setState({results:[].concat(a),searching:!0})}}}):t.setState({searching:!1})}},{key:"handleAddSearchTag",value:function(e){var t=this,a=this.props.getAddSearchTag,n=$(e.target).closest("li"),s={id:n.data("id"),name:n.data("name")};$(".ipt-popup-srch").val(""),"function"==typeof a&&a(s),t.setState({searching:!1})}},{key:"handlerKeySelect",value:function(e){var t=e.keyCode||e.which,a=$(".ipt-box"),n=$(".ipt-popup-srch"),s=a.find("li.can_add_tag"),o=s.length;if(!o)return!1;var r=s.filter(".cur"),i=null;40===t||38===t?(i=40===t?r.length&&r.index()!==o-1?r.next():s.first():r.length&&0!==r.index()?r.prev():s.last(),r.removeClass("cur"),i.addClass("cur"),n.val(i.data("name"))):13===t&&a.find("li").filter(".cur").trigger("click")}},{key:"componentWillMount",value:function(){var e=this,t=this.props.oldTags;e.setState({newTags:[].concat(t)})}},{key:"render",value:function(){var e=this,t=this.props,a=t.length,n=t.selectLength,s=t.selectTagIds,o=this.state,i=o.results,c=o.searching;return Object(h.h)("div",{className:n>=a?"ipt-srch-box ipt-dim":"ipt-srch-box"},Object(h.h)("i",{className:"ipt-srch-icon"},"搜索"),n>=a?Object(h.h)("input",{type:"text",placeholder:"搜索标签",value:"数量已达上限",disabled:"disabled",className:"ipt-popup-srch"}):Object(h.h)("input",{type:"text",placeholder:"搜索标签",className:"ipt-popup-srch",onFocus:function(t){e.handleSearchTags(t)},onInput:function(t){e.handleSearchTags(t)}}),c?Object(h.h)("ul",{className:"popup-lst",style:{display:"block"}},0===i.length||1===i.length&&r(i[0],s)>-1?Object(h.h)("li",null,Object(h.h)("a",{href:"javascript:;",className:"no-match-tag"},"没有找到合适的标签~")):i.map(function(t){return Object(h.h)("li",{key:Math.ceil(1e4*Math.random()),className:"can_add_tag","data-id":t.id,"data-name":t.name,style:{display:r(t,s)>-1?"none":""},onClick:function(t){return e.handleAddSearchTag(t)}},Object(h.h)("a",{href:"javascript:;"},t.name,Object(h.h)("i",{className:"popup-lst-add"},"添加")))})):null)}}]),t}(h.Component),f="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},b=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),y=function(e){function t(e){i(this,t);var a=c(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));return a.state={pop_width:500,pop_height:443,popShow:!0,mySelectedTags:[],oneLevelTags:[],twoLevelData:{},selectTwoTagId:0,threeLevelTags:[],showTwoLevelData:!1,searchBoxClass:"ipt-default"},a.handleCloseClick=a.handleCloseClick.bind(a),a.handleGetTwoLevelClick=a.handleGetTwoLevelClick.bind(a),a.handleGetThreeLevelClick=a.handleGetThreeLevelClick.bind(a),a.handleAddToMyTags=a.handleAddToMyTags.bind(a),a.handleDeleteTag=a.handleDeleteTag.bind(a),a.handleGetAddSearchTag=a.handleGetAddSearchTag.bind(a),a.handleGetInputState=a.handleGetInputState.bind(a),a}return l(t,e),b(t,[{key:"getMyInterest",value:function(){var e=this,t={userId:_gtag.userId,clbUid:_gtag.uid,origin:_gtag.orig};$.ajax({type:"GET",url:"/wapi/ms/my-tags",dataType:"json",data:t,success:function(t){if(!(t&&t instanceof Array))return window.badjs.report(new Error("get pc /wapi/ms/my-tags data not array fail!")),!1;e.setState({mySelectedTags:t})},error:function(){window.badjs.report(new Error("get pc /wapi/ms/my-tags ajax error fail!"))}})}},{key:"getOneLevelTags",value:function(e){var t=this;$.ajax({type:"GET",url:"/wapi/ms/c-tags?tagId="+e,dataType:"json",contentType:"application/json; charset=utf-8",success:function(a){if(!(a&&"object"===(void 0===a?"undefined":f(a))&&a.sons instanceof Array))return window.badjs.report(new Error("get /wapi/ms/c-tags?tagId="+e+" fail!")),!1;0===e?t.setState({oneLevelTags:a.sons}):t.setState({twoLevelData:a,selectTwoTagId:0,threeLevelTags:[],showTwoLevelData:!0,pop_height:680})}})}},{key:"getThreeLevelTags",value:function(e){var t=this;$.ajax({type:"GET",url:"/wapi/ms/son-tags?tagId="+e,dataType:"json",contentType:"application/json; charset=utf-8",success:function(a){if(!(a&&a instanceof Array))return window.badjs.report(new Error("get /wapi/ms/son-tags?tagId="+e+" fail!")),!1;t.setState({selectTwoTagId:e,threeLevelTags:a})},complete:function(){},error:function(){}})}},{key:"submitValidate",value:function(){var e=this;if(0===this.state.mySelectedTags.length)return pageUtils.Dialog.showTips("至少需要设置一个分类",{remove:!0,popup:$(".interest_popup")}),!1;_gtag.isLogin?e.submitTags():WKSSO.insureLoginAction(function(){e.submitTags()})}},{key:"submitTags",value:function(){var e=this,t=p($(".select_tag")),a=p($(".myInterestTab"));if(t.sort().toString()===a.sort().toString())return pageUtils.Dialog.showTips("您没有修改任何分类哦~",{remove:!0,popup:$(".interest_popup")}),!1;var n={userId:_gtag.userId,clbUid:_gtag.uid,origin:_gtag.orig,tags:t};$.ajax({url:"/submit/ms/update-user-tags",type:"POST",data:JSON.stringify(n),dataType:"json",contentType:"application/json; charset=utf-8",success:function(t){if(!t||"object"!==(void 0===t?"undefined":f(t)))return window.badjs.report(new Error("get pc /submit/ms/update-user-tags data not object fail!")),!1;0===t.code?(e.handleCloseClick(),location.pathname.indexOf("/user/center")>-1?window.location.href="/user/center?type=recommend":window.location.reload(!0)):-2===t.code?WKSSO.insureLoginAction(function(){e.submitTags()}):pageUtils.Dialog.showTips(pageTools.showCodeMessage(t.code,t.message),{remove:!0,popup:$(".interest_popup")})},error:function(){window.badjs.report(new Error("submit pc /submit/ms/update-user-tags ajax error fail!"))}})}},{key:"handleCloseClick",value:function(){this.setState({popShow:!1})}},{key:"handleGetTwoLevelClick",value:function(e){this.getOneLevelTags(e)}},{key:"handleGetThreeLevelClick",value:function(e,t){this.getThreeLevelTags(t)}},{key:"handleAddToMyTags",value:function(e,t,a){var n=this,s=this.props.length,o=this.state.mySelectedTags;return!$(e.target).closest("li").hasClass("cur")&&(o.length>=s?(pageUtils.Dialog.showTips("您的兴趣太广泛了，最多设置"+s+"个分类哦~",{remove:!0,popup:$(".interest_popup")}),!1):void n.setState({mySelectedTags:o.concat([{id:t,name:a}])}))}},{key:"handleDeleteTag",value:function(e){var t=this,a=this.state.mySelectedTags,n=$(e.target).closest(".interest-tab");a.splice(n.index(),1),t.setState({mySelectedTags:a})}},{key:"handleGetAddSearchTag",value:function(e){var t=this,a=this.state.mySelectedTags;t.setState({mySelectedTags:a.concat(e),searchBoxClass:"ipt-default"}),DT.reportCLK("grzx.ssbq")}},{key:"handleGetInputState",value:function(e){var t=this;"focus"===e?t.setState({searchBoxClass:"ipt-cur"}):"blur"===e&&t.setState({searchBoxClass:"ipt-default"})}},{key:"componentWillReceiveProps",value:function(){this.setState({popShow:!0})}},{key:"componentWillMount",value:function(){var e=this;e.getMyInterest(),e.getOneLevelTags(0)}},{key:"render",value:function(){var e=this,t=$(window),a=t.width(),n=t.height(),s=this.props.length,o=this.state,r=o.pop_width,i=o.pop_height,c=o.popShow,l=o.searchBoxClass,p=o.mySelectedTags,d=o.oneLevelTags,f=o.twoLevelData,b=o.showTwoLevelData,y=o.selectTwoTagId,m=o.threeLevelTags;return Object(h.h)("div",null,c?Object(h.h)("div",null,Object(h.h)("div",{className:"popup-bg"}),Object(h.h)("div",{className:"popup popup-w interest_popup",style:{position:"fixed",left:(a-r)/2,top:(n-i)/2}},Object(h.h)("a",{href:"javascript:;",className:"btn-popup-close",onClick:e.handleCloseClick},Object(h.h)("i",null,"关闭")),Object(h.h)("div",{className:"popup-top-tit"},"我的兴趣"),Object(h.h)("div",{className:"sort-popup-tit"},"已选择兴趣",Object(h.h)("span",{className:"sort-popup-txt"},"最多设置",s,"个兴趣分类")),Object(h.h)("div",{className:"my-interest-popup selectedInterest"},p.length?p.map(function(t){return Object(h.h)("div",{className:"interest-tab select_tag",key:t.id,"data-id":t.id},Object(h.h)("span",null,t.name),Object(h.h)("a",{href:"javascript:;",onClick:function(t){return e.handleDeleteTag(t)}},Object(h.h)("i",null)))}):Object(h.h)("div",{className:"category-none"},Object(h.h)("i",null),"暂无已选择兴趣~")),b?Object(h.h)("div",null,Object(h.h)("div",{className:"ipt-box-wrap"},Object(h.h)("div",{className:"sort-popup-tit second_section"},Object(h.h)("div",{className:"sort-tit-box"},Object(h.h)("a",{href:"javascript:;",className:"btn-sort-tit"},f.tag.name,Object(h.h)("i",{className:"sort-tit-arr"})),Object(h.h)("div",{className:"category-popup-box"},Object(h.h)("ul",{className:"category-popup category_popup_second"},f.first.length?f.first.map(function(t){return Object(h.h)("li",{key:t.id},Object(h.h)("a",{href:"javascript:;",className:"category-field-tab",onClick:function(){return e.handleGetTwoLevelClick(t.id)}},t.name))}):null,Object(h.h)("li",{className:"dim"},Object(h.h)("a",{href:"javascript:;"},"正在补充...")))))),Object(h.h)("div",{className:"ipt-box "+l},Object(h.h)(g,{length:s,selectLength:p.length,selectTagIds:p,getAddSearchTag:e.handleGetAddSearchTag,getInputState:e.handleGetInputState}))),Object(h.h)("div",{className:"interest-box second_section second_select"},Object(h.h)("ul",{className:"interest-lst-lft"},f.sons.length?f.sons.map(function(t){return Object(h.h)("li",{key:t.id,className:u(t,p)>-1?"cur":y===t.id?"on":""},Object(h.h)("a",{href:"javascript:;",className:"interest-lst-tab",onClick:function(a){return e.handleGetThreeLevelClick(a,t.id)}},Object(h.h)("span",{className:"interest-lst-tit"},t.name),Object(h.h)("span",{className:"interest-lst-tag",onClick:function(a){return e.handleAddToMyTags(a,t.id,t.name)}},Object(h.h)("i",null)),Object(h.h)("span",{className:"interest-lst-tag2"},Object(h.h)("i",null))))}):null),Object(h.h)("ul",{className:"interest-lst-rgt insert_third_tag"},m.length?m.map(function(t){return Object(h.h)("li",{key:t.id,className:u(t,p)>-1?"cur":""},Object(h.h)("a",{href:"javascript:;",onClick:function(a){return e.handleAddToMyTags(a,t.id,t.name)},className:"interest-lst-tab insert_tag"},t.name))}):null))):Object(h.h)("div",null,Object(h.h)("div",{className:"ipt-box-wrap"},Object(h.h)("div",{className:"sort-popup-tit first_select"},"请选择擅长领域"),Object(h.h)("div",{className:"ipt-box "+l},Object(h.h)(g,{length:s,selectLength:p.length,selectTagIds:p,getAddSearchTag:e.handleGetAddSearchTag,getInputState:e.handleGetInputState}))),Object(h.h)("div",{className:"category-field-box first_select"},Object(h.h)("ul",{className:"category-field-tb"},d.length?d.map(function(t){return Object(h.h)("li",{key:t.id},Object(h.h)("a",{href:"javascript:;",className:"category-field-tab",onClick:function(){return e.handleGetTwoLevelClick(t.id)}},t.name))}):null,Object(h.h)("li",{className:"dim"},Object(h.h)("a",{href:"javascript:;",className:"category-field-tab"},"正在补充..."))))),Object(h.h)("div",{className:"ft-bar"},Object(h.h)("div",{className:"ft-btn-box"},Object(h.h)("a",{href:"javascript:;",className:"btn-reply-submit2",onClick:e.handleCloseClick},"取消"),Object(h.h)("a",{href:"javascript:;",className:"btn-reply-submit",onClick:function(t){return e.submitValidate(t)}},"确定"))))):null)}}]),t}(h.Component);$(function(){var e=pageTools.getQueryString("tp")?pageTools.getQueryString("tp"):0;$(".sort-nav-tab[data-tp="+e+"]").addClass("cur"),_gtag.isLogin||"2"!==e||(window.location.href="/cate/tag/?ch=ww.dh.fly"),$(".mnav").children().eq(1).addClass("cur").siblings().removeClass("cur");var t=$(".high_reward"),a=$(".new_question");if(1==pageTools.getQueryString("myTag")){var n=t.attr("href"),s=a.attr("href");$(".all_interest_tag").addClass("cur"),t.attr("href",n+"&myTag=1"),a.attr("href",s+"&myTag=1"),$(".category_question_none").length&&$(".category_question_none").html("<i></i>暂时还没有新问题哦,去看看其它分类吧~")}else{var o=pageTools.getQueryString("tagId");$('.myInterestTab[data-id="'+o+'"]').addClass("cur").siblings().removeClass("cur")}$("#wrap").on("mouseover",".categoryPathTab",function(){var e=$(this),t=e.data("id");0===e.closest(".category-path-box").find(".hovTagsList").length&&$.ajax({type:"GET",url:"/wapi/ms/son-tags?tagId="+t,dataType:"json",success:function(e){if(e){for(var a="",n=0;n<e.length;n++)t!=e[n].id&&(a+='<li class="hoverTag"><a href="/cate/tag?tagId='+e[n].id+'">'+e[n].name+"</a></li>");$('.categoryPathTab[data-id="'+t+'"]').after('<div class="category-popup-box hovTagsList"><ul class="category-popup">'+a+"</ul></div>")}}})}),$("#wrap").on("click",".btn-load-more",function(){$("#categoryTabList").find("li").show(),$(".load-more2").remove()}),$("#wrap").on("click",".sort-tag",function(e){e.preventDefault(),e.stopPropagation();var t=$(this).attr("data-id");window.open("/cate/tag?tagId="+t)}),$("#wrap").on("click","#s_login",function(){DT.reportCLK("ww.fly.login")}),$(".setUpCategory").on("click",function(){Object(h.render)(Object(h.h)(y,{length:10}),document.getElementById("popup_wrap"))}),"welfare"===pageTools.getQueryString("activity")&&(pageUtils.Dialog.showTips("您可在本页答题，以捐助贫困儿童",{remove:!0}),history.replaceState(null,null,location.href.replace("&activity=welfare","")))})}]);