<?php
require_once '../../BusinessServiceLayer/model/BookingModel.php';


class controller{
	
function add(){
	
$add = new bookingmodel();

$BookingID = $_POST['BookingID'];
$id = $_POST['id'];
$ItemID = $_POST['ItemID'];
$ItemQuantity = $_POST['ItemQuantity'];
$DateBooking = $_POST['DateBooking'];
$BookingTime = $_POST['BookingTime'];
$PickUpDate = $_POST['PickUpDate'];

$add = new bookingmodel();
$req = $add->addbooking($BookingID,$id,$ItemID,$ItemQuantity,$DateBooking,$BookingTime,$PickUpDate);

}


function viewAll(){
        //To retrieve all good information from bookModel class.
        $view = new bookingmodel();
        return $view->view();
    }
    
 //edit booking information
 function edit(){
		
    $edit = new bookingmodel();

    $BookingID = $_POST['BookingID'];
    $id = $_POST['id'];
    $ItemID = $_POST['ItemID'];
    $ItemQuantity = $_POST['ItemQuantity'];
    $DateBooking = $_POST['DateBooking'];
    $BookingTime = $_POST['BookingTime'];
    $PickUpDate = $_POST['PickUpDate'];


  $edit = new bookingmodel();
  $req = $edit->editbooking($BookingID,$id,$ItemID,$ItemQuantity,$DateBooking,$BookingTime,$PickUpDate);

}

}