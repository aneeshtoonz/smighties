<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_logs extends MY_Model
{

    protected $table = TBL_LOGS;

    public function clearLogs()
    {
        return $this->db->empty_table($this->table);
    }

}
