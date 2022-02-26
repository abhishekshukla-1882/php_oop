<?php
session_start();
    class addtocart{
        /**
         * @param mixed $id
          *   @param mixed $prices

           * @param mixed $pre

            *@param mixed $images

            *@param mixed $action

            *@return void
         */
        public function cart($id,$prices,$pre,$images,$action){
            $arr = array("id" => $id, "price" => $prices, "qnty" => $pre,"images" => $images,'action'=>$action);
            if($id ==''&& $prices==''){
                return;
            }
            else{

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                    
                }

                if($action == 'add'){
                    if (isset($_SESSION["cart"])) {
                        array_push($_SESSION['cart'], $arr);
                        echo json_encode($_SESSION['cart']);;
                    }
                }
            }
        }
        public function delete($id)
        {
            foreach ($_SESSION['cart'] as $idx => $arr) {

                if ($arr['id'] == $id) {

                    array_splice($_SESSION['cart'], $idx, 1);
                    echo json_encode($_SESSION['cart']);

                    break;
                }
            }
        }

    }
?>