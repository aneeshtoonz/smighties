<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Async extends CI_Controller {

    private $message = array();

		public function __construct() {
			 parent::__construct();
		}

		public function get_smighties() {

			 //  $this->data['content'] = SITE_VIEWS . '/async/get_smighties';
       $this->load->model(SITE_MODELS . '/model_smighties', 'modelNameAlias');
       $this->data['records'] = $this->modelNameAlias->get_smighties($_GET);
       $this->data['page'] = $_GET['page'];
       
       $this->data['image_show_path'] = SMIGHTIES_SHOW_PATH;

			 $this->load->view(SITE_VIEWS . '/async/get_smighties', $this->data);
		}

    public function smighty_profile($profile_id) {

        $this->load->model(SITE_MODELS . '/model_smighties', 'modelNameAlias');
        $this->data['data'] = $this->modelNameAlias->fetchById($profile_id);
        $this->data['image_show_path'] = SMIGHTIES_SHOW_PATH;
        $this->data['card_show_path'] = SMIGHTIES_CARD_SHOW_PATH;

        $this->load->view(SITE_VIEWS . '/async/smighty_profile', $this->data);
    }

    public function generate_avatar() {

       $avatar__temp = AVATAR_TEMP_UP_PATH;
       $avatar__show = AVATAR_SHOW_PATH;
       $avatar__uppath = AVATAR_UP_PATH;
       $avatar_badge = AVATAR_BADGE_PATH;

       if(isset($_POST) && !empty($_POST['url'])) {

           $filename__id = $_POST['id'];
           file_put_contents($avatar__temp . '/' . $filename__id . '.jpg', file_get_contents($_POST['url']));

           $this->merge($avatar__temp . '/' . $filename__id . '.jpg', AVATAR_BADGE_PATH, $avatar__uppath . '/' . $filename__id . '.jpg');

           //  If temp is found clear that
           if(file_exists($avatar__temp . '/' . $filename__id . '.jpg')) { unlink($avatar__temp . '/' . $filename__id . '.jpg'); }

           $this->message['code'] = 200;
           $this->message['message'] = 'Avatar has been generated successfully';
           $this->message['data'] = $avatar__show . '/' . $filename__id . '.jpg';

       } else {

          $this->message['code'] = 400;
          $this->message['message'] = 'No image has been found';
          $this->message['data'] = false;
       }

       echo json_encode($this->message);

    }

    public function smighty_friend() {

        $friend__temp = FRIEND_TEMP_UP_PATH;
        $friend__show = FRIEND_SHOW_PATH;
        $friend__uppath = FRIEND_UP_PATH;
        $friend__badge = FRIEND_BADGE_PATH;

        if(isset($_POST) && !empty($_POST['url'])) {

            $filename__id = $_POST['id'];
            file_put_contents($friend__temp . '/' . $filename__id . '.jpg', file_get_contents($_POST['url']));

            $this->merge($friend__temp . '/' . $filename__id . '.jpg', $friend__badge, $friend__uppath . '/' . $filename__id . '.jpg');

            $this->message['code'] = 200;
            $this->message['message'] = 'Smighty friend has been found';
            $this->message['data'] = $friend__show . '/' . $filename__id . '.jpg';

        } else {

           $this->message['code'] = 400;
           $this->message['message'] = 'No image has been found';
           $this->message['data'] = false;
        }

        echo json_encode($this->message);

    }

    function merge($filename_x, $filename_y, $filename_result) {

        $dest = imagecreatefromjpeg($filename_x);
        $src = imagecreatefrompng($filename_y);

        imagecopyresampled($dest, $src, 0, 0, 0, 0, 200, 200, 200, 200);
        imagejpeg($dest, $filename_result);

    }

}
