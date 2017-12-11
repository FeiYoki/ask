(function() {
	var e = "sogou_brand_ad_id",
		o = "sogou_brand_ad_width",
		l = "sogou_brand_ad_height";
	var p = window[e],
		w = window[o],
		h = window[l];
	var galaxy_url = document.location.protocol=="http:"?"http://galaxy.sogoucdn.com/galaxy/":"https://galaxy.sogoucdn.com/galaxy/";
	var src;
	var multi = {
		//一对多的情况下一个广告位对应多个位置
		sogoubrand_position_25529:4,  
		sogoubrand_position_32760:6
	};
	var transition = {
		//合作方新老版本过渡期间一个广告位会存在两种尺寸
		sogoubrand_position_279235:{
			// 对应网盟代码位问问279235 d等同于30
			width:250,
			height:250
		}
	};
	var ads = {
		sogoubrand_position_26:{
			// 对应网盟代码位图片406059、406060
			width:250,
			height:250
		},
		sogoubrand_position_29:{
			// 对应网盟代码位图片406089、406090
			width:250,
			height:250
		},
		sogoubrand_position_279235:{
			// 对应网盟代码位问问279235 d等同于30
			width:280,
			height:280
		},
		sogoubrand_position_298839:{
			// 对应网盟代码位问问298839
			width:980,
			height:90
		},
		sogoubrand_position_582185:{
			// 对应网盟代码位问问582185
			width:640,
			height:60
		},
		sogoubrand_position_25529:{
			// 对应网盟代码位新闻25529
			width:200,
			height:200
		},
		sogoubrand_position_32760:{
			// 对应网盟代码位新闻32760
			width:960,
			height:90
		},
		sogoubrand_position_303664:{
			// 对应网盟代码位音乐303664
			width:960,
			height:90
		},
		sogoubrand_position_562686:{
			// 对应网盟代码位凤凰PC562686
			width:300,
			height:250
		}
	};
	if(p==undefined||ads[p]==undefined){return;}
	if(w==ads[p].width&&h==ads[p].height){                            //校验一下代码位是否正常

		if(p in multi){
			if(p=="sogoubrand_position_32760"&&window["sogou_brand_ad_posid"]==undefined){
				window["sogou_brand_ad_posid"]=1;                     
			}
			var posid = window["sogou_brand_ad_posid"];
			//新闻的代码位存在一对多情况
			if(posid==undefined||parseInt(posid)>multi[p]||parseInt(posid)<=0){return}     //如果没有posid对应不了则不展示
			src = galaxy_url+p+"_"+posid+".html";
		}else{
			src = galaxy_url+p+".html";
		}
		src = src + '?v=1.0';
		var A = ['<iframe allowTransparency=true style="width: ', w, "px;height:", h, 'px;overflow: hidden;border:none;background:transparent;" frameborder=no scrolling="no" src="',src,'"></iframe>'].join("");
		document.write(A);
	}else if(w==transition[p].width&&h==transition[p].height){
		src = galaxy_url+p+"_transition.html";
		src = src + '?v=1.0';
		var A = ['<iframe allowTransparency=true style="width: ', w, "px;height:", h, 'px;overflow: hidden;border:none;background:transparent;" frameborder=no scrolling="no" src="',src,'"></iframe>'].join("");
		document.write(A);
	}

})();