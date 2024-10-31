<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Foundation
Plugin URI: https://wordpress.org/plugins/oxsn-foundation/
Description: This plugin adds fundamental styles/shortcodes/quicktags/and more!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.6
*/


define( 'oxsn_foundation_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_foundation_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_foundation_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_foundation_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_foundation_settings_link', 10, 2 );
	function oxsn_foundation_settings_link( $links, $file ) {

		if ( $file != oxsn_foundation_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-foundation', false ) . '">' . esc_html( __( 'Settings', 'oxsn-foundation' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_foundation_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_foundation_plugin_tab_nav_item', 99);
	function oxsn_foundation_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Foundation', 'Foundation', 'manage_options', 'oxsn-foundation', 'oxsn_foundation_plugin_tab');

	}

}

if ( !function_exists('oxsn_foundation_plugin_tab') ) {

	function oxsn_foundation_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Foundation Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>This plugin helps set the foundation for a custom theme. It adds things like shortcodes, functions, and sidebars. This is constantly updated so that a theme with this plugin installed is always getting the latest code to help their Wordpress site perform well.</p>

								<p><strong>Shortcodes</strong>: Some helpful shortcodes within this plugin include..</p>

								<p>[oxsn_h1 id="" class=""][/oxsn_h1]
									<br />This creates a helpful &lt;h1&gt;&lt;/h1&gt;.</p>
								<p>[oxsn_h2 id="" class=""][/oxsn_h2]
									<br />This creates a helpful &lt;h2&gt;&lt;/h2&gt;.</p>
								<p>[oxsn_h3 id="" class=""][/oxsn_h3]
									<br />This creates a helpful &lt;h3&gt;&lt;/h3&gt;.</p>
								<p>[oxsn_h4 id="" class=""][/oxsn_h4]
									<br />This creates a helpful &lt;h4&gt;&lt;/h4&gt;.</p>
								<p>[oxsn_h5 id="" class=""][/oxsn_h5]
									<br />This creates a helpful &lt;h5&gt;&lt;/h5&gt;.</p>
								<p>[oxsn_h6 id="" class=""][/oxsn_h6]
									<br />This creates a helpful &lt;h6&gt;&lt;/h6&gt;.</p>
								<p>[oxsn_p id="" class=""][/oxsn_p]
									<br />This creates a helpful &lt;p&gt;&lt;/p&gt;.</p>
								<p>[oxsn_ul id="" class=""][/oxsn_ul]
									<br />This creates a helpful &lt;ul&gt;&lt;/ul&gt;.</p>
								<p>[oxsn_li id="" class=""][/oxsn_li]
									<br />This creates a helpful &lt;li&gt;&lt;/li&gt;.</p>
								<p>[oxsn_panel id="" class=""][/oxsn_panel]
									<br />This creates a helpful panel div.</p>
								<p>[oxsn_container id="" class=""][/oxsn_container]
									<br />This creates a helpful centered container div.</p>
								<p>[oxsn_row id="" class="" xs_gap_width="" sm_gap_width="" md_gap_width="" lg_gap_width="" xl_gap_width=""][/oxsn_row]
									<br />This creates a helpful full width row div.</p>
								<p>[oxsn_column id="" class="" xs_width="" sm_width="" md_width="" lg_width="" xl_width=""][/oxsn_column]
									<br />This creates a helpful column div to be placed within each row.</p>
								<p>[oxsn_primary_sidebar id="" class=""]
									<br />This creates a helpful sidebar shortcode.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-foundation" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Credit</h3>

							<div class="inside">

								<p>This plugin includes some helpful code from..</p>

								<p><a href="https://github.com/keithclark/selectivizr" target="_blank">SelectivizrJS</a>
									<br /><a href="https://github.com/scottjehl/Respond" target="_blank">RespondJS</a>
									<br /><a href="https://github.com/jamesallardice/Placeholders.js/" target="_blank">PlaceholdersJS</a>
									<br /><a href="https://github.com/aFarkas/html5shiv" target="_blank">HTML5ShivJS</a>
									<br /><a href="https://github.com/necolas/normalize.css" target="_blank">Normalize</a></p>

								<p>Thank you!</p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


/* OXSN Include JS */

if ( ! function_exists ( 'oxsn_foundation_inc_js' ) ) {

  add_action( 'wp_enqueue_scripts', 'oxsn_foundation_inc_js' );
  function oxsn_foundation_inc_js() {

  	wp_enqueue_script( 'oxsn_foundation_js', oxsn_foundation_plugin_dir_url . 'inc/js/foundation.js', array(), '1.0.0', 'all' ); 

  }

}


/* OXSN Include CSS */

if ( ! function_exists ( 'oxsn_foundation_inc_css' ) ) {

  add_action( 'wp_enqueue_scripts', 'oxsn_foundation_inc_css' );
  function oxsn_foundation_inc_css() {

  	wp_enqueue_style( 'oxsn_foundation_css', oxsn_foundation_plugin_dir_url . 'inc/css/foundation.css', array(), '1.0.0', 'all' ); 

  }

}


/* OXSN Scroll Up Box PHP Inc */

if ( ! function_exists ( 'oxsn_foundation_scroll_up_box_php_inc' ) ) {

	add_action( 'wp_footer', 'oxsn_foundation_scroll_up_box_php_inc');
	function oxsn_foundation_scroll_up_box_php_inc() { 

		require_once( oxsn_foundation_plugin_dir_path . 'inc/php/scroll-up-box.php' );

	}

}


/* OXSN Scroll Up Box Customizer Inc */

if ( ! function_exists ( 'oxsn_foundation_scroll_up_box_customizer' ) ) {

	add_action( 'customize_register', 'oxsn_foundation_scroll_up_box_customizer' );
	function oxsn_foundation_scroll_up_box_customizer( $wp_customize ) {
	   
	   $wp_customize->add_panel( 'oxsn_plugin_panel', array(
			'priority'       => '',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'OXSN Plugins',
			'description'    => '',
		) );

	   		// foundation

		   $wp_customize->add_section( 'oxsn_foundation_section' , array(
				'priority'       => '',
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => 'Foundation',
				'description'    => '',
				'panel'  => 'oxsn_plugin_panel',
			) );

				// scroll_up_box_icon

				$scroll_up_box_icon = '⇡';
				$wp_customize->add_setting( 'oxsn_scroll_up_box_icon_control', array(
					'type' => 'option',
					'default' => $scroll_up_box_icon,
				) );

				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'oxsn_scroll_up_box_icon_control', array(
					'type'     => '',
					'priority' => '',
					'section'  => 'oxsn_foundation_section',
					'label'    => 'Scroll Up Box Icon',
				) ) );

	}

}


/* OXSN Disable Admin Bar */

if ( ! function_exists ( 'oxsn_foundation_disable_admin_bar' ) ) {

	add_action('after_setup_theme', 'oxsn_foundation_disable_admin_bar');
	function oxsn_foundation_disable_admin_bar() {

		if (!current_user_can('manage_options') && !is_admin()) {
			show_admin_bar(false);
		}

	}

}


/* OXSN Shortcodes */

//[oxsn_h1 class=""][/oxsn_h1]
if ( ! function_exists ( 'oxsn_foundation_h1_shortcode' ) ) {

	add_shortcode( 'oxsn_h1', 'oxsn_foundation_h1_shortcode' );
	function oxsn_foundation_h1_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_h1_class = esc_attr($a['class']);
		$oxsn_foundation_h1_id = esc_attr($a['id']);

		return '<h1 id="' . $oxsn_foundation_h1_id . '" class="oxsn_h1 ' . $oxsn_foundation_h1_class . '">' . do_shortcode($content) . '</h1>';

	}

}

//[oxsn_h2 class=""][/oxsn_h2]
if ( ! function_exists ( 'oxsn_foundation_h2_shortcode' ) ) {

	add_shortcode( 'oxsn_h2', 'oxsn_foundation_h2_shortcode' );
	function oxsn_foundation_h2_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_h2_class = esc_attr($a['class']);
		$oxsn_foundation_h2_id = esc_attr($a['id']);

		return '<h2 id="' . $oxsn_foundation_h2_id . '" class="oxsn_h2 ' . $oxsn_foundation_h2_class . '">' . do_shortcode($content) . '</h2>';

	}

}

//[oxsn_h3 class=""][/oxsn_h3]
if ( ! function_exists ( 'oxsn_foundation_h3_shortcode' ) ) {

	add_shortcode( 'oxsn_h3', 'oxsn_foundation_h3_shortcode' );
	function oxsn_foundation_h3_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_h3_class = esc_attr($a['class']);
		$oxsn_foundation_h3_id = esc_attr($a['id']);

		return '<h3 id="' . $oxsn_foundation_h3_id . '" class="oxsn_h3 ' . $oxsn_foundation_h3_class . '">' . do_shortcode($content) . '</h3>';

	}

}

//[oxsn_h4 class=""][/oxsn_h4]
if ( ! function_exists ( 'oxsn_foundation_h4_shortcode' ) ) {

	add_shortcode( 'oxsn_h4', 'oxsn_foundation_h4_shortcode' );
	function oxsn_foundation_h4_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_h4_class = esc_attr($a['class']);
		$oxsn_foundation_h4_id = esc_attr($a['id']);

		return '<h4 id="' . $oxsn_foundation_h4_id . '" class="oxsn_h4 ' . $oxsn_foundation_h4_class . '">' . do_shortcode($content) . '</h4>';

	}

}

//[oxsn_h5 class=""][/oxsn_h5]
if ( ! function_exists ( 'oxsn_foundation_h5_shortcode' ) ) {

	add_shortcode( 'oxsn_h5', 'oxsn_foundation_h5_shortcode' );
	function oxsn_foundation_h5_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_h5_class = esc_attr($a['class']);
		$oxsn_foundation_h5_id = esc_attr($a['id']);

		return '<h5 id="' . $oxsn_foundation_h5_id . '" class="oxsn_h5 ' . $oxsn_foundation_h5_class . '">' . do_shortcode($content) . '</h5>';

	}

}

//[oxsn_h6 class=""][/oxsn_h6]
if ( ! function_exists ( 'oxsn_foundation_h6_shortcode' ) ) {

	add_shortcode( 'oxsn_h6', 'oxsn_foundation_h6_shortcode' );
	function oxsn_foundation_h6_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_h6_class = esc_attr($a['class']);
		$oxsn_foundation_h6_id = esc_attr($a['id']);

		return '<h6 id="' . $oxsn_foundation_h6_id . '" class="oxsn_h6 ' . $oxsn_foundation_h6_class . '">' . do_shortcode($content) . '</h6>';

	}

}

//[oxsn_p class=""][/oxsn_p]
if ( ! function_exists ( 'oxsn_foundation_p_shortcode' ) ) {

	add_shortcode( 'oxsn_p', 'oxsn_foundation_p_shortcode' );
	function oxsn_foundation_p_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_p_class = esc_attr($a['class']);
		$oxsn_foundation_p_id = esc_attr($a['id']);

		return '<p id="' . $oxsn_foundation_p_id . '" class="oxsn_p ' . $oxsn_foundation_p_class . '">' . do_shortcode($content) . '</p>';

	}

}

