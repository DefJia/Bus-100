<?php
include_once ('conn.php');
//$url = 'http://api.36wu.com/Bus/GetLineInfo?city=%E5%8C%97%E4%BA%AC&line=300&authkey=682e5041d1db43bc9ebd0df1ea6c99ca&format=json';
$sql = 'select stop from main';
$result = mysqli_query($conn, $sql);
$myrow = mysqli_fetch_array($result);
mysqli_data_seek($result,0);  //指针复位 需要研究
while($myrow = mysqli_fetch_row($result)){
	$stop = urldecode($myrow[0]);
	$url = sprintf("http://api.36wu.com/Bus/GetStationInfo?city=%E5%8C%97%E4%BA%AC&station=%s&authkey=%s&format=json", $stop, $auth_key);
	$result1 = file_get_contents($url);
	$jsonarr = json_decode($result1, true);
	$ll = explode(',', $jsonarr['data'][0]['xy']);
	$lon_ = $ll[0];
	$lat_ = $ll[1];
	$sql = "update main set lon_ = '$lon_' where stop ='".$myrow[0]."'";
	$sql_ = "update main set lat_ = '$lat_' where stop ='".$myrow[0]."'";
	//echo $sql;
	mysqli_query($conn, $sql);
	mysqli_query($conn, $sql_);
}