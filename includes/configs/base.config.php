<?php
$plugin = 'customizer-social-icons';
$base_path = wp_normalize_path( plugin_dir_path( dirname( dirname(__FILE__) ) ) );
$base_url  = dirname( plugin_dir_url( __DIR__ ) );
return array(
	'version' => implode( get_file_data( $base_path . $plugin . '.php', array( 'Stable Tag' ), 'plugin' ) ),
	'plugin_path' => $base_path,
	'plugin_url' => $base_url,
	'css_path' => $base_path . '/assets/css',
	'css_url' => $base_url . '/assets/css',
	'js_path' => $base_path . '/assets/js',
	'js_url' => $base_url . '/assets/js',
	'plugin_name' => $plugin,
	'prefix' => str_replace( '-', '_', $plugin ) . '_',
	'hide-text'   => true,
	'size'        => '2x',
	'type'        => 'icon',
	'li_class' => 'menu-social',
);