//[oxsn_img class="" href=""]
if ( ! function_exists ( 'oxsn_foundation_img_shortcode' ) ) {

	add_shortcode( 'oxsn_img', 'oxsn_foundation_img_shortcode' );
	function oxsn_foundation_img_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'href' => '',
		), $atts );

		$oxsn_foundation_img_class = esc_attr($a['class']);
		$oxsn_foundation_img_id = esc_attr($a['id']);
		$oxsn_foundation_img_href = esc_attr($a['href']);

		return '<img id="' . $oxsn_foundation_img_id . '" class="oxsn_img ' . $oxsn_foundation_img_class . '" href="' . $oxsn_foundation_img_href . '" />';

	}

}

//[oxsn_video class="" mp4="" ogg="" webm=""]
if ( ! function_exists ( 'oxsn_foundation_video_shortcode' ) ) {

	add_shortcode('oxsn_video', 'oxsn_foundation_video_shortcode');
	function oxsn_foundation_video_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'youtube' => '',
			'vimeo' => '',
			'mp4' => '',
			'ogg' => '',
			'ogv' => '',
			'webm' => '',
			'autoplay' => '',
			'loop' => '',
			'poster' => '',
		), $atts );

		$oxsn_foundation_video_class = esc_attr($a['class']);
		$oxsn_foundation_video_class = esc_attr($a['id']);

		$oxsn_foundation_video_youtube = esc_attr($a['youtube']);
		$oxsn_foundation_video_vimeo = esc_attr($a['vimeo']);
		$oxsn_foundation_video_mp4 = esc_attr($a['mp4']);
		$oxsn_foundation_video_ogg = esc_attr($a['ogg']);
		$oxsn_foundation_video_ogv = esc_attr($a['ogv']);
		$oxsn_foundation_video_webm = esc_attr($a['webm']);
		$oxsn_foundation_video_autoplay = esc_attr($a['autoplay']);
		$oxsn_foundation_video_loop = esc_attr($a['loop']);
		$oxsn_foundation_video_poster = esc_attr($a['poster']);

		if($oxsn_foundation_video_autoplay === 'true') :
			$autoplay = 'autoplay';
			$youtube_autoplay = '&autoplay=1';
			$vimeo_autoplay = '&autoplay=1';
		endif; 

		if($oxsn_foundation_video_loop === 'true') :
			$loop = 'autoplay';
			$youtube_loop = '&loop=1';
			$vimeo_loop = '&loop=1';
		endif; 

		if ($oxsn_foundation_video_mp4 != "" | $oxsn_foundation_video_ogg != "" | $oxsn_foundation_video_ogv != "" | $oxsn_foundation_video_webm != "") :

			$oxsn_foundation_return .=
			'<div id="' . $oxsn_foundation_video_id . '" class="oxsn_video ' . $oxsn_foundation_video_class . '">' .
				do_shortcode($content) .
				'<video class="oxsn_video_player" controls ' . $autoplay . ' ' . $loop . ' poster="' . $oxsn_foundation_video_poster . '">';

					if ($oxsn_foundation_video_mp4 != "") :

						$oxsn_foundation_return .= '<source src="' . $oxsn_foundation_video_mp4 . '" type="video/mp4">';

					endif;

					if ($oxsn_foundation_video_ogg != "") :

						$oxsn_foundation_return .= '<source src="' . $oxsn_foundation_video_ogg . '" type="video/ogg">';

					endif;

					if ($oxsn_foundation_video_ogv != "") :

						$oxsn_foundation_return .= '<source src="' . $oxsn_foundation_video_ogv . '" type="video/ogg">';

					endif;

					if ($oxsn_foundation_video_webm != "") :

						$oxsn_foundation_return .= '<source src="' . $oxsn_foundation_video_webm . '" type="video/webm">';

					endif;

			$oxsn_foundation_return .=
				'</video>' .
			'</div>';

		elseif ($oxsn_foundation_video_youtube != "") :

			elseif (strpos($oxsn_foundation_video_youtube, 'youtube') > 0) :

				parse_str( parse_url( $oxsn_foundation_video_youtube, PHP_URL_QUERY ), $my_array_of_vars );
				$oxsn_foundation_video_youtube =  $my_array_of_vars['v'];

				$oxsn_foundation_return .=
				'<div id="' . $oxsn_foundation_video_id . '" class="oxsn_video ' . $oxsn_foundation_video_class . '">' .
					do_shortcode($content) .
					'<iframe class="oxsn_video_player" width="560" height="315" src="https://www.youtube.com/embed/' . $oxsn_foundation_video_youtube . '?rel=0' . $youtube_autoplay . $youtube_loop . '" frameborder="0" allowfullscreen></iframe>' .
				'</div>';

		if ($oxsn_foundation_video_vimeo != "") :

			elseif (strpos($oxsn_foundation_video_vimeo, 'vimeo') > 0) :

				preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $oxsn_foundation_video_vimeo, $oxsn_foundation_return_id);
				$oxsn_foundation_video_vimeo = $oxsn_foundation_return_id[5];

				$oxsn_foundation_return .=
				'<div id="' . $oxsn_foundation_video_id . '" class="oxsn_video ' . $oxsn_foundation_video_class . '">' .
					do_shortcode($content) .
					'<iframe class="oxsn_video_player" src="https://player.vimeo.com/video/' . $oxsn_foundation_video_vimeo . '?automute=0' . $vimeo_autoplay . $vimeo_loop . '" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' .
				'</div>';

			endif;

		endif;

		return $oxsn_foundation_return;

	}

}

//[oxsn_ol class=""][/oxsn_ol]
if ( ! function_exists ( 'oxsn_foundation_ol_shortcode' ) ) {

	add_shortcode( 'oxsn_ol', 'oxsn_foundation_ol_shortcode' );
	function oxsn_foundation_ol_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_ol_class = esc_attr($a['class']);
		$oxsn_foundation_ol_id = esc_attr($a['id']);

		return '<ol id="' . $oxsn_foundation_ol_id . '" class="oxsn_ol ' . $oxsn_foundation_ol_class . '">' . do_shortcode($content) . '</ol>';

	}

}

//[oxsn_ul class=""][/oxsn_ul]
if ( ! function_exists ( 'oxsn_foundation_ul_shortcode' ) ) {

	add_shortcode( 'oxsn_ul', 'oxsn_foundation_ul_shortcode' );
	function oxsn_foundation_ul_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_ul_class = esc_attr($a['class']);
		$oxsn_foundation_ul_id = esc_attr($a['id']);

		return '<ul id="' . $oxsn_foundation_ul_id . '" class="oxsn_ul ' . $oxsn_foundation_ul_class . '">' . do_shortcode($content) . '</ul>';

	}

}

//[oxsn_li class=""][/oxsn_li]
if ( ! function_exists ( 'oxsn_foundation_li_shortcode' ) ) {

	add_shortcode( 'oxsn_li', 'oxsn_foundation_li_shortcode' );
	function oxsn_foundation_li_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_li_class = esc_attr($a['class']);
		$oxsn_foundation_li_id = esc_attr($a['id']);

		return '<li id="' . $oxsn_foundation_li_id . '" class="oxsn_li ' . $oxsn_foundation_li_class . '">' . do_shortcode($content) . '</li>';

	}

}

//[oxsn_table class=""][/oxsn_table]
if ( ! function_exists ( 'oxsn_foundation_table_shortcode' ) ) {

	add_shortcode( 'oxsn_table', 'oxsn_foundation_table_shortcode' );
	function oxsn_foundation_table_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_table_class = esc_attr($a['class']);
		$oxsn_foundation_table_id = esc_attr($a['id']);

		return '<div id="' . $oxsn_foundation_table_id . '" class="oxsn_table oxsn_display_table ' . $oxsn_foundation_table_class . '">' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_table_cell class=""][/oxsn_table_cell]
if ( ! function_exists ( 'oxsn_foundation_table_cell_shortcode' ) ) {

	add_shortcode( 'oxsn_table_cell', 'oxsn_foundation_table_cell_shortcode' );
	function oxsn_foundation_table_cell_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_table_cell_class = esc_attr($a['class']);
		$oxsn_foundation_table_cell_id = esc_attr($a['id']);

		return '<div id="' . $oxsn_foundation_table_cell_id . '" class="oxsn_table_cell oxsn_display_table_cell ' . $oxsn_foundation_table_cell_class . '">' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_panel class=""][/oxsn_panel]
if ( ! function_exists ( 'oxsn_foundation_panel_shortcode' ) ) {

	add_shortcode( 'oxsn_panel', 'oxsn_foundation_panel_shortcode' );
	function oxsn_foundation_panel_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_panel_class = esc_attr($a['class']);
		$oxsn_foundation_panel_id = esc_attr($a['id']);

		return '<div id="' . $oxsn_foundation_panel_id . '" class="oxsn_panel ' . $oxsn_foundation_panel_class . '">' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_container class=""][/oxsn_container]
if ( ! function_exists ( 'oxsn_foundation_container_shortcode' ) ) {

	add_shortcode( 'oxsn_container', 'oxsn_foundation_container_shortcode' );
	function oxsn_foundation_container_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_container_class = esc_attr($a['class']);
		$oxsn_foundation_container_id = esc_attr($a['id']);

		return '<div id="' . $oxsn_foundation_container_id . '" class="oxsn_container ' . $oxsn_foundation_container_class . '">' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_row class=""][/oxsn_row]
if ( ! function_exists ( 'oxsn_foundation_row_shortcode' ) ) {

	add_shortcode( 'oxsn_row', 'oxsn_foundation_row_shortcode' );
	function oxsn_foundation_row_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'xs_gap_width' => '',
			'sm_gap_width' => '',
			'md_gap_width' => '',
			'lg_gap_width' => '',
			'xl_gap_width' => '',
		), $atts );

		$oxsn_foundation_row_class = esc_attr($a['class']);
		$oxsn_foundation_row_id = esc_attr($a['id']);
		
		$oxsn_foundation_row_xs_gap_width = esc_attr($a['xs_gap_width']);
		$oxsn_foundation_row_xs_gap_width = str_replace(' ', '', $oxsn_foundation_row_xs_gap_width);
		$oxsn_foundation_row_xs_gap_width = str_replace('.', '_', $oxsn_foundation_row_xs_gap_width);
		$oxsn_foundation_row_sm_gap_width = esc_attr($a['sm_gap_width']);
		$oxsn_foundation_row_sm_gap_width = str_replace(' ', '', $oxsn_foundation_row_sm_gap_width);
		$oxsn_foundation_row_sm_gap_width = str_replace('.', '_', $oxsn_foundation_row_sm_gap_width);
		$oxsn_foundation_row_md_gap_width = esc_attr($a['md_gap_width']);
		$oxsn_foundation_row_md_gap_width = str_replace(' ', '', $oxsn_foundation_row_md_gap_width);
		$oxsn_foundation_row_md_gap_width = str_replace('.', '_', $oxsn_foundation_row_md_gap_width);
		$oxsn_foundation_row_lg_gap_width = esc_attr($a['lg_gap_width']);
		$oxsn_foundation_row_lg_gap_width = str_replace(' ', '', $oxsn_foundation_row_lg_gap_width);
		$oxsn_foundation_row_lg_gap_width = str_replace('.', '_', $oxsn_foundation_row_lg_gap_width);
		$oxsn_foundation_row_xl_gap_width = esc_attr($a['xl_gap_width']);
		$oxsn_foundation_row_xl_gap_width = str_replace(' ', '', $oxsn_foundation_row_xl_gap_width);
		$oxsn_foundation_row_xl_gap_width = str_replace('.', '_', $oxsn_foundation_row_xl_gap_width);


		if (esc_attr($a['xs_gap_width'])) {
			$oxsn_foundation_row_gap_width_class .= 'oxsn_xs_gap_width_' . $oxsn_foundation_row_xs_gap_width . 'px ';
		}

		if (esc_attr($a['sm_gap_width'])) {
			$oxsn_foundation_row_gap_width_class .= 'oxsn_sm_gap_width_' . $oxsn_foundation_row_sm_gap_width . 'px ';
		}

		if (esc_attr($a['md_gap_width'])) {
			$oxsn_foundation_row_gap_width_class .= 'oxsn_md_gap_width_' . $oxsn_foundation_row_md_gap_width . 'px ';
		}

		if (esc_attr($a['lg_gap_width'])) {
			$oxsn_foundation_row_gap_width_class .= 'oxsn_lg_gap_width_' . $oxsn_foundation_row_lg_gap_width . 'px ';
		}

		if (esc_attr($a['xl_gap_width'])) {
			$oxsn_foundation_row_gap_width_class .= 'oxsn_xl_gap_width_' . $oxsn_foundation_row_xl_gap_width . 'px ';
		}

		return '<div id="' . $oxsn_foundation_row_id . '" class="oxsn_row ' . $oxsn_foundation_row_gap_width_class . ' ' . $oxsn_foundation_row_class . '">' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_column class=""][/oxsn_column]
