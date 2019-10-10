<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="fw-test-shortcode">
	<?php foreach ( fw_akg( 'tabs', $atts, array() ) as $test_shortcode ) : ?>
		<h3 class=""><?php echo $test_shortcode['test_title']; ?></h3>
		<h3> from test shortcode </h3>
	<?php endforeach; ?>
</div>