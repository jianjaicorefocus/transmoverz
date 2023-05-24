<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $lundry = new mysqli("srv948.hstgr.io", "u743278531_johnmacaday", "Z^0;T=x^y", "u743278531_johnmacaday");
  $lundry->set_charset("utf8mb4");
} catch(Exception $e) {
  error_log($e->getMessage());
  //Should be a message a typical user could understand
}
    
	$set = $lundry->query("SELECT * FROM `tbl_setting`")->fetch_assoc();
	date_default_timezone_set($set['timezone']);
	
	$main = $lundry->query("SELECT * FROM `prcel_data`")->fetch_assoc();
	
?>