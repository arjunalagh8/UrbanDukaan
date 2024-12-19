<?php 
require_once 'connect.php';
if(isset($_POST['login']) ){


	$sql = "SELECT * from urbandukan_project.customer where email = :e";
	$pass = md5($_POST['pass']);
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':e',$_POST['email']);
	$stmt->execute();

	if($stmt->rowCount()>0){
		$getRow = $stmt->fetch(PDO::FETCH_ASSOC);
				if($getRow['pass']==$pass)
				{
					
				   
					$email = $_POST['email'];
					$stmt = $conn->query("SELECT cid FROM urbandukan_project.customer where email='$email';");
					$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
					session_start();

					$_SESSION['NavCid'] = $row['cid'];
					header("refresh:1; url= customerDash.php");
					
				}
				else
				{
					echo "Password is incorrect" ;
					header("refresh:1; url= customerlogin.html");
				}
	}
	else{
    echo "Email-id Does not exists" ;
	header("refresh:1; url= customerlogin.html");
	}	
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- partial -->
  <script  src="./script.js"></script>