<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if (($type === 'archives' && $this->core->access_manager()->can_use_premium_code__premium_only()) || ($type === 'single')) {

    $fields[] = array(
        'id' => $type . '_swatches_align',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Swatches Alignment', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'choices' => array(
            'left' => esc_attr__('Left', 'xt-woo-variation-swatches'),
            'center' => esc_attr__('Center', 'xt-woo-variation-swatches'),
            'right' => esc_attr__('Right', 'xt-woo-variation-swatches')
        ),
        'default' => self::types_default_values($type, 'left', 'center'),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                'function' => 'class',
                'prefix' => 'xt_woovs-align-'
            ),
            array(
                'element' => '.xt_woovs-archives-product .variations_form.xt_woovs-support',
                'property' => 'text-align'
            )
        ),
        'output' => array(
            array(
                'element' => '.xt_woovs-archives-product .variations_form.xt_woovs-support',
                'property' => 'text-align'
            )
        )
    );
}

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    if ($type === 'single') {

        $fields[] = array(
            'id' => $type . '_attr_label_position',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Attribute Label Position', 'xt-woo-variation-swatches'),
            'type' => 'radio-buttonset',
            'input_attrs' => array(
                'data-col' => '2'
            ),
            'choices' => array(
                'inherit' => esc_attr__('Inherit', 'xt-woo-variation-swatches'),
                'above' => esc_attr__('Above Swatches', 'xt-woo-variation-swatches'),
                'hidden' => esc_attr__('Hidden', 'xt-woo-variation-swatches'),
            ),
            'default' => 'inherit',
            'transport' => 'postMessage',
            'js_vars' => array(
                array(
                    'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                    'function' => 'class',
                    'prefix' => 'xt_woovs-attr-label-'
                )
            )
        );

        $fields[] = array(
            'id' => $type . '_attr_selected_value',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Show Attribute Selected Value', 'xt-woo-variation-swatches'),
            'type' => 'radio-buttonset',
            'input_attrs' => array(
                'data-col' => '2'
            ),
            'choices' => array(
                '0' => esc_attr__('No', 'xt-woo-variation-swatches'),
                '1' => esc_attr__('Yes', 'xt-woo-variation-swatches')
            ),
            'default' => '0',
            'transport' => 'postMessage',
            'js_vars' => array(
                array(
                    'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                    'function' => 'toggleClass',
                    'class' => 'xt_woovs-attr-show-selected',
                    'value' => '1'
                )
            ),
            'active_callback' => array(
                array(
                    'setting' => $type . '_attr_label_position',
                    'operator' => '=',
                    'value' => 'above',
                ),
            ),
        );

        $fields[] = array(
            'id' => $type . '_attr_label_margin_bottom',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Attribute Label Bottom Margin', 'xt-woo-variation-swatches'),
            'default' => 0,
            'type' => 'slider',
            'choices' => array(
                'min' => '0',
                'max' => '15',
                'step' => '1',
            ),
            'transport' => 'auto',
	        'active_callback' => array(
		        array(
			        'setting' => $type . '_attr_label_position',
			        'operator' => '==',
			        'value' => 'above',
		        ),
	        ),
            'output' => array(
                array(
                    'element' => $element_prefix . ' .xt_woovs-swatches-wrap.xt_woovs-attr-label-above .variations .label',
                    'property' => 'margin-bottom',
                    'value_pattern' => '$px!important'
                )
            )
        );
    }

    $fields[] = array(
        'id' => $type . '_swatch_behavior',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Disabled Attribute Behavior', 'xt-woo-variation-swatches'),
        'description' => esc_html__('Only works for variations that are not loaded via ajax. You can adjust the ajax variation threshold within the global settings', 'xt-woo-variation-swatches') . '<br><a target="_blank" href="https://docs.xplodedthemes.com/article/119-woocommerce-modify-ajax-variation-threshold">' . esc_html__('More Info.') . '</a><br><br>',
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '2'
        ),
        'choices' => array(
            'hide' => esc_attr__('Hide', 'xt-woo-variation-swatches'),
            'blur' => esc_attr__('Blur', 'xt-woo-variation-swatches'),
            'blur-cross' => esc_attr__('Blur + Cross', 'xt-woo-variation-swatches'),
        ),
        'default' => 'blur-cross',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap',
                'function' => 'class',
                'prefix' => 'xt_woovs-behavior-'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_disabled_clickable',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Disabled Swatch Clickable', 'xt-woo-variation-swatches'),
        'description' => esc_html__('By default, disabled swatches are not clickable. However, you might need to enable it for compatibility with 3rd party plugins that might perform actions once a disabled swatch is clicked.', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '2'
        ),
        'choices' => array(
            'unclickable' => esc_attr__('No', 'xt-woo-variation-swatches'),
            'clickable' => esc_attr__('Yes', 'xt-woo-variation-swatches'),
        ),
        'default' => 'unclickable'
    );

    if($type === 'single') {

        $fields[] = array(
            'id' => $type . '_swatch_featured_settings',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Featured Attribute', 'xt-woo-variation-swatches'),
            'type' => 'custom'
        );

        $fields[] = array(
            'id' => $type . '_swatch_featured_global_attribute',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Featured Global Attribute', 'xt-woo-variation-swatches'),
            'description' => esc_html__('Select a global attribute to be featured. Swatches will display larger than others.', 'xt-woo-variation-swatches'),
            'type' => 'select',
            'placeholder' => esc_html__( 'Select featured attribute', 'xt-woo-variation-swatches' ),
            'choices' => $this->get_product_attributes_options(),
            'default' => ''
        );

        $fields[] = array(
            'id' => $type . '_swatch_featured_custom_attribute',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Featured Custom Attribute', 'xt-woo-variation-swatches'),
            'description' => esc_html__('Enter a custom attribute to be featured. Swatches will display larger than others.', 'xt-woo-variation-swatches'),
            'type' => 'text',
            'placeholder' => esc_html__( 'Custom attribute name', 'xt-woo-variation-swatches' ),
            'default' => ''
        );

        $fields[] = array(
            'id' => $type . '_swatch_featured_attribute_size',
            'section' => $type . '-swatch-styling',
            'label' => esc_html__('Featured Attribute Size Multiplier', 'xt-woo-variation-swatches'),
            'type' => 'slider',
            'choices' => array(
                'min' => '2',
                'max' => '5',
                'step' => '1',
                'suffix' => 'x'
            ),
            'default' => 4,
            'transport' => 'postMessage',
            'js_vars' => array(
                array(
                    'element' => '.xt_woovs-featured',
                    'function' => 'class',
                    'prefix' => 'xt_woovs-featured-'
                ),
            )
        );
    }

    $fields[] = array(
        'id' => $type . '_swatch_spacing_settings',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Swatch Spacing', 'xt-woo-variation-swatches'),
        'type' => 'custom'
    );

    $fields[] = array(
        'id' => $type . '_swatches_container_spacing',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Swatches Container Spacing', 'xt-woo-variation-swatches'),
        'type' => 'dimensions',
        'default' => array(
            'padding-top' => self::types_default_values($type, '0px', '10px'),
            'padding-bottom' => '0px',
            'padding-left' => '0px',
            'padding-right' => '0px',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-top',
                'choice' => 'padding-top',
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-bottom',
                'choice' => 'padding-bottom',
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-left',
                'choice' => 'padding-left',
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches-wrap .variations',
                'property' => 'padding-right',
                'choice' => 'padding-right',
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_horizontal_gap',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Horizontal Gap Between Swatches', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 10, 5),
        'type' => 'slider',
        'choices' => array(
            'min' => '5',
            'max' => '80',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => ':root',
                'property' => '--xt-woovs-'.$type.'-swatch-hgap',
                'value_pattern' => '$px'
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_vertical_gap',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Vertical Gap Between Swatches', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 10, 5),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '30',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => ':root',
                'property' => '--xt-woovs-'.$type.'-swatch-vgap',
                'value_pattern' => '$px'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_attr_vertical_gap',
        'section' => $type . '-swatch-styling',
        'label' => esc_html__('Vertical Gap Between Attributes', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 20, 10),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '80',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => ':root',
                'property' => '--xt-woovs-'.$type.'-vgap',
                'value_pattern' => '$px'
            )
        )
    );

} else {

    $fields[] = array(
        'id' => $type . '_styling_features',
        'section' => $type . '-swatch-styling',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-styling.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}