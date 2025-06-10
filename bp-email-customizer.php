<?php
/**
 * Plugin Name:       BP Email Customizer
 * Description:       Customize the appearance of BuddyPress emails from a central settings panel.
 * Version:           1.0.0
 * Author:            Jacob GL
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       bp-email-customizer
 * Domain Path:       /languages
 * BuddyPress:        Requires at least BuddyPress 10.0.0
 */

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants for easy access
define( 'BPEC_VERSION', '1.0.0' );
define( 'BPEC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BPEC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'BPEC_TEXT_DOMAIN', 'bp-email-customizer' );

/**
 * Main plugin class to prevent function name conflicts.
 */
final class BP_Email_Customizer_Plugin {

    /**
     * Constructor.
     */
    public function __construct() {
        $this->includes();
    }

    /**
     * Include required files.
     */
    public function includes() {
        if ( ! class_exists( 'BuddyPress' ) ) {
            add_action( 'admin_notices', array( $this, 'buddypress_not_active_notice' ) );
            return;
        }

        require_once BPEC_PLUGIN_DIR . 'includes/settings-page.php';
        require_once BPEC_PLUGIN_DIR . 'includes/admin-assets.php';
        require_once BPEC_PLUGIN_DIR . 'includes/email-filters.php';
    }

    /**
     * Admin notice if BuddyPress is not active.
     */
    public function buddypress_not_active_notice() {
        ?>
        <div class="error">
            <p><?php esc_html_e( 'BP Email Customizer requires BuddyPress to be active to function.', BPEC_TEXT_DOMAIN ); // Spanish ?></p>
        </div>
        <?php
    }
}

// Instantiate the plugin class.
new BP_Email_Customizer_Plugin();

