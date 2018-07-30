

<?php

include "config.php";

session_start();

$ID = $_SESSION['customer_id'] ;
$shipment_t = $_POST['shipment_t'];
$shipment_d =  $_POST['shipment_d'];
$number =  $_POST['number'];
$payment_t = $_POST['payment_t'];
$total = $_POST['total'];
$date =  date('Y-m-d');

if($shipment_t == "UPS"){
    $total += 3.50;
}

if($shipment_t == "USPS"){
    $total += 3.75;
}

if ($shipment_t == "FedEx"){
    $total += 2.75;
}

$query = mysqli_query($conn, "insert into orderentry (order_date,deliverydate,Shipmethod,customerid,paymethod,total_order) values ('$date','$shipment_d','$shipment_t','$ID','$payment_t','$total')");
$Select_OID = mysqli_query($conn, "select idorderentry from orderentry where customerid = '$ID'");
$get_OID = mysqli_fetch_assoc($Select_OID);

$OID = $get_OID['idorderentry'];

$get_tc = mysqli_query($conn, "select * from tempcart where tc_custid = '$ID' ");

$show_tc = mysqli_fetch_all($get_tc, MYSQLI_ASSOC);

foreach( $show_tc as  $show_tc ){

$dvd = $show_tc['tc_dvdid'];
$get_dvd = mysqli_query($conn, "select * from dvd where DVDID = '$dvd' ");
$show_dvd = mysqli_fetch_all($get_dvd, MYSQLI_ASSOC);

foreach($show_dvd as $show_dvd){

$DVDID = $show_dvd['DVDID'];
$UP = $show_dvd['Price']; 

$put = mysqli_query($conn, "insert into orderline (orderentryid,DVDID,quantity,unitprice) values ('$OID','$DVDID','1','$UP')");


    
    
}

}

$del = mysqli_query($conn, "delete from tempcart");
$del2 = mysqli_query($conn, "delete from orderline where orderentryid = '$OID'");


header('location:../Pages/receipt.php');


?>


