var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

// page init
jQuery(function(){
	initTabs();
	initLightbox();
	initScrollSection();
	initAnchorNav();
	initAsideMenu();
	initMapAnimate();
	getFoodDetails();
	showStickyNav();
});
jQuery(window).load(function() {
	initBackgroundResize();
});


function showStickyNav(){
	var noscroll = false;

	var stickyNavTop = $('#stickynav').offset().top;  	  
	var stickyNav = function(){  
		var scrollTop = $(window).scrollTop();

			if (scrollTop > stickyNavTop && $(window).width() >= 1000 && noscroll != true) {   
			    $('#stickynav').addClass('sticky');
			} 
			else {  
			    $('#stickynav').removeClass('sticky');  
			}  	
			if ($('#stopScroll').visible()) noscroll = true;
			if ($('#resumeScroll').visible()) noscroll = false;
	};  

	stickyNav();  
	  
	$(window).scroll(function() {  
	    stickyNav();   
	});  

}

function getFoodDetails(){
  // add location button event
  jQuery(".lightbox").click(function(e){
  	var requestedId = this.id;

    // now, make an ajax call to get the details of that food
    jQuery.ajax({
    	url : '/api/food/'+requestedId,
    	dataType : 'json',
    	type : 'GET',
    	success : function(response){
    		// success - for now just log it
    		console.log(response);
    		updateLightBox(response)

    	},
    	error : function(err){

    		console.log("something went wrong trying to get the food details!");
    		console.error(err);
    	}
    });

    function updateLightBox(response){
    	console.log(response);
    	$("#productName").text(response.data.name);
    	$("#serving_size").text(response.data.nutritionInfo.serving_size + " " + response.data.nutritionInfo.serving_size_uom);
		$("#servings_per_container").text(response.data.nutritionInfo.servings_per_container);
		$("#calories_per_serving").text(response.data.nutritionInfo.calories_per_serving);
		if (!response.data.nutritionInfo.calories_per_serving) $("#calories_per_serving").text("Unknown");
		if (response.data.nutritionInfo.calories_flag) $("#calories_warning").css("display", "block");
		if (!response.data.nutritionInfo.calories_flag) $("#calories_warning").css("display", "none");
		if (response.data.otherInfo.nongmo == false) $("#gmo").text("Yes");
		if (response.data.otherInfo.nongmo == true) $("#gmo").text("No");
		if (response.data.otherInfo.organic == false) $("#organic").text("No");
		if (response.data.otherInfo.organic == true) $("#organic").text("Yes");		
		//fat
    	$("#total_fat").text(response.data.nutritionInfo.total_fat_per_serving + " " + response.data.nutritionInfo.total_fat_uom);
   		if (response.data.nutritionInfo.total_fat_flag) $("#total_fat_flag").html("<span class=\"bad\">Bad</span>");
		if (!response.data.nutritionInfo.total_fat_flag) $("#total_fat_flag").html("&nbsp;");	
    	$("#dvp_total_fat").text(response.data.nutritionInfo.dvp_total_fat + "%");
		//carbs
    	$("#carbo_per_serving").text(response.data.nutritionInfo.carbo_per_serving + " " + response.data.nutritionInfo.carbo_uom);
   		if (response.data.nutritionInfo.carbo_flag) $("#carbo_flag").html("<span class=\"bad\">Bad</span>");
		if (!response.data.nutritionInfo.carbo_flag) $("#carbo_flag").html("&nbsp;");	
    	$("#dvp_carbo").text(response.data.nutritionInfo.dvp_carbo + "%"); 
    	//sugars	
       	$("#sugar_per_serving").text(response.data.nutritionInfo.sugar_per_serving + " " + response.data.nutritionInfo.sugar_uom); 	
		//protein
    	$("#protein_per_serving").text(response.data.nutritionInfo.protein_per_serving + " " + response.data.nutritionInfo.protein_uom);
   		if (response.data.nutritionInfo.protein_flag) $("#protein_flag").html("<span class=\"good\">Good</span>");
		if (!response.data.nutritionInfo.protein_flag) $("#protein_flag").html("&nbsp;");	
    	$("#dvp_protein").text(response.data.nutritionInfo.dvp_protein + "%");
		//saturated fat
    	$("#saturated_fat_per_serving").text(response.data.nutritionInfo.saturated_fat_per_serving + " " + response.data.nutritionInfo.saturated_fat_uom);
   		if (response.data.nutritionInfo.saturated_fat_flag) $("#saturated_fat_flag").html("<span class=\"bad\">Bad</span>");
		if (!response.data.nutritionInfo.saturated_fat_flag) $("#saturated_fat_flag").html("&nbsp;");	
    	$("#dvp_saturated_fat").text(response.data.nutritionInfo.dvp_saturated_fat + "%");  
		//trans fat
    	$("#trans_fat_per_serving").text(response.data.nutritionInfo.trans_fat_per_serving + " " + response.data.nutritionInfo.trans_fat_uom);
   		if (response.data.nutritionInfo.trans_fat_flag) $("#trans_fat_flag").html("<span class=\"bad\">Bad</span>");
		if (!response.data.nutritionInfo.trans_fat_flag) $("#trans_fat_flag").html("&nbsp;");
		//Cholesterol
    	$("#cholesterol_per_serving").text(response.data.nutritionInfo.cholesterol_per_serving + " " + response.data.nutritionInfo.cholesterol_uom);
   		if (response.data.nutritionInfo.cholesterol_flag) $("#cholesterol_flag").html("<span class=\"bad\">Bad</span>");
		if (!response.data.nutritionInfo.cholesterol_flag) $("#cholesterol_flag").html("&nbsp;");	
    	$("#dvp_cholesterol").text(response.data.nutritionInfo.dvp_cholesterol + "%");	
		//Sodium
    	$("#sodium_per_serving").text(response.data.nutritionInfo.sodium_per_serving + " " + response.data.nutritionInfo.sodium_uom);
   		if (response.data.nutritionInfo.sodium_flag) $("#sodium_flag").html("<span class=\"bad\">Bad</span>");
		if (!response.data.nutritionInfo.sodium_flag) $("#sodium_flag").html("&nbsp;");	
    	$("#dvp_sodium").text(response.data.nutritionInfo.dvp_sodium + "%");
		//Vitamin A
   		if (response.data.nutritionInfo.vitamin_a_flag) $("#vitamin_a_flag").html("<span class=\"good\">Good</span>");
		if (!response.data.nutritionInfo.vitamin_a_flag) $("#vitamin_a_flag").html("&nbsp;");	
    	$("#dvp_vitamin_a").text(response.data.nutritionInfo.dvp_vitamin_a + "%");
		//Vitamin C
   		if (response.data.nutritionInfo.vitamin_c_flag) $("#vitamin_c_flag").html("<span class=\"good\">Good</span>");
		if (!response.data.nutritionInfo.vitamin_c_flag) $("#vitamin_c_flag").html("&nbsp;");	
    	$("#dvp_vitamin_c").text(response.data.nutritionInfo.dvp_vitamin_c + "%");
		//Calcium
   		if (response.data.nutritionInfo.calcium_flag) $("#calcium_flag").html("<span class=\"good\">Good</span>");
		if (!response.data.nutritionInfo.calcium_flag) $("#calcium_flag").html("&nbsp;");	
    	$("#dvp_calcium").text(response.data.nutritionInfo.dvp_calcium + "%");
		//Iron
   		if (response.data.nutritionInfo.iron_flag) $("#iron_flag").html("<span class=\"good\">Good</span>");
		if (!response.data.nutritionInfo.iron_flag) $("#iron_flag").html("&nbsp;");	
    	$("#dvp_iron").text(response.data.nutritionInfo.dvp_iron + "%");
		//Fiber
    	$("#fiber_per_serving").text(response.data.nutritionInfo.fiber_per_serving + " " + response.data.nutritionInfo.fiber_uom);
   		if (response.data.nutritionInfo.fiber_flag) $("#fiber_flag").html("<span class=\"good\">Good</span>");
		if (!response.data.nutritionInfo.fiber_flag) $("#fiber_flag").html("&nbsp;");	
    	$("#dvp_protein").text(response.data.nutritionInfo.dvp_fiber + "%");

    	//ingredients
    	$("#ingredientsList").text(response.ingredients);
    	$("#ingredientsNum").text(response.data.otherInfo.ingredients.length);

    	//price
    	$("#productPrice").text(response.data.otherInfo.price);

    	//location 
    	$("#locationName").text(response.data.otherInfo.productLocation.locationName);
		$("#locationImage").attr("src","img/"+response.data.otherInfo.productLocation.locationImage+".png");

		//if salmon, show video
		if (response.data.name == "Wild Salmon with Orzo Pasta, Spinach & Zucchini") $(".video").show();
		else $(".video").hide();

		//if rice, show cards
		if (response.data.name == "Brown Jasmine Rice" || response.data.name == "Jasmine Rice") {
			$(".recipe").show();
			$(".news").show();
		}
		else {
			$(".recipe").hide();
			$(".news").hide();	
		}
    }
  
  });
}

