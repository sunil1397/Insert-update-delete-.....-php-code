 <?php 
session_start();
include "connection.php";
if (isset($_POST['submit'])) {
  
  $fname = $_POST['firstname'];
  
  $uname = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $add = $_POST['address'];

 $img =$_FILES["images"]["name"];
  move_uploaded_file($_FILES['images']['tmp_name'],'image/'.$img);
  
  
  $qry = mysqli_query($conn, "INSERT INTO `from_submit`(`name`,`user_name`,`email`,`phone`,`address`,`ima`)VALUES ('$fname','$uname','$email','$phone','$add','$img')");
  if ($qry == true) {
     header("Location: fetch.php");
    $_SESSION['success_message'] = "Message Save Successfully..";
    
    
  }else{
    echo "error";
  }

  // if ($_POST['submit']) {
  //   if (from($fname, $uname, $email, $phone, $add)) {
  //     $success = "message sent successfully";
  //   }else{
  //     $success = "something eant worng";
  //   }
  
}



?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    .all{
  border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 44%;
    height: 858px;
    align-items: center;
    margin-left: 387px;
    margin-bottom: 10px;
    margin-top: 20px;
    }

    input[type=text],input[type=email], input[type=Password], input[type=number], select, textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    

  </style>

  <title></title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
<body>
  
  <form class="all"  method="post" id="abc" enctype="multipart/form-data" name="submit_all">  
    
    <label> Name </label>         
    <input type="text" name="firstname" /> <br> <br>  
    <label> user Name: </label>     
    <input type="text" name="username" /> <br> <br>   
     Email:  
    <input type="email" id="email" name="email"/> <br>    
    <br> <br>  
      
    <label>   
    Phone :  
    </label>  
    <input type="number" name="phone"  value="+91" size="2"/>   
     <br>  
    Address  
    <br>  
    <textarea cols="80" rows="5" id="text" name="address">  
    </textarea>  
    <br> <br>  
    <label>Image</label><br>
    <input type="file" name="images">
   <br><br>
    <input type="submit" value="Submit" id="submit" class="btn btn-primary" name="submit" /> 
    <a href="fetch.php" class="btn btn-primary">table</a>
  </form>
  
  <script>
  $(document).ready(function () {
     $('#abc').validate({
     rules: {
         firstname: {
           required: true
         },
         username: {
           required: true
         },
         email: {
         required: true,
           email: true
         },
         phone: {
           required: true,  
           rangelength: [10, 12],
           number: true
        },
         address: {
          required: true
         },
        
       },
       messages: {
         firstname: 'Please enter Name.',
         username: 'Please enter Username Name.',
         email: {
           required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
         },
         phone: {
          required: 'Please enter Contact.',
           rangelength: 'Contact should be 10 digit number.'

       },
         password: {
           required: 'Please enter Password.',
          
         }
        
       },
       submitHandler: function (form) {
         form.submit();
       }
     });
 });

</script>
</body>
</html> 