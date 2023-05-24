<?php 
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
if($data['rid'] == '')
{ 
 $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");    
}
else
{
	
	

 $rid =  strip_tags(mysqli_real_escape_string($lundry,$data['rid']));
 $status = $data['status'];
 if($status == 'New')
 {
  $sel = $lundry->query("select * from tbl_order where rid=0 and o_status ='Pending' and vehicleid=".$data['vid']." and dzone=".$data['dzone']." order by id desc");
 }
 else if($status == 'Ongoing')
 {
	 $sel = $lundry->query("select * from tbl_order where rid=".$rid." and (o_status ='Processing' or o_status ='On Route') and vehicleid=".$data['vid']." and dzone=".$data['dzone']."  order by id desc");
 }
 else 
 {
	 $sel = $lundry->query("select * from tbl_order where rid=".$rid." and o_status ='Completed' and vehicleid=".$data['vid']." and dzone=".$data['dzone']." order by id desc");
 }
  if($sel->num_rows != 0)
  {
  $result = array();
  $pol= array();
  while($olist = $sel->fetch_assoc())
    {
	$udata = $lundry->query("select * from tbl_user where id=".$olist['uid']."")->fetch_assoc();	
	$pol['package_number'] = 'Package'.$olist['id'];
	$pol['orderid'] = $olist['id'];
	$pol['pick_name'] =$udata['name'];
	$pol['pick_mobile'] =$udata['mobile'];
	$pol['drop_name'] =$olist['drop_name'];
	$pol['drop_mobile'] =$olist['drop_mobile'];
	$pol['pick_address'] = $olist['pick_address'];
	$pol['pick_lat'] = $olist['pick_lat'];
	$pol['pick_lng'] = $olist['pick_lng'];
	$pol['p_total'] = $olist['o_total'];
	$pol['date_time'] = $olist['odate'];
	$pol['order_status'] = $olist['o_status'];
	$pol['transaction_id'] = $olist['trans_id'];
	$pol['wall_amt'] = $olist['wall_amt'];
	$pol['cou_amt'] = $olist['cou_amt'];
	$pol['subtotal'] = $olist['subtotal'];
	
	$res = array();
	$results = array();
	$query = $lundry->query("select * from tbl_drop_points where order_id=".$olist['id']." and uid=".$olist['uid']."");
	while($row = $query->fetch_assoc())
	{
		$res['id'] = $row['id'];
		$res['drop_point_address'] = $row['drop_address'];
		$res['drop_point_lat'] = $row['drop_lat'];
		$res['drop_point_name'] = $row['drop_name'];
		$res['drop_point_lng'] = $row['drop_lng'];
		$res['drop_point_mobile'] = $row['drop_mobile'];
		$res['drop_point_status'] = $row['status'];
		$results[] = $res;
	}
	$pol['parceldata'] = $results;
	
	$pname = $lundry->query("select * from tbl_payment_list where id=".$olist['p_method_id']."")->fetch_assoc();
	if($olist['p_method_id'] == 2)
	{
		$pol['p_method_name'] = 'COD';
	}
	else 
	{
		$pol['p_method_name'] = $pname['title'];
	}
	$pol['p_method_img'] = $pname['img'];
	$vname = $lundry->query("select * from tbl_vehicle where id=".$olist['vehicleid']."")->fetch_assoc();
	$pol['v_type'] = $vname['title'];
	$pol['v_img'] = $vname['img'];
	 if($olist['rid'] == 0)
	{
		$pol['rider_name'] = NULL;
		$pol['rider_lats'] = NULL;
		$pol['rider_longs'] = NULL;
		
		
	}
	else 
	{
	$riderdata = $lundry->query("select * from tbl_rider where id=".$olist['rid']."")->fetch_assoc();
	$pol['rider_name'] = $riderdata['title'];
	$pol['rider_lats'] = $olist['rlats'];
		$pol['rider_longs'] = $olist['rlongs'];
	
	}
	 $cname = $lundry->query("select * from tbl_category where id=".$olist['cat_id']."")->fetch_assoc();
	$pol['cat_img'] = $cname['cat_img'];
	$pol['cat_name'] = $cname['cat_name'];
	$result[] = $pol;
	}
   
   
      
            
    $returnArr = array("order_data"=>$result,"ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Order Get successfully!");
  }
  else 
  {
	  $result = array();
	  if($status == 'New')
 {
	$returnArr = array("ResponseCode"=>"401","Result"=>"true","ResponseMsg"=>"No New Order Found!","order_data"=>$result);   
 }
 else if($status == 'Ongoing')
 {
	 $returnArr = array("ResponseCode"=>"401","Result"=>"true","ResponseMsg"=>"No Ongoing Order Found!","order_data"=>$result);   
 }
 else 
 {
	 $returnArr = array("ResponseCode"=>"401","Result"=>"true","ResponseMsg"=>"No Completed Order Found!","order_data"=>$result);   
 }
  }
}
echo json_encode($returnArr);