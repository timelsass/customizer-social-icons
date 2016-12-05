<?php
/**
 * Customizer_Social_Icons.
 *
 * @package CustomizerSocialIcons
 */

/**
 * Class Customizer_Social_Icons_Customizer_Menus.
 */
class Customizer_Social_Icons_Customizer {

	/**
	 * Array of configurable items that can be filtered
	 * by the customizer_social_icons filter.
	 *
	 * @since 0.1
	 * @access protected
	 */
	protected $configs;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @param array $configs The Customizer Social Icons configuration options.
	 */
	public function __construct( $configs ) {
		$this->configs = $configs;
		$this->util = new Customizer_Social_Icons_Util( $this->configs );
	}

	/**
	 * Enqueues scripts and styles used in the customizer.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function enqueue() {
		// Font Awesome.
		wp_enqueue_style(
			'font-awesome',
			$this->configs['css_url'] . '/font-awesome/font-awesome.css',
			array(),
			'4.5.0'
		);
		// Control specific css.
		wp_enqueue_style(
			"{$this->configs['plugin_name']}-controls",
			trailingslashit( $this->configs['css_url'] ) . "{$this->configs['plugin_name']}-controls.css",
			array(),
			$this->configs['version']
		);
	}

	public function display_colors() {
		wp_enqueue_script(
			"{$this->configs['plugin_name']}-display-colors",
			trailingslashit( $this->configs['js_url'] ) . $this->configs['plugin_name'] . '-display-colors.js',
			array( 'jquery', 'customize-controls' ),
			$this->configs['version']
		);
	}

	/**
	 * Enqueues scripts and styles used in the customizer.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function live_preview() {
		wp_enqueue_script(
			"{$this->configs['plugin_name']}-live-preview",
			trailingslashit( $this->configs['js_url'] ) . $this->configs['plugin_name'] . '-live-preview.js',
			array( 'jquery', 'customize-preview' ),
			$this->configs['version']
		);
	}

	/**
	 * Adds the controls and sections to WordPress Customizer.
	 *
	 * @since 0.2
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function add_controls( $wp_customize ) {
		self::social_icons_section( $wp_customize );
		self::icon_style( $wp_customize );
		self::icon_size( $wp_customize );
		self::icon_spacing( $wp_customize );
		self::icon_color( $wp_customize );
		self::icon_color_secondary( $wp_customize );
		self::icon_hover_color( $wp_customize );
		self::icon_hover_color_secondary( $wp_customize );
		self::icon_hide_text( $wp_customize );
	}

	/**
	 * Adds the 'Social Icons' section to the WordPress Customizer.
	 *
	 * @since 0.2
	 * @access private
	 *
	 * @return null No return for this method.
	 */
	private function social_icons_section( $wp_customize ) {
		// Adds "Social Icons" to the customizer options.
		$wp_customize->add_section(
			"{$this->configs['prefix']}section",
			array(
				'title'          => 'Social Icons',
				'priority'       => 35,
			)
		);
	}

	/**
	 * Icon Style Control
	 *
	 * @since 0.2
	 * @access private
	 *
	 * @return null No return for this method.
	 */
	private function icon_style( $wp_customize ) {
		// Get text from configs.
		$i18n = $this->configs['i18n'];

		$wp_customize->add_setting(
			"{$this->configs['prefix']}type_setting",
			array(
				'default'  => $this->configs['type'],
				'type'      => 'option',
				'transport' => 'refresh',
			)
		);
		$wp_customize->add_control(
			"{$this->configs['prefix']}type",
			array(
				'label'   => 'Style',
				'section' => "{$this->configs['prefix']}section",
				'settings'   => "{$this->configs['prefix']}type_setting",
				'priority' => 10,
				'type' => 'select',
				'choices'  => array(
					'icon'                  => __( $i18n['icon'] ),
					'icon-circle-open'      => $i18n['icon-circle-open'],
					'icon-circle-open-thin' => $i18n['icon-circle-open-thin'],
					'icon-circle'           => $i18n['icon-circle'],
					'icon-square-open'      => $i18n['icon-square-open'],
					'icon-square'           => $i18n['icon-square'],
				)
			)
		);
	}

