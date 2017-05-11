<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_cms extends MY_Model {

    protected $table = TBL_CMS;
    protected $primary_key = 'id';

    public function get_page_by_id($id) {
       return parent::fetchById($id);
    }

    public function get_page_by_title($title) {
       return parent::fetchRow(array('name LIKE' => '%' . $title . "%", 'is_active' => 'Y'));
    }

}
