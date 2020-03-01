<?php

    function createUser($fname, $username, $password, $email){
        $pdo = Database::getInstance()->getConnection();

        // $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        // $username = str_replace(array("\r", "\n", "%0a", "%0d"),'',$username);
        // $password = str_replace(array("\r", "\n", "%0a", "%0d"),'',$password);
        // $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        // $existing_user_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username AND user_email = :email';
        // $existing_user = $pdo->prepare($existing_user_query);
        // $existing_user_result = $existing_user->execute(
        //     array(
        //         ':username'=>$username,
        //         ':email'=>$email
        //     )
        // );
        // if($existing_user_result > 0){    
            $make_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email) VALUES (:first_name, :user_name, :user_password, :user_email)';
            $make_user = $pdo->prepare($make_user_query);
            $create_user_result = $make_user->execute(
                array(
                    ':first_name'=>$fname,
                    ':user_name'=>$username,
                    ':user_password'=>$password,
                    ':user_email'=>$email
                )
            );
            if($create_user_result){
                redirect_to('../admin/index.php');
                return "User created successfully";
            } else {
                return "Can't create a new user";
            }
        // } else {
        //     return 'User already exisit';
        // }

        // 2 - if success -> redirect to index.php
    }