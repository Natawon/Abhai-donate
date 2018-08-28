<?php
$conn  = new PDO("mysql:host=localhost;dbname=donate", "admin", "1234");

$query = $conn->prepare("SELECT customer.Cus_id,customer.Name,donate.Bill,donate.Record_date,donate.Amount,donate.Bank,donate.Slip,donate.Ems,donate.Status,donate.id,COUNT(customer.Cus_id)as customer,SUM(donate.Amount) as money
    FROM customer
    INNER JOIN donate
    ON customer.Cus_id=donate.Cus_id
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META HTTP-EQUIV="Refresh"  CONTENT="5;URL=http://dash.local/load.php">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo number_format( $total1),2;
    // header("refresh:0;vdo.php");
    ?>
    
</body>
</html>