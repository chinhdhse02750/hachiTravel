<?php
/** @global $type */
/** @global $element_prefix */
/** @global $page_prefix */

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_settings',
        'section' => $type . '-swatch-tooltip',
        'label' => esc_html__('Swatch Tooltip', 'xt-woo-variation-swatches'),
        'type' => 'custom'
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_image_size',
        'section' => $type . '-swatch-tooltip',
        'label' => esc_html__('Swatch Image Tooltip Size', 'xt-woo-variation-swatches'),
        'default' => 50,
        'type' => 'slider',
        'choices' => array(
            'min' => '40',
            'max' => '200',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip img',
                'property' => 'max-width',
                'value_pattern' => '$px!important'
            ),
        )
    );

	$fields[] = array(
		'id' => $type . '_swatch_tooltip_image_padding',
		'section' => $type . '-swatch-tooltip',
		'label' => esc_html__('Swatch Image Tooltip Padding', 'xt-woo-variation-swatches'),
		'default' => '2',
		'type' => 'slider',
		'choices' => array(
			'min' => '0',
			'max' => '10',
			'step' => '1',
		),
		'transport' => 'auto',
		'output' => array(
			array(
				'element' => $page_prefix . ' .xt_woovs-tooltip.tooltip-image',
				'property' => 'border-width',
				'value_pattern' => '$px'
			),
			array(
				'element' => $page_prefix . ' .xt_woovs-tooltip.tooltip-image:after',
				'property' => 'top',
				'value_pattern' => 'calc(100% + $px - 1px)'
			),
		)
	);

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_radius',
        'section' => $type . '-swatch-tooltip',
        'label' => esc_html__('Swatch Tooltip Border Radius', 'xt-woo-variation-swatches'),
        'default' => '5',
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '100',
            'step' => '1',
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array($page_prefix . ' .xt_woovs-tooltip', $page_prefix . ' .xt_woovs-tooltip img'),
                'property' => 'border-radius',
                'value_pattern' => '$%'
            )
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_bg',
        'section' => $type . '-swatch-tooltip',
        'label' => esc_html__('Swatch Tooltip Background', 'xt-woo-variation-swatches'),
        'type' => 'color-alpha',
        'default' => '#161616',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip',
                'property' => 'background-color'
            ),
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip',
                'property' => 'border-color'
            ),
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip:after',
                'property' => 'border-top-color'
            ),
        )
    );

    $fields[] = array(
        'id' => $type . '_swatch_tooltip_text_color',
        'section' => $type . '-swatch-tooltip',
        'label' => esc_html__('Swatch Tooltip Text Color', 'xt-woo-variation-swatches'),
        'type' => 'color-alpha',
        'default' => '#fff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => $page_prefix . ' .xt_woovs-tooltip',
                'property' => 'color'
            )
        )
    );

} else {

    $fields[] = array(
        'id' => $type . '_tooltip_features',
        'section' => $type . '-swatch-tooltip',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/' . $type . '-tooltip.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}