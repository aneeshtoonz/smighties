<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tv extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function index() {

			 $this->data['content'] = SITE_VIEWS . '/tv/index';
			 $this->data['current_item'] = 'tv_index';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function music() {

			 $this->data['content'] = SITE_VIEWS . '/tv/music';
			 $this->data['current_item'] = 'tv_music_index';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

}
