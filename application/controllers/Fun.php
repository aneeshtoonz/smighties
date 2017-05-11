<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fun extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function games() {

			 $this->data['content'] = SITE_VIEWS . '/fun/games';
			 $this->data['current_item'] = 'funspace';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function friend() {

			 $this->data['content'] = SITE_VIEWS . '/fun/smighty_friend';
			 $this->data['current_item'] = 'funspace';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

    public function avatar() {

			 $this->data['content'] = SITE_VIEWS . '/fun/smighty_avatar';
			 $this->data['current_item'] = 'funspace';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function smighty_art() {

			 $this->data['content'] = SITE_VIEWS . '/fun/share-ideas';
			 $this->data['current_item'] = 'funspace';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function smightyze() {

			 $this->data['content'] = SITE_VIEWS . '/fun/smightyze';
			 $this->data['current_item'] = 'funspace';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

}
