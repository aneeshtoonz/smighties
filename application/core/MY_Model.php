<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

/**
 * Generalised model.
 * @author ratheeshkv
 */
class MY_Model extends CI_Model {

   public function getTblName(){
      return $this->table;
    }

   /**
    * Insert and update table data
    * @param array $data
    * @param array $where
    */
   public function save($data, $where = array()) {

      if (!empty($this->table)) {
         if (isset($where) && !empty($where)) {
            return $this->db->update($this->table, $data, $where);
         } else {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
         }
      }
      return false;
   }

   /**
    * Delete records from table
    * @param array $where
    */
   public function delete($where = array()) {
      if (!empty($this->table)) {
         if (isset($where) && !empty($where)) {
            try {
                $this->db->delete($this->table, $where);
               return true;
            } catch (Exception $e) {
               $msg = $this->db->_error_message();
               $num = $this->db->_error_number();
               return array('error' => "Error(" . $num . ") " . $msg);
            }
         }
      }
      return false;
   }

   /**
    * Fetch all records. Fetch records without any criteria and with certain criteria
    * @param array $where
    * @param array $orderBy (key should be field name and value should be asc or desc)
    * @param int $count
    * @param int $offset
    * @param array $join (two dimensional array, each with keys 'table'->table name to join, 'condition'->join condition, 'join_type->'left join / right join...)
    */
   public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array(), $groupby = '') {

      if(!empty($this->fields) && count($this->fields) > 0)
      {
         $this->db->select($this->fields);
      }

      if (!empty($this->table)) {
         /** Where conditions * */
         if (isset($where) && !empty($where)) {
            $this->db->where($where);
         }
         /** Orderby conditions * */
         if (isset($orderBy) && !empty($orderBy)) {
            foreach ($orderBy as $field => $order) {
               $this->db->order_by($field, $order);
            }
         }
         /** Limit and offset * */
         if (!empty($limit) && is_numeric($limit)) {
            $offset = is_numeric($offset) ? $offset : 0;
            $this->db->limit($limit, $offset);
         }
         /** Join conditions * */
         if (isset($join) && !empty($join)) {
            foreach ($join as $field => $join_item) {
               $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
            }
         }

         /** Join conditions * */
         if (isset($groupby) && !empty($groupby)) {
            $this->db->group_by($groupby);
         }
         return $this->db->get($this->table)->result();
      }
      return false;
   }


   /**
    * Fetch all records. Fetch records without any criteria and with certain criteria
    * @param array $where
    * @param array $orderBy (key should be field name and value should be asc or desc)
    * @param int $count
    * @param int $offset
    * @param array $join (two dimensional array, each with keys 'table'->table name to join, 'condition'->join condition, 'join_type->'left join / right join...)
    */
   public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()) {

      if(!empty($fields) && count($fields) > 0)
      {
         $this->db->select($fields);
      }

      if (!empty($this->table)) {
         /** Where conditions * */
         if (isset($where) && !empty($where)) {
            $this->db->where($where);
         }
         /** Orderby conditions * */
         if (isset($orderBy) && !empty($orderBy)) {
            foreach ($orderBy as $field => $order) {
               $this->db->order_by($field, $order);
            }
         }
         /** Limit and offset * */
         if (!empty($limit) && is_numeric($limit)) {
            $offset = is_numeric($offset) ? $offset : 0;
            $this->db->limit($limit, $offset);
         }
         /** Join conditions * */
         if (isset($join) && !empty($join)) {
            foreach ($join as $field => $join_item) {
               $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
            }
         }
         return $this->db->get($this->table)->result();
      }
      return false;
   }


   /**
    * Fetch all records. Fetch records without any criteria and with certain criteria
    * @param array $where_like
    * @param array $orderBy (key should be field name and value should be asc or desc)
    * @param int $count
    * @param int $offset
    * @param array $join (two dimensional array, each with keys 'table'->table name to join, 'condition'->join condition, 'join_type->'left join / right join...)
    */
   public function fetchLike($where_like = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()) {

      if(!empty($this->fields) && count($this->fields) > 0)
      {
         $this->db->select($this->fields);
      }

      if (!empty($this->table)) {
         /** Where conditions * */
         if (isset($where_like) && !empty($where_like)) {
            $this->db->like($where_like);
         }
         /** Orderby conditions * */
         if (isset($orderBy) && !empty($orderBy)) {
            foreach ($orderBy as $field => $order) {
               $this->db->order_by($field, $order);
            }
         }
         /** Limit and offset * */
         if (!empty($limit) && is_numeric($limit)) {
            $offset = is_numeric($offset) ? $offset : 0;
            $this->db->limit($limit, $offset);
         }
         /** Join conditions * */
         if (isset($join) && !empty($join)) {
            foreach ($join as $field => $join_item) {
               $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
            }
         }
         return $this->db->get($this->table)->result();
      }
      return false;
   }

   /**
    * Fetch row data by primary key
    * @param int $id
    */
   public function fetchById($id, $join = array()) {

      if(!empty($this->fields) && count($this->fields) > 0)
      {
         $this->db->select($this->fields);
      }

      if (!empty($this->table)) {
         if (is_numeric($id)) {
            $this->db->where($this->table.'.'.$this->primary_key, $id);
            /** Join conditions * */
            if (isset($join) && !empty($join)) {
               foreach ($join as $field => $join_item) {
                  $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
               }
            }
            return $this->db->get($this->table)->row();
         }
      }
      return false;
   }

   /**
    * Fetch single row
    * @param array $where
    * @param array $orderBy
    * @param array $join
    */

   public function fetchRow($where = array(), $orderBy = array(), $join = array()) {

      if(!empty($this->fields) && count($this->fields) > 0)
      {
         $this->db->select($this->fields);
      }

      if (!empty($this->table)) {

         /** Where conditions * */
         if (isset($where) && !empty($where)) {
            $this->db->where($where);
         }

         /** Orderby conditions * */
         if (isset($orderBy) && !empty($orderBy)) {
            foreach ($orderBy as $field => $order) {
               $this->db->order_by($field, $order);
            }
         }

         /** Join conditions * */
         if (isset($join) && !empty($join)) {
            foreach ($join as $field => $join_item) {
               $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
            }
         }

         return $this->db->get($this->table)->row();

      }

      return false;
   }

   public function fetchRowFields($fields = array(), $where = array(), $orderBy = array(), $join = array()) {

      if(!empty($fields) && count($fields) > 0)
      {
         $this->db->select($fields);
      }

      if (!empty($this->table)) {

         /** Where conditions * */
         if (isset($where) && !empty($where)) {
            $this->db->where($where);
         }

         /** Orderby conditions * */
         if (isset($orderBy) && !empty($orderBy)) {
            foreach ($orderBy as $field => $order) {
               $this->db->order_by($field, $order);
            }
         }

         /** Join conditions * */
         if (isset($join) && !empty($join)) {
            foreach ($join as $field => $join_item) {
               $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
            }
         }

         return $this->db->get($this->table)->row();

      }

      return false;
   }

   public function isExist($param_array) {

      $this->db->select($this->primary_key);
      $this->db->from($this->table);
      $this->db->where($param_array);
      $query = $this->db->get();

      return ($query->num_rows() > 0 ? TRUE : FALSE);
    }

    public function countAllRecords()
    {
       return $this->db->count_all($this->table);
    }

    public function countAllRecordsByCond($where = array(), $join = array())
    {
       if(!empty($where))
       {
          $this->db->where($where);
       }

       /** Join conditions * */
         if (isset($join) && !empty($join)) {
            foreach ($join as $field => $join_item) {
               $this->db->join($join_item['table'], $join_item['condition'], $join_item['join_type']);
            }
         }

       return $this->db->count_all_results($this->table);
    }

    public function lastOrderID() {
      $this->db->select_max('orderby');
      $this->db->from($this->table);
      $query = $this->db->get();
      return $query->row();
    }

}
