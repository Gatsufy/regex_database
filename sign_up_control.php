<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function emptyInputLogIn($name,$surname,$username,$password){
    
    if(empty($username) or empty($password) or empty($name) or empty($surname)){
        
        echo "non hai inserito un campo tra name, surname, username e password. Controlla bene";
    }else{
        
        echo "hai riempito tutti i campi";
        
    }
    
}

function checkPassword(){
    
    if(isset($_POST['password'])){
        
        if(preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}\S+$/", $_POST['password'])){
            
            return true;
            
        }else{
            
            return false;
        }
        
    }
    
}

function check_user_exist($link_connection,$username,$nome,$cognome,$password){
    
    $regex_nome= "/^[a-zA-Z]+$/";
    
    $regex_cognome= "/^[a-zA-Z]+$/";
    
    $regex_password= "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}\S+$/";
    
    $query= "SELECT * FROM utentiregistrati where EMAIL='$username';";
        
    $res=mysqli_query($link_connection,$query);
    
                
    if(mysqli_num_rows($res)>0){
        
        $array= mysqli_fetch_assoc($res);
                
        if(in_array($username, $array)==true){
                     
            echo "this username is already used";
            
        }
        
    }else if(filter_var($username, FILTER_VALIDATE_EMAIL) and preg_match($regex_nome, $nome) and preg_match($regex_cognome, $cognome) and preg_match($regex_password, $password)){
        
        $query_in= "INSERT INTO  utentiregistrati (NOME_UTENTE,COGNOME_UTENTE,EMAIL,PASSWORD) VALUES ('$nome','$cognome','$username','$password')";
        
        if(mysqli_query($link_connection, $query_in)){
            
            echo "User registered";
        }   
        
    }

}

function check_password($password,$copyPassword){
    
    if($password==$copyPassword){
        
        echo "password uguali";
        
    }else{
        
        echo "hai sbagliato ad inserire la seconda password";
        
    }
    
}

?>
