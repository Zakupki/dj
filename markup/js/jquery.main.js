$(document).ready(function(){
	$('.social-tab').tabset({
		"tab":".tab",
		"tab_control":".tab-nav"
	});
	$('.gallery').fadeGallery({
		slideElements:'.gmask > li',
		autoRotation:true,
		pagerLinks:'.pagination li'
	});
	$('.gallery1').fadeGallery({
		slideElements:'.gmask > li',
		autoRotation:true,
		pagerLinks:'.pagination li'
	});
	$('.gallery3').fadeGallery({
		slideElements:'.gmask > li',
		autoRotation:true,
		pagerLinks:'.pagination li'
	});
	$('.gallery4').fadeGallery({
		slideElements:' .gmask > li',
		pauseOnHover:true,
		autoRotation:true,
		autoHeight:true,
		switchTime: 4000,
		duration:650,
		event:'click'
	});

	

	var deviceAgent = navigator.userAgent.toLowerCase();
	var agentID = deviceAgent.match(/(iphone|ipod|ipad|android|iemobile|ppc|smartphone|blackberry|webos)/);

	if(!agentID){
		function boxTop() {
			var _hPost = $('.scroll-column .post').height()-31,
				_thisWindow = $(window),
				_thisTop = _thisWindow.scrollTop(),
				_hMusic = $('.scroll-column .music-holder').height(),
				_heightScroll = _hPost - _hMusic;
				_cssObj = {
					'position' : 'fixed',
					'top' : '0',
					'z-index' : '20'
				};
				_cssObjBottom = {
					'position' : 'absolute',
					'top' : 'auto',
					'bottom' : '0'
				};
				$('.scroll-column .music-holder').css('height', _hMusic);
				if (_hPost > _hMusic) {
					_scrollColumnTop = $('.scroll-column').offset().top,
					_heightScrollTop = _heightScroll+_scrollColumnTop;
					$('.scroll-column .music-holder').each(function(){
						if(_thisTop >= _scrollColumnTop && _thisTop < _heightScrollTop){
							$('.scroll-column .music-holder').css(_cssObj);
						}
						else if (_thisTop >= _scrollColumnTop && _thisTop > _heightScrollTop) {
							$('.scroll-column .music-holder').css(_cssObjBottom);
						} else {
							$('.scroll-column .music-holder').css('position' , 'relative');
						};
					});
				}
		};
	};
	//boxTop();
	$(window).scroll(function(){
		boxTop();
	});
	$( window ).load(function(){
		boxTop();
	});

	(function popup() {
		$("body").popup().popup({
			"opener":"#download-photo-btn",
			"popup_holder":"#photo-download"
		}).popup({
			"opener":".photo-gallery li",
			"popup_holder":"#photo-gallery"
		}).popup({
			"opener":".btn-enter",
			"popup_holder":"#enter",
			"close_btn":"#forget-link, #add-new-account, .btn-close"
		}).popup({
			"opener":"#add-new-account",
			"popup_holder":"#registration",
			"close_btn":".info-registration, #registration-done, .btn-close"
		}).popup({
			"opener":"#forget-link",
			"popup_holder":"#recapture-password",
			"close_btn":"#remember-link, .btn-close"
		}).popup({
			"opener":"#remember-link",
			"popup_holder":"#enter",
			"close_btn":"#forget-link, #add-new-account, .btn-close"
		}).popup({
			"opener":"#registration-done",
			"popup_holder":"#enter",
			"close_btn":"#forget-link, #add-new-account, .btn-close"
		}).popup({
			"opener":".info-registration",
			"popup_holder":"#registration-info",
			"close_btn":"#registration-want, .btn-close"
		}).popup({
			"opener":"#registration-want",
			"popup_holder":"#registration",
			"close_btn":".info-registration, #registration-done, .btn-close"
		});
	})();

	(function popup() {
		$("body").popup().popup({

		}).popup({

		});
	})();
});

