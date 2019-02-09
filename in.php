<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson17');
if (!isset($_COOKIE['user_id'])) {
    if (isset($_POST['submit'])) {
        $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        if (!empty($user_username) && !empty($user_password)) {
            $query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_assoc($data);
                setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
                $home_url = 'http://' . $_SERVER['HTTP_HOST'];
                header('Location: ' . $home_url);
            } else {
                echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
            }
        } else {
            echo 'Извините вы должны заполнить поля правильно';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel='stylesheet' href='assets/css/main.css'/>
</head>
<body>
<section>
    <div class="articles">
        <h3>Название статьи 1</h3>
        <p>Написание символов на сайтах и зла средневековый <br>
            книгопечатник вырвал отдельные. Самым известным рыбным <br>
            текстом является знаменитый lorem некоторые вопросы. <br>
            то и т.д текстом является знаменитый lorem этот.</p>
        <a href="textarea.php">Отзыв</a>
    </div>
    <div class="articles">
        <h3>Название статьи 2</h3>
        <p>Написание символов на сайтах и зла средневековый <br>
            книгопечатник вырвал отдельные. Самым известным рыбным <br>
            текстом является знаменитый lorem некоторые вопросы. <br>
            то и т.д текстом является знаменитый lorem этот.</p>
        <a href="textarea.php">Отзыв</a>
    </div>
    <div class="articles">
        <h3>Название статьи 3</h3>
        <p>Написание символов на сайтах и зла средневековый<br>
            книгопечатник вырвал отдельные. Самым известным рыбным <br>
            текстом является знаменитый lorem некоторые вопросы. <br>
            то и т.д текстом является знаменитый lorem этот.</p>
        <a href="textarea.php">Отзыв</a>
    </div>
    <div class="articles">
        <h3>Название статьи 4</h3>
        <p>Написание символов на сайтах и зла средневековый <br>
            книгопечатник вырвал отдельные. Самым известным рыбным <br>
            текстом является знаменитый lorem некоторые вопросы. <br>
            то и т.д текстом является знаменитый lorem этот.</p>
        <a href="textarea.php">Отзыв</a>
    </div>

</section>
<section>
    <?php
    if (empty($_COOKIE['username'])) {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="username">Логин:</label>
            <input type="text" name="username">
            <label for="password">Пароль:</label>
            <input type="password" name="password">
            <button type="submit" name="submit">Вход</button>
            <a href="in2.php">Регистрация</a>
        </form>
        <?php
    } else {
        ?>
        <div class="exit">
            <h3><a href="in2.php">Мой профиль</a></h3><br><br>
            <h3><a href="in2.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></h3><br><br>
        </div>
        <?php
    }
    ?>
</section>
<script src="assets/js/libs.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>