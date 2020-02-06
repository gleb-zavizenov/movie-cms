<?php

function login($username, $password, $ip){
    //return 'You are trying to login with username:' . $username . ' and password:' . $password;

    $pdo = Database::getInstance()->getConnection();

    // Check existance
    $check_existing_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username';
    $user_set = $pdo->prepare($check_existing_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    if($user_set->fetchColumn()>0){
        //check if match
        $check_match_password = 'SELECT * FROM tbl_user WHERE user_name = :username AND user_pass = :password';
        $pass_set = $pdo->prepare($check_match_password);
        $pass_set->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );
        while($founduser = $pass_set->fetch(PDO::FETCH_ASSOC)){
            $id = $founduser['user_id'];

            // Update the user table and set user_ip column to be $ip.
            $ip_update = 'UPDATE tbl_user SET user_ip = :ip WHERE user_id = :userid';
            $ip_set = $pdo->prepare($ip_update);
            $ip_set->execute(
                array(
                    ':ip'=>$ip,
                    ':userid'=>$id
                )
            );

        } 
        if(isset($id)){
            redirect_to('index.php');
        } else {
            return 'Login failed';
        }
    } else {
        return 'User does not exist!';
    }

    // Check if match
}

// testing keys: 
//  admin " OR "1"="1
//  123" OR "1"1="1