$.fn.tabset = function(o){
	var o = $.extend({
		"tab":".tab:not(.inbox)",
		"tab_control":".tab-nav:not(.inbox)",
		"tab_control_parent":"",
		"tab_control_item":"li",
		"a_class":"active",
		"t_a_class":"active",
		"style": {
			"forActive": {"left":"0"},
			"forInActive": {"left":"-9999px"}
		}
	},o);
	return this.each(function(){
		var tabset=$(this),
			tab=$(o.tab,tabset),
			ctrl_pnt=$(o.tab_control_parent,tabset),
			ctrl=$(o.tab_control,tabset).size() ? $(o.tab_control,tabset):$(o.tab_control,ctrl_pnt),
			ctrl_item=$(o.tab_control_item,ctrl),
			a_class={"name":o.a_class,"selector":"."+o.a_class},
			t_a_class={"name":o.t_a_class,"selector":"."+o.t_a_class},
			style=o.style;
			ctrl_item.click(function(e){
				var index=$(this).index(),
					curTab=tab.filter(t_a_class.selector).size() ? tab.filter(t_a_class.selector):tab.filter(':visible'),
					nextTab=tab.eq(index);
				$(this).parent().find(o.tab_control_item+a_class.selector).removeClass(a_class.name);
				$(this).addClass(a_class.name);
				if(style){
					curTab.css(style.forInActive).removeClass(t_a_class.name);
					nextTab.css(style.forActive).addClass(t_a_class.name);
				}else{
					curTab.removeClass(t_a_class.name);
					nextTab.addClass(t_a_class.name);
				}
				e.preventDefault();
			});
	});
}

jQuery.fn.fadeGallery = function(_options){
	var _options = jQuery.extend({
		slideElements:'.slideset > li',
		pagerLinks:'.paging li',
		btnNext:'a.btn-next',
		btnPrev:'a.btn-prev',
		btnPlayPause:'a.play-pause',
		pausedClass:'paused',
		playClass:'playing',
		activeClass:'active',
		pauseOnHover:true,
		autoRotation:false,
		autoHeight:true,
		switchTime:3000,
		duration:650,
		event:'click'
	},_options);

	return this.each(function(){
		var _this = jQuery(this);
		var _slides = jQuery(_options.slideElements, _this);
		var _pagerLinks = jQuery(_options.pagerLinks, _this);
		var _btnPrev = jQuery(_options.btnPrev, _this);
		var _btnNext = jQuery(_options.btnNext, _this);
		var _btnPlayPause = jQuery(_options.btnPlayPause, _this);
		var _pauseOnHover = _options.pauseOnHover;
		var _autoRotation = _options.autoRotation;
		var _activeClass = _options.activeClass;
		var _pausedClass = _options.pausedClass;
		var _playClass = _options.playClass;
		var _autoHeight = _options.autoHeight;
		var _duration = _options.duration;
		var _switchTime = _options.switchTime;
		var _controlEvent = _options.event;

		var _hover = false;
		var _prevIndex = 0;
		var _currentIndex = 0;
		var _slideCount = _slides.length;
		var _timer;
		if(!_slideCount) return;
		_slides.hide().eq(_currentIndex).show();
		if(_autoRotation) _this.removeClass(_pausedClass).addClass(_playClass);
		else _this.removeClass(_playClass).addClass(_pausedClass);

		if(_btnPrev.length) {
			_btnPrev.bind(_controlEvent,function(){
				prevSlide();
				return false;
			});
		}
		if(_btnNext.length) {
			_btnNext.bind(_controlEvent,function(){
				nextSlide();
				return false;
			});
		}
		if(_pagerLinks.length) {
			_pagerLinks.each(function(_ind){
				jQuery(this).bind(_controlEvent,function(){
					if(_currentIndex != _ind) {
						_prevIndex = _currentIndex;
						_currentIndex = _ind;
						switchSlide();
					}
					return false;
				});
			});
		}

		if(_btnPlayPause.length) {
			_btnPlayPause.bind(_controlEvent,function(){
				if(_this.hasClass(_pausedClass)) {
					_this.removeClass(_pausedClass).addClass(_playClass);
					_autoRotation = true;
					autoSlide();
				} else {
					if(_timer) clearRequestTimeout(_timer);
					_this.removeClass(_playClass).addClass(_pausedClass);
				}
				return false;
			});
		}

		function prevSlide() {
			_prevIndex = _currentIndex;
			if(_currentIndex > 0) _currentIndex--;
			else _currentIndex = _slideCount-1;
			switchSlide();
		}
		function nextSlide() {
			_prevIndex = _currentIndex;
			if(_currentIndex < _slideCount-1) _currentIndex++;
			else _currentIndex = 0;
			switchSlide();
		}
		function refreshStatus() {
			if(_pagerLinks.length) _pagerLinks.removeClass(_activeClass).eq(_currentIndex).addClass(_activeClass);
			_slides.eq(_prevIndex).removeClass(_activeClass);
			_slides.eq(_currentIndex).addClass(_activeClass);
		}
		function switchSlide() {
			_slides.stop(true,true);
			_slides.eq(_prevIndex).fadeOut(_duration);
			_slides.eq(_currentIndex).fadeIn(_duration);
			refreshStatus();
			autoSlide();
			if (_this.hasClass("gallery4")) {
				initFadeGallery();
			};
		}

		function autoSlide() {
			if(!_autoRotation || _hover) return;
			if(_timer) clearRequestTimeout(_timer);
			_timer = requestTimeout(nextSlide,_switchTime+_duration);
			var _tagName = $(this).hasClass();
		}
		if(_pauseOnHover) {
			_this.hover(function(){
				_hover = true;
				if(_timer) clearRequestTimeout(_timer);
			},function(){
				_hover = false;
				autoSlide();
			});
		}


		$('.pagination-box .count').text($('li',_this).length);
		$frame=null;
		function initFadeGallery(){
			if ('fadeGallery' in $.fn) {
				$('.pagination-box .number-page').text(_currentIndex + 1);
				var $frame = $(' .gallery4');
				$frame.each(function(){
					var _thisHolder = $(' .gallery4 .pagination-box .number-page');
					function prevSlide1() {
						$('_thisHolder').text(_currentIndex + 1);
						_prevIndex = _currentIndex;
						if(_currentIndex > 0) _currentIndex--;
						else _currentIndex = _slideCount-1;
						switchSlide1();
					}
					function nextSlide1() {
						$('_thisHolder').text(_currentIndex + 1);
						_prevIndex = _currentIndex;
						if(_currentIndex < _slideCount-1) _currentIndex++;
						else _currentIndex = 0;
						switchSlide1();
					}
					function refreshStatus1() {
						if(_pagerLinks.length) _pagerLinks.removeClass(_activeClass).eq(_currentIndex).addClass(_activeClass);
						_slides.eq(_prevIndex).removeClass(_activeClass);
						_slides.eq(_currentIndex).addClass(_activeClass);
					}
					function switchSlide1() {
						_slides.stop(true,true);
						_slides.eq(_prevIndex).fadeOut(_duration);
						_slides.eq(_currentIndex).fadeIn(_duration);
						refreshStatus1();
						autoSlide1();
					}
					function autoSlide1() {
						$('_thisHolder').text(_currentIndex + 1);
						if(!_autoRotation || _hover) return;
						if(_timer) clearRequestTimeout(_timer);
						_timer = requestTimeout(nextSlide,_switchTime+_duration);
					}
					refreshStatus1();
					autoSlide1();
					console.log('1111');
				});
			};
		};

		$('.gallery4 .btn-next, .gallery4 .btn-prev').click(function(){
			initFadeGallery()
		});
		
		refreshStatus();
		autoSlide();
		
	});
}

