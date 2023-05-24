<?php 
require 'db.php';
require dirname( dirname(__FILE__) ).'/include/laundrore.php';
header('Content-type: text/json');
$data = json_decode(file_get_contents('php://input'), true);
if($data['rid'] == '' or $data['amt'] == '')
{
    
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
	
	$amt = $data['amt'];
$timestamp = date("Y-m-d H:i:s");
	$rand = uniqid();
$rid = $data['rid'];
 $table="payout_setting";
 $type = $data['type'];
  $field_values=array("amt","status","vid","r_date","rid","type");
  $data_values=array("$amt",'pending',"$rid","$timestamp","$rand","$type");
  
  $sales  = $lundry->query("select sum(o_total - (o_total * dcommission/100)) as full_total from tbl_order where o_status='Completed'  and  rid=".$data['rid']."")->fetch_assoc();
             $payout =   $lundry->query("select sum(amt) as full_payout from payout_setting where vid=".$data['rid']."")->fetch_assoc();
                 $bs = 0;
				
				
				 if($sales['full_total'] == ''){ $earn = $bs;}else {$earn =  number_format((float)($sales['full_total']) - $payout['full_payout'], 2, '.', ''); } 
    $main_data = $lundry->query("select pdboy from tbl_setting")->fetch_assoc();
	$limit = $main_data['pdboy'];
	
  if($limit > $amt)
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Minimum ".$limit.' '.$main_data['currency']." for withdraw amount.");
}
else if($earn < $amt)
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"You Do Not Have Requested Amount In Wallet.!!");
}
else 
{
$h = new Laundrore();
	  $check = $h->lundryinsertdata_Api($field_values,$data_values,$table);
	  $returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Payout Submit Successfully!!");
}
}
echo json_encode($returnArr);