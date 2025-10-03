<?php
session_start(); // Need to $_SESSION in this file

require_once('config.php'); // DB connection info

$errors = []; // Initialize error array

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //this block runs when the form is submitted
    $name     = trim($_POST['name'] ?? ''); // Usa vazio se $_POST['name'] nn existir, remove espaços em branco
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL); //Retorna email valido ou inválido, em mal formato
    $password = $_POST['password'] ?? ''; // Usa vazio se nn existir
    $confirm  = $_POST['password_confirm'] ?? ''; // Usa vazio se nn existir

    //Validações
    if (!$name) $errors[]                            = 'Name is required.'; //if name is empty, return error
    if (!$email) $errors[]                           = 'Email is required.'; //if email is empty, return error
    if (strlen($password) < 8) $errors[]             = 'Password must be at least 8 characters long.'; //if password < 8 chars, return error
    if (!preg_match('/[A-Z]/', $password)) $errors[] = 'Password must contain at least one uppercase letter.'; //if password nn has uppercase, return error
    if (!preg_match('/[a-z]/', $password)) $errors[] = 'Password must contain at least one lowercase letter.'; //if password nn has lowercase, return error
    if (!preg_match('/[0-9]/', $password)) $errors[] = 'Password must contain at least one number.'; //if password nn has number, return error
    if (!preg_match('/[\W]/', $password)) $errors[]  = 'Password must contain at least one special character.'; //if password nn has special char, return error
    if ($password !== $confirm) $errors[]            = 'Passwords do not match.';

    if (empty($errors)) { //if no errors happen so far 

        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email"); //check if email already exists
        $stmt->execute(['email' => $email]); //Replace :email with the actual $email value

        if ($stmt->fetch()) { //if a row is returned, email already exists
            $errors[] = 'Email is already registered.';
        } else { //if email dont existe, insert new user
            $hash = password_hash($password, PASSWORD_DEFAULT); //hash the password, criptography

            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"); //insert new user
            $stmt->execute([
                'name'     => $name,
                'email'    => $email,
                'password' => $hash
            ]); //Replace placeholders with actual values

            header("Location: ../html/index.php?registered=1"); //redirect to login page
            exit; //stop further execution
        }
    }
}
?>