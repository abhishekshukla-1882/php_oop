<?php
session_start();
include 'newpro.php';
include 'classes/cart.php';

//  $tprice=0;
//  $tqnty=0;

$ptoducts = array(
	"101" => array("Price:$150.00" => "football.png"),
	"102" => array("Price:$120.00" => "tennis.png"),
	"103" => array("Price:$90.00" => "basketball.png"),
	"104" => array("Price:$110.00" => "table-tennis.png"),
	"105" => array("Price:$80.00" => "soccer.png"),
);
$prices = array(
	"101" => "150",
	"102" => "120",
	"103" => "90",
	"104" => "110",
	"105" => "80"
);
$a1 = new addtocart();

// $action = $_POST['action'];
$action = $_POST['action'];
if($action == 'add'){
	$id =     $_POST['id'];
	$price =  $_POST['price'];
	$pri =    $_POST['quantity'];
	$images =  $_POST['image'];
	$arr = array("id" => $id, "price" => $price, "qnty" => $pri,'image'=>$images,'action'=>$action);
	$a1 -> cart($id,$price,$pri,$images,$action);
}
if($action == 'delete'){
	$id =   $_POST['id'];
	$arr = array("id" => $id, "price" => $price, "qnty" => $pri,'image'=>$images,'action'=>$action);
	$arr = array('id'=> $id);
	// $a1 = new addtocart();
	$a1 -> delete($id);
	// foreach($_SESSION['cart'] as $id){
	// 	if($id['id'] == $id){
	// 		$price = $id['price'];
	// 		$pri = $id['quantity'];
	// 		$images = $id['image'];
	// 		$action = $action;
	// 		// $arr = array("id" => $id, "price" => $price, "qnty" => $pri,'image'=>$images,'action'=>$action);
	// 		$arr = array('id'=> $id);
	// 		$a1 = new addtocart();
	// 		$a1 -> delete($id);

	// 	}
	// }
}

// echo $images."ye h ";


// echo $a12);
// echo $_SESSION['cart'];
// echo $a1->cart($id,$price,$pri,$images);
// echo $a1;
?>