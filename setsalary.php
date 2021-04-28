<?php
session_start();
?>
<style >
     table{
         border-collapse: collapse;
         width: 100%;
         color: #483C32;
         font-family: monospace;
         font-size: 20px;
         text-align: left;
     }
     th{
        background-color: #F1C40F;
        color: white;

    
     }


    tr:nth-child(even){
        background-color: #F5CBA7 ;
        width:100px;
    }
    tr:nth-child(odd){
      background-color: #FEF9E7 ;
        width:100px;
    }
    
    h2{

        color: red;
        font-family: Cooper black;
        text-shadow: 2px 5px 5px navy;
    }
    p{
         color: #F1C40F;
        font-family: Cooper black;
        text-shadow: 1px 1px 2px blue;
        font-size: 20px;

    }

h5{

  font-size: 30px;
  text-shadow: 5px 5px 5px black;

}
}
 

</style>
<!DOCTYPE html>
<html>
<head >
<title>Book Details</title>
<link rel="stylesheet" type="text/css" href="">

 

<body style="height: 100vh; background-size: cover;" background= "setsalary.jpg">
    <table border="7">

 

      
        <tr>
            <th>id</th>
            <th> name</th>
            <th> email</th>
            <th> phone</th>
            <th> username</th>
        <th> salary</th>
        </tr>

<?php
 $username = "";
            $usernameerr =  "";

  $hostname = "localhost";
  $username = "admin";
  $password = "123";
  $dbname = "task";

  // Mysqli Procedural
  $conn2 = mysqli_connect($hostname, $username, $password, $dbname);


            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['username'])) {
                    $usernameerr = "Please Fill up the Username!";
                }
                else 
                  {
                    $username=$_POST['username'];
                   }
                

                

                if($usernameerr ==""){

                     $username = $_POST['username'];
                     $salary = $_POST['salary'];


  $query= mysqli_query($conn2,"SELECT * from user where username= '$username' ");
$num = mysqli_fetch_array($query);
if($num>0){
  
     if(mysqli_connect_error()) {
    echo "2. Database Connection Failed!...";
    echo "<br>";
    echo mysqli_connect_error();
  }
  else {
 
 
    $stmt2 = mysqli_prepare($conn2, "UPDATE user set salary = ? where username = ? ");
    mysqli_stmt_bind_param($stmt2, "is", $p3, $p4 , );
    $p3 = $_POST['salary'];
    $p4 = $_POST['username'];
    $res = mysqli_stmt_execute($stmt2);

    if($res) {
  
  //   header("Location: Amanagerdetails.php ");
//     exit();
     $sql = "SELECT  * from user ";
$result = $conn2-> query($sql);

 

if($result-> num_rows > 0){

 

    while ($row = $result-> fetch_assoc()){
        echo"<tr><td>". $row["id"] . "</td><td>". $row["lastname"] . "</td><td>". $row["email"] . "</td><td>". $row["phone"] . "</td><td>". $row["username"] . "</td><td>". $row["salary"] . "</td></tr>";

    }
    echo "</table>";
}
    }
    else {
      echo "Failed to Update Data.";
      echo "<br>";
      echo $conn2->error;
    }
  

 
}
  
  }

 else{

    $usernameerr= "Type the exact username";
  }
  mysqli_close($conn2);
 
            }
 }

                    

?>
 

<div class="Details">
<center>
<h2 style=" color: #2E86C1;"><b><?php echo "Welcome " . $_SESSION['username'] ?></b> </h2>
<h2>Set Salary</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><b>

<p>UserName:</p>
<label for="username"></label>
<input type="text" name="username" id="username" value="<?php echo $username ?>">
<h5 style="color: #0FF1D4">
<?php echo $usernameerr; ?></h5>

<p>Set Salary:</p>
<label for="salary"></label>
<input type="text" name="salary" id="salary"><br>

 


<input type="submit" value="send">

 

 </div>
</font>

 


</form>

 

        
</center>

 

</body>
</head>
</html>