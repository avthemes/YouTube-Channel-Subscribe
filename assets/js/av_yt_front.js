/**
 * Subscribe widget front-end script
 */
(function( $ ) {
 
    if( jQuery('.is-provider-youtube').length ) {

		jQuery('.is-provider-youtube').css('margin-bottom', '0px');
		jQuery('.is-provider-youtube').after( AV_YT_html );
	}
     
})( jQuery );