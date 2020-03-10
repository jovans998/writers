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
	  
        <li class="home"><a class="active" href="dashboard.php">ADMIN PAGE</a></li>
		<li class="home"><a href="users.php">Manage accounts</a></li>
		<li class="logout"><a href="add.php">Add New User</a></li>
		<li class="logout"><a href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </header>
  
  <div id="container">
	
	<div id = "username">
	
		<h2>UNAPROVED COMENTS</h2>
		
		<?php
			
			require('db.php');
		
			$query = "SELECT * FROM coments WHERE aproved = 'false'";
            $result = mysqli_query($con, $query);
			
			$aprove = "true";
			
			while($row = mysqli_fetch_array($result)){
				
				$userID = $row['userID'];
				$comentID = $row ['comentID'];
				
				$query1 = "SELECT * FROM users WHERE userID = $userID";
				$result1 = mysqli_query($con, $query1);
				while($row1 = mysqli_fetch_array($result1)){?>
				
				<h2>Coment for user: <?php echo $row1 ['username']?></h2><br/>
				<p>Coment from: <?php echo $row ['name']?></p><br/>
				<p>Coment: <?php echo $row ['coment']?></p><br/>
				
				<form action = "apr.php" method = "get">
					
					<input type = "hidden" class = "name" name = "aprove" value = "<?php echo $row ['comentID']; ?>"/>
				
					<input type = "submit" name = "submit" value = "Aprove"/>
					
					</form>
				
			<?php }} ?>
	
	</div>
	
  </div>
  
</body>
</html>