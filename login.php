<?php 

  session_start();
?>


<?php
 $username = $password = "";
            $usernameerr = $passworderr = "";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['username'])) {
                    $usernameerr = "Please Fill up the Username!";
                }
                else 
                  {
                    $username=$_POST['username'];
                   }
                

                if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else 
                  {
                    $password=$_POST['password'];
                   }

                if($usernameerr ==""&& $passworderr==""){

                     $username = $_POST['username'];
                     $password = $_POST['password'];
                     setcookie($username,$password,time()+60);

     $hostname = "localhost";
    $username = "user";
    $password = "123";
    $dbname = "finalproject";
    
    $conn1 = new mysqli($hostname, $username, $password, $dbname);
    if($conn1->connect_errno) {
        echo "1. Database Connection Failed!...";
        echo "<br>";
        echo $conn1->connect_error;
    }
    else {
      echo "<br>";
          $_SESSION['username'] = $_POST['username'];
        $stmt = $conn1->prepare("select id, name, username, password from admin where username = ? && password = ?");
        $stmt->bind_param("ss", $u , $p);
        $u = $_POST['username'];
        $p = $_POST['password'];
        
        $stmt->execute();
        $res2 = $stmt->get_result();
         $user = $res2->fetch_assoc();
       
         if($user) {
            
            header("Location: Aadminpage.php ");
            exit();
        }
        else {
            echo "<center><b>Failed to  Login.";
            echo "<br>";
            $passworderr="Write your own username or password";
        }
        
       

 }
    $conn1->close();

 //if(isset($_COOKIE[$username])){
 
                            
                          //  $_SESSION['user'] = $username;
                           
                                 
                       // }                            
                    }  
                }
 

                    

?>
<!DOCTYPE html>
<html>
<head >
    <title>Sign in </title>
     <link rel="stylesheet" type="text/css" href="login.css"> 

<body>
<div class="loginbox">

<h1>Login Here</h1>
<form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()"  method="POST"><b>
      


          <p>Username</p>
          <label for="username"></label>
        <input  type="text"   name="username" id="username"  placeholder="Enter a UserName" value="<?php echo $username ?>">
         <p><?php echo $usernameerr; ?></p>
         <p id="errorMsg1"></p>
           <br><br>

         <p>Password</p>
          <label for="password"></label>
        <input type="password" id="password" name="password"
        placeholder="Enter your Password"  value="<?php echo $password ?>">
         
       <p id="errorMsg2"></p>
       
       </b>
        
        <input  type="submit" value="Login">
            <h1 style="color:#ff4d4d"><?php echo $passworderr; ?><br><br>
      
        <a href="ajaxsignup.html">Don't have an account!!</a>
        </font>
        </head>
        
    </form>
</div>



<script>
        function validate() {
            var isValid = false;
            var username = document.forms["jsForm"]["username"].value;
            var password = document.forms["jsForm"]["password"].value;

            if(username == "" ) {
                document.getElementById('errorMsg1').innerHTML = "<b>Please fill up your name.</b>";
                document.getElementById('errorMsg1').style.color = "red";
            }
            else if( password == ""){
                document.getElementById('errorMsg2').innerHTML = "<b>Please fill up your password.</b>";
                document.getElementById('errorMsg2').style.color = "red";

            }
            else {
                isValid = true;
            }

            return isValid;
        }
    </script>
</body>
</html>
