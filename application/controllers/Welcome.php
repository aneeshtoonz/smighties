<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

		public function __construct() {

			 parent::__construct();

			 $this->data['meta_keywords'] = '$this->meta_keywords'; // Requrioed
			 $this->data['meta_description'] = '$this->meta_description'; //Required

			 //  $this->output->cache(20);
		}

		public function index() {

			 $this->data['content'] = SITE_VIEWS . '/home';
			 $this->data['current_item'] = 'home';
			 $this->data['class__styles'] = 'body';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function about() {

			 $this->data['content'] = SITE_VIEWS . '/about';
			 $this->data['current_item'] = 'about';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function contact() {

			 $this->data['content'] = SITE_VIEWS . '/contact';
			 $this->data['current_item'] = 'contact';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			//Enquiry form post
			if($this->input->post()) {

					 //If any user posts a comment
					 $this->load->library('form_validation');

					 $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
					 $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email');
					 $this->form_validation->set_rules('subject', 'Subject', 'trim|xss_clean');
					 $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

					 $this->form_validation->set_error_delimiters('', '');

					 if($this->form_validation->run() == TRUE) {

								 $name = $this->input->post('name', TRUE);
								 $email = $this->input->post('email', TRUE);
								 $subject = $this->input->post('subject', TRUE);
								 $message = $this->input->post('message', TRUE);

								 //Send an email to admin
								 $this->load->library('email');
		             $this->config->load('email', true);
		             $this->email->from('no-reply@toonzacademy.com', 'Course Enquiry');
		             $this->email->to($to);
		             $this->email->subject(SITE_NAME . ' - Enquiry from website');
								 $this->email->set_mailtype("html");

		             include_once(MISC_PATH . "/emails.php");
		             $message_body = $contact_enquiry;

		             $this->email->message($message_body);

								 if ($this->email->send()) {

										 $this->data['Error'] = 'N';
										 $this->data['MSG'] = 'Message has been send';
		             } else {

										 $this->data['Error'] = 'Y';
										 $this->data['MSG'] = 'Did you miss something? Please check';
		             }

					 } else {
							 $this->data['Error'] = 'Y';
							 $this->data['MSG'] = 'Did you miss something? Please check';
					 }

			}

			$this->load->view($this->layout, $this->data);

		}

		public function privacy() {

			 $this->data['content'] = SITE_VIEWS . '/privacy_policy';
			 $this->data['current_item'] = 'privacy';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function terms() {

			 $this->data['content'] = SITE_VIEWS . '/terms';
			 $this->data['current_item'] = 'terms';
			 $this->data['class__styles'] = 'container-about';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function pedia() {

			 $this->data['content'] = SITE_VIEWS . '/pedia/index';
			 $this->data['current_item'] = 'pedia';
			 $this->data['class__styles'] = 'container-tv';

			 $this->load->model(SITE_MODELS . '/model_smighties', 'modelNameAlias');

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

		public function villains() {

			 $this->data['content'] = SITE_VIEWS . '/pedia/villains';
			 $this->data['current_item'] = 'villains';
			 $this->data['class__styles'] = 'container-tv';

			//  $this->data['meta_title'] = $this->data['page_data']->meta_title;
			//  $this->data['meta_keywords'] = $this->data['page_data']->meta_keywords; // Requrioed
			//  $this->data['meta_description'] = $this->data['page_data']->meta_description; //Required

			 $this->load->view($this->layout, $this->data);

		}

}
