<?php
    session_start();

    if(isset($_POST['submit-login'])){
        require 'conn.php';

        $user = $_POST['email'];
        $pass = $_POST['password'];

        $stmt = 'SELECT * FROM user1 WHERE email=? OR username=?;';
        $sql = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sql, $stmt);
        mysqli_stmt_bind_param($sql, "ss", $user, $user);
        mysqli_stmt_execute($sql);
        $result = mysqli_stmt_get_result($sql);
        $row = mysqli_fetch_assoc($result);
        $pwdchck = password_verify($pass, $row['password']);
        echo $pwdchck;
        if($pwdchck == false) {
            header('Location: login.php?error=invaliduser/pwd');
        } else if($pwdchck == true){
            $_SESSION['user'] = $row['username'];
            $_SESSION['uid'] = $row['userId'];
            $_SESSION['address'] = $row['addr'];
            if(isset($_SESSION['continue'])){
                header('Location: buy.php');
                exit;
            }  else {
                header('Location: buy.php');
            }
        }
    }else{
        header('Location: login.php');
    }