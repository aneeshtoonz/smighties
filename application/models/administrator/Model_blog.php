<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_blog extends MY_Model {

    protected $table = TBL_BLOG;
    protected $primary_key = 'bid';

}
