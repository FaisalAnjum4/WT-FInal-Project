

<!DOCTYPE html>
<html>
<head>
<body>
  <table>
    
    <tr>
      <th>Manager ID</th>
      <th>Manager Name</th>
      <th>Manager Username</th>
      <th>Password</th>
      <th>Email</th>
      <th>Salary</th>
    </tr>
<?php 

 $conn = mysqli_connect("localhost","admin","123","task");

if($_SERVER["REQUEST_METHOD"] == "GET") {


  $searchKey = $_GET['searchKey'];
  $sql = "SELECT * FROM user WHERE id = " . $searchKey;

  if(empty($searchKey)) {
    $sql = "SELECT * FROM user  ";
  }
  
 $conn = mysqli_connect("localhost","admin","123","task");


  if($conn -> connect_error) {
    echo "Failed to connect database!";
  }
  else {
    $result = $conn -> query($sql);

    if($result -> num_rows > 0) {
       while ($row = $result-> fetch_assoc()) {
            
echo  "<tr><td>" .$row["id"] ."<td>" . $row["lastname"] ."<td>"  .$row["username"] ."<td>". $row["email"] ."<td>"  .$row["password"] ." <td>".$row["salary"]."<td>" ;
              }
              echo "<br>";

    } 
    else {
      echo "No record found!";
    }
  }
    
  $conn -> close();
}

?>
</table>

</body>
</head>
</html>



