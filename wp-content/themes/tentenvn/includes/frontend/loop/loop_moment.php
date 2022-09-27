<li class="col-sm-4">
	<div class="wrap_inner">
		<div class="wrap_figure">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
			<figure class="bg_f"><a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>"></a></figure>
		</div>
		<div class="info_post">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
</li>