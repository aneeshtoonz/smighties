<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function index() {

			 $this->data['content'] = SITE_VIEWS . '/parents';
			 $this->data['current_item'] = 'parents';
			 $this->data['class__styles'] = 'container-about';

			 $this->load->view($this->layout, $this->data);

		}

}
