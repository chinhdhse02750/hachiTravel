<?php
function shortcode_newpost_sb(){
	ob_start(); ?>
	<?php 
	$arg = array(
		'post_type'=>'post',
		'orderby' => 'rand',
		'posts_per_page' => 6
	);
	$query_new_post = new WP_Query($arg);
	if($query_new_post->have_posts()) : ?>
		<div class="wrap_ct_sb">
			<h3>Tin nổi bật</h3>
			<ul class="list_post_sb">
				<?php while($query_new_post->have_posts()) : $query_new_post->the_post(); ?>
					<li>
						<?php 
						global $post;
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'thumbnail');
						?>
						<div class="wrap_figure">
							<figure class="bg_f" style="background:url('<?php echo $image[0]; ?>')"><a href="<?php the_permalink(); ?>"></a></figure>
						</div>
						<div class="textwidget">
							<span><?php the_time('d/m/Y'); ?></span>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</div>

					</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<?php wp_reset_postdata(); ?>
		<?php else: echo 'No data';  ?>
		<?php endif; ?>
		<?php return ob_get_clean();
	}
	add_shortcode('sc_news_sb','shortcode_newpost_sb');

	