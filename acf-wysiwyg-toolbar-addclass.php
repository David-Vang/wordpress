<?php
/**
 * Add ACF toolbar type as class to WYSIWYG body for backend styling
 */
function mytheme_acf_wysiwyg_helpers( $field ) {
	//echo '<pre>' . print_r($field, true) . '</pre>';
	$toolbar_type = $field['toolbar'];

	if($toolbar_type == 'homepage_wysiwyg') :
		// get the field key
		$field_key = $field['key'];
	?>
	<script>

		( function( $ ) {
	    acf.add_filter('wysiwyg_tinymce_settings', function( mceInit, id, $field ) {
				$fieldKey = $field.data('key');

				if ( $fieldKey == '<?php echo $field_key ?>' ) {
					mceInit.body_class = 'homepage_wysiwyg';
				}

				return mceInit;
	    });

	} )( jQuery );

	</script>
	<?php
	endif;
}
add_action( 'acf/render_field/type=wysiwyg', 'mytheme_acf_wysiwyg_helpers', 10, 1 );
?>
