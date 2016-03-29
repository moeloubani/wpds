<?php


class DashSupport_Dashboard
{
    public function __construct()
    {
        add_action( 'wp_dashboard_setup', array($this, 'add_dashboard_widgets') );
    }

    public function add_dashboard_widgets() {

        wp_add_dashboard_widget(
            'dashsupport_widget',         // Widget slug.
            __('Contact Developer Support', 'wpdashsupport'),         // Title.
            array($this, 'dashboard_widget_function') // Display function.
        );
    }


    /**
     * Create the function to output the contents of our Dashboard Widget.
     */
    public function dashboard_widget_function() {
        include(WPDS_PLUGIN_PATH . 'templates/widget.php');
    }

}

new DashSupport_Dashboard();