if ( ! function_exists ( 'oxsn_foundation_column_shortcode' ) ) {

	add_shortcode( 'oxsn_column', 'oxsn_foundation_column_shortcode' );
	function oxsn_foundation_column_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'xs_width' => '',
			'sm_width' => '',
			'md_width' => '',
			'lg_width' => '',
			'xl_width' => '',
			'xs_offset_width' => '',
			'sm_offset_width' => '',
			'md_offset_width' => '',
			'lg_offset_width' => '',
			'xl_offset_width' => '',
		), $atts );

		$oxsn_foundation_column_class = esc_attr($a['class']);
		$oxsn_foundation_column_id = esc_attr($a['id']);

		$oxsn_foundation_column_xs_width = esc_attr($a['xs_width']);
		$oxsn_foundation_column_xs_width = str_replace(' ', '', $oxsn_foundation_column_xs_width);
		$oxsn_foundation_column_xs_width = str_replace('.', '_', $oxsn_foundation_column_xs_width);
		$oxsn_foundation_column_sm_width = esc_attr($a['sm_width']);
		$oxsn_foundation_column_sm_width = str_replace(' ', '', $oxsn_foundation_column_sm_width);
		$oxsn_foundation_column_sm_width = str_replace('.', '_', $oxsn_foundation_column_sm_width);
		$oxsn_foundation_column_md_width = esc_attr($a['md_width']);
		$oxsn_foundation_column_md_width = str_replace(' ', '', $oxsn_foundation_column_md_width);
		$oxsn_foundation_column_md_width = str_replace('.', '_', $oxsn_foundation_column_md_width);
		$oxsn_foundation_column_lg_width = esc_attr($a['lg_width']);
		$oxsn_foundation_column_lg_width = str_replace(' ', '', $oxsn_foundation_column_lg_width);
		$oxsn_foundation_column_lg_width = str_replace('.', '_', $oxsn_foundation_column_lg_width);
		$oxsn_foundation_column_xl_width = esc_attr($a['xl_width']);
		$oxsn_foundation_column_xl_width = str_replace(' ', '', $oxsn_foundation_column_xl_width);
		$oxsn_foundation_column_xl_width = str_replace('.', '_', $oxsn_foundation_column_xl_width);

		$oxsn_foundation_column_xs_offset_width = esc_attr($a['xs_offset_width']);
		$oxsn_foundation_column_xs_offset_width = str_replace(' ', '', $oxsn_foundation_column_xs_offset_width);
		$oxsn_foundation_column_xs_offset_width = str_replace('.', '_', $oxsn_foundation_column_xs_offset_width);
		$oxsn_foundation_column_sm_offset_width = esc_attr($a['sm_offset_width']);
		$oxsn_foundation_column_sm_offset_width = str_replace(' ', '', $oxsn_foundation_column_sm_offset_width);
		$oxsn_foundation_column_sm_offset_width = str_replace('.', '_', $oxsn_foundation_column_sm_offset_width);
		$oxsn_foundation_column_md_offset_width = esc_attr($a['md_offset_width']);
		$oxsn_foundation_column_md_offset_width = str_replace(' ', '', $oxsn_foundation_column_md_offset_width);
		$oxsn_foundation_column_md_offset_width = str_replace('.', '_', $oxsn_foundation_column_md_offset_width);
		$oxsn_foundation_column_lg_offset_width = esc_attr($a['lg_offset_width']);
		$oxsn_foundation_column_lg_offset_width = str_replace(' ', '', $oxsn_foundation_column_lg_offset_width);
		$oxsn_foundation_column_lg_offset_width = str_replace('.', '_', $oxsn_foundation_column_lg_offset_width);
		$oxsn_foundation_column_xl_offset_width = esc_attr($a['xl_offset_width']);
		$oxsn_foundation_column_xl_offset_width = str_replace(' ', '', $oxsn_foundation_column_xl_offset_width);
		$oxsn_foundation_column_xl_offset_width = str_replace('.', '_', $oxsn_foundation_column_xl_offset_width);

		if (esc_attr($a['xs_width'])) {
			$oxsn_foundation_column_width_class .= 'oxsn_xs_width_' . $oxsn_foundation_column_xs_width . 'pr ';
		}

		if (esc_attr($a['sm_width'])) {
			$oxsn_foundation_column_width_class .= 'oxsn_sm_width_' . $oxsn_foundation_column_sm_width . 'pr ';
		}

		if (esc_attr($a['md_width'])) {
			$oxsn_foundation_column_width_class .= 'oxsn_md_width_' . $oxsn_foundation_column_md_width . 'pr ';
		}

		if (esc_attr($a['lg_width'])) {
			$oxsn_foundation_column_width_class .= 'oxsn_lg_width_' . $oxsn_foundation_column_lg_width . 'pr ';
		}

		if (esc_attr($a['xl_width'])) {
			$oxsn_foundation_column_width_class .= 'oxsn_xl_width_' . $oxsn_foundation_column_xl_width . 'pr ';
		}

		if (esc_attr($a['xs_offset_width'])) {
			$oxsn_foundation_column_offset_width_class .= 'oxsn_xs_offset_width_' . $oxsn_foundation_column_xs_offset_width . 'pr ';
		}

		if (esc_attr($a['sm_offset_width'])) {
			$oxsn_foundation_column_offset_width_class .= 'oxsn_sm_offset_width_' . $oxsn_foundation_column_sm_offset_width . 'pr ';
		}

		if (esc_attr($a['md_offset_width'])) {
			$oxsn_foundation_column_offset_width_class .= 'oxsn_md_offset_width_' . $oxsn_foundation_column_md_offset_width . 'pr ';
		}

		if (esc_attr($a['lg_offset_width'])) {
			$oxsn_foundation_column_offset_width_class .= 'oxsn_lg_offset_width_' . $oxsn_foundation_column_lg_offset_width . 'pr ';
		}

		if (esc_attr($a['xl_offset_width'])) {
			$oxsn_foundation_column_offset_width_class .= 'oxsn_xl_offset_width_' . $oxsn_foundation_column_xl_offset_width . 'pr ';
		}

		return '<div id="' . $oxsn_foundation_column_id . '" class="oxsn_column oxsn_width_100pr ' . $oxsn_foundation_column_offset_width_class . ' ' . $oxsn_foundation_column_width_class . ' ' . $oxsn_foundation_column_class . '">' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_logged_in_users user_roles=""][/oxsn_logged_in_users]
if ( ! function_exists ( 'oxsn_foundation_logged_in_users_shortcode' ) ) {

	add_shortcode('oxsn_logged_in_users', 'oxsn_foundation_logged_in_users_shortcode');
	function oxsn_foundation_logged_in_users_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'user_roles' => '',
		), $atts );

		$get_user_id = get_current_user_id();
        $get_user_data = get_userdata($get_user_id);
        $get_roles = implode($get_user_data->roles);
		$oxsn_foundation_logged_in_users_user_roles = esc_attr($a['user_roles']);
		$oxsn_foundation_logged_in_users_user_roles = strtolower($oxsn_foundation_logged_in_users_user_roles);

		if (is_user_logged_in()) :
			if ( $oxsn_foundation_logged_in_users_user_roles != '' ) :
				if ( $oxsn_foundation_logged_in_users_user_roles == $get_roles ) :
					$oxsn_foundation_return = do_shortcode($content);
				else :
					$oxsn_foundation_return = '';
				endif;
			else :
				$oxsn_foundation_return = do_shortcode($content);
			endif;
		else :
			$oxsn_foundation_return = '';
		endif;

		return $oxsn_foundation_return;

	}

}

//[oxsn_logged_out_users][/oxsn_logged_out_users]
if ( ! function_exists ( 'oxsn_foundation_logged_out_users_shortcode' ) ) {

	add_shortcode('oxsn_foundation_logged_out_users', 'oxsn_foundation_logged_out_users_shortcode');
	function oxsn_foundation_logged_out_users_shortcode( $atts, $content = null ) {

		if (!is_user_logged_in()) :
			$oxsn_foundation_return = do_shortcode($content);
		else :
			$oxsn_foundation_return = '';
		endif;

		return $oxsn_foundation_return;

	}

}

//[oxsn_navigation menu=""]
if ( ! function_exists ( 'oxsn_foundation_navigation_shortcode' ) ) {

	add_shortcode('oxsn_navigation', 'oxsn_foundation_navigation_shortcode');
	function oxsn_foundation_navigation_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'menu' => '',
			'menu_class' => '',
			'menu_id' => '',
			'container' => 'nav',
			'container_class' => '',
			'container_id' => '',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => '',
			'walker' => '',
			'theme_location' => '',
		), $atts );

		$oxsn_foundation_menu = esc_attr($a['menu']);
		$oxsn_foundation_menu_class = esc_attr($a['menu_class']);
		$oxsn_foundation_menu_id = esc_attr($a['menu_id']);
		$oxsn_foundation_container = esc_attr($a['container']);
		$oxsn_foundation_container_class = esc_attr($a['container_class']);
		$oxsn_foundation_container_id = esc_attr($a['container_id']);
		$oxsn_foundation_before = esc_attr($a['before']);
		$oxsn_foundation_after = esc_attr($a['after']);
		$oxsn_foundation_link_before = esc_attr($a['link_before']);
		$oxsn_foundation_link_after = esc_attr($a['link_after']);
		$oxsn_foundation_depth = esc_attr($a['depth']);
		$oxsn_foundation_walker = esc_attr($a['walker']);
		$oxsn_foundation_theme_location = esc_attr($a['theme_location']);

		return wp_nav_menu( 
			array( 
				'menu' => $oxsn_foundation_menu,
				'menu_class' => $oxsn_foundation_menu_class,
				'menu_id' => $oxsn_foundation_menu_id,
				'container' => $oxsn_foundation_container,
				'container_id' => $oxsn_foundation_container_id,
				'container_class' => $oxsn_foundation_container_class,
				'fallback_cb' => false,
				'before' => $oxsn_foundation_before,
				'after' => $oxsn_foundation_after,
				'link_before' => $oxsn_foundation_link_before,
				'link_after' => $oxsn_foundation_link_after,
				'echo' => false,
				'depth' => $oxsn_foundation_depth,
				'walker' => $oxsn_foundation_walker,
				'theme_location' => $oxsn_foundation_theme_location,
			) 
		);

	}

}

