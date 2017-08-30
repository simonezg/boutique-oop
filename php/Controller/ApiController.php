<?php
    require "Controller.php"; // Charger le fichier php
    class ApiController extends Controller{

        public function  __construct(){
            parent::__construct();
        }
        
        public function detailItem($id){

            $picturesItem = $this->itemsModel->listenerPicturesItem($id);
            $reviewsItem = $this->itemsModel->listenerReviewsItem($id);
            echo json_encode( array("pictures" => $picturesItem,"reviews"=>$reviewsItem) );
        
        }

        public function searchItems(){

            $sql = "";
            $search = false;


            if(isset($_POST["price"])){ //$_POST["price"] = valeur1 and valeur2
                $sql .= " price BETWEEN  ".$_POST["price"]." AND ";
                $search = true;
            }
            if(isset($_POST["categorie"])){ //$_POST["categorie"] = valeur1
                $sql .= " categories_idcategories = ".$_POST["categorie"]." AND ";
                $search = true;
            }

            //$sql = substr($sql, 0, -4);
            // Si aucun filtre n'est demandé
            if($search == false)
                $sql = 1;
            else
                $sql .= " iditems = items_iditems";

            $items = $this->itemsModel->select("i.*, p.url", "items i, pictures p", $sql);
            echo json_encode($items);
        }
    }