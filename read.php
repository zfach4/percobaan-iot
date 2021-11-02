<?php
include_once ("config.php");

$sql=mysqli_query($mysqli,"SELECT status,time FROM tabel WHERE name='LED1' ORDER BY id DESC LIMIT 1");
if($data=mysqli_fetch_array($sql)){
    echo "#".$data['status'];
	echo "#".$data['time'];
}
$sql=mysqli_query($mysqli,"SELECT status,time FROM tabel WHERE name='LED2' ORDER BY id DESC LIMIT 1");
if($data=mysqli_fetch_array($sql)){
    echo "#".$data['status'];
	echo "#".$data['time'];
}
$sql=mysqli_query($mysqli,"SELECT status,time FROM tabel WHERE name='LED3' ORDER BY id DESC LIMIT 1");
if($data=mysqli_fetch_array($sql)){
    echo "#".$data['status'];
	echo "#".$data['time'];
}
?>