<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_manager extends Admin_Controller {

    protected $viewFolder;
    protected $className;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/cms';
        $this->data['menuActive'] = 'cms';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Seo_manager";
        $this->load->model( ADMIN_VIEWS . '/model_cms', 'modelNameAlias');

        $this->className = 'Courses';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'ASC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'orderby';

        $fields = array(
            'name',
            'meta_title',
            'created_on',
            'id'
        );

        $this->data['count'] = $this->modelNameAlias->countAllRecords();
        $this->data['records'] = $this->modelNameAlias->fetchFields($fields, array(), array($field=>$sort), 25, $offset);

        $this->load->library('pagination');
        $config['total_rows'] = $this->data['count'];
        $config['base_url'] = $this->data['ctrlUrl'] . '/index';
        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->addLog($this->data['user']['full_name'] ." viewed poster design users list from IP:  " . $this->input->ip_address());

        $this->load->view($this->layout, $this->data);

    }

    public function edit($id) {

        $this->data['content'] = $this->viewFolder . '/edit';
        $this->data['record'] = $this->modelNameAlias->fetchById($id);

        $post['name'] = $this->data['record']->name;
        $post['meta_title'] = $this->data['record']->meta_title;
        $post['meta_keywords'] = $this->data['record']->meta_keywords;
        $post['meta_description'] = $this->data['record']->meta_description;
        $post['content'] = $this->data['record']->content;

        $this->data['post'] = $post;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

   				 $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
   				 $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean|required');
   				 $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|xss_clean');
           $this->form_validation->set_rules('meta_description', 'Meta description', 'trim|xss_clean');
   				 $this->form_validation->set_rules('content', 'Page content', 'trim|xss_clean');

   				 $this->form_validation->set_error_delimiters('', '');

   				 if($this->form_validation->run() == TRUE) {

               $data_array = array(
                  'name' => $this->input->post('name', TRUE),
                  'meta_title' => $this->input->post('meta_title', TRUE),
                  'meta_keywords' => $this->input->post('meta_keywords', TRUE),
                  'meta_description' => $this->input->post('meta_description', TRUE),
                  'content' => $this->input->post('content', TRUE)
               );

               //Update the page details to database
               $this->modelNameAlias->save($data_array, array('id' => $id));

               //Clear all cache for the pages
               $this->output->clear_all_cache();
               
               $this->session->set_flashdata('success_message', 'Page details has been updated');
               redirect($this->data['ctrlUrl']);

           }

        }

        $this->load->view($this->layout, $this->data);

    }

}
