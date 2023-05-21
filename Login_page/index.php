<!DOCTYPE html>
<html lang="utf-8">
<?php
	ini_set('session.gc_maxlifetime', "14400");
	session_start();
	//以下為本次活動工作人員登入的帳號密碼。請自行更換"=>"後的帳號密碼。
	$member = array("id"=>"psfd", "passwd"=>"2023Conference");
	//以下為設定跳轉至google表單的資訊，請依序填入網址與希望預填的欄位代號。
	$form = array("https://docs.google.com/forms/d/e/psfd1FAIpQLSd67PIWK7Y4F0qUNBAqvL-5oHrxdnIoekqXQQ8PtxK0AeO5_w/viewform?usp=pp_url",
		"549155399",	//第一個欄位，本次範例為報名序號
		"620941346",	//第二個欄位，本次範例為來賓姓名
		"44982626"	//第三個欄位，本次範例為會議身分
	);
	//請填入登入頁面的網址，做為登入跳板。
	$loginUrl = "https://test.edu.tw/register/index.php";
	
	//建立跳轉至google form的預先帶入資料連結及跳轉連結。後面程式可視需要調整。
	$register = "Location:".$form[0];
	for($i=1; $i<count($form); $i++) {
		$register = $register."&entry.".$form[$i]."=".$_GET[$form[$i]];
		if ($i==1) {
			$loginUrl = $loginUrl."?".$form[$i]."=".$_GET[$form[$i]];
		}
		else {
			$loginUrl = $loginUrl."&".$form[$i]."=".$_GET[$form[$i]];
		}
	}
	
	if($_POST["username"]==$member["id"] & $_POST["pass"]==$member["passwd"]) {
		$_SESSION["authority"]="QRcodeRegisterSystemByCakewalk";
	}
	if ($_SESSION["authority"]=="QRcodeRegisterSystemByCakewalk") {
		header($register);
	}
?>
<head>
	<title>QR code 掃碼報到工作人員登入</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					研討會報到系統
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?php echo $loginUrl; ?>">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>