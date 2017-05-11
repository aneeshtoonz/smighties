<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends Admin_Controller {

    protected $viewFolder;
    protected $className;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/comments';
        $this->data['menuActive'] = 'comments';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Comments";
        $this->load->model( ADMIN_VIEWS . '/model_comments', 'modelNameAlias');
        $this->className = 'Comments';
    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'ASC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'pdate';

        $fields = array(
            'owner as name',
            'email',
            'pdate as created_on',
            'status as published',
            'cid as id'
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

        $this->addLog($this->data['user']['full_name'] ." viewed comments list from IP:  " . $this->input->ip_address());

        $this->load->view($this->layout, $this->data);

    }

    public function view($id) {

        if(!empty($id)) {

            $this->data['content'] = $this->viewFolder . '/view';

            $join = array(
                array('table' => TBL_BLOG, 'condition' => TBL_BLOG . '.bid = ' . TBL_COMMENTS . '.bid' , 'join_type' => 'LEFT')
            );

            $fields = array(
              TBL_COMMENTS . '.cid',
              TBL_COMMENTS . '.owner',
              TBL_COMMENTS . '.email',
              TBL_COMMENTS . '.pdate',
              TBL_COMMENTS . '.comments',
              TBL_COMMENTS . '.status',
              TBL_BLOG . '.title as blog_title'
            );

            $this->data['record'] = $this->modelNameAlias->fetchRowFields($fields, array('cid' => $id), array(), $join);
            $this->load->view($this->layout, $this->data);

            $this->addLog($this->data['user']['full_name'] ." Viewed a user comment with id " . $this->data['record']->id . " from IP : " . $this->input->ip_address());

        } else {

            $this->session->set_flashdata('error_message', 'No such user has been found');
            redirect($this->data['ctrlUrl']);
        }

    }

    public function publish( $id, $status) {

        $record = $this->modelNameAlias->fetchById($id);

        if($record) {

            $data_array = array(
                'status' => $status
            );

            $this->modelNameAlias->save( $data_array, array('cid' => $id));

            $this->addLog($this->className . " status changed to " . $status . " :- ". $record->owner);
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

           $this->modelNameAlias->delete(array('cid' => $id));

           $this->addLog($this->className . " deleted :- ". $record->owner);

           $this->session->set_flashdata('success_message', $this->className . ' deleted from records');
           redirect($this->data['ctrlUrl']);

       } else {

           $this->session->set_flashdata('success_message', $this->className . ' not found');
           redirect($this->data['ctrlUrl']);
       }

   }

}
