<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {

		public function __construct() {
			 parent::__construct();
		}

		public function index() {

        //load library excel
        $this->load->library('excel');

        //Here i used microsoft excel 2007
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');

        //Set to read only
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load(ROOT_PATH . 'uploads/data/data.xlsx');
        //var_dump( ROOT_PATH . 'uploads/data/data.xlsx');
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        //var_dump($objWorksheet);

        $data_array = array();

        for( $i = 2; $i <= 137; $i++) {
            //$name = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
            $name = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
            $personality = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
            $power = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
            $element = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
            $rarity = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
            $weakness = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
            $color = $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
            $food = $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
            $birthday = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();

            if(!empty($name) && $name != '') {

                array_push(
                   $data_array, array(
                      'name' => ucfirst(strtolower($name)),
                      'personality' => $personality,
                      'power' => $power,
                      'element' => ucfirst(strtolower($element)),
                      'rarity' => ucwords(strtolower($rarity)),
                      'weakness' => $weakness,
                      'fav_color' => $color,
                      'fav_food' => $food,
                      'birthday' => \PHPExcel_Style_NumberFormat::toFormattedString($birthday, 'YYYY-MM-DD'),
                      'image_url' => $this->formatNumber(($i - 1)) . '.png',
                      'orderby' => ($i - 1),
                      'sm_card' => $this->formatNumber(($i - 1)) . '_card.png',
                      'created_on' => date('Y-m-d h:i:s A'),
                      'updated_on' => date('Y-m-d h:i:s A')
                ));

            }

        }

				// var_dump($data_array);

        $this->load->model(SITE_MODELS . '/model_smighties', 'modelNameAlias');
        $this->modelNameAlias->batch_insert( $data_array);

		}

    private function formatNumber($number) {
       if(strlen($number) === 2) {
          return '0' . $number;
       } else if(strlen($number) === 1) {
          return '00' . $number;
       }

       return $number;
    }

}
