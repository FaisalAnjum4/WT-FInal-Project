<?php

  //session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>JobCircular</title>
</head>
<body background= "job.jpg">
	<center>
	<h1	style="text-align:centre;">Job Circular</h1>
	</center>

<h1 style=" color: blue; text-align:center; ;font-size : 20px;;">
	<?php
    
 //echo "<b>  Welcome " . $_SESSION['user']."</b>";
 ?>
 <h1 style=" color: blue; text-align:right ;font-size : 15px;">
<?php
  //include "DateTime.php" ?>
  </h1>

    <?php echo "<br>"; ?>
 <br><br><br>
</h1>
<?php
if(!file_exists("JobCircularFile")){

	mkdir("JobCircularFile");
}
if($_FILES["file"]["error"]>0){

	$er = "Error Return Code:" .$_FILES["file"]["error"]."<br/>";
}

else{
    
	echo "<b> Upload:" .$_FILES["file"]["name"] . " successfully <br/>";
	

	$img = $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],
		"JobCircularFile/" . $_FILES["file"]["name"]);
	}
?>
</body>
</html>