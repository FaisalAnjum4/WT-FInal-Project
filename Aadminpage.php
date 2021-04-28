<?php 

  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" href="Aadminpage.css">

</head>
<body>
	<header>
      
	<div class="menu-bar">
	<ul>
		<li class="active"> <a href="">Home</a></li>

		<li > <a href="">Manager</a>
             <div class="sub-menu-1">
         	<ul>
         		<li><a href="">Add Manager</a></li>
         		<li><a href="Aremovemanager.php">Remove Manager</a></li>
               <li><a href="requestverify.html">Manager Request</a></li>
         	</ul>
         	
         </div>
		</li>
      
		<li> <a href="">Details</a>
                 <div class="sub-menu-1">
         	<ul>
         		<li><a href="Amanagerdetails.html">Manager Details</a></li>
         		<li><a href="">Receptionist Details</a></li>
         		<li><a href="">User Details</a></li>
         	</ul>
         	
         </div>
		</li>
		<li> <a href="">Finance</a>
                 <div class="sub-menu-1">
            <ul>
                <li><a href="setsalary.php">Manager Salary</a></li>
              
                
            </ul>
            
         </div>
        </li>
		<li><a href="AJobCircular.php">Job Circular</a></li>
		<li><a href="rating.php">All Ratings</a></li>
	   <li> <a href=""><?php echo "Profile ".$_SESSION['username']?></a>
         <div class="sub-menu-1">
         	<ul>
              
         		<li><a href="Aeditprofile.php">Change Password</a></li>
         		<li><a href="logout.php">Logout</a></li>
         	</ul>
         	
         </div>
		</li>
	</ul>

	</div>
  
	</header>
    <div class="title">
    <h1 style="padding:50px; color:#2B1B17;font-size: 40px;font-family: bodoni mt black;"><center><?php echo "Welcome ". $_SESSION['username']; ?></center></h1>
</div>
	<?php include 'footer.php';?>
</body>
</html>