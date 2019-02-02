<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file: welcome
 * @author: John Muchiri
 * @date: 8/18/14
 * @Copyright 2014 icoolpix.com
 * http://icoolpix.com
 * info@icoolpix.com
 */
class welcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function index(){
        $this->conf->page('home');
    }
}