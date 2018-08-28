<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/check.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <title>ตรวจสอบ</title>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin:20% 0%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>


</head>
<body>
<header>
	<div class="logo"><img src="/images/logo.png"></div>
	<div class="title">ลงทะเบียนเพื่อต้องการบริจาคเงินให้โรงพยาบาลเจ้าพระยาอภัยภูเบศร </div>
</header>
    <div class="container">

 <form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" autocomplete="off">
 <p class="main">กรุณากรอก ชื่อ  &  เลขประจำตัวประชาชน   & เบอร์โทรศัพท์ที่ใช้ลงทะเบียน</p>
ตรวจสอบ&nbsp;<input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
<button class="button button2"><i class="fas fa-search"></i></button>

</form>
<?php
if($_GET["txtKeyword"] != "")
	{
        $conn  = new PDO("mysql:host=localhost;dbname=admin_donate", "admin_donate", "dinsorsee");

        $query = $conn->prepare("
        SELECT customer.Cus_id,customer.Name,donate.Bill,donate.Record_date,donate.Amount,donate.Bank,donate.Slip,donate.Ems,customer.code,donate.Status
        FROM customer
        INNER JOIN donate
        ON customer.Cus_id=donate.Cus_id
        WHERE customer.Cus_id like '%{$_GET['txtKeyword']}%' or customer.Name like'%{$_GET['txtKeyword']}%' or customer.code like'%{$_GET['txtKeyword']}%'");
        $conn->query('SET NAMES utf8');

        $query->execute();

        $result = $query->fetchAll();

        ;
	?>
	<table class="table">
	  <tr>
		<th width="91"> <div align="center">เลข </div></th>
        <th width="98"> <div align="center">ชื่อ </div></th>
        <th width="91"> <div align="center">จำนวนเงินที่บริจาค </div></th>
        <th width="98"> <div align="center">สถานะ </div></th>
        <th width="98"> <div align="center">กดดูสถานะการจัดส่งใบอนุโมทนาบัตร </div></th>


	  </tr>
    <?php


    if(!empty($result)) {
        foreach($result as $row) {

	?>
	  <tr>
		<td><div align="center"><?php echo $row["Cus_id"];?></div></td>
		<td><div align="center"><?php echo $row["Name"];?></div></td>
        <td><div align="center"><?php echo number_format($row["Amount"])." "."บาท";?></div></td>
        <td><div align="center"><?php

// $status = 1; // ลองเปลี่ยนตัวเลขตรงนี้นะครับ เพื่อทดสอบ if else ที่เราได้เขียนไว้

if($row['Status']==0){
	echo "<font color='red'> รอการตรวจสอบ </font>";
}
elseif ($row['Status']==1) {
 echo "<font color='green'> ตรวจสอบแล้ว </font>";
}
// elseif ($var['Status']==2) {
//  echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
// }
else{
	 echo "<font color='#10ac84'> จัดส่งเอกสารเรียบร้อย </font>";

}
?>
         <span class="status--process"><?php $row['Status']; ?></div></span></td></td>
        <td><div align="center">

        <?php if($row['Status']==0){ ?>
     <!-- HTML here --> <p>hello</p>
        <?php } else{?>
     <!-- HTML here --> <p><a href="http://emsbot.com/#/?s=<?php echo $row["Ems"]; ?>"> <span style="color:#2d3436;"><?php echo $row["Ems"]; ?></span></a>
</p>
        <?php } ?>

        </div></td>

	  </tr>
	<?php
    }
}
	?>
	</table>
    <?php
    }else {
        echo "ไม่มีข้อมูล";
    }

    ?>
    </div>
</body>
</html>
