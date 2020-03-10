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
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/ind.css" />
</head>
<body class="news">
<header>
    <div class="nav">
      <ul>
        <li class="home"><a class="active" href="index.php">Home</a></li>
        <li class="tutorials"><a href="faq.php">FAQ</a></li>       
      </ul>
    </div>
</header>
	
	<div id="container">
	
		
		<div id="image">
		
		<?php
			require('db.php');
			//$this_user = $_SESSION['username'];

			$query = "SELECT * FROM users";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  ?> 
					<form action = "profile.php" method = "get">
					<?php
                     echo '  
					 
					 
					 
                          <tr>  
                               <td>  
                                   <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />
                               </td>  
                          </tr>  
						  
									
								
					 
					 
                     '; ?>
					<h2 class = "name">Name:</h2> <input type = "hidden" class = "name" name = "username" value = "<?php echo $row['username']; ?>"/>
					<h2 class="name"><?php echo $row['username'] ?></h2>
					<h2 class = "name">Price:</h2> <h3 class = "name"><?php echo $row['price']; ?></h3>
								
					<input type = "submit" name = "submit" value = "LEARN MORE"/>
					
					</form>
					
		       <?php }  ?>  
				
					
				
		</div>


	</div>
	
 
</body>
</html>