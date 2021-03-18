<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$nome="";

$cognome="";

$output="";

if(!isset($_SESSION['nome'])){
    
    $_SESSION['nome']="";

}

if(!isset($_POST['nome'])){
    
    $nome=$_SESSION['nome'];
    
    $_POST['nome']=$_SESSION['nome'];
 
}

if(!isset($_SESSION['cognome'])){
    
    $_SESSION['cognome']="";

}

if(!isset($_POST['cognome'])){
    
    $cognome=$_SESSION['cognome'];
    
    $_POST['cognome']=$_SESSION['cognome'];
 
}

$regex_nome= "/^[a-zA-Z]+$/";

$regex_cognome= "/^[a-zA-Z\'\s]+$/";

if(isset($_POST['nome']) and isset($_POST['cognome'])){
    
    $nome=$_POST['nome'];
    
    $cognome=$_POST['cognome'];
    
    if(preg_match($regex_nome, $_POST['nome']) and preg_match($regex_cognome, $_POST['cognome'])){
        
        echo "<font color=green> $nome $cognome is valid.</font>";
        
    }else{
        
        echo "<font color=red> The name and the surname are not valid.</font>";
        
    }
    
}else{
    
    $output="non hai inserito nulla";
    
}

?>

<title>prova database</title>

<form id="form_1" method="post" >
        
    nome<input type="text" value="<?= $nome ?>" name="nome" id="nome">
    
    cognome<input type="text" value="<?= $cognome ?>" name="cognome" id="cognome">
    
    <input type="submit" value="submit" name="submit">
    
    <input type="submit" value="step2" formaction="step_2.php">
       
    <a href="index.php">back</a>
        
</form>



