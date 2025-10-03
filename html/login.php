<?php
include('../db/loginuser.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
    <title>Login Page</title>
</head>

<body class="bg-dark">

    <div class="container-fluid">
        <!-- <nav class="navbar navbar-dark bg-dark-subtle text-black rounded">
            <h2 class="mx-auto">aaa</h2>
        </nav> -->

        <section>

            <div class="container card-box text-white align-items-center p-5 mt-5 rounded" style="max-width: 500px;">
                <h1 class="text-center">Login</h1>
                <?php if ($errors): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $e): //percorre array de erros 
                            ?>
                                <li><?= htmlspecialchars($e) //imprime erro de forma segura
                                    ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
            </div>


        </section>

        <script src="../style/js/bootstrap.min.js"></script>
</body>
</html>