//[oxsn_breadcrumbs class=""]
if ( ! function_exists ( 'oxsn_foundation_breadcrumbs_shortcode' ) ) {

	add_shortcode('oxsn_breadcrumbs', 'oxsn_foundation_breadcrumbs_shortcode');
	function oxsn_foundation_breadcrumbs_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_foundation_breadcrumbs_class = esc_attr($a['class']);
		$oxsn_foundation_breadcrumbs_id = esc_attr($a['id']);

		$oxsn_foundation_return = '<div id="' . $oxsn_foundation_breadcrumbs_id . '" class="oxsn_breadcrumbs ' . $oxsn_foundation_breadcrumbs_class . '">';
			$oxsn_foundation_return .= '<ul>';

				if (!is_front_page()) : 

					$oxsn_foundation_return .= '<li><a href="' . get_home_url() . '">Home</a></li>';

					if (is_home()) :

						$blog_title = get_the_title( get_option('page_for_posts', true) );

						$oxsn_foundation_return .= '<li>' . $blog_title . '</li>';

					endif;

					if (is_singular('post')) :

						$blog_title = get_the_title( get_option('page_for_posts', true) );

						$oxsn_foundation_return .= '<li><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a></li>';

					endif;

					if (is_post_type_archive()) : 

						$post_type = get_post_type();
						$post_type_object = get_post_type_object($post_type);
						$post_type_name = $post_type_object->labels->singular_name;

						$oxsn_foundation_return .= '<li>' . $post_type_name . '</li>';

					endif;

					if (!is_singular('post') && !is_page()) :

						if (is_singular()) : 

							$post_type = get_post_type();
							$post_type_object = get_post_type_object($post_type);
							$post_type_name = $post_type_object->labels->singular_name;

							$oxsn_foundation_return .= '<li><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_name . '</a></li>';

						endif;

					endif;

					global $post;
					if ( $post->post_parent ) {

						$ancestors = get_post_ancestors( $post->ID );
						
						foreach( array_reverse($ancestors) as $ancestor ) {
							$ancestor_id = get_page( $ancestor )->ID;
							$oxsn_foundation_return .= '<li><a href="' . get_permalink($ancestor_id) . '">' . get_page( $ancestor )->post_title . '</a></li>';
						}

					}

					if (is_singular()) :

						$oxsn_foundation_return .= '<li>' . get_the_title() . '</li>';

					endif;

					if(is_archive() && !is_post_type_archive()) :

						$oxsn_foundation_return .= '<li>' . get_the_archive_title() . '</li>';

					endif;

					if (is_search()) :

						$oxsn_foundation_return .= '<li>Search</li>';
						$oxsn_foundation_return .= '<li>' . get_search_query() . '</li>';

					endif;

					if (is_author()) :

						$oxsn_foundation_return .= '<li>User</li>';
						$oxsn_foundation_return .= '<li>' . get_the_author() . '</li>';

					endif;

					if (is_404()) :

						$oxsn_foundation_return .= '<li>404</li>';

					endif;

				endif;

			$oxsn_foundation_return .= '</ul>';
		$oxsn_foundation_return .= '</div>';

		return $oxsn_foundation_return;

	}

}

//[oxsn_list_pages post_type="page" class=""]
if ( ! function_exists ( 'oxsn_foundation_list_pages_shortcode' ) ) {

	add_shortcode('oxsn_list_pages', 'oxsn_foundation_list_pages_shortcode');
	function oxsn_foundation_list_pages_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'child_of' => '',
			'authors' => '',
			'date_format' => '',
			'depth' => '',
			'echo' => '0',
			'exclude' => '',
			'include' => '',
			'link_after' => '',
			'link_before' => '',
			'post_type' => 'page',
			'post_status' => '',
			'show_date' => '',
			'sort_column' => 'menu_order',
			'title_li' => '',
			'walker' => '',
			'exclude_tree' => '',
		), $atts );

		$oxsn_foundation_list_pages_class = esc_attr($a['class']);
		$oxsn_foundation_list_pages_id = esc_attr($a['id']);

		$args = array();

		$oxsn_foundation_list_pages_child_of = esc_attr($a['child_of']);
		if ($oxsn_foundation_list_pages_child_of != '') :

			$args['child_of'] = $oxsn_foundation_list_pages_child_of;

		endif;

		$oxsn_foundation_list_pages_authors = esc_attr($a['authors']);
		if ($oxsn_foundation_list_pages_authors != '') :

			$args['authors'] = $oxsn_foundation_list_pages_authors;

		endif;
		
		$oxsn_foundation_list_pages_date_format = esc_attr($a['date_format']);
		if ($oxsn_foundation_list_pages_date_format != '') :

			$args['date_format'] = $oxsn_foundation_list_pages_date_format;

		endif;
		
		$oxsn_foundation_list_pages_depth = esc_attr($a['depth']);
		if ($oxsn_foundation_list_pages_depth != '') :

			$args['depth'] = $oxsn_foundation_list_pages_depth;

		endif;
		
		$oxsn_foundation_list_pages_echo = esc_attr($a['echo']);
		if ($oxsn_foundation_list_pages_echo != '') :

			$args['echo'] = $oxsn_foundation_list_pages_echo;

		endif;
		
		$oxsn_foundation_list_pages_exclude = esc_attr($a['exclude']);
		if ($oxsn_foundation_list_pages_exclude != '') :

			$args['exclude'] = $oxsn_foundation_list_pages_exclude;

		endif;
		
		$oxsn_foundation_list_pages_include = esc_attr($a['include']);
		if ($oxsn_foundation_list_pages_include != '') :

			$args['include'] = $oxsn_foundation_list_pages_include;

		endif;
		
		$oxsn_foundation_list_pages_link_after = esc_attr($a['link_after']);
		if ($oxsn_foundation_list_pages_link_after != '') :

			$args['link_after'] = $oxsn_foundation_list_pages_link_after;

		endif;
		
		$oxsn_foundation_list_pages_link_before = esc_attr($a['link_before']);
		if ($oxsn_foundation_list_pages_link_before != '') :

			$args['link_before'] = $oxsn_foundation_list_pages_link_before;

		endif;
		
		$oxsn_foundation_list_pages_post_type = esc_attr($a['post_type']);
		if ($oxsn_foundation_list_pages_post_type != '') :

			$args['post_type'] = $oxsn_foundation_list_pages_post_type;

		endif;
		
		$oxsn_foundation_list_pages_post_status = esc_attr($a['post_status']);
		if ($oxsn_foundation_list_pages_post_status != '') :

			$args['post_status'] = $oxsn_foundation_list_pages_post_status;

		endif;
		
		$oxsn_foundation_list_pages_show_date = esc_attr($a['show_date']);
		if ($oxsn_foundation_list_pages_show_date != '') :

			$args['show_date'] = $oxsn_foundation_list_pages_show_date;

		endif;
		
		$oxsn_foundation_list_pages_sort_column = esc_attr($a['sort_column']);
		if ($oxsn_foundation_list_pages_sort_column != '') :

			$args['sort_column'] = $oxsn_foundation_list_pages_sort_column;

		endif;
		
		$oxsn_foundation_list_pages_title_li = esc_attr($a['title_li']);
		if ($oxsn_foundation_list_pages_title_li != '') :

			$args['title_li'] = $oxsn_foundation_list_pages_title_li;

		endif;
		
		$oxsn_foundation_list_pages_walker = esc_attr($a['walker']);
		if ($oxsn_foundation_list_pages_walker != '') :

			$args['walker'] = $oxsn_foundation_list_pages_walker;

		endif;
		
		$oxsn_foundation_list_pages_exclude_tree = esc_attr($a['exclude_tree']);
		if ($oxsn_foundation_list_pages_exclude_tree != '') :

			$args['exclude_tree'] = $oxsn_foundation_list_pages_exclude_tree;

		endif;

		$oxsn_foundation_return=
		'<ul id="' . $oxsn_foundation_list_pages_id . '" class="oxsn_list_pages ' . $oxsn_foundation_list_pages_class . '">'.
			wp_list_pages( $args ) .
		'</ul>';

		return $oxsn_foundation_return;

	}

}

