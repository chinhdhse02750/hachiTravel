<?php 
get_header(); 
?>	
<div class="bg_breadcrumb">
	<div class="container">
		<div class="breadcrumb">
			<h1><?php the_title(); ?></h1>
			<ul>
				<?php echo the_breadcrumb(); ?>
			</ul>
		</div>
	</div>
</div>
	<div class="g_content">
		<div class="container">
					
			<div class="row">
				<?php 
				if(have_posts()) :
					while(have_posts()) : the_post(); ?>
						<?php 
	global $post;
	 $ids = get_post_meta($post->ID, '_tdc_gallery_id', true);
	if($ids){
	 ?>
	<ul class="slide_pk">	
		<?php foreach($ids as $image){ ?>
			<?php $img = wp_get_attachment_image_src($image, 'large');?>

			<li class="col-sm-4"><a href="<?php echo $img[0];  ?>" class="fancybox" data-fancybox="spvn_glr"><figure><img src="<?php echo $img[0]; ?>"></figure></a></li>

		<?php } ?>
		<?php } ?>
	</ul>
					<?php endwhile;
				else:
				endif;
				wp_reset_postdata();
				?>
			</div>
			
		</div>

		
	</div>



<?php get_footer(); ?>


