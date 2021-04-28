<html>
<head>
    <title>
        
    </title>
</head>
<body>
    <table border="2">
        <tr>
            <th> User</th>
            <th> Name</th>
            <th> Gender</th>
            <th> Address</th>
            <th> Mobile</th>
            <th> Email</th>
            <th>Password</th>
            <th>Operation</th>
        </tr>

 

<?php
$conn= mysqli_connect("localhost","farhan34","farhan34","check");
if($conn->connect_error){

 

    die("Connection failed:". $conn-> connect_error);
}

 


$sql = "SELECT  User,Name,Gender,Address,Mobile,Email,Password from check1 ";
$result = $conn-> query($sql);

 

if($result-> num_rows > 0){

 

    while ($row = $result-> fetch_assoc()){
        echo"<tr><td>". $row["User"] . "</td><td>". $row["Name"] . "</td><td>". $row["Gender"] . "</td><td>". $row["Address"] . "</td><td>". $row["Mobile"] . "</td><td>". $row["Email"] . "</td><td>". $row["Password"] . "</td> <td><a href = 'FRmvr.php?rn=$row[User]'>DELETE</td></tr>";

 

        

 


    }
    echo "</table>";
}
else{
    echo "0 result";
}
$conn-> close();

 

?>
</table>
</body>
</html>