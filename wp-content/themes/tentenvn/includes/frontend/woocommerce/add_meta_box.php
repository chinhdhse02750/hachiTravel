<?php 

## ---- 1. Backend ---- ##
// Adding a custom Meta container to admin products pages
add_action( 'add_meta_boxes', 'create_custom_meta_box' );
if ( ! function_exists( 'create_custom_meta_box' ) )
{
  function create_custom_meta_box()
  {
    add_meta_box(
      'custom_product_meta_box',  __( 'Lưu ý', 'cmb' ), 'add_custom_content_meta_box', 'product', 'normal','default'
    );
  }
}

//  Custom metabox content in admin product pages
if ( ! function_exists( 'add_custom_content_meta_box' ) ){
  function add_custom_content_meta_box( $post ){
        $prefix = '_bhww_'; // global $prefix;

        $cttour = get_post_meta($post->ID, $prefix.'cttour_ip', true) ? get_post_meta($post->ID, $prefix.'cttour_ip', true) : '';
        $args['textarea_rows'] = 6;

        wp_editor( $cttour, 'cttour_ip', $args );


        echo '<input type="hidden" name="custom_product_field_nonce" value="' . wp_create_nonce() . '">';
      }
    }

//Save the data of the Meta field
    add_action( 'save_post', 'save_custom_content_meta_box', 10, 1 );
    if ( ! function_exists( 'save_custom_content_meta_box' ) )
    {

      function save_custom_content_meta_box( $post_id ) {
        $prefix = '_bhww_'; // global $prefix;

        // We need to verify this with the proper authorization (security stuff).

        // Check if our nonce is set.
        if ( ! isset( $_POST[ 'custom_product_field_nonce' ] ) ) {
          return $post_id;
        }
        $nonce = $_REQUEST[ 'custom_product_field_nonce' ];

        //Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce ) ) {
          return $post_id;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
        }

        // Check the user's permissions.
        if ( 'product' == $_POST[ 'post_type' ] ){
          if ( ! current_user_can( 'edit_product', $post_id ) )
            return $post_id;
        } else {
          if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;
        }

        // Sanitize user input and update the meta field in the database.
        update_post_meta( $post_id, $prefix.'cttour_ip', wp_kses_post($_POST[ 'cttour_ip' ]) );
      }
    }

## ---- 2. Front-end ---- ##

// Create custom tabs in product single pages
    add_filter( 'woocommerce_product_tabs', 'custom_product_tabs' );
    function custom_product_tabs( $tabs ) {
      global $post;

      $product_cttour = get_post_meta( $post->ID, '_bhww_cttour_ip', true );

      if ( ! empty( $product_cttour ) )
        $tabs['cttour_tab'] = array(
          'title'    => __( 'Thông số kỹ thuật', 'woocommerce' ),
          'priority' => 10,
          'callback' => 'cttour_product_tab_content'
        );

      return $tabs;
    }

// Remove description heading in tabs content
    add_filter('woocommerce_product_description_heading', '__return_null');

// Add content to custom tab in product single pages (1)
    function cttour_product_tab_content() {
      global $post;

      $product_cttour = get_post_meta( $post->ID, '_bhww_cttour_ip', true );

      if ( ! empty( $product_cttour ) ) {
        // Updated to apply the_content filter to WYSIWYG content
        echo apply_filters( 'the_content', $product_cttour );
      }
    }



function misha_meta_box_add() {
    add_meta_box( 'info_doctor_area', 'Thông tin tour', 'tour_info_output', 'product' );
}

add_action( 'admin_menu', 'misha_meta_box_add' );


function tour_info_output( $post )
        {
            $socho = get_post_meta( $post->ID, '_socho', true );
            $phuongtien = get_post_meta( $post->ID, '_phuongtien', true );
            $thoigian = get_post_meta( $post->ID, '_thoigian', true );
            $khoihanh = get_post_meta( $post->ID, '_khoihanh', true );
            $selected = esc_attr(get_post_meta( $post->ID, '_nation', true )); 
            $diemxuatphat = esc_attr(get_post_meta( $post->ID, '_diemxuatphat', true )); 
            ?>
            <div class="row">
                <div class="col-sm-3">
                    <label for="socho">Số chỗ còn lại </label>
                    <div class="wrap_group_item">
                        <input type="text" id="socho" name="socho" value="<?php echo esc_attr( $socho );?>" />
                    </div>
                </div>
                <div class="col-sm-3">
                    <label for="phuongtien">Phương tiện </label>
                    <div class="wrap_group_item">
                        <input type="text" id="phuongtien" name="phuongtien" value="<?php echo esc_attr( $phuongtien );?>" />
                    </div>
                </div>
                <div class="col-sm-3">
                    <label for="thoigian">Thời gian </label>
                    <div class="wrap_group_item">
                        <input type="text" id="thoigian" name="thoigian" value="<?php echo esc_attr( $thoigian );?>" />
                    </div>
                </div>
                <div class="col-sm-3">
                    <label for="khoihanh">Khởi hành </label>
                    <div class="wrap_group_item">
                         <input type="text" id="tg_date_choose" name="khoihanh" data-language="en" data-position='right top'  class="tg_date_choose datepicker-here" placeholder="dd-mm-yyyy" value="<?php echo esc_attr($khoihanh) ;?>"  />
                    </div>
                </div>
                <div class="col-sm-3">
                  <label for="country">Điểm xuất phát</label>
                  <?php $diemxp = WC()->countries->get_countries(); ?>
                  <select name="diemxuatphat">
                  <?php
                      foreach($diemxp as $key1 => $val1){
                        ?>
                        <option value="<?php echo $key1; ?>" <?php echo selected( $diemxuatphat, $key1 ); ?>><?php echo $val1; ?></option>
                        <?php
                      }
                   ?>
                   </select>
                </div>

                <div class="col-sm-3">
                  <label for="country">Điểm đến</label>
                  <?php $countries = WC()->countries->get_countries(); ?>
                  <select name="nation">
                  <?php
                      foreach($countries as $key => $val){
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo selected( $selected, $key ); ?>><?php echo $val; ?></option>
                        <?php
                      }
                   ?>
                   </select>
                </div>
            </div>

            <?php
        }

 function tg_thongtintour($post_id){
    if(isset($_POST['socho'])){
        $socho =  sanitize_text_field($_POST['socho']) ;
        $phuongtien =  sanitize_text_field($_POST['phuongtien']) ;
        $thoigian =  sanitize_text_field($_POST['thoigian']) ;
        $khoihanh =  sanitize_text_field($_POST['khoihanh']) ;
        $national = sanitize_text_field($_POST['nation']);
        $diemxuatphat = sanitize_text_field($_POST['diemxuatphat']);

        update_post_meta( $post_id, '_socho', $socho );
        update_post_meta( $post_id, '_phuongtien', $phuongtien );
        update_post_meta( $post_id, '_thoigian', $thoigian );
        update_post_meta( $post_id, '_khoihanh', $khoihanh );
        update_post_meta( $post_id, '_diemxuatphat', $diemxuatphat );
        update_post_meta( $post_id, '_nation', $national );

    }  
 }
 add_action( 'save_post', 'tg_thongtintour' );