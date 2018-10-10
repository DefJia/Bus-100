<?php 
include_once('conn.php');
$line = $_POST['line'];
$stop = $_POST['stop'];
$comment = $_POST['comment'];
$lon = $_POST['lon'];
$lat = $_POST['lat'];
//echo $line.$stop.$comment.$lon.$lat;
$sql = "insert into main(num, stop, comment, longitude, latitude)
		values ('$line', '$stop', '$comment', '$lon', '$lat')";
$new = mysqli_query($conn, $sql);

if ($new){
                echo "<script>alert('提交成功！'); history.go(-1);</script>";
            } //history.go(-1);
            else{  
                echo "<script>alert('提交未成功！原因未知！');history.go(-1);</script>";
            }  // history.go(-1);
        
        mysqli_close($conn);