<?php 
session_start(); // Need to $_SESSION in this file
require_once('config.php'); // DB connection info

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL); // Validate email
    $password = $_POST['password'] ?? '';

    // Validate input
    if (!$email || !$password) {
        $errors[] = 'Email and password are required.';
    } else {
        $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = :email"); //check if email already exists
        $stmt->execute(['email' => $email]); //Replace :email with the actual $email value
        $user = $stmt->fetch(); // Fetch user data

        if ($user && password_verify($password, $user['password'])) {
            //login ok
            $_SESSION['user_id'] = $user['id'];
            $_SESSIO['logged_in'] = true; // Set logged in status
            $_SESSION['user_name'] = $user['name']; // save the user data in this session
            header("Location: ../html/index.php"); // Redirect to main page
            exit; //stop further execution
        }  else {
    $errors[] = "Email ou senha incorretos.";
}
    }
}

?>