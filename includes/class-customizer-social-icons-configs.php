<?php
/**
 * Customizer Social Icons
 *
 * @package CustomizerSocialIcons
 * @copyright timph
 * @author timph <wp@tim.ph>
 */

/**
 * BoldGrid Form configuration class
 */
class Customizer_Social_Icons_Configs implements Customizer_Social_Icons_Configs_Interface {
	/**
	 * Configs.
	 *
	 * @var array
	 */
	protected $configs;

	/**
	 * Get configs.
	 */
	public function get_configs() {
		return $this->configs;
	}

	/**
	 * Set configs.
	 *
	 * @param array $Configs
	 *
	 * @return bool
	 */
	protected function set_configs( $configs ) {
		$this->configs = $configs;
		return true;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		self::assign_configs();
		$configs = $this->configs;
		$local = wp_normalize_path( plugin_dir_path( __FILE__ ) ) . '/configs/config.local.php';
		if ( file_exists( $local ) ) {
			$file = include $local;
			$configs = array_replace_recursive( $configs, $file );
		}
		$this->set_configs( $configs );
	}

	/**
	 * Include customizer configuration options to assign.
	 *
	 * Configuration files for the customizer are loaded from
	 * includes/configs/customizer-options/.
	 *
	 * @since    1.1
	 * @access   private
	 */
	public function assign_configs( $folder = '' ) {
		$path = __DIR__ . '/configs/'. $folder;
		if ( $folder === '' ) $this->configs = include $path . '/base.config.php';
		foreach ( glob( $path . '/*.config.php' ) as $filename ) {
			$option = basename( str_replace( '.config.php', '', $filename ) );
			if ( ! empty( $folder ) ) {
				$this->configs[ $folder ][ $option ] = include $filename;
			} elseif ( 'base' === $option ) {
				continue;
			} else {
				$this->configs[ $option ] = include $filename;
			}
		}
	}
}