$.fn.popup = function(o){
	var o = $.extend({
				"opener":".order-link:first>a",
				"popup_holder":".popup-box.p-feedback",
				"popup":".popup-box",
				"close_btn":".btn-close",
				"close":function(){},
				"beforeOpen":function(popup){$(popup).css("left",0).hide()}
			},o);
	return this.each(function(){
		var container=$(this),
			opener=$(o.opener,container),
			popup_holder=$(o.popup_holder,container),
			popup=$(o.popup,popup_holder),
			close=$(o.close_btn,popup),
			bg=$('.bg',popup_holder);
			popup.css('margin',0);
			opener.click(function(e){
				o.beforeOpen.apply(this,[popup_holder]);
				popup_holder.fadeIn(400);
				alignPopup();
				bgResize();
				e.preventDefault();
			});
		function alignPopup(){
				if((($(window).height() / 2) - (popup.outerHeight() / 2))+ $(window).scrollTop()<0){
					popup.css({'top':0,'left': (($(window).width() - popup.outerWidth())/2) + $(window).scrollLeft()});
					return false;
				}
				popup.css({
					'top': (($(window).height()-popup.outerHeight())/2) + $(window).scrollTop(),
					'left': (($(window).width() - popup.outerWidth())/2) + $(window).scrollLeft()
				});
		}
		function bgResize(){
			var _w=$(window).width(),
				_h=$(document).height();
			bg.css({"height":_h,"width":_w+$(window).scrollLeft()});
		}
		$(window).resize(function(){
			if(popup_holder.is(":visible")){
				bgResize();
				alignPopup();
			}
		});
		if(popup_holder.is(":visible")){
				bgResize();
				alignPopup();
		}
		close.add(bg).click(function(e){
			var closeEl=this;
			popup_holder.fadeOut(400,function(){
				o.close.apply(closeEl,[popup_holder]);
			});
			e.preventDefault();
		});
		$('body').keydown(function(e){
			if(e.keyCode=='27'){
				popup_holder.fadeOut(400);
			}
		})
	});
}