// map points animate, init
function initMapAnimate() {
	var animSpeed = 750;
	var activeClass = 'active';
	var win = jQuery(window);
	var showingFlag = false;

	jQuery('.map-holder').each(function() {
		var holder = jQuery(this);
		var holderHeight = holder.height();
		var holderOffsetTop = holder.offset().top;
		var winHeight = win.height();

		win.bind('scroll resize load', function(e) {
			if(e.type = 'resize') {
				holderOffsetTop = holder.offset().top;
				winHeight = win.height();
				holderHeight = holder.height();
			}
			var winScrollTop = win.scrollTop();
			if(holderOffsetTop > winScrollTop && holderOffsetTop + holderHeight < winScrollTop + winHeight) {
				showingFlag = true;
				holder.addClass(activeClass);
				// showSimbol(0);
			} else {
				showingFlag = false;
				holder.removeClass(activeClass);
				// clearTimeout(timer);
				// symbols.add(marker).stop().css({opacity:0});
			}
		});
	});
}

// aside menu
function initAsideMenu() {
	var activeClass = 'active';
	var doc = jQuery(document);
	var container = jQuery('aside.panel');

	container.each(function() {
		var container = jQuery(this);
		var opener = container.find('.open-link');
		opener.bind('click', function(e) {
			e.preventDefault();
			if(container.hasClass(activeClass)) {
				container.removeClass(activeClass);
			} else {
				container.addClass(activeClass);
			}
		});
	});

	doc.bind('click', function(e) {
		var target = jQuery(e.target);

		if(!target.closest(container).length) {
			container.removeClass(activeClass);
		}
	});
}

/* anchor links */
function initAnchorNav(){
	var nameSpace = '.AnchorLinks';
	var activeClass = 'active';
	var links = jQuery('aside .bullets a');
	var page = jQuery('html, body');
	var win = jQuery(window);
	var animSpeed = 650;
	var doc = jQuery(document);

	links.each(function(){
		var link = jQuery(this);
		var href = link.attr('href');
		if(href == '#') return;
		href = href.substr(href.lastIndexOf('#'));
		var anchor = jQuery(href);
		link.data('anchor', anchor);
		link.on('click', function(e){
			e.preventDefault();
			page.stop().animate({
				scrollTop: anchor.offset().top + 2
			}, {
				duration: animSpeed
			});
		});
	});

	function activeAnchor(){
		if(!links.length) return;
		 var winT = win.scrollTop();
		links.closest('li').removeClass(activeClass);
		var activeLink = links.filter(function(){
			var link = jQuery(this);
			if(link.data('anchor')){
				return link.data('anchor').offset().top <= winT
			}
			else return false;
		}).last();
		if(activeLink.length){
			activeLink.closest('li').addClass(activeClass);
		}
		if(winT + win.height() == doc.height()) {
			links.closest('li').removeClass(activeClass);
			links.last().closest('li').addClass(activeClass);
		}
	}

	var scrollHandler = function(){
		activeAnchor()
	};

	win.on('scroll' + nameSpace + ' resize' + nameSpace + ' orientationchange' + nameSpace, function(e){
		if(e.type == 'resize' || e.type == 'orientationchange'){
			scrollHandler();
		};
		if(e.type == 'scroll'){
			scrollHandler();
		};
	});
};

// content tabs init
function initTabs() {
	jQuery('ul.tabset').contentTabs({
		addToParent: true,
		tabLinks: 'a'
	});
}

// stretch background to fill blocks
function initBackgroundResize() {
	jQuery('.background').each(function() {
		ImageStretcher.add({
			container: this,
			image: 'img'
		});
	});
}

