<?php


class DashSupport_Mail
{
    public function __construct()
    {
        add_action( 'wp_ajax_wpds_send_mail', array($this, 'mail') );
    }

    public function mail()
    {
        $data = System_Snapshot_Report::getInstance();

        $data = array(
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message'] . $data->snapshot_data(),
        );

        $response = wp_mail(get_option('wpds_dev_email'), $data['subject'] . 'from ' . $_POST['wpds_email'], $data['message']);

        wp_send_json_success($response);
        exit;
    }

}
new DashSupport_Mail();