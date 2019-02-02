<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file      : Calendar
 * @author    : John Muchiri
 * @date      : 8/14/14
 * @Copyright 2014 icoolpix.com
 * http://icoolpix.com
 * info@icoolpix.com
 */
class My_calendar extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    /*
     * add event
     */
    function add_event()
    {
        if ($this->input->post('allDay') == 1) {
            $allDay = 'true';
        } else {
            $allDay = 'false';
        }
        // Values received via ajax
        $data = array(
            'title'       => $this->input->post('title'),
            'start'       => $this->input->post('start'),
            'start_t'     => $this->input->post('start_t'),
            'end'         => $this->input->post('end'),
            'end_t'       => $this->input->post('end_t'),
            'description' => $this->input->post('desc'),
            'allDay'      => $allDay
        );

        $this->db->insert('calendar', $data); //insert to db

        if ($this->db->affected_rows() > 0) { //successful
            $this->conf->msg('success', 'Event created');
        } else {
            $this->conf->msg('danger', 'Error! Nothing created!');
        }
    }

    /*
     * update event
     */
    function update_event()
    {
        if ($this->input->post('allDay') == 1) {
            $allDay = 'true';
        } else {
            $allDay = 'false';
        }
        // Values received via ajax
        $data = array(
            'title'       => $this->input->post('title'),
            'start'       => $this->input->post('start'),
            'start_t'     => $this->input->post('start_t'),
            'end'         => $this->input->post('end'),
            'end_t'       => $this->input->post('end_t'),
            'description' => $this->input->post('desc'),
            'allDay'      => $allDay
        );
        echo $data['start'];

        // update the records
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('calendar', $data);
        if ($this->db->affected_rows() > 0) { //successful
            $this->conf->msg('success', 'Event updated');
        } else {
            $this->conf->msg('danger', 'Error! Nothing updated!');
        }
    }

    /*
     * delete event
     */
    function delete_event()
    {
        $this->db->where('id', $this->input->post('event_id'));
        $this->db->delete('calendar');
        if ($this->db->affected_rows() > 0) { //successful
            return 'true';
        } else {
            return 'true';
        }
    }
}