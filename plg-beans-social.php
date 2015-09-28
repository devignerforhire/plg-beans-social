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

// Stop here if Beans is not available.
if ( !file_exists( get_template_directory() . '/lib/api/init.php' ) )
	return;

// Include Beans
require_once( get_template_directory() . '/lib/api/init.php' );

// Register needed components
beans_load_api_components( array(
	'actions',
	'html',
	'term-meta',
	'post-meta',
	'image',
	'wp-customize',
	'compiler',
	'uikit',
	'template',
	'layout',
	'widget'
) );


// Enqueue uikit assets
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'beans_social_enqueue_assets' );

function beans_social_enqueue_assets() {

	// Register support for the icon component
	beans_uikit_enqueue_components( array( 'icon' ) );

	// Add the theme assets as uikit fragments
	beans_compiler_add_fragment( 'uikit', PLG_BEANS_SOCIAL_URL . 'assets/css/beans-social.css', 'less' );
	beans_compiler_add_fragment( 'uikit', PLG_BEANS_SOCIAL_URL . 'assets/js/social-sharing.js', 'js' );

}


beans_add_smart_action('beans_post_content_append_markup', 'plg_beans_social_sharing_output');

function plg_beans_social_sharing_output() { ?>
	<div class="tbr-beans-social uk-button-group element uk-margin-bottom">
	  <div class="group facebook-share uk-margin-small-right">
		<div class="count facebook-count"></div>
		<i class="uk-icon-caret-down"></i>
		<button class="uk-button fb"><i class="uk-icon-facebook"></i> facebook</button>
	  </div>
	  <div class="group gplus-share uk-margin-small-right">
		<div class="count gplus-count"></div>
		<i class="uk-icon-caret-down"></i>
		<button class="uk-button gp"><i class="uk-icon-google-plus"></i> google-plus</button>
	  </div>
	  <div class="group linkedin-share uk-margin-small-right">
		<div class="count linkedin-count"></div>
		<i class="uk-icon-caret-down"></i>
		<button class="uk-button linkedin"><i class="uk-icon-linkedin"></i> linkedin</button>
	  </div>
	  <div class="group twitter-share uk-margin-small-right">
		<div class="count twitter-count"></div>
		<i class="uk-icon-caret-down"></i>
		<button class="uk-button twitter"><i class="uk-icon-twitter"></i> twitter</button>
	  </div>
	  <div class="group pinterest-share">
		<div class="count pinterest-count"></div>
		<i class="uk-icon-caret-down"></i>
		<button class="uk-button pinterest"><i class="uk-icon-pinterest"></i> pinterest</button>
	  </div>
	</div>
<?php }