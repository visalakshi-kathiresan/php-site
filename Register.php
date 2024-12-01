<?php
$fname=$_POST['fname'];
$password = $_POST['password']; 
$enpassword =md5('$password');
$date = $_POST['date'];
$gender = $_POST['gender'];
$email = $_POST['email']; 
$phone =$_POST['phone'];

//database
$conn= New mysqli('localhost','visalakshi','kathir-07','data');
 if($conn->connect_error){
   die('Connection Failed :' .$conn->connect_error);
} else{
    $super = $conn->prepare("insert into details(fname,password,date, gender, email, phone)
    values('$fname','$enpassword','$date','$gender','$email','$phone')");
    $super->execute();
    echo "Registration Sucessfully.............";
   $super->close();
   $conn->close();
   
}
?>