/*
 * Browser platform detection
 */
PlatformDetect = (function(){
	var detectModules = {};

	return {
		options: {
			cssPath: window.pathInfo ? pathInfo.base + pathInfo.css : 'css/'
		},
		addModule: function(obj) {
			detectModules[obj.type] = obj;
		},
		addRule: function(rule) {
			if(this.matchRule(rule)) {
				this.applyRule(rule);
				return true;
			}
		},
		matchRule: function(rule) {
			return detectModules[rule.type].matchRule(rule);
		},
		applyRule: function(rule) {
			var head = document.getElementsByTagName('head')[0], fragment, cssText;
			if(rule.css) {
				cssText = '<link rel="stylesheet" href="' + this.options.cssPath + rule.css + '" />';
				if(head) {
					fragment = document.createElement('div');
					fragment.innerHTML = cssText;
					head.appendChild(fragment.childNodes[0]);
				} else {
					document.write(cssText);
				}
			}

			if(rule.meta) {
				if(head) {
					fragment = document.createElement('div');
					fragment.innerHTML = rule.meta;
					head.appendChild(fragment.childNodes[0]);
				} else {
					document.write(rule.meta);
				}
			}
		},
		matchVersions: function(host, target) {
			target = target.toString();
			host = host.toString();

			var majorVersionMatch = parseInt(target, 10) === parseInt(host, 10);
			var minorVersionMatch = (host.length > target.length ? host.indexOf(target) : target.indexOf(host)) === 0;

			return majorVersionMatch && minorVersionMatch;
		}
	};
}());

// iPad detection
PlatformDetect.addModule({
	type: 'ipad',
	parseUserAgent: function() {
		var match = /(iPad).*OS ([0-9_]*) .*/.exec(navigator.userAgent);
		if(match) {
			return {
				retina: window.devicePixelRatio > 1,
				version: match[2].replace(/_/g, '.')
			};
		}
	},
	matchRule: function(rule) {
		this.matchData = this.matchData || this.parseUserAgent();
		if(this.matchData) {
			var matchVersion = rule.version ? PlatformDetect.matchVersions(this.matchData.version, rule.version) : true;
			var matchDevice = rule.deviceType ? (rule.deviceType === 'retina' && this.matchData.retina) || (rule.deviceType === 'noretina' && !this.matchData.retina) : true;
			return matchVersion && matchDevice;
		}
	}
});

// Android detection
PlatformDetect.addModule({
	type: 'android',
	parseUserAgent: function() {
		var match = /(Android) ([0-9.]*).*/.exec(navigator.userAgent);
		if(match) {
			return {
				deviceType: navigator.userAgent.indexOf('Mobile') > 0 ? 'mobile' : 'tablet',
				version: match[2]
			};
		}
	},
	matchRule: function(rule) {
		this.matchData = this.matchData || this.parseUserAgent();
		if(this.matchData) {
			var matchVersion = rule.version ? PlatformDetect.matchVersions(this.matchData.version, rule.version) : true;
			var matchDevice = rule.deviceType ? rule.deviceType === this.matchData.deviceType : true;
			return matchVersion && matchDevice;
		}
	}
});

