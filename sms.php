<?php
$act=$_GET["act"];
$country1=$_GET["country"];
$product1=$_GET["product"];
$id=$_GET["id"];
//5sim.net dan olingan token ↓
$token ="api";
if($act=="number" and $product1!=null and $country1!=null){
/* http://photo-edit.ml/sms.php?act=number&product=telegram&country=russia*/
$ch = curl_init();
$country=$country1;
$operator ="any";
$product =$product1;

curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/user/buy/activation/".$country."/".$operator."/".$product);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Authorization: Bearer ".$token;
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

if($act=="cancel" and $id!=null){
/* http://photo-edit.ml/sms.php?act=cancel&id=$id*/
$ch = curl_init();
$id1= $id;
curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/user/cancel/".$id1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Authorization: Bearer ".$token;
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

if($act=="code" and $id!=null){
/* http://photo-edit.ml/sms.php?act=code&id=$id*/
$ch = curl_init();
$id1=$id;

curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/user/check/".$id1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Authorization: Bearer ".$token;
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

if($act=="balance" and $id=="admin"){
	/* http://photo-edit.ml/sms.php?act=balance&id=admin*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/user/profile");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$headers = array();
$headers[] = "Authorization: Bearer ".$token;
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

if($act=="ban" and $id!=null){
/* http://photo-edit.ml/sms.php?act=ban&id=$id*/
$ch = curl_init();
$id1 = $id;
curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/user/ban/".$id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$headers = array();
$headers[] = "Authorization: Bearer ".$token;
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

if($act=="services" and $country1!=null and $product1!=null){
$ch = curl_init();
$country =$country1;
$operator= $product1;

curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/guest/products/".$country."/".$operator);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

if($act=="prices" and $product1!=null){
$ch = curl_init();
$product1= $product1;

curl_setopt($ch, CURLOPT_URL, "https://5sim.net/v1/guest/prices?product=".$product1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

$headers = array();
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error:".curl_error($ch);
}
curl_close($ch);
echo $result;
}

