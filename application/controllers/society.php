<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Society extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('include/include_header');
        $this->load->view('content/facebook');
        $this->load->view('include/include_footer');
    }

    public function dashboard() {
        $this->load->model('categories_model');
        $data['categories'] = $this->categories_model->getDataAll();
        $this->load->view('include/include_header');
        $this->load->view('content/dashboard', $data);
        $this->load->view('include/include_footer');
    }

    public function cardBig() {
        $this->load->view('content/card_big');
    }

    public function cardSmall() {
        $this->load->view('content/card_small');
    }

    public function saveFanpage() {
        $exec = false;
        if (!empty($_POST)) {
            $this->load->model('fanpage_model');
            $this->fanpage_model->setData($_POST);
            if (empty($_POST['fan_id'])) {
                $exec = $this->fanpage_model->insert($_POST);
            } else {
                $exec = $this->fanpage_model->updateData($_POST);
            }
            echo json_encode(array(
                'status' => $exec,
                'title' => 'Save Status',
                'message' => 'Save Fanpage Success',
                'url' => ''
            ));
        }
    }

    public function deleteFanpage() {
        
    }

}
