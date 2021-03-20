<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$server_db="localhost";

$user_db="root";

$user_psw="";

$name_db="marco";

$connect= mysqli_connect($server_db,$user_db,$user_psw,$name_db);

$result;

if(!isset($_POST['name'])){
    
    $_POST['name']="";
    
}

if(!isset($_POST['surname'])){
    
    $_POST['surname']="";
    
}

if(!isset($_POST['username'])){
    
    $_POST['username']="";
    
}

if(!isset($_POST['password'])){
    
    $_POST['password']="";
    
}

if(!isset($_POST['copy_password'])){
    
    $_POST['copy_password']="";
    
}


// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully";

echo "<br>";

require_once 'sign_up_control.php';

if(checkPassword()==true){
    
    echo "password valida";
    
}else{
    
    echo "password non valida";
}

echo "<br>";

emptyInputLogIn($_POST['username'], $_POST['password'],$_POST['name'],$_POST['surname']);

echo "<br>";


check_user_exist($connect,$_POST['username'],$_POST['name'],$_POST['surname'],$_POST['password']);

echo "<br>";

check_password($_POST['password'], $_POST['copy_password'])


?>

<form id="login" method="post">
    
    Name<input type="text" name="name" id="name" value="<?php echo $_POST['name'];?>" placeholder="Insert name...">
    
    Surname<input type="text" name="surname" id="surname" value="<?php echo $_POST['surname'];?>" placeholder="Insert name...">
    
    Username<input type="text" name="username" id="username" placeholder="Insert Username..." value="<?php echo $_POST['username'];?>">
    
    Password<input type="password" name="password" id="password" placeholder="Insert password..." value="<?php echo $_POST['password'];?>">
    
    Copy_password<input type="password" name="copy_password" id="copy_password" placeholder="re-Insert password..." value="<?php echo $_POST['copy_password'];?>">
    
    <input type="submit" name="submit" id="submit" value="submit">
   
</form>
