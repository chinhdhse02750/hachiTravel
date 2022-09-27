<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if (($type === 'archives' && $this->core->access_manager()->can_use_premium_code__premium_only()) || ($type === 'single')) {

    $fields[] = array(
        'id' => $type . '_label_swatch_style',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Style', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'default' => 'xt_woovs-square',
        'choices' => array(
            'xt_woovs-square' => esc_html__('Square', 'xt-woo-variation-swatches'),
            'xt_woovs-round' => esc_html__('Circle', 'xt-woo-variation-swatches'),
            'xt_woovs-round_corner' => esc_html__('Rounded', 'xt-woo-variation-swatches'),
        ),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'function' => 'class'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_flex_mode',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Flex Mode', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'default' => '0',
        'choices' => array(
            '0' => esc_html__('No', 'xt-woo-variation-swatches'),
            '1' => esc_html__('Yes', 'xt-woo-variation-swatches'),
        ),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'function' => 'toggleClass',
                'class' => 'xt_woovs-swatch-flex',
                'value' => '1'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_stretch',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Stretch Label Swatch', 'xt-woo-variation-swatches'),
        'type' => 'radio-buttonset',
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'default' => '0',
        'choices' => array(
            '0' => esc_html__('No', 'xt-woo-variation-swatches'),
            '1' => esc_html__('Yes', 'xt-woo-variation-swatches'),
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => ':root',
                'property' => '--xt-woovs-'.$type.'-label-flex'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_label_swatch_flex_mode',
                'operator' => '==',
                'value' => '1',
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_max_per_row',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Max Swatches Per Row', 'xt-woo-variation-swatches'),
        'description' => esc_html__('How many swatches would you like to display per row.', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 4, 8),
        'type' => 'slider',
        'choices' => array(
            'min' => '1',
            'max' => '10',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => ':root',
                'property' => '--xt-woovs-'.$type.'-labels-per-row'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_label_swatch_flex_mode',
                'operator' => '==',
                'value' => '1',
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_min_width',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Min Width', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 50, 25),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '100',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-2 .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => 'calc($px * 1.2)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-3 .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => 'calc($px * 1.3)'
            ),

            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-4 .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => 'calc($px * 1.4)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-5 .swatch.swatch-label',
                'property' => 'min-width',
                'value_pattern' => 'calc($px * 1.5)'
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => $type . '_label_swatch_flex_mode',
                'operator' => '!=',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_height',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Height', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 30, 20),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '100',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'height',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'line-height',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-2 .swatch.swatch-label',
                'property' => 'height',
                'value_pattern' => 'calc($px * 1.2)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-2 .swatch.swatch-label',
                'property' => 'line-height',
                'value_pattern' => 'calc($px * 1.2)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-3 .swatch.swatch-label',
                'property' => 'height',
                'value_pattern' => 'calc($px * 1.5)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-3 .swatch.swatch-label',
                'property' => 'line-height',
                'value_pattern' => 'calc($px * 1.5)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-4 .swatch.swatch-label',
                'property' => 'height',
                'value_pattern' => 'calc($px * 1.8)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-4 .swatch.swatch-label',
                'property' => 'line-height',
                'value_pattern' => 'calc($px * 1.8)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-5 .swatch.swatch-label',
                'property' => 'height',
                'value_pattern' => 'calc($px * 2.1)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-5 .swatch.swatch-label',
                'property' => 'line-height',
                'value_pattern' => 'calc($px * 2.1)'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_size',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Font Size', 'xt-woo-variation-swatches'),
        'default' => self::types_default_values($type, 13, 10),
        'type' => 'slider',
        'choices' => array(
            'min' => '10',
            'max' => '60',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'font-size',
                'value_pattern' => '$px'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-2 .swatch.swatch-label',
                'property' => 'font-size',
                'value_pattern' => 'calc($px * 1.2)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-3 .swatch.swatch-label',
                'property' => 'font-size',
                'value_pattern' => 'calc($px * 1.3)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-4 .swatch.swatch-label',
                'property' => 'font-size',
                'value_pattern' => 'calc($px * 1.4)'
            ),
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches.xt_woovs-featured-5 .swatch.swatch-label',
                'property' => 'font-size',
                'value_pattern' => 'calc($px * 1.5)'
            )
        )
    );
}

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => $type . '_label_swatch_color',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#666',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_color_hover',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Hover Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xtfw-no-touchevents ' . $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover',
                'property' => 'color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_color_selected',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Selected Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#fff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label.xt_woovs-selected',
                'property' => 'color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_background',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Background', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#fff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'background-color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_background_hover',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Hover Background', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#c8c8c8',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xtfw-no-touchevents ' . $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover',
                'property' => 'background-color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_background_selected',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Selected Background', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label.xt_woovs-selected',
                'property' => 'background-color'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_border',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#eaeaea',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label',
                'property' => 'box-shadow',
                'value_pattern' => 'inset 0 0 0 1px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_border_hover',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Hover Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#c8c8c8',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xtfw-no-touchevents ' . $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label:not(.xt_woovs-selected):not(.xt_woovs-disabled):hover',
                'property' => 'box-shadow',
                'value_pattern' => 'inset 0 0 0 2px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_border_selected',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Selected Border Color', 'xt-woo-variation-swatches'),
        'type' => 'color',
        'default' => '#000000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $element_prefix . ' .xt_woovs-swatches .swatch.swatch-label.xt_woovs-selected',
                'property' => 'box-shadow',
                'value_pattern' => 'inset 0 0 0 2px $'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_label_swatch_tooltip',
        'section' => $type . '-swatch-label',
        'label' => esc_html__('Label Swatch Tooltip', 'xt-woo-variation-swatches'),
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
        'id' => $type . '_label_features',
        'section' => $type . '-swatch-label',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-label-swatch.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}