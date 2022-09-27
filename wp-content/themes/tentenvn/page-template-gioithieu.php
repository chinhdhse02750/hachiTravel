<?php 
/*
Template Name: page-template-gioithieu
*/
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
		<?php 
		if(have_posts()) :
			while(have_posts()) : the_post();
				the_content();
			endwhile;
		endif;
		?>
</div>
<?php get_footer(); ?>




