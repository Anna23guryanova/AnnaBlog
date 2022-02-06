<?php
session_start();
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
                <div class="posts bg-light pb-2">
                    <?php
                    $articles = db_auth()->query("SELECT a.*, u.login FROM articles as a, users as u WHERE a.author_id = u.id;")->fetch_all();

                    if (isset($user) != true) {
                        $user = get_user_from_session();
                    }

                    if (count($articles) != 0) {

                    forEach($articles as $count => $article) {
                        $article_id = $article[0];
                        $article_title = $article[1];
                        $article_text = $article[2];
                        $article_category = $article[3];
                        $article_create_date = $article[5];
                        $article_author_login = $article[6];
                    ?>
                    <div class="post card card-body mb-4 mx-5">
                        <div class="post-title h3">
                            <?php echo $article_title; ?>
                        </div>
                        <div class="form-inline small text-secondary">
                            <span class="mr-1"><?php echo $article_category; ?> </span> |
                            <span class="ml-1 mr-1"><?php echo $article_author_login ?> </span> |
                            <span class="ml-1"><?php echo $article_create_date; ?> </span>
                        </div>
                        <?php if ($user) { ?>
                        <div class="form-inline small">
                            <a class="mr-2" href="/articles/edit.php?article_id=<?php echo $article_id; ?>">Редактировать</a>
                            <a class="text-danger" href="/src/php/delete_article.php?article_id=<?php echo $article_id; ?>">Удалить</a>
                        </div>
                        <?php } ?>
                        <div class="post-img mt-2">
                            <img class="rounded" src="https://picsum.photos/1000/300" width="100%" alt="">
                        </div>
                        <div class="post-body">
                            <?php echo $article_text; ?>
                        </div>
                        <?php

                        if ($user) { ?>
                        <div class="comment-form mt-2">
                            <form action="/src/php/comment.php" method="post">
                                <input type="hidden" name="author_id" value="<?php echo $user['id']; ?>">
                                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                                <label class="h5">Оставить комментарий</label>
                                <textarea class="form-control w-100" name="comment-text" rows="5"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Отправить</button>
                            </form>
                        </div>
                        <?php } else { ?>
                        <div class="alert alert-info mt-2" role="alert">
                            Чтобы оставить комментарий, <a href="/auth.php" class="alert-link">авторизуйтесь</a> на сайте.
                        </div>
                        <?php } ?>
                        <hr>
                        <span class="h5">Комментарии:</span>
                        <div class="post-comments">
                            <?php
                            $article_comments = db_auth()->query("SELECT c.*, u.login FROM comments as c, users as u WHERE c.article_id = '$article_id' and c.author_id = u.id")->fetch_all();

                             foreach ($article_comments as $c_count => $comment) {
                                 $comment_text = $comment[2];
                                 $comment_author_login = $comment[5];
                            ?>
                            <div class="comment mt-2 pl-2" style="border-left: 2px solid #525252">
                                <div class="comment-author">
                                    <?php echo $comment_author_login; ?>
                                </div>
                                <div class="comment-text text-secondary" style="font-size: 15px;">
                                    <?php echo $comment_text; ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php }} else { ?>
                        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            <strong>Нет опубликованных статей.</strong> Авторизуйтесь и станьте первым!
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require 'src/components/footer.php' ?>
<script src="src/js/jquery-3.6.0.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>

</body>
</html>
