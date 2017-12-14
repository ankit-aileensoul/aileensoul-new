<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Freealncer_profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //AWS access info start
        $this->load->library('S3');
        //AWS access info end
        include ('include.php');
    }

    public function index() {
        $this->data['login_header'] = $this->load->view('login_header', $this->data,TRUE);
        $this->data['login_footer'] = $this->load->view('login_footer', $this->data,TRUE);
        $this->load->view('freealncer_profile', $this->data);
    }

}
