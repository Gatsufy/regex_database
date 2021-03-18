<?php
    /* 
    * To change this license header, choose License Headers in Project Properties.
    * To change this template file, choose Tools | Templates
    * and open the template in the editor.
    */

session_start();

$mail="";

$nome="";

$cognome="";

$password="";

/* check if email password name and last name have been insert*/
if(isset($_SESSION['email'])){
    
    $mail=$_SESSION['email'];  
    
}

if(isset($_SESSION['nome'])){
    
    $nome=$_SESSION['nome'];  
    
}

if(isset($_SESSION['cognome'])){
    
    $cognome=$_SESSION['cognome'];  
    
}

if(isset($_SESSION['password'])){
    
    $password=$_SESSION['password'];
    
}

echo $mail;

echo " ";


echo $nome;

echo " ";


echo $cognome;

echo "<br />";


//insert the server name as a string
$ser="";
        
//insert username as a string
$user="";
        
//insert password as a string
$pass="";

//insert database name as string
$db="";
        
$connect = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");
               
echo "Connected! <br />";        
        
$query_in= "INSERT INTO  utentiregistrati (NOME_UTENTE,COGNOME_UTENTE,EMAIL,PASSWORD) VALUES ('$nome','$cognome','$mail','$password')";
                
if(mysqli_query($connect, $query_in)){
           
    echo "Records inserted successfully.";
    
} else{
    
    echo "ERROR: Could not able to execute $query_in. " . mysqli_error($connect);
}

// Close connection

mysqli_close($connect);

?>

<footer>
    
    <a href="index.php">turn back</a>
    
</footer>
