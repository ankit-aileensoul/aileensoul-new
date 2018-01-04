<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class General_data extends MY_Controller {

    public $data;

    public function __construct() {

        parent::__construct();
        $this->load->model('email_model');
        $this->load->model('user_model');
        $this->load->model('data_model');
        $this->load->library('S3');
    }

    public function index() {
        
    }

    public function getFieldList() {
        $userid = $this->session->userdata('aileenuser');
        $getFieldList = $this->data_model->getFieldList();
        echo json_encode($getFieldList);
    }

    public function getjobTitle() {
        $getJobTitle = $this->data_model->getJobTitle();
        echo json_encode($getJobTitle);
    }
    
    public function cityList() {
        $getCityList = $this->data_model->cityList();
        echo json_encode($getCityList);
    }
    public function searchJobTitle() {
        $titleSearch = $_POST['q'];
        $getJobTitle = $this->data_model->searchJobTitle($titleSearch);
        echo json_encode($getJobTitle);
    }
    
    public function searchCityList() {
        $citySearch = $_POST['q'];
        $getCityList = $this->data_model->searchCityList($citySearch);
        echo json_encode($getCityList);
    }

}
