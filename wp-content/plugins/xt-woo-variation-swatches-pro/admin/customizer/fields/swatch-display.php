<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => $type . '_catalog_mode',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Enable Catalog Mode', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('No', 'xt-woo-variation-swatches'),
            '1' => esc_attr__('Yes', 'xt-woo-variation-swatches')
        ),
        'default' => '0'
    );

    $fields[] = array(
        'id' => $type . '_catalog_mode_hover',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Switch Image On Hover', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('No', 'xt-woo-variation-swatches'),
            '1' => esc_attr__('Yes', 'xt-woo-variation-swatches')
        ),
        'default' => '0',
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_catalog_mode_attributes',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Select Global Attributes', 'xt-woo-variation-swatches'),
        'description' => esc_html__('Select global attributes that will be used as catalog mode. If more than one attribute is available for a product, only the first one will be shown.', 'xt-woo-variation-swatches'),
        'type' => 'repeater',
        'row_label' => array(
            'type' => 'text',
            'value' => esc_html__('Global attribute', 'xt-woo-variation-swatches'),
        ),
        'default' => array(),
        'fields' => array(
            'attribute' => array(
                'type' => 'select',
                'choices' => $this->get_product_attributes_options(),
                'label' => esc_html__('Global Attribute', 'xt-woo-variation-swatches'),
                'default' => 'color',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_catalog_mode_custom_attributes',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Select Custom Attributes', 'xt-woo-variation-swatches'),
        'description' => esc_html__('Enter custom attribute names that will be used as catalog mode. If more than one attribute is available for a product, only the first one will be shown.', 'xt-woo-variation-swatches'),
        'type' => 'repeater',
        'row_label' => array(
            'type' => 'text',
            'value' => esc_html__('Custom attribute', 'xt-woo-variation-swatches'),
        ),
        'default' => array(),
        'fields' => array(
            'attribute' => array(
                'type' => 'text',
                'label' => esc_html__('Custom Attribute', 'xt-woo-variation-swatches'),
                'default' => '',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '==',
                'value' => '1',
            ),
        ),
    );

    $fields[] = array(
        'id' => $type.'_swatches_display_type',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Swatches Display Type', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'inline' => esc_html__('Inline', 'xt-woo-variation-swatches'),
            'modal' => esc_html__('Modal', 'xt-woo-variation-swatches'),
            'drawer' => esc_html__('Drawer', 'xt-woo-variation-swatches')
        ),
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'default' => 'inline',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '!=',
                'value' => '1',
            )
        )
    );

    $fields[] = array(
        'id' => $type.'_swatches_visibility_type',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Swatches Visibility Type', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'hover' => esc_html__('On Hover', 'xt-woo-variation-swatches'),
            'click' => esc_html__('On Click', 'xt-woo-variation-swatches'),
            'always' => esc_html__('Always Visible', 'xt-woo-variation-swatches'),
        ),
        'input_attrs' => array(
            'data-col' => '2'
        ),
        'default' => 'always',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '!=',
                'value' => '1',
            ),
            array(
                'setting' => $type . '_swatches_display_type',
                'operator' => '==',
                'value' => 'inline',
            ),
        )
    );


    $fields[] = array(
        'id' => $type.'_swatches_modal_width',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Swatches Modal / Drawer Width', 'xt-woo-variation-swatches'),
        'default' => '60',
        'type' => 'slider',
        'choices' => array(
            'min' => '25',
            'max' => '100',
            'step' => '1',
            'suffix' => 'vw'
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array(
                    '.xt_woovs-on-demand.xt_woovs-display-modal .xt_woovs-on-demand-wrap',
                    '.xt_woovs-on-demand.xt_woovs-display-drawer .xt_woovs-on-demand-wrap'
                ),
                'property' => 'width',
                'value_pattern' => '$vw'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '!=',
                'value' => '1',
            ),
            array(
                'setting' => $type . '_swatches_display_type',
                'operator' => 'in',
                'value' => array('modal', 'drawer'),
            ),
        )
    );

    $fields[] = array(
        'id' => $type.'_swatches_modal_height',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Swatches Modal / Drawer Min Height', 'xt-woo-variation-swatches'),
        'default' => '40',
        'type' => 'slider',
        'choices' => array(
            'min' => '25',
            'max' => '100',
            'step' => '1',
            'suffix' => 'vh'
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array(
                    '.xt_woovs-on-demand.xt_woovs-display-modal .xt_woovs-on-demand-wrap',
                    '.xt_woovs-on-demand.xt_woovs-display-drawer .xt_woovs-on-demand-wrap'
                ),
                'property' => 'min-height',
                'value_pattern' => '$vh'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '!=',
                'value' => '1',
            ),
            array(
                'setting' => $type . '_swatches_display_type',
                'operator' => 'in',
                'value' => array('modal', 'drawer'),
            ),
        )
    );

    $fields[] = array(
        'id' => $type.'_swatches_drawer_position',
        'section' => $type . '-swatch-display',
        'label' => esc_html__('Swatches Drawer Position', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'bottom' => esc_html__('Bottom', 'xt-woo-variation-swatches'),
            'top' => esc_html__('Top', 'xt-woo-variation-swatches'),
            'left' => esc_html__('Left', 'xt-woo-variation-swatches'),
            'right' => esc_html__('Right', 'xt-woo-variation-swatches')
        ),
        'input_attrs' => array(
            'data-col' => '2'
        ),
        'default' => 'bottom',
        'priority' => 10,
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '.xt_woovs-on-demand',
                'function' => 'class',
                'prefix' => 'xt_woovs-drawer-'
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_catalog_mode',
                'operator' => '!=',
                'value' => '1',
            ),
            array(
                'setting' => $type . '_swatches_display_type',
                'operator' => '==',
                'value' => 'drawer',
            ),
        )
    );

} else {

    $fields[] = array(
        'id' => $type . '_catalog_mode',
        'section' => $type . '-swatch-display',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-display.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}