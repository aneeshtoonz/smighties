<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function wallpapers() {

			 $this->data['content'] = SITE_VIEWS . '/downloads/wallpapers';
			 $this->data['current_item'] = 'downloads';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function posters() {

			 $this->data['content'] = SITE_VIEWS . '/downloads/posters';
			 $this->data['current_item'] = 'downloads';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function stickers() {

			 $this->data['content'] = SITE_VIEWS . '/downloads/stickers';
			 $this->data['current_item'] = 'downloads';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

}
