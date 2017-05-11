<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_news extends MY_Model {

    protected $table = TBL_NEWS;
    protected $primary_key = 'id';

}
