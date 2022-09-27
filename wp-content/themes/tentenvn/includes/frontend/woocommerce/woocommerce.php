<?php 

// PRIOTITY SINGLE-PRODUCT THAN SINGLE.PHP
function priority_single_product() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'priority_single_product' );
// LOGOUT REDIRECT INDEX
add_action( 'wp_logout', 'redirect_after_logout');
function redirect_after_logout(){
  wp_redirect(home_url());
  exit();
}
/* WOOCOMERCE MINICART*/
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
 global $woocommerce;
 ob_start();
 ?>
 <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('Xem giỏ hàng', 'woothemes'); ?>">
  <?php 
  echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="amount_pdc">';
  echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php //echo $woocommerce->cart->get_cart_total(); ?>
  <?php echo '</span>'; ?>
</a>
<?php
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}
// SHOW PRODUCT TO CART AJAX
add_filter( 'woocommerce_widget_cart_is_hidden', 'always_show_cart', 40, 0 );
function always_show_cart() {
  return false;
}
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {
  ob_start();
  ?>
  <div class="header-quickcart">
    <?php woocommerce_mini_cart(); ?>
  </div> 
  <?php $fragments['div.header-quickcart'] = ob_get_clean();
  return $fragments;
} );
// CLEAR THE CART WHEN LOGOUT
function clear_cart_logout() {
  if( function_exists('WC') ){
    WC()->cart->empty_cart();
  }
}
add_action('wp_logout', 'clear_cart_logout');
// CLEART THE CART WHEN LOGIN
function clear_persistent_cart_after_login( $user_login, $user ) {
  $blog_id = get_current_blog_id();
    // persistent carts created in WC 3.1 and below
  if ( metadata_exists( 'user', $user->ID, '_woocommerce_persistent_cart' ) ) {
    delete_user_meta( $user->ID, '_woocommerce_persistent_cart' );
  }
    // persistent carts created in WC 3.2+
  if ( metadata_exists( 'user', $user->ID, '_woocommerce_persistent_cart_' . $blog_id ) ) {
    delete_user_meta( $user->ID, '_woocommerce_persistent_cart_' . $blog_id );
  }
}
add_action('wp_login', 'clear_persistent_cart_after_login', 10, 2);
/**
 * BREADCRUMB WOOCOMERCE
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
  return array(
    'delimiter'   => ' ',
    'wrap_before' => '<div class="breadcrumb" id="breadcrumb"><ul>',
    'wrap_after'  => '</ul></div>',
    'before'      => '<li>',
    'after'       => '</li>',
    'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
  );
}
// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// add class thumbnail for product woocomerce archive 
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
  function woocommerce_template_loop_product_thumbnail() {
    echo woocommerce_get_product_thumbnail();
  } 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
  function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
    global $post, $woocommerce;
    $args = array( 'post_type' => 'product', 'posts_per_page' => 9, 'orderby' => 'date' );
    $loop = new WP_Query( $args );
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
    $output = '<figure class="thumbnail ">';
    if ( has_post_thumbnail() ) {               
      $output .= get_the_post_thumbnail( $post->ID, $size );
    } else {
     $output .= wc_placeholder_img( $size );
   }                       
   $output .= '</figure>';
   return $output;
 }
}

// ADD BUTTON ADD TO CARD AJAX
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );


// REMOVE WOOCOMERCE SHIPPING FIELDS
function disable_shipping_calc_on_cart( $show_shipping ) {
  if( is_cart() ) {
    return false;
  }
  return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

//custom woocommerce_before_shop_loop_item_title in archive

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

function woocommerce_template_loop_product_thumbnail(){
  global $post;
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size = "full" );
  ?><figure class="thumbnail">
    <img src="<?php echo $image[0]; ?>">
  </figure>

   
  
  <?php 
}

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_meta_archive', 15 );

function woocommerce_template_loop_meta_archive() {
  global $product;
  ?> 
  <div class="product_meta">
    <h3><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(get_the_ID());?></a></h3>
      
    <div class="price">
      <span>
        <?php echo $product->get_price_html(); ?>
      </span>      
    </div>
    <?php woocommerce_template_loop_add_to_cart( $product ); ?>
  </div>
  <?php
}


// Remove add to cart buttons on shop archive page in WooCommerce 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Hide Prices on the Shop & Category Pages
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );




?>
