<li class="list_item_product col-sm-4">
	<div class="product_inner">
		<?php 
			$socho = get_post_meta( $post->ID, '_socho', true );
			$phuongtien = get_post_meta( $post->ID, '_phuongtien', true );
			$thoigian = get_post_meta( $post->ID, '_thoigian', true );
			$khoihanh = get_post_meta( $post->ID, '_khoihanh', true );
			$selected = esc_attr(get_post_meta( $post->ID, '_nation', true )); 
			$diemxuatphat = esc_attr(get_post_meta( $post->ID, '_diemxuatphat', true )); 
			?>
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

		<?php if($product->is_featured()){?>
			<div class="hot_pd">
				<span>hot</span>
			</div>
		<?php } ?>	
		<div class="wrap_figure">
			<?php 
			global $post;
			?>
			<figure>
				<a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
			</figure>
			<div class="tg_diemden">
				<span><?php $countries = WC()->countries->get_countries(); 
				echo isset($countries[$selected]) ? $countries[$selected] : '';
				?>
				</span>
			</div>
		</div>

		<div class="product_meta">
			<h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="tg_excerpt">
				<?php 
				$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
				echo $short_description;
				?>
			</div>
			
			<div class="tg_info_tour">
				<ul>
					<li class="tg_time"><?php echo $thoigian; ?></li>
					<li class="tg_start"><?php echo $khoihanh; ?></li>
				</ul>
			</div>
			<div class="price_see">
				<?php if($regular_price){ ?>
				<div class="tg_price">
					<?php if($sale_price_str){ ?> 
						<?php $sale_price = number_format($sale_price_str,0, '', '.'); ?>
						<span class="tg_sale_price"><?php echo $sale_price; ?>đ</span>
					<?php } ?>
					<span class="tg_reg_price <?php if($sale_price_str){echo 'has_sale_pr';} ?>"><?php  echo $regular_price; ?>đ</span>
					
				</div>
			<?php }?>
			<div class="tg_detail_tour">
				<a href="<?php the_permalink(); ?>">Đặt tour</a>
			</div>
			</div>
			
		</div>
	</div>
</li>