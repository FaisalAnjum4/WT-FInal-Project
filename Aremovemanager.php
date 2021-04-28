<?php 

  session_start();
?>


<?php
 $id = $name = "";
            $iderr = $nameerr = "";

   $hostname = "localhost";
  $username = "admin";
  $password = "123";
  $dbname = "task";


  $conn2 = mysqli_connect($hostname, $username, $password, $dbname);

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['id'])) {
                    $iderr = "Please Fill up the Manager ID!";
                }
                else 
                  {
                    $id=$_POST['id'];
                   }
                

                if(empty($_POST['name'])) {                    
                    $nameerr = "Please Fill up the Username!";
                }

                else 
                  {
                    $name=$_POST['name'];
                   }

                if($iderr ==""&& $nameerr==""){

                     $id = $_POST['id'];
                     $name = $_POST['name'];
                    
  $query= mysqli_query($conn2,"SELECT * from user where id='$id' and username= '$name'  ");
$num = mysqli_fetch_array($query);
if($num>0){
  
  if(mysqli_connect_error()) {
    echo "2. Database Connection Failed!...";
    echo "<br>";
    echo mysqli_connect_error();
  }
  else {
    echo "2. Database Connection Successful!";

    $stmt2 = mysqli_prepare($conn2, "DELETE FROM user WHERE id = ? AND  username = ? ");
    mysqli_stmt_bind_param($stmt2, "is",$p3, $p4);
    $p3 = $_POST['id'];
    $p4 = $_POST['name'];
    $res = mysqli_stmt_execute($stmt2);
    if($res) {
      echo "Data Delete Successful!";
      header("Location: Aadminpage.php ");
            exit();
    }
    else {
      echo "Failed to Delete Data.";
      echo "<br>";
     
    }
  }
  }
  else{
     $nameerr = "Please correcrt  ID and username!";

  }
  mysqli_close($conn2);
 }

              
}
?>
<!DOCTYPE html>
<html>
<head >
    <title>Sign in </title>
     <link rel="stylesheet" type="text/css" href="Aremovemanager.css"> 

<body>
<div class="loginbox">

<h1>Remove Manager</h1>
<form name="jsrform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="post"><b>
      


          <p>Manager ID</p>
          <label for="id"></label>
        <input  type="text"   name="id" id="id"  placeholder="Enter a Manager ID" value="<?php echo $id ?>">
        
         <p><?php echo $iderr; ?></p>
           <br><br>

         <p>UserName</p>
          <label for="name"></label>
        <input type="text" id="name" name="name"
        placeholder="Enter Username"  value="<?php echo $name ?>">

         <?php echo $nameerr; ?><br><br>

       </b>
       
        
        <input  type="submit" value="Submit">
        
        <p id="errorMsg1"></p>

        </font>
        </head>

       
    </form>

</div>

      
<script>
        function validate() {
            var isValid = false;
            var id = document.forms["jsrform"]["id"].value;
            var name = document.forms["jsrform"]["name"].value;

            if(id == "" ) {
                document.getElementById('errorMsg1').innerHTML = "<b>Please fill up id properly.</b>";
                document.getElementById('errorMsg1').style.color = "#ff4d4d";
            }

            else  if( name=="" ) {
                document.getElementById('errorMsg1').innerHTML = "<b>Please fill up name properly.</b>";
                document.getElementById('errorMsg1').style.color = "#ff4d4d";
            }
      


            else {
                isValid = true;
            }

            return isValid;

          }
    </script>
</body>
</html>
