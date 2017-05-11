<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_poster_traffic extends MY_Model
{

    protected $table = TBL_POSTER_DESIGN_TRAFFIC;
    protected $primary_key = 'id';

    public function getCountBySource() {

        $this->db->select("COUNT(DISTINCT(ip_address)) as count, source")
                 ->from($this->table)
                 ->group_by('source');

        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result() : false;

    }
}
