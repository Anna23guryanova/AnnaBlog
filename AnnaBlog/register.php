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
                <form class="register-form" action="src/php/regist.php" method="post">
                    <h5>Регистрация нового пользователя</h5>
                    <div class="mb-3">
                        <label for="login">Логин</label>
                        <input class="form-control rounded-0" type="text" id="login" name="login" placeholder="Логин">
                    </div>
                    <div class="mb-3">
                        <label for="password">Пароль</label>
                        <input class="form-control rounded-0" type="password" id="password" name="password"
                               placeholder="Пароль">
                    </div>
                    <div class="mb-3">
                        <label for="login">Имя</label>
                        <input class="form-control rounded-0" type="text" id="login" name="first_name"
                               placeholder="Имя">
                    </div>
                    <div class="mb-3">
                        <label for="last_name">Фамилия</label>
                        <input class="form-control rounded-0" type="text" id="last_name" name="last_name"
                               placeholder="Фамилия">
                    </div>
                    <div class="mb-3">
                        <label for="second_name">Отчество</label>
                        <input class="form-control rounded-0" type="text" id="second_name" name="second_name"
                               placeholder="Отчество">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary rounded-0">Зарегистрироваться</button>
                    </div>
                    <div class="form-inline">
                        <a href="/auth.php">Авторизоваться</a>
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
