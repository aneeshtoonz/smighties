<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends Admin_Controller {

    protected $viewFolder;
    protected $className;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/logs';
        $this->data['menuActive'] = 'logs';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Logs";
        $this->load->model( ADMIN_VIEWS . '/model_logs', 'modelNameAlias');
        $this->className = 'Logs';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';

        if(isset($_GET['search']) && $_GET['search'] != '') {
            $this->data['search'] = $_GET['search'];
            $this->data['records'] = $this->modelNameAlias->get_all_like("controller", $this->data['search']);
        } else {
            $this->data['records'] = $this->modelNameAlias->get_all();
        }

        $this->load->view($this->layout, $this->data);
    }

    public function clear() {

        if($this->modelNameAlias->delete_all()) {
            $this->session->set_flashdata('success_message', ' All logs have been cleared');
            redirect($this->data['ctrlUrl']);
        } else {
            $this->session->set_flashdata('error_message', 'Something went wrong :(');
            redirect($this->data['ctrlUrl']);
        }

    }

}
