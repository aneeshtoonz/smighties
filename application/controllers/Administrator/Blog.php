<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Admin_Controller {

    protected $viewFolder;
    protected $className;
    public $imageUpPath = BLOG_UP_PATH;
    public $imageShowPath = BLOG_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/blog';
        $this->data['menuActive'] = 'blog';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Blog";
        $this->load->model( ADMIN_VIEWS . '/model_blog', 'modelNameAlias');
        $this->className = 'Blog';
    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'ASC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'created_date';

        $fields = array(
            'title as name',
            'seo_title as meta_title',
            'created_date as created_on',
            'status as published',
            'ordering',
            'bid as id'
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

        $post['title'] = '';
        $post['seo_title'] = '';
        $post['detail_news'] = '';
        $post['description'] = '';
        $post['meta_keywords'] = '';
        $post['meta_description'] = '';

        $this->data['post'] = $post;

        $ImageName = NULL;
        $uploadstatus = '';
        $error = false;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

   				 $this->form_validation->set_rules('title', 'Name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('seo_title', 'Short name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('detail_news', 'Course duration', 'trim|xss_clean|required');
           $this->form_validation->set_rules('description', 'Affiliation', 'trim|xss_clean');
   				 $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|xss_clean');
           $this->form_validation->set_rules('meta_description', 'Meta description', 'trim|xss_clean');
   				 $this->form_validation->set_error_delimiters('', '');

           //Get image field
           $image_name        = $_FILES["userfile"]["name"];
           $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

           if(empty($image_name)) {

               $error = true;
               $this->data['IMGError'] = 'Y';
               $this->data['IMGMSG'] = 'Please upload an image with resolution 640px - 640px';
           }

   				 if($this->form_validation->run() == TRUE && $error) {

               //Upload the image first
               $fileAttrs = array(
                   'imgPath' => $this->imageUpPath,
                   'maxSize' => '1024',
                   'maxWidth' => '900',
                   'maxHeight' => '450',
                   'thumbCrop' => "Y",
                   'thumbUpPath' => $this->imageUpPath,
                   'thumbWidth' => '600',
                   'thumbHeight' => '400',
                   'createThumb' => TRUE
               );

               $upload_array   =  $this->upload_image('userfile', $image_name, NULL, $fileAttrs);
               $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
               $data["uploadMSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
               $data["uploadError"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
               $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';

               if ($uploadstatus != "Error") {

                   $data_array = array(
                      'title' => $this->input->post('title', TRUE),
                      'seo_title' => $this->input->post('seo_title', TRUE),
                      'detail_news' => $this->input->post('detail_news', TRUE),
                      'description' => $this->input->post('description', TRUE),
                      'small_image' => (!empty($image_name)) ? $ImageName : NULL,
                      'large_image' => (!empty($image_name)) ? $ImageName : NULL,
                      'meta_keywords' => $this->input->post('meta_keywords', TRUE),
                      'meta_description' => $this->input->post('meta_description', TRUE),
                      'created_date' => date('Y-m-d h:i:s A')
                   );

                   //Update the page details to database
                   $this->modelNameAlias->save($data_array);

                   //Clear all cache for the pages
                   $this->output->clear_all_cache();

                   $this->session->set_flashdata('success_message', 'News details has been added');
                   redirect($this->data['ctrlUrl']);

               }

           }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function edit($id) {

        $this->data['content'] = $this->viewFolder . '/edit';
        $this->data['record'] = $this->modelNameAlias->fetchById($id);

        $post['title'] = $this->data['record']->title;
        $post['seo_title'] = $this->data['record']->seo_title;
        $post['detail_news'] = $this->data['record']->detail_news;
        $post['description'] = $this->data['record']->description;
        $post['meta_keywords'] = $this->data['record']->meta_keywords;
        $post['meta_description'] = $this->data['record']->meta_description;

        $this->data['post'] = $post;
        $this->data['image_url'] = $this->data['record']->large_image;
        $this->data['imageShowPath'] = $this->imageShowPath;

        $ImageName = NULL;
        $uploadstatus = '';
        $error = false;

        if($this->input->post()) {

           $this->data['post'] = $this->input->post();
   				 $this->load->library('form_validation');

   				 $this->form_validation->set_rules('title', 'Name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('seo_title', 'Short name', 'trim|xss_clean|required');
           $this->form_validation->set_rules('detail_news', 'Course duration', 'trim|xss_clean|required');
           $this->form_validation->set_rules('description', 'Affiliation', 'trim|xss_clean');
   				 $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|xss_clean');
           $this->form_validation->set_rules('meta_description', 'Meta description', 'trim|xss_clean');
   				 $this->form_validation->set_error_delimiters('', '');

   				 if($this->form_validation->run() == TRUE) {

               //Get image field
               $image_name        = $_FILES["userfile"]["name"];
               $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

               if(!empty($image_name)) {

                   //Upload the image first
                   $fileAttrs = array(
                       'imgPath' => $this->imageUpPath . "/hd",
                       'maxSize' => '1024',
                       'maxWidth' => '900',
                       'maxHeight' => '450',
                       'thumbCrop' => "Y",
                       'thumbUpPath' => $this->imageUpPath,
                       'thumbWidth' => '600',
                       'thumbHeight' => '400',
                       'createThumb' => TRUE
                   );

                   $upload_array   =  $this->upload_image('userfile', $image_name, NULL, $fileAttrs);
                   $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                   $data["uploadMSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
                   $data["uploadError"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                   $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';

               } else {
                   $ImageName = $this->data['record']->large_image;
               }

               if ($uploadstatus != "Error") {

                   $data_array = array(
                      'title' => $this->input->post('title', TRUE),
                      'seo_title' => $this->input->post('seo_title', TRUE),
                      'detail_news' => $this->input->post('detail_news', TRUE),
                      'description' => $this->input->post('description', TRUE),
                      'small_image' => (!empty($ImageName)) ? $ImageName : NULL,
                      'large_image' => (!empty($ImageName)) ? $ImageName : NULL,
                      'meta_keywords' => $this->input->post('meta_keywords', TRUE),
                      'meta_description' => $this->input->post('meta_description', TRUE)
                   );

                   //Update the page details to database
                   $this->modelNameAlias->save($data_array, array('bid' => $id));

                   //Clear all cache for the pages
                   $this->output->clear_all_cache();

                   $this->session->set_flashdata('success_message', 'News details has been added');
                   redirect($this->data['ctrlUrl']);

               }

           }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function publish( $id, $status) {

        $record = $this->modelNameAlias->fetchById($id);

        if($record) {

            $data_array = array(
                'status' => $status
            );

            $this->modelNameAlias->save( $data_array, array('bid' => $id));

            $this->addLog($this->className . " status changed to " . $status . " :- ". $record->title);
            $this->session->set_flashdata('success_message', $this->className . ' status changed');
            redirect($this->data['ctrlUrl']);

        } else {

            $this->session->set_flashdata('success_message', $this->className . ' not found');
            redirect($this->data['ctrlUrl']);
        }

   }

   public function delete($id) {

       $record = $this->modelNameAlias->fetchById($id);

       if($record) {

           $this->modelNameAlias->delete(array('bid' => $id));

           $this->addLog($this->className . " deleted :- ". $record->name);

           $this->session->set_flashdata('success_message', $this->className . ' deleted from records');
           redirect($this->data['ctrlUrl']);

       } else {

           $this->session->set_flashdata('success_message', $this->className . ' not found');
           redirect($this->data['ctrlUrl']);
       }

   }

}
