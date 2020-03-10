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
		<li class="home"><a class="active" href="users.php">Manage accounts</a></li>
		<li class="logout"><a href="add.php">Add New User</a></li>
		<li class="logout"><a href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </header>

  <div id="container">

	<div id = "image">

		<?php
			require('db.php');
			//session_start();
			if (isset($_GET['username'])){
			$this_user = $_GET["username"];
			

			$query = "SELECT * FROM users WHERE username = '$this_user'";
            $result = mysqli_query($con, $query);

                
				while ($row = mysqli_fetch_array($result)){
                
					
                echo 	'     
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />
                               </td>
                          </tr>
                     
				'; }?>
				<form action = "apr.php" method = "get">
					
					<input type = "hidden" class = "name" name = "change" value = "<?php echo $this_user ?>"/>
				
					<input type = "submit" name = "submit" value = "Change picture"/>
					
				</form>
				
				


	</div>

	<div id = "username">

		<h2><?php echo $this_user; ?></h2>

	</div>



	<div class = "about">



		<?php

			

			$query = "SELECT * FROM users WHERE username = '$this_user'";
            $result = mysqli_query($con, $query);
			

			while($row = mysqli_fetch_array($result)){?>

				<h3>Price</h3>
				<p id = "paraf1"><?php echo $row['price']; ?></p>
				<h3>About</h3>
				<p id = "paraf"><?php echo $row['about']; ?></p>

			<?php }	} ?>
			
			<h3 class = "about">Change description</h3>

		<table bgcolor="#f2f2f2" style="padding:50px" align="center">
			<form action="" method="post">
			<tr>
				<td><input type="hidden" name="name" value = "<?php echo $this_user?>"></td>
			</tr>

			<tr>
				<td><textarea name="coment" rows="6" cols="50" placeholder = "New description"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit"></td>
			</tr>

			</form>
		</table>
		
		<?php
			if(isset($_POST["submit"])){

			$coment = $_POST["coment"];
			$query = "UPDATE users SET about = '$coment' WHERE username = '$this_user'";
            $result = mysqli_query($con, $query);

			}
			
			?>
			

	</div>
	
	

  </div>

</body>
</html>