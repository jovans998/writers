<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" href="css/style_nav.css" />
<link rel="stylesheet" href="css/prof.css" />
</head>
<body class="news">
<header>
    <div class="nav">
      <ul>
	  
        <li class="home"><a href="dashboard.php">ADMIN PAGE</a></li>
		<li class="home"><a href="users.php">Manage accounts</a></li>
		<li class="logout"><a href="add.php">Add New User</a></li>
		<li class="logout"><a href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </header>
  
  <div id="container">
	
	<div id = "username">
	
		
		
		<?php
		
				require('db.php');
		
				if (isset($_GET['aprove'])){?>
				
				<h2>THAT COMENT IS APROVED</h2>
				<h3><a href = "dashboard.php">GO BACK TO SEE MORE UNAPROVED COMENTS</a></h3>
				
			   <?php$comentID = $_GET['aprove'];
					$query2 = "UPDATE coments SET aproved = 'true' WHERE comentID = $comentID";
					$result2 = mysqli_query($con, $query2);
				}
				
				if (isset($_GET['change'])){
					
					$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
					
					if (isset($_REQUEST['userID'])){
			   
					$userID = $_REQUEST['userID'];
					$query2 = "UPDATE users SET image = '$file' WHERE username = $userID";
					$result2 = mysqli_query($con, $query2);
					}else{?>
				
				<h2>Change user picture</h2>
				<form name="registration" action="" method="post" enctype='multipart/form-data'>
					<input type="hidden" name="userID" value = "<?php echo $_GET['change']; ?>" />
					<input type='file' name='image' />
					<input type="submit" name="submit" value="Change picture" />
				</form>
				
				<h3><a href = "dashboard.php">GO BACK TO MANAGE OTHER ACCOUNTS</a></h3>
				
			   <?php }  ?>
		
		
	
	</div>
	
  </div>
  
</body>
</html>