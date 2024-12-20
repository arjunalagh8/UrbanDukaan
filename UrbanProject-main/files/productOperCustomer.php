<?php
	require_once 'connect.php';
	$dir = 'uploads'; 

	
	If(isset($_POST['addC'])){

		$sql = "INSERT INTO urbandukan_project.cart(cid,pid) VALUES(:c,:p)";
	$stmt = $conn->prepare($sql);
	try{

		
	$stmt->execute(
		array(
			':c' => $_POST['cid'],
			':p' => $_POST['pid']
		)
	);
	echo "Product Added in Your Cart";
	header("refresh:1; url= customerDash.php");
    exit();
}catch(PDOException $e){
	echo "Some Internal Error Occured";
	header("refresh:1; url= customerDash.php");
}
	}

	If(isset($_POST['proD'])){
		session_start();
		$_SESSION['NavPid'] = $_POST['pid'];
		if (isset($_POST['shopId'])) {
			$_SESSION['shopId'] = $_POST['shopId'];
		}
		
		header("Location: productDetailsCustomer.php");
		exit();
	}
	If(isset($_POST['rem'])){
		$pid = $_POST['pid'];
		$sql = "DELETE FROM urbandukan_project.cart WHERE pid =:c LIMIT 1;";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':c',$pid);
		$stmt->execute();
		if(!$stmt->rowCount()){
		echo "Some Internal Error Occured";
		header("refresh:1; url= shopDash.php");
		exit();
		}else
		echo "Product Removed From Cart";
		header("refresh:1; url= cutomerCart.php");
		exit();
	}
	
?>	

