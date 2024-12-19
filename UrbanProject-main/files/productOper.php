<?php
	require_once 'connect.php';
	$dir = 'uploads'; 
	
	If(isset($_POST['proDelete'])){
		$pid = $_POST['pid'];
		$sql = "DELETE FROM urbandukan_project.product WHERE pid =:c;";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':c',$pid);
	$stmt->execute();
	if(!$stmt->rowCount()){
	echo "Some Internal Error Occured";
	header("refresh:1; url= shopDash.php");
	exit();
	}else
    echo "Product deleted Successfully");
	if($_POST['img1']){
		$temp = $dir.'/'.$_POST['img1'];
	if(!unlink($temp)){
		echo "img1 Not deleted from Database";
	}else{
		 echo("img1 deleted from Database");
	}}

	if($_POST['img2']){
	if(!unlink($dir.'/'.$_POST['img2'])){
		echo "img2 Not deleted from Database";
	}else{
		echo("img2 deleted from Database");
	}}
	if($_POST['img3']){
	if(!unlink($dir.'/'.$_POST['img3'])){
		echo "img3 Not deleted from Database";
	}else{
		echo("img3 deleted from Database");
	}}

	header("refresh:1; url= shopDash.php");
		exit();
	}

	If(isset($_POST['proDetail'])){
		session_start();
		$_SESSION['NavPid'] = $_POST['pid'];
		header("location: productDetailsSeller.php");
		exit();
	}
?>	

