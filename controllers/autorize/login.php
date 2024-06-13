<?php
session_start();
include '/wamp64/www/CW-BackEnd/core/bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['name']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password FROM user WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $user_name, $stored_password);
    $stmt->fetch();
    $stmt->close();

    if ($user_id == 1) {
        if ($password === $stored_password) {
            $_SESSION['user_id'] = $user_id;
            header("Location: /model/Account-Admin");
            exit;
        } else {
            header("Location: /view/Main");
        }
    }
    if ($user_id) {
        if ($password === $stored_password) {
            $_SESSION['user_id'] = $user_id;
            header("Location: /model/Account-User/");
            exit;
        } else {
            header("Location: /view/Main");
        }
    } else {
        header("Location:/model/Account-Login/");
    }
} else {
    header("Location: /view/Main");
    exit;
}
?>