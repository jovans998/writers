<?php
//include auth.php file on all secure pages
//include("auth.php");
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
        <li class="home"><a href="index.php">Home</a></li>
        <li class="tutorials"><a href="faq.php">FAQ</a></li>
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

                while($row = mysqli_fetch_array($result))
                {
					
                     echo '
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />
                               </td>
                          </tr>
                     ';
                }

        ?>


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

	</div>
	<div class = "about">
	
		<h3>Coments</h3>
		
		<?php
			
			

			$query = "SELECT * FROM users WHERE username = '$this_user'";
            $result2 = mysqli_query($con, $query);
			
			while($row1 = mysqli_fetch_array($result2)){
			
			$uid = $row1['userID'];
			
			$query = "SELECT * FROM coments WHERE userID = $uid AND aproved = 'true'";
            $result = mysqli_query($con, $query);

			while($row = mysqli_fetch_array($result)){?>
				
				<div id = "show" class = "about">
				
				<h3>Name</h3>
				<p><?php echo $row['name']; ?></p>
				<h3>Coment</h3>
				<p><?php echo $row['coment']; ?></p>

				</div>
				
			<?php }} ?>
	
	</div>
	<div id = "form">
	
		<h3 class = "about">Leave your coment here</h3>

		<table bgcolor="#f2f2f2" style="padding:50px" align="center">
			<form action="" method="post">
			<tr>
				<td> Name : </td><td><input type="text" name="name"></td>
			</tr>

			<tr>
				<td> Comment : </td><td><textarea name="coment" rows="6" cols="50"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit"></td>
			</tr>

			</form>
		</table>

		<?php
			if(isset($_POST["submit"])){

			$query = "SELECT * FROM users WHERE username = '$this_user'";
            $result = mysqli_query($con, $query);

			$name = $_POST["name"];
			$coment = $_POST["coment"];
			
			while($row = mysqli_fetch_array($result)){
				
				
				$user_id = $row['userID'];

				$query1 = "INSERT INTO coments (userID,name,coment,aproved) VALUES ($user_id,'$name','$coment','false')";
				$result1 = mysqli_query($con, $query1);
				
				if($result){
					echo '<center> Comment Successfully Submitted </center>';
					}
				
				
			}
			}
		?>

	</div>

  </div>

</body>
</html>