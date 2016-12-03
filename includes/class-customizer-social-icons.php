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
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since 0.3
	 * @access protected
	 * @var Customizer_Social_Icons_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

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
		$this->loader = new Customizer_Social_Icons_Loader();
		// Adds hook/filters.
		self::init();
	}

	/**
	 * Adds all the hooks and filters associated with this plugin.
	 *
	 * @since 0.1
	 * @access public
	 *
	 * @return null No return for this method.
	 */
	private function init() {
		self::configs();
		self::menus();
		self::customizer();
		self::customizer_menus();
	}

	private function configs() {
		$configs = new Customizer_Social_Icons_Configs();
		$this->configs = $configs->get_configs();
		// Filter for modifying all configuration options in this plugin.
		$this->configs = apply_filters( 'customizer_social_icons', $this->configs );
	}

	private function menus() {
		$menus = new Customizer_Social_Icons_Menus( $this->configs );
		// Filters navs and replaces menu items with our FA markup.
		$this->loader->add_filter( 'wp_nav_menu_objects', $menus, 'wp_nav_menu_objects', 5, 2, 999 );
		$this->loader->add_action( 'wp_enqueue_scripts', $menus, 'enqueue' );
	}

	private function customizer() {
		$customizer = new Customizer_Social_Icons_Customizer( $this->configs );
		$this->loader->add_action( 'customize_controls_print_styles', $customizer, 'enqueue' );
		$this->loader->add_action( 'customize_preview_init', $customizer, 'live_preview' );
		$this->loader->add_action( 'customize_controls_print_footer_scripts', $customizer, 'display_colors' );
		$this->loader->add_action( 'customize_register', $customizer, 'add_controls' );
		$this->loader->add_action( 'wp_head', $customizer, 'icon_spacing_css' );
	}

	private function customizer_menus() {
		$customizer_menus = new Customizer_Social_Icons_Customizer_Menus( $this->configs );
		// Add social_media to available items
		$this->loader->add_filter( 'customize_nav_menu_available_items', $customizer_menus, 'available_items', 10, 4 );
		// Add to available item types.
		$this->loader->add_filter( 'customize_nav_menu_available_item_types', $customizer_menus, 'available_item_types' );
		// Allow social icons to be searchable in panel.
		$this->loader->add_filter( 'customize_nav_menu_searched_items', $customizer_menus, 'searched_items', 10, 2 );
		// Adds the FA icons into the social_icon type browser in customizer.
		$this->loader->add_action( 'customize_controls_print_styles', $customizer_menus, 'add_fa_styles' );
		// Remove current available items type template.
		add_action( 'customize_register', function( $wp_customize ) {
			remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
		}, 10 );
		// Add our own custom available items template in.
		add_action( 'customize_register', function( $wp_customize ) {
			$customizer_menus = new Customizer_Social_Icons_Customizer_Menus( $this->configs );
			add_action( 'customize_controls_print_footer_scripts', array( $customizer_menus, 'print_templates' ) );
		}, 10 );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 0.3
	 */
	public function run() {
		$this->loader->run();
	}
}
