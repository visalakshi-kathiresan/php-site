<?php
$hostname='localhost';
$username='root';
$password='';
$databasename='user';

$mysqli =mysqli_connect($hostname,$username,$password,$databasename);

session_start();

if(isset($_POST['name']) && isset($_POST['password'])){
    $name = ($_POST['name']);
    $password =($_POST['password']);

    if(empty($name)) {
        header("location:login.html?error=user name is required");
        exit();
    }else if(empty($password)) 
    {
        header("location:login.html?error=password is required");
        exit();
    }else{
        $sql = "SELECT * FROM userdata WHERE name='$name' AND password='$password' ";
        $result=mysqli_query($mysqli,$sql);

        if (mysqli_num_rows($result)) {
            $row=mysqli_fetch_assoc($result);
            if ($row['name']===$name && $row['password']===$password) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("location:welcome.php");
                exit(); 
            }
        }
        else{
            header("location:login.html?error=please fill both of username & password");
            exit();
        }
    }

   
}
?>
