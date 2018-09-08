<?php
/**
 * Customizer_Social_Icons.
 *
 * @package CustomizerSocialIcons
 */

/**
 * Class Customizer_Social_Icons_Customizer_Menus.
 */
class Customizer_Social_Icons_Customizer_Menus {

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
		global $wp_version;
		if ( version_compare( $wp_version, '4.9', '>=' ) ) {
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

			<script type="text/html" id="tmpl-nav-menu-delete-button">
				<div class="menu-delete-item">
					<button type="button" class="button-link button-link-delete">
						<?php _e( 'Delete Menu' ); ?>
					</button>
				</div>
			</script>

			<script type="text/html" id="tmpl-nav-menu-submit-new-button">
				<p id="customize-new-menu-submit-description"><?php _e( 'Click &#8220;Next&#8221; to start adding links to your new menu.' ); ?></p>
				<button id="customize-new-menu-submit" type="button" class="button" aria-describedby="customize-new-menu-submit-description"><?php _e( 'Next' ); ?></button>
			</script>

			<script type="text/html" id="tmpl-nav-menu-locations-header">
				<span class="customize-control-title customize-section-title-menu_locations-heading">{{ data.l10n.locationsTitle }}</span>
				<p class="customize-control-description customize-section-title-menu_locations-description">{{ data.l10n.locationsDescription }}</p>
			</script>

			<script type="text/html" id="tmpl-nav-menu-create-menu-section-title">
				<p class="add-new-menu-notice">
					<?php _e( 'It doesn&#8217;t look like your site has any menus yet. Want to build one? Click the button to start.' ); ?>
				</p>
				<p class="add-new-menu-notice">
					<?php _e( 'You&#8217;ll create a menu, assign it a location, and add menu items like links to pages and categories. If your theme has multiple menu areas, you might need to create more than one.' ); ?>
				</p>
				<h3>
					<button type="button" class="button customize-add-menu-button">
						<?php _e( 'Create New Menu' ); ?>
					</button>
				</h3>
			</script>
			<?php
		} else {
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
}
