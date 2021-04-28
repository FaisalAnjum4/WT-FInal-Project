<!DOCTYPE html>
<html>
<head>
   <style type="text/css">
   	*{
	padding: 0;
	margin:0;
}
body{
	background-image:url(admincover.jpg);
	background-size: cover;
	background-position: center;
	font-family: sans-serif; 
	height: 100vh;
}
     table{
     	border-collapse: collapse;
     	width: 100%;
     	color: #eb4034;
     	font-family: monospace;
     	font-size: 25px;
     	text-align: left;
     }
     th{
     	background-color: #58D68D;
     	color: white;
    
     }


    tr:nth-child(even){
    	background-color: #D1F2EB ;
        width:100px;
    }
    tr:nth-child(odd){
      background-color: #E8DAEF ;
        width:100px;
    }
   </style>	

</head>
<body>
	<table>
		
		<tr>
			<th>Manager Name</th>
			<th>Manager USERID</th>
			<th>Password</th>
			<th>Email</th>
		</tr>
    <form action=""  method="POST"><b>
      


          <p>Username</p>
          <label for="username"></label>
        <input  type="text"   name="username" id="username"  placeholder="Enter a UserName" value="<?php echo $username ?>">
		<?php
         $conn = mysqli_connect("localhost","admin","123","task");
         $sql = "Select * From user";
         $result = $conn-> query($sql);

         if($result->num_rows > 0){

              while ($row = $result-> fetch_assoc()) {
              	echo  "<tr><td>" . $row["lastname"] ."<td>" . $row["username"] ."<td>" . $row["password"] ."<td>" . $row["email"]."<td>" ; 
              }
         }
         else{
         	echo "No Result";
         }

          $conn->close();
		?>
	</table>

</body>
</html>