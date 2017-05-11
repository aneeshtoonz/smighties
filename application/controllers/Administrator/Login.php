<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    protected $layout;
    protected $data;

    public function __construct() {

       parent::__construct();

       $this->data = array();
       $this->layout = ADMIN_VIEWS . "/login";
       $this->load->model(ADMIN_VIEWS . "/model_users", "modelUserAlias");
    }

    public function index() {

        $post['username'] = '';
        $post['password'] = '';
        $this->data['post'] = $post;

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $authResult = $this->modelUserAlias->_authUser($this->input->post());

            if($authResult['code'] == 200) {

                $data_logged = array('data_logged' => array(
                  'username' => $authResult['data']->username,
                  'full_name' => $authResult['data']->first_name . ' ' . $authResult['data']->last_name,
                  'auth' => true
                ));

                $this->session->set_userdata($data_logged);

                $this->session->set_flashdata('success_message', 'Logged in , welcome back admin');

                //Redirect to dashbpoard in admin panel
                redirect( HOST_URL . '/Administrator/Dashboard');

            } else {

                $this->data['Error'] = "Y";
                $this->data['MSG'] = $authResult['message'];

            }

        }

        $this->load->view($this->layout, $this->data);
    }

}
