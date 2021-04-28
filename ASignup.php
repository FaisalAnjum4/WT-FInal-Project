<!DOCTYPE html>
<html>
<head>
<title>Admin Account</title>
</head>
<body   style="background-image:url(reg.jpg) ;height: 120vh; background-size: cover; background-position: center;" >
<center>
    <?php
 
      $hostname = "localhost";
    $username = "user";
    $password = "123";
    $dbname = "finalproject";


    // Mysqli Procedural
    $conn2 = mysqli_connect($hostname, $username, $password, $dbname);

        $Name =  $Paddress =$Peaddress =  $Phone = $Email = $Username = $password="";
 
         $Nameerr =  $Paddresserr =$Peaddresserr =  $Phoneerr = $Emailerr = $Usernameerr = $passworderr= "";
 
        if($_SERVER['REQUEST_METHOD'] == "POST") {
 
  
  

            if(empty($_POST['name'])) {
                $Nameerr = "Please fill up the name";
            }
            else {
                $Name = $_POST['name'];
            }
 
            
            if(empty($_POST['paddress'])) {
                $Paddresserr = "Fill up  Address";
            }
            else {
 
                $Paddress = $_POST['paddress'];
            }

        
 
            if(empty($_POST['phone'])) {
                $Phoneerr = "Please fill up the phone number";
            }

            else {
                $Phone = $_POST['phone'];
            }
 
            if(empty($_POST['email'])) {
                $Emailerr = "Please fill up the email";
            }

           
            else {
                $Email = $_POST['email'];
            }
 
            if(empty($_POST['username'])) {
                $Usernameerr = "Please fill up the username";
            }
           
            else {
 
                $Username = $_POST['username'];
            }

  
 

            if($Nameerr == "" &&  $Paddresserr == "" && $Phoneerr == "" && $Emailerr == "" && $Usernameerr == "") {
              

$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$paddress = $_POST['paddress'];
$phone = $_POST['phone'];

$password = $_POST['pass'];
$cpassword = $_POST['cpass'];
$email = $_POST['email'];
 $username = $_POST['username'];  
   
 
if($password == $cpassword){

   
    if(mysqli_connect_error()) {
        echo "Database Connection Failed!...";
        echo "<br>";
        echo mysqli_connect_error();
    }
    else {
      $query= mysqli_query($conn2,"Select * from admin where username= '$username' ");
    
      if(mysqli_num_rows($query)>0){
        $Usernameerr= "Username is already Exist";
        
      }
      else{
         $stmt2 = mysqli_prepare($conn2, "insert into admin (name,gender,dob,address,phone,email,username,password) values (?, ?, ?, ?, ?, ?, ?,?)");
        mysqli_stmt_bind_param($stmt2, "ssssssss", $n, $g , $d , $a ,$ph, $e ,$u, $p);
        $n = $_POST['name'];
       $g = $_POST['gender'];
       $d = $_POST['dob'];
       $a = $_POST['paddress'];
       $ph = $_POST['phone'];
       $e = $_POST['email'];
       $u = $_POST['username'];
       $p = $_POST['pass'];
        $res = mysqli_stmt_execute($stmt2);

 

        if($res) {
            echo " <br> Data Insert Successful!";
            header("Location: login.php ");
            exit();
        }
        else {
            echo "Failed to Insert Data.";
            echo "<br>";
            $Emailerr= "Email is already Exist";
        }
       }
        //$_SESSION['username'] = $Lastname;
      }
     

    }
 
 else {

 echo "Password does not match";
        }

          }
}
 mysqli_close($conn2);
?>
 
<center>
<h1 style="text-align:centre;">Admin Account</h1>
</center>
 
 
<font >
<form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()"  method="POST">
 <b>
  <p id="errorMsg"></p><br>
 <label for="name">Enter your name:</label>
        <input type="text"  name="name" id="name" placeholder="Enter your Name" value="<?php echo $Name ?>">
         <p><?php echo $Nameerr; ?></p>

        <br>
        <!-- Radio -->
        <label for="gender" >Gender: </label>
        <input type="radio" name="gender" id="male" value="male" checked="" >
        <label for="male">Male</label>

        <input type="radio" name="gender" id="female" value="female" >

        <label for="female">Female</label>

        <br><br>
        <!--date-->
        <label for="dob">Date of Birth: </label>

<input type="date" id="dob" name="dob"
       value="2021-02-15"
       min="1980-01-01" max="2025-12-31"  >
        <br><br>
 
        <label for="paddress">Address: </label>
        <input type="text" name="paddress" id="paddress"  placeholder="Enter Present Address" value="<?php echo $Paddress ?>">
         <p><?php echo $Paddresserr; ?></p>

        <br>
        
            <!--Phone/tel -->
        <label for="phone">Phone number: </label>
        <input type="tel" id="phone" name="phone"   placeholder="Enter Phone Number"value="<?php echo $Phone ?>">
         <p><?php echo $Phoneerr; ?></p>

        <br>

          <!--Email/email-->
          <label for="email">Email Address: </label>
          <input type="email" id="email" name="email"  placeholder="Enter Email Address"value="<?php echo $Email ?>">
         <p><?php echo $Emailerr; ?></p>
          <br>

          <label for="username">Enter a username:</label>
        <input type="text"   name="username" id="username" placeholder="Enter a UserName"value="<?php echo $Username ?>">
         <p><?php echo $Usernameerr; ?></p>
           <br>

          <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" ><br><br>

        <label for="cpass"> Confirm Password:</label>
        <input type="password" id="cpass" name="cpass" >

          </center>
        <br></b>
        </b>
    <center>
        <input style="color: green;" type="submit" value="Submit">
</center>
        
</form>
</font>

 
</center>
<script>
        function validate() {
            var isValid = false;
            var name = document.forms["jsForm"]["name"].value;
            var gender = document.forms["jsForm"]["gender"].value;
            var dob = document.forms["jsForm"]["dob"].value;
            var paddress = document.forms["jsForm"]["paddress"].value;
            var phone = document.forms["jsForm"]["phone"].value;
            var email = document.forms["jsForm"]["email"].value;
            var username = document.forms["jsForm"]["username"].value;
            var pass = document.forms["jsForm"]["pass"].value;
            var cpass = document.forms["jsForm"]["cpass"].value;
           

 

            if(name == "" || gender == "" || dob == "" || paddress == "" || phone == "" || email == "" || username == "" || pass == "" || cpass == "" ) {
                document.getElementById('errorMsg').innerHTML = "<b>Fill up the registration form properly";
                document.getElementById('errorMsg').style.color = "#C10315";
            }
            else {
                isValid = true;
            }

 

            return isValid;
        }
    </script>
 

</body>
</html>