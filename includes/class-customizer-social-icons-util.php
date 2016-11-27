<?php
/**
 * Customizer_Social_Icons.
 *
 * @package CustomizerSocialIcons
 */

/**
 * Class Customizer_Social_Icons.
 */
class Customizer_Social_Icons_Util {

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
	}

	/**
	 * Get the icon class from passed in icon integer.
	 *
	 */
	public function get_icon_class( $icon ) {
		return self::icon_class( $icon );
	}

	/**
	 * Get the icon class from config and return integer match.
	 *
	 */
	public function get_icon_size( $icon ) {
		return self::icon_size( $icon );
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
	private function icon_size( $icon ) {
		switch ( $icon ) {
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
	private function icon_class( $icon ) {
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
