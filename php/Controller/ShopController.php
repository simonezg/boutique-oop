<?php
    class ShopController{

        public function single($id)
        {
            require "php/Model/ItemsModel.php";
            $dbItem = new ItemsModel();
            $itemHome = $dbItem->listenerItem($id);
            if(sizeof($itemHome) != 1)
            {
                header("Location: ".HOST.FOLDER."404");
            }
            else
            {
                $itemsHome = $dbItem->listenerItems();
                require("shop-single.php");
                echo "<script>let idItem = ".$itemHome[0]["iditems"].";let typePage = 1;</script>";
            }
        }


    }