<?php
ini_set("display_errors", "off");
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />  
	<title>地主与大佬的公交百站乐智能记录系统</title>
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
<?php
	include_once('conn.php');
	$sql = "SELECT * from main";
	$result = mysqli_query($conn, $sql);
	$myrow = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result) + 1;
	$a = $count - 1;
	$sql2 = 'SELECT * from main where id = '.settype($a, "string");
	$result = mysqli_query($conn, $sql2);
	$myrow = mysqli_fetch_array($result);
?>
<h3>第<?php echo $count;?>站，你们在北京的哪里？</h3>
<h5 style='margin-bottom:50px;'>上一站：<?php echo $myrow[3].'('.$myrow[2].'路)';?></h5>
<div style='width:88%;text-align:center;' class='container'>

<form class="form-horizontal" role="form" action='exec.php' method='post'>
<div class="form-group">
    <div class="col-xs-offset-4 col-xs-2">
      <a href='index.php' class='btn btn-success'>刷新页面</a>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-xs-4 control-label">公交线路</label>
    <div class="col-xs-8">
      <input type="text" class="form-control" id="firstname" placeholder="请输入公交线路" name="line">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-xs-4 control-label">站点名称</label>
    <div class="col-xs-8">
      <input type="text" class="form-control" id="lastname" placeholder="请输入站点名称"
       name="stop">
    </div>
  </div>
  <div class="form-group">
    <label for="comment">备注</label>
    <textarea class="form-control" rows="3" name="comment" id='comment'></textarea>
  </div>
    <div class="form-group">
    <div class="col-xs-offset-4 col-xs-2">
      <a  onclick='get()' class="btn btn-danger">获取位置信息</a>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-offset-4 col-xs-2">
      <button type="submit" class="btn btn-primary">提交公交信息</button>
    </div>
  </div>
  <input type='text' style='display:none' id='lat' name='lat'/>
  <input type='text' style='display:none' id='lon' name='lon'/>
</form>
</div>
<script language='JavaScript'> 
function get()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(showPosition);
	}
}

function showPosition(position)
{
	document.getElementById("lat").value=position.coords.latitude;
	document.getElementById("lon").value=position.coords.longitude;
}</script>
<hr color=#ccc width=61.8% />
<h6 style='text-align:center;'>© 2017.4 <a href='http://blog.defjia.top/zh/'>DefJia</a> ALL RIGHTS RESERVED.</h6>
</body>
</html>