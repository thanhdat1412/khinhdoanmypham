<?php
	include("Class/CLscontrol.php");
	$p = new control();
	if(isset($_GET['partnerCode']))
	{
		$code_order = rand(0,9999);
		$partnerCode = $_GET['partnerCode'];
		$orderId = $_GET['orderId'];
		$amount = $_GET['amount'];
		$orderInfo = $_GET['orderInfo'];
		$orderType = $_GET['orderType'];
		$transId = $_GET['transId'];
		$resultCode = $_GET['resultCode'];
		$payType = $_GET['payType'];
		
		$insert_momo = "INSERT INTO momo (partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,code_cart) VALUE('".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."','".$payType."','".$code_order."')";
		echo "thanh công";
	}
?>