<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ
session_start();
$_SESSION['from_date'] =$_POST['from_date'];
$_SESSION['to_date'] =$_POST['to_date'];


// header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
// header('Content-Disposition: attachment; filename="Myuserall.xls"'); //กำหนดชื่อไฟล์

$conn  = new PDO("mysql:host=localhost;dbname=donate", "admin", "1234");

$query = $conn->prepare("SELECT customer.Cus_id,customer.Name,customer.Address,customer.Tel,donate.Bill,donate.Record_date,donate.Amount,donate.Bank,donate.Ems
    FROM customer
    INNER JOIN donate
    on customer.Cus_id=donate.Cus_id
    WHERE Time BETWEEN '".$_SESSION['from_date']."' AND '".$_SESSION['to_date']."'  


");
$conn->query('SET NAMES utf8');

$query->execute();

$result2 = $query->fetchAll();
;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!-- <strong>รายงานสมาชิก วันที่ <?php echo date("d/m/Y");?> ทั้งหมด <?php echo number_format($num);?> ท่าน</strong><br> -->
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
<tr>
<td width="94" height="30" align="center" valign="middle" ><strong>##</strong></td>
<td width="200" align="center" valign="middle" ><strong>ชื่อ</strong></td>
<td width="181" align="center" valign="middle" ><strong>ที่อยู่</strong></td>
<td width="181" align="center" valign="middle" ><strong>เบอร์โทรศัทพ์</strong></td>
<td width="181" align="center" valign="middle" ><strong>เลขอ้างอิง</strong></td>
<td width="185" align="center" valign="middle" ><strong>วัน/เวลา</strong></td>
<td width="185" align="center" valign="middle" ><strong>จำนวนเงินบริจาค</strong></td>
<td width="185" align="center" valign="middle" ><strong>ธนาคาร</strong></td>
<td width="185" align="center" valign="middle" ><strong>เลขพัสดุ</strong></td>



</tr>
<?php
if($result2>0){
foreach ($result2 as $row) {
  # code...

?>
<tr>
<td height="25" align="center" valign="middle" ><?php echo $row['Cus_id'];?></td>
<td align="center" valign="middle" ><?php echo $row['Name'];?></td>
<td align="center" valign="middle"><?php echo ($row['Address']);?></td>
<td align="center" valign="middle"><?php echo ($row['Tel']);?></td>
<td align="center" valign="middle"><?php echo ($row['Bill']);?></td>
<td align="center" valign="middle"><?php echo ($row['Record_date']);?></td>
<td align="center" valign="middle"><?php echo ($row['Amount']);?></td>
<td align="center" valign="middle"><?php echo ($row['Bank']);?></td>
<td align="center" valign="middle"><?php echo ($row['Ems']);?></td>



</tr>
<?php
}
}
?>
</table>
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
