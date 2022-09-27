<?php 

get_header(); 
?>	
<div class="bg_breadcrumb">
	<div class="container">
		<div class="breadcrumb">
				<?php  if(is_category()){ ?>
						<h1> <?php echo single_cat_title(); ?> </h1>
					<?php } else if(is_tag()){
						echo '<h3 class="title_archives"><strong>' . single_tag_title() . '/<strong></h3>';
					}
					else if(is_author()){
						the_post();
						echo '<h3 class="title_archives">Author Archives : <strong> ' . get_the_author() . '</strong></h3>';
						rewind_posts();
					}
					else if(is_day()){
						echo '<h3 class="title_archives">Day Archives : <strong>' . get_the_date() . '</strong></h3>';
					}
					else if(is_month()){
						echo '<h3 class="title_archives">Monthly Archives : <strong>' . get_the_date('F Y') . '</strong></h3>';
					}
					else if(is_year()){
						echo '<h3 class="title_archives">Yearly Archives : <strong>' . get_the_date('Y') . '</strong></h3>';
					}
					else{
						echo 'archive';
					}
					?>
			<ul>
				<?php echo the_breadcrumb(); ?>
			</ul>
		</div>
	</div>
</div>
	<div class="g_content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				

					<ul class="row list_post_arc">
						<?php 
						if(have_posts()) :
							while(have_posts()): the_post();
								get_template_part('includes/frontend/loop/loop_post');
							endwhile;
							get_template_part('includes/frontend/pagination/pagination');
							?>
						</ul>
						<?php
					else:
					endif;
					wp_reset_postdata();
					?>
				</div>
				
			</div>
		</div>
	</div>





<?php get_footer(); ?>


