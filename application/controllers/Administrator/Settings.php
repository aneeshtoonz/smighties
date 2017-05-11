<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

    protected $viewFolder;
    protected $className;
    protected $record;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/settings';
        $this->data['menuActive'] = 'settings';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Settings";
        $this->load->model( ADMIN_VIEWS . '/model_users', 'modelNameAlias');
        $this->className = 'Settings';

        $this->record = $this->modelNameAlias->fetchRow(array('username' => $this->data['user']['username']));
    }

    public function change_password() {

        $this->data['content'] = $this->viewFolder . '/password';

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');

            $this->form_validation->set_rules('current_password', 'Current password', 'trim|required|callback_validate_current_password');
            $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|min_length[8]|max_length[12]|matches[confirm_password]|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE) {

                $hashKey = $this->modelNameAlias->genPwdHashKey($this->input->post("password", TRUE), $this->record->uniq_token);

                $data_array = array(
                    'hash_key' => $hashKey,
                    'read_pass'   => $this->input->post("password", TRUE)
                );

                $this->modelNameAlias->save($data_array, array('id' => $this->record->id));

                $this->addLog($this->className . " password has been changed for :- ". $this->record->first_name . ' ' . $this->record->last_name);

                $this->session->set_flashdata('success_message', 'Your password has been changed');
                redirect($this->data['ctrlUrl'] . "/change_password");

            }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function validate_current_password($str) {

        $passwordHash = $this->modelNameAlias->genPwdHashKey($str, $this->record->uniq_token);

        if($passwordHash == $this->record->hash_key) {
            return true;
        } else {
            $this->form_validation->set_message('validate_current_password', 'Your current password is not matching ...');
            return false;
        }

    }

}
