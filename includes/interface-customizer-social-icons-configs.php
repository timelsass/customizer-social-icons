<?php
interface Customizer_Social_Icons_Configs_Interface {
	/**
	 * Get configuration options to use within the plugin.
	 *
	 * @since 0.3
	 */
	public function get_configs();

	/**
	 * Include configuration files.
	 *
	 * @since 0.3
	 */
	public function assign_configs();
}
?>
