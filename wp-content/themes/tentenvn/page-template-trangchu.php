
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
	<div class="g_content">
		<div class="tour_hot combo_home">
			<div class="container">
				<h3 class="widget-title">Khuyến mãi</h3>
				<h4>TOUR ĐANG HOT</h4>
				<ul class="tg_list_product row">
					<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 6,
						'tax_query' => array(
							array(
								'taxonomy' => 'product_visibility',
								'field'    => 'name',
								'terms'    => 'featured',
							),
						),
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							get_template_part('includes/frontend/loop/loop_product');
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
				</ul>
				<div class="btn_viewm">
					<a href="#">Xem thêm tour</a>
				</div>
				</div>
			</div>
			<div class="tour_tn combo_home">
				<div class="container">
					<h3 class="widget-title">Khám phá lịch sử - văn hóa - con người Việt Nam với</h3>
				<h4>TOUR Trong nước</h4>
				<ul class="tg_list_product row">
					<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 6,
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'term_id',
								'terms'    => 19
							),
						),
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							get_template_part('includes/frontend/loop/loop_product');
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
				</ul>
				<div class="btn_viewm">
					<a href="<?php echo get_term_link(19); ?>">Xem thêm tour</a>
				</div>
				</div>
			</div>

			<div class="tour_nn combo_home">
				<div class="container">
				<h3 class="widget-title">Khám phá lịch sử - văn hóa thế giới với</h3>
				<h4>TOUR Nước ngoài</h4>
				<ul class="tg_list_product row">
					<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 6,
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'term_id',
								'terms'    => 87
							),
						),
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							get_template_part('includes/frontend/loop/loop_product');
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
				</ul>
				<div class="btn_viewm">
					<a href="<?php echo get_term_link(87); ?>">Xem thêm tour</a>
				</div>
				</div>
			</div>

			<div class="moment_cus combo_home">
				<div class="container">
					<h3 class="widget-title">Nhìn lại cảm xúc với</h3>
					<h4>Khoảnh khắc lữ hành</h4>
					<ul class="tg_list_moment">
						<?php
					$args = array(
						'post_type' => 'library',
						'posts_per_page' => 6,
						'post_status' => 'publish',
						'orderby' => 'date'
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
							get_template_part('includes/frontend/loop/loop_moment');
						endwhile;
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>
					</ul>
				</div>
			</div>

			</div> <!-- g_content -->
		
		<?php get_footer(); ?>




