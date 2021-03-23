 <?php
 session_start();   	                 
include "connection.php";
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$username = $_POST['uname'];
	$email  = $_POST['email'];
	$ph = $_POST['phone'];
	$add = $_POST['address'];
	$img =$_FILES["images"]["name"];
	$c_image_temp=$_FILES['images']['tmp_name'];
  	$i_id = $_POST['image'];

if ($c_image_temp != "") {
	move_uploaded_file($_FILES['images']['tmp_name'],'image/'.$img);
	$qry =  mysqli_query($conn, "UPDATE `from_submit` set name='".$fname."',user_name='".$username."',phone='".$ph."',address='".$add."', ima= '".$img."' WHERE id = '".$_GET['id']."'");
	header("location: fetch.php");
		$_SESSION['success_message'] = "Message Updated Successfully..";
}else{
	$qry = mysqli_query($conn, "UPDATE `from_submit` set name='".$fname."',user_name='".$username."',phone='".$ph."',address='".$add."', ima= '".$img."' WHERE id = '".$i_id."'");
	header("location: fetch.php");
		$_SESSION['success_message'] = "Message Updated Successfully..";
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.style{
	border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 44%;
    height: 1044px;
    align-items: center;
    margin-left: 387px;
    margin-bottom: 10px;
		}

		input[type=text],input[type=email], input[type=Password], select, textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
	}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
<body>
	<?php 
	$uid = $_GET['id'];
	
	$abc = mysqli_query($conn,"SELECT * FROM `from_submit` WHERE `id` = '$uid' "  );
	while ($sunil = mysqli_fetch_assoc($abc)) {
    ?>
<form class="style" method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="hidden_id" value="<?php echo $sunil['id']; ?>">
	<label>Name</label>
	<input type="text" name="fname"  value="<?php echo $sunil['name']; ?>"><br><br>
	<label>User Name</label>
	<input type="text" name="uname" value="<?php echo $sunil['user_name']; ?>"><br><br>
	<label>Email</label>
	<input type="text" name="email" value="<?php echo $sunil['email']; ?>"><br><br>

	<label>Phone </label><br><br>
	<input type="text" name="phone" value="<?php echo $sunil['phone']; ?>" >
	<br>
	Address
	<br>
	<input type="text"  value="<?php echo $sunil['address']; ?>" name="address">  
	<br> <br>  
	<input type="file" name="images" value="<?php echo $sunil['ima']; ?>">
	<input type="hidden" name="image" value="<?php echo $sunil['ima']; ?>">
	<img width="auto" src="image/<?php echo $sunil['ima']?>" width="50" height="50" /><br><br>
	<input type="submit" class="btn btn-primary" value="Update" name="submit" />  
<?php } ?>
</form>
</body>
</html> 