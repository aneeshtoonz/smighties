<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_courses extends MY_Model {

    protected $table = TBL_COURSES;
    protected $primary_key = 'id';

    public function fetchCourses($fields, $where, $orderby) {
        //$this->output->enable_profiler(true);
        $this->db->select($fields)
                 ->from($this->table)
                 ->where($where);

        $this->db->order_by("orderby","ASC");

       $query = $this->db->get();
       return ($query->num_rows() > 0) ? $query->result_array() : false;

    }

}
