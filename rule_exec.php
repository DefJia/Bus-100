<?php
	include_once('conn.php');
	$rule = $_POST['rule'];
	$sql = "insert into rule(rule) values ('$rule')";
	$new = mysqli_query($conn, $sql);

if ($new){
                echo "<script>alert('添加成功！'); history.go(-1);</script>";
            } //history.go(-1);
            else{  
                echo "<script>alert('添加未成功！原因未知！');history.go(-1);</script>";
            }  // history.go(-1);
        
        mysqli_close($conn);