<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;



if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php $image_single = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' ); ?>
<div class="bg_breadcrumb" style="background:url('<?php echo $image_single[0]; ?>');">
	<div class="container">
		<div class="breadcrumb">
			<h1><?php the_title(); ?></h1>
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
</div>
<?php 
	/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
	do_action( 'woocommerce_before_single_product' );
	?>
	<?php 
	$socho = get_post_meta( $post->ID, '_socho', true );
	$phuongtien = get_post_meta( $post->ID, '_phuongtien', true );
	$thoigian = get_post_meta( $post->ID, '_thoigian', true );
	$khoihanh = get_post_meta( $post->ID, '_khoihanh', true );
	$selected = esc_attr(get_post_meta( $post->ID, '_nation', true )); 
	$diemxuatphat = esc_attr(get_post_meta( $post->ID, '_diemxuatphat', true )); 
	
	?>
	<div class="g_content">
		<div class="container">
			<div class="sgpd_content">
				<div class="row">
				<div class="col-sm-8 tg_gallery_pd">
				<?php 
				global $product;
				$attachment_ids = $product->get_gallery_image_ids();
				?>
				<div class="tg_galeery_l">
					<h3 class="title_sgpd"><i class="fa fa-image"></i>Hình ảnh</h3>
					<div class="tg_img_product <?php if($attachment_ids){ echo 'pd_gallery';} ?>">
						<?php 
						$id = $product->get_id();
						$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' );?>
						<img src="<?php  echo $image[0]; ?>">
					</div>
					<?php if($attachment_ids){?>
						<div class="woocommerce-product-gallery">
							<ul>
								<?php
								foreach( $attachment_ids as $attachment_id ) {
        			//echo $image_link = wp_get_attachment_url( $attachment_id );
									?>
									<li><figure style="background:url(<?php echo wp_get_attachment_url( $attachment_id ); ?>)"><img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>"></figure></li>
									<?php
								}
								?>
							</ul>
						</div>
					<?php }?>
				</div>
				<div class="tg_tttour tg_single_twg">
					<h3 class="title_sgpd"><i class="fa fa-list-ol" aria-hidden="true"></i>Chương trình tour</h3>
					<div class="textwidget_inner">
						<?php  the_content();?>
					</div>
				</div>
				<div class="tg_luuy tg_single_twg">
					<h3 class="title_sgpd"><i class="fa fa-list-ol" aria-hidden="true"></i>Lưu ý</h3>
					<div class="textwidget">
						<?php  $product_cttour = get_post_meta( $post->ID, '_bhww_cttour_ip', true ); echo $product_cttour;?>
					</div>
				</div>
			</div>
			<div class="col-sm-4  ">
				<div class="tg_info_single_pd">
					<?php global $product; ?>
				<?php 
				if ($product->is_type( 'simple' )) {
					$regular_price_str =  $product->get_regular_price();
				} elseif($product->is_type('variable')){
					$regular_price_str =  $product->get_variation_regular_price( 'max', true );
				}
				$regular_price =  number_format($regular_price_str,0, '', '.'); 
				$sale_price_str =  $product->get_sale_price();
				?>
				<?php if($regular_price){ ?>
					<div class="tg_price">
						<?php if($sale_price_str){ ?> 
							<?php $sale_price = number_format($sale_price_str,0, '', '.'); ?>
							<span class="tg_sale_price"><?php echo $sale_price; ?>đ</span>
						<?php } ?>
						<span class="tg_reg_price <?php if($sale_price_str){echo 'has_sale_pr';} ?>"><?php  echo $regular_price; ?>đ</span>
					</div>
	
					<ul class="info_tour_sb">
						<li class="its_title"><?php the_title(); ?></li>
						<?php if(!empty($thoigian)){?> <li class="its_time">Thời gian: <strong><?php echo $thoigian; ?></strong></li> <?php } ?>
						<li class="its_sku">Mã tour: <strong><?php  echo $product->get_sku(); ?></strong></li>
						<?php if(!empty($socho)){?> <li class="its_slot">Số chỗ còn: <strong><?php echo $socho; ?></strong></li> <?php } ?>
						<?php if(!empty($phuongtien)){?> <li class="its_phuongt">Phương tiện: <strong><?php echo $phuongtien; ?></strong></li> <?php } ?>
						<?php if(!empty($khoihanh)){?> <li class="its_startp">Khởi hành tại: <strong><?php echo $khoihanh; ?></strong></li> <?php } ?>
					</ul>
					<div class="btn_ct">
						<a href="tel:036 334 9096">036 334 9096</a>
					</div>
				<?php }?>
				</div>
			</div>
			</div>
			</div>
			
			<div class="tg_related products">
				<h2>Tour khác</h2>
				<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
	
</div>

</div>


