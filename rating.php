
<!DOCTYPE html>
<html>
<head >
<title>Book Details</title>

<body style="height: 100vh; background-size: cover;" background= "rating.jpg">
<?php

$conn = mysqli_connect("localhost","admin","123", "task");
$query = "SELECT AVG(rating) AS avg FROM rating";
$result = mysqli_query($conn , $query);
while($row = mysqli_fetch_assoc($result)){


	$output = "Overall rating of your hotel: " .$row['avg']." out of 5";
}

$sql = "SELECT * FROM rating";
$result = mysqli_query($conn,$sql);

?>
<h1 style=" color: navy;
        font-family: Cooper black;
        text-shadow: 2px 2px 2px white; text-align: center; padding: 200px;"><?php echo $output;?></h1>

</body>
</head>
</html>
