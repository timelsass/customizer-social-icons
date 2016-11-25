<?php
/**
 * Customizer_Social_Icons.
 *
 * @package CustomizerSocialIcons
 */

if ( ! class_exists( 'Customizer_Social_Icons' ) ) :
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
		protected $configs = array(
			'hide-text'   => true,
			'size'        => '2x',
			'type'        => 'icon',
			'li_class' => 'menu-social',
			'icon-sizes' => array(
				'normal' => '',
				'large'  => 'fa-lg',
				'2x'     => 'fa-2x',
				'3x'     => 'fa-3x',
				'4x'     => 'fa-4x',
				'5x'     => 'fa-5x',
			),
			'networks' => array(
				'bitbucket.org' => array(
					'name' => 'Bitbucket',
					'class' => 'bitbucket',
					'icon' => 'fa fa-bitbucket',
					'icon-sign' => 'fa fa-bitbucket-square',
					'icon-square-open' => 'fa fa-bitbucket fa-stack-1x',
					'icon-square' => 'fa fa-bitbucket fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-bitbucket fa-stack-1x',
					'icon-circle-open' => 'fa fa-bitbucket fa-stack-1x',
					'icon-circle' => 'fa fa-bitbucket fa-stack-1x',
					'content' => 'f171',
				),

				'codepen.io' => array(
					'name' => 'Codepen',
					'class' => 'codepen',
					'icon' => 'fa fa-codepen',
					'icon-sign' => 'fa fa-codepen',
					'icon-square-open' => 'fa fa-codepen fa-stack-1x',
					'icon-square' => 'fa fa-codepen fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-codepen fa-stack-1x',
					'icon-circle-open' => 'fa fa-codepen fa-stack-1x',
					'icon-circle' => 'fa fa-codepen fa-stack-1x',
					'content' => 'f1cb',
				),

				'dribbble.com' => array(
					'name' => 'Dribbble',
					'class' => 'dribbble',
					'icon' => 'fa fa-dribbble',
					'icon-sign' => 'fa fa-dribbble',
					'icon-square-open' => 'fa fa-dribbble fa-stack-1x',
					'icon-square' => 'fa fa-dribbble fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-dribbble fa-stack-1x',
					'icon-circle-open' => 'fa fa-dribbble fa-stack-1x',
					'icon-circle' => 'fa fa-dribbble fa-stack-1x',
					'content' => 'f17d',
				),

				'dropbox.com' => array(
					'name' => 'Dropbox',
					'class' => 'dropbox',
					'icon' => 'fa fa-dropbox',
					'icon-sign' => 'fa fa-dropbox',
					'icon-square-open' => 'fa fa-dropbox fa-stack-1x',
					'icon-square' => 'fa fa-dropbox fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-dropbox fa-stack-1x',
					'icon-circle-open' => 'fa fa-dropbox fa-stack-1x',
					'icon-circle' => 'fa fa-dropbox fa-stack-1x',
					'content' => 'f16b',
				),

				'facebook.com' => array(
					'name' => 'Facebook',
					'class' => 'facebook',
					'icon' => 'fa fa-facebook',
					'icon-sign' => 'fa fa-facebook-square',
					'icon-square-open' => 'fa fa-facebook fa-stack-1x',
					'icon-square' => 'fa fa-facebook fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-facebook fa-stack-1x',
					'icon-circle-open' => 'fa fa-facebook fa-stack-1x',
					'icon-circle' => 'fa fa-facebook fa-stack-1x',
					'content' => 'f09a',
				),

				'flickr.com' => array(
					'name' => 'Flickr',
					'class' => 'flickr',
					'icon' => 'fa fa-flickr',
					'icon-sign' => 'fa fa-flickr',
					'icon-square-open' => 'fa fa-flickr fa-stack-1x',
					'icon-square' => 'fa fa-flickr fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-flickr fa-stack-1x',
					'icon-circle-open' => 'fa fa-flickr fa-stack-1x',
					'icon-circle' => 'fa fa-flickr fa-stack-1x',
					'content' => 'f16e',
				),

				'foursquare.com' => array(
					'name' => 'Foursquare',
					'class' => 'foursquare',
					'icon' => 'fa fa-foursquare',
					'icon-sign' => 'fa fa-foursquare',
					'icon-square-open' => 'fa fa-foursquare fa-stack-1x',
					'icon-square' => 'fa fa-foursquare fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-foursquare fa-stack-1x',
					'icon-circle-open' => 'fa fa-foursquare fa-stack-1x',
					'icon-circle' => 'fa fa-foursquare fa-stack-1x',
					'content' => 'f180',
				),

				'github.com' => array(
					'name' => 'Github',
					'class' => 'github',
					'icon' => 'fa fa-github',
					'icon-sign' => 'fa fa-github-square',
					'icon-square-open' => 'fa fa-github fa-stack-1x',
					'icon-square' => 'fa fa-github fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-github fa-stack-1x',
					'icon-circle-open' => 'fa fa-github fa-stack-1x',
					'icon-circle' => 'fa fa-github fa-stack-1x',
					'content' => 'f09b',
				),

				'gratipay.com' => array(
					'name' => 'Gratipay',
					'class' => 'gratipay',
					'icon' => 'fa fa-gratipay',
					'icon-sign' => 'fa fa-gratipay',
					'icon-square-open' => 'fa fa-gratipay fa-stack-1x',
					'icon-square' => 'fa fa-gratipay fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-gratipay fa-stack-1x',
					'icon-circle-open' => 'fa fa-gratipay fa-stack-1x',
					'icon-circle' => 'fa fa-gratipay fa-stack-1x',
					'content' => 'f184',
				),

				'gittip.com' => array(
					'name' => 'Gittip',
					'class' => 'gratipay',
					'icon' => 'fa fa-gratipay',
					'icon-sign' => 'fa fa-gratipay',
					'icon-square-open' => 'fa fa-gratipay fa-stack-1x',
					'icon-square' => 'fa fa-gratipay fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-gratipay fa-stack-1x',
					'icon-circle-open' => 'fa fa-gratipay fa-stack-1x',
					'icon-circle' => 'fa fa-gratipay fa-stack-1x',
					'content' => 'f184',
				),

				'instagr.am' => array(
					'name' => 'Instagram',
					'class' => 'instagram',
					'icon' => 'fa fa-instagram',
					'icon-sign' => 'fa fa-instagram',
					'icon-square-open' => 'fa-instagram fa-stack-1x',
					'icon-square' => 'fa-instagram fa-stack-1x',
					'icon-circle-open-thin' => 'fa-instagram fa-stack-1x',
					'icon-circle-open' => 'fa-instagram fa-stack-1x',
					'icon-circle' => 'fa-instagram fa-stack-1x',
					'content' => 'f16d',
				),

				'instagram.com' => array(
					'name' => 'Instagram',
					'class' => 'instagram',
					'icon' => 'fa fa-instagram',
					'icon-sign' => 'fa fa-instagram',
					'icon-square-open' => 'fa-instagram fa-stack-1x',
					'icon-square' => 'fa-instagram fa-stack-1x',
					'icon-circle-open-thin' => 'fa-instagram fa-stack-1x',
					'icon-circle-open' => 'fa-instagram fa-stack-1x',
					'icon-circle' => 'fa-instagram fa-stack-1x',
					'content' => 'f16d',
				),

				'jsfiddle.net' => array(
					'name' => 'JS Fiddle',
					'class' => 'jsfiddle',
					'icon' => 'fa fa-jsfiddle',
					'icon-sign' => 'fa fa-jsfiddle',
					'icon-square-open' => 'fa fa-jsfiddle fa-stack-1x',
					'icon-square' => 'fa fa-jsfiddle fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-jsfiddle fa-stack-1x',
					'icon-circle-open' => 'fa fa-jsfiddle fa-stack-1x',
					'icon-circle' => 'fa fa-jsfiddle fa-stack-1x',
					'content' => 'f1cc',
				),

				'linkedin.com' => array(
					'name' => 'LinkedIn',
					'class' => 'linkedin',
					'icon' => 'fa fa-linkedin',
					'icon-sign' => 'fa fa-linkedin-square',
					'icon-square-open' => 'fa fa-linkedin fa-stack-1x',
					'icon-square' => 'fa fa-linkedin fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-linkedin fa-stack-1x',
					'icon-circle-open' => 'fa fa-linkedin fa-stack-1x',
					'icon-circle' => 'fa fa-linkedin fa-stack-1x',
					'content' => 'f0e1',
				),

				'mailto:' => array(
					'name' => 'Email',
					'class' => 'envelope',
					'icon' => 'fa fa-envelope',
					'icon-sign' => 'fa fa-envelope-o',
					'icon-square-open' => 'fa fa-envelope fa-stack-1x',
					'icon-square' => 'fa fa-envelope fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-envelope fa-stack-1x',
					'icon-circle-open' => 'fa fa-envelope fa-stack-1x',
					'icon-circle' => 'fa fa-envelope fa-stack-1x',
					'content' => 'f0e0',
				),

				'pinterest.com' => array(
					'name' => 'Pinterest',
					'class' => 'pinterest',
					'icon' => 'fa fa-pinterest',
					'icon-sign' => 'fa fa-pinterest-square',
					'icon-square-open' => 'fa fa-pinterest fa-stack-1x',
					'icon-square' => 'fa fa-pinterest fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-pinterest fa-stack-1x',
					'icon-circle-open' => 'fa fa-pinterest fa-stack-1x',
					'icon-circle' => 'fa fa-pinterest fa-stack-1x',
					'content' => 'f0d2'
				),

				'plus.google.com' => array(
					'name' => 'Google+',
					'class' => 'google-plus',
					'icon' => 'fa fa-google-plus',
					'icon-sign' => 'fa fa-google-plus-square',
					'icon-square-open' => 'fa fa-google-plus fa-stack-1x',
					'icon-square' => 'fa fa-google-plus fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-google-plus fa-stack-1x',
					'icon-circle-open' => 'fa fa-google-plus fa-stack-1x',
					'icon-circle' => 'fa fa-google-plus fa-stack-1x',
					'content' => 'f0d5',
				),

				'renren.com' => array(
					'name' => 'RenRen',
					'class' => 'renren',
					'icon' => 'fa fa-renren',
					'icon-sign' => 'fa fa-renren',
					'icon-square-open' => 'fa fa-renren fa-stack-1x',
					'icon-square' => 'fa fa-renren fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-renren fa-stack-1x',
					'icon-circle-open' => 'fa fa-renren fa-stack-1x',
					'icon-circle' => 'fa fa-renren fa-stack-1x',
					'content' => 'f18b',
				),

				'reddit.com' => array(
					'name' => 'Reddit',
					'class' => 'reddit',
					'icon' => 'fa fa-reddit',
					'icon-sign' => 'fa fa-reddit-square',
					'icon-square-open' => 'fa fa-reddit fa-stack-1x',
					'icon-square' => 'fa fa-reddit fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-reddit fa-stack-1x',
					'icon-circle-open' => 'fa fa-reddit fa-stack-1x',
					'icon-circle' => 'fa fa-reddit fa-stack-1x',
					'content' => 'f1a1',

				),

				'snapchat.com' => array(
					'name' => 'Snapchat',
					'class' => 'snapchat',
					'icon' => 'fa fa-snapchat-ghost',
					'icon-sign' => 'fa fa-snapchat-square',
					'icon-square-open' => 'fa fa-snapchat-ghost fa-stack-1x',
					'icon-square' => 'fa fa-snapchat-ghost fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-snapchat-ghost fa-stack-1x',
					'icon-circle-open' => 'fa fa-snapchat-ghost fa-stack-1x',
					'icon-circle' => 'fa fa-snapchat-ghost fa-stack-1x',
					'content' => 'f2ab',

				),

				'trello.com' => array(
					'name' => 'Trello',
					'class' => 'trello',
					'icon' => 'fa fa-trello',
					'icon-sign' => 'fa fa-trello',
					'icon-square-open' => 'fa fa-trello fa-stack-1x',
					'icon-square' => 'fa fa-trello fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-trello fa-stack-1x',
					'icon-circle-open' => 'fa fa-trello fa-stack-1x',
					'icon-circle' => 'fa fa-trello fa-stack-1x',
					'content' => 'f181',

				),

				'tumblr.com' => array(
					'name' => 'Tumblr',
					'class' => 'tumblr',
					'icon' => 'fa fa-tumblr',
					'icon-sign' => 'fa fa-tumblr-square',
					'icon-square-open' => 'fa fa-tumblr fa-stack-1x',
					'icon-square' => 'fa fa-tumblr fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-tumblr fa-stack-1x',
					'icon-circle-open' => 'fa fa-tumblr fa-stack-1x',
					'icon-circle' => 'fa fa-tumblr fa-stack-1x',
					'content' => 'f173',

				),

				'twitter.com' => array(
					'name' => 'Twitter',
					'class' => 'twitter',
					'icon' => 'fa fa-twitter',
					'icon-sign' => 'fa fa-twitter-square',
					'icon-square-open' => 'fa fa-twitter fa-stack-1x',
					'icon-square' => 'fa fa-twitter fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-twitter fa-stack-1x',
					'icon-circle-open' => 'fa fa-twitter fa-stack-1x',
					'icon-circle' => 'fa fa-twitter fa-stack-1x',
					'content' => 'f099',

				),

				'weibo.com' => array(
					'name' => 'Weibo',
					'class' => 'weibo',
					'icon' => 'fa fa-eibo',
					'icon-sign' => 'fa fa-weibo',
					'icon-square-open' => 'fa fa-eibo fa-stack-1x',
					'icon-square' => 'fa fa-eibo fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-eibo fa-stack-1x',
					'icon-circle-open' => 'fa fa-eibo fa-stack-1x',
					'icon-circle' => 'fa fa-eibo fa-stack-1x',
					'content' => 'f18a',

				),

				'wordpress.com' => array(
					'name' => 'WordPress.com',
					'class' => 'wpcom',
					'icon' => 'fa fa-wordpress',
					'icon-sign' => 'fa fa-wordpress',
					'icon-square-open' => 'fa fa-wordpress fa-stack-1x',
					'icon-square' => 'fa fa-wordpress fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-wordpress fa-stack-1x',
					'icon-circle-open' => 'fa fa-wordpress fa-stack-1x',
					'icon-circle' => 'fa fa-wordpress fa-stack-1x',
					'content' => 'f19a',

				),

				'wordpress.org' => array(
					'name' => 'WordPress.org',
					'class' => 'wporg',
					'icon' => 'fa fa-wordpress',
					'icon-sign' => 'fa fa-wordpress',
					'icon-square-open' => 'fa fa-wordpress fa-stack-1x',
					'icon-square' => 'fa fa-wordpress fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-wordpress fa-stack-1x',
					'icon-circle-open' => 'fa fa-wordpress fa-stack-1x',
					'icon-circle' => 'fa fa-wordpress fa-stack-1x',
					'content' => 'f19a',

				),

				'xing.com' => array(
					'name' => 'Xing',
					'class' => 'xing',
					'icon' => 'fa fa-xing',
					'icon-sign' => 'fa fa-xing',
					'icon-square-open' => 'fa fa-xing fa-stack-1x',
					'icon-square' => 'fa fa-xing fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-xing fa-stack-1x',
					'icon-circle-open' => 'fa fa-xing fa-stack-1x',
					'icon-circle' => 'fa fa-xing fa-stack-1x',
					'content' => 'f168',

				),

				'yelp.com' => array(
					'name' => 'Yelp',
					'class' => 'yelp',
					'icon' => 'fa fa-yelp',
					'icon-sign' => 'fa fa-yelp',
					'icon-square-open' => 'fa fa-yelp fa-stack-1x',
					'icon-square' => 'fa fa-yelp fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-yelp fa-stack-1x',
					'icon-circle-open' => 'fa fa-yelp fa-stack-1x',
					'icon-circle' => 'fa fa-yelp fa-stack-1x',
					'content' => 'f1e9',

				),

				'youtu.be' => array(
					'name' => 'YouTube',
					'class' => 'youtube',
					'icon' => 'fa fa-youtube',
					'icon-sign' => 'fa fa-youtube-square',
					'icon-square-open' => 'fa fa-youtube fa-stack-1x',
					'icon-square' => 'fa fa-youtube fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-youtube fa-stack-1x',
					'icon-circle-open' => 'fa fa-youtube fa-stack-1x',
					'icon-circle' => 'fa fa-youtube fa-stack-1x',
					'content' => 'f167',

				),

				'youtube.com' => array(
					'name' => 'YouTube',
					'class' => 'youtube',
					'icon' => 'fa fa-youtube',
					'icon-sign' => 'fa fa-youtube-square',
					'icon-square-open' => 'fa fa-youtube fa-stack-1x',
					'icon-square' => 'fa fa-youtube fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-youtube fa-stack-1x',
					'icon-circle-open' => 'fa fa-youtube fa-stack-1x',
					'icon-circle' => 'fa fa-youtube fa-stack-1x',
					'content' => 'f167',

				),

				'slideshare.net' => array(
					'name' => 'SlideShare',
					'class' => 'slideshare',
					'icon' => 'fa fa-slideshare',
					'icon-sign' => 'fa fa-slideshare',
					'icon-square-open' => 'fa fa-slideshare fa-stack-1x',
					'icon-square' => 'fa fa-slideshare fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-slideshare fa-stack-1x',
					'icon-circle-open' => 'fa fa-slideshare fa-stack-1x',
					'icon-circle' => 'fa fa-slideshare fa-stack-1x',
					'content' => 'f1e7',

				),

				'stackoverflow.com' => array(
					'name' => 'Stack Overflow',
					'class' => 'stack-overflow',
					'icon' => 'fa fa-stack-overflow',
					'icon-sign' => 'fa fa-stack-overflow',
					'icon-square-open' => 'fa fa-stack-overflow fa-stack-1x',
					'icon-square' => 'fa fa-stack-overflow fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-stack-overflow fa-stack-1x',
					'icon-circle-open' => 'fa fa-stack-overflow fa-stack-1x',
					'icon-circle' => 'fa fa-stack-overflow fa-stack-1x',
					'content' => 'f16c',

				),

				'stackexchange.com' => array(
					'name' => 'Stack Exchange',
					'class' => 'stack-exchange',
					'icon' => 'fa fa-stack-exchange',
					'icon-sign' => 'fa fa-stack-exchange',
					'icon-square-open' => 'fa fa-stack-exchange fa-stack-1x',
					'icon-square' => 'fa fa-stack-exchange fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-stack-exchange fa-stack-1x',
					'icon-circle-open' => 'fa fa-stack-exchange fa-stack-1x',
					'icon-circle' => 'fa fa-stack-exchange fa-stack-1x',
					'content' => 'f18d',

				),

				'soundcloud.com' => array(
					'name' => 'SoundCloud',
					'class' => 'soundcloud',
					'icon' => 'fa fa-soundcloud',
					'icon-sign' => 'fa fa-soundcloud',
					'icon-square-open' => 'fa fa-soundcloud fa-stack-1x',
					'icon-square' => 'fa fa-soundcloud fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-soundcloud fa-stack-1x',
					'icon-circle-open' => 'fa fa-soundcloud fa-stack-1x',
					'icon-circle' => 'fa fa-soundcloud fa-stack-1x',
					'content' => 'f1be',

				),

				'steamcommunity.com' => array(
					'name' => 'Steam',
					'class' => 'steam',
					'icon' => 'fa fa-steam',
					'icon-sign' => 'fa fa-steam-square',
					'icon-square-open' => 'fa fa-steam fa-stack-1x',
					'icon-square' => 'fa fa-steam fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-steam fa-stack-1x',
					'icon-circle-open' => 'fa fa-steam fa-stack-1x',
					'icon-circle' => 'fa fa-steam fa-stack-1x',
					'content' => 'f1b6',
				),

				'vimeo.com' => array(
					'name' => 'Vimeo',
					'class' => 'vimeo',
					'icon' => 'fa fa-vimeo',
					'icon-sign' => 'fa fa-vimeo-square',
					'icon-square-open' => 'fa fa-vimeo fa-stack-1x',
					'icon-square' => 'fa fa-vimeo fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-vimeo fa-stack-1x',
					'icon-circle-open' => 'fa fa-vimeo fa-stack-1x',
					'icon-circle' => 'fa fa-vimeo fa-stack-1x',
					'content' => 'f27d',
				),

				'vine.co' => array(
					'name' => 'Vine',
					'class' => 'vine',
					'icon' => 'fa fa-vine',
					'icon-sign' => 'fa fa-vine',
					'icon-square-open' => 'fa fa-vine fa-stack-1x',
					'icon-square' => 'fa fa-vine fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-vine fa-stack-1x',
					'icon-circle-open' => 'fa fa-vine fa-stack-1x',
					'icon-circle' => 'fa fa-vine fa-stack-1x',
					'content' => 'f1ca',
				),

				'vk.com' => array(
					'name' => 'VK',
					'class' => 'vk',
					'icon' => 'fa fa-vk',
					'icon-sign' => 'fa fa-vk',
					'icon-square-open' => 'fa fa-vk fa-stack-1x',
					'icon-square' => 'fa fa-vk fa-stack-1x',
					'icon-circle-open-thin' => 'fa fa-vk fa-stack-1x',
					'icon-circle-open' => 'fa fa-vk fa-stack-1x',
					'icon-circle' => 'fa fa-vk fa-stack-1x',
					'content' => 'f189',
				),
			),
		);

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since 0.1
		 * @access public
		 *
		 * @param array $configs The Customizer Social Icons configuration options.
		 */
		public function __construct() {
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
	        // Filters navs and replaces menu items with our FA markup.
			add_filter( 'wp_nav_menu_objects', array( $this, 'wp_nav_menu_objects' ), 5, 2 );
			// Add social_media to available items
			add_filter( 'customize_nav_menu_available_items', array( $this, 'available_items' ), 10, 4 );
			// Add to available item types.
			add_filter( 'customize_nav_menu_available_item_types', array( $this, 'available_item_types' ) );
			// Allow social icons to be searchable in panel.
			add_filter( 'customize_nav_menu_searched_items', array( $this, 'searched_items' ), 10, 2 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'add_fa_styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
		}

		/**
		 * Enqueues scripts and styles used on the frontend.
		 *
		 * @since 0.1
		 * @access public
		 *
		 * @return null No return for this method.
		 */
		public function enqueue_frontend_scripts() {
			// Base FontAwesome Styles.
			wp_enqueue_style(
				'font-awesome',
				plugins_url( 'assets/css/font-awesome/font-awesome.css', __FILE__ ),
				array(),
				'4.5.0'
			);
			// Additional Overrides From Various Theme Testing.
			wp_enqueue_style(
				'customizer-social-icons',
				plugins_url( 'assets/css/customizer-social-icons.css', __FILE__ ),
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
		public function enqueue_customizer_scripts() {
			// Font Awesome.
			wp_enqueue_style(
				'font-awesome',
				plugins_url( 'assets/css/font-awesome/font-awesome.css', __FILE__ ),
				array(),
				'4.5.0'
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

			$size = $icon_sizes[ $this->configs['size'] ];

			$icon = $network[ $this->configs['type'] ];

			$show_text = $this->configs['hide-text'] ? '' : 'visible-text';

			if ( 'icon-circle' === $this->configs['type'] ) {

				$html = "<span class='fa-stack $size'>
							<i class='fa fa-circle fa-stack-2x'></i>
	  						<i class='fa $icon fa-stack-1x fa-inverse $show_text'></i>
						</span>";

			} elseif ( 'icon-circle-open' === $this->configs['type'] ) {

				$html = "<span class='fa-stack $size'>
							<i class='fa fa-circle-o fa-stack-2x'></i>
								<i class='fa $icon fa-stack-1x $show_text'></i>
						</span>";

			} elseif ( 'icon-circle-open-thin' === $this->configs['type'] ) {

				$html = "<span class='fa-stack $size'>
							<i class='fa fa-circle-thin fa-stack-2x'></i>
								<i class='fa $icon fa-stack-1x $show_text'></i>
						</span>";

			} elseif ( 'icon-square' === $this->configs['type'] ) {

				$html = "<span class='fa-stack $size'>
							<i class='fa fa-square fa-stack-2x'></i>
								<i class='fa $icon fa-stack-1x fa-inverse $show_text'></i>
						</span>";

			} elseif ( 'icon-square-open' === $this->configs['type'] ) {

				$html = "<span class='fa-stack $size'>
							<i class='fa fa-square-o fa-stack-2x'></i>
								<i class='fa $icon fa-stack-1x $show_text'></i>
						</span>";

			} else {

				$html = "<i class='$size $icon $show_text'></i>";

			}

			return apply_filters( 'customizer_social_icons_html', $html, $size, $icon, $show_text );
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

			foreach ( $sorted_menu_items as &$item ) {

				// Skip submenu items.
				if ( 0 != $item->menu_item_parent ) {
					continue;
				}

				foreach ( $this->configs['networks'] as $url => $network ) {

					if ( false !== strpos( $item->url, $url ) ) {
						$item->classes[] = $this->configs['li_class'];
						$item->classes[] = $network['class'];

						if ( $this->configs['hide-text'] ) {
							$html = "<span class='screen-reader-text'>{$item->title}</span>";
							$item->title = apply_filters( 'boldgrid_icon_title_html', $html, $item->title );
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
	}
endif;
