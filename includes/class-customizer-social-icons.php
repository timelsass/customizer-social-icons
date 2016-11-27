<?php
/**
 * Customizer_Social_Icons.
 *
 * @package CustomizerSocialIcons
 */

/**
 * Class Customizer_Social_Icons.
 */
class Customizer_Social_Icons {

	/**
	 * Array of configurable items that can be filtered
	 * by the customizer_social_icons filter.
	 *
	 * @since 0.1
	 * @access protected
	 */
	protected $configs = array();

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @param array $configs The Customizer Social Icons configuration options.
	 */
	public function __construct() {
		$configs = new Customizer_Social_Icons_Configs();
		$this->configs = $configs->get_configs();
		// Filter for modifying all configuration options in this plugin.
		$this->configs = apply_filters( 'customizer_social_icons', $this->configs );
		// Adds hook/filters.
		self::add_hooks();
	}

	/**
	 * Adds all the hooks and filters associated with this plugin.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function add_hooks() {
		// Remove current available items type template.
		add_action( 'customize_register', function( $wp_customize ) {
			remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
		}, 10 );
		// Add our own custom available items template in.
		add_action( 'customize_register', function( $wp_customize ) {
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_templates' ) );
		}, 10 );
		add_action( 'customize_register', array( $this, 'add_controls' ) );
		// Filters navs and replaces menu items with our FA markup.
		add_filter( 'wp_nav_menu_objects', array( $this, 'wp_nav_menu_objects' ), 5, 2 );
		// Add social_media to available items
		add_filter( 'customize_nav_menu_available_items', array( $this, 'available_items' ), 10, 4 );
		// Add to available item types.
		add_filter( 'customize_nav_menu_available_item_types', array( $this, 'available_item_types' ) );
		// Allow social icons to be searchable in panel.
		add_filter( 'customize_nav_menu_searched_items', array( $this, 'searched_items' ), 10, 2 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizer_scripts' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'add_fa_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
		add_action( 'customize_preview_init', array( $this, 'live_preview' ) );
		add_action( 'wp_head', array( $this, 'icon_spacing_css' ) );
	}

	/**
	 * Enqueues scripts and styles used on the frontend.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function frontend_scripts() {
		// Base FontAwesome Styles.
		wp_enqueue_style(
			'font-awesome',
			$this->configs['css_url'] . '/font-awesome/font-awesome.css',
			array(),
			'4.5.0'
		);
		// Additional Overrides From Various Theme Testing.
		wp_enqueue_style(
			'customizer-social-icons',
			$this->configs['css_url'] . '/customizer-social-icons.css',
			array(),
			'1.'
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
	public function customizer_scripts() {
		// Font Awesome.
		wp_enqueue_style(
			'font-awesome',
			$this->configs['css_url'] . '/font-awesome/font-awesome.css',
			array(),
			'4.5.0'
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
			'customizer-social-icons-live-preview',
			$this->configs['js_url'] . '/customizer-social-icons-live-preview.js',
			array( 'jquery', 'customize-preview' ),
			'1.0.0'
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
		$option = get_option( 'customizer_social_icons_spacing_setting', 0 );
		$val = ( $option / 2 ) . 'px';
		$css = '<style type="text/css" id="icon-spacing-css">';
		$css .=
		".menu-social a>i.fa,
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
		$wp_customize->add_section( 'customizer_social_icons_section', array(
			'title'          => 'Social Icons',
			'priority'       => 35,
		) );
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
			'customizer_social_icons_type_setting',
			array(
				'default'  => $this->configs['type'],
				'type'      => 'option',
				'transport' => 'refresh',
			)
		);
		$wp_customize->add_control(
			'customizer_social_icons_type',
			array(
				'label'   => 'Style',
				'section' => 'customizer_social_icons_section',
				'settings'   => 'customizer_social_icons_type_setting',
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
			'customizer_social_icons_size_setting',
			array(
				'default'  => self::get_icon_size(),
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_social_icons_size',
			array(
				'type' => 'range',
				'section' => 'customizer_social_icons_section',
				'label' => __( 'Size' ),
				'settings'   => 'customizer_social_icons_size_setting',
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
			'customizer_social_icons_spacing_setting',
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
				'section' => 'customizer_social_icons_section',
				'label' => __( 'Spacing' ),
				'settings'   => 'customizer_social_icons_spacing_setting',
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
	 * Hide Icon Text Control.
	 *
	 * @since 0.2
	 * @access private
	 *
	 * @return null No return for this method.
	 */
	private function icon_hide_text( $wp_customize ) {
		$wp_customize->add_setting(
			'customizer_social_icons_hide_text_setting',
			array(
				'default'  => false,
				'type'      => 'option',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_social_icons_hide_text',
			array(
				'type' => 'checkbox',
				'section' => 'customizer_social_icons_section',
				'label' => __( 'Hide Text?' ),
				'settings'   => 'customizer_social_icons_hide_text_setting',
				'priority' => 40,
			)
		);
	}

	/**
	 * Get icon HTML with appropriate classes and html markup depending on size and icon type
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @param string $network type of icon to retrieve and use.
	 */
	public function get_icon( $network ) {
		$icon_sizes = $this->configs['icon-sizes'];
		$size_option = get_option( 'customizer_social_icons_size_setting', self::get_icon_size() );
		$size = $icon_sizes[ self::get_icon_class( $size_option ) ];
		$icon = $network[ $this->configs['type'] ];
		$type_option = get_option( 'customizer_social_icons_type_setting', $this->configs['type'] );
		$html = sprintf( $this->configs['html'][ $type_option ], $size, $icon );

		return $html;
	}

	/**
	 * Find social links in top-level menu items, then add icon HTML.  Skip over submenu items.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @param array  $sorted_menu_items The menu items, sorted by each menu item's menu order.
	 * @param object $args An object containing wp_nav_menu() arguments.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/wp_nav_menu_objects/
	 */
	public function wp_nav_menu_objects( $sorted_menu_items, $args ) {

		$hide_text_option = get_option( 'customizer_social_icons_hide_text_setting', $this->configs['hide-text'] );

		foreach ( $sorted_menu_items as &$item ) {

			// Skip submenu items.
			if ( 0 != $item->menu_item_parent ) {
				continue;
			}

			foreach ( $this->configs['networks'] as $url => $network ) {
				if ( false !== strpos( $item->url, $url ) ) {
					$item->classes[] = $this->configs['li_class'];
					$item->classes[] = $network['class'];
					// Default display is to hide link text.

					// Add markup for shown text.
					if ( $hide_text_option ) {
						$item->title = sprintf( $this->configs['html']['hide-text'], $item->title );
					} else {
						$item->title = sprintf( $this->configs['html']['show-text'], $item->title );
					}

					$item->title = $this->get_icon( $network ) . $item->title ;
				}
			}
		}

		return $sorted_menu_items;
	}

	/**
	 * Generates inline style to apply to the Social Media Icons menu items.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function add_fa_styles() {
		$styles = '';
		foreach( $this->configs['networks'] as $network ) {
			if ( ! isset( $network['content'] ) || empty($network['content'] ) ) {
				break;
			}
			$content = '"\\' . $network['content'] . '"';
			$styles .= ".menu-item-title.fa-{$network['class']}:before {content:{$content};font-family: FontAwesome;font-style: normal;font-weight: normal;text-decoration: inherit;color: #444;font-size: 16px;padding-right: 0.5em;}";
		}

		echo "<style type='text/css'>{$styles}</style>";
	}

	/**
	 * Add social_icon type to available menu item types.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function available_item_types( $item_types  ) {
		$social_items = array(
			array(
				'title' => 'Social Media Icons',
				'type' => 'social_icon',
				'object' => 'social_icon',
			)
		);
		$item_types = array_merge( $item_types, $social_items );

		return $item_types;
	}

	/**
	 * Get available menu items.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function available_items( $items = array(), $type = '', $object = '', $page = 0 ) {
		// Add "Home" link. Treat as a page, but switch to custom on add.
		if ( 'social_icon' === $object ) {
			foreach( $this->configs['networks'] as $url => $network ) {
				$items[] = array(
					'id'         => $network['class'],
					'title'      => $network['name'],
					'type'       => 'custom',
					'type_label' => __( 'Social Icon', 'bgtfw' ),
					'object'     => $object,
					'object_id'  => -1,
					'url'        => "http://{$url}",
				);
			}

		}

		return $items;
	}

	/**
	 * Make custom menu types searchable in customizer.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function searched_items( $items, $args ) {
		foreach( $this->configs['networks'] as $url => $network ) {
			if ( isset( $args['s'] ) ) {
				if ( strpos( strtolower( $network['name'] ), strtolower( $args['s'] ) ) !== false ) {
					$items[] = array(
						'id'         => $network['class'],
						'title'      => $network['name'],
						'type'       => 'custom',
						'type_label' => __( 'Social Icon', 'bgtfw' ),
						'object'     => $network['class'],
						'url'        => "http://{$url}",
					);
				}
			}
		}

		return $items;
	}

	/**
	 * Print the JavaScript templates used to render Menu Customizer components.
	 *
	 * Templates are imported into the JS use wp.template.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function print_templates() {
		?>
		<script type="text/html" id="tmpl-available-menu-item">
			<li id="menu-item-tpl-{{ data.id }}" class="menu-item-tpl" data-menu-item-id="{{ data.id }}">
				<div class="menu-item-bar">
					<div class="menu-item-handle">
						<span class="item-type" aria-hidden="true">{{ data.type_label }}</span>
						<span class="item-title" aria-hidden="true">
							<span class="menu-item-title<# if ( ! data.title ) { #> no-title<# } #><# if ( 'social_icon' === data.object ) { #> fa-{{ data.id }}<# } #>">
								{{ data.title || wp.customize.Menus.data.l10n.untitled }}
							</span>
						</span>
						<button type="button" class="button-link item-add">
							<span class="screen-reader-text"><?php
								/* translators: 1: Title of a menu item, 2: Type of a menu item */
								printf( __( 'Add to menu: %1$s (%2$s)' ), '{{ data.title || wp.customize.Menus.data.l10n.untitled }}', '{{ data.type_label }}' );
							?></span>
						</button>
					</div>
				</div>
			</li>
		</script>

		<script type="text/html" id="tmpl-menu-item-reorder-nav">
			<div class="menu-item-reorder-nav">
				<?php
				printf(
					'<button type="button" class="menus-move-up">%1$s</button><button type="button" class="menus-move-down">%2$s</button><button type="button" class="menus-move-left">%3$s</button><button type="button" class="menus-move-right">%4$s</button>',
					__( 'Move up' ),
					__( 'Move down' ),
					__( 'Move one level up' ),
					__( 'Move one level down' )
				);
				?>
			</div>
		</script>
	<?php
	}