// init function scroll to section
function initScrollSection() {
	var animSpeed = 700;
	var page = jQuery('html, body');
	var btnsSections = jQuery('.btn-next-section');

	btnsSections.each(function(){
		var btn = jQuery(this);
		var section = jQuery(btn.attr('href'));

		btn.bind('click', function(e) {
			e.preventDefault();
			page.animate({
				scrollTop: section.offset().top
			},{
				duration: animSpeed
			});
		})
	});
}

// fancybox modal popup init
function initLightbox() {
	jQuery('a.lightbox, a[data-rel*="lightbox"]').each(function(){
		var link = jQuery(this);
		link.attr('rel', link.attr('data-rel')).fancybox({
			padding: 0,
			margin: 20,
			cyclic: false,
			autoScale: true,
			overlayShow: true,
			overlayOpacity: 0.65,
			overlayColor: '#000000',
			titlePosition: 'inside',
			onComplete: function(box) {
				if(link.attr('href').indexOf('#') === 0) {
					jQuery('#fancybox-content').find('a.close').unbind('click.fb').bind('click.fb', function(e){
						jQuery.fancybox.close();
						e.preventDefault();
					});
				}
			}
		});
	});
}

/* Fancybox overlay fix */
jQuery(function(){
	// detect device type
	var isTouchDevice = ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch;
	var isWinPhoneDevice = navigator.msPointerEnabled && /MSIE 10.*Touch/.test(navigator.userAgent);

	if(!isTouchDevice && !isWinPhoneDevice) {
		// create <style> rules
		var head = document.getElementsByTagName('head')[0],
			style = document.createElement('style'),
			rules = document.createTextNode('#fancybox-overlay'+'{'+
				'position:fixed;'+
				'top:0;'+
				'left:0;'+
			'}');

		// append style element
		style.type = 'text/css';
		if(style.styleSheet) {
			style.styleSheet.cssText = rules.nodeValue;
		} else {
			style.appendChild(rules);
		}
		head.appendChild(style);
	}
});

/*
 * Image Stretch module
 */
var ImageStretcher = {
	getDimensions: function(data) {
		// calculate element coords to fit in mask
		var ratio = data.imageRatio || (data.imageWidth / data.imageHeight),
			slideWidth = data.maskWidth,
			slideHeight = slideWidth / ratio;

		if(slideHeight < data.maskHeight) {
			slideHeight = data.maskHeight;
			slideWidth = slideHeight * ratio;
		}
		return {
			width: slideWidth,
			height: slideHeight,
			top: (data.maskHeight - slideHeight) / 2,
			left: (data.maskWidth - slideWidth) / 2
		};
	},
	getRatio: function(image) {
		if(image.prop('naturalWidth')) {
			return image.prop('naturalWidth') / image.prop('naturalHeight');
		} else {
			var img = new Image();
			img.src = image.prop('src');
			return img.width / img.height;
		}
	},
	imageLoaded: function(image, callback) {
		var self = this;
		var loadHandler = function() {
			callback.call(self);
		};
		if(image.prop('complete')) {
			loadHandler();
		} else {
			image.one('load', loadHandler);
		}
	},
	resizeHandler: function() {
		var self = this;
		jQuery.each(this.imgList, function(index, item) {
			if(item.image.prop('complete')) {
				self.resizeImage(item.image, item.container);
			}
		});
	},
	resizeImage: function(image, container) {
		this.imageLoaded(image, function() {
			var styles = this.getDimensions({
				imageRatio: this.getRatio(image),
				maskWidth: container.width(),
				maskHeight: container.height()
			});
			image.css({
				width: styles.width,
				height: styles.height,
				marginTop: styles.top,
				marginLeft: styles.left
			});
		});
	},
	add: function(options) {
		var container = jQuery(options.container ? options.container : window),
			image = typeof options.image === 'string' ? container.find(options.image) : jQuery(options.image);

		// resize image
		this.resizeImage(image, container);

		// add resize handler once if needed
		if(!this.win) {
			this.resizeHandler = jQuery.proxy(this.resizeHandler, this);
			this.imgList = [];
			this.win = jQuery(window);
			this.win.on('resize orientationchange', this.resizeHandler);
		}

		// store item in collection
		this.imgList.push({
			container: container,
			image: image
		});
	}
};

/*
 * Window Height CSS rules
 */
;(function() {
	var styleSheet;

	var getWindowHeight = function() {
		return window.innerHeight || document.documentElement.clientHeight;
	};

	var createStyleTag = function() {
		// create style tag
		var styleTag = jQuery('<style>').appendTo('head');
		styleSheet = styleTag.prop('sheet') || styleTag.prop('styleSheet');

		// crossbrowser style handling
		var addCSSRule = function(selector, rules, index) {
			if(styleSheet.insertRule) {
				styleSheet.insertRule(selector + '{' + rules + '}', index);
			} else {
				styleSheet.addRule(selector, rules, index);
			}
		};

		// create style rules
		addCSSRule('.win-min-height', 'min-height:0');
		addCSSRule('.win-height', 'height:auto');
		addCSSRule('.win-max-height', 'max-height:100%');
		resizeHandler();
	};

	var resizeHandler = function() {
		// handle changes in style rules
		var currentWindowHeight = getWindowHeight(),
			styleRules = styleSheet.cssRules || styleSheet.rules;
		
		jQuery.each(styleRules, function(index, currentRule) {
			var currentProperty = currentRule.selectorText.toLowerCase().replace('.win-', '').replace('-h','H');
			currentRule.style[currentProperty] = currentWindowHeight + 'px';
		});
	};

	createStyleTag();
	jQuery(window).on('resize orientationchange', resizeHandler);
}());

/*
 * jQuery Tabs plugin
 */