// Detect rules
PlatformDetect.addRule({type: 'ipad', css: 'ipad.css', meta: '<meta name="viewport" content="width=980">'});
PlatformDetect.addRule({type: 'android', deviceType: 'tablet', css: 'android.css', meta: '<meta name="viewport" content="width=980">'});
/*! device.js 0.1.58 */
(function(){var a,b,c,d,e,f,g,h,i,j;a=window.device,window.device={},c=window.document.documentElement,j=window.navigator.userAgent.toLowerCase(),device.ios=function(){return device.iphone()||device.ipod()||device.ipad()},device.iphone=function(){return d("iphone")},device.ipod=function(){return d("ipod")},device.ipad=function(){return d("ipad")},device.android=function(){return d("android")},device.androidPhone=function(){return device.android()&&d("mobile")},device.androidTablet=function(){return device.android()&&!d("mobile")},device.blackberry=function(){return d("blackberry")||d("bb10")||d("rim")},device.blackberryPhone=function(){return device.blackberry()&&!d("tablet")},device.blackberryTablet=function(){return device.blackberry()&&d("tablet")},device.windows=function(){return d("windows")},device.windowsPhone=function(){return device.windows()&&d("phone")},device.windowsTablet=function(){return device.windows()&&d("touch")},device.fxos=function(){return d("(mobile; rv:")||d("(tablet; rv:")},device.fxosPhone=function(){return device.fxos()&&d("mobile")},device.fxosTablet=function(){return device.fxos()&&d("tablet")},device.mobile=function(){return device.androidPhone()||device.iphone()||device.ipod()||device.windowsPhone()||device.blackberryPhone()||device.fxosPhone()},device.tablet=function(){return device.ipad()||device.androidTablet()||device.blackberryTablet()||device.windowsTablet()||device.fxosTablet()},device.portrait=function(){return 90!==Math.abs(window.orientation)},device.landscape=function(){return 90===Math.abs(window.orientation)},device.noConflict=function(){return window.device=a,this},d=function(a){return-1!==j.indexOf(a)},f=function(a){var b;return b=new RegExp(a,"i"),c.className.match(b)},b=function(a){return f(a)?void 0:c.className+=" "+a},h=function(a){return f(a)?c.className=c.className.replace(a,""):void 0},device.ios()?device.ipad()?b("ios ipad tablet"):device.iphone()?b("ios iphone mobile"):device.ipod()&&b("ios ipod mobile"):device.android()?device.androidTablet()?b("android tablet"):b("android mobile"):device.blackberry()?device.blackberryTablet()?b("blackberry tablet"):b("blackberry mobile"):device.windows()?device.windowsTablet()?b("windows tablet"):device.windowsPhone()?b("windows mobile"):b("desktop"):device.fxos()?device.fxosTablet()?b("fxos tablet"):b("fxos mobile"):b("desktop"),e=function(){return device.landscape()?(h("portrait"),b("landscape")):(h("landscape"),b("portrait"))},i="onorientationchange"in window,g=i?"orientationchange":"resize",window.addEventListener?window.addEventListener(g,e,!1):window.attachEvent?window.attachEvent(g,e):window[g]=e,e()}).call(this);

/*
 * Drop in replace functions for setTimeout() & setInterval() that
 * make use of requestAnimationFrame() for performance where available
 * http://www.joelambert.co.uk
 *
 * Copyright 2011, Joe Lambert.
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */

// requestAnimationFrame() shim by Paul Irish
// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
window.requestAnimFrame = (function() {
	return  window.requestAnimationFrame   ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame    ||
			window.oRequestAnimationFrame      ||
			window.msRequestAnimationFrame     ||
			function(/* function */ callback, /* DOMElement */ element){
				window.setTimeout(callback, 1000 / 60);
			};
})();
/**
 * Behaves the same as setTimeout except uses requestAnimationFrame() where possible for better performance
 * @param {function} fn The callback function
 * @param {int} delay The delay in milliseconds
 */

window.requestTimeout = function(fn, delay) {
	if( !window.requestAnimationFrame      	&&
		!window.webkitRequestAnimationFrame &&
		!window.mozRequestAnimationFrame    &&
		!window.oRequestAnimationFrame      &&
		!window.msRequestAnimationFrame)
			return window.setTimeout(fn, delay);

	var start = new Date().getTime(),
		handle = new Object();

	function loop(){
		var current = new Date().getTime(),
			delta = current - start;

		delta >= delay ? fn.call() : handle.value = requestAnimFrame(loop);
	};

	handle.value = requestAnimFrame(loop);
	return handle;
};

/**
 * Behaves the same as clearInterval except uses cancelRequestAnimationFrame() where possible for better performance
 * @param {int|object} fn The callback function
 */
window.clearRequestTimeout = function(handle) {
    window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
    window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value)	:
    window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
    window.oCancelRequestAnimationFrame	? window.oCancelRequestAnimationFrame(handle.value) :
    window.msCancelRequestAnimationFrame ? msCancelRequestAnimationFrame(handle.value) :
    clearTimeout(handle);
}