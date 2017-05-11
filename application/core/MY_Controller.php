<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $layout;
    public $join;
    public $data;

    public function __construct() {

        parent::__construct();

        $this->layout = SITE_LAYOUT;
        $this->join = array();

    }

}

class Admin_Controller extends CI_Controller {

    public $layout;
    public $join;
    public $data;

    public function __construct() {

        parent::__construct();

        $this->layout = ADMIN_LAYOUT;
        $this->data['user'] = $this->session->userdata('data_logged');

        if (empty($this->data['user']))
        {
            $this->session->set_userdata('refered_from', current_url());
            redirect(ADMIN_LOGIN);
        }

        $this->join = array();
        $this->load->library('upload');

        $this->load->model(ADMIN_VIEWS . "/model_logs", 'modelLogsAlias');

    }

    protected function getImageConfig($imgName,$fileAttrs)
    {

        $config['upload_path']      = $fileAttrs['imgPath'];
        $config['allowed_types']    = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG|svg|SVG';
        $config['max_size']         = $fileAttrs['maxSize'];
        $config['max_width']        = $fileAttrs['maxWidth'];
        $config['max_height']       = $fileAttrs['maxHeight'];
        $config['file_name']        = $imgName;
        return $config;
    }

    public function upload_image($field_name, $image1_name, $img_name_delete = NULL, $fileAttrs)
    {
        $return_array = array();
        $Image1Name = substr(md5(uniqid(rand())),0,15);
        $Image1Name = "IMG-".$Image1Name.strrchr($image1_name,".");

        $config = $this->getImageConfig($Image1Name,$fileAttrs);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)){
            $return_array["msg"] = strip_tags($this->upload->display_errors());
            $return_array["err"] = "Y";
            $return_array["ups"] = "Error";
        }

        if (!empty($img_name_delete)){
            if (file_exists($fileAttrs['thumbUpPath'].$img_name_delete)) { unlink($fileAttrs['thumbUpPath'].$img_name_delete); }
            if (file_exists($fileAttrs['imgPath'].$img_name_delete)) { unlink($fileAttrs['imgPath'].$img_name_delete); }
        }

        if(!empty($image1_name) && $return_array["err"] != 'Y' && $fileAttrs['createThumb'])
        {
            $this->createThumnail($Image1Name, $fileAttrs);
        }

        $return_array["ImageName"] = $Image1Name;
        return $return_array;
    }

    protected function createThumnail($imgName, $fileAttrs)
    {

        include_once(APPPATH."libraries/thumbnail_images.class.php");

        $obj_img = new thumbnail_images();
        $obj_img->NewWidth   = $fileAttrs['thumbWidth'];
        $obj_img->NewHeight  = $fileAttrs['thumbHeight'];
        $obj_img->Cropping   = $fileAttrs['thumbCrop'];
        $obj_img->PathImgOld = $fileAttrs['imgPath']."/".$imgName;
        $obj_img->PathImgNew = $fileAttrs['thumbUpPath']."/".$imgName;
        $obj_img->create_thumbnail_images();
    }

    protected function getFileConfig($fileName){
        $config['upload_path']      = $this->image_up_path;
        $config['allowed_types']    = 'pdf|doc|docx';
        $config['max_size']         = '5000';
        $config['max_width']        = '5000';
        $config['max_height']       = '5000';
        $config['max_size']         = 0;
        $config['file_name']        = $fileName;
        return $config;
    }

    function upload_file($field_name, $file1_name, $file_name_delete){

            $return_array = array();
            $File1Name = substr(md5(uniqid(rand())),0,15);
            $File1Name = "FILE".$File1Name.strrchr($file1_name,".");
            /* --------------------------
            |   File Uploading
            |  -------------------------*/
            $config = $this->getFileConfig($File1Name);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($field_name)){
                $return_array["msg"] = strip_tags($this->upload->display_errors());
                $return_array["err"] = "Y";
                $return_array["ups"] = "Error";
            }
            /* --------------------------
            |   Delete Old File
            |  -------------------------*/
            if (!empty($file_name_delete)){
                if (file_exists($this->image_up_path.$file_name_delete)) { unlink($this->image_up_path.$file_name_delete); }
            }

            $return_array["FileName"] = $File1Name;
            return $return_array;
    }

    public function status( $id, $status) {

        $record = $this->modelNameAlias->get($id);

        if($record) {

            $data_array = array(
                'catg_status' => $status
            );

            $this->modelNameAlias->update( $id, $data_array);

            $this->addLog($this->className . " status changed to " . $status . " :- ". $record->catg_title);

            $this->session->set_flashdata('success_message', $this->className . ' status changed');
            redirect($this->data['ctrlUrl']);

        } else {

            $this->session->set_flashdata('success_message', $this->className . ' not found');
            redirect($this->data['ctrlUrl']);
        }

   }

   public function delete($id) {

       $record = $this->modelNameAlias->fetchById($id);

       if($record) {

           $this->modelNameAlias->delete(array('id' => $id));

           $this->addLog($this->className . " deleted :- ". $record->name);

           $this->session->set_flashdata('success_message', $this->className . ' deleted from records');
           redirect($this->data['ctrlUrl']);

       } else {

           $this->session->set_flashdata('success_message', $this->className . ' not found');
           redirect($this->data['ctrlUrl']);
       }

   }

   public function addLog($message) {

      $data_array = array(
          'username'  => $this->data['user']['full_name'],
          'controller'   => $this->router->fetch_class(),
          'action'   => $this->router->fetch_method(),
          'message' => $message,
          'created_on'   => date('Y-m-d h:i:s A')
      );

      return $this->modelLogsAlias->save($data_array);

   }

}
