<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/insert.css">
	<title></title>
</head>
<body>

<div class="container">
		<img src="img/pic2.jpg" alt="">

		<div class="box">
			<div class="header">
				<h1>ขอบคุณที่ร่วมบริจาคเงินให้กับโรงพยาบาลเจ้าพระยาอภัยภูเบศร</h1>
			</div>

		</div>
	</div>
</body>
</html>


<?php
// $txt_ch = isset($_POST['txt_choice'])?$_POST['txt_choice'] : '0';
// $chc = isset($_POST['txt_choice'])?(count($_POST['txt_choice'])-1) : 0;

// $Workshop = isset($_POST['txt_workshop'])?$_POST['txt_workshop'] : '0';
// $wh= isset($_POST['txt_workshop'])?(count($_POST['txt_workshop'])-1) : 0;

// echo $wh;


if(isset($_POST["submit"])){
$hostname='localhost';
$username='admin_donate';
$password='dinsorsee';
// $txt_recode_date = date('Y-m-d H:i:s');

try {
$dbh = new PDO("mysql:host=$hostname;dbname=admin_donate",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$dbh->exec('SET NAMES utf8');

/* tb_newa*/

$sql = "INSERT INTO customer (Name,Address,Tel,Code)
VALUES ('".$_POST["txt_name"]."','".$_POST["address"]."','".$_POST["tel"]."','".$_POST["code"]."');";
$dbh->exec($sql);

$id = $dbh->lastInsertId();

$sql = '';

// $sql = "INSERT INTO donate (Time,Bill,Record_date,Amount,Ems,Ddate,ptime,Bank,Cus_id)
// VALUES ('".$_POST["datepicker"]."','".$_POST["bill"]."','".$txt_recode_date."','".$_POST["coin"]."','".$_POST["address"]."','".$_POST["time1"]."','".$_POST["time2"]."','".$_POST["banks"]."','".$id."');";

		$Time = $_POST['datepicker'];// เวลาที่โอน
		//$Record = $txt_recode_date;// เวลาที่โอน ,ใช้timestamp
		$Record = 'NOW()' ;

$Bill = rand();
		 //เลขที่ใบเสร็จ
		$Coin = $_POST['coin']; //จำนวนเงิน
		$Ems = 0; //ems
		$Ddate = $_POST['time1']; //เวลา
		$ptime = $_POST['time2']; //เวลา
		$Bank = $_POST['banks']; //เวลา
		$id = $id; //fk




		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];

			$upload_dir = 'upload/'; // upload directory

			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}

		if(!isset($errMSG))
		{
			$sql = $dbh->prepare('INSERT INTO donate(Time,Bill,Amount,Ems,Ddate,ptime,Bank,Slip,Cus_id) VALUES(:time, :Bill,:Coin,:Ems,:Ddate,:ptime,:Bank,:upic,:id)');

			$sql->bindParam(':time',$Time);
			$sql->bindParam(':Bill',$Bill);
			//$sql->bindParam(':Record',$Record);
			$sql->bindParam(':Coin',$Coin);
			$sql->bindParam(':Ems',$Ems);
			$sql->bindParam(':Ddate',$Ddate);
			$sql->bindParam(':ptime',$ptime);
			$sql->bindParam(':Bank',$Bank);
			$sql->bindParam(':upic',$userpic);
			$sql->bindParam(':id',$id);


			if($sql->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:4;page.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
// $dbh->exec($sql);
// $id = $dbh->lastInsertId();


//insert service with $id customer

//get lastinsertid() service

//$id

/* tb_choice*/
// for ($i=0; $i <=$wh ; $i++) {


// 	$sql .= "INSERT INTO Service_work(Service_id,Workshop_id)
// 	VALUES ('".$id."','".$Workshop[$i]."');";

// }

/* tb_sale*/
// $sql .= "INSERT INTO tb_sale (PersonID,Count,Prof,Break,Lunch)
// VALUES ('".$id."','".$_POST["txt_count"]."','".$_POST["txt_prof"]."','".$_POST["txt_food"]."','".$_POST["txt_spa"]."');";


/* tb_Workshop*/
// for ($i=0; $i <=$wh ; $i++) {

// $sql .= "INSERT INTO tb_workshop (PersonID,Namework)
// VALUES ('".$id."','".$Workshop[$i]."');";


// }


// if ($dbh->query($sql)) {
// echo "<script type= 'text/javascript'>alert('ส่งข้อมูลสำเร็จ');</script>";
// header("refresh:5;page1.php");
// }
// else{
// echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
// }

$dbh = null;
}


catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>
