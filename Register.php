<?php
$hostname='localhost';
$username='root';
$password='';
$databasename='user';

$mysqli =mysqli_connect($hostname,$username,$password,$databasename);

session_start();

if(isset($_POST['submit']))

{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $enpassword =md5('$password');
    $date=$_POST['date'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];


    $result=mysqli_query($mysqli, "insert into userdata value('','$name','$enpassword','$date','$gender','$email','$phone')");
    if($result){
         echo "user registration successfully,you can login now";
}
else{
    echo "something wrong,data not stored";
}
}

?>
