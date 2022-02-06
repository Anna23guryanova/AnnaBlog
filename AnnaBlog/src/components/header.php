<?php
$user = get_user_from_session();
?>

<header class="container">
    <nav class="navbar-light bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo d-flex justify-content-center">
                        <a class="navbar-brand mr-0" href="/">
                            <img src="/src/img/logo.png" alt="" width="30"
                                 class="d-inline-block align-text-top">
                            Мой блог
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="nav justify-content-center">
                        <?php if ($user) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/articles/edit.php">Добавить статью</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link text-secondary">В сети (<?php echo $user['login']; ?>)</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/src/php/logout.php">Выход</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/auth.php">Авторизоваться</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register.php">Регистрация</a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
