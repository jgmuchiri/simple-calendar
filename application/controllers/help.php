<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file      : help.php
 * @author    : John
 * @Date      : 8/5/14
 * @Copyright 2014
 */
class Help extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //local variables
        $this->module = 'help/';
    }

    function index()
    {
        $this->conf->page('help/index');
    }

    /*
     * load help page
     */
    function help_article($article_id)
    {
        $this->db->where('id', $article_id);
        $data['my_articles'] = $this->db->get('help_articles');
        $this->load->view($this->module . 'view_article', $data);
    }

    /*
     * create and edit new help files
     */
    function editor($article = 0)
    {
        if ($article >= 0 && is_numeric($article)) {
            $this->session->set_userdata('help_article_id', $article);
            redirect('help/edit');
        }

        redirect('help');
    }

    /*
     * load editor
     */
    function edit()
    {
        $article = $this->session->userdata('help_article_id');
        if ($article <= 0 && !is_numeric($article)) { //double check an article has been selected
            redirect('help/edit');
        }
        //edit and update
        $this->form_validation->set_rules('article_order', 'order', 'required|trim|xss_clean|integer');
        $this->form_validation->set_rules('article_name', 'File name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('article_body', 'Article body', 'required|trim|xss_clean');

        if ($this->form_validation->run() == TRUE) { //validation success
            $data = array(
                'order'        => $this->input->post('article_order'),
                'article_name' => $this->input->post('article_name'),
                'article_body' => $this->input->post('article_body')
            );

            $this->db->where('id', $article);
            $this->db->update('help_articles', $data); //insert to db

            if ($this->db->affected_rows() > 0) {
                $this->conf->msg('success', 'Article updated');
            } else {
                $this->conf->msg('warning', 'Nothing updated');
            }

            redirect('help/edit');

        } else {
            $this->db->where('id', $article);
            $data['articles'] = $this->db->get('help_articles')->result();
            $this->conf->page($this->module . 'editor', $data); //load editor

        }
        //end validation  block
    }

    /*
     * create a new help file
     */
    function new_article()
    {
        $this->form_validation->set_rules('article_name', 'File name', 'required|trim|xss_clean');

        if ($this->form_validation->run() == TRUE) {

            $this->db->insert('help_articles', array('article_name' => $this->input->post('article_name')));
            $article_id = $this->db->insert_id();
            if ($this->db->affected_rows() > 0) {
                $this->conf->msg('success', 'File created');
            } else {
                $this->conf->msg('danger', 'Error creating file');
            }
            redirect('help/editor/' . $article_id);

        } else {

            $this->conf->page($this->module . 'new_article_form'); //load editor
        }

    }

    /*
     * delete article
     */
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('help_articles');
        if ($this->db->affected_rows() > 0) { //successful
            $this->conf->msg('success', 'Article has been deleted');
        } else {
            $this->conf->msg('danger', 'Unable to delete article!');
        }
        redirect('help');
    }
}