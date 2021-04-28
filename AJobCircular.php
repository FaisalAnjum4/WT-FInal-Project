
<!DOCTYPE html>
<html>
<head>
	<title>JobCircular</title>
</head>
<body background= "job.jpg">
	<center>
	<h1	style="text-align:centre;">Job Circular</h1>
	</center>
	
   <br>
<h1 style=" color: blue; text-align:center; ;font-size : 20px;"> 

<?php
    
/* echo "<b>  Welcome " . $_SESSION['user']."</b>";
 ?>
 <h1 style=" color: blue; text-align:right ;font-size : 15px;;">
<?php
  include "DateTime.php" ?>
  </h1>
  */
  ?>

    <?php echo "<br>" ?>
 <br><br><br>
</h1>
	
	<form action="upload.php "  method="POST" enctype="multipart/form-data"><b>
      <center>
		<!-- Input Text Field -->
		
		 <input  style="color: green; font-size : 15px; width: 300px; height: 100px;"  type="file" name="file">
  
        
          </center>
		<br></b>
		
	<center>
		<input style="color: green; font-size : 20px; width: 100px; height: 60px;" type="submit" value="UPLOAD">
</center>
		
	</form>


		

</body>
</html>