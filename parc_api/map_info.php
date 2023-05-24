<?php 
require dirname( dirname(__FILE__) ).'/include/lanconfig.php';
require dirname( dirname(__FILE__) ).'/include/laundrore.php';
header('Content-type: text/json');
$data = json_decode(file_get_contents('php://input'), true);
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
function siteURL() {
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
    $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $domainName = $_SERVER['HTTP_HOST'];
  return $protocol.$domainName;
}

if($data['order_id'] == '')
{
 $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");    
}
else
{
	$orderid = $data['order_id'];
	
	$pol= array();
	$olist = $lundry->query("select * from tbl_order where id=".$orderid."")->fetch_assoc();
	$pol['package_number'] = 'package_#'.$olist['id'];
	$pol['orderid'] = $data['order_id'];
	$check_drop = $lundry->query("select * from tbl_drop_points where order_id=".$data['order_id']." and uid=".$olist['uid']." and  status='completed' order by id desc limit 1")->fetch_assoc();
	$get_pending = $lundry->query("select * from tbl_drop_points where order_id=".$data['order_id']." and uid=".$olist['uid']." and  status='pending' order by id  limit 1")->fetch_assoc();
	if($check_drop['id'] == '' or $get_pending['id'] == '')
	{
	$pol['pick_address'] = $olist['pick_address'];
	$pol['pick_lat'] = $olist['pick_lat'];
	$pol['pick_lng'] = $olist['pick_lng'];
	}
	else 
	{
		$pol['pick_address'] = $check_drop['drop_address'];
	$pol['pick_lat'] = $check_drop['drop_lat'];
	$pol['pick_lng'] = $check_drop['drop_lng'];
	}
	    $pol['drop_address'] = empty($get_pending['drop_address']) ? '':$get_pending['drop_address'];
		$pol['drop_lat'] = empty($get_pending['drop_lat'])? '':$get_pending['drop_lat'];
		$pol['drop_lng'] = empty($get_pending['drop_lng'])? '':$get_pending['drop_lng'];
	$pol['p_total'] = $olist['o_total'];
	$timestamp = date("Y-m-d H:i:s");
	$diff = strtotime($timestamp) - strtotime($olist['odate']);
	$pol['order_arrive_seconds'] = $diff;
	$pname = $lundry->query("select * from tbl_payment_list where id=".$olist['p_method_id']."")->fetch_assoc();
		$pol['p_method_name'] = $pname['title'];
	$pol['p_method_img'] = $pname['img'];
	
	$res = array();
	$result = array();
	$query = $lundry->query("select * from tbl_drop_points where order_id=".$data['order_id']." and uid=".$olist['uid']."");
	while($row = $query->fetch_assoc())
	{
		$res['id'] = $row['id'];
		$res['drop_point_address'] = $row['drop_address'];
		$res['drop_point_lat'] = $row['drop_lat'];
		$res['drop_point_lng'] = $row['drop_lng'];
		$res['drop_point_mobile'] = $row['drop_mobile'];
		$result[] = $res;
	}
	$pol['parceldata'] = $result;
	if($olist['rid'] == 0)
	{
		$pol['rider_name'] = '';
		$pol['rider_img'] = '';
		$pol['rider_lats'] = 0.0;
		$pol['rider_longs'] = 0.0;
		$pol['rider_mobile'] = '';
		$pol['vehicle_number'] = '';
	}
	else 
	{
	$riderdata = $lundry->query("select * from tbl_rider where id=".$olist['rid']."")->fetch_assoc();
	$pol['rider_name'] = $riderdata['title'];
	$pol['rider_img'] = $riderdata['rimg'];
		$pol['rider_lats'] = $olist['rlats'];
		$pol['rider_longs'] = $olist['rlongs'];
		$pol['rider_mobile'] = $riderdata['mobile'];
		$pol['vehicle_number'] = $riderdata['lcode'];
	}
	
	$vname = $lundry->query("select * from tbl_vehicle where id=".$olist['vehicleid']."")->fetch_assoc();
	$pol['v_type'] = $vname['title'];
	$pol['v_img'] = $vname['img'];
	$pol['o_status'] = $olist['o_status'];
	 if($olist['o_status'] == 'Pending')
	{
		$pol['rest_msg'] = 'Searching Delivery Boy For Your Order.';
		$pol['rider_msg'] = '';
		$pol['order_step'] = 1; 
		$pol['head_msg'] = 'Searching Task';
		$pol['sub_msg'] = 'Booking Done';
		
	}
	else if($olist['o_status'] == 'Processing')
	{
		$pol['order_step'] = 2; 
		$pol['rider_msg'] = '';
		$pol['rest_msg'] = 'On The Way To Pick Up Order.';
		$pol['head_msg'] = 'PickUp Process Task';
		$pol['sub_msg'] = 'Partner Accepted';
	}
	else if($olist['o_status'] == 'On Route')
	{
		$pol['order_step'] = 3; 
		$pol['rider_msg'] = '';
		$pol['rest_msg'] = 'is on the way to deliver your order';
		$pol['head_msg'] = 'Delivery Task';
		$pol['sub_msg'] = 'Partner On The Way';
	}
	else if($olist['o_status'] == 'Completed')
	{
		$pol['order_step'] = 4; 
		$pol['rider_msg'] = '';
		$pol['rest_msg'] = 'Your Order Delivered Successfully.';
		$pol['head_msg'] = 'Deliverd';
		$pol['sub_msg'] = 'Deliver Successfully';
	}
	else if($olist['o_status'] == 'Cancelled')
	{
		$pol['order_step'] = 5; 
		$pol['rest_msg'] = 'Your Order Was Cancelled.';
		$pol['rider_msg'] = '';
		$pol['head_msg'] = 'Canclled';
		$pol['sub_msg'] = 'Order Have Some Issue';
	}
	$returnArr = array("Mapinfo"=>$pol,"ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Order Information  Get Successfully!!!");
}
echo json_encode($returnArr);
?>