//[oxsn_wp_query post_type="any" posts_per_page="-1" pagination="true"]
if ( ! function_exists ( 'oxsn_wp_query_shortcode' ) ) {

	add_shortcode('oxsn_wp_query', 'oxsn_wp_query_shortcode');
	function oxsn_wp_query_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(

			'author' => '',
			'author_name' => '',
			'author__in' => '',
			'author__not_in' => '',

			'cat' => '',
			'category_name' => '',
			'category__and' => '',
			'category__in' => '',
			'category__not_in' => '',

			'tag' => '',
			'tag_id' => '',
			'tag__and' => '',
			'tag__in' => '',
			'tag__not_in' => '',
			'tag_slug__and' => '',
			'tag_slug__in' => '',

			'tax_query_relation' => '',
			'tax_query_one_taxonomy' => '',
			'tax_query_one_field' => '',
			'tax_query_one_terms' => '',
			'tax_query_one_include_children' => '',
			'tax_query_one_operator' => '',
			'tax_query_two_taxonomy' => '',
			'tax_query_two_field' => '',
			'tax_query_two_terms' => '',
			'tax_query_two_include_children' => '',
			'tax_query_two_operator' => '',

			'p' => '',
			'name' => '',
			'page_id' => '',
			'pagename' => '',
			'post_parent' => '',
			'post_parent__in' => '',
			'post_parent__not_in' => '',
			'post__in' => '',
			'post__not_in' => '',
			'has_password' => '',

			'post_password' => '',
			'post_type' => 'any',

			'post_status' => '',

			'posts_per_page' => '-1',

			'posts_per_archive_page' => '',

			'pagination' => '',

			'offset' => '',

			'order' => '',
			'orderby' => '',

			'year' => '',
			'monthnum' => '',
			'w' => '',
			'day' => '',
			'hour' => '',
			'minute' => '',
			'second' => '',
			'm' => '',

			'date_query_year' => '',
			'date_query_month' => '',
			'date_query_week' => '',
			'date_query_day' => '',
			'date_query_hour' => '',
			'date_query_minute' => '',
			'date_query_second' => '',
			'date_query_after' => '',
			'date_query_after_year' => '',
			'date_query_after_month' => '',
			'date_query_after_day' => '',
			'date_query_before' => '',
			'date_query_before_year' => '',
			'date_query_before_month' => '',
			'date_query_before_day' => '',
			'date_query_inclusive' => '',
			'date_query_compare' => '',
			'date_query_column' => '',
			'date_query_relation' => '',

			'meta_key' => '',
			'meta_value' => '',
			'meta_value_num' => '',
			'meta_compare' => '',

			'meta_query_relation' => '',
			'meta_query_one_key' => '',
			'meta_query_one_value' => '',
			'meta_query_one_type' => '',
			'meta_query_one_compare' => '',
			'meta_query_two_key' => '',
			'meta_query_two_value' => '',
			'meta_query_two_type' => '',
			'meta_query_two_compare' => '',

			'perm' => '',

			's' => '',
		), $atts );
		
		$oxsn_wp_query_class = esc_attr($a['class']);

		$args = array();

		$oxsn_wp_query_author = esc_attr($a['author']);
		if ($oxsn_wp_query_author != '') :

			$args['author'] = $oxsn_wp_query_author;

		endif;
		$oxsn_wp_query_author_name = esc_attr($a['author_name']);
		if ($oxsn_wp_query_author_name != '') :

			$args['author_name'] = $oxsn_wp_query_author_name;

		endif;
		$oxsn_wp_query_author__in = esc_attr($a['author__in']);
		if ($oxsn_wp_query_author__in != '') :

			$oxsn_wp_query_author__in = explode(',', $oxsn_wp_query_author__in);
			$args['author__in'] = $oxsn_wp_query_author__in;

		endif;
		$oxsn_wp_query_author__not_in = esc_attr($a['author__not_in']);
		if ($oxsn_wp_query_author__not_in != '') :

			$oxsn_wp_query_author__not_in = explode(',', $oxsn_wp_query_author__not_in);
			$args['author__not_in'] = $oxsn_wp_query_author__not_in;

		endif;

		$oxsn_wp_query_cat = esc_attr($a['cat']);
		if ($oxsn_wp_query_cat != '') :

			$args['cat'] = $oxsn_wp_query_cat;

		endif;
		$oxsn_wp_query_category_name = esc_attr($a['category_name']);
		if ($oxsn_wp_query_category_name != '') :

			$args['category_name'] = $oxsn_wp_query_category_name;

		endif;
		$oxsn_wp_query_category__and = esc_attr($a['category__and']);
		if ($oxsn_wp_query_category__and != '') :

			$oxsn_wp_query_category__and = explode(',', $oxsn_wp_query_category__and);
			$args['category__and'] = $oxsn_wp_query_category__and;

		endif;
		$oxsn_wp_query_category__in = esc_attr($a['category__in']);
		if ($oxsn_wp_query_category__in != '') :

			$oxsn_wp_query_category__in = explode(',', $oxsn_wp_query_category__in);
			$args['category__in'] = $oxsn_wp_query_category__in;

		endif;
		$oxsn_wp_query_category__not_in = esc_attr($a['category__not_in']);
		if ($oxsn_wp_query_category__not_in != '') :

			$oxsn_wp_query_category__not_in = explode(',', $oxsn_wp_query_category__not_in);
			$args['category__not_in'] = $oxsn_wp_query_category__not_in;

		endif;

		$oxsn_wp_query_tag = esc_attr($a['tag']);
		if ($oxsn_wp_query_tag != '') :

			$args['tag'] = $oxsn_wp_query_tag;

		endif;
		$oxsn_wp_query_tag_id = esc_attr($a['tag_id']);
		if ($oxsn_wp_query_tag_id != '') :

			$args['tag_id'] = $oxsn_wp_query_tag_id;

		endif;
		$oxsn_wp_query_tag__and = esc_attr($a['tag__and']);
		if ($oxsn_wp_query_tag__and != '') :

			$oxsn_wp_query_tag__and = explode(',', $oxsn_wp_query_tag__and);
			$args['tag__and'] = $oxsn_wp_query_tag__and;

		endif;
		$oxsn_wp_query_tag__in = esc_attr($a['tag__in']);
		if ($oxsn_wp_query_tag__in != '') :

			$oxsn_wp_query_tag__in = explode(',', $oxsn_wp_query_tag__in);
			$args['tag__in'] = $oxsn_wp_query_tag__in;

		endif;
		$oxsn_wp_query_tag__not_in = esc_attr($a['tag__not_in']);
		if ($oxsn_wp_query_tag__not_in != '') :

			$oxsn_wp_query_tag__not_in = explode(',', $oxsn_wp_query_tag__not_in);
			$args['tag__not_in'] = $oxsn_wp_query_tag__not_in;

		endif;
		$oxsn_wp_query_tag_slug__and = esc_attr($a['tag_slug__and']);
		if ($oxsn_wp_query_tag_slug__and != '') :

			$oxsn_wp_query_tag_slug__and = explode(',', $oxsn_wp_query_tag_slug__and);
			$args['tag_slug__and'] = $oxsn_wp_query_tag_slug__and;

		endif;
		$oxsn_wp_query_tag_slug__in = esc_attr($a['tag_slug__in']);
		if ($oxsn_wp_query_tag_slug__in != '') :

			$oxsn_wp_query_tag_slug__in = explode(',', $oxsn_wp_query_tag_slug__in);
			$args['tag_slug__in'] = $oxsn_wp_query_tag_slug__in;

		endif;

		$oxsn_wp_query_tax_query = array();
		$oxsn_wp_query_tax_query_array_one = array();
		$oxsn_wp_query_tax_query_array_two = array();
		$oxsn_wp_query_tax_query_relation = esc_attr($a['tax_query_relation']);
		$oxsn_wp_query_tax_query_one_taxonomy = esc_attr($a['tax_query_one_taxonomy']);
		$oxsn_wp_query_tax_query_one_field = esc_attr($a['tax_query_one_field']);
		$oxsn_wp_query_tax_query_one_terms = esc_attr($a['tax_query_one_terms']);
		$oxsn_wp_query_tax_query_one_include_children = esc_attr($a['tax_query_one_include_children']);
		$oxsn_wp_query_tax_query_one_operator = esc_attr($a['tax_query_one_operator']);
		$oxsn_wp_query_tax_query_two_taxonomy = esc_attr($a['tax_query_two_taxonomy']);
		$oxsn_wp_query_tax_query_two_field = esc_attr($a['tax_query_two_field']);
		$oxsn_wp_query_tax_query_two_terms = esc_attr($a['tax_query_two_terms']);
		$oxsn_wp_query_tax_query_two_include_children = esc_attr($a['tax_query_two_include_children']);
		$oxsn_wp_query_tax_query_two_operator = esc_attr($a['tax_query_two_operator']);
		if ($oxsn_wp_query_tax_query_relation != '') :

			$oxsn_wp_query_tax_query['relation'] = $oxsn_wp_query_tax_query_relation;

		endif;
		if ($oxsn_wp_query_tax_query_one_taxonomy != '') :

			$oxsn_wp_query_tax_query_array_one['taxonomy'] = $oxsn_wp_query_tax_query_one_taxonomy;

		endif;
		if ($oxsn_wp_query_tax_query_one_field != '') :

			$oxsn_wp_query_tax_query_array_one['field'] = $oxsn_wp_query_tax_query_one_field;

		endif;
		if ($oxsn_wp_query_tax_query_one_terms != '') :

			$oxsn_wp_query_tax_query_one_terms = explode(',', $oxsn_wp_query_tax_query_one_terms);
			$oxsn_wp_query_tax_query_array_one['terms'] = $oxsn_wp_query_tax_query_one_terms;

		endif;
		if ($oxsn_wp_query_tax_query_one_include_children != '') :

			$oxsn_wp_query_tax_query_array_one['include_children'] = $oxsn_wp_query_tax_query_one_include_children;

		endif;
		if ($oxsn_wp_query_tax_query_one_operator != '') :

			$oxsn_wp_query_tax_query_array_one['operator'] = $oxsn_wp_query_tax_query_one_operator;

		endif;
		if ($oxsn_wp_query_tax_query_two_taxonomy != '') :

			$oxsn_wp_query_tax_query_array_two['taxonomy'] = $oxsn_wp_query_tax_query_two_taxonomy;

		endif;
		if ($oxsn_wp_query_tax_query_two_field != '') :

			$oxsn_wp_query_tax_query_array_two['field'] = $oxsn_wp_query_tax_query_two_field;

		endif;
		if ($oxsn_wp_query_tax_query_two_terms != '') :

			$oxsn_wp_query_tax_query_two_terms = explode(',', $oxsn_wp_query_tax_query_two_terms);
			$oxsn_wp_query_tax_query_array_two['terms'] = $oxsn_wp_query_tax_query_two_terms;

		endif;
		if ($oxsn_wp_query_tax_query_two_include_children != '') :

			$oxsn_wp_query_tax_query_array_two['include_children'] = $oxsn_wp_query_tax_query_two_include_children;

		endif;
		if ($oxsn_wp_query_tax_query_two_operator != '') :

			$oxsn_wp_query_tax_query_array_two['operator'] = $oxsn_wp_query_tax_query_two_operator;

		endif;
		if ($oxsn_wp_query_tax_query_one_taxonomy != '' && $oxsn_wp_query_tax_query_two_taxonomy != '') :

			array_push($oxsn_wp_query_tax_query, $oxsn_wp_query_tax_query_array_one, $oxsn_wp_query_tax_query_array_two);
			$args['tax_query'] = $oxsn_wp_query_tax_query;

		elseif ($oxsn_wp_query_tax_query_one_taxonomy != '') :

			array_push($oxsn_wp_query_tax_query, $oxsn_wp_query_tax_query_array_one);
			$args['tax_query'] = $oxsn_wp_query_tax_query;

		elseif ($oxsn_wp_query_tax_query_two_taxonomy != '') :

			array_push($oxsn_wp_query_tax_query, $oxsn_wp_query_tax_query_array_two);
			$args['tax_query'] = $oxsn_wp_query_tax_query;

		endif;

		$oxsn_wp_query_p = esc_attr($a['p']);
		if ($oxsn_wp_query_p != '') :

			$args['p'] = $oxsn_wp_query_p;

		endif;
		$oxsn_wp_query_name = esc_attr($a['name']);
		if ($oxsn_wp_query_name != '') :

			$args['name'] = $oxsn_wp_query_name;

		endif;
		$oxsn_wp_query_page_id = esc_attr($a['page_id']);
		if ($oxsn_wp_query_page_id != '') :

			$args['page_id'] = $oxsn_wp_query_page_id;

		endif;
		$oxsn_wp_query_pagename = esc_attr($a['pagename']);
		if ($oxsn_wp_query_pagename != '') :

			$args['pagename'] = $oxsn_wp_query_pagename;

		endif;
		$oxsn_wp_query_post_parent = esc_attr($a['post_parent']);
		if ($oxsn_wp_query_post_parent != '') :

			$args['post_parent'] = $oxsn_wp_query_post_parent;

		endif;
		$oxsn_wp_query_post_parent__in = esc_attr($a['post_parent__in']);
		if ($oxsn_wp_query_post_parent__in != '') :

			$oxsn_wp_query_post_parent__in = explode(',', $oxsn_wp_query_post_parent__in);
			$args['post_parent__in'] = $oxsn_wp_query_post_parent__in;

		endif;
		$oxsn_wp_query_post_parent__not_in = esc_attr($a['post_parent__not_in']);
		if ($oxsn_wp_query_post_parent__not_in != '') :

			$oxsn_wp_query_post_parent__not_in = explode(',', $oxsn_wp_query_post_parent__not_in);
			$args['post_parent__not_in'] = $oxsn_wp_query_post_parent__not_in;

		endif;
		$oxsn_wp_query_post__in = esc_attr($a['post__in']);
		if ($oxsn_wp_query_post__in != '') :

			$oxsn_wp_query_post__in = explode(',', $oxsn_wp_query_post__in);
			$args['post__in'] = $oxsn_wp_query_post__in;

		endif;
		$oxsn_wp_query_post__not_in = esc_attr($a['post__not_in']);
		if ($oxsn_wp_query_post__not_in != '') :

			$oxsn_wp_query_post__not_in = explode(',', $oxsn_wp_query_post__not_in);
			$args['post__not_in'] = $oxsn_wp_query_post__not_in;

		endif;

		$oxsn_wp_query_has_password = esc_attr($a['has_password']);
		if ($oxsn_wp_query_has_password != '') :

			$args['has_password'] = $oxsn_wp_query_has_password;

		endif;
		$oxsn_wp_query_post_password = esc_attr($a['post_password']);
		if ($oxsn_wp_query_post_password != '') :

			$args['post_password'] = $oxsn_wp_query_post_password;

		endif;

		$oxsn_wp_query_post_type = esc_attr($a['post_type']);
		if ($oxsn_wp_query_post_type != '') :

			$oxsn_wp_query_post_type = explode(',', $oxsn_wp_query_post_type);
			$args['post_type'] = $oxsn_wp_query_post_type;

		endif;

		$oxsn_wp_query_post_status = esc_attr($a['post_status']);
		if ($oxsn_wp_query_post_status != '') :

			$oxsn_wp_query_post_status = explode(',', $oxsn_wp_query_post_status);
			$args['post_status'] = $oxsn_wp_query_post_status;

		endif;

		$oxsn_wp_query_posts_per_page = esc_attr($a['posts_per_page']);
		if ($oxsn_wp_query_posts_per_page != '') :

			$args['posts_per_page'] = $oxsn_wp_query_posts_per_page;

		endif;

		$oxsn_wp_query_posts_per_archive_page = esc_attr($a['posts_per_archive_page']);
		if ($oxsn_wp_query_posts_per_archive_page != '') :

			$args['posts_per_archive_page'] = $oxsn_wp_query_posts_per_archive_page;

		endif;

		$oxsn_wp_query_pagination = esc_attr($a['pagination']);
		if ($oxsn_wp_query_pagination == 'true') :

			$args['paged'] = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		endif;

		$oxsn_wp_query_offset = esc_attr($a['offset']);
		if ($oxsn_wp_query_offset != '') :

			$args['offset'] = $oxsn_wp_query_offset;

		endif;

		$oxsn_wp_query_order = esc_attr($a['order']);
		if ($oxsn_wp_query_order != '') :

			$args['order'] = $oxsn_wp_query_order;

		endif;
		$oxsn_wp_query_orderby = esc_attr($a['orderby']);
		if ($oxsn_wp_query_orderby != '') :

			$args['orderby'] = $oxsn_wp_query_orderby;

		endif;

		$oxsn_wp_query_year = esc_attr($a['year']);
		if ($oxsn_wp_query_year != '') :

			$args['year'] = $oxsn_wp_query_year;

		endif;
		$oxsn_wp_query_monthnum = esc_attr($a['monthnum']);
		if ($oxsn_wp_query_monthnum != '') :

			$args['monthnum'] = $oxsn_wp_query_monthnum;

		endif;
		$oxsn_wp_query_w = esc_attr($a['w']);
		if ($oxsn_wp_query_w != '') :

			$args['w'] = $oxsn_wp_query_w;

		endif;
		$oxsn_wp_query_day = esc_attr($a['day']);
		if ($oxsn_wp_query_day != '') :

			$args['day'] = $oxsn_wp_query_day;

		endif;
		$oxsn_wp_query_hour = esc_attr($a['hour']);
		if ($oxsn_wp_query_hour != '') :

			$args['hour'] = $oxsn_wp_query_hour;

		endif;
		$oxsn_wp_query_minute = esc_attr($a['minute']);
		if ($oxsn_wp_query_minute != '') :

			$args['minute'] = $oxsn_wp_query_minute;

		endif;
		$oxsn_wp_query_second = esc_attr($a['second']);
		if ($oxsn_wp_query_second != '') :

			$args['second'] = $oxsn_wp_query_second;

		endif;
		$oxsn_wp_query_m = esc_attr($a['m']);
		if ($oxsn_wp_query_m != '') :

			$args['m'] = $oxsn_wp_query_m;

		endif;

		$oxsn_wp_query_date_query = array();
		$oxsn_wp_query_date_query_array_after = array();
		$oxsn_wp_query_date_query_array_before = array();
		$oxsn_wp_query_date_query_year = esc_attr($a['date_query_year']);
		$oxsn_wp_query_date_query_month = esc_attr($a['date_query_month']);
		$oxsn_wp_query_date_query_week = esc_attr($a['date_query_week']);
		$oxsn_wp_query_date_query_day = esc_attr($a['date_query_day']);
		$oxsn_wp_query_date_query_hour = esc_attr($a['date_query_hour']);
		$oxsn_wp_query_date_query_minute = esc_attr($a['date_query_minute']);
		$oxsn_wp_query_date_query_second = esc_attr($a['date_query_second']);
		$oxsn_wp_query_date_query_after_year = esc_attr($a['date_query_after_year']);
		$oxsn_wp_query_date_query_after_month = esc_attr($a['date_query_after_month']);
		$oxsn_wp_query_date_query_after_day = esc_attr($a['date_query_after_day']);
		$oxsn_wp_query_date_query_before_year = esc_attr($a['date_query_before_year']);
		$oxsn_wp_query_date_query_before_month = esc_attr($a['date_query_before_month']);
		$oxsn_wp_query_date_query_before_day = esc_attr($a['date_query_before_day']);
		$oxsn_wp_query_date_query_inclusive = esc_attr($a['date_query_inclusive']);
		$oxsn_wp_query_date_query_compare = esc_attr($a['date_query_compare']);
		$oxsn_wp_query_date_query_column = esc_attr($a['date_query_column']);
		$oxsn_wp_query_date_query_relation = esc_attr($a['date_query_relation']);
		if ($oxsn_wp_query_date_query_year != '') :

			$oxsn_wp_query_date_query['year'] = $oxsn_wp_query_date_query_year;

		endif;
		if ($oxsn_wp_query_date_query_month != '') :

			$oxsn_wp_query_date_query['month'] = $oxsn_wp_query_date_query_month;

		endif;
		if ($oxsn_wp_query_date_query_week != '') :

			$oxsn_wp_query_date_query['week'] = $oxsn_wp_query_date_query_week;

		endif;
		if ($oxsn_wp_query_date_query_day != '') :

			$oxsn_wp_query_date_query['day'] = $oxsn_wp_query_date_query_day;

		endif;
		if ($oxsn_wp_query_date_query_hour != '') :

			$oxsn_wp_query_date_query['hour'] = $oxsn_wp_query_date_query_hour;

		endif;
		if ($oxsn_wp_query_date_query_minute != '') :

			$oxsn_wp_query_date_query['minute'] = $oxsn_wp_query_date_query_minute;

		endif;
		if ($oxsn_wp_query_date_query_second != '') :

			$oxsn_wp_query_date_query['second'] = $oxsn_wp_query_date_query_second;

		endif;
		if ($oxsn_wp_query_date_query_after_year != '') :

			$oxsn_wp_query_date_query_array_after['year'] = $oxsn_wp_query_date_query_after_year;

		endif;
		if ($oxsn_wp_query_date_query_after_month != '') :

			$oxsn_wp_query_date_query_array_after['month'] = $oxsn_wp_query_date_query_after_month;

		endif;
		if ($oxsn_wp_query_date_query_after_day != '') :

			$oxsn_wp_query_date_query_array_after['day'] = $oxsn_wp_query_date_query_after_day;

		endif;
		if ($oxsn_wp_query_date_query_before_year != '') :

			$oxsn_wp_query_date_query_array_before['year'] = $oxsn_wp_query_date_query_before_year;

		endif;
		if ($oxsn_wp_query_date_query_before_month != '') :

			$oxsn_wp_query_date_query_array_before['month'] = $oxsn_wp_query_date_query_before_month;

		endif;
		if ($oxsn_wp_query_date_query_before_day != '') :

			$oxsn_wp_query_date_query_array_before['day'] = $oxsn_wp_query_date_query_before_day;

		endif;

		if ($oxsn_wp_query_date_query_inclusive != '') :

			$oxsn_wp_query_date_query['inclusive'] = $oxsn_wp_query_date_query_inclusive;

		endif;
		if ($oxsn_wp_query_date_query_compare != '') :

			$oxsn_wp_query_date_query['compare'] = $oxsn_wp_query_date_query_compare;

		endif;
		if ($oxsn_wp_query_date_query_column != '') :

			$oxsn_wp_query_date_query['column'] = $oxsn_wp_query_date_query_column;

		endif;
		if ($oxsn_wp_query_date_query_relation != '') :

			$oxsn_wp_query_date_query['relation'] = $oxsn_wp_query_date_query_relation;

		endif;
		if (!empty($oxsn_wp_query_date_query_array_after) && !empty($oxsn_wp_query_date_query_array_before)) :

			$oxsn_wp_query_date_query['after'] = $oxsn_wp_query_date_query_array_after;
			$oxsn_wp_query_date_query['before'] = $oxsn_wp_query_date_query_array_before;
			$args['date_query'] = array($oxsn_wp_query_date_query);

		elseif (!empty($oxsn_wp_query_date_query_array_after)) :

			$oxsn_wp_query_date_query['after'] = $oxsn_wp_query_date_query_array_after;
			$args['date_query'] = array($oxsn_wp_query_date_query);

		elseif (!empty($oxsn_wp_query_date_query_array_before)) :

			$oxsn_wp_query_date_query['before'] = $oxsn_wp_query_date_query_array_before;
			$args['date_query'] = array($oxsn_wp_query_date_query);

		elseif (!empty($oxsn_wp_query_date_query)) :

			$args['date_query'] = array($oxsn_wp_query_date_query);

		endif;

		$oxsn_wp_query_meta_key = esc_attr($a['meta_key']);
		if ($oxsn_wp_query_meta_key != '') :

			$args['meta_key'] = $oxsn_wp_query_meta_key;

		endif;
		$oxsn_wp_query_meta_value = esc_attr($a['meta_value']);
		if ($oxsn_wp_query_meta_value != '') :

			$args['meta_value'] = $oxsn_wp_query_meta_value;

		endif;
		$oxsn_wp_query_meta_value_num = esc_attr($a['meta_value_num']);
		if ($oxsn_wp_query_meta_value_num != '') :

			$args['meta_value_num'] = $oxsn_wp_query_meta_value_num;

		endif;
		$oxsn_wp_query_meta_compare = esc_attr($a['meta_compare']);
		if ($oxsn_wp_query_meta_compare != '') :

			$args['meta_compare'] = $oxsn_wp_query_meta_compare;

		endif;

		$oxsn_wp_query_meta_query = array();
		$oxsn_wp_query_meta_query_array_one = array();
		$oxsn_wp_query_meta_query_array_two = array();
		$oxsn_wp_query_meta_query_relation = esc_attr($a['meta_query_relation']);
		$oxsn_wp_query_meta_query_one_key = esc_attr($a['meta_query_one_key']);
		$oxsn_wp_query_meta_query_one_value = esc_attr($a['meta_query_one_value']);
		$oxsn_wp_query_meta_query_one_type = esc_attr($a['meta_query_one_type']);
		$oxsn_wp_query_meta_query_one_compare = esc_attr($a['meta_query_one_compare']);
		$oxsn_wp_query_meta_query_two_key = esc_attr($a['meta_query_two_key']);
		$oxsn_wp_query_meta_query_two_value = esc_attr($a['meta_query_two_value']);
		$oxsn_wp_query_meta_query_two_type = esc_attr($a['meta_query_two_type']);
		$oxsn_wp_query_meta_query_two_compare = esc_attr($a['meta_query_two_compare']);
		if ($oxsn_wp_query_meta_query_relation != '') :

			$oxsn_wp_query_meta_query['relation'] = $oxsn_wp_query_meta_query_relation;

		endif;
		if ($oxsn_wp_query_meta_query_one_key != '') :

			$oxsn_wp_query_meta_query_array_one['key'] = $oxsn_wp_query_meta_query_one_key;

		endif;
		if ($oxsn_wp_query_meta_query_one_value != '') :

			$oxsn_wp_query_meta_query_array_one['value'] = $oxsn_wp_query_meta_query_one_value;

		endif;
		if ($oxsn_wp_query_meta_query_one_type != '') :

			$oxsn_wp_query_meta_query_array_one['type'] = $oxsn_wp_query_meta_query_one_type;

		endif;
		if ($oxsn_wp_query_meta_query_one_compare != '') :

			$oxsn_wp_query_meta_query_array_one['compare'] = $oxsn_wp_query_meta_query_one_compare;

		endif;
		if ($oxsn_wp_query_meta_query_two_key != '') :

			$oxsn_wp_query_meta_query_array_two['key'] = $oxsn_wp_query_meta_query_two_key;

		endif;
		if ($oxsn_wp_query_meta_query_two_value != '') :

			$oxsn_wp_query_meta_query_array_two['value'] = $oxsn_wp_query_meta_query_two_value;

		endif;
		if ($oxsn_wp_query_meta_query_two_type != '') :

			$oxsn_wp_query_meta_query_array_two['type'] = $oxsn_wp_query_meta_query_two_type;

		endif;
		if ($oxsn_wp_query_meta_query_two_compare != '') :

			$oxsn_wp_query_meta_query_array_two['compare'] = $oxsn_wp_query_meta_query_two_compare;

		endif;
		if ($oxsn_wp_query_meta_query_one_key != '' && $oxsn_wp_query_meta_query_two_key != '') :

			array_push($oxsn_wp_query_meta_query, $oxsn_wp_query_meta_query_array_one, $oxsn_wp_query_meta_query_array_two);
			$args['meta_query'] = $oxsn_wp_query_meta_query;

		elseif ($oxsn_wp_query_meta_query_one_key != '') :

			array_push($oxsn_wp_query_meta_query, $oxsn_wp_query_meta_query_array_one);
			$args['meta_query'] = $oxsn_wp_query_meta_query;

		elseif ($oxsn_wp_query_meta_query_two_key != '') :

			array_push($oxsn_wp_query_meta_query, $oxsn_wp_query_meta_query_array_two);
			$args['meta_query'] = $oxsn_wp_query_meta_query;

		endif;

		$oxsn_wp_query_perm = esc_attr($a['perm']);
		if ($oxsn_wp_query_perm != '') :

			$args['perm'] = $oxsn_wp_query_perm;

		endif;

		$oxsn_wp_query_s = esc_attr($a['s']);
		if ($oxsn_wp_query_s != '') :

			$args['s'] = $oxsn_wp_query_s;

		endif;
		
		$oxsn_wp_query = new WP_Query( $args );
		$oxsn_foundation_return = '';

		while ( $oxsn_wp_query->have_posts() ) : $oxsn_wp_query->the_post();
			$oxsn_foundation_return .=
			do_shortcode($content);
		endwhile;

		if ($oxsn_wp_query_pagination == 'true') :
			$big = 999999999;
			$pagination_content = 
			'<div class="pagination">';
			$pagination_content .=  
			paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $oxsn_wp_query->max_num_pages
			) );	
			$pagination_content .= 
			'</div>';
		else :
			$pagination_content = '';
		endif;

		$oxsn_foundation_return .= $pagination_content;

		$oxsn_foundation_return .= '';

		wp_reset_postdata();
		return $oxsn_foundation_return;

	}

}

