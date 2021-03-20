

<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();

$nome="";

$cognome="";

$mail="";

if(isset($_POST['nome'])){
    
    $nome=$_POST['nome'];
    
    $_SESSION['nome']=$_POST['nome'];
}


if(isset($_POST['cognome'])){
    
    $cognome=$_POST['cognome'];
    
    $_SESSION['cognome']=$_POST['cognome'];
}

if(!isset($_SESSION['email'])){
    
    $_SESSION['email']="";
    
}


if(!isset($_POST['email'])){
    
    $mail=$_SESSION['email'];
    
    $_POST['email']=$_SESSION['email'];
    
}

    
    if(isset($_POST['email'])){
    
    $mail=$_POST['email'];
    
    
    
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        
        
        echo "<font color=green> Email address '$mail' is valid.</font>";
        
    }else{
        
        echo "<font color=red> Email address '$mail' isn't valid, please enter a valid mail.</font>";
        
    }
    
}
?>
    


<title>prova database</title>

<form id="form_2" method="post">
    
    
    <input type="hidden" value="<?= $nome ?>" name="nome" id="nome">
    
    <input type="hidden" value="<?= $cognome ?>" name="cognome" id="cognome">
    
    email<input type="email" value="<?= $mail ?>" name="email" id="email">
    
    <input type="submit" value="submit" name="submit">
    
    <input type="submit" value="step3" formaction="step_3.php">
    

    <a href="step_1.php">back</a>



