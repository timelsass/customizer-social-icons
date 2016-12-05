<?php
/**
 * Customizer_Social_Icons_Menus.
 *
 * @package CustomizerSocialIcons
 */

/**
 * Class Customizer_Social_Icons_Menus.
 */
class Customizer_Social_Icons_Menus {

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
	 * Enqueues scripts and styles used on the frontend.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	public function enqueue() {
		// Base FontAwesome Styles.
		wp_enqueue_style(
			'font-awesome',
			$this->configs['css_url'] . '/font-awesome/font-awesome.css',
			array(),
			'4.5.0'
		);
		// Additional Overrides From Various Theme Testing.
		wp_enqueue_style(
			$this->configs['plugin_name'] . '-css',
			trailingslashit( $this->configs['css_url'] ) . $this->configs['plugin_name'] . '.css',
			array(),
			$this->configs['version']
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
		$size_option = get_option( "{$this->configs['prefix']}size_setting", $this->util->get_icon_size( $this->configs['size'] ) );
		$size = $icon_sizes[ $this->util->get_icon_class( $size_option ) ];
		$icon = $network[ $this->configs['type'] ];
		$type_option = get_option( "{$this->configs['prefix']}type_setting", $this->configs['type'] );
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

		$hide_text_option = get_option( "{$this->configs['prefix']}text_setting", $this->configs['hide-text'] );

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
}