//[oxsn_permalink class="" page_id=""][/oxsn_permalink]
if ( ! function_exists ( 'oxsn_foundation_permalink_shortcode' ) ) {
	
	add_shortcode('oxsn_permalink', 'oxsn_foundation_permalink_shortcode');
	function oxsn_foundation_permalink_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'page_id' => '',
		), $atts );

		$oxsn_foundation_permalink_class = esc_attr($a['class']);
		$oxsn_foundation_permalink_id = esc_attr($a['id']);
		$oxsn_foundation_permalink_page_id = esc_attr($a['page_id']);
		
		if ($oxsn_foundation_permalink_page_id != '') :

			$oxsn_foundation_permalink = get_permalink($oxsn_foundation_permalink_page_id);

		else :

			$oxsn_foundation_permalink = get_permalink();

		endif;

		return '<a id="' . $oxsn_foundation_permalink_id . '" class="oxsn_permalink ' . $oxsn_foundation_permalink_class . '" href="' . $oxsn_foundation_permalink . '">' . do_shortcode($content) . '</a>';
		
	}

}

//[oxsn_featured_image class="" page_id=""]
if ( ! function_exists ( 'oxsn_foundation_featured_image_shortcode' ) ) {
	
	add_shortcode('oxsn_featured_image', 'oxsn_foundation_featured_image_shortcode');
	function oxsn_foundation_featured_image_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'img_size' => 'thumbnail',
			'page_id' => '',
		), $atts );

		$oxsn_foundation_featured_image_class = esc_attr($a['class']);
		$oxsn_foundation_featured_image_id = esc_attr($a['id']);
		$oxsn_foundation_featured_image_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_featured_image_img_size = esc_attr($a['img_size']);

		if ($oxsn_foundation_featured_image_page_id != '') {
			$url = wp_get_attachment_image_src( get_post_thumbnail_id($oxsn_foundation_featured_image_page_id), $oxsn_foundation_featured_image_img_size ); 
			$oxsn_foundation_featured_image_url = $url[0];
		} else {
			$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $oxsn_foundation_featured_image_img_size ); 
			$oxsn_foundation_featured_image_url = $url[0];
		}

		return '<img id="' . $oxsn_foundation_featured_image_id . '" class="oxsn_featured_image ' . $oxsn_foundation_featured_image_class . '" src="' . $oxsn_foundation_featured_image_url . '" />';

	}

}

