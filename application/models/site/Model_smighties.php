<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_smighties extends MY_Model {

    protected $table = TBL_SMIGHTIES;
    protected $primary_key = 'id';


    public function get_smighties($filter) {

        $fields = '*';
        $this->db->select($fields)
                 ->from($this->table);
        // $this->output->enable_profiler(true);

        // Get the parameters from URL
        $name_no = (isset($filter['name_no']) && !empty($filter['name_no'])) ? $filter['name_no'] : false;
        $element = (isset($filter['element']) && !empty($filter['element'])) ? $filter['element'] : false;
        $rarity = (isset($filter['rarity']) && !empty($filter['rarity'])) ? $filter['rarity'] : false;
        $page = (isset($filter['page']) && !empty($filter['page'])) ? $filter['page'] : 0;

        if($name_no) {
           $this->db->where("name LIKE '" . $name_no . "%'");
        }

        if($id != '' && $id != NULL) {
           $this->db->where("id > $id");
        }

        if($element) {
           $this->db->where(array('element' => $element));
        }

        if($rarity) {
           $this->db->where(array('rarity' => $rarity));
        }

        $this->db->order_by('orderby', 'ASC');
        $this->db->limit(8, ($page * 8));

        // $this->output->enable_profiler(TRUE);

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function get_all_count($filter) {

      $fields = 'id';
      $this->db->select($fields)
               ->from($this->table);
      // $this->output->enable_profiler(true);

      // Get the parameters from URL
      $name_no = (isset($filter['name_no']) && !empty($filter['name_no'])) ? $filter['name_no'] : false;
      $element = (isset($filter['element']) && !empty($filter['element'])) ? $filter['element'] : false;
      $rarity = (isset($filter['rarity']) && !empty($filter['rarity'])) ? $filter['rarity'] : false;
      $page = (isset($filter['page']) && !empty($filter['page'])) ? $filter['page'] : 1;

      if($name_no) {
         $this->db->where("name LIKE '" . $name_no . "%'");
      }

      if($id != '' && $id != NULL) {
         $this->db->where("id > $id");
      }

      if($element) {
         $this->db->where(array('element' => $element));
      }

      if($rarity) {
         $this->db->where(array('rarity' => $rarity));
      }

      $this->db->order_by('orderby', 'ASC');

      $query = $this->db->get();

      return $query->num_rows();
    }

    public function batch_insert($data_array) {
       return $this->db->insert_batch($this->table, $data_array);
    }

}
