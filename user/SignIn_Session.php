<?php
session_start();
require_once '../classes/User.php';
require_once '../classes/DbConnector.php';

use classes\User;
use classes\DbConnector;

if (isset($_POST["email"], $_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new User(null, null, null, $email, $password, null);

    if ($user->authenticate(DbConnector::getConnection())) {
        $_SESSION["user_id"] = $user->getUserid();
        $_SESSION["user_firstname"] = $user->getFirstname();
        $_SESSION["user_lastname"] = $user->getLastname();
        $_SESSION["user_role"] = $user->getRole();

        switch ($_SESSION["user_role"]) {
            case 'learner':
                $location = "../pages/Home.php";
                break;
            case 'tutor':
                $location = "../pages/Home.php";
                break;
            case 'admin':
                $location = "../pages/adminProfile.php";
                break;
            default:
                $location = "SignIn.php";
        }
    } else {
        $location = "SignIn.php?status=2";
    }
} else {
    $location = "SignIn.php?status=0";
}

header("Location:" . $location);
?>