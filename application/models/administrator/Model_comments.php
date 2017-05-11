<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_comments extends MY_Model {

    protected $table = TBL_COMMENTS;
    protected $primary_key = 'cid';

}
