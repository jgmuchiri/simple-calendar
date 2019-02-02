<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file      : Calendar
 * @author    : John Muchiri
 * @date      : 8/14/14
 * @Copyright 2014 icoolpix.com
 * http://icoolpix.com
 * info@icoolpix.com
 */
class Calendar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //local resources (models,libraries etc)
        $this->load->model('my_calendar', 'calendar');

        //local variables
        $this->module = 'calendar/';

    }

    /*
     * display main page
     */
    function index()
    {
        $this->conf->page($this->module . 'index');
    }

    function events()
    {
        // List of events
        $json = array();

        $this->db->order_by('id');
        $query = $this->db->get('calendar')->result();
        // sending the encoded result to success page
        echo json_encode($query);

    }

    /*
     * add event to db
     */
    function add_event()
    {
        $this->form_validation->set_rules('title', 'Event title', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start', 'Event start date', 'required|trim|xss_clean');
        $this->form_validation->set_rules('end', 'Event end date', 'required|trim|xss_clean');
        $this->form_validation->set_rules('desc', 'Details', 'required|trim|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $this->calendar->add_event();
        } else {
            validation_errors();
            $this->conf->msg('danger');
        }
        redirect('calendar');

    }

    /*
     * update event
     */
    function update_event()
    {
        $this->form_validation->set_rules('title', 'Event title', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start', 'Event start date', 'required|trim|xss_clean');
        $this->form_validation->set_rules('end', 'Event end date', 'required|trim|xss_clean');
        $this->form_validation->set_rules('desc', 'Details', 'required|trim|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $this->calendar->update_event();
        } else {
            $this->conf->msg('danger', 'Error!');
        }
        redirect('calendar');
    }

    /*
     * delete event
     */
    function delete_event()
    {
        if ($this->calendar->delete_event()) {
            $this->conf->msg('success', 'Event has been delete');
        } else {
            $this->conf->msg('danger', 'Unable to delete event!');
        }

    }
}