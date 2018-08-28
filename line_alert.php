<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>line</title>
</head>
<body>
    
</body>
</html>
<?php
$conn  = new PDO("mysql:host=localhost;dbname=admin_donate", "admin_donate", "dinsorsee");

$query = $conn->prepare("SELECT customer.Cus_id,customer.Name,donate.Bill,donate.Record_date,donate.Amount,donate.Bank,donate.Slip,donate.Ems,donate.Status,donate.id,COUNT(customer.Cus_id)as customer,SUM(donate.Amount) as money
    FROM customer
    INNER JOIN donate
    ON customer.Cus_id=donate.Cus_id
    WHERE donate.Status =1
    GROUP by customer.Cus_id

");
$conn->query('SET NAMES utf8');

$query->execute();

$result = $query->fetchAll();
;

?>
<?php foreach ($result as $value){
             $total+=$value['customer'];
             $total1+=$value['money'];


}
?>
<?php
$conn  = new PDO("mysql:host=localhost;dbname=admin_donate", "admin_donate", "dinsorsee");

$query = $conn->prepare("SELECT customer.Cus_id,customer.Name,donate.Bill,donate.Record_date,donate.Amount,donate.Bank,donate.Slip,donate.Ems,donate.Status,donate.id,COUNT(customer.Cus_id)as customer,SUM(donate.Amount) as money,COUNT(donate.Record_date) as count
    FROM customer
    INNER JOIN donate
    ON customer.Cus_id=donate.Cus_id
    WHERE date(donate.Record_date) = CURDATE()
    GROUP BY customer.Cus_id


");
$conn->query('SET NAMES utf8');

$query->execute();

$result1 = $query->fetchAll();
;

?>

<?php foreach ($result1 as $value){
             $total10+=$value['count'];



}
?>

<?php
$link = 'https://abhai-donate.cpa.go.th/login.php';

$line_api = 'https://notify-api.line.me/api/notify';
$access_token = 'cS2KbYVRyKCXqRjWtFI2Nybf3tyCgD1bb8d748Ajjwo';

$str = 'ยอดเงินบริจาคขณะนี้ :'."".number_format($total1).""."บาท"."และมีจำนวนคนบริจาควันนี้เป็นจำนวน".$total10.""."คน"."เข้าไปตรวจสอบที่".$link;    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร   //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

$image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
$image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
$sticker_package_id = 1;  // Package ID ของสติกเกอร์
$sticker_id = 410;    // ID ของสติกเกอร์

$message_data = array(
 'message' => $str,
 'imageThumbnail' => $image_thumbnail_url,
 'imageFullsize' => $image_fullsize_url,
 'stickerPackageId' => $sticker_package_id,
 'stickerId' => $sticker_id
);

$result = send_notify_message($line_api, $access_token, $message_data);
print_r($result);

function send_notify_message($line_api, $access_token, $message_data)
{
 $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $line_api);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($ch);
 // Check Error
 if(curl_error($ch))
 {
  $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) );
 }
 else
 {
  $return_array = json_decode($result, true);
 }
 curl_close($ch);
 return $return_array;
}

?>
