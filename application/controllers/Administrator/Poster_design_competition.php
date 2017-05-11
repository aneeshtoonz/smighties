<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poster_design_competition extends Admin_Controller {

    protected $viewFolder;
    protected $className;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/poster_design_competition';
        $this->data['menuActive'] = 'poster_design_competition';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Poster_design_competition";
        $this->load->model( ADMIN_VIEWS . '/model_poster_design_register', 'modelNameAlias');

        $this->className = 'Poster_design_competition';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'DESC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'id';

        $fields = array(
            'name',
            'education',
            'contact_no',
            'email',
            'created_on',
            'dob',
            'id',
            'source'
        );

        $this->data['count'] = $this->modelNameAlias->countAllRecords();
        $this->data['records'] = $this->modelNameAlias->fetchFields($fields, array(), array($field=>$sort), 25, $offset);
        $this->data['count_source_group'] = $this->modelNameAlias->getCountBySource();

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

    public function view($id) {

        if(!empty($id)) {

            $this->data['content'] = $this->viewFolder . '/view';
            $this->data['record'] = $this->modelNameAlias->fetchById($id);
            $this->load->view($this->layout, $this->data);

            $this->addLog($this->data['user']['full_name'] ." Viewed a user details with id " . $this->data['record']->id . " from IP : " . $this->input->ip_address());

        } else {

            $this->session->set_flashdata('error_message', 'No such user has been found');
            redirect($this->data['ctrlUrl']);
        }

    }

    public function site_traffic() {

        $this->data['content'] = $this->viewFolder . '/traffic';
        $offset = (isset($_GET) && !empty($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $this->data['sort'] = $sort = (isset($_GET) && !empty($_GET['sort'])) ? $_GET['sort'] : 'DESC';
        $this->data['field'] = $field = (isset($_GET) && !empty($_GET['field'])) ? $_GET['field'] : 'created_on';

        $this->load->model( ADMIN_VIEWS. '/model_poster_traffic', 'modelTrafficAlias');

        $fields = array(
            'ip_address',
            'source',
            'created_on'
        );

        $this->data['count'] = $this->modelTrafficAlias->countAllRecords();
        $this->data['records'] = $this->modelTrafficAlias->fetchFields($fields, array(), array($field=>$sort), 25, $offset);
        $this->data['count_source_group'] = $this->modelTrafficAlias->getCountBySource();

        $this->load->library('pagination');
        $config['total_rows'] = $this->data['count'];
        $config['base_url'] = $this->data['ctrlUrl'] . '/site_traffic';
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

    public function export() {

          //load our new PHPExcel library
          $this->load->library('excel');
          //activate worksheet number 1
          $this->excel->setActiveSheetIndex(0);

          $this->addLog($this->data['user']['full_name'] ." made an export of data from tbl_poster_... from IP: " . $this->input->ip_address());

          //name the worksheet
          $this->excel->getActiveSheet()->setTitle('Poster design competition');

          $fields = array(
             'name',
             'contact_no',
             'email',
             'education',
             'institution',
             'dob',
             'address',
             'created_on'
          );

          $records = $this->modelNameAlias->fetchFields($fields,array(),array('name'=>'ASC'));

          $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(12);
          $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setSize(12);

          $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);

          $this->excel->getActiveSheet()->setCellValue('A1', "Name");
          $this->excel->getActiveSheet()->setCellValue('B1', "Contact No.");
          $this->excel->getActiveSheet()->setCellValue('C1', "Email address");
          $this->excel->getActiveSheet()->setCellValue('D1', "Education");
          $this->excel->getActiveSheet()->setCellValue('E1', "Institution");

          $this->excel->getActiveSheet()->setCellValue('F1', "Date of Birth");
          $this->excel->getActiveSheet()->setCellValue('G1', "Address");
          $this->excel->getActiveSheet()->setCellValue('H1', "Added on");

          $this->excel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('B')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('C')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('D')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('E')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('F')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('G')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('H')->setAutoSize(true);

          for ($i = 0; $i < count($records); $i++) {
                $this->excel->getActiveSheet()->setCellValue('A' . ($i + 2), $records[$i]->name)
                                          ->setCellValue('B' . ($i + 2), $records[$i]->contact_no)
                                          ->setCellValue('C' . ($i + 2), $records[$i]->email)
                                          ->setCellValue('D' . ($i + 2), $records[$i]->education)
                                          ->setCellValue('E' . ($i + 2), ucfirst($records[$i]->institution))
                                          ->setCellValue('F' . ($i + 2), $records[$i]->dob)
                                          ->setCellValue('G' . ($i + 2), $records[$i]->address)
                                          ->setCellValue('H' . ($i + 2), date('d F Y', strtotime($records[$i]->created_on)));

          }

          $time = date('d_m_Y');
          $filename = 'Excel_Poster_Design_Competition_' . $time . '.xls';

          header('Content-Type: application/vnd.ms-excel'); //mime type
          header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
          header('Cache-Control: max-age=0'); //no cache

          //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
          //if you want to save it as .XLSX Excel 2007 format
          $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

          //force user to download the Excel file without writing it to server's HD
          $objWriter->save('php://output');

    }

}
