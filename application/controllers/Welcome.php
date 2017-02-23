<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /** Using $this->load->view to load views. */
    public function index()
    {
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }
}