//[oxsn_date format="F jS, Y" page_id=""]
if ( ! function_exists ( 'oxsn_foundation_date_shortcode' ) ) {

	add_shortcode('oxsn_date', 'oxsn_foundation_date_shortcode');
	function oxsn_foundation_date_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'format' => 'F jS, Y',
		), $atts );

		$oxsn_foundation_date_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_date_format = esc_attr($a['format']);
		
		if ($oxsn_foundation_date_page_id != '') :

			$oxsn_foundation_return = get_the_time($oxsn_foundation_date_format, $oxsn_foundation_date_page_id);

		else :

			$oxsn_foundation_return = get_the_time($oxsn_foundation_date_format);

		endif;
		
		return $oxsn_foundation_return;
		
	}

}

//[oxsn_id]
if ( ! function_exists ( 'oxsn_foundation_id_shortcode' ) ) {

	add_shortcode('oxsn_id', 'oxsn_foundation_id_shortcode');
	function oxsn_foundation_id_shortcode( $atts, $content = null ) {

		$oxsn_foundation_return = get_the_ID();
		
		return $oxsn_foundation_return;
		
	}

}

//[oxsn_categories separator=", " parents="" page_id=""]
if ( ! function_exists ( 'oxsn_foundation_categories_shortcode' ) ) {

	add_shortcode('oxsn_categories', 'oxsn_foundation_categories_shortcode');
	function oxsn_foundation_categories_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'separator' => ', ',
			'parents' => '',
		), $atts );

		$oxsn_foundation_categories_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_categories_separator = esc_attr($a['separator']);
		$oxsn_foundation_categories_parents = esc_attr($a['parents']);
		
		if ($oxsn_foundation_categories_page_id != '') :

			$oxsn_foundation_return = get_the_category_list($oxsn_foundation_categories_separator, $oxsn_foundation_categories_parents, $oxsn_foundation_categories_page_id);

		else :

			$oxsn_foundation_return = get_the_category_list($oxsn_foundation_categories_separator, $oxsn_foundation_categories_parents);

		endif;
		
		return $oxsn_foundation_return;
		
	}

}

//[oxsn_tags seperator=", " page_id=""]
if ( ! function_exists ( 'oxsn_foundation_tags_shortcode' ) ) {

	add_shortcode('oxsn_tags', 'oxsn_foundation_tags_shortcode');
	function oxsn_foundation_tags_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'seperator' => ', ',
		), $atts );

		$oxsn_foundation_tags_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_tags_seperator = esc_attr($a['seperator']);
		
		if ($oxsn_foundation_tags_page_id != '') :

			$oxsn_foundation_tags_tags = get_the_tags($oxsn_foundation_tags_page_id);

		else :

			$oxsn_foundation_tags_tags = get_the_tags();

		endif;
		
		if ($oxsn_foundation_tags_tags) :

			$oxsn_foundation_tags_tags_last_check = $oxsn_foundation_tags_tags;

			$oxsn_foundation_return = '';

			foreach($oxsn_foundation_tags_tags as $tag) :

				$oxsn_foundation_return .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';

				if (next($oxsn_foundation_tags_tags_last_check)) :

					$oxsn_foundation_return .= $oxsn_foundation_tags_seperator; 

				endif;
			
			endforeach;

		endif;

		return $oxsn_foundation_return;
		
	}

}

//[oxsn_title characters="35" page_id=""]
if ( ! function_exists ( 'oxsn_foundation_title_shortcode' ) ) {

	add_shortcode('oxsn_title', 'oxsn_foundation_title_shortcode');
	function oxsn_foundation_title_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'characters' => '35',
		), $atts );

		$oxsn_foundation_title_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_title_characters = esc_attr($a['characters']);
		
		if ($oxsn_foundation_title_page_id != '') :

			if ($oxsn_foundation_title_characters != '') :

				$post = get_post($oxsn_foundation_title_page_id);
				$title = strip_shortcodes($post->post_title);

	 			if (strlen($title) > $oxsn_foundation_title_characters) :
					$oxsn_foundation_return = substr($title, 0, $oxsn_foundation_title_characters) . '...';
				else : 
					$oxsn_foundation_return = $title;
				endif;

			else :

				$post = get_post($oxsn_foundation_title_page_id);
				$title = apply_filters('the_title', $post->post_title);

	 			$oxsn_foundation_return = $title;

	 		endif;

		else :

			if ($oxsn_foundation_title_characters != '') :

				global $post;
				$title = strip_shortcodes($post->post_title);

				if (strlen($title) > $oxsn_foundation_title_characters) :
					$oxsn_foundation_return = substr($title, 0, $oxsn_foundation_title_characters) . '...';
				else : 
					$oxsn_foundation_return = $title;
				endif;

			else :

				global $post;
				$title = apply_filters('the_title', $post->post_title);

				$oxsn_foundation_return = $title;

			endif;

		endif;
		
		return $oxsn_foundation_return;
		
	}

}

