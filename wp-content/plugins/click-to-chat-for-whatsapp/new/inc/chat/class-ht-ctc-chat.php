<?php
/**
 * WhatsApp Chat  - main page .. 
 * 
 * @subpackage chat
 */



if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CTC_Chat' ) ) :

class HT_CTC_Chat {

    public function chat() {
        
        $options = get_option('ht_ctc_chat_options');
        

        // show/hide .. 
        // include_once HT_CTC_PLUGIN_DIR .'new/inc/chat/chat-show-hide.php';
        include HT_CTC_PLUGIN_DIR .'new/inc/commons/show-hide.php';

        if ( 'no' == $display ) {
            return;
        }
        
        $main_options = ht_ctc()->values->ctc_main_options;
        $other = get_option('ht_ctc_othersettings');

        // position
        include_once HT_CTC_PLUGIN_DIR .'new/inc/chat/chat-position.php';
        
        // is mobile
        $is_mobile = ht_ctc()->device_type->is_mobile();

        $wp_device = '';

        // style
        if ( 'yes' == $is_mobile ) {
            $style = esc_attr( $options['style_mobile'] );
            $wp_device = 'mobile';
        } else {
            $style = esc_attr( $options['style_desktop'] );
            $wp_device = 'desktop';
        }

        // call to action
        // todo localization for number, .. ( at variables page ) - call to action for share, group
        $call_to_action_db = esc_attr( $options['call_to_action'] );
        $call_to_action = __( $call_to_action_db , 'click-to-chat-for-whatsapp' );


        // call to action - at page level
        $page_id = get_the_ID();
        $page_call_to_action = esc_attr( get_post_meta( $page_id, 'ht_ctc_page_call_to_action', true ) );

        if ( isset( $page_call_to_action ) && '' !== $page_call_to_action ){
            $call_to_action = $page_call_to_action;
        }

        // class names
        $class_names = "ht-ctc-chat style-$style $wp_device ctc-analytics";

        $page_id = get_the_ID();
        $page_url = get_permalink();
        $post_title = esc_html( get_the_title() );

        // number
        $number = esc_attr( $options['number'] );

        // number - at page level
        $page_number = esc_attr( get_post_meta( $page_id, 'ht_ctc_page_number', true ) );

        if ( isset( $page_number ) && '' !== $page_number ){
            $number = $page_number;
        }

        // if random number feature, this have to modify (ltrim, preg_replace)
        // $number = preg_replace('/[^0-9,\s]/', '', $number );
        $number = preg_replace('/\D/', '', $number );
        $number = ltrim( $number, '0' );
        

        // prefilled text
        $pre_filled = esc_attr( $options['pre_filled'] );
        $pre_filled = str_replace( array('{{url}}', '{url}', '{{title}}', '{title}', '{{site}}', '{site}' ),  array( $page_url, $page_url, $post_title, $post_title, HT_CTC_BLOG_NAME, HT_CTC_BLOG_NAME ), $pre_filled );

        // analytics
        $is_ga_enable = apply_filters( 'ht_ctc_fh_is_ga_enable', 'no' );
        $is_fb_pixel = apply_filters( 'ht_ctc_fh_is_fb_pixel', 'no' );
        $is_fb_an_enable = apply_filters( 'ht_ctc_fh_is_fb_an_enable', 'no' );
        
        // webapi: web/api.whatsapp,  wa: wa.me
        $webandapi = 'wa';
        if ( isset( $options['webandapi'] ) ) {
            $webandapi = 'webapi';
        }

        // screen: screen_size@js,  http: httpuseragent@php
        $detectdevice = esc_attr( $other['detectdevice'] );

        $display_mobile = 'show';
        if ( isset( $options['hideon_mobile'] ) ) {
            $display_mobile = 'hide';
        }
        $display_desktop = 'show';
        if ( isset( $options['hideon_desktop'] ) ) {
            $display_desktop = 'hide';
        }

        
        // call style
        $path = plugin_dir_path( HT_CTC_PLUGIN_FILE ) . 'new/inc/styles/style-' . $style. '.php';

        if ( is_file( $path ) ) {

            do_action('ht_ctc_ah_before_fixed_position');
            ?>
            <div onclick="ht_ctc_click(this);" class="<?php echo $class_names ?>" 
                style="display: none; position: fixed; <?php echo $position ?> cursor: pointer; z-index: 99999999;"
                data-return_type="chat" 
                data-style="<?php echo $style ?>" 
                data-number="<?php echo $number ?>" 
                data-pre_filled="<?php echo $pre_filled ?>" 
                data-is_ga_enable="<?php echo $is_ga_enable ?>" 
                data-is_fb_pixel="<?php echo $is_fb_pixel ?>" 
                data-is_fb_an_enable="<?php echo $is_fb_an_enable ?>" 
                data-webandapi="<?php echo $webandapi ?>" 
                data-detectdevice="<?php echo $detectdevice ?>" 
                data-wpdevice="<?php echo $wp_device ?>" 
                data-display_mobile="<?php echo $display_mobile ?>" 
                data-display_desktop="<?php echo $display_desktop ?>" 
                >
                <?php include $path; ?>
            </div>
            <?php
        }

        
    }

}

// new HT_CTC_Chat();

$ht_ctc_chat = new HT_CTC_Chat();
add_action( 'wp_footer', array( $ht_ctc_chat, 'chat' ) );


endif; // END class_exists check