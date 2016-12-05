var CustomizerSocialIcons = CustomizerSocialIcons || {};

/**
 * Social Icons Live Preview JavaScript.
 * This file is responsible for displaying customizer output
 * in the previewer window.  Controls are managed from the
 * customizer.social-media-icons.controls.js
 */
( function( $, api ) {
	'use strict';

	CustomizerSocialIcons.LivePreview = {};
	var self = CustomizerSocialIcons.LivePreview;


	/**
	 * Initialize Social Media Icon Controls.
	 *
	 * @since 0.1
	 */
	self.initialize = function() {
		$( document ).ready( self.onReady );
		self.iconSize();
		self.iconText();
		self.iconColor();
		self.iconColorSecondary();
		self.iconHoverColor();
		self.iconHoverColorSecondary();
		self.iconSpacing();

	};

	self.onReady = function() {
		self.getSettings();
	};

	self.getSettings = function() {
		wp.customize.bind( 'ready', _.defer( function() {
			self.configs = {
				iconStyle : api( 'customizer_social_icons_type_setting' )(),
				hoverColor : api( 'customizer_social_icons_hover_color_setting' )(),
				hoverColorSecondary : api( 'customizer_social_icons_hover_color_secondary_setting' )(),
				currentColor : api( 'customizer_social_icons_color_setting' )(),
				currentColorSecondary : api( 'customizer_social_icons_color_secondary_setting' )(),
			};
		} ) );
	};

	/**
	 * Listen for hover.
	 *
	 * @since 0.3
	 */
	self.hover = function() {
		$( '.menu-social' );
		var $icons, $stack, $openStack, selector, currentColor;
		// Define selector for stacks or standard icons.
		$icons = $( '.menu-social a' );
		$stack = $( '.menu-social' ).find( 'span.stack-closed' ).parent( 'a' );
		$openStack = $( '.menu-social' ).find( 'span.stack-open' ).parent( 'a' );
		if ( $stack.length ) {
			selector = $stack;
			selector.hover(
				function( e ) {
					// Set hover color.
					$( e.currentTarget ).find( '.fa-inverse' ).css( 'color', self.configs.hoverColor );
					// Set hover color.
					$( e.currentTarget ).find( 'i.fa:first-child' ).css( 'color', self.configs.hoverColorSecondary );
				},
				function( e ) {
					// Reassign to the current secondary color.
					$( e.currentTarget ).find( '.fa-inverse' ).css( 'color', self.configs.currentColor );
					// Set hover color.
					$( e.currentTarget ).find( 'i.fa:first-child' ).css( 'color', self.configs.currentColorSecondary );
				}
			);
			return;
		}
		selector = $icons;
		if ( $openStack.length ) selector = $openStack;
		selector.hover(
			function( e ) {
				// Set hover color.
				$( e.currentTarget ).find( 'i.fa' ).css( 'color', self.configs.hoverColor );
			},
			function( e ) {
				// Reassign to the current color.
				$( e.currentTarget ).find( 'i.fa' ).css( 'color', self.configs.currentColor );
			}
		);
	};

	/**
	 * Adjust Social Media Icon Size.
	 *
	 * @since 0.2
	 */
	self.iconSize = function() {
		// Set logo letter spacing on site title text live
		api( 'customizer_social_icons_size_setting', function( value ) {
			value.bind( function( to ) {
				var $icons, $stack, selector;
				// Define selector for stacks or standard icons.
				$icons = $( '.menu-social' ).find( 'i.fa' );
				$stack = $( '.menu-social' ).find( 'span.fa-stack' );
				selector = $icons;
				if ( $stack.length ) selector = $stack;
				// Remove all Font Awesome sizing selectors from menu items.
				selector.removeClass( 'fa-normal fa-lg fa-2x fa-3x fa-4x fa-5x' );

				// Add size classes from social_icon_size setting.
				if ( 1 == to ) {
					selector.addClass( 'fa-normal' );
				} else if ( 2 == to ) {
					selector.addClass( 'fa-lg' );
				} else {
					selector.addClass( 'fa-' + Number( to -1 ) + 'x' );
				}
			} );
		} );
	};

	/**
	 * Hide or Show Social Media Icon Text.
	 *
	 * @since 0.2
	 */
	self.iconText = function() {
		// Display or Hide the Social Media Icon Descriptive Text
		api( 'customizer_social_icons_hide_text_setting', function( value ) {
			value.bind( function( to ) {
				var removeText, addText, selector = $( '.social-network-name' );

				// Remove Screen Reader Text
				removeText = function() {
					selector.addClass( 'screen-reader-text' );
				};

				// Add Screen Reader Text
				addText = function() {
					selector.removeClass( 'screen-reader-text' );
				};

				( to ? removeText : addText )();
			} );
		} );
	};

	/**
	 * Adjust Social Media Icon Color.
	 *
	 * @since 0.3
	 */
	self.iconColor = function() {
		// Set logo letter spacing on site title text live
		api( 'customizer_social_icons_color_setting', function( value ) {
			value.bind( function( to ) {
				self.configs.currentColor = to;
				var $icons = self.configs.iconStyle, selector;

				if ( $icons === 'icon' ) {
					selector = $( '.menu-social' ).find( 'i.fa' );
				} else if ( $icons === 'icon-square' || $icons === 'icon-circle' ) {
					selector = $( '.menu-social' ).find( 'span.stack-closed > .fa-inverse' );
				} else {
					selector = $( '.menu-social' ).find( 'span.fa-stack' );
				}

				// Add color to selector.
				selector.css( 'color', to );
				self.hover();
			} );
		} );
	};

	self.iconColorSecondary = function() {
		// Set logo letter spacing on site title text live
		api( 'customizer_social_icons_color_secondary_setting', function( value ) {
			value.bind( function( to ) {
				self.configs.currentColorSecondary = to;
				var $icons = self.configs.iconStyle, selector;
				selector = $( '.menu-social' ).find( 'span.stack-closed > i.fa:not(.fa-inverse)' );

				// Add color to selector.
				selector.css( 'color', to );
				self.hover();
			} );
		} );
	};

	/**
	 * Adjust Social Media Icon Hover Color.
	 *
	 * @since 0.3
	 */
	self.iconHoverColor = function() {
		// Set logo letter spacing on site title text live
		api( 'customizer_social_icons_hover_color_setting', function( value ) {
			value.bind( function( to ) {
				// Update hover color.
				self.configs.hoverColor = to;
				self.hover();
			} );
		} );
	};

	/**
	 * Adjust Social Media Icon Hover Color.
	 *
	 * @since 0.3
	 */
	self.iconHoverColorSecondary = function() {
		// Set logo letter spacing on site title text live
		api( 'customizer_social_icons_hover_color_secondary_setting', function( value ) {
			value.bind( function( to ) {
				// Update hover color.
				self.configs.hoverColorSecondary = to;
				self.hover();
			} );
		} );
	};

	/**
	 * Adjust Social Media Icon Spacing.
	 *
	 * @since 0.2
	 */
	self.iconSpacing = function() {
		// Adjust spacing of social media icon menus.
		api( 'customizer_social_icons_spacing_setting', function( value ) {
			value.bind( function( to ) {
				var $icons, $stack, selector;
				// Define selector for stacks or standard icons.
				$icons = $( '.menu-social' ).find( 'i.fa' );
				$stack = $( '.menu-social' ).find( 'span.fa-stack' );
				selector = $icons;
				if ( $stack.length ) selector = $stack;
				selector.css({
					'margin-right' : to / 2 + 'px',
					'margin-left' : to / 2 + 'px',
				});
				if ( selector.length > 2 ) {
					var first = selector.filter( ':first' ),
						last = selector.filter( ':last' );
					first.css({
						'margin-right' : to / 2 + 'px',
						'margin-left' : 0,
					});
					last.css({
						'margin-right' : 0,
						'margin-left' : to / 2 + 'px',
					});
				}
			});
		});
	};

} )( jQuery, wp.customize );

CustomizerSocialIcons.LivePreview.initialize();
