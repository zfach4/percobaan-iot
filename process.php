<?php
include_once ("config.php");
//Data Processing
if($_POST['ON1']){
    $var = $_POST['Time1'];
    $sql = mysqli_query($mysqli,"insert into tabel (name, status, time) values ('LED1', 1, $var)");
}
elseif($_POST['ON2']){
	$var = $_POST['Time2'];
    $sql = mysqli_query($mysqli,"insert into tabel (name, status, time) values ('LED2', 1, $var)");
}
elseif($_POST['ON3']){
	$var = $_POST['Time3'];
    $sql = mysqli_query($mysqli,"insert into tabel (name, status, time) values ('LED3', 1, $var)");
}
elseif($_POST['OFF1']){
    $sql = mysqli_query($mysqli,"insert into tabel (name, status, time) values ('LED1', 0, 0)");
}
elseif($_POST['OFF2']){
	$sql = mysqli_query($mysqli,"insert into tabel (name, status, time) values ('LED2', 0, 0)");
}
elseif($_POST['OFF3']){
	$sql = mysqli_query($mysqli,"insert into tabel (name, status, time) values ('LED3', 0, 0)");
}else {
    echo"ERROR";
}
//Redirect
if($sql){
	header("location:index.php#control");
}else{
	echo "Error";
}
?>