<?php

$User_Name=$_POST['User_Name'];
$Password=$_POST['Password'];
$servername="localhost";
$username="root";
$pass="";
$dbmsname="payment_info";
$conn = new mysqli($servername,$username,$pass,$dbmsname);
if(!$conn){
	die("Connection Failed : ". mysqli_connect_error());
}
else{
    $stmt1="SELECT * from user_information where User_Name='$User_Name' AND Password='$Password'";
    $result=mysqli_query($conn,$stmt1);
    if(mysqli_num_rows($result)>0){
        
        header("location:https://localhost/ecommerce1.html");

    }
    else{
        echo "<script>alert('Wrong User Name or Password')</script>";
        echo "<script>setTimeout(\"location.href = 'https://localhost/login.html';\",1500);</script>";
        }
    
    $conn->close();
}
?>