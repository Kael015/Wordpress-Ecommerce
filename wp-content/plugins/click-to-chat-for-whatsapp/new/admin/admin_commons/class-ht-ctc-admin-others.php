<?php
/**
 * Other function, features .. to
 * 
 * admin notices
 *  If whatsapp number not added. 
 * 
 * @since 2.7
 * @package ctc
 * @subpackage admin
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CTC_Admin_Others' ) ) :

class HT_CTC_Admin_Others {

    public function __construct() {
        $this->admin_hooks();
    }

    function admin_hooks() {

        $ht_ctc_main_options = get_option('ht_ctc_main_options');

        // if number blank
        if ( isset( $ht_ctc_main_options['enable_chat'] ) ) {
            $ht_ctc_chat_options = get_option('ht_ctc_chat_options');

            if ( isset( $ht_ctc_chat_options['number'] ) ) {
                if ( '' == $ht_ctc_chat_options['number'] ) {
                    add_action('admin_notices', array( $this, 'ifnumberblank') );
                }
            }
        }

        // if group id blank
        if ( isset( $ht_ctc_main_options['enable_group'] ) ) {
            $ht_ctc_group = get_option('ht_ctc_group');

            if ( isset( $ht_ctc_group['group_id'] ) ) {
                if ( '' == $ht_ctc_group['group_id'] ) {
                    add_action('admin_notices', array( $this, 'ifgroupblank') );
                }
            }

        }

        // if share_text blank
        if ( isset( $ht_ctc_main_options['enable_share'] ) ) {
            $ht_ctc_share = get_option('ht_ctc_share');

            if ( isset( $ht_ctc_share['share_text'] ) ) {
                if ( '' == $ht_ctc_share['share_text'] ) {
                    add_action('admin_notices', array( $this, 'ifshareblank') );
                }
            }
        }


    }

    function ifnumberblank() {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>Click to Chat is almost ready. <a href="<?php echo admin_url('admin.php?page=click-to-chat');?>">Add WhatsApp Number</a> to let vistiors chat.</p>
            <!-- <a href="?dismis">Dismiss</a> -->
        </div>
        <?php
    }

    function ifgroupblank() {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>Click to Chat is almost ready. <a href="<?php echo admin_url('admin.php?page=click-to-chat-group-feature');?>">Add WhatsApp Group ID</a> to let vistiors Join in your WhatsApp Group.</p>
            <!-- <a href="?dismis">Dismiss</a> -->
        </div>
        <?php
    }

    function ifshareblank() {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>Click to Chat is almost ready. <a href="<?php echo admin_url('admin.php?page=click-to-chat-share-feature');?>">Add Share Text</a> to let vistiors Share your Webpages.</p>
            <!-- <a href="?dismis">Dismiss</a> -->
        </div>
        <?php
    }


}

new HT_CTC_Admin_Others();

endif; // END class_exists check