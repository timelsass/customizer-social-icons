<?php

/**
 * Handles autoloading of the BoldGrid SEO class/interface structure.
 *
 * @since 1.3.1
 * @package Boldgrid_Seo
 * @subpackage Boldgrid_Seo/includes
 * @author BoldGrid <support@boldgrid.com>
 * @link https://boldgrid.com
 */

if ( ! function_exists( 'customizer_social_icons_autoload' ) ) {
	/**
	 * The BoldGrid SEO class autoloader.
	 *
	 * Finds the path to a class that we're requiring and includes the file.
	 *
	 * @since 1.3.1
	 */
	function customizer_social_icons_autoload( $class_name ) {
		$paths = array();
		$our_class = ( 0 === stripos( $class_name, 'Customizer_Social_Icons' ) );

		if ( $our_class ) {
			$path     = dirname( __FILE__ ) . '/includes/';
			$is_interface = ( substr( $class_name, -strlen( 'Interface' ) ) == 'Interface' );
			$filename = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
			if ( $is_interface ) {
				$interface = str_replace( '_Interface', '', $class_name );
				$filename = 'interface-' . strtolower( str_replace( '_', '-', $interface ) ) . '.php';
			}

			$paths[] = $path . $filename;

			$substr   = str_replace( 'Customizer_Social_Icons_', '', $class_name );
			$exploded = explode( '_', $substr );
			$levels   = count( $exploded );

			$previous_path = '';
			for ( $i = 0; $i < $levels; $i++ ) {
				$paths[] = $path . $previous_path . strtolower( $exploded[ $i ] ) . '/' . $filename;
				$previous_path .= strtolower( $exploded[ $i ] ) . '/';
			}
			foreach ( $paths as $path ) {
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					include $path;
					return;
				}
			}
		}
	}
	// Run the autoloader.
	spl_autoload_register( 'customizer_social_icons_autoload' );
}
