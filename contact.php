<?php
    require_once('config.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        if(empty($name) || empty($email) || empty($message)){
            echo 'Please fill out all fields.';
            exit;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Invalid email format.';
            exit;
        }
        if(strlen($message) > 1000){
            echo 'Message is too long.';
            exit;
        }
        // create contact table first 
        /* create table contact (
            name varchr(64),
            email varchar(32),
            message varchar(255)
            );
        */
        $sql = "INSERT INTO contact (name, email, message) VALUES(?,?,?)"; 
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$name, $email, $message]);
        if($result){
            echo 'Successfully saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }

    header("Location: contact.html");
?>
