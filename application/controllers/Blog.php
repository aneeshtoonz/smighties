<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function index() {

			 $this->data['content'] = SITE_VIEWS . '/blog';
			 $this->data['current_item'] = 'blog';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function details($blog__info) {

			 $this->data['content'] = SITE_VIEWS . '/blog_details';
			 $this->data['current_item'] = 'blog_details';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

}
