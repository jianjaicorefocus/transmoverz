<?php 
require 'db.php';
header('Content-type: text/json');
$data = json_decode(file_get_contents('php://input'), true);
if($data['pid'] == '')
{
    
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
	$plist = $lundry->query("select * from payout_setting where vid=".$data['pid']."");
	$riderdata = $lundry->query("select * from tbl_rider where id=".$data['pid']."")->fetch_assoc();
	$status = array();
	$pdata = array();
	while($row = $plist->fetch_assoc())
	{
		$status['id'] = $row['id'];
		$status['request_id'] = $row['rid'];
		$status['amt'] = $row['amt'];
		if($row['status'] == 'pending')
		{
			$status['status'] = 'Under Review';
		}
		else 
		{
			$status['status'] = 'Completed';
		}
		
		$status['proof'] = empty($row['proof']) ? "" : $row['proof'];
		$status['p_by'] = empty($row['p_by']) ? "" : $row['p_by'];
		$status['r_date'] = date("F d, h:i A", strtotime($row['r_date']));
		$status['bname'] = empty($riderdata['bank_name']) ? "" : $riderdata['bank_name'];
		$status['ifsc'] =  empty($riderdata['ifsc']) ? "" : $riderdata['ifsc'];
		$status['rname'] =  empty($riderdata['receipt_name']) ? "" : $riderdata['receipt_name'];
		$status['acno'] =  empty($riderdata['acc_number']) ? "" : $riderdata['acc_number'];
		$status['paypalid'] =  empty($riderdata['paypal_id']) ? "" : $riderdata['paypal_id'];
		$status['upi'] =  empty($riderdata['upi_id']) ? "" : $riderdata['upi_id'];
		$status['type'] = empty($row['type']) ? "" : $row['type'];
		$pdata[] = $status;
	}
	$returnArr = array("PayoutListData"=>$pdata,"ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Payout List Get Successfully!!");
}

echo json_encode($returnArr);