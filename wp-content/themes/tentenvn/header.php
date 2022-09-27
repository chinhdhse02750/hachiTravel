<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<title><?php if(is_front_page()){ echo bloginfo('name');}else { echo wp_title('',true,'');} ?></title>
	<meta property="og:type"         content="website" />
	<?php if(is_product()){ ?>
		<?php
		global $post; 
		$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt ); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ),  $size = 'large' );
		?>
		<meta property="og:url"          content="<?php the_permalink(); ?>" />
		<meta property="og:title"    content="<?php the_title(); ?>"/>
		<meta property="og:description"  content="<?php echo $short_description; ?>" />
		<meta property="og:image"        content="<?php echo $image[0]; ?>" />

	<?php }else{?>
		<meta property="og:url"          content="<?php get_site_url(); ?>" />
		<meta property="og:title"        content="<?php if(is_front_page()){ echo bloginfo('name');}else { echo wp_title('',true,'');} ?>"/>
		<meta property="og:description"  content="CÁC TOUR DU LỊCH TRONG NƯỚC GIÁ RẺ ĐƯỢC YÊU THÍCH NHẤT NĂM · Sapa - Thị trấn sương mù · Thủ đô nghìn năm văn hiến Hà Nội · Di sản thiên nhiên thế giới Vịnh Hạ Long." />
		<meta property="og:image"        content="<?php echo BASE_URL; ?>/images/banner_og.jpg" />
		<meta property="og:image:alt"        content="Banner Zalo" />
	<?php } ?>
	<!-- css -->
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
	<!-- js -->
	<script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
	<?php wp_head(); ?>
</head>


<body <?php body_class() ?>>

	<div class="bg_opacity"></div>

	<?php if ( wp_is_mobile() ) { ?>
		<div id="menu_mobile_full">
			<nav class="mobile-menu">
				<p class="close_menu"><span><img src="<?php echo BASE_URL; ?>/images/tg_cancel.png"></span></p>
				<div class="logo_mb">
					<?php  if(has_custom_logo()){  ?>
						<figure>
							<?php the_custom_logo(); ?>
						</figure>
					<?php } else { ?> 
						<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				</div>
				<?php 
				$args = array('theme_location' => 'menu_mobile');
				?>
				<?php wp_nav_menu($args);?>
			</nav>
		</div>
	<?php }?>
	<header class="header">
		<div class="top_header">
			<?php if (is_user_logged_in() && wp_is_mobile() ): ?>
			<div class="after_login after_login_mb">
				<a href="<?php echo get_site_url();?>/tai-khoan">	
					<?php  $current_user = wp_get_current_user();
					echo '' . $current_user->user_login . '';
				?></a>
				| <a href="<?php echo wp_logout_url(); ?>" > Log out</a>
			</div>
		<?php endif; ?>
		<span class="icon_mobile_click"><i class="fa fa-bars" aria-hidden="true"></i></span>
		<div class="container">
			<div class="wrap_hd">
				<div class="logo_site">
					<?php  if(has_custom_logo()){  ?>
						<figure>
							<?php the_custom_logo(); ?>
						</figure>
					<?php } else { ?> 
						<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				</div>

				
				<?php if(!wp_is_mobile()){ ?>
					<nav class="nav nav_primary">
						<?php 
						$args = array('theme_location' => 'primary');
						?>
						<?php wp_nav_menu($args); ?>
					</nav>
				<?php } ?>
			</div>
		</div>
	</div>
  
				

	<?php if(is_front_page() && !is_home()){ ?>
		<div class="banner_home">
			<?php $arg_slide = array(
				'post_type' => 'slider',
				'orderby' => 'date',
				'post_status' => 'publish'
			); 
			$query_arg_slide= new WP_Query($arg_slide);
			if($query_arg_slide->have_posts()): ?>
				<ul>
					<?php while($query_arg_slide->have_posts()) : $query_arg_slide->the_post(); ?>
						<?php  $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'full'); ?>	
						<li>
							<figure class="bg_f"><img src="<?php echo $image[0]; ?>"></figure>
							<div class="textwidget">
								<?php the_content(); ?>
							</div>
						</li>
					<?php endwhile;?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<?php else : echo 'No data';
				endif;	
				?>
				<form role="search" method="get" id="searchform" action="<?php echo home_url('/');  ?>">
					<div class="tg_search">
						<div class="tg_diemden">
							<?php 
							$selected = esc_attr(get_post_meta( $post->ID, '_nation', true ));
							$countries = WC()->countries->get_countries(); 
							?>
							<select name="nation">
								<option value="">Chọn điểm đến</option>
								<?php
								foreach($countries as $key => $val){
									?>
									<option value="<?php echo $key; ?>" <?php echo selected( $selected, $key ); ?>><?php echo $val; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<input type="text" value="<?php the_search_query(); ?>" name="title_filter" id="s" placeholder="Tìm kiếm">
						<input type="hidden" value="product" name="post_type">
						<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>

		<?php } ?>

		<?php 
// 				$menu_name = 'primary'; //menu slug
// $locations = get_nav_menu_locations();
// $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
// $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<?php
// foreach($menu_items as $menu_item){
// 	if( $menu_item->menu_item_parent == 0 ) {
// 	$parent = $menu_item->ID; 
// 		        $menu_array = array();
//                 foreach( $menu_items as $submenu ) {
//                     if( $submenu->menu_item_parent == $parent ) {
//                         $bool = true;
//                         $menu_array[] = '<li><a href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
//                     }
//                 }
//                 if( $bool == true && count( $menu_array ) > 0 ) {
                     
//                     $menu_list .= '<li class="dropdown">' ."\n";
//                     $menu_list .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";
                     
//                     $menu_list .= '<ul class="dropdown-menu">' ."\n";
//                     $menu_list .= implode( "\n", $menu_array );
//                     $menu_list .= '</ul>' ."\n";
                     
//                 } else {
                     
//                     $menu_list .= '<li>' ."\n";
//                     $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
//                 }
// 	}
// }
?>
	</header>


