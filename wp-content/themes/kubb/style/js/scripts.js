/*-----------------------------------------------------------------------------------*/
/*	WORDPRESS SPECIFIC
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {

	jQuery('p:empty').remove();
	
	/**
	 * Add portfolio slide menu to pages with portfolio carousel in them.
	 * Only triggers if there's more than 1 portfolio carousel in a page.
	 */
	if( jQuery('.ebor-portfolio-carousel').length > 1 ){
		
		var $this = jQuery('.ebor-portfolio-carousel'),
			portfolioCarousels = {},
			portfolioTitles = {},
			$afterElement = jQuery('.navbar'),
			$output = '';
			
		if( jQuery('.page-title').length > 0 )
			$afterElement = jQuery('.page-title');
		
		$this.each(function(idx){
			portfolioCarousels[idx] = jQuery(this).attr('id');
			portfolioTitles[idx] = jQuery(this).attr('data-title');
		});
		
		$output += '<div id="sticky-filter" class="filter dark-wrapper container"><ul>';
		
		$this.each(function(idx){
			$output += '<li><a href="#'+ portfolioCarousels[idx] +'">'+ portfolioTitles[idx] +'</a></li>';
		});
		    
		$output += '</ul></div>';
		
		$afterElement.after( $output );
		
	}
	
	/**
	 * Hide unused filters
	 */
	if(!( jQuery('body').hasClass('single-portfolio') )){
		jQuery('.filter:not(#sticky-filter) a').each(function(){
			var $class = jQuery(this).attr('data-filter');
			
			if( $class == '*' )
				return;
				
			if( jQuery($class).length == 0 )
				jQuery(this).parent().hide();
		});
	}
	
	/**
	 * Turn linked images into lightbox images
	 */
	jQuery("a[href$='jpg'], a[href$='jpeg'], a[href$='gif'], a[href$='png']").each(function(){
		$(this).addClass('fancybox-media').prepend('<div class="text-overlay"><div class="info">'+ wp_data.view_larger +'</div></div>').wrap('<figure />');
	});
	
});
/*-----------------------------------------------------------------------------------*/
/*	STICKY HEADER
/*-----------------------------------------------------------------------------------*/
function ebor_header_init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 50,
            header = document.querySelector(".navbar");
        if (distanceY > shrinkOn) {
            classie.add(header,"fixed");
        } else {
            if (classie.has(header,"fixed")) {
                classie.remove(header,"fixed");
            }
        }
    });
}
window.onload = ebor_header_init();
    
    
jQuery(document).ready(function() {
	jQuery('.offset, .woocommerce-offset').css('padding-top', jQuery('.navbar').height() + 'px'); 
}); 
jQuery(window).resize(function() {
	jQuery('.offset, .woocommerce-offset').css('padding-top', jQuery('.navbar').height() + 'px');        
}); 
/*-----------------------------------------------------------------------------------*/
/*	RETINA
/*-----------------------------------------------------------------------------------*/
jQuery(function() {
	jQuery('.retina').retinise();
});
/*-----------------------------------------------------------------------------------*/
/*	STICKY FILTER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	var $top = 58;
	if( jQuery('body').hasClass('admin-bar') )
		var $top = 90;
  	jQuery("#sticky-filter").sticky({ topSpacing: $top, className:"sfilter", responsiveBreakpoint: 767 });
});
/*-----------------------------------------------------------------------------------*/
/*	SWIPER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
	jQuery('.swiper-container.gallery').each(function(){
		
		jQuery(this).swiper({
			grabCursor: true,
			slidesPerView: 'auto',
			wrapperClass: 'swiper',
			slideClass: 'item',
			offsetPxBefore: 15,
			offsetPxAfter: 15
		});
		
		var $swipers = jQuery(this);
		
		$swipers.siblings('.arrow-left').click(function(){
			$swipers.data('swiper').swipeTo($swipers.data('swiper').activeIndex-1);
			return false;
		});
		$swipers.siblings('.arrow-right').click(function(){
			$swipers.data('swiper').swipeTo($swipers.data('swiper').activeIndex+1);
			return false;
		});
		
	});
	
	jQuery('.swiper-container.clients').each(function(){
		jQuery(this).swiper({
			grabCursor: true,
			slidesPerView: 'auto',
			wrapperClass: 'swiper',
			slideClass: 'item'
		});
	});
	
	jQuery(window).trigger('resize');
});
/*-----------------------------------------------------------------------------------*/
/*	INSTAGRAM
/*-----------------------------------------------------------------------------------*/
var widgetFeed = new Instafeed({
	target: 'instawidget',
	get: 'user',
	limit: 6,
	userId: 1215763826,
	accessToken: '1215763826.467ede5.aa54392aa9eb46f0b9e7191f7211ec3a',
	resolution: 'thumbnail',
	template: '<li><span class="icon-overlay"><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></span></li>',
	after: function () {    
		jQuery('.icon-overlay a').prepend('<span class="icn-more"></span>');
	}
});

jQuery('#instawidget').each(function() {
	widgetFeed.run();
});
/*-----------------------------------------------------------------------------------*/
/*	ONEPAGE ANCHOR SCROLL
/*-----------------------------------------------------------------------------------*/
/**
* jQuery.LocalScroll - Animated scrolling navigation, using anchors.
* Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
* Dual licensed under MIT and GPL.
* Date: 3/11/2009
* @author Ariel Flesler
* @version 1.2.7
**/
(function($){var l=location.href.replace(/#.*/,'');var g=jQuery.localScroll=function(a){jQuery('body').localScroll(a)};g.defaults={duration:1e3,axis:'y',event:'click',stop:true,target:window,reset:true};g.hash=function(a){if(location.hash){a=jQuery.extend({},g.defaults,a);a.hash=false;if(a.reset){var e=a.duration;delete a.duration;jQuery(a.target).scrollTo(0,a);a.duration=e}i(0,location,a)}};jQuery.fn.localScroll=function(b){b=jQuery.extend({},g.defaults,b);return b.lazy?this.bind(b.event,function(a){var e=jQuery([a.target,a.target.parentNode]).filter(d)[0];if(e)i(a,e,b)}):this.find('a,area').filter(d).bind(b.event,function(a){i(a,this,b)}).end().end();function d(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==l&&(!b.filter||jQuery(this).is(b.filter))}};function i(a,e,b){var d=e.hash.slice(1),f=document.getElementById(d)||document.getElementsByName(d)[0];if(!f)return;if(a)a.preventDefault();var h=jQuery(b.target);if(b.lock&&h.is(':animated')||b.onBefore&&b.onBefore.call(b,a,f,h)===false)return;if(b.stop)h.stop(true);if(b.hash){var j=f.id==d?'id':'name',k=jQuery('<a> </a>').attr(j,d).css({position:'absolute',top:jQuery(window).scrollTop(),left:jQuery(window).scrollLeft()});f[j]='';jQuery('body').prepend(k);location=e.hash;k.remove();f[j]=d}h.scrollTo(f,b).trigger('notify.serialScroll',[f])}})(jQuery);
/**
 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.5 BETA
 */
;(function($){var h=jQuery.scrollTo=function(a,b,c){jQuery(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat(jQuery.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return jQuery(window)._scrollable()};jQuery.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||jQuery.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};jQuery.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=jQuery.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=jQuery(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=jQuery(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=jQuery(targ)).offset()}jQuery.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!jQuery(a).is('html,body'))return a[scroll]-jQuery(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
jQuery(document).ready(function(){ 
    jQuery('#sticky-filter ul').localScroll({
	    offset: {top:-116, left:0}
    });
  });
/*-----------------------------------------------------------------------------------*/
/*	SCROLL NAV
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	headerWrapper		= parseInt(jQuery('#sticky-filter').height());
	offsetTolerance	= 60;
	
	//Detecting user's scroll
	jQuery(window).scroll(function() {
	
		//Check scroll position
		scrollPosition	= parseInt(jQuery(this).scrollTop());
		
		//Move trough each menu and check its position with scroll position then add current class
		jQuery('#sticky-filter a').each(function() {

			thisHref				= jQuery(this).attr('href');
			thisTruePosition	= parseInt(jQuery(thisHref).offset().top);
			thisPosition 		= thisTruePosition - headerWrapper - offsetTolerance;
			
			if(scrollPosition >= thisPosition) {
				
				jQuery('.current').removeClass('current');
				jQuery('#sticky-filter a[href='+ thisHref +']').parent('li').addClass('current');
				
			}
		});
		
		
		//If we're at the bottom of the page, move pointer to the last section
		bottomPage	= parseInt(jQuery(document).height()) - parseInt(jQuery(window).height());
		
		if(scrollPosition == bottomPage || scrollPosition >= bottomPage) {
		
			jQuery('.current').removeClass('current');
			jQuery('#sticky-filter a:last').parent('li').addClass('current');
		}
	});
	
});
/*-----------------------------------------------------------------------------------*/
/*	REVOLUTION
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	if( jQuery('.fullscreenbanner').length > 0 ){
	    jQuery('.fullscreenbanner').revolution(
	    {
	        delay: 9000,
	        startwidth: 1170,
	        startheight: 550,
	        hideThumbs: 200,
	        fullWidth: "off",
	        fullScreen: "on",
	        fullScreenOffsetContainer: ".mode-xs .navbar"
	    });
	}
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE FULLSCREEN PORTFOLIO
/*-----------------------------------------------------------------------------------*/

var isotopeBreakpoints = [
    { min_width: 1680, columns: 5 },
    { min_width: 1440, max_width: 1680, columns: 5 },
    { min_width: 1024, max_width: 1440, columns: 4 },
    { min_width: 768, max_width: 1024, columns: 3 },
    { max_width: 768, columns: 1 }
 ];

jQuery(document).ready(function () {
    var $container = jQuery('.full-portfolio .items');

    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
    });

    // hook to window resize to resize the portfolio items for fluidity / responsiveness
    jQuery(window).smartresize(function() {
        var windowWidth = jQuery(window).width();
        var windowHeight = jQuery(window).height();

        for ( var i = 0; i < isotopeBreakpoints.length; i++ ) {
            if (windowWidth >= isotopeBreakpoints[i].min_width || !isotopeBreakpoints[i].min_width) {
                if (windowWidth < isotopeBreakpoints[i].max_width || !isotopeBreakpoints[i].max_width) {
                    $container.find('.item').each(function() {
                        jQuery(this).width( Math.floor( $container.width() / isotopeBreakpoints[i].columns ) );
                    });

                    break;
                }
            }
        }
    });

    jQuery(window).trigger( 'smartresize' );


    jQuery('.grid-portfolio .filter li a').click(function () {

        jQuery('.grid-portfolio .filter li a').removeClass('active');
        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        return false;
    });
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE CLASSIC PORTFOLIO
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    var $container = jQuery('.fix-portfolio .items');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.item'
        });
    });

    jQuery(window).on('resize', function () {
        jQuery('.fix-portfolio .items').isotope('reLayout')
    });
    
    jQuery('.fix-portfolio .filter li a').click(function () {

        jQuery('.fix-portfolio .filter li a').removeClass('active');
        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        return false;
    });
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE GRID BLOG
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    var $container = jQuery('.grid-blog');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.col'
        });
    });

    jQuery(window).on('resize', function () {
        jQuery('.grid-blog').isotope('reLayout')
    });
});
/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    jQuery('.js-activated').dropdownHover({
        instantlyCloseOthers: false,
        delay: 0
    }).dropdown();


    jQuery('.dropdown-menu a, .social .dropdown-menu, .social .dropdown-menu input').click(function (e) {
        e.stopPropagation();
    });

});
/*-----------------------------------------------------------------------------------*/
/*	FANCYBOX
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    jQuery(".fancybox-media").fancybox({
        arrows: true,
        padding: 0,
        closeBtn: true,
        openEffect: 'fade',
        closeEffect: 'fade',
        prevEffect: 'fade',
        nextEffect: 'fade',
        helpers: {
            media: {},
            overlay: {
                locked: false
            },
            buttons: false,
            thumbs: {
                width: 50,
                height: 50
            },
            title: {
                type: 'inside'
            }
        },
        beforeLoad: function () {
            var el, id = jQuery(this.element).data('title-id');
            if (id) {
                el = jQuery('#' + id);
                if (el.length) {
                    this.title = el.html();
                }
            }
        }
    });
});
/*-----------------------------------------------------------------------------------*/
/*	IMAGE ICON HOVER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    jQuery('.icon-overlay a').prepend('<span class="icn-more"></span>');
});
/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIALS
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    jQuery('#testimonials').easytabs({
        animationSpeed: 500,
        updateHash: false,
        cycle: 5000
    });

});
/*-----------------------------------------------------------------------------------*/
/*	DATA REL
/*-----------------------------------------------------------------------------------*/
jQuery('a[data-rel]').each(function () {
    jQuery(this).attr('rel', jQuery(this).data('rel'));
});
/*-----------------------------------------------------------------------------------*/
/*	TOOLTIP
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    if (jQuery("[rel=tooltip]").length) {
        jQuery("[rel=tooltip]").tooltip();
    }
});
/*-----------------------------------------------------------------------------------*/
/*	VIDEO
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    jQuery('.player').fitVids();
});
/*-----------------------------------------------------------------------------------*/
/*	PRETTIFY
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    window.prettyPrint && prettyPrint()
});
/*-----------------------------------------------------------------------------------*/
/*	PARALLAX MOBILE
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
    if (navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i) ||
        navigator.userAgent.match(/BlackBerry/i)) {
        jQuery('.parallax').addClass('mobile');
    }
});
/*-----------------------------------------------------------------------------------*/
/* NAV BASE LINK
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	jQuery('a.js-activated').not('a.js-activated[href^="#"]').click(function(){
		var url = jQuery(this).attr('href');
		window.location.href = url;
		return true;
	});
});
/*-----------------------------------------------------------------------------------*/
/* WIDTH CLASS
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
    assign_bootstrap_mode();
    jQuery(window).resize(function() {
        assign_bootstrap_mode();
    });
});

function assign_bootstrap_mode() {
    width = jQuery( window ).width();
    var mode = '';
    if (width<768) {
        mode = "mode-xs";
    }
    else if (width<992) {
        mode = "mode-sm";
    }
    else if (width<1200) {
        mode = "mode-md";
    }
    else if (width>1200) {
        mode = "mode-lg";
    }
    jQuery("body").removeClass("mode-xs").removeClass("mode-sm").removeClass("mode-md").removeClass("mode-lg").addClass(mode);
}