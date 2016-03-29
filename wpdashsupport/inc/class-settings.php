<?php

class DashSupport_Settings {

    function __construct( )
    {
        add_action( 'admin_init' , array($this , 'register_fields' ) );
    }

    function register_fields()
    {
        register_setting( 'general', 'wpds_dev_email', 'esc_attr' );
        add_settings_field(
            'wpds_dev_email',
            '<label for="extra_blog_desc_id">' . __( 'Developer Email: ' , 'wpdashsupport' ) . '</label>',
            array( $this, 'fields_html' ),
            'general'
        );
    }


    function fields_html()
    {
        $value = get_option( 'wpds_dev_email', '' );
        echo '<input type="text" id="wpds_dev_email" name="wpds_dev_email" value="' . sanitize_email($value) . '" class="regular-text ltr" />';
    }

}

new DashSupport_Settings();