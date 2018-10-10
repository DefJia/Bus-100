<?php
	include_once('conn.php');
	$id  = $_GET['id'];
	$sql = 'delete from main where id ='.$id;
	$new = mysqli_query($conn, $sql);

if ($new){
                echo "<script>alert('删除成功！'); history.go(-1);</script>";
            } //history.go(-1);
            else{  
                echo "<script>alert('删除未成功！原因未知！');history.go(-1);</script>";
            }  // history.go(-1);  
    $sql = "SELECT * from main";
	$result = mysqli_query($conn, $sql);
	$myrow = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result) + 1;
    $sql = 'alter table main auto_increment='.$count; 
    mysqli_query($conn, $sql); 
        mysqli_close($conn);