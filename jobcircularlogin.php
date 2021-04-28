

<!DOCTYPE html>
<html>
    <head>
        <title>Job Circular</title>
    </head>
   <body background= "coverjob.jpg" >
    	

<?php
//include "SInclude.php" ;
$files = scandir("JobCircularFile");
for($a=2; $a<count($files);$a++){

	?>

	<p>
        <center>
		 <a href="jobcircularlogin.php" style="font-family: 'Cooper Black'; font-size: 20px; padding:0px 20px;
		  border: 2px solid #fff;text-align:center; color: green;  background: white; border-color:black;" download="<?php echo $files[$a] ?>" href="JobCircularFile/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a><br><br>	
</p>
<?php
}
?>		
</center>
</body>
</html>