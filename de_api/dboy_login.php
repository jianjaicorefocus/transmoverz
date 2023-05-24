<?php 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['mobile'] == ''  or $data['password'] == '')
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
    $mobile = strip_tags(mysqli_real_escape_string($lundry,$data['mobile']));
    $password = strip_tags(mysqli_real_escape_string($lundry,$data['password']));
    
$chek = $lundry->query("select * from tbl_rider where (mobile='".$mobile."' or email='".$mobile."') and status = 1 and password='".$password."'");
$status = $lundry->query("select * from tbl_rider where status = 1");
if($status->num_rows !=0)
{
if($chek->num_rows != 0)
{
    $c = $lundry->query("select * from tbl_rider where  (mobile='".$mobile."' or email='".$mobile."') and status = 1 and password='".$password."'")->fetch_assoc();
	
	$po = array();
	$po['id'] = $c['id'];
	$po['title'] = $c['title'];
	$po['rimg'] = $c['rimg'];
	$po['status'] = $c['status'];
	$po['rate'] = $c['rate'];
	$po['lcode'] = $c['lcode'];
	$po['full_address'] = $c['full_address'];
	$po['pincode'] = $c['pincode'];
	$po['landmark'] = $c['landmark'];
	$po['commission'] = $c['commission'];
	$po['bank_name'] = $c['bank_name'];
	$po['ifsc'] = $c['ifsc'];
	$po['receipt_name'] = $c['receipt_name'];
	$po['acc_number'] = $c['acc_number'];
	$po['paypal_id'] = $c['paypal_id'];
	$po['upi_id'] = $c['upi_id'];
	$po['email'] = $c['email'];
	$po['password'] = $c['password'];
	$po['rstatus'] = $c['rstatus'];
	$po['mobile'] = $c['mobile'];
	$po['accept'] = $c['accept'];
	$po['reject'] = $c['reject'];
	$po['complete'] = $c['complete'];
	$po['dzone'] = $c['dzone'];
	$po['vehiid'] = $c['vehiid'];
	$vehidata = $lundry->query("select * from tbl_vehicle where id=".$c['vehiid']."")->fetch_assoc();
	$po['ve_img'] = $vehidata['img'];
	
 $curr = $lundry->query("select * from tbl_setting")->fetch_assoc();
    $returnArr = array("dboydata"=>$po,"currency"=>$curr['currency'],"ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Login successfully!");
}
else
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Invalid Email/Mobile No or Password!!!");
}
}
else  
{
	 $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Your Status Deactivate!!!");
}
}

echo json_encode($returnArr);