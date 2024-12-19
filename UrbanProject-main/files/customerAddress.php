<?php 
require_once 'connect.php';
if(isset($_POST['submit']) ){
	session_start();
	$cusCid = $_SESSION['NavCusCid'];

	$sql = "INSERT INTO urbandukan_project.customer_address(cid,pri_add,home_add,work_add) VALUES(:c,:p,:h,:w)";
	$stmt = $conn->prepare($sql);

	try{
		
	$stmt->execute(
		array(
			':c' => $cusCid, 
			':p' => $_POST['Padd'],
			':h' => $_POST['Hadd'],
			':w' => $_POST['Wadd']
		)
	);
	echo "Address Successfully Updated" ;
	header("refresh:1; url= customerlogin.html");
    exit();
}catch(PDOException $e){
	echo "duplicate entry";
	header("refresh:1; url= customeraddress.html");
}
	
}
?>
