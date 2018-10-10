<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
		#l-map{height:100%;width:78%;float:left;border-right:2px solid #bcbcbc;}
		#r-result{height:100%;width:20%;float:left;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=CD437e016a3d1de29fcd0df6eba15702"></script>
	<title>轨迹地图</title>
</head>
<body>
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
var map = new BMap.Map("allmap");
<?php 
	include_once('conn.php');
	$sql = 'select longitude, latitude from main';
	$result = mysqli_query($conn, $sql);
	$myrow = mysqli_fetch_array($result);
	mysqli_data_seek($result,0);  //指针复位 需要研究
	$nums = mysqli_num_fields($result);//获取字段数

?>
a = [<?php 	$n = 0;
	while($myrow = mysqli_fetch_row($result)){
		if ($n != 0){
			echo ',';
		}
		echo $myrow[0];
		$n++;
	}mysqli_data_seek($result,0);  //指针复位 需要研究?>];
b = [<?php 	$nn = 0;
	while($myrow = mysqli_fetch_row($result)){
		if ($nn != 0){
			echo ',';
		}
		echo $myrow[1];
		$nn++;
	}?>];
for(var i=0;i<a.length;i++){
	var point = new BMap.Point(a[i], b[i]);
	map.centerAndZoom(point, 15);
	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);
}

</script>
