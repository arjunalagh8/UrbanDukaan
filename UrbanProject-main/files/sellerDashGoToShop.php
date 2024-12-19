

<?php
	require_once 'connect.php';
	$dir = 'uploads'; 
	session_start();
	If(isset($_POST['ShopSubmit'])){
		
	 $_SESSION['NavShopId'] = $_POST['shopid'];
		header("Location: shopDash.php");
		exit();
	}
	If(isset($_POST['ShopDel'])){
		$shopid = $_POST['shopid'];
		$_SESSION['img1'] = $_POST['img1'];

		 myConfirm('Do you really want to delete your Shop?');
	echo"Some Internal Error Occured";
	header("refresh:1; url= sellerDash.php");
	
?>
<?php
function myConfirm($msg){
	echo "<script>

	if(confirm('$msg')){
		window.location.href = 'deleteShop.php';
	}else window.location.href = 'SellerDash.php';
	;
	</script>";

	
}





