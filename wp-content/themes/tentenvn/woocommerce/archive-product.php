<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>


	
		<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="bg_breadcrumb">
	<div class="container">
		<div class="breadcrumb">
			<h1><?php echo woocommerce_page_title(); ?></h1>
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
</div>
<div class="g_content">
	<div class="container">
	

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>

<?php

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

 $args = array(
    'orderby' => 'date', // we will sort posts by date
    'post_type' => 'product',
    'posts_per_page' => 9,
    'paged' => $paged
  );

  if(isset($_GET['title_filter'])){
    $args['s'] = esc_attr( $_GET['title_filter'] );
  }

  // for taxonomies / categories
  if( isset( $_GET['nation'] ) && $_GET['nation'] != '' ) {
  	$args['meta_query'] = array(
        array(
            'key'     => '_nation',
            'value'   =>  $_GET['nation'],
            'compare' => 'LIKE',
        ),
    );      
	}
$wp_query = new WP_Query( $args );
?>
		<?php if($wp_query->have_posts()): ?>
		<ul class="list_products  list_products_archive row">
		<?php 
		while ( $wp_query->have_posts() ) { $wp_query->the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	 ?>
</ul>
<?php  wp_reset_postdata(); ?>
<?php get_template_part('includes/frontend/pagination/pagination'); ?>
<?php else:  ?>
	<h2 class="title_not_found">Không tìm thấy dữ liệu</h2>
<?php endif; ?>

	<?php 


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
?>
	</div>
</div>
	

<?php
get_footer( 'shop' );
