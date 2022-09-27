

<footer class="footer">
	<div class="container">
	     <?php
    $post_id = 835; 
    if ( class_exists( 'SiteOrigin_Panels' ) && get_post_meta( $post_id, 'panels_data', true ) ) {
      echo SiteOrigin_Panels::renderer()->render( $post_id );
    } else {
      echo apply_filters( 'the_content', get_post( $post_id )->post_content );
    }
    ?>
</div>
</footer>
<div class="popup popup_search">
  <div class="content_popup">
    <h2>Search</h2>
    <form role="search" method="get" id="searchform" action="<?php echo home_url('/');  ?>">
      <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Type here">
      <input type="hidden" value="product" name="post_type">
      <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
    </form>
    <div class="close_popup"><i class="fa fa-times" aria-hidden="true" data-dismiss="modal"></i></div>
  </div>
</div>
<div class="scrolltop">
  <i class="fa fa-angle-up" aria-hidden="true"></i> 
</div>
<div class="copyright">
    <div class="container">
      <p>Design by <a href="https://ninjadona.com/" target="_blank">Ninja Dona <img src="<?php echo BASE_URL; ?>/images/ninjadona_w.png" alt="Ninja Dona website"></a> </p>
    </div>
  </div>
<?php wp_footer(); ?>



<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/jquery.fancybox.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>


</body>
</html>