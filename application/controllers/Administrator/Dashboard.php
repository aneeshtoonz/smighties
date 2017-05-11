<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model(ADMIN_VIEWS . "/model_poster_design_register", "modelPosterDesignAlias");
        $this->load->model(ADMIN_VIEWS . "/model_courses", "modelCoursesAlias");
        $this->data['posterUrl'] = HOST_URL . "/" . ADMIN_URL . "/Poster_design_competition";
        $this->data['coursesUrl'] = HOST_URL . "/" . ADMIN_URL . "/Courses";
    }

    public function index() {

        $this->data['content'] = ADMIN_VIEWS . '/dashboard';
        $this->data['menuActive'] = 'dashboard';

        $this->addLog($this->data['user']['full_name'] ." has been logged in from IP: " . $this->input->ip_address());

        $this->data['count'] = $this->modelPosterDesignAlias->countAllRecords();
        $this->data['countCourses'] = $this->modelCoursesAlias->countAllRecords();
        $this->load->view($this->layout, $this->data);
    }

}
