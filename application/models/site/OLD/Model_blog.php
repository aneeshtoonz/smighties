<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_blog extends MY_Model {

    protected $table = TBL_BLOG;
    protected $comments_table = TBL_BLOG_COMMENTS;
    protected $primary_key = 'bid';

    public function get_comments_by_blog_id($id) {

        $this->db->select(array('pdate','email','owner','comments'))
                 ->from($this->comments_table)
                 ->where(array('bid' => $id));

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function save_comment($save) {
        return $this->db->insert( $this->comments_table, $save);
    }

}
