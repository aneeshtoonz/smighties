<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function index() {

			 $this->data['content'] = SITE_VIEWS . '/news';
			 $this->data['current_item'] = 'news';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function details($news__info) {

			 $this->data['content'] = SITE_VIEWS . '/news_details';
			 $this->data['current_item'] = 'news_details';
			 $this->data['class__styles'] = 'container-about';
       
			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

}