;(function($){
	$.fn.contentTabs = function(o){
		// default options
		var options = $.extend({
			activeClass:'active',
			addToParent:false,
			autoHeight:false,
			autoRotate:false,
			checkHash:false,
			animSpeed:400,
			switchTime:3000,
			effect: 'none', // "fade", "slide"
			tabLinks:'a',
			attrib:'href',
			event:'click'
		},o);

		return this.each(function(){
			var tabset = $(this), tabs = $();
			var tabLinks = tabset.find(options.tabLinks);
			var tabLinksParents = tabLinks.parent();
			var prevActiveLink = tabLinks.eq(0), currentTab, animating;
			var tabHolder;

			// handle location hash
			if(options.checkHash && tabLinks.filter('[' + options.attrib + '="' + location.hash + '"]').length) {
				(options.addToParent ? tabLinksParents : tabLinks).removeClass(options.activeClass);
				setTimeout(function() {
					window.scrollTo(0,0);
				},1);
			}

			// init tabLinks
			tabLinks.each(function(){
				var link = $(this);
				var href = link.attr(options.attrib);
				var parent = link.parent();
				href = href.substr(href.lastIndexOf('#'));

				// get elements
				var tab = $(href);
				tabs = tabs.add(tab);
				link.data('cparent', parent);
				link.data('ctab', tab);

				// find tab holder
				if(!tabHolder && tab.length) {
					tabHolder = tab.parent();
				}

				// show only active tab
				var classOwner = options.addToParent ? parent : link;
				if(classOwner.hasClass(options.activeClass) || (options.checkHash && location.hash === href)) {
					classOwner.addClass(options.activeClass);
					prevActiveLink = link; currentTab = tab;
					tab.removeClass(tabHiddenClass).width('');
					contentTabsEffect[options.effect].show({tab:tab, fast:true});
				} else {
					var tabWidth = tab.width();
					if(tabWidth) {
						tab.width(tabWidth);
					}
					tab.addClass(tabHiddenClass);
				}

				// event handler
				link.bind(options.event, function(e){
					if(link != prevActiveLink && !animating) {
						switchTab(prevActiveLink, link);
						prevActiveLink = link;
					}
				});
				if(options.attrib === 'href') {
					link.bind('click', function(e){
						e.preventDefault();
					});
				}
			});

			// tab switch function
			function switchTab(oldLink, newLink) {
				animating = true;
				var oldTab = oldLink.data('ctab');
				var newTab = newLink.data('ctab');
				prevActiveLink = newLink;
				currentTab = newTab;

				// refresh pagination links
				(options.addToParent ? tabLinksParents : tabLinks).removeClass(options.activeClass);
				(options.addToParent ? newLink.data('cparent') : newLink).addClass(options.activeClass);

				// hide old tab
				resizeHolder(oldTab, true);
				contentTabsEffect[options.effect].hide({
					speed: options.animSpeed,
					tab:oldTab,
					complete: function() {
						// show current tab
						resizeHolder(newTab.removeClass(tabHiddenClass).width(''));
						contentTabsEffect[options.effect].show({
							speed: options.animSpeed,
							tab:newTab,
							complete: function() {
								if(!oldTab.is(newTab)) {
									oldTab.width(oldTab.width()).addClass(tabHiddenClass);
								}
								animating = false;
								resizeHolder(newTab, false);
								autoRotate();
							}
						});
					}
				});
			}

			// holder auto height
			function resizeHolder(block, state) {
				var curBlock = block && block.length ? block : currentTab;
				if(options.autoHeight && curBlock) {
					tabHolder.stop();
					if(state === false) {
						tabHolder.css({height:''});
					} else {
						var origStyles = curBlock.attr('style');
						curBlock.show().css({width:curBlock.width()});
						var tabHeight = curBlock.outerHeight(true);
						if(!origStyles) curBlock.removeAttr('style'); else curBlock.attr('style', origStyles);
						if(state === true) {
							tabHolder.css({height: tabHeight});
						} else {
							tabHolder.animate({height: tabHeight}, {duration: options.animSpeed});
						}
					}
				}
			}
			if(options.autoHeight) {
				$(window).bind('resize orientationchange', function(){
					tabs.not(currentTab).removeClass(tabHiddenClass).show().each(function(){
						var tab = jQuery(this), tabWidth = tab.css({width:''}).width();
						if(tabWidth) {
							tab.width(tabWidth);
						}
					}).hide().addClass(tabHiddenClass);

					resizeHolder(currentTab, false);
				});
			}

			// autorotation handling
			var rotationTimer;
			function nextTab() {
				var activeItem = (options.addToParent ? tabLinksParents : tabLinks).filter('.' + options.activeClass);
				var activeIndex = (options.addToParent ? tabLinksParents : tabLinks).index(activeItem);
				var newLink = tabLinks.eq(activeIndex < tabLinks.length - 1 ? activeIndex + 1 : 0);
				prevActiveLink = tabLinks.eq(activeIndex);
				switchTab(prevActiveLink, newLink);
			}
			function autoRotate() {
				if(options.autoRotate && tabLinks.length > 1) {
					clearTimeout(rotationTimer);
					rotationTimer = setTimeout(function() {
						if(!animating) {
							nextTab();
						} else {
							autoRotate();
						}
					}, options.switchTime);
				}
			}
			autoRotate();
		});
	};

	// add stylesheet for tabs on DOMReady
	var tabHiddenClass = 'js-tab-hidden';
	$(function() {
		var tabStyleSheet = $('<style type="text/css">')[0];
		var tabStyleRule = '.'+tabHiddenClass;
		tabStyleRule += '{position:absolute !important;left:-9999px !important;top:-9999px !important;display:block !important}';
		if (tabStyleSheet.styleSheet) {
			tabStyleSheet.styleSheet.cssText = tabStyleRule;
		} else {
			tabStyleSheet.appendChild(document.createTextNode(tabStyleRule));
		}
		$('head').append(tabStyleSheet);
	});

	// tab switch effects
	var contentTabsEffect = {
		none: {
			show: function(o) {
				o.tab.css({display:'block'});
				if(o.complete) o.complete();
			},
			hide: function(o) {
				o.tab.css({display:'none'});
				if(o.complete) o.complete();
			}
		},
		fade: {
			show: function(o) {
				if(o.fast) o.speed = 1;
				o.tab.fadeIn(o.speed);
				if(o.complete) setTimeout(o.complete, o.speed);
			},
			hide: function(o) {
				if(o.fast) o.speed = 1;
				o.tab.fadeOut(o.speed);
				if(o.complete) setTimeout(o.complete, o.speed);
			}
		},
		slide: {
			show: function(o) {
				var tabHeight = o.tab.show().css({width:o.tab.width()}).outerHeight(true);
				var tmpWrap = $('<div class="effect-div">').insertBefore(o.tab).append(o.tab);
				tmpWrap.css({width:'100%', overflow:'hidden', position:'relative'}); o.tab.css({marginTop:-tabHeight,display:'block'});
				if(o.fast) o.speed = 1;
				o.tab.animate({marginTop: 0}, {duration: o.speed, complete: function(){
					o.tab.css({marginTop: '', width: ''}).insertBefore(tmpWrap);
					tmpWrap.remove();
					if(o.complete) o.complete();
				}});
			},
			hide: function(o) {
				var tabHeight = o.tab.show().css({width:o.tab.width()}).outerHeight(true);
				var tmpWrap = $('<div class="effect-div">').insertBefore(o.tab).append(o.tab);
				tmpWrap.css({width:'100%', overflow:'hidden', position:'relative'});

				if(o.fast) o.speed = 1;
				o.tab.animate({marginTop: -tabHeight}, {duration: o.speed, complete: function(){
					o.tab.css({display:'none', marginTop:'', width:''}).insertBefore(tmpWrap);
					tmpWrap.remove();
					if(o.complete) o.complete();
				}});
			}
		}
	};
}(jQuery));