	/**
	 * Get Icon Size integer from configs.
	 *
	 * @since 0.2
	 * @access private
	 *
	 * @param    string   $size_theme  Theme Mod to Conver
	 * @return   integer  $icon_size   Number representing the Font Awesome size class.
	 */
	private function get_icon_size() {
		$icon_size_config = $this->configs['size'];

		switch ( $icon_size_config ) {
			case 'normal':
				$icon_size = 1;
				break;
			case 'large':
				$icon_size = 2;
				break;
			case '2x':
				$icon_size = 3;
				break;
			case '3x':
				$icon_size = 4;
				break;
			case '4x':
				$icon_size = 5;
				break;
			case '5x':
				$icon_size = 6;
				break;
			default:
				$icon_size = 1;
		}

		return $icon_size;
	}

	/**
	 * Get Icon Class returned when provided an integer.
	 *
	 * @since 0,2
	 * @access private
	 *
	 * @param    integer  $icon     The icon size value to convert to string.
	 *
	 * @return   string   $fa_size  Font Awesome size from numerical value.
	 */
	private function get_icon_class( $icon ) {
		switch ( $icon ) {
			case 1:
				$icon_size = 'normal';
				break;
			case 2:
				$icon_size = 'large';
				break;
			case 3:
				$icon_size = '2x';
				break;
			case 4:
				$icon_size = '3x';
				break;
			case 5:
				$icon_size = '4x';
				break;
			case 6:
				$icon_size = '5x';
				break;
			default:
				$icon_size = 'normal';
		}

		return $icon_size;
	}
}
