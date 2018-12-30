<?php
    session_start();


    //if already logged IN
    if(isset($_SESSION['loggedIN'])){
        header('Location: mainPage.php');
        exit();

    }

    if (isset($_POST['login'])){
        $connection = new mysqli('localhost', 'root','','login');

        $email = $connection->real_escape_string($_POST['emailPHP']);
        $password = $connection->real_escape_string($_POST['passwordPHP']);;

        $data = $connection->query("SELECT id FROM users WHERE email='$email' AND password='$password'");

        if($data->num_rows > 0){
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            exit('Login successfull...');
        } else {
            exit('Login failed, please check your inputs...');
        }

        exit($email . " = " . $password);
    }
?>
