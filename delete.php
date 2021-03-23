 <?php
 session_start();
include "connection.php"; 
$uid = $_GET['id'];
// echo $uid; exit();
$qry=mysqli_query($conn,"DELETE FROM `from_submit` where `id`='$uid'");

if($qry == True){
	header('location: fetch.php');
	 $_SESSION['success_message'] = "Message Deleted Successfully..";
}
else
{
	echo mysqli_error($conn);
}
?>