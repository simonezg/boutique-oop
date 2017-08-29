<?php
    class ApiController{

        public function detailItem($id){
            require "php/Model/ItemsModel.php";
            $dbItem = new ItemsModel();
            $picturesItem = $dbItem->listenerPicturesItem($id);
            $reviewsItem = $dbItem->listenerReviewsItem($id);
            echo json_encode( array("pictures" => $picturesItem,"reviews"=>$reviewsItem) );
        }
    }