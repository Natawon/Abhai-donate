<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
</body>
</html>


<?php
$txt_ch = isset($_POST['txt_choice'])?$_POST['txt_choice'] : '0';
$chc = isset($_POST['txt_choice'])?(count($_POST['txt_choice'])-1) : 0;

$Workshop = isset($_POST['txt_workshop'])?$_POST['txt_workshop'] : '0';
$wh= isset($_POST['txt_workshop'])?(count($_POST['txt_workshop'])-1) : 0;

// echo $wh;


if(isset($_POST["submit"])){
$hostname='localhost';
$username='admin';
$password='1234';
$txt_recode_date = date('Y-m-d H:i:s');

try {
$dbh = new PDO("mysql:host=$hostname;dbname=personaldb",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$dbh->exec('SET NAMES utf8');

/* tb_newa*/

$sql = "INSERT INTO Customer (Name,Tel, Email,Visiter)
VALUES ('".$_POST["txt_name"]."','".$_POST["txt_tel"]."','".$_POST["txt_email"]."','".$_POST["txt_count"]."');";
$dbh->exec($sql);

$id = $dbh->lastInsertId();


$sql = "INSERT INTO Service (Cus_id,RecordDate,Recordtime,Prof,Food,Lunch,Proj,Paper,Mn,Note)
VALUES ('".$id."','".$_POST["datepicker"]."','".$_POST["txt_time"]."','".$_POST["txt_prof"]."','".$_POST["txt_food"]."','".$_POST["txt_spa"]."','".$_POST["txt_proj"]."','".$_POST["txt_paper"]."','".$_POST["txt_opin"]."','".$_POST["txt_note"]."');";
$dbh->exec($sql);
$id = $dbh->lastInsertId();


//insert service with $id customer 

//get lastinsertid() service 

//$id

/* tb_choice*/
$sql = '';
for ($i=0; $i <=$wh ; $i++) { 


	$sql .= "INSERT INTO Service_work(Service_id,Workshop_id)
	VALUES ('".$id."','".$Workshop[$i]."');";

}

/* tb_sale*/
// $sql .= "INSERT INTO tb_sale (PersonID,Count,Prof,Break,Lunch)
// VALUES ('".$id."','".$_POST["txt_count"]."','".$_POST["txt_prof"]."','".$_POST["txt_food"]."','".$_POST["txt_spa"]."');";


/* tb_Workshop*/
// for ($i=0; $i <=$wh ; $i++) { 

// $sql .= "INSERT INTO tb_workshop (PersonID,Namework)
// VALUES ('".$id."','".$Workshop[$i]."');";


// }

if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('ส่งข้อมูลสำเร็จ');</script>";
header("refresh:0.4;page4.php");
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}


catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>