<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Admin_Controller {

    protected $viewFolder;
    protected $className;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/course';
        $this->data['menuActive'] = 'course';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Course";
        $this->load->model( ADMIN_VIEWS . '/model_course', 'modelNameAlias');

        $this->className = 'Course';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'ASC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'created_on';

        $fields = array(
            'name',
            'meta_title',
            'created_on',
            'id',
            'orderby',
            'is_active'
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

    public function add() {

        $this->data['content'] = $this->viewFolder . '/add';

        $post['name'] = '';
        $post['short_name'] = '';
        $post['duration'] = '';
        $post['affiliation'] = '';
        $post['seo_link'] = '';
        $post['meta_title'] = '';
        $post['meta_keywords'] = '';
        $post['meta_description'] = '';
        $post['content'] = '';
        $post['category'] = '';

        $this->data['post'] = $post;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

   				 $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('short_name', 'Short name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('duration', 'Course duration', 'trim|xss_clean|required');
           $this->form_validation->set_rules('affiliation', 'Affiliation', 'trim|xss_clean');
           $this->form_validation->set_rules('seo_link', 'SEO Url', 'trim|required|xss_clean');
   				 $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean|required');
   				 $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|xss_clean');
           $this->form_validation->set_rules('meta_description', 'Meta description', 'trim|xss_clean');
   				 $this->form_validation->set_rules('content', 'Page content', 'trim|xss_clean');
           $this->form_validation->set_rules('category', 'Category', 'trim|xss_clean|required');

   				 $this->form_validation->set_error_delimiters('', '');

   				 if($this->form_validation->run() == TRUE) {

               $data_array = array(
                  'name' => $this->input->post('name', TRUE),
                  'short_name' => $this->input->post('short_name', TRUE),
                  'duration' => $this->input->post('duration', TRUE),
                  'affiliation' => $this->input->post('affiliation', TRUE),
                  'seo_link' => $this->input->post('seo_link', TRUE),
                  'meta_title' => $this->input->post('meta_title', TRUE),
                  'meta_keywords' => $this->input->post('meta_keywords', TRUE),
                  'meta_description' => $this->input->post('meta_description', TRUE),
                  'content' => $this->input->post('content', TRUE),
                  'category' => $this->input->post('category', TRUE),
                  'created_on' => date('Y-m-d h:i:s A')
               );

               //Update the page details to database
               $this->modelNameAlias->save($data_array);

               //Clear all cache for the pages
               $this->output->clear_all_cache();

               $this->session->set_flashdata('success_message', 'Course details has been added');
               redirect($this->data['ctrlUrl']);

           }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function edit($id) {

        $this->data['content'] = $this->viewFolder . '/edit';
        $this->data['record'] = $this->modelNameAlias->fetchById($id);

        $post['name'] = $this->data['record']->name;
        $post['short_name'] = $this->data['record']->short_name;
        $post['duration'] = $this->data['record']->duration;
        $post['affiliation'] = $this->data['record']->affiliation;
        $post['seo_link'] = $this->data['record']->seo_link;
        $post['meta_title'] = $this->data['record']->meta_title;
        $post['meta_keywords'] = $this->data['record']->meta_keywords;
        $post['meta_description'] = $this->data['record']->meta_description;
        $post['content'] = $this->data['record']->content;
        $post['category'] = $this->data['record']->category;

        $this->data['post'] = $post;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

           $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('short_name', 'Short name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('duration', 'Course duration', 'trim|xss_clean|required');
           $this->form_validation->set_rules('affiliation', 'Affiliation', 'trim|xss_clean');
           $this->form_validation->set_rules('seo_link', 'SEO Url', 'trim|required|xss_clean');
   				 $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|xss_clean|required');
   				 $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|xss_clean');
           $this->form_validation->set_rules('meta_description', 'Meta description', 'trim|xss_clean');
   				 $this->form_validation->set_rules('content', 'Page content', 'trim|xss_clean');
           $this->form_validation->set_rules('category', 'Category', 'trim|xss_clean|required');

   				 $this->form_validation->set_error_delimiters('', '');

   				 if($this->form_validation->run() == TRUE) {

               $data_array = array(
                  'name' => $this->input->post('name', TRUE),
                  'short_name' => $this->input->post('short_name', TRUE),
                  'duration' => $this->input->post('duration', TRUE),
                  'affiliation' => $this->input->post('affiliation', TRUE),
                  'seo_link' => $this->input->post('seo_link', TRUE),
                  'meta_title' => $this->input->post('meta_title', TRUE),
                  'meta_keywords' => $this->input->post('meta_keywords', TRUE),
                  'meta_description' => $this->input->post('meta_description', TRUE),
                  'content' => $this->input->post('content', TRUE),
                  'category' => $this->input->post('category', TRUE),
                  'updated_on' => date('Y-m-d h:i:s A')
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

    public function publish( $id, $status) {

        $record = $this->modelNameAlias->fetchById($id);

        if($record) {

            $data_array = array(
                'is_active' => $status
            );

            $this->modelNameAlias->save( $data_array, array('id' => $id));

            $this->addLog($this->className . " status changed to " . $status);
            $this->session->set_flashdata('success_message', $this->className . ' status changed');
            redirect($this->data['ctrlUrl']);

        } else {

            $this->session->set_flashdata('success_message', $this->className . ' not found');
            redirect($this->data['ctrlUrl']);
        }

   }

   public function order() {

       $post = $_POST;

       if(!empty($post) && count($post) > 0) {

           for( $i = 0; $i < count($post['array_id']); $i++) {

               $data_array = array(
                   'orderby' => $post['orderby'][$i]
               );

               $where = array(
                  'id' => $post['array_id'][$i]
               );

               $this->modelNameAlias->save( $data_array, $where);

           }

           $this->session->set_flashdata('success_message', $this->className . ' order changed');
           redirect($this->data['ctrlUrl']);

       } else {

           $this->session->set_flashdata('success_message', $this->className . ' order missing');
           redirect($this->data['ctrlUrl']);
       }

  }

}
