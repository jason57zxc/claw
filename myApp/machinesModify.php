<?php
 
include 'config.php';
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$m_id = $obj['m_id'];
$m_name = $obj['m_name'];
$m_photo = $obj['m_photo'];
$m_address1 = $obj['m_address1'];
$m_guarantee = $obj['m_guarantee'];
$m_power = $obj['m_power'];

if($m_name != null  && $m_address1 != null && $m_guarantee != null ){

	$Sql_GoodsEntry = 
	"UPDATE machines 
	SET m_name='$m_name', m_photo='$m_photo', m_address1='$m_address1', m_guarantee='$m_guarantee', m_power='$m_power'
	WHERE m_id = '$m_id' ";

		if(mysqli_query($con,$Sql_GoodsEntry)){
			$MSG = '更新成功！！' ;
			$json = json_encode($MSG);
			echo $json ;	
		} else{
			$ErrMSG = '失敗！！' ;
			$Errjson = json_encode($ErrMSG);
			echo $Errjson ;
		}	
} else {
	$EmpMSG = '失敗！！' ;
	$Empjson = json_encode($EmpMSG);
	echo $Empjson ;
}


 mysqli_close($con);
?>