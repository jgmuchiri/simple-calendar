<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conf extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //default time zone
        date_default_timezone_set('UTC');

    }

    /*
     * page()
     * @params $page $data
     * loads default header, footer and defined view
     */
    function page($page, $data = array())
    {
        $this->load->view('inc/header');
        $this->load->view('inc/nav');
        //system messages
        $this->load->view('inc/messages');
        $this->load->view($page, $data);
        $this->load->view('inc/footer');
    }
    /*
     * msg()
     * @params $type, $msg
     * call status messages
     */
    function msg($type = "", $msg = "")
    {
        switch ($type) {
            case 'danger':
                $icon = 'exclamation-sign';
                break;
            case 'success':
                $icon = 'ok';
                break;
            case 'info':
                $icon = 'info-sign';
                break;
            case 'warning':
                $icon = 'warning-sign';
                break;
            default:
                $icon = 'info-sign';
                break;
        }

        if (validation_errors() == true && $msg == "") {
            $e = validation_errors('<p class="msg alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>', '</p>');
            $this->session->set_flashdata('message', $e);
        } else {
            $this->session->set_flashdata('message',
                '<p id="msg" class="msg alert alert-' . $type .
                '"><span class="glyphicon glyphicon-' . $icon . '"></span> ' . $msg . '</p>');
        }


    }

}