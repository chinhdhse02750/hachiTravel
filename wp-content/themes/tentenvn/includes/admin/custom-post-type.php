<?php

/* SLIDER */
add_action('init', 'slider_custom_post_type');
add_filter('manage_slider_posts_columns', 'slider_columns');
add_action('manage_slider_posts_custom_column', 'slider_custom_column', 10, 2);
function slider_custom_post_type()
{
    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'menu_name' => 'Slider',
        'name_admin_bar' => 'Slider'
    );
    
    $args = array(
        'labels' => $labels, // show labels
        'show_in_nav_menus ' => false, 
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-cover-image',
        'public' => true, // required to display permalink under title post
        'query_var' => true,
        'publicly_queryable' => true, // permalink
        'supports' => array(
            'title',
            'thumbnail',
            'editor'
        )
    );
    
    register_post_type('slider', $args);
    
}
function slider_columns($columns)
{
      $newColumns          = array();
    $newColums['cb'] = '<input type="checkbox" />';
    $newColums['title']  = 'Title';
    $newColums['author'] = __('Author');
    $newColums['avatar'] = 'Avatar';
    // $newColums['categories'] = __('Categories');
    // $newColums['tags'] = __('Tags');
    $newColums['date'] = _x('Date', 'column name');
    return $newColums;
}
function slider_custom_column($column, $post_id)
{
    switch ($column) {
        case 'avatar':
            echo get_the_post_thumbnail();
            break;
    }
}
/* end SLIDER */


	add_action( 'init', 'tg_contact_custom_post_type_library' );
	add_filter('manage_library_posts_columns','sunset_set_contact_columns_library');
	add_action('manage_library_posts_custom_column','sunset_contact_custom_column_library',10,2);

/* library */
function tg_contact_custom_post_type_library() {
	$labels = array(
		'name' 				=> 'Thư viện hình ảnh',
		'singular_name' 	=> 'Thư viện hình ảnh',
		'menu_name'			=> 'Thư viện hình ảnh',
		'name_admin_bar'	=> 'Thư viện hình ảnh'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 25,
        'public' => true, // required to display permalink under title post
		'menu_icon'			=> 'dashicons-images-alt2',
		'supports'			=> array( 'title', 'thumbnail' , 'excerpt' ),
	);

	// register_taxonomy(
	// 	'library_category','library',
	// 	array(
	// 		'label' => __( 'Chuyên mục' ),
	// 		'rewrite' => array( 'slug' => 'category_library' ),
	// 		'hierarchical' => true,
	// 	)
	// );

	register_post_type( 'library', $args );
	
}

function sunset_set_contact_columns_library($columns){
    $newColumns          = array();
    $newColums['cb'] = '<input type="checkbox" />';
    $newColums['title']  = 'Title';
    $newColums['author'] = __('Author');
    $newColums['avatar'] = 'Avatar';
    // $newColums['categories'] = __('Categories');
    // $newColums['tags'] = __('Tags');
    $newColums['date'] = _x('Date', 'column name');
    return $newColums;
}

function sunset_contact_custom_column_library($column,$post_id){
	switch ($column) {
		case 'avatar':
			echo get_the_post_thumbnail();
		break;
	}
}
