<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if (($type === 'archives' && $this->core->access_manager()->can_use_premium_code__premium_only()) || ($type === 'single')) {

    $fields[] = array(
        'id' => $type . '_color_swatch_style',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Style', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'default' => 'xt_woovs-round',
        'choices' => array(
            'xt_woovs-square' => esc_html__('Square', 'xt-woo-variation-swatches'),
            'xt_woovs-round' => esc_html__('Circle', 'xt-woo-variation-swatches'),
            'xt_woovs-round_corner' => esc_html__('Rounded', 'xt-woo-variation-swatches'),
        ),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color',
                'function' => 'class'
            )
        )
    );

    if($this->core->access_manager()->can_use_premium_code__premium_only()) {

        $fields[] = array(
            'id' => $type . '_color_show_caption',
            'section' => $type . '-swatch-color',
            'label' => esc_html__('Color Swatch Caption', 'xt-woo-variation-swatches'),
            'description' => esc_html__('If active, make sure the swatch size is big enough to show the caption. The caption font size will scale dynamically based on the swatch size. If your captions are too long, it\'s better to enable the tooltip instead.', 'xt-woo-variation-swatches'),
            'type' => 'radio-buttonset',
            'input_attrs' => array(
                'data-col' => '2'
            ),
            'choices' => array(
                '0' => esc_html__('Disabled', 'xt-woo-variation-swatches'),
                '1' => esc_html__('Enabled', 'xt-woo-variation-swatches'),
            ),
            'default' => '0',
        );
    }

    $fields[] = array(
        'id' => $type . '_color_swatch_width',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Width', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 50, 25),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '80',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color .swatch-inner',
                'property' => 'width',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color figcaption',
                'property' => 'font-size',
                'value_pattern' => 'calc($px * 0.25)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-2 .swatch.swatch-color .swatch-inner',
                'property' => 'width',
                'value_pattern' => 'calc($px * 1.2)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-2 .swatch.swatch-color figcaption',
                'property' => 'font-size',
                'value_pattern' => 'calc(($px * 1.2) * 0.25)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-3 .swatch.swatch-color .swatch-inner',
                'property' => 'width',
                'value_pattern' => 'calc($px * 1.5)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-3 .swatch.swatch-color figcaption',
                'property' => 'width',
                'value_pattern' => 'calc(($px * 1.5) * 0.25)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-4 .swatch.swatch-color .swatch-inner',
                'property' => 'width',
                'value_pattern' => 'calc($px * 1.8)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-4 .swatch.swatch-color figcaption',
                'property' => 'width',
                'value_pattern' => 'calc(($px * 1.8) * 0.25)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-5 .swatch.swatch-color .swatch-inner',
                'property' => 'width',
                'value_pattern' => 'calc($px * 2.1)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-5 .swatch.swatch-color figcaption',
                'property' => 'width',
                'value_pattern' => 'calc(($px * 2.1) * 0.25)'
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_color_swatch_height',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Height', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 50, 25),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '80',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color .swatch-inner',
                'property' => 'height',
                'value_pattern' => '$px'
            )
        )
    );

}

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => $type . '_color_swatch_padding',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Inner Padding', 'xt-woo-variation-swatches'),
        'default' => 2,
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '10',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color .swatch-inner',
                'property' => 'padding',
                'value_pattern' => '$px'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_color_swatch_border',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#eaeaea',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color .swatch-inner',
                'property' => 'box-shadow',
                'value_pattern' => 'inset 0 0 0 1px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_color_swatch_border_hover',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Hover Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#c8c8c8',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xtfw-no-touchevents ' . $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover .swatch-inner',
                'property' => 'box-shadow',
                'value_pattern' => 'inset 0 0 0 2px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_color_swatch_border_selected',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Selected Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-color.xt_woovs-selected .swatch-inner',
                'property' => 'box-shadow',
                'value_pattern' => 'inset 0 0 0 2px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_color_swatch_tooltip',
        'section' => $type . '-swatch-color',
        'label' => esc_html__('Color Swatch Tooltip', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'default' => 'text',
        'choices' => array(
            'disabled' => esc_html__('Disabled', 'xt-woo-variation-swatches'),
            'text' => esc_html__('Text', 'xt-woo-variation-swatches'),
            'image' => esc_html__('Image', 'xt-woo-variation-swatches'),
        )
    );

} else {

    $fields[] = array(
        'id' => $type . '_color_features',
        'section' => $type . '-swatch-color',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-color-swatch.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}