<?php
$Name=$_POST['Name'];
$Address=$_POST['Address'];
$Phone_Number=$_POST['Phone_No'];
$Card_Number=$_POST['Card_Number'];
$Expiration_Date=$_POST['Exp_Date'];
$CVV=$_POST['CVV'];
$servername="localhost";
$username="root";
$password="";
$dbmsname="payment_info";
$conn = new mysqli($servername,$username,$password,$dbmsname);
if(!$conn){
	die("Connection Failed : ". mysqli_connect_error());
}
else{
    $stmt=$conn->prepare("insert into payment_information(Name, Address, Phone_Number, Card_Number, Expiration_Date, CVV) values(?,?,?,?,?,?)");
    $stmt->bind_param("ssiisi",$Name,$Address,$Phone_Number,$Card_Number,$Expiration_Date,$CVV);
    $stmt->execute();
    echo"Payment Successful ........";
    $stmt->close();
    $conn->close();
}
?>