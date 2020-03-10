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

		<?php include ("registration.php");?>
	

  </div>

</body>
</html>