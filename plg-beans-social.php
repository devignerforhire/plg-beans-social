<?php

/**
 * Social Sharing for Beans
 *
 * Simple plugin to add social sharing to the Beans article layout.
 *
 * @package   TBRT
 * @author    Chris Rault <chris@themebutler.com>
 * @license   GPL-2.0+
 * @link      https://github.com/ThemeButler/plg-tbr-themes/
 * @copyright 2015 Chris Rault
 *
 * @wordpress-plugin
 * Plugin Name:       Beans Social
 * Plugin URI:        https://github.com/ThemeButler/plg-beans-social/
 * Description:       Simple plugin to add social sharing to the Beans article layout.
 * Version:           1.0.0
 * Author:            Chris Rault
 * Author URI:        http://www.themebutler.com
 * Text Domain:       tbr-beans-social
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/ThemeButler/plg-beans-social/
 */


define( 'PLG_BEANS_SOCIAL_URL', plugin_dir_url( __FILE__ ) );

// Include Beans
require_once( get_template_directory() . '/lib/init.php' );


// Enqueue uikit assets
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'beans_social_enqueue_assets', 7 );

function beans_social_enqueue_assets() {

	// Add the theme js as a uikit fragment
	beans_compiler_add_fragment( 'social-sharing-js', PLG_BEANS_SOCIAL_URL . '/assets/js/social-sharing.js', 'js' );
	beans_compiler_add_fragment( 'social-sharing-css', PLG_BEANS_SOCIAL_URL . '/assets/css/beans-social.css', 'css' );

}


beans_add_smart_action('beans_post_content_append_markup', 'plg_beans_social_sharing_output');

function plg_beans_social_sharing_output(){ ?>
	<div class="element">
	  <div class="group facebook-share">
	    <div class="count facebook-count"></div>
	    <i class="fa fa-caret-down"></i>
	    <button class="fb"><i class="fa fa-facebook"></i> facebook</button>
	  </div>
	  <div class="group gplus-share">
	    <div class="count gplus-count"></div>
	    <i class="fa fa-caret-down"></i>
	    <button class="gp"><i class="fa fa-google-plus"></i> google-plus</button>
	  </div>
	  <div class="group linkedin-share">
	    <div class="count linkedin-count"></div>
	    <i class="fa fa-caret-down"></i>
	    <button class="linkedin"><i class="fa fa-linkedin"></i> linkedin</button>
	  </div>
	  <div class="group twitter-share">
	    <div class="count twitter-count"></div>
	    <i class="fa fa-caret-down"></i>
	    <button class="twitter"><i class="fa fa-twitter"></i> twitter</button>
	  </div>
	  <div class="group pinterest-share">
	    <div class="count pinterest-count"></div>
	    <i class="fa fa-caret-down"></i>
	    <button class="pinterest"><i class="fa fa-pinterest"></i> pinterest</button>
	  </div>
	</div>
<?php }