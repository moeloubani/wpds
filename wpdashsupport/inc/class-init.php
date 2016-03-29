<?php


class DashSupport_Init
{

    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'scripts'));
        add_action('admin_enqueue_scripts', array($this, 'styles'));
    }

    public function scripts()
    {
        wp_enqueue_script('wpds-script', WPDS_PLUGIN_URL.'assets/js/wpds.js', array('jquery'), 1.0);
    }

    public function styles()
    {
        wp_enqueue_style('wpds-style', WPDS_PLUGIN_URL.'assets/css/wpds.css');
    }

}
new DashSupport_Init();