//[oxsn_content characters="140" page_id=""]
if ( ! function_exists ( 'oxsn_foundation_content_shortcode' ) ) {

	add_shortcode('oxsn_content', 'oxsn_foundation_content_shortcode');
	function oxsn_foundation_content_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'characters' => '140',
		), $atts );

		$oxsn_foundation_content_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_content_characters = esc_attr($a['characters']);

		if ($oxsn_foundation_content_page_id != '') :

			if ($oxsn_foundation_content_characters != '') :

				$post = get_post($oxsn_foundation_content_page_id);
				$content = strip_shortcodes($post->post_content);
				$content = strip_tags($content);

	 			if (strlen($content) > $oxsn_foundation_content_characters) :
					$oxsn_foundation_return = substr($content, 0, $oxsn_foundation_content_characters) . '...';
				else : 
					$oxsn_foundation_return = $content;
				endif;

			else :

				$post = get_post($oxsn_foundation_content_page_id);
				$content = apply_filters('the_content', $post->post_content);
				
				$oxsn_foundation_return = $content;

	 		endif;

		else :

			if ($oxsn_foundation_content_characters != '') :

				global $post;
				$content = strip_shortcodes($post->post_content);
				$content = strip_tags($content);

				if (strlen($content) > $oxsn_foundation_content_characters) :
					$oxsn_foundation_return = substr($content, 0, $oxsn_foundation_content_characters) . '...';
				else : 
					$oxsn_foundation_return = $content;
				endif;

			else :

				global $post;
				$content = apply_filters('the_content', $post->post_content);
				
				$oxsn_foundation_return = $content;

			endif;

		endif;
		
		return $oxsn_foundation_return;

	}

}

//[oxsn_excerpt characters="140" page_id=""]
if ( ! function_exists ( 'oxsn_foundation_excerpt_shortcode' ) ) {

	add_shortcode('oxsn_excerpt', 'oxsn_foundation_excerpt_shortcode');
	function oxsn_foundation_excerpt_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'characters' => '140',
		), $atts );

		$oxsn_foundation_excerpt_page_id = esc_attr($a['page_id']);
		$oxsn_foundation_excerpt_characters = esc_attr($a['characters']);

		if ($oxsn_foundation_excerpt_page_id != '') :

			if ($oxsn_foundation_excerpt_characters != '') :

				$post = get_post($oxsn_foundation_excerpt_page_id);
				$excerpt = strip_shortcodes($post->post_excerpt);
				$excerpt = strip_tags($excerpt);

	 			if (strlen($excerpt) > $oxsn_foundation_excerpt_characters) :
					$oxsn_foundation_return = substr($excerpt, 0, $oxsn_foundation_excerpt_characters) . '...';
				else : 
					$oxsn_foundation_return = $excerpt;
				endif;

			else :

				$post = get_post($oxsn_foundation_excerpt_page_id);
				$excerpt = strip_shortcodes($post->post_excerpt);
				
				$oxsn_foundation_return = $excerpt;

	 		endif;

		else :

			if ($oxsn_foundation_excerpt_characters != '') :

				global $post;
				$excerpt = strip_shortcodes($post->post_excerpt);
				$excerpt = strip_tags($excerpt);

				if (strlen($excerpt) > $oxsn_foundation_excerpt_characters) :
					$oxsn_foundation_return = substr($excerpt, 0, $oxsn_foundation_excerpt_characters) . '...';
				else : 
					$oxsn_foundation_return = $excerpt;
				endif;

			else :

				global $post;
				$excerpt = strip_shortcodes($post->post_excerpt);
				
				$oxsn_foundation_return = $excerpt;

			endif;

		endif;
		
		return $oxsn_foundation_return;

	}

}


/* OXSN Quicktags */

if ( ! function_exists ( 'oxsn_foundation_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_foundation_quicktags' );
	function oxsn_foundation_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">

				QTags.addButton( 'oxsn_foundation_h1_quicktag', '[h1]', '[oxsn_h1 class=""]', '[/oxsn_h1]', 'oxsn_h1', 'Quicktags H1', 201 );
				QTags.addButton( 'oxsn_foundation_h2_quicktag', '[h2]', '[oxsn_h2 class=""]', '[/oxsn_h2]', 'oxsn_h2', 'Quicktags H2', 202 );
				QTags.addButton( 'oxsn_foundation_h3_quicktag', '[h3]', '[oxsn_h3 class=""]', '[/oxsn_h3]', 'oxsn_h3', 'Quicktags H3', 203 );
				QTags.addButton( 'oxsn_foundation_h4_quicktag', '[h4]', '[oxsn_h4 class=""]', '[/oxsn_h4]', 'oxsn_h4', 'Quicktags H4', 204 );
				QTags.addButton( 'oxsn_foundation_h5_quicktag', '[h5]', '[oxsn_h5 class=""]', '[/oxsn_h5]', 'oxsn_h5', 'Quicktags H5', 205 );
				QTags.addButton( 'oxsn_foundation_h6_quicktag', '[h6]', '[oxsn_h6 class=""]', '[/oxsn_h6]', 'oxsn_h6', 'Quicktags H6', 206 );
				QTags.addButton( 'oxsn_foundation_p_quicktag', '[p]', '[oxsn_p class=""]', '[/oxsn_p]', 'oxsn_p', 'Quicktags P', 207 );
				QTags.addButton( 'oxsn_foundation_oxsn_video_quicktag', '[video]', '[oxsn_video class="" mp4="" ogg="" webm=""]', '[/oxsn_video]', 'oxsn_video', 'Quicktags VIDEO', 209 );
				QTags.addButton( 'oxsn_foundation_oxsn_img_quicktag', '[img]', '[oxsn_img class="" href=""]', '', 'oxsn_imgo', 'Quicktags IMG', 210 );
				QTags.addButton( 'oxsn_foundation_ul_quicktag', '[ul]', '[oxsn_ul class=""]', '[/oxsn_ul]', 'oxsn_ul', 'Quicktags UL', 211 );
				QTags.addButton( 'oxsn_foundation_ol_quicktag', '[ol]', '[oxsn_ol class=""]', '[/oxsn_ol]', 'oxsn_ol', 'Quicktags OL', 212 );
				QTags.addButton( 'oxsn_foundation_li_quicktag', '[li]', '[oxsn_li class=""]', '[/oxsn_li]', 'oxsn_li', 'Quicktags LI', 213 );
				QTags.addButton( 'oxsn_foundation_table_quicktag', '[table]', '[oxsn_table class=""]', '[/oxsn_table]', 'oxsn_table', 'Quicktags TABLE', 214 );
				QTags.addButton( 'oxsn_foundation_table_cell_quicktag', '[table_cell]', '[oxsn_table_cell class=""]', '[/oxsn_table_cell]', 'oxsn_table_cell', 'Quicktags TABLE CELL', 215 );
				QTags.addButton( 'oxsn_foundation_panel_quicktag', '[panel]', '[oxsn_panel class=""]', '[/oxsn_panel]', 'oxsn_panel', 'Quicktags PANEL', 216 );
				QTags.addButton( 'oxsn_foundation_container_quicktag', '[container]', '[oxsn_container class=""]', '[/oxsn_container]', 'oxsn_container', 'Quicktags CONTAINER', 217 );
				QTags.addButton( 'oxsn_foundation_row_quicktag', '[row]', '[oxsn_row xs_gap_width="" sm_gap_width="" md_gap_width="" lg_gap_width="" xl_gap_width=""]', '[/oxsn_row]', 'oxsn_row', 'Quicktags ROW', 218 );
				QTags.addButton( 'oxsn_foundation_column_quicktag', '[column]', '[oxsn_column xs_width="" sm_width="" md_width="" lg_width="" xl_width=""]', '[/oxsn_column]', 'oxsn_column', 'Quicktags COLUMN', 219 );
				QTags.addButton( 'oxsn_foundation_logged_in_users_quicktag', '[logged_in_users]', '[oxsn_logged_in_users user_roles=""]', '[/oxsn_logged_in_users]', 'oxsn_logged_in_users', 'Quicktags LOGGED IN USERS', 220 );
				QTags.addButton( 'oxsn_foundation_logged_out_users_quicktag', '[logged_out_users]', '[oxsn_logged_out_users user_roles=""]', '[/oxsn_logged_out_users]', 'oxsn_logged_out_users', 'Quicktags LOGGED OUT USERS', 221 );
				QTags.addButton( 'oxsn_foundation_navigation_quicktag', '[navigation]', '[oxsn_navigation menu=""]', '', 'oxsn_navigation', 'Quicktags NAVIGATION', 222 );
				QTags.addButton( 'oxsn_foundation_breadcrumbs_quicktag', '[breadcrumbs]', '[oxsn_breadcrumbs class=""]', '', 'oxsn_breadcrumbs', 'Quicktags BREADCRUMBS', 223 );
				QTags.addButton( 'oxsn_foundation_list_pages_quicktag', '[list_pages]', '[oxsn_list_pages post_type="page" class=""]', '', 'oxsn_list_page', 'Quicktags LIST PAGES', 224 );
				QTags.addButton( 'oxsn_foundation_wp_query_quicktag', '[oxsn_wp_query]', '[oxsn_wp_query class="" post_type="post" posts_per_page="-1" pagination="true"]', '[/oxsn_wp_query]', 'oxsn_wp_query', 'Quicktags WP QUERY', 225 );
				QTags.addButton( 'oxsn_foundation_featured_image_quicktag', '[oxsn_featured_image]', '[oxsn_featured_image class="" page_id=""]', '', 'oxsn_featured_image', 'Quicktags FEATURED IMAGE', 226 );
				QTags.addButton( 'oxsn_foundation_permalink_quicktag', '[oxsn_permalink]', '[oxsn_permalink class="" page_id=""]', '[/oxsn_permalink]', 'oxsn_permalink', 'Quicktags PERMALINK', 227 );
				QTags.addButton( 'oxsn_foundation_title_quicktag', '[oxsn_title]', '[oxsn_title characters="35" page_id=""]', '', 'oxsn_title', 'Quicktags TITLE', 228 );
				QTags.addButton( 'oxsn_foundation_date_quicktag', '[oxsn_date]', '[oxsn_date style="F jS, Y" page_id=""]', '', 'oxsn_date', 'Quicktags DATE', 229 );
				QTags.addButton( 'oxsn_foundation_id_quicktag', '[oxsn_id]', '[oxsn_id]', '', 'oxsn_id', 'Quicktags ID', 230 );
				QTags.addButton( 'oxsn_foundation_categories_quicktag', '[oxsn_categories]', '[oxsn_categories separator=", " parents="" page_id=""]', '', 'oxsn_categories', 'Quicktags CATEGORIES', 231 );
				QTags.addButton( 'oxsn_foundation_tags_quicktag', '[oxsn_tags]', '[oxsn_tags seperator=", " page_id=""]', '', 'oxsn_tags', 'Quicktags TAGS', 232 );
				QTags.addButton( 'oxsn_foundation_content_quicktag', '[oxsn_content]', '[oxsn_content characters="140" page_id=""]', '', 'oxsn_content', 'Quicktags CONTENT', 233 );
				QTags.addButton( 'oxsn_foundation_excerpt_quicktag', '[oxsn_excerpt]', '[oxsn_excerpt characters="140" page_id=""]', '', 'oxsn_excerpt', 'Quicktags EXCERPT', 234 );

			</script>

		<?php

		}

	}

}


?>