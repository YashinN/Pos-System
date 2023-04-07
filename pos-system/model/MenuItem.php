<?php

    include 'data/data.php';

    class MenuItem {

        public $name;
        public $price;
        public $barcode;
       
        public function __construct($name,$price,$barcode){
            $this->barcode = $barcode;
            $this->name = $name;
            $this->price =$price;
        }

        public function loadData($dataConvert){
            $data = json_encode($dataConvert,JSON_PRETTY_PRINT);
            $dataPhp = json_decode($data,true);
            $menuLen = count($dataPhp);
            $menuItems = [];

            for($i = 0; $i < $menuLen; $i++){
                $newItem = new MenuItem($dataPhp[$i]["name"],$dataPhp[$i]["price"],$dataPhp[$i]["barcode"]);
                array_push($menuItems,$newItem);
            }

            return $menuItems;
        }
    }
?>