<!DOCTYPE html>
<html lang="en">
<head>
	<title>ลงทะเบียน</title>
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
	<link rel="stylesheet" type="text/css" href="css/util1.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">


<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="insert.php" method="post"  name="form1" enctype="multipart/form-data">
				<span class="contact100-form-title">
					ลงทะเบียนผู้บริจาคเงินให้โรงพยาบาลเจ้าพระยาอภัยภูเบศรเพื่อรับใบอนุโมทนาบัตร
				</span>
				<label class="label-input100" for="text_name">ชื่อ-นามสกุล,ชื่อบริษัท  *</label>
				<div class="wrap-input100 validate-input" data-validate="จำเป็นต้องกรอก">
					<input class="input100" type="text" name="txt_name" id="txt_name" placeholder="จำเป็นต้องกรอก">
					<span class="focus-input100"></span>
				</div>



				<label class="label-input100" for="code">เลขบัตรประชาชน *</label>
				<div class="wrap-input100">
					<input class="input100" type="number" min="-999" max="9999999999999"  name="code" id="code" placeholder="ไม่จำเป็นต้องกรอกหรือจะกรอกก็ได้">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="address">ที่อยู่ *</label>
				<div class="wrap-input100 validate-input" data-validate = "จำเป็นต้องกรอก">
					<textarea id="address" class="input100" name="address" placeholder="จำเป็นต้องกรอก"></textarea>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">เบอร์โทร *</label>
				<div class="wrap-input100">
					<input  class="input100" id="tel" type="number" name="tel" min="-999" max="9999999999" placeholder="Ex. +668 0000 0000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">ยอดโอน *</label>
				<div class="wrap-input100">
					<input  class="input100"  name="coin" id="coin" type="number" min="-999" max="9999999999" placeholder="จำเป็นต้องกรอก">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="bank">ธนาคารที่โอน *</label>
				<div class="wrap-input100 validate-input"><br>
					<input  type="radio" class="input101"  name="banks"  id="rdo1" value="scb" >&nbsp;&nbsp;<img src="icon/icon-scbapp.png"  alt="">
					<input  type="radio" class="input101"  name="banks"  id="rdo2" value="ktb">&nbsp;&nbsp;<img src="icon/ktb.png" alt="">

					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="date">วันที่โอน *</label>
				<div class="wrap-input100">
					<input class="input100" type="text" id="datepicker" name="datepicker" placeholder="กดเพื่อเลือกวัน">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">เวลา  *</label>
				<div class="wrap-input100 validate-input" data-validate="จำเป็นต้องกรอก">
					<div class="in">
					<input   type="number" name="time1" min="-999" max="99" placeholder="ชม">
				</div>
				<!-- <div class="in3">
					:
			</div> -->
				<div class="in2">
					<input    type="number" name="time2" min="-999" max="99" placeholder="นาที">
			</div>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="slip">หลักฐานการโอน *</label>
				<div class="wrap-input100">
      <input type="file" name="user_image" name="user_image" accept="image/*" class="form-control" required/>					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit"  name="submit" class="contact100-form-btn">
						ส่งข้อมูล
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/pic2.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							เลขที่ 32/7 หมู่ 12 ถนนปราจีนอนุสรณ์

ตำบลท่างาม จังหวัดปราจีนบุรี 25000
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							เบอร์โทรติดต่อ
						</span>

						<span class="txt3">
							037 211 088
						</span>
					</div>
				</div>

				<!-- <div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							contact@example.com
						</span>
					</div>
				</div> -->
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
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>


<script type="text/javascript">

$(document).ready(function() {

var feedback = '<?php echo $feedback;?>';
if(feedback == 'success') {
	alert('ส่งข้อมูลสำเร็จ !');
}

$("form").submit(function() {
	  var txt_name = $("#txt_name").val();
		var bill = $("#bill").val();

		// var code = $("#code").val();
	  var address = $("#address").val();
		var tel = $("#tel").val();
	  var coin = $("#coin").val();
		var bank = $("#banks").val();


			if(txt_name == '') {
	 		$("#txt_name").focus().css('border', 'solid 1px #f39c12');
	 		return false;
	 	}else if(bill == '') {
	 		$("#bill").focus().css('border', 'solid 1px #f39c12');
	 		return false;
	 	}else if(address == '') {
	 		$("#address").focus().css('border', 'solid 1px #f39c12');
	 		return false;
	 	}else if(tel == '') {
	 		$("#tel").focus().css('border', 'solid 1px #f39c12');
	 		return false;
	 	}else if(coin == '') {
	 		$("#coin").focus().css('border', 'solid 1px #f39c12');
	 		return false;
	 	}else if(bank == '') {
	 		$("#banks").focus().css('border', 'solid 1px #f39c12');
	 		return false;
	 	}else if(document.form1.rdo1.checked == false && document.form1.rdo2.checked == false ) {
	 		alert('โปรดเลือกธนาคารที่โอน ');		return false;
	 // 	}else if(strlen($pid) != 13)return false; {
	 // 		for($i=0, $sum=0; $i<12;$i++)
	 //       $sum += (int)($pid{$i})*(13-$i);
	 //       if((11-($sum%11))%10 == (int)($pid{12}))
	 //       return true;
	 //    return false;
	 // 	}
	 // 	if(isset($_GET['code'])) {
	 //    if(checkPID($_GET['code']))
	 //    echo "รหัสถูกต้องครับ";
	 //    else
	 //    echo "หมายเลขบัตรประชาชนของท่านไม่ถูกต้อง";
	 	}
	if(confirm("ยืนยันการส่งข้อมูล ?") == true) {
		return true;
	}
	return false;
});




});

</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
	$( "#datepicker" ).datepicker();
} );
</script>

</body>
</html>
