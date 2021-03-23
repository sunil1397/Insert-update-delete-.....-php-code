 <?php
 include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

</head>
<body>
<?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
                    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
                    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
<table class="table table-bordered" style="width: 80%;">
	  <thead>
	    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Username</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Address</th>
		      <th scope="col">Image</th>
		      <th scope="col">Delete</th>
		      <th scope="col">Edit</th>
		      <th scope="col">page</th>
		    </tr>

	    <?php

		$qry = mysqli_query($conn,"SELECT * FROM `from_submit`" );
		while($sunil = mysqli_fetch_assoc($qry)) {
		?>

	  </thead>
	  <tbody>
	    <tr>
	      <td><?php echo $sunil['id']; ?></td>
	      <td><?php echo $sunil['name']; ?></td>
	      <td><?php echo $sunil['user_name']; ?></td>
	      <td><?php echo $sunil['email']; ?></td>
	      <td><?php echo $sunil['phone']; ?></td>
	      <td><?php echo $sunil['address']; ?></td>
	      <td><img src="image/<?php echo $sunil['ima']; ?>" width="50" height="50" /></td>
		  <td><button type="button" onclick="delete_records('<?php echo $sunil['id'];?>')">Delete</button></td>
		 <td><button type="button" onclick="update('<?php echo $sunil['id'];?>')">Edit</button></td>
		 <td><a href="xyz.php" class="btn btn-secondary">Home</a></td>

	    </tr>
	<?php } ?>
	  </tbody>
</table>
<script type="text/javascript">
	
	function delete_records(id)
	{
		$con = confirm("Are you want to Delete it");
		if ($con) 
		window.location.href="delete.php?id="+id;
	}

	function update(id)
	{
		window.location.href="update.php?id="+id;
	}
</script>

</body>
</html>