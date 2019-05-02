<!DOCTYPE html>
<html lang="zh-cn" class="no-js">
	<head>
		<meta http-equiv="Content-Type">
		<meta content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<title>趣味猜拳</title>		
		<meta name="viewport" content="target-densitydpi=device-dpi, width=750px, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="format-detection" content="email=no">
		<script src="/cq/js/zepto.min.js"></script>
		<script type="text/javascript" src="https://code.createjs.com/soundjs-0.6.2.min.js"></script>
		<script type="text/javascript">
		function adaptscreen(widthnum){
			try{
			 var DEFAULT_WIDTH = widthnum, // 页面的默认宽度
		        ua = navigator.userAgent.toLowerCase(), // 根据 user agent 的信息获取浏览器信息
		        deviceWidth = window.screen.width, // 设备的宽度
		        devicePixelRatio = window.devicePixelRatio || 1, // 物理像素和设备独立像素的比例，默认为1
		        targetDensitydpi;    // Android4.0以下手机不支持viewport的width，需要设置target-densitydpi
		        if (ua.indexOf("android") !== -1 && parseFloat(ua.slice(ua.indexOf("android")+8)) < 4) {
		        	targetDensitydpi = DEFAULT_WIDTH / deviceWidth * devicePixelRatio * 160;
		        	$('meta[name="viewport"]').attr('content', 'target-densitydpi=' + targetDensitydpi + ', width=device-width, user-scalable=no');
				}else{
					$('meta[name="viewport"]').attr('content', 'target-densitydpi=device-dpi, width='+DEFAULT_WIDTH+'px, user-scalable=no');
				}
			}catch(e){
				console.log('dpi error',e);
			}
	    }
	    adaptscreen(750);
		</script>
		<link rel="stylesheet" type="text/css" href="/cq/css/reset.css?v=6" />
		<link rel="stylesheet" type="text/css" href="/cq/css/index.css?v=6" />
		<link rel="stylesheet" type="text/css" href="/cq/css/animations.css?v=6" />
        <link rel="stylesheet" type="text/css" href="/cq/css/load.css?v=6" /> 
	</head>
	<body  onload="loadSound();">
    <div id="loading">
     	<div class="spinner">
  			<div class="double-bounce1"></div>
  			<div class="double-bounce2"></div>
		</div>
	</div>
	<div id="content" style="display:none">
		<div class="page page-1-1 page-index" data-lock-up="1" data-lock-down="1">
			<div class="wrap">
				<div class="page-1-wrap">
					
				</div>
			</div>
		</div>
		<div class="page page-2-1 hide" >
			<div class="wrap">
				<div class="page-2-wrap">
					
					<div class="gold-select js-gs-open">100</div>
					<div class="gold-select-list shide">
						<ul class="js-gold-select">
							<li><img class="dib" src="/cq/imgs/gold.png" /><span>5000</span></li>
							<li><img class="dib" src="/cq/imgs/gold.png" /><span>1000</span></li>
							<li><img class="dib" src="/cq/imgs/gold.png" /><span>500</span></li>
							<li class="cur"><img class="dib" src="/cq/imgs/gold.png" /><span>100</span></li>
						</ul>
					</div>

					<img class="switch_bt js_switch_bt" src="/cq/imgs/switch_bt.png">
					
					<!-- 相方金币 -->
					
					<!--<div class="user-gold-wrap top pt-page-moveFromTopFade hide js-other-ui">
						<span class="js-side-gold">---</span>
					</div>-->
					<div class="user-gold-wrap zs top pt-page-moveFromBottomFade">
						<span class="js-side-zs">---</span>
					</div>
					
					<div class="user-gold-wrap bottom pt-page-moveFromBottomFade hide">
						<span class="js-my-gold">---</span>
					</div>
					<div class="user-gold-wrap zs bottom pt-page-moveFromBottomFade">
						<span class="js-my-zs">---</span>
					</div>
					<!-- 相方金币end -->

					<!-- 猜拳  剪刀 1 石头 2 包 3 -->
					<div class="game-main-wrap pt-page-moveFromTop hide js-gmw">
						<img class="gmw-bt dib chui js-mine-play" data-val="1" src="/cq/imgs/game-bt-chui.png" />
						<img class="gmw-bt dib jian js-mine-play" data-val="2" src="/cq/imgs/game-bt-jiandao.png" />
						<img class="gmw-bt dib bao js-mine-play" data-val="3" src="/cq/imgs/game-bt-bao.png" />
					</div>
					<!-- 猜拳end -->

					<!-- 对战蒙版 -->
					<div class="vs-wrap shide">
						<div class="vs-wrap-mask"></div>

						<div class="vs-rs-other vro pt-page-bounceInDown js-other-play" val="2" ></div>
						<img class="vs-rs-other js-game-wait pt-page-bounceInDown" src="/cq/imgs/game-waiting.png" />

						<div class="vs-rs-mine vro pt-page-bounceInUp js-mine-show" ></div>
						<img class="vs-mark pt-page-bounceIn" src="/cq/imgs/vs.png" />
					</div>
					<!-- 对战蒙版end -->

					<!-- 结果动画 -->
					<div class="result-wrap hide shide">
						<img class="light-an pt-page-justRotate" src="/cq/imgs/light.png" />
						<img class="lignt-an-o pt-page-justRotateScale" src="/cq/imgs/light_o.png" />
						
						<!-- 成功动画 -->	
						<div class="win-an shide js-win-an js-rs-wrap">
							<img class="rs-font pt-page-bounceIn win" src="/cq/imgs/font-win.png" />
							<img class="gold-an pt-page-delay100 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay200 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay300 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay500 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay600 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay700 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay800 pt-page-getGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay900 pt-page-getGoldan" src="/cq/imgs/gold.png" />
						</div>
						<!-- 成功动画end -->

						<!-- 失败动画 -->
						<div class="lose-an shide js-lose-an js-rs-wrap">
							<img class="rs-font pt-page-bounceIn lose" src="/cq/imgs/font-lose.png" />
							<img class="gold-an pt-page-delay100 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay200 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay300 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay500 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay600 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay700 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay800 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
							<img class="gold-an pt-page-delay900 pt-page-throwGoldan" src="/cq/imgs/gold.png" />
						</div>
						<!-- 失败动画end -->

						<!-- 平局 -->
						<div class="eq-an shide js-eq-an js-rs-wrap">
							<img class="rs-font pt-page-bounceIn win" src="/cq/imgs/font-eq.png" />
						</div>
						<!-- 平局end -->
						
					</div>
					<!-- 结果动画 end -->

					<!-- 头像 -->
					<div class="user-head-wrap">
						<img class="game-head-wrap-top pt-page-moveFromTopFade hide" src="/cq/imgs/game-head-wrap.png" />
						<img class="game-head-wrap-top js-chated shide" src="/cq/imgs/game-chat.png" />
						<img class="user-head top pt-page-moveFromTopFade hide js-side-head" src="/cq/imgs/eg/head.png" />

						<div class="user-name-top pt-page-moveFromTopFade hide js-other-ui js-side-name">---</div>
						
						<img class="game-head-wrap-bottom pt-page-moveFromBottomFade hide" src="/cq/imgs/game-head-wrap.png" />
						<img class="user-head bottom pt-page-moveFromBottomFade hide js-my-head" src="/cq/imgs/eg/head.png" />
						<div class="user-name-bottom pt-page-moveFromBottomFade hide js-my-name">---</div>
					</div>
					<!-- 头像end -->

					<img class="game-main-bt pt-page-moveFromTop hide shide" src="/cq/imgs/game-main-bt.png" />

				</div>
			</div>
		</div>	
		
    </div>

	<!-- 通用消息弹窗 -->
	<div class="common-tips-block js-common-tips hide">
    	<div class="tips-block-mask"></div>
    	<div class="ctb-main">
    		<div class="ctbm-txt js-ctbm-txt">寻找对手中</div>
    		<div class="spinner">
	  			<div class="double-bounce1"></div>
	  			<div class="double-bounce2"></div>
			</div>
    	</div>
    </div>
    <!-- 通用消息弹窗end -->

    <div id="share">
    	<div class="shareImg"></div>
    </div>

    <div class="tisblock mask"></div>
    <div class="tisblock main"></div>

    <div class="shide">
    	<img src="/cq/imgs/main_bg.jpg" />
    	<img src="/cq/imgs/gold-wrap.png" />
    	<img src="/cq/imgs/common_window.png" />
    </div>


    <script type="text/javascript">
	gSound = 'imgs/samsung.mp3';
	dontprevent = true;
	</script>
	<script src="/cq/js/index.js?v=6"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
	document.onreadystatechange = loading;
	var userinfo = {};
	var curAiInfo = {};
	var loading_pc_num=0;
	var loading_pc=setInterval(function(){
		loading_pc_num+=parseInt(Math.random()*6);
		$('.loading_main').html(loading_pc_num+'%');
		if(loading_pc_num>90){
			clearInterval(loading_pc);
		}
	},300);

	function loading(){
		if(document.readyState == "complete"){
			loading_pc_num=94;
			goNext();
			setTimeout(function(){
				startpage();
			},600);
		}
	}

	function startpage(){

		$.ajax({
			url: '/api/cq/getUserInfo',
			type: 'get',
            dataType: 'jsonp',
            timeout: 8000
		}).done(function(jdata){
			console.log('getUserInfo', jdata);
			if(jdata.code != 0){
				showPop(jdata.msg);
				return;
			}
			userinfo = jdata.data;

			$('.js-my-name').html(userinfo.nickname);
			$('.js-my-head').attr('src',userinfo.avatar);
			$('.js-my-gold').html(Math.ceil(userinfo.JB*100));
			$('.js-my-zs').html(Math.ceil(userinfo.ZS*100));

			$("#loading").hide();
			$("#content").show();
			switchPreson();
		})


		shareApi();
	}

	function loadSound () {
	  createjs.Sound.registerSound("/cq/music/coin_music.wav", 'goldmu');
	}

	/*换人*/
	function switchPreson(){
		$('.js-ctbm-txt').html('寻找对手中');
		$('.js-common-tips').removeClass('hide');
		$('.js-other-ui').addClass('shide');
		$.ajax({
			url: '/api/cq/change',
			type: 'get',
            dataType: 'jsonp',
            timeout: 8000,
            data: {
            	gold: $('.js-gs-open').text()
            }
		}).done(function(jdata){
			console.log('change', jdata);
			if(jdata.code != 0){
				showPop(jdata.msg);
				return;
			}
			curAiInfo = jdata.data;

			setTimeout(function(){
				$('.js-common-tips').addClass('hide');
				$('.js-other-ui').removeClass('shide');
				$('.js-side-name').html(curAiInfo.nickname);
				$('.js-side-head').attr('src',curAiInfo.avatar);
				$('.js-side-zs').html(Math.ceil(curAiInfo.ZS *100));
			}, parseInt(3000 * Math.random()));
			
		})
	}

	function showPop(msg){
		$('.js-ctbm-txt').html(msg);
		$('.js-common-tips').removeClass('hide');
		setTimeout(function(){
			$('.js-common-tips').addClass('hide');
		},2000);
	}

	/*推算对方出拳结果*/
	function getSideHand(myval,rs){
		var result;
		if(rs == 1){
			switch(myval){
				case 1:
					result = 2;
				break;
				case 2:
					result = 3;
				break;
				case 3:
					result = 1;
				break;
			}
		}else if(rs == 2){
			switch(myval){
				case 1:
					result = 3;
				break;
				case 2:
					result = 1;
				break;
				case 3:
					result = 2;
				break;
			}
		}else{
			result = myval;
		}
		return result;
	}

	function getHandClass(type){
		if(type == 1){
			return 'chui';
		}else if(type == 2){
			return 'jian';
		}else{
			return 'bao';
		}
	}

	
	$(function(){
		
		/*计算动画高度*/
		var anHeight = parseInt($(window).height()) - 686;
		console.log(parseInt($(window).height()),anHeight);
		$('.js-rs-wrap').css({
			'height': anHeight
		})

		/*换人逻辑*/
		$('.js_switch_bt').on('tap',function(){
			switchPreson();
		});

		/*点蒙层关闭弹窗*/
		$('.js-tips-block-mask').on('tap',function(){
			$(this).parent('div').addClass('hide');
		})

		/*去充值按钮*/
		$('.js-ctbm-bt').on('tap',function(){
			$('.go-inprice').addClass('hide');
		})

		/*打开金币选择*/
		$('.js-gs-open').on('tap', function(){
			$('.gold-select-list').removeClass('shide');
		})

		/*金币选择*/
		$('.js-gold-select > li').on('tap', function(){
			$('.js-gold-select .cur').removeClass('cur');
			$(this).addClass('cur');
			$('.js-gs-open').html($(this).children('span').text());
			$('.gold-select-list').addClass('shide');
			switchPreson();
		})

		/*猜拳 选择*/
		$('.js-gmw > .gmw-bt').on('tap', function(){
			$('.js-gmw > .cur').removeClass('cur');
			$('.js-gmw > .notcur').removeClass('notcur');
			$(this).addClass('cur');
			$(this).siblings('.gmw-bt').addClass('notcur');
			$('.game-main-bt').removeClass('shide');
		})

		/*出拳*/
		$('.game-main-bt').on('click',function(){
			if($('.js-gs-open').text()*1 > $('.js-my-gold').text()*1){
				showPop('余额不足');
				window.location.href = '/user/usercenter';
				return;
			}


			$('.js-gmw,.game-main-bt').addClass('shide');
			var myrs = $('.js-mine-play.cur').data('val');
			
			
			switch(myrs){
				case 1:
				$('.js-mine-show').addClass('chui');
				break;
				case 2:
				$('.js-mine-show').addClass('jian');
				break;
				case 3:
				$('.js-mine-show').addClass('bao');
				break;
			}

			$.ajax({
				url: '/api/cq/hand',
				type: 'get',
	            dataType: 'jsonp',
	            timeout: 8000,
	            data: {
	            	hand: myrs,
	            	gold: $('.js-gs-open').text(),
	            	rid: curAiInfo.rid
	            }
			}).done(function(jdata){
				console.log('hand', jdata);
				if(jdata.code != 0){
					showPop(jdata.msg);
					$('.js-gmw,.game-main-bt').removeClass('shide');
					return;
				}
				$('.vs-wrap').removeClass('shide');
				$('.js-game-wait').addClass('shide');
				var otrs = getSideHand(myrs, jdata.data.result);
				$('.js-other-play').attr({
					val: otrs
				}).addClass(getHandClass(otrs));

				/*异步显示结果*/	
				setTimeout(function(){
					$('.vs-wrap').addClass('shide');
					if(jdata.data.result == 3){
						/*平*/
						$('.result-wrap,.js-eq-an').removeClass('shide');
					}else if(jdata.data.result == 2){
						/*输*/
						$('.result-wrap,.js-lose-an').removeClass('shide');
						createjs.Sound.play('goldmu');
					}else{
						/*赢*/
						$('.result-wrap,.js-win-an').removeClass('shide');
						createjs.Sound.play('goldmu');
					}

					$('.js-my-gold').html(Math.ceil(jdata.data.self.JB * 100));
					$('.js-my-zs').html(Math.ceil(jdata.data.self.ZS *100));
					$('.js-side-zs').html(Math.ceil(jdata.data.side.ZS*100));
					
				},3000);

				if(jdata.data.change == 'Y'){
					setTimeout(function(){
						switchPreson();
					},5000);
				}
			})


			/*返回常规*/
			setTimeout(function(){
				$('.result-wrap,.js-eq-an,.js-lose-an,.js-win-an').addClass('shide');
				$('.js-gmw,.game-main-bt,.js-game-wait').removeClass('shide');
				$('.js-mine-show,.js-other-play').removeClass('jian chui bao');
			},6000);

		})
	
	});


	function shareApi(){
        var _title = '拳王争霸，谁与争锋';
        var _desc =  '好玩又有趣';
        var _link = (window.location.href).split('#')[0];
        var _imgurl = 'http://cq.cloudxt.cn/mex/cq/imgs/index_logo.png';
        console.log('begin shareapi');
        $.ajax({
            type: "post",
            url: "/api/third/wechat/share",
            dataType: "json",
            data: {
                site_url: window.location.href
            },
            success: function (msg) {
                wx.config({
                    debug: false,
                    appId: msg.appId,
                    timestamp: msg.timestamp,
                    nonceStr: msg.nonceStr,
                    signature: msg.signature,
                    jsApiList: ['checkJsApi', 'onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'hideMenuItems', 'showMenuItems', 'hideAllNonBaseMenuItem', 'showAllNonBaseMenuItem', 'translateVoice', 'startRecord', 'stopRecord', 'onRecordEnd', 'playVoice', 'pauseVoice', 'stopVoice', 'uploadVoice', 'downloadVoice', 'chooseImage', 'previewImage', 'uploadImage', 'downloadImage', 'getNetworkType', 'openLocation', 'getLocation', 'hideOptionMenu', 'showOptionMenu', 'closeWindow', 'scanQRCode', 'chooseWXPay', 'openProductSpecificView', 'addCard', 'chooseCard', 'openCard']
                });
                wx.ready(function () {
                    var shareData = {
                        title: _title,
                        desc: _desc,
                        link: _link,
                        imgUrl: _imgurl
                    };

                    var shareData1 = {
                        title: _title,
                        desc: _desc,
                        link: _link,
                        imgUrl: _imgurl,
                        success: function () {
                            // 用户确认分享后执行的回调函数
                            $.ajax({
                                type: "post",
                                url: "/cxt/share",
                                dataType: "json",
                                data: {
                                    title: _title,
                                    url: _link
                                },
                                success: function (msg) {
                                }
                            });
                        }
                    };
                    wx.onMenuShareAppMessage(shareData);
                    wx.onMenuShareTimeline(shareData1);

                    //录音自动停止监听
                    wx.onVoiceRecordEnd({
                        // 录音时间超过一分钟没有停止的时候会执行 complete 回调
                        complete: function (res) {
                            localId = res.localId;
                            console.log('record stop.');
                            $('#record').val('录音').removeClass('recording');
                        }
                    });

                    //播放自动停止监听
                    wx.onVoicePlayEnd({
                        success: function (res) {
                            localId = res.localId; // 返回音频的本地ID
                            $('#play-record').val('播放录音').removeClass('playing');
                        }
                    });

                    //获得地理位置
                    // wx.getLocation({
                    //     type: 'gcj02', //wgs84 或 gcj02
                    //     success: function (res) {
                    //         var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                    //         var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                    //         var MJKD_LATLNG = latitude + ',' + longitude;
                    //         //http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=39.983424,116.322987&output=json&pois=1&ak=
                    //         var url = 'http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=' + MJKD_LATLNG + '&output=json&pois=1&ak=AMpUCwSun4ZVmi8EWSBoM65Q4sgexuxo';
                    //         $.get(url, function(data) {
                    //             if(data.status === 0) {
                    //                 console.log(data.result);
                    //                 $('.search-icon').html(data.result.addressComponent.city);
                    //             }
                    //         }, 'jsonp');
                    //     },
                    //     fail: function(res) {
                    //         $('.search-icon').html('全国');
                    //     }
                    // });
                })
            }
        });   
    }


	//判断手机横竖屏状态： 
	function hengshuping(){ 
		if(window.orientation==180||window.orientation==0){ 
		    //alert("竖屏状态！")        
		} 
		if(window.orientation==90||window.orientation==-90){ 
		    showPop('竖屏体验更佳!');     
		} 
	} 
	window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", hengshuping, false); 
	</script>
	</body>
</html>
