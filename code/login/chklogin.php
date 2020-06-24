<?php  
require_once('class.php');
$Uname = $_POST['Username'];
$Pword = $_POST['Password'];

$chk = chklogin($Uname,$Pword);

if($db->count == 0){
	echo "<script>alert('ไม่พบผู้ใช้งาน');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../index.php'>";
}else{
	$_SESSION['authoritiesData'] = $login; 
	echo "<meta http-equiv='refresh' content='0;url=../../index.php'>";
}

?>