<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $about = stripslashes($_REQUEST['about']);
 $about = mysqli_real_escape_string($con,$about);
 $price = stripslashes($_REQUEST['price']);
 $price = mysqli_real_escape_string($con,$price);
 
 $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      
 
 
        $query = "INSERT into `users` (username, password, email, about, image, price)
VALUES ('$username', '".md5($password)."', '$email', '$about', '$file', '$price')";
        $result = mysqli_query($con,$query);
		
        if($result){
            echo "<div class='form'>
<h3>New user registered successfully.</h3>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post" enctype='multipart/form-data'>
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type='file' name='image' />
<input type='longtext' name='about' placeholder="About"/>
<input type='text' name='price' placeholder="Your Price"/>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
