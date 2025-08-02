<?php

$User_Name=$_POST['User_Name'];
$Email_Address=$_POST['Email_Address'];
$Phone_Number=$_POST['Phone_Number'];
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
    $stmt1="SELECT * from user_information where User_Name='$User_Name'";
    $result=mysqli_query($conn,$stmt1);
    if(mysqli_num_rows($result)==1){
      
        echo "<script>alert('User Name already taken')</script>";
        echo "<script>setTimeout(\"location.href = 'https://localhost/signup.html';\",1500);</script>";

    }
    else{
        $stmt=$conn->prepare("INSERT INTO user_information(User_Name,Phone_Number, Email_Address, Password) values(?,?,?,?)");
        $stmt->bind_param("siss",$User_Name,$Phone_Number,$Email_Address,$Password);
        $stmt->execute();
        echo "<script>alert('Registeration Successful')</script>";
        echo "<script>setTimeout(\"location.href = 'https://localhost/login.html';\",1500);</script>";
        $stmt->close();
        }
    
    $conn->close();
}
?>