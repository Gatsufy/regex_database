

<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$mail="";

$password="";

$output="";

if(isset($_POST['email'])){
    
    $mail=$_POST['email'];
    
    $_SESSION['email']=$_POST['email'];
}

if(!isset($_SESSION['password'])){
    
    $_SESSION['password']="";
    
}

if(!isset($_POST['password'])){
    
    $password=$_SESSION['password'];
    
    $_POST['password']=$_SESSION['password'];
    
}

//password has to be al the with 9 carachter a lowercase letter, an uppercase letter, no space, a number and a special carachter
$regex_password= "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}\S+$/";

if(isset($_POST['password'])){
    
    $password=$_POST['password'];
       
    if(preg_match($regex_password, $_POST['password'])){
        
        echo "<font color=green> the password is valid.</font>";
        
    }else{
        
        echo "<font color=red> The password isn't valid.</font>";
        
    }
    
}else{
    
    $output="insert something";
    
}

?>


<title>prova database</title>
   
<form id="form3" method="post">
    
    <?php echo "insert at least a lower case letter, an upper case letter, no space,a special carachter and a number. The lenght of the password is at least 8 <br>";?>
    
        password<input type="password" value="<?= $password ?>" name="password" id="password">
    
        <input type="submit" value="submit" name="submit">
    
        <input type="submit" value="step3" formaction="final.php">
        
        <?= "<br>"; ?>
        
        <input type="checkbox" onclick="showPassword()">show password
       
</form>

<script type="text/javascript" src="showpassword.js"> </script>