<?php

function login($username, $password){
    //return 'You are trying to login with username:' . $username . ' and password:' . $password;

    $pdo = Database::getInstance()->getConnection();

    // Check existance
    $check_existing_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = ' . '"' . $username . '"';
    $user_set = $pdo->query($check_existing_query);

    if($user_set->fetchColumn()>0){
        //check if match
        $check_match_password = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = ' . '"' . $username . '" AND user_pass = "' . $password . '"';
        $pass_set = $pdo->query($check_match_password);
        if($pass_set->fetchColumn()>0){
            return "Ok, let him in";
        } else {
            return "Hack attack!";
        }
    } else {
        return 'User does not exist!';
    }

    // Check if match
}