/*
 * Browser Detect script
 */
BrowserDetect = (function() {
	// script settings
	var options = {
		osVersion: true,
		minorBrowserVersion: true
	};

	// browser data
	var browserData = {
		browsers: {
			chrome: uaMatch(/Chrome\/([0-9\.]*)/),
			firefox: uaMatch(/Firefox\/([0-9\.]*)/),
			safari: uaMatch(/Version\/([0-9\.]*).*Safari/),
			opera: uaMatch(/Opera\/.*Version\/([0-9\.]*)/, /Opera\/([0-9\.]*)/),
			msie: uaMatch(/MSIE ([0-9\.]*)/, /Trident.*rv:([0-9\.]*)/)
		},
		engines: {
			webkit: uaContains('AppleWebKit'),
			trident: uaMatch(/(MSIE|Trident)/),
			gecko: uaContains('Gecko'),
			presto: uaContains('Presto')
		},
		platforms: {
			win: uaMatch(/Windows NT ([0-9\.]*)/),
			mac: uaMatch(/Mac OS X ([0-9_\.]*)/),
			linux: uaContains('X11', 'Linux')
		}
	};

	// perform detection
	var ua = navigator.userAgent;
	var detectData = {
		platform: detectItem(browserData.platforms),
		browser: detectItem(browserData.browsers),
		engine: detectItem(browserData.engines)
	};

	// private functions
	function uaMatch(regExp, altReg) {
		return function() {
			var result = regExp.exec(ua) || altReg && altReg.exec(ua);
			return result && result[1];
		};
	}
	function uaContains(word) {
		var args = Array.prototype.slice.apply(arguments);
		return function() {
			for(var i = 0; i < args.length; i++) {
				if(ua.indexOf(args[i]) < 0) {
					return;
				}
			}
			return true;
		};
	}
	function detectItem(items) {
		var detectedItem = null, itemName, detectValue;
		for(itemName in items) {
			if(items.hasOwnProperty(itemName)) {
				detectValue = items[itemName]();
				if(detectValue) {
					return {
						name: itemName,
						value: detectValue
					};
				}
			}
		}
	}

	// add classes to root element
	(function() {
		// helper functions
		var addClass = function(cls) {
			var html = document.documentElement;
			html.className += (html.className ? ' ' : '') + cls;
		};
		var getVersion = function(ver) {
			return typeof ver === 'string' ? ver.replace(/\./g, '_') : 'unknown';
		};

		// add classes
		if(detectData.platform) {
			addClass(detectData.platform.name);
			if(options.osVersion) {
				addClass(detectData.platform.name + '-' + getVersion(detectData.platform.value));
			}
		}
		if(detectData.engine) {
			addClass(detectData.engine.name);
		}
		if(detectData.browser) {
			addClass(detectData.browser.name);
			addClass(detectData.browser.name + '-' + parseInt(detectData.browser.value, 10));
			if(options.minorBrowserVersion) {
				addClass(detectData.browser.name + '-' + getVersion(detectData.browser.value));
			}
		}
	}());

	// export detection information
	return detectData;
}());

