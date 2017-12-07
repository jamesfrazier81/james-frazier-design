<?php

// Enqueue styles and scripts
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() . '/bower_components/animate.css/animate.min.css');
	wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/dist/scripts.min.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles');

// wp-admin Login
function my_login_logo() { ?>
    <style type="text/css">
        body.login {
            background-image: url('/wp-content/uploads/2017/12/james-in-snow.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        body.login .message, body.login #login_error {
            border-left: 4px solid #007fbe;
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }
        body.login div#login {}
        body.login div#login h1 {}
        body.login div#login h1 a {
            width: 320px;
            height: 67px;
            background-image: url('/wp-content/themes/james-frazier-design/includes/logo-james-frazier-design.svg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
        body.login div#login form#loginform {
            background-color: rgba(0, 0, 0, 0.5);
        }
        body.login div#login form#loginform p {}
        body.login div#login form#loginform p label {
            color: #ffffff;
        }
        
        body.login div#login form#loginform input {}
        body.login div#login form#loginform input#user_login {
            color: #007fbe;
        }
        body.login div#login form#loginform input#user_pass {
            color: #007fbe;
        }
        body.login div#login form#loginform p.forgetmenot {}
        body.login div#login form#loginform p.forgetmenot input#rememberme {}
        body.login div#login form#loginform p.submit {}
        body.login div#login form#loginform p.submit input#wp-submit {
            background-color: #007fbe;
            border: none;
            box-shadow: none;
            text-shadow: none;
        }
        body.login div#login p#nav {}
        body.login div#login p#nav a {
            color: #ffffff;
        }
        body.login div#login p#backtoblog {}
        body.login div#login p#backtoblog a {
            color: #ffffff;
        }
        body.login div#login form#loginform .aiowps-captcha-equation strong {
            color: #ffffff;
        }
        body.login div#login form#loginform .aiowps-captcha-equation strong input {
            color: #007fbe;
            font-weight: 400;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Enable custom Enfold classes on all elements
add_theme_support('avia_template_builder_custom_css');

// TemplateBuilder options to replace Enfold defaults - https://kriesi.at/documentation/enfold/add-new-or-replace-advanced-layout-builder-elements-from-child-theme/
add_filter('avia_load_shortcodes', 'avia_include_shortcode_template', 15, 1);
function avia_include_shortcode_template($paths)
{
    $template_url = get_stylesheet_directory();
        array_unshift($paths, $template_url.'/shortcodes/');

    return $paths;
}

// Add current year shortcode for Enfold footer settings
function avia_year_func( $atts ){
	return date("Y");
}
add_shortcode( 'cur_year', 'avia_year_func' );

// Remove image titles
function remove_title_attr(){
?>
 <script>
	jQuery(window).load(function(){
		jQuery('#wrap_all a').removeAttr('title');
		jQuery('#wrap_all img').removeAttr('title');
	});
 </script>
<?php
}
add_action('wp_footer', 'remove_title_attr');

// Add Advance Layout Builder to CPTs
// add_filter('avf_builder_boxes', 'avia_register_meta_boxes', 10, 1);
// function avia_register_meta_boxes($boxes) {
// 	if(!empty($boxes)) {
// 		foreach($boxes as $key => $box) {
// 			$boxes[$key]['page'][] = 'your-cpt-name-here';
// 		}
// 	}
// 	return $boxes;
// }

// Menu shortcode
function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');

?>