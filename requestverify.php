<!DOCTYPE html>
<html>
<head>
  

<table border="1">

<tr>
    <th>ID</th>
	<th>UserName</th>
	<th>Text Box</th>
	<th>Email</th>
		<th>Phone</th>
</tr>
<?php

 $conn = mysqli_connect("localhost","admin","123","task");

if($_SERVER["REQUEST_METHOD"] == "GET") {
  

  $searchKey = $_GET['searchKey'];
  $sql = "SELECT * FROM user WHERE id = " . $searchKey;
 

  if(empty($searchKey)) {
     $sql = "SELECT * FROM user";
  }
  
  if($conn -> connect_error) {
    echo "Failed to connect database!";
  }
  else {
    $result = $conn -> query($sql);

    if($result -> num_rows > 0) {
       while ($row = $result-> fetch_assoc()) {
            
echo  "<tr><td>" .$row["id"] ."<td>".$row["username"] ."<td>" . $row["textbox"] ."<td>"  .$row["email"] ."<td>". $row["phone"] ."<td>" ;
          

              }
              echo "<br>";

    } 
    else {
      echo "<p align='center'> <font color=white size='6pt'>No data found</font> </p>";
    }
  }
    
  $conn -> close();
}

?>


 </table>

</body>
</html>