/*
 * FancyBox - jQuery Plugin
 * Simple and fancy lightbox alternative
 *
 * Examples and documentation at: http://fancybox.net
 * 
 * Copyright (c) 2008 - 2010 Janis Skarnelis
 * That said, it is hardly a one-person project. Many people have submitted bugs, code, and offered their advice freely. Their support is greatly appreciated.
 *
 * Version: 1.3.4 (11/11/2010)
 * Requires: jQuery v1.3+
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
;(function(B){var L,T,Q,M,d,m,J,A,O,z,C=0,H={},j=[],e=0,G={},y=[],f=null,o=new Image(),i=/\.(jpg|gif|png|bmp|jpeg)(.*)?$/i,k=/[^\.]\.(swf)\s*$/i,p,N=1,h=0,t="",b,c,P=false,s=B.extend(B("<div/>")[0],{prop:0}),S=/MSIE 6/.test(navigator.userAgent)&&B.browser.version<7&&!window.XMLHttpRequest,r=function(){T.hide();o.onerror=o.onload=null;if(f){f.abort()}L.empty()},x=function(){if(false===H.onError(j,C,H)){T.hide();P=false;return}H.titleShow=false;H.width="auto";H.height="auto";L.html('<p id="fancybox-error">The requested content cannot be loaded.<br />Please try again later.</p>');n()},w=function(){var Z=j[C],W,Y,ab,aa,V,X;r();H=B.extend({},B.fn.fancybox.defaults,(typeof B(Z).data("fancybox")=="undefined"?H:B(Z).data("fancybox")));X=H.onStart(j,C,H);if(X===false){P=false;return}else{if(typeof X=="object"){H=B.extend(H,X)}}ab=H.title||(Z.nodeName?B(Z).attr("title"):Z.title)||"";if(Z.nodeName&&!H.orig){H.orig=B(Z).children("img:first").length?B(Z).children("img:first"):B(Z)}if(ab===""&&H.orig&&H.titleFromAlt){ab=H.orig.attr("alt")}W=H.href||(Z.nodeName?B(Z).attr("href"):Z.href)||null;if((/^(?:javascript)/i).test(W)||W=="#"){W=null}if(H.type){Y=H.type;if(!W){W=H.content}}else{if(H.content){Y="html"}else{if(W){if(W.match(i)){Y="image"}else{if(W.match(k)){Y="swf"}else{if(B(Z).hasClass("iframe")){Y="iframe"}else{if(W.indexOf("#")===0){Y="inline"}else{Y="ajax"}}}}}}}if(!Y){x();return}if(Y=="inline"){Z=W.substr(W.indexOf("#"));Y=B(Z).length>0?"inline":"ajax"}H.type=Y;H.href=W;H.title=ab;if(H.autoDimensions){if(H.type=="html"||H.type=="inline"||H.type=="ajax"){H.width="auto";H.height="auto"}else{H.autoDimensions=false}}if(H.modal){H.overlayShow=true;H.hideOnOverlayClick=false;H.hideOnContentClick=false;H.enableEscapeButton=false;H.showCloseButton=false}H.padding=parseInt(H.padding,10);H.margin=parseInt(H.margin,10);L.css("padding",(H.padding+H.margin));B(".fancybox-inline-tmp").unbind("fancybox-cancel").bind("fancybox-change",function(){B(this).replaceWith(m.children())});switch(Y){case"html":L.html(H.content);n();break;case"inline":if(B(Z).parent().is("#fancybox-content")===true){P=false;return}B('<div class="fancybox-inline-tmp" />').hide().insertBefore(B(Z)).bind("fancybox-cleanup",function(){B(this).replaceWith(m.children())}).bind("fancybox-cancel",function(){B(this).replaceWith(L.children())});B(Z).appendTo(L);n();break;case"image":P=false;B.fancybox.showActivity();o=new Image();o.onerror=function(){x()};o.onload=function(){P=true;o.onerror=o.onload=null;F()};o.src=W;break;case"swf":H.scrolling="no";aa='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+H.width+'" height="'+H.height+'"><param name="movie" value="'+W+'"></param>';V="";B.each(H.swf,function(ac,ad){aa+='<param name="'+ac+'" value="'+ad+'"></param>';V+=" "+ac+'="'+ad+'"'});aa+='<embed src="'+W+'" type="application/x-shockwave-flash" width="'+H.width+'" height="'+H.height+'"'+V+"></embed></object>";L.html(aa);n();break;case"ajax":P=false;B.fancybox.showActivity();H.ajax.win=H.ajax.success;f=B.ajax(B.extend({},H.ajax,{url:W,data:H.ajax.data||{},dataType:"text",error:function(ac,ae,ad){if(ac.status>0){x()}},success:function(ad,af,ac){var ae=typeof ac=="object"?ac:f;if(ae.status==200||ae.status===0){if(typeof H.ajax.win=="function"){X=H.ajax.win(W,ad,af,ac);if(X===false){T.hide();return}else{if(typeof X=="string"||typeof X=="object"){ad=X}}}L.html(ad);n()}}}));break;case"iframe":E();break}},n=function(){var V=H.width,W=H.height;if(V.toString().indexOf("%")>-1){V=parseInt((B(window).width()-(H.margin*2))*parseFloat(V)/100,10)+"px"}else{V=V=="auto"?"auto":V+"px"}if(W.toString().indexOf("%")>-1){W=parseInt((B(window).height()-(H.margin*2))*parseFloat(W)/100,10)+"px"}else{W=W=="auto"?"auto":W+"px"}L.wrapInner('<div style="width:'+V+";height:"+W+";overflow: "+(H.scrolling=="auto"?"auto":(H.scrolling=="yes"?"scroll":"hidden"))+';position:relative;"></div>');H.width=L.width();H.height=L.height();E()},F=function(){H.width=o.width;H.height=o.height;B("<img />").attr({id:"fancybox-img",src:o.src,alt:H.title}).appendTo(L);E()},E=function(){var W,V;T.hide();if(M.is(":visible")&&false===G.onCleanup(y,e,G)){B('.fancybox-inline-tmp').trigger('fancybox-cancel');P=false;return}P=true;B(m.add(Q)).unbind();B(window).unbind("resize.fb scroll.fb");B(document).unbind("keydown.fb");if(M.is(":visible")&&G.titlePosition!=="outside"){M.css("height",M.height())}y=j;e=C;G=H;if(G.overlayShow){Q.css({"background-color":G.overlayColor,opacity:G.overlayOpacity,cursor:G.hideOnOverlayClick?"pointer":"auto",height:B(document).height()});if(!Q.is(":visible")){if(S){B("select:not(#fancybox-tmp select)").filter(function(){return this.style.visibility!=="hidden"}).css({visibility:"hidden"}).one("fancybox-cleanup",function(){this.style.visibility="inherit"})}Q.show()}}else{Q.hide()}c=R();l();if(M.is(":visible")){B(J.add(O).add(z)).hide();W=M.position(),b={top:W.top,left:W.left,width:M.width(),height:M.height()};V=(b.width==c.width&&b.height==c.height);m.fadeTo(G.changeFade,0.3,function(){var X=function(){m.html(L.contents()).fadeTo(G.changeFade,1,v)};B('.fancybox-inline-tmp').trigger('fancybox-change');m.empty().removeAttr("filter").css({"border-width":G.padding,width:c.width-G.padding*2,height:H.autoDimensions?"auto":c.height-h-G.padding*2});if(V){X()}else{s.prop=0;B(s).animate({prop:1},{duration:G.changeSpeed,easing:G.easingChange,step:U,complete:X})}});return}M.removeAttr("style");m.css("border-width",G.padding);if(G.transitionIn=="elastic"){b=I();m.html(L.contents());M.show();if(G.opacity){c.opacity=0}s.prop=0;B(s).animate({prop:1},{duration:G.speedIn,easing:G.easingIn,step:U,complete:v});return}if(G.titlePosition=="inside"&&h>0){A.show()}m.css({width:c.width-G.padding*2,height:H.autoDimensions?"auto":c.height-h-G.padding*2}).html(L.contents());M.css(c).fadeIn(G.transitionIn=="none"?0:G.speedIn,v)},D=function(V){if(V&&V.length){if(G.titlePosition=="float"){return'<table id="fancybox-title-float-wrap" cellpadding="0" cellspacing="0"><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">'+V+'</td><td id="fancybox-title-float-right"></td></tr></table>'}return'<div id="fancybox-title-'+G.titlePosition+'">'+V+"</div>"}return false},l=function(){t=G.title||"";h=0;A.empty().removeAttr("style").removeClass();if(G.titleShow===false){A.hide();return}t=B.isFunction(G.titleFormat)?G.titleFormat(t,y,e,G):D(t);if(!t||t===""){A.hide();return}A.addClass("fancybox-title-"+G.titlePosition).html(t).appendTo("body").show();switch(G.titlePosition){case"inside":A.css({width:c.width-(G.padding*2),marginLeft:G.padding,marginRight:G.padding});h=A.outerHeight(true);A.appendTo(d);c.height+=h;break;case"over":A.css({marginLeft:G.padding,width:c.width-(G.padding*2),bottom:G.padding}).appendTo(d);break;case"float":A.css("left",parseInt((A.width()-c.width-40)/2,10)*-1).appendTo(M);break;default:A.css({width:c.width-(G.padding*2),paddingLeft:G.padding,paddingRight:G.padding}).appendTo(M);break}A.hide()},g=function(){if(G.enableEscapeButton||G.enableKeyboardNav){B(document).bind("keydown.fb",function(V){if(V.keyCode==27&&G.enableEscapeButton){V.preventDefault();B.fancybox.close()}else{if((V.keyCode==37||V.keyCode==39)&&G.enableKeyboardNav&&V.target.tagName!=="INPUT"&&V.target.tagName!=="TEXTAREA"&&V.target.tagName!=="SELECT"){V.preventDefault();B.fancybox[V.keyCode==37?"prev":"next"]()}}})}if(!G.showNavArrows){O.hide();z.hide();return}if((G.cyclic&&y.length>1)||e!==0){O.show()}if((G.cyclic&&y.length>1)||e!=(y.length-1)){z.show()}},v=function(){if(B.support.opacity===false){m.get(0).style.removeAttribute("filter");M.get(0).style.removeAttribute("filter")}if(H.autoDimensions){m.css("height","auto")}M.css("height","auto");if(t&&t.length){A.show()}if(G.showCloseButton){J.show()}g();if(G.hideOnContentClick){m.bind("click",B.fancybox.close)}if(G.hideOnOverlayClick){Q.bind("click",B.fancybox.close)}B(window).bind("resize.fb",B.fancybox.resize);if(G.centerOnScroll){B(window).bind("scroll.fb",B.fancybox.center)}if(G.type=="iframe"){B('<iframe id="fancybox-frame" name="fancybox-frame'+new Date().getTime()+'" frameborder="0" hspace="0" '+(window.attachEvent?'allowtransparency="true""':"")+' scrolling="'+H.scrolling+'" src="'+G.href+'"></iframe>').appendTo(m)}M.show();P=false;B.fancybox.center();G.onComplete(y,e,G);K()},K=function(){var V,W;if((y.length-1)>e){V=y[e+1].href;if(typeof V!=="undefined"&&V.match(i)){W=new Image();W.src=V}}if(e>0){V=y[e-1].href;if(typeof V!=="undefined"&&V.match(i)){W=new Image();W.src=V}}},U=function(W){var V={width:parseInt(b.width+(c.width-b.width)*W,10),height:parseInt(b.height+(c.height-b.height)*W,10),top:parseInt(b.top+(c.top-b.top)*W,10),left:parseInt(b.left+(c.left-b.left)*W,10)};if(typeof c.opacity!=="undefined"){V.opacity=W<0.5?0.5:W}M.css(V);m.css({width:V.width-G.padding*2,height:V.height-(h*W)-G.padding*2})},u=function(){return[B(window).width()-(G.margin*2),B(window).height()-(G.margin*2),B(document).scrollLeft()+G.margin,B(document).scrollTop()+G.margin]},R=function(){var V=u(),Z={},W=G.autoScale,X=G.padding*2,Y;if(G.width.toString().indexOf("%")>-1){Z.width=parseInt((V[0]*parseFloat(G.width))/100,10)}else{Z.width=G.width+X}if(G.height.toString().indexOf("%")>-1){Z.height=parseInt((V[1]*parseFloat(G.height))/100,10)}else{Z.height=G.height+X}if(W&&(Z.width>V[0]||Z.height>V[1])){if(H.type=="image"||H.type=="swf"){Y=(G.width)/(G.height);if((Z.width)>V[0]){Z.width=V[0];Z.height=parseInt(((Z.width-X)/Y)+X,10)}if((Z.height)>V[1]){Z.height=V[1];Z.width=parseInt(((Z.height-X)*Y)+X,10)}}else{Z.width=Math.min(Z.width,V[0]);Z.height=Math.min(Z.height,V[1])}}Z.top=parseInt(Math.max(V[3]-20,V[3]+((V[1]-Z.height-40)*0.5)),10);Z.left=parseInt(Math.max(V[2]-20,V[2]+((V[0]-Z.width-40)*0.5)),10);return Z},q=function(V){var W=V.offset();W.top+=parseInt(V.css("paddingTop"),10)||0;W.left+=parseInt(V.css("paddingLeft"),10)||0;W.top+=parseInt(V.css("border-top-width"),10)||0;W.left+=parseInt(V.css("border-left-width"),10)||0;W.width=V.width();W.height=V.height();return W},I=function(){var Y=H.orig?B(H.orig):false,X={},W,V;if(Y&&Y.length){W=q(Y);X={width:W.width+(G.padding*2),height:W.height+(G.padding*2),top:W.top-G.padding-20,left:W.left-G.padding-20}}else{V=u();X={width:G.padding*2,height:G.padding*2,top:parseInt(V[3]+V[1]*0.5,10),left:parseInt(V[2]+V[0]*0.5,10)}}return X},a=function(){if(!T.is(":visible")){clearInterval(p);return}B("div",T).css("top",(N*-40)+"px");N=(N+1)%12};B.fn.fancybox=function(V){if(!B(this).length){return this}B(this).data("fancybox",B.extend({},V,(B.metadata?B(this).metadata():{}))).unbind("click.fb").bind("click.fb",function(X){X.preventDefault();if(P){return}P=true;B(this).blur();j=[];C=0;var W=B(this).attr("rel")||"";if(!W||W==""||W==="nofollow"){j.push(this)}else{j=B('a[rel="'+W+'"], area[rel="'+W+'"]');C=j.index(this)}w();return});return this};B.fancybox=function(Y){var X;if(P){return}P=true;X=typeof arguments[1]!=="undefined"?arguments[1]:{};j=[];C=parseInt(X.index,10)||0;if(B.isArray(Y)){for(var W=0,V=Y.length;W<V;W++){if(typeof Y[W]=="object"){B(Y[W]).data("fancybox",B.extend({},X,Y[W]))}else{Y[W]=B({}).data("fancybox",B.extend({content:Y[W]},X))}}j=jQuery.merge(j,Y)}else{if(typeof Y=="object"){B(Y).data("fancybox",B.extend({},X,Y))}else{Y=B({}).data("fancybox",B.extend({content:Y},X))}j.push(Y)}if(C>j.length||C<0){C=0}w()};B.fancybox.showActivity=function(){clearInterval(p);T.show();p=setInterval(a,66)};B.fancybox.hideActivity=function(){T.hide()};B.fancybox.next=function(){return B.fancybox.pos(e+1)};B.fancybox.prev=function(){return B.fancybox.pos(e-1)};B.fancybox.pos=function(V){if(P){return}V=parseInt(V);j=y;if(V>-1&&V<y.length){C=V;w()}else{if(G.cyclic&&y.length>1){C=V>=y.length?0:y.length-1;w()}}return};B.fancybox.cancel=function(){if(P){return}P=true;B('.fancybox-inline-tmp').trigger('fancybox-cancel');r();H.onCancel(j,C,H);P=false};B.fancybox.close=function(){if(P||M.is(":hidden")){return}P=true;if(G&&false===G.onCleanup(y,e,G)){P=false;return}r();B(J.add(O).add(z)).hide();B(m.add(Q)).unbind();B(window).unbind("resize.fb scroll.fb");B(document).unbind("keydown.fb");if(G.type==="iframe"){m.find("iframe").attr("src",S&&/^https/i.test(window.location.href||"")?"javascript:void(false)":"about:blank")}if(G.titlePosition!=="inside"){A.empty()}M.stop();function V(){Q.fadeOut("fast");A.empty().hide();M.hide();B('.fancybox-inline-tmp').trigger('fancybox-cleanup');m.empty();G.onClosed(y,e,G);y=H=[];e=C=0;G=H={};P=false}if(G.transitionOut=="elastic"){b=I();var W=M.position();c={top:W.top,left:W.left,width:M.width(),height:M.height()};if(G.opacity){c.opacity=1}A.empty().hide();s.prop=1;B(s).animate({prop:0},{duration:G.speedOut,easing:G.easingOut,step:U,complete:V})}else{M.fadeOut(G.transitionOut=="none"?0:G.speedOut,V)}};B.fancybox.resize=function(){if(Q.is(":visible")){Q.css("height",B(document).height())}B.fancybox.center(true)};B.fancybox.center=function(){var V,W;if(P){return}W=arguments[0]===true?1:0;V=u();if(!W&&(M.width()>V[0]||M.height()>V[1])){return}M.stop().animate({top:parseInt(Math.max(V[3]-20,V[3]+((V[1]-m.height()-40)*0.5)-G.padding)),left:parseInt(Math.max(V[2]-20,V[2]+((V[0]-m.width()-40)*0.5)-G.padding))},typeof arguments[0]=="number"?arguments[0]:200)};B.fancybox.init=function(){if(B("#fancybox-wrap").length){return}B("body").append(L=B('<div id="fancybox-tmp"></div>'),T=B('<div id="fancybox-loading"><div></div></div>'),Q=B('<div id="fancybox-overlay"></div>'),M=B('<div id="fancybox-wrap"></div>'));d=B('<div id="fancybox-outer"></div>').append('<div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div>').appendTo(M);d.append(m=B('<div id="fancybox-content"></div>'),J=B('<a id="fancybox-close"></a>'),A=B('<div id="fancybox-title"></div>'),O=B('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'),z=B('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>'));J.click(B.fancybox.close);T.click(B.fancybox.cancel);O.click(function(V){V.preventDefault();B.fancybox.prev()});z.click(function(V){V.preventDefault();B.fancybox.next()});if(B.fn.mousewheel){M.bind("mousewheel.fb",function(V,W){if(P){V.preventDefault()}else{if(B(V.target).get(0).clientHeight==0||B(V.target).get(0).scrollHeight===B(V.target).get(0).clientHeight){V.preventDefault();B.fancybox[W>0?"prev":"next"]()}}})}if(B.support.opacity===false){M.addClass("fancybox-ie")}if(S){T.addClass("fancybox-ie6");M.addClass("fancybox-ie6");B('<iframe id="fancybox-hide-sel-frame" src="'+(/^https/i.test(window.location.href||"")?"javascript:void(false)":"about:blank")+'" scrolling="no" border="0" frameborder="0" tabindex="-1"></iframe>').prependTo(d)}};B.fn.fancybox.defaults={padding:10,margin:40,opacity:false,modal:false,cyclic:false,scrolling:"auto",width:560,height:340,autoScale:true,autoDimensions:true,centerOnScroll:false,ajax:{},swf:{wmode:"transparent"},hideOnOverlayClick:true,hideOnContentClick:false,overlayShow:true,overlayOpacity:0.7,overlayColor:"#777",titleShow:true,titlePosition:"float",titleFormat:null,titleFromAlt:false,transitionIn:"fade",transitionOut:"fade",speedIn:300,speedOut:300,changeSpeed:300,changeFade:"fast",easingIn:"swing",easingOut:"swing",showCloseButton:true,showNavArrows:true,enableEscapeButton:true,enableKeyboardNav:true,onStart:function(){},onCancel:function(){},onComplete:function(){},onCleanup:function(){},onClosed:function(){},onError:function(){}};B(document).ready(function(){B.fancybox.init()})})(jQuery);

}
/*
     FILE ARCHIVED ON 06:03:11 Jan 30, 2019 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 07:45:21 Oct 01, 2022.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 90.274
  exclusion.robots: 0.185
  exclusion.robots.policy: 0.177
  cdx.remote: 0.072
  esindex: 0.011
  LoadShardBlock: 57.377 (3)
  PetaboxLoader3.datanode: 97.362 (5)
  CDXLines.iter: 21.984 (3)
  load_resource: 191.491 (2)
  PetaboxLoader3.resolve: 99.12 (2)
*/