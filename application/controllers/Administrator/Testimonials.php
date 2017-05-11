<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends Admin_Controller {

    protected $viewFolder;
    protected $className;
    public $imageUpPath;
    public $imageShowPath = TESTIMONIAL_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/testimonials';
        $this->data['menuActive'] = 'testimonials';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Testimonials";
        $this->load->model( ADMIN_VIEWS . '/model_testimonials', 'modelNameAlias');

        $this->imageUpPath = TESTIMONIAL_UP_PATH;

        $this->className = 'Testimonials';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'ASC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'created_on';

        $fields = array(
            'name',
            'company',
            'designation',
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

    public function add() {

        $this->data['content'] = $this->viewFolder . '/add';

        $post['name'] = '';
        $post['company'] = '';
        $post['designation'] = '';
        $post['fb_url'] = '';
        $post['comment'] = '';
        $post['show_home'] = false;

        $this->data['post'] = $post;

        $ImageName = NULL;
        $uploadstatus = '';
        $error = false;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

   				 $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('company', 'Company', 'trim|xss_clean|required');
           $this->form_validation->set_rules('designation', 'Designation', 'trim|xss_clean|required');
           $this->form_validation->set_rules('fb_url', 'Facebook URL', 'trim|xss_clean');
           $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
   				 $this->form_validation->set_error_delimiters('', '');

   				 if($this->form_validation->run() == TRUE) {

               //Get image field
               $image_name        = $_FILES["userfile"]["name"];
               $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

               if(empty($image_name)) {

                   $error = true;
                   $this->data['Error'] = 'Y';
                   $this->data['MSG'] = 'Please upload an image with resolution 640px - 640px';
               } else {

                   //Upload the image first
                   $fileAttrs = array(
                       'imgPath' => $this->imageUpPath,
                       'maxSize' => '1024',
                       'maxWidth' => '100',
                       'maxHeight' => '100',
                       'thumbCrop' => "N"
                   );

                   $upload_array   =  $this->upload_image('userfile', $image_name, NULL, $fileAttrs);
                   $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                   $data["uploadMSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
                   $data["uploadError"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                   $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
               }

               //If image is uploaded successfully
               if ($uploadstatus != "Error") {

                   $data_array = array(
                      'name' => $this->input->post('name', TRUE),
                      'company' => $this->input->post('company', TRUE),
                      'image_url' => (!empty($image_name)) ? $ImageName : NULL,
                      'designation' => $this->input->post('designation', TRUE),
                      'fb_url' => $this->input->post('fb_url', TRUE),
                      'comment' => $this->input->post('comment', TRUE),
                      'show_home' => ($this->input->post('show_home', TRUE)) ? 'Y' : 'N',
                      'created_on' => date('Y-m-d h:i:s A')
                   );

                   //Update the page details to database
                   $this->modelNameAlias->save($data_array);

                   //Clear all cache for the pages
                   $this->output->clear_all_cache();

                   $this->session->set_flashdata('success_message', 'Testimonial has been saved');
                   redirect($this->data['ctrlUrl']);

               }

           }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function edit($id) {

        $this->data['content'] = $this->viewFolder . '/edit';
        $this->data['record'] = $this->modelNameAlias->fetchById($id);

        $post['name'] = $this->data['record']->name;
        $post['company'] = $this->data['record']->company;
        $post['designation'] = $this->data['record']->designation;
        $post['fb_url'] = $this->data['record']->fb_url;
        $post['comment'] = $this->data['record']->comment;
        $post['show_home'] = ($this->data['record']->show_home == 'Y') ? true : false;

        $this->data['post'] = $post;
        $this->data['image_url'] = $this->data['record']->image_url;
        $this->data['imageShowPath'] = $this->imageShowPath;

        $ImageName = NULL;
        $uploadstatus = '';
        $error = false;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

   				 $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('company', 'Company', 'trim|xss_clean|required');
           $this->form_validation->set_rules('designation', 'Designation', 'trim|xss_clean|required');
           $this->form_validation->set_rules('fb_url', 'Facebook URL', 'trim|xss_clean');
           $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
   				 $this->form_validation->set_error_delimiters('', '');

   				 if($this->form_validation->run() == TRUE) {

               //Get image field
               $image_name        = $_FILES["userfile"]["name"];
               $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

               if(empty($image_name)) {

                   $error = true;
                   $this->data['Error'] = 'Y';
                   $this->data['MSG'] = 'Please upload an image with resolution 640px - 640px';
               } else {

                   //Upload the image first
                   $fileAttrs = array(
                       'imgPath' => $this->imageUpPath,
                       'maxSize' => '1024',
                       'maxWidth' => '100',
                       'maxHeight' => '100',
                       'thumbCrop' => "N"
                   );

                   $upload_array   =  $this->upload_image('userfile', $image_name, $this->data['record']->image_url, $fileAttrs);
                   $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                   $data["uploadMSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
                   $data["uploadError"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                   $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
               }

               //If image is uploaded successfully
               if ($uploadstatus != "Error") {

                   $data_array = array(
                      'name' => $this->input->post('name', TRUE),
                      'company' => $this->input->post('company', TRUE),
                      'image_url' => (!empty($image_name)) ? $ImageName : NULL,
                      'designation' => $this->input->post('designation', TRUE),
                      'fb_url' => $this->input->post('fb_url', TRUE),
                      'comment' => $this->input->post('comment', TRUE),
                      'show_home' => ($this->input->post('show_home', TRUE)) ? 'Y' : 'N',
                      'updated_on' => date('Y-m-d h:i:s A')
                   );

                   //Update the page details to database
                   $this->modelNameAlias->save($data_array, array('id' => $id));

                   //Clear all cache for the pages
                   $this->output->clear_all_cache();

                   $this->session->set_flashdata('success_message', 'Testimonial has been updated');
                   redirect($this->data['ctrlUrl']);

               }

           }

        }

        $this->load->view($this->layout, $this->data);

    }

}
