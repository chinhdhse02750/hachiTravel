<?php 

function misha_meta_box() {
    add_meta_box( 'gallery-metabox', 'Ảnh thư viện', 'gallery_meta_callback', 'library');

}

/*
 * Add a meta box
 */
add_action( 'admin_menu', 'misha_meta_box' );



// Gallery cpt
 function gallery_meta_callback($post) {
    wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
    $ids = get_post_meta($post->ID, '_tdc_gallery_id', true);
    ?>
    <table class="form-table">
        <tr><td>
            <a class="gallery-add button" href="#" data-uploader-title="Thêm hình ảnh" data-uploader-button-text="Thêm nhiều hình ảnh" style="margin:0px 0px 10px 0px;">Upload Images</a>
            <ul id="gallery-metabox-list">
                <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>
                    <li>
                        <input type="hidden" name="tdc_gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
                        <img class="image-preview" src="<?php echo $image[0]; ?>">
                        <a class="change-image button button-small" href="#" data-uploader-title="Đổi hình khác" data-uploader-button-text="Đổi hình khác">Change Image</a><br>
                        <small><a class="remove-image" href="#">Delete</a></small>
                    </li>
                <?php endforeach; endif; ?>
            </ul>
        </td></tr>
    </table>
 <?php }
 function gallery_meta_save($post_id) {
    if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if(isset($_POST['tdc_gallery_id'])) {
        update_post_meta($post_id, '_tdc_gallery_id', $_POST['tdc_gallery_id']);
    } else {
        delete_post_meta($post_id, '_tdc_gallery_id');
    }
 }
 add_action('save_post', 'gallery_meta_save');

?>