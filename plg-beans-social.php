<?php

/**
 * Social Sharing for Beans
 *
 * Simple plugin to add social sharing to the Beans article layout.
 *
 * @package   plg-beans-social
 * @author    Chris Rault <chris@themebutler.com>
 * @license   GPL-2.0+
 * @link      https://github.com/ThemeButler/plg-beans-social/
 * @copyright 2015 Chris Rault
 *
 * @wordpress-plugin
 * Plugin Name:       Beans Social
 * Plugin URI:        https://github.com/ThemeButler/plg-beans-social/
 * Description:       Simple plugin to add social sharing to the Beans article layout.
 * Version:           1.0.0
 * Author:            Chris Rault
 * Author URI:        http://www.themebutler.com
 * Text Domain:       plg-beans-social
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

	beans_uikit_enqueue_components( array( 'icon' ) );

	// Add the theme js as a uikit fragment
	beans_compiler_add_fragment( 'social-sharing-js', PLG_BEANS_SOCIAL_URL . '/assets/js/social-sharing.js', 'js' );
	beans_compiler_add_fragment( 'social-sharing-css', PLG_BEANS_SOCIAL_URL . '/assets/css/beans-social.css', 'css' );

}


beans_add_smart_action('beans_post_content_append_markup', 'plg_beans_social_sharing_output');

function plg_beans_social_sharing_output() { ?>
	<div class="uk-button-group element uk-margin-bottom">
	  <div class="group facebook-share uk-margin-small-right">
	    <div class="count facebook-count"></div>
	    <i class="uk-icon--caret-down"></i>
	    <button class="uk-button fb"><i class="uk-icon-facebook"></i> facebook</button>
	  </div>
	  <div class="group gplus-share uk-margin-small-right">
	    <div class="count gplus-count"></div>
	    <i class="uk-icon--caret-down"></i>
	    <button class="uk-button gp"><i class="uk-icon-google-plus"></i> google-plus</button>
	  </div>
	  <div class="group linkedin-share uk-margin-small-right">
	    <div class="count linkedin-count"></div>
	    <i class="uk-icon--caret-down"></i>
	    <button class="uk-button linkedin"><i class="uk-icon-linkedin"></i> linkedin</button>
	  </div>
	  <div class="group twitter-share uk-margin-small-right">
	    <div class="count twitter-count"></div>
	    <i class="uk-icon--caret-down"></i>
	    <button class="uk-button twitter"><i class="uk-icon-twitter"></i> twitter</button>
	  </div>
	  <div class="group pinterest-share">
	    <div class="count pinterest-count"></div>
	    <i class="uk-icon--caret-down"></i>
	    <button class="uk-button pinterest"><i class="uk-icon-pinterest"></i> pinterest</button>
	  </div>
	</div>
<?php }