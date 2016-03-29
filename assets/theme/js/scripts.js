(function ($) {

    "use strict";

    function PreviewInit() {

        var product = $('.product');
        var preview = $('.preview');

        product.find('.product-image-wrapper.onhover').bind('mouseenter', function () {
            var pos = $(this).parent().position();
            var width = $(this).outerWidth();
            var width1 = $(this).parent().next(preview).outerWidth();
            $(this).parent().addClass('hover');
            var width2 = width1 - width;
            $(this).parent().next(preview).css({
                top: pos.top + 10 + "px",
                left: (pos.left - width2 + 30) + "px"
            });
            $(this).parent().next(preview).find("small").css({
                top: pos.top + 10 + "px",
                left: (pos.left - width2 + 30) + "px"
            });

            preview.hide();
            $(this).parent().next(preview).show();
        });

        preview.bind('mouseleave', function () {
            product.removeClass('hover');
            $(this).stop().hide();
            $('.big_image a img', this).attr('src', $('.big_image a img', this).attr("data-rel"));
        });

        preview.find("a.image").bind('mouseenter', function () {
            $(this).parent().next().find('.big_image a img').stop(true, true).animate({
                opacity: 0
            }, 200);
            var image = $(this).attr("data-rel");
            $(this).parent().next().find('.big_image a img').attr('src', image);
            $(this).parent().next().find('.big_image a img').stop(true, true).animate({
                opacity: 1
            }, 800);
            return false;
        });
    }

    function TopSlider(flexSliderTop) {
        var container = $(".container");
        var w0 = $(document).width();
        var w1 = (w0 - container.width()) * 0.5 - 0;

        flexSliderTop.find(".flex-direction-nav .flex-next").css({
            "right": w1 + "px"
        });
        flexSliderTop.find(".flex-direction-nav .flex-prev").css({
            "left": w1 + "px"
        });
        flexSliderTop.find(".next-slider").css({
            "right": w1 + "px"
        });
        flexSliderTop.find(".prev-slider").css({
            "left": w1 + "px"
        });

    };

    function elementsAnimate() {
        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        var animate = $('.animate');
        var animateDelay = $('.animate-delay-outer');
        var animateDelayItem = $('.animate-delay');
        if (windowWidth > 767 && !isiPhone()) {
            animate.bind('inview', function (event, visible) {
                if (visible && !$(this).hasClass("animated")) {
                    $(this).addClass("animated");
                }
            });
			animateDelay.bind('inview', function (event, visible) {
                if (visible && !$(this).hasClass("animated")) {
                    var j = -1;
                    var $this = $(this).find(".animate-delay");
                    $this.each(function () {
                        var $this = jQuery(this);
                        j++;
                        setTimeout(function () {
                            $this.addClass("animated");
                        }, 200 * j);
                    });
					$(this).addClass("animated");
                }
            });
        } else {
            animate.each(function () {
                $(this).removeClass('animate');
            });
            animateDelayItem.each(function () {
                $(this).removeClass('animate-delay');
            });
        }
    }

    function isTouchDevice() {
        return (typeof (window.ontouchstart) != 'undefined') ? true : false;
    }

    function isiPhone() {
        return (
            (navigator.userAgent.toLowerCase().indexOf("iphone") > -1) ||
            (navigator.userAgent.toLowerCase().indexOf("ipod") > -1)
        );
    }
    var resize_picholder;

    function resizePicHolder() {
        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        var ppPicHolder = $('.pp_pic_holder');
        var left_pic_holder = windowWidth - ppPicHolder.width();
        ppPicHolder.animate({
            left: left_pic_holder / 2
        });
    }

    $(document).ready(function () {


        var product = $('.product');
        var preview = $('.preview');
        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        var pageBody = $('body');
        var priceSlider = $("#noUiSlider");
        var cloudZoom = $('#CloudZoom');
        var cloudGallery = $('.cloudzoom-gallery');
        var cloudGalleryOuter = $('.product-more-views ul');
        var listingSort = $('.sort-by');
        var isotopeOuter = $('.isotope-outer');
        var selectCustom = $("select.custom");
        var flexSliderBanners = $('.flexslider.banners');
        var flexSliderTop = $(".flexslider.big");
        var flexContentCarousel = $('.flexslider.carousel-content');
        var flexSliderSmall = $('.flexslider.small');
        var imageCloudZoom = $('.product-image img.cloudzoom');
        var carousel = $('.carousel');
        var hoverfold = $('#hoverfold');
        var accordion = $('.accordion');
        var contentTab = $('.contentTab');
        var tableStripped = $("table.striped");
        var navigation = $("nav");
        var footer = $("#footer");
        var footerPopup = $("#footer_popup");
        var rightToolbar = $("#right_toolbar");
        var productVerticalCarousel = $('.flexslider.vertical');
        var topLink = $('#topline .fadelink, .header_v_2 .fadelink');
        var headerShop = $("#header .shoppingcart .fadelink");
        var rightShop = $("#right_toolbar .shoppingcart");
        var rightSearch = $("#right_toolbar .form-search");
        var arrowPrev = $(".es-nav-prev");
        var arrowNext = $(".es-nav-next");
        var arrowPrev1 = $(".direction-nav a.prev");
        var arrowNext1 = $(".direction-nav a.next");
        var arrowPrev2 = $(".flexslider.vertical .flex-prev");
        var arrowNext2 = $(".flexslider.vertical .flex-next");
        var arrowPrev3 = $('.carousel_prev');
        var arrowNext3 = $('.carousel_next');
        var progressBar = $('.progress .bar');
        var smallPreview = $(".small_preview");
        var shoppingCartMini = $(".shopping_cart_mini");
        var ppPicHolder = $('.pp_pic_holder');
        var backTop = $('#back-top a');
        var brands = $('#brands0 ul');
        var brandsImg = $(".brands_block a img");

        if (isTouchDevice()) {
            var mobileHover = function () {
                $('*').on('touchstart', function () {
                    $(this).trigger('hover');
                }).on('touchend', function () {
                    $(this).trigger('hover');
                });
            };
            mobileHover();
            pageBody.addClass('touch')
            footer.click(function () {
                if (!jQuery(this).find("i.icon-up").hasClass("icon-down")) {
                    if (footerPopup.hasClass("allowHover") && footerPopup.css('position') == 'absolute') {
                        footerPopup.stop(true, false).slideDown(300);
                        jQuery(this).find("i.icon-up").addClass("icon-down");
                    }
                } else {
                    if (footerPopup.hasClass("allowHover") && footerPopup.css('position') == 'absolute') {
                        footerPopup.stop(true, false).slideUp(300);
                        jQuery(this).find("i.icon-up").removeClass("icon-down");
                    }
                }   
			});
                topLink.click(function () {
                    $(".ul_wrapper").each(function () {
                        jQuery(this).fadeOut(0)
                    })
                    if (!$(this).hasClass('open')) {
                        topLink.each(function () {
                            $(this).removeClass('open');
                        })
                        $(this).find(".ul_wrapper").fadeIn(200, "linear");
                        $(this).addClass('open');
                    } else {
                        $(this).find(".ul_wrapper").fadeOut(200, "linear");
                        $(this).removeClass('open');
                    }
            });
        } else {
            pageBody.addClass('notouch');
            $('div.noHover').hover(function () {
                footerPopup.toggleClass("allowHover");
            });
            footer.hover(function () {
                if (footerPopup.hasClass("allowHover") && footerPopup.css('position') == 'absolute') {
                    footerPopup.stop(true, false).slideDown(300);
                    jQuery(this).find("i.icon-up").addClass("icon-down");
                }
            }, function () {
                if (footerPopup.hasClass("allowHover") && footerPopup.css('position') == 'absolute') {
                    footerPopup.stop(true, false).slideUp(100);
                    $(this).find("i.icon-up").removeClass("icon-down");
                }
            });
            topLink.hover(function () {
                $(this).find(".ul_wrapper").stop(true).fadeToggle(200, "linear");
            });
        }

        if (isiPhone()) {
            pageBody.addClass('iphone')
        };




        /*	DETECT IF IE */

        var trident = !! navigator.userAgent.match(/Trident\/7.0/);
        var net = !! navigator.userAgent.match(/.NET4.0E/);
        var IE11 = trident && net
        var IEold = (navigator.userAgent.match(/MSIE/i) ? true : false);
        if (IE11 || IEold) {
            jQuery('body').addClass('msie');
        } else {
            jQuery('body').addClass('no_msie')
        }



        PreviewInit();
        rightToolbar.hide();


        // price slider

        priceSlider.empty().noUiSlider('init', {
            scale: [0, 2000],
            start: [0, 800],
            step: false,
            change: function () {
                var values = $(this).noUiSlider('value');
                $(this).find('.noUi-lowerHandle .infoBox').text('$' + values[0]);
                $(this).find('.noUi-upperHandle .infoBox').text('$' + values[1]);

            }
        }).find('.noUi-handle div').each(function (index) {

            $(this).append('<span class="infoBox">$' + $(this).parent().parent().noUiSlider('value')[index] + '</span>');

        });


        if (cloudZoom.length != 0) {
            cloudZoom.CloudZoom({
                zoomMatchSize: true
            });
            cloudGallery.CloudZoom();
        }


        listingSort.change(function () {
            //console.log("Selected Option:" + $(this).val());
            product.removeClass('hover');
            preview.hide();
            isotopeOuter.isotope({
                sortBy: $(this).val()
            });
        });

        selectCustom.each(function () {
            $(this).selectbox();
        })

        // change accordion caret when collapsing
        accordion.find('.accordion-toggle').click(function () {
            if ($(this).hasClass('collapsed')) {
                accordion.find('.accordion-toggle').not(this).addClass('collapsed');
            }
        })
        // tabs	
        contentTab.find('a').click(function (e) {
            e.preventDefault();
            jQuery(this).tab('show');
        })
        // stripped table
        tableStripped.find("tr:odd").addClass("odd");

        // collapse top navigation menu
        navigation.find(".collapse").collapse();


        headerShop.mouseenter(function () {
            jQuery(this).parent().find(".shopping_cart_mini").stop(true, true).fadeIn(200, "linear");
        });

        headerShop.mouseleave(function () {
            jQuery(this).parent().find(".shopping_cart_mini").stop(true, true).fadeOut(200, "linear");
        });

        rightShop.mouseenter(function () {
            jQuery(this).find(".shopping_cart_mini").stop(true, true).fadeIn(200, "linear");
        });

        rightShop.mouseleave(function () {
            jQuery(this).find(".shopping_cart_mini").stop(true, true).fadeOut(200, "linear");
        });


        rightSearch.mouseenter(function () {
            $(this).find('input').animate({
                right: 48,
                width: 275
            }, 300);
        });
        rightSearch.mouseleave(function () {
            $(this).find('input').stop(true, false).animate({
                right: 20,
                width: 0
            }, 300);
        });




        //  content carousel - our services page
        flexContentCarousel.flexslider({
            animation: "slide",
            pauseOnHover: true,
            controlNav: false,
            animationSpeed: 300,
            prevText: "<i class='prev icon-left-thin'></i>",
            nextText: "<i class='next icon-right-thin'></i>"

        });
        //  banner slider on side column

        flexSliderBanners.flexslider({
            animation: "slide",
            pauseOnHover: true,
            controlNav: false,
            prevText: "<i class='icon-left-thin'></i>",
            nextText: "<i class='icon-right-thin'></i>"

        });




        // products carousel
        carousel.each(function () {
            $(this).elastislide({
                speed: 600
            });
        })
        // related product vertical carousel

        productVerticalCarousel.flexslider({
            animation: "slide",
            autoplay: false,
            minItems: 2,
            direction: "vertical",
            pauseOnHover: true,
            controlNav: false,
            prevText: "<i class='icon-down'></i>",
            nextText: "<i class='icon-up'></i>"

        });

        // top slider  on listing page
        flexSliderSmall.flexslider({
            animation: "slide",
            pauseOnHover: true,
            controlNav: false,
            prevText: "<i class='icon-left-thin'></i>",
            nextText: "<i class='icon-right-thin'></i>"

        });
        // big slider  on home page

        if (flexSliderTop.length != 0) {
            flexSliderTop.flexslider({
                animation: "slide",
                controlNav: false,
                prevText: "<i class='icon-left-thin'></i>",
                nextText: "<i class='icon-right-thin'></i>",
                start: function (slider) {
                    flexSliderTop.find('li > a > img').animate({
                        'opacity': 1
                    });
                    elementsAnimate();
                }
            });
        } else {
            elementsAnimate();
        }

        TopSlider(flexSliderTop);


        //3D gallery

        if (hoverfold.length != 0) {

            //start the hoverfold plugin

            Modernizr.load({
                test: Modernizr.csstransforms3d && Modernizr.csstransitions,
                yep: ['js/jquery.hoverfold.js'],
                nope: 'css/fallback.css',
                callback: function (url, result, key) {

                    if (url === 'js/jquery.hoverfold.js') {
                        $('#hoverfold div').hoverfold();
                    }

                }
            });

            var $container = hoverfold;

            $container.isotope({
                itemSelector: '.span4'
            });


            var $optionSets = jQuery('#options .option-set'),
                $optionLinks = $optionSets.find('a');

            $optionLinks.click(function () {
                var $this = $(this);
                // don't proceed if already selected
                if ($this.hasClass('selected')) {
                    return false;
                }
                var $optionSet = $this.parents('.option-set');
                $optionSet.find('.selected').removeClass('selected');
                $this.addClass('selected');

                // make option object dynamically, i.e. { filter: '.my-filter-class' }
                var options = {},
                    key = $optionSet.attr('data-option-key'),
                    value = $this.attr('data-option-value');
                // parse 'false' as false boolean
                value = value === 'false' ? false : value;
                options[key] = value;
                if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
                    // changes in layout modes need extra logic
                    changeLayoutMode($this, options)
                } else {
                    // otherwise, apply new options
                    $container.isotope(options);
                }

                return false;
            });
        }



        $('#back-top a').hover(function () {
            $(this).stop().animate({
                "opacity": 0.6
            });
        }, function () {
            jQuery(this).stop().animate({
                "opacity": 1
            });
        });

        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });

        // small previews on hover

        arrowPrev.hover(function () {
            if (!$(this).hasClass("disable")) {
                $(this).parent().parent().find(".small_preview.prev").stop(true, true).fadeToggle(400, "linear");
            }
        });

        arrowNext.hover(function () {
            if (!$(this).hasClass("disable")) {
                $(this).parent().parent().find(".small_preview.next").stop(true, true).fadeToggle(400, "linear");
            }
        });
        arrowPrev.mouseleave(function () {
            $(".small_preview.prev").stop(true, true).fadeOut(100, "linear");
        });

        arrowNext.mouseleave(function () {
            $(".small_preview.next").stop(true, true).fadeOut(100, "linear");
        });


        arrowPrev1.hover(function () {
            $(this).parent().find(".small_preview.prev").stop(true, true).fadeToggle(400, "linear");
        });
        arrowNext1.hover(function () {
            $(this).parent().find(".small_preview.next").stop(true, true).fadeToggle(400, "linear");
        });


        arrowPrev2.hover(function () {
            if (!$(this).hasClass("disabled")) {
                $(this).parent().parent().parent().find(".small_preview.prev").stop(true, true).fadeToggle(400, "linear");
            }
        });
        arrowNext2.hover(function () {
            if (!$(this).hasClass("disabled")) {
                $(this).parent().parent().parent().find(".small_preview.next").stop(true, true).fadeToggle(400, "linear");
            }
        });
        arrowPrev3.mouseleave(function () {
            jQuery(this).parent().parent().find(".small_preview.prev").stop(true, true).fadeOut(100, "linear");
        });

        arrowNext3.mouseleave(function () {
            jQuery(this).parent().parent().find(".small_preview.next").stop(true, true).fadeOut(100, "linear");
        });

        // PROGRESS BAR
        progressBar.each(function () {

            var val = parseInt(jQuery(this).attr('data-width'), 10),
                len = val + '%';



            jQuery(this).css('width', len);

        });
        // brands block
        brands.jcarousel({
            vertical: false,
            visible: 5,
            scroll: 3,
            buttonNextHTML: '<a class="btn"><i class="icon-right-thin icon-large"></i></a>',
            buttonPrevHTML: '<a class="btn"><i class="icon-left-thin icon-large"></i></a>'
        });
        brandsImg.mouseover(function () {
            brandsImg.removeClass("brands_active").addClass("brands_n_active");
            $(this).removeClass("brands_n_active").addClass("brands_active");
        }).mouseout(function () {
            brandsImg.removeClass("brands_n_active").removeClass("brands_active");
        });



        $(window).scroll(function () {
            <!--SPY-->            
            if ($(".container").width() > 767) {


                if ($(this).scrollTop() > $('#header .wrapper_w').height() + 60 + $('#topline').height()) {
                    $('#spy').addClass('fix');
                } else {
                    $('#spy').removeClass('fix');
                }
            }
            if ($(this).scrollTop() > 150) {
                rightToolbar.fadeIn();
            } else {
                if (rightToolbar.find(".shopping_cart_mini").css("display") == "block") {
                    rightToolbar.find(".shopping_cart_mini").fadeOut();
                }
                rightToolbar.fadeOut();
            }
        });

        $(window).resize(function () {
            preview.hide();
            smallPreview.hide();
            shoppingCartMini.hide();
            TopSlider(flexSliderTop);
            if (isotopeOuter.length != 0) {
                isotopeOuter.isotope('reLayout');
            }
            if (hoverfold.length != 0) {
                hoverfold.isotope('reLayout');
            }
            if (ppPicHolder.length != 0) {}
            clearTimeout(resize_picholder);
            resize_picholder = setTimeout(function () {
                resizePicHolder();
            }, 100);
        });


    })
    $(window).load(function () {
        var isotopeOuter = $('.isotope-outer');
        var mainNav = $('#nav');
        var spy = $('#spy');
        var cloudGalleryOuter = $('.product-more-views ul');
        var imageCloudZoom = $('.product-image img.cloudzoom');

        if (isotopeOuter.length != 0) {
            var $container = isotopeOuter;
            if (isotopeOuter.find('.product')[0]) {
                $container.isotope({
                    itemSelector: '.product',
                    getSortData: {
                        name: function ($elem) {
                            return $elem.find('.product-name a ').text();
                        },
                        price: function ($elem) {
                            return parseFloat($elem.find('.sort-price').text());
                        },
                        rating: function ($elem) {
                            return parseFloat($elem.find('.sort-rating').text());
                        }
                    }

                });
            }
            if (isotopeOuter.find('.post-preview-small')[0]) {
                $container.isotope({
                    itemSelector: '.post-preview-small'
                });
                var $optionSets = $('#options .option-set'),
                    $optionLinks = $optionSets.find('a');
                $optionLinks.click(function () {
                    var $this = $(this);
                    // don't proceed if already selected
                    if ($this.hasClass('selected')) {
                        return false;
                    }
                    var $optionSet = $this.parents('.option-set');
                    $optionSet.find('.selected').removeClass('selected');
                    $this.addClass('selected');

                    // make option object dynamically, i.e. { filter: '.my-filter-class' }
                    var options = {},
                        key = $optionSet.attr('data-option-key'),
                        value = $this.attr('data-option-value');
                    // parse 'false' as false boolean
                    value = value === 'false' ? false : value;
                    options[key] = value;
                    if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
                        // changes in layout modes need extra logic
                        changeLayoutMode($this, options)
                    } else {
                        // otherwise, apply new options
                        $container.isotope(options);
                    }
                    return false;
                });
            }
        }
        if (mainNav.length) {
            spy.find('nav').html($('#nav:first').clone());
            spy.find('nav li').removeClass('hover');
        }
        spy.find('.spyshop').html(jQuery('#cart').clone());


        var PreviewSliderHeight = function () {
            var big_image_height = imageCloudZoom.height();
            var preview_image_height = cloudGalleryOuter.find('li:first-child').height();
            var slider_height = Math.round(big_image_height / preview_image_height) * preview_image_height;
            $(".jcarousel-skin-previews").find('.jcarousel-clip-vertical').css({
                "height": slider_height + "px"
            });
        };

        // small thumbnails vertical carousel

        cloudGalleryOuter.jcarousel({
            vertical: true,
            scroll: 3,
            buttonNextHTML: '<a class="btn"><i class="icon-up"></i></a>',
            buttonPrevHTML: '<a class="btn"><i class="icon-down"></i></a>',
            itemLoadCallback: PreviewSliderHeight
        });


    })


})(jQuery);