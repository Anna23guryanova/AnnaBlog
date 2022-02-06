<?php
require 'src/php/database.php';

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой блог</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>
<body>
<?php require 'src/components/header.php' ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/src/php/login.php" method="post" class="auth-form">
                        <h5>Авторизация</h5>
                        <div class="mb-3">
                            <label for="login">Логин</label>
                            <input type="text" id="login" name="login" class="form-control rounded-0" placeholder="Логин" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Пароль</label>
                            <input type="password" id="password" class="form-control rounded-0" name="password" placeholder="Пароль" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Вход</button>
                        </div>
                        <div>
                            <a href="/register.php">Регистрация</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require 'src/components/footer.php' ?>
<script src="src/js/jquery-3.6.0.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>

</body>
</html>
