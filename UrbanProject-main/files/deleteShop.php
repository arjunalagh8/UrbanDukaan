<?php 
require_once 'connect.php';
	$dir = 'uploads'; 

	session_start();
	$shopid = $_SESSION['NavShopId'];
	$shopimg1 = $_SESSION['img1'];
	$stmt = $conn->query("SELECT productName,pid,img1,img2,img3,price FROM urbandukaan_project.product where shopId = $shopid;");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$img1 = $row['img1'];
		// echo $img1;
		$img2 = $row['img2'];
		$img3 = $row['img3'];
		$sql = "DELETE FROM urbandukaan_project.product WHERE pid =:c;";
		$stmt2 = $conn->prepare($sql);
		$stmt2->bindParam(':c',$row['pid']);
		$stmt2->execute();
		if(!$stmt2->rowCount()){
			echo "Some Internal Error Occured";
			header("refresh:1; url= shopDash.php");
			exit();
			}else
			echo("Product deleted Successfully");
			if($img1){
				$temp = $dir.'/'.$img1;
			if(!unlink($temp)){
				echo "img1 Not deleted from Database";
			}else{
				echo("img1 deleted from Database");
			}}

			if($row['img2']){
			if(!unlink($dir.'/'.$img2)){
				echo "img2 Not deleted from Database";
			}else{
				echo("img2 deleted from Database");
			}}
			if($row['img3']){
			if(!unlink($dir.'/'.$img3)){
				echo "img3 Not deleted from Database";
			}else{
				echo("img3 deleted from Database");
			}}
	}
	$sql3 = "DELETE FROM urbandukaan_project.shop WHERE shopId =:c;";
			$stmt3 = $conn->prepare($sql3);
			$stmt3->bindParam(':c',$shopid);
			$stmt3->execute();
				if(!$stmt3->rowCount()){
				echo "Some Internal Error Occured";
				header("refresh:1; url= shopDash.php");
				
				}else
				echo "Shop Deleted Successfully";
				if(!unlink($shopimg1) ){
				echo "img1 Not deleted from Database" ;
				}else{
				 echo("img1 deleted from Database");
				}
				header("refresh:1; url= sellerDash.php");
		exit();

 ?>
