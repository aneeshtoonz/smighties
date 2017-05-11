<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_gaming_query extends MY_Model
{

    protected $table = TBL_COURSES_GAMING_QUERY;
    protected $primary_key = 'id';

    public function getCountBySource() {

        $this->db->select("COUNT(id) as count, source")
                 ->from($this->table)
                 ->group_by('source');

        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result() : false;

    }

}
