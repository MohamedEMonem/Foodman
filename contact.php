<?php
    require_once('config.php');
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

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
