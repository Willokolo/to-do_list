<?php
require_once('../db/auth_check.php'); // DB connection info

checkAuth(); //verifica se ta logado

$userInfo = getUserInfo(); // Get the users info
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body class = "bg-dark">

    <div class="container-fluid mx-0 px-0">

        <!-- Navbar -->
        <nav class="shadow-lg d-flex justify-content-between navbar-dark bg-dark-subtle text-black rounded-bottom px-0 ">
            <a class="navbar-brand mx-4 d-flex align-items-center"><i class="bi bi-person-circle text-dark" style = "font-size: 50px;"></i>
               <span class="text-dark px-2" style = "font-size: 30px;"> <?php echo "Bem Vindo: ".htmlspecialchars($userInfo['name']); ?></span>
            </a>
            <a class="navbar-brand mx-4 "><i class="bi bi-list text-dark" style = "font-size: 50px;"></i></a>
        </nav> 

        <!-- Mia -->
    </div>
</body>
</html>