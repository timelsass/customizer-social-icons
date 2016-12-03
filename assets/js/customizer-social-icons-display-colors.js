var CustomizerSocialIcons = CustomizerSocialIcons || {};

/**
 * Social Icons Live Preview JavaScript.
 * This file is responsible for displaying customizer output
 * in the previewer window.  Controls are managed from the
 * customizer.social-media-icons.controls.js
 */
( function( $, api ) {
	'use strict';

	CustomizerSocialIcons.Controls = {};
	var self = CustomizerSocialIcons.Controls;

	/**
	 * Initialize Social Media Icon Controls.
	 *
	 * @since 0.1
	 */
	self.initialize = function() {
		$( document ).ready( self.onReady );
	};

	self.onReady = function() {
		self.displayColors();
	};

	self.displayColors = function() {
		var iconStyle, secondaryColor;

		iconStyle = $( '#customize-control-customizer_social_icons_type select' );
		secondaryColor = $( '#customize-control-customizer_social_icons_color_secondary' );

		/* on page load, hide or show adv. option */
		if ( iconStyle.val() === 'icon-circle' || iconStyle.val() === 'icon-square' ) {
			secondaryColor.show();
		} else {
			secondaryColor.hide();
		}

		/* On change, hide or show secondary color options when appropriate */
		iconStyle.change( function() {
			if ( $( this ).val() === 'icon-circle' || $( this ).val() === 'icon-square' ) {
				secondaryColor.show();
			} else {
				secondaryColor.hide();
			}
		});
	};


} )( jQuery, wp.customize );

CustomizerSocialIcons.Controls.initialize();
