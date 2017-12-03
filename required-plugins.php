<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'stock_crazycafe_register_required_plugins' );
function stock_crazycafe_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Stock Toolkit',
			'slug'               => 'stock-toolkit',
			'source'             => get_template_directory() . '/inc/plugins/stock-toolkit.zip',
			'required'           => true,
			'version'            => '1.0',
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		array(
			'name'               => 'WPBakery Visual Composer',
			'slug'               => 'js_composer',
			'source'             => get_template_directory() . '/inc/plugins/js-composer.zip',
			'required'           => true,
			'version'            => '5.2',
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxT',
			'required'  => true,
		),
		array(
			'name'      => 'Contact form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

	);
	$config = array(
		'id'           => 'stock-crazycafe', 
		'default_path' => '', 
		'menu'         => 'stock-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '', 
		'is_automatic' => false, 
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
