<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );
    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
  load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


function example_enqueue_styles() {

	// enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css', array(), '1.0.0');
	// enqueue child styles
  wp_enqueue_style( 'animation', get_stylesheet_directory_uri() .'/css/animate.css', array(), '1.0.0');
  wp_enqueue_style( 'owl.carousel css', get_stylesheet_directory_uri() .'/css/owl.carousel.min.css', array(), '1.0.0');
  wp_enqueue_style( 'owl.theme.default css', get_stylesheet_directory_uri() .'/css/owl.theme.default.min.css', array(), '1.0.0');
  wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() .'/style.css', array(), '1.0.0');
  wp_enqueue_script( 'owl carousel js', get_stylesheet_directory_uri() .'/js/owl.carousel.min.js', array(), '1.0.0');
  wp_enqueue_script( 'wow js', get_stylesheet_directory_uri() .'/js/wow.min.js', array(), '1.0.0');
  wp_enqueue_script( 'global js', get_stylesheet_directory_uri() .'/js/custom.js', array(), '1.0.0');

}
add_action('wp_enqueue_scripts', 'example_enqueue_styles');

function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	return $post_excerpt;
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




function ajax_login_init(){

    wp_register_script('ajax-login-script', get_stylesheet_directory_uri() . '/ajax-login-script.js', array('jquery') );
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url() . '/account',
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}