	/**
	 * Icon Size Control.
	 *
	 * @since 0.2
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	private function icon_size( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}size_setting",
			array(
				'default'  => $this->util->get_icon_size( $this->configs['size'] ),
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"{$this->configs['prefix']}size",
			array(
				'type' => 'range',
				'section' => "{$this->configs['prefix']}section",
				'label' => __( 'Size' ),
				'settings'   => "{$this->configs['prefix']}size_setting",
				'priority' => 20,
				'input_attrs' => array(
					'min' => 1,
					'max' => 6,
					'step' => 1,
				)
			)
		);
	}


	/**
	 * Icon Spacing Control
	 *
	 * @since 0.2
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	private function icon_spacing( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}spacing_setting",
			array(
				'default'  => 0,
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_social_icons_spacing',
			array(
				'type' => 'range',
				'section' => "{$this->configs['prefix']}section",
				'label' => __( 'Spacing' ),
				'settings'   => "{$this->configs['prefix']}spacing_setting",
				'priority' => 30,
				'input_attrs' => array(
					'min' => -25,
					'max' => 45,
					'step' => 1,
				)
			)
		);
	}

	/**
	 * Generates the CSS that will be inlined to wp_head.
	 *
	 * @since 0.2
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function icon_spacing_css() {
		$option = get_option( "{$this->configs['prefix']}spacing_setting", 0 );
		$val = ( $option / 2 ) . 'px';
		$color = get_option( "{$this->configs['prefix']}color_setting", '#fff' );
		$hover_color = get_option( "{$this->configs['prefix']}hover_color_setting", '#fff' );
		$color_secondary = get_option( "{$this->configs['prefix']}color_secondary_setting", '#fff' );
		$hover_color_secondary = get_option( "{$this->configs['prefix']}hover_color_secondary_setting", '#fff' );
		$css = '<style type="text/css" id="icon-spacing-css">';
		$css .=
		"
		.menu-social .stack-closed > i.fa-inverse,
		.menu-social span.stack-open,
		.menu-social a>i.fa {
			color: {$color};
		}
		.menu-social a:hover > .stack-closed i.fa-inverse,
		.menu-social a:focus > .stack-closed i.fa-inverse,
		.menu-social a:hover > .stack-open i.fa,
		.menu-social a:focus > .stack-open i.fa,
		.menu-social a:hover > i.fa,
		.menu-social a:focus > i.fa {
			color: {$hover_color};
		}
		.menu-social .stack-closed > i.fa:first-child {
			color: {$color_secondary};
		}
		.menu-social a:hover > .stack-closed i.fa:first-child,
		.menu-social a:focus > .stack-closed i.fa:first-child {
			color: {$hover_color_secondary};
		}
		.menu-social a>i.fa,
		.menu-social span.fa-stack {
			margin-right: {$val};
			margin-left: {$val};
		}
		.menu-social:first-child a>i.fa,
		.menu-social:first-child span.fa-stack {
			margin-right: {$val};
			margin-left: 0;
		}
		.menu-social:last-child a>i.fa,
		.menu-social:last-child span.fa-stack {
			margin-right: 0;
			margin-left: {$val};
		}";
		$css .= '</style>';

		echo $css;
	}

	private function icon_color( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}color_setting",
			array(
				'default'  => '#fff',
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				"{$this->configs['prefix']}color",
				array(
					'label'        => __( 'Color' ),
					'section'    => "{$this->configs['prefix']}section",
					'settings'   => "{$this->configs['prefix']}color_setting",
				)
			)
		);
	}

	private function icon_color_secondary( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}color_secondary_setting",
			array(
				'default'  => '#fff',
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				"{$this->configs['prefix']}color_secondary",
				array(
					'label'        => __( 'Background Color' ),
					'section'    => "{$this->configs['prefix']}section",
					'settings'   => "{$this->configs['prefix']}color_secondary_setting",
				)
			)
		);
	}

	private function icon_hover_color( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}hover_color_setting",
			array(
				'default'  => '#fff',
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				"{$this->configs['prefix']}hover_color",
				array(
					'label'        => __( 'Hover Color' ),
					'section'    => "{$this->configs['prefix']}section",
					'settings'   => "{$this->configs['prefix']}hover_color_setting",
				)
			)
		);
	}

	private function icon_hover_color_secondary( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}hover_color_secondary_setting",
			array(
				'default'  => '#fff',
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				"{$this->configs['prefix']}hover_color_secondary",
				array(
					'label'        => __( 'Background Hover Color' ),
					'section'    => "{$this->configs['prefix']}section",
					'settings'   => "{$this->configs['prefix']}hover_color_secondary_setting",
				)
			)
		);
	}

	/**
	 * Hide Icon Text Control.
	 *
	 * @since 0.2
	 * @access private
	 *
	 * @return null No return for this method.
	 */
	private function icon_hide_text( $wp_customize ) {
		$wp_customize->add_setting(
			"{$this->configs['prefix']}hide_text_setting",
			array(
				'default'  => true,
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			"{$this->configs['prefix']}hide_text",
			array(
				'type' => 'checkbox',
				'section' => "{$this->configs['prefix']}section",
				'label' => __( 'Hide Text?' ),
				'settings'   => "{$this->configs['prefix']}hide_text_setting",
				'priority' => 40,
			)
		);
	}
}
