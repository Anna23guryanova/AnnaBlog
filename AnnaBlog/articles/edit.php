<?php
session_start();
require '../src/php/database.php';

$user_id = $_SESSION['user'];
$user = db_auth()->query("SELECT * FROM users WHERE id = '$user_id'")->fetch_assoc();

$title = '';
$category = '';
$author_id = $user['id'];
$text = '';

if (isset($_GET['article_id'])) {
    $db = db_auth();
    $article_id = $_GET['article_id'];

    $article = $db->query("SELECT * FROM articles WHERE id = '$article_id'")->fetch_assoc();

    if (count($article) == 0) {
        header('Location: /articles/edit.php');
    }

    $title = $article['title'];
    $category = $article['category'];
    $author_id = $article['author_id'];
    $category = $article['category'];
    $text = $article['text'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой блог</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
</head>
<body>
<?php require '../src/components/header.php' ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="mt-3" action="/src/php/article.php" method="post">
                    <input type="hidden" name="author_id" value="<?php echo $author_id?>">
                    <?php if ($article_id) { ?><input type="hidden" name="article_id" value="<?php echo $article_id?>"> <?php } ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" class="form-control rounded-0" id="title" name="title" value="<?php echo $title ?>" placeholder="Название статьи">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Рубрика</label>
                                <select class="form-select rounded-0" id="category" name="category" aria-label="Default select example">
                                    <option value="<?php echo $category ?>"><?php echo $category ?></option>
                                    <option value="Информационная безопасность">Информационная безопасность</option>
                                    <option value="Программное обеспечение">Программное обеспечение</option>
                                    <option value="CGI">CGI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Текст статьи</label>
                        <textarea class="form-control editor-textarea rounded-0" id="text" name="text" rows="20"><?php echo $text ?></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require '../src/components/footer.php' ?>
<script src="../src/js/jquery-3.6.0.min.js"></script>
<script src="../src/js/bootstrap.min.js"></script>

</body>
</html>
