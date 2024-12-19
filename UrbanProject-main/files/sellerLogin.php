<?php 
require_once 'connect.php';
if(isset($_POST['login']) ){


	$sql = "SELECT * from urbandukan_project.seller where email = :e";
	$pass = md5($_POST['pass']);
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':e',$_POST['email']);
	$stmt->execute();

	if($stmt->rowCount()>0){
		$getRow = $stmt->fetch(PDO::FETCH_ASSOC);
				if($getRow['pass']==$pass)
				{
					echo "Login Successfully";
					$email = $_POST['email'];
					$stmt = $conn->query("SELECT sid FROM urbandukan_project.seller where email='$email';");
					$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
					session_start();

					$_SESSION['NavSelSid'] = $row['sid'];
					header("refresh:0; url= sellerDash.php");
					
				}
				else
				{
					echo "Password is incorrect";
					header("refresh:0; url= sellerlogin.html");
				}
	}
	else{
	echo "Email-id Does not exists";
	header("refresh:0; url= sellerlogin.html");
	}

}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>