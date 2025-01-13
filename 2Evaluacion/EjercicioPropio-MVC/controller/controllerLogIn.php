<?php
include_once '../model/user.php';
include_once '../../config/destroySesion.php';

session_start();

if (isset($_POST['username'], $_POST['password']) && $_POST['username'] != '' && $_POST['password']) {
    $user = user::checkLogin($_POST['username'], $_POST['password']);
    
    if ($user) {
        if (isset($_POST['rememberme']) && $_POST['rememberme'] == 'on') {
            $_SESSION['user'] = $user[0];
            $_SESSION['rememberme'] = true;
        }else {
            $_SESSION['rememberme'] = false;
        }
        header('Location: controller.php?option=clients');
        exit;
    }else{
        header('Location: ../../public/index.php?authenticationError=1');
        closeSession();
        exit;
    }
}

if (isset($_GET['forgotPassword']) && $_GET['forgotPassword'] == '1') {
    header('Location: ../../public/index.php?forgotPassword=1');
}