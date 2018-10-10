<?php
ini_set("display_errors", "off");
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />  
	<title>记录删除</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
body{
	background-color:#D4EEC9;
	text-align:center;
}
caption,th{
	text-align:center;
}
</style>

<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid"> 
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#example-navbar-collapse">
			<span class="sr-only">切换导航</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php">公交百站乐智能记录系统</a>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="list.php">签到列表</a></li>
			<li><a href="map.php">签到地图</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					开发者页面 <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="delete.php">记录删除</a></li>
					<li class="divider"></li>
					<li><a href="rule_add.php">规则添加</a></li>
					<li><a href="rule_get.php">规则查看</a></li>
				</ul>
			</li>
		</ul>
	</div>
	</div>
</nav>
<div class='container'>
<table class="table table-hover">
	<caption>记录删除</caption>
	<thead>
		<tr>
			<th>序号</th>
			<th>车次</th>
			<th>站点</th>
			<th>备注</th>
			<th>删除</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
		include_once('conn.php');
		$sql = " select id, num, stop, comment from main";
		$result = mysqli_query($conn, $sql);
	$myrow = mysqli_fetch_array($result);
	mysqli_data_seek($result,0);  //指针复位 需要研究
	$nums = mysqli_num_fields($result);//获取字段数

	while($myrow = mysqli_fetch_row($result)){
		echo "<tr>";
		for ( $m = 0 ; $m < $nums ; $m++ ){
			echo "<td>".$myrow[$m]."</td>";
		}
		echo "<td><a href='record_exec.php?id=".$myrow[0]."' class='btn btn-danger'>删除</a></td></tr>";
	}

?>
		</tr>

	</tbody>
</table>
</div><hr color=#ccc width=61.8% />
<h6 style='text-align:center;'>© 2017.4 <a href='http://blog.defjia.top/zh/'>DefJia</a> ALL RIGHTS RESERVED.</h6>
</body>
</html>