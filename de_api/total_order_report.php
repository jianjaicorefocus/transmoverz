<?php 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);


$rid = $data['rid'];
if ($rid == '')
{
$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went wrong  try again !");
}
else 
{
	$pok = array();
	$p =0 ;
	$riderdata = $lundry->query("select * from tbl_rider where id=".$rid."")->fetch_assoc();
	$pok['total_complete_order'] = $riderdata['complete'];
	$pok['total_receive_order'] = $lundry->query("select * from tbl_order where rid=".$riderdata['id']."")->num_rows;
	$pok['total_reject_order'] = $riderdata['reject'];
	$sale = $lundry->query("select sum(o_total) as total_earn from tbl_order where rid=".$rid." and o_status='completed'")->fetch_assoc();
     if($sale['total_earn'] == '')
	 {
		 $p =0;
	 }
	 else 
	 {
		$p = number_format((float)$sale['total_earn'], 2, '.', '');
	 }
	 $pok['total_sale'] = $p;
	 
	 $sale = $lundry->query("select sum(o_total - (o_total * dcommission/100)) as total_earn from tbl_order where rid=".$rid." and o_status='completed'")->fetch_assoc();
     if($sale['total_earn'] == '')
	 {
		 $p =0;
	 }
	 else 
	 {
		$p = number_format((float)$sale['total_earn'], 2, '.', '');
	 }
	 $pok['total_eaning'] = $p;
	 
	 $sales  = $lundry->query("select sum(o_total) as full_total from tbl_order where o_status='completed'  and p_method_id=2 and  rid=".$rid."")->fetch_assoc();
	 $payout =   $lundry->query("select sum(amt) as full_payouts from tbl_cash where rid=".$rid."")->fetch_assoc();
	 if($sale['total_earn'] == '')
	 {
		 $p =0;
	 }
	 else 
	 {
		$p = number_format((float)($sales['full_total']) - $payout['full_payouts'], 2, '.', '');  
	 }
	 $pok['cash_on_hand'] = $p;
	 
	 
	 $sales  = $lundry->query("select sum(o_total - (o_total * dcommission/100)) as full_total from tbl_order where o_status='Completed'  and  rid=".$rid."")->fetch_assoc();
             $payout =   $lundry->query("select sum(amt) as full_payout from payout_setting where vid=".$rid."")->fetch_assoc();
                 $bs = 0;
				
				
				 if($sales['full_total'] == ''){ $earn = $bs;}else {$earn =  number_format((float)($sales['full_total']) - $payout['full_payout'], 2, '.', ''); } 
    $main_data = $lundry->query("select pdboy from tbl_setting")->fetch_assoc();
	$limit = $main_data['pdboy'];
	
	
	 
	 $returnArr = array("order_data"=>$pok,"dboydata"=>$riderdata,"payoutlimit"=>$limit,"walletbalance"=>$earn,"ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Order Status Get Successfully!!!!!");    
}
echo json_encode($returnArr);
mysqli_close($lundry);
?>
