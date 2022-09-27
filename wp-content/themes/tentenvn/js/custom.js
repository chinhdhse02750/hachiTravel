
jQuery(document).ready(function(){


  // jQuery('.nav_primary ul.menu>li>ul.sub-menu>li>ul.sub-menu>li').mouseenter(function(){
  //   jQuery(this).find('.sub-menu').stop(true,true).slideDown();
  // });

  // jQuery('.nav_primary ul.menu>li>ul.sub-menu>li>ul.sub-menu>li').mouseleave(function(){
  //   jQuery(this).find('.sub-menu').slideUp();
  // });

  jQuery('.nav_primary ul.menu>li>ul.sub-menu>li').mouseenter(function(){
    jQuery(this).find('.sub-menu').show();
    jQuery(this).siblings().find('.sub-menu').hide();
  });




// fancybox
jQuery('.fancybox').fancybox({
	buttons : [ 
	'slideShow',
	'share',
	'zoom',
	'fullScreen',
	'close'
	],
	// thumbs : {
	// 	autoStart : true
	// }
});				 

  $('.product_inner .tg_diemden').each(function(){
  	 var back = ["gray","#36bca1","#f2911f","#9ed2e0","#ec927e","#6b6895","#8d5d2e"];
  var rand = back[Math.floor(Math.random() * back.length)];
  $(this).css('background',rand);
  });


	jQuery(document).on('click','.search_r_hd',function(){
		jQuery('.popup_search').modal('show');
	});


	setTimeout(function(){
		jQuery('.g_cart').addClass('tg_show');
	},3000);
				// SCROLL TO DIV
				jQuery(window).scroll(function(){
					if(jQuery(this).scrollTop()>500){
						jQuery('.scrolltop').addClass('go_scrolltop');
					}
					else{
						jQuery('.scrolltop').removeClass('go_scrolltop');
					}
				});
				jQuery('.scrolltop').click(function (){
					jQuery('html, body').animate({
						scrollTop: jQuery("html").offset().top
					}, 1000);
				}); 
				
				jQuery('.partners ul').slick({
					dots: true,
					infinite: true,
					speed: 300,
					slidesToShow: 7,
					slidesToScroll: 1,
					autoplay: false,
					dots: false,
					autoplaySpeed: 2000,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					}
					]
				});
				$(window).scroll(function(){
					if($(this).scrollTop()>50){
						$('.top_header').addClass('fixed_header');
					}
					else{
						$('.top_header').removeClass('fixed_header');
					}
				});
		// MENU MOBILE
		jQuery(".icon_mobile_click").click(function(){
			jQuery(this).fadeOut(300);
			jQuery("#page_wrapper").addClass('page_wrapper_active');
			jQuery("#menu_mobile_full").addClass('menu_show').stop().animate({left: "0px"},260);
			jQuery(".close_menu, .bg_opacity").show();
		});
		jQuery(".close_menu").click(function(){
			jQuery(".top_header .icon_mobile_click").fadeIn(300);
			jQuery("#menu_mobile_full").animate({left: "-100%"},260).removeClass('menu_show');
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
			jQuery(this).hide();
			jQuery('.bg_opacity').hide();
			if(jQuery('.middle_header').hasClass('fixed_menu')){
				jQuery('.middle_header.fixed_menu .icon_mobile_click').show();
			}
			
		});
		jQuery('.bg_opacity').click(function(){
			jQuery("#menu_mobile_full").animate({left: "-100%"},260).removeClass('menu_show');
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
			jQuery('.close_menu').hide();
			jQuery(this).hide();
			jQuery('.top_header .icon_mobile_click').fadeIn(300);
			if(jQuery('.middle_header').hasClass('fixed_menu')){
				jQuery('.middle_header.fixed_menu .icon_mobile_click').show();
			}
		});
		jQuery("#menu_mobile_full ul li a").click(function(){
			jQuery(".icon_mobile_click").fadeIn(300);
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
		});

		jQuery('.mobile-menu .menu>li:not(:has(ul.sub-menu)) , .mobile-menu .menu>li ul.sub-menu>li:not(:has(ul.sub-menu))').addClass('not-have-child');

		// menu cap 2
		jQuery('.mobile-menu ul.menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).children('ul').slideToggle();
			jQuery(this).siblings().has('ul.sub-menu').find('ul.sub-menu').slideUp();
			jQuery(this).siblings().find('ul.sub-menu>li').has('ul.sub-menu').removeClass('editBefore_mobile');
		}).children('ul').children().click(function(event){event.stopPropagation();});

		//menu cap 3
		jQuery('.mobile-menu ul.menu>li>ul.sub-menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).children('ul.sub-menu').slideToggle();
		}).children('ul').children().click(function(event){event.stopPropagation();});

			//menu cap 4
			jQuery('.mobile-menu ul.menu>li>ul.sub-menu>li>ul.sub-menu').children().has('ul.sub-menu').click(function(){
				jQuery(this).children('ul.sub-menu').slideToggle();
			}).children('ul').children().click(function(event){event.stopPropagation();});


			jQuery('.mobile-menu ul.menu li').has('ul.sub-menu').click(function(event){
				jQuery(this).toggleClass('editBefore_mobile');
			});
			jQuery('.mobile-menu ul.menu').children().has('ul.sub-menu').addClass('menu-item-has-children');
			jQuery('.mobile-menu ul.menu>li').click(function(){
				$(this).addClass('active').siblings().removeClass('active, editBefore_mobile');
			});

		// list_products_categories
		jQuery('.list_products_categories>ul').children().has('ul.sub_product_category').click(function(){
			jQuery(this).children('ul').slideToggle();
			jQuery('.list_products_categories>ul').children().not(this).has('ul.sub_product_category').find('ul.sub_product_category').slideUp();
		}).children('ul').children().click(function(event){event.stopPropagation()});
		jQuery('.list_products_categories>ul').children().find('ul.sub_product_category').children().has('ul.sub-menu').click(function(){
			jQuery(this).find('ul.sub-menu').slideToggle();
		});
		jQuery('.list_products_categories ul li').has('ul.sub_product_category').click(function(event){
			jQuery(this).toggleClass('editBefore_li_product');
			//event.preventDefault();
		});
		jQuery('.list_products_categories ul').children().has('ul.sub_product_category').addClass('menu-item-has-children');
		jQuery('.list_products_categories ul li').click(function(){
			jQuery(this).addClass('active').siblings().removeClass('active, editBefore_li_product ');
		});

		var width = jQuery(window).width();
		
		if(width<767){
			$('.single .list_products').slick({
				centerMode: true,
				centerPadding: '60px',
				slidesToShow: 1,
				responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 1
					}
				}
				]
			});
		}
		jQuery('span.onsale').text('Sale');

		// SLIDE
			if(jQuery('.banner_home').length>0){
				jQuery('.banner_home ul').slick({
					dots: false,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					arrows: false,
					autoplaySpeed: 5000,
					fade: true,
					pauseOnHover:false
				});
			}

if(jQuery('.woocommerce-product-gallery').length>0){
			jQuery('.woocommerce-product-gallery ul').slick({
				dots: false,
				slidesToShow: 4,
				loop:false,
				infinite:true,
				autoplay: true,
				autoplaySpeed:2000,
				arrows:true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
						}
					}
					]
			});	
			jQuery('.single-product .woocommerce-product-gallery ul li').click(function(){
			var link_img_preview =  jQuery(this).find('figure').html();
			jQuery('.tg_img_product img').replaceWith(link_img_preview);
		});
		}


		});

