<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson17') OR DIE('Ошибка подключения к базе данных');
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
        $query = "SELECT * FROM `signup` WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        if (mysqli_num_rows($data) == 0) {
            $query = "INSERT INTO `signup` (username, password) VALUES ('$username', SHA('$password2'))";
            mysqli_query($dbc, $query);
            echo 'Всё готово, вы зарегестрированы!';
            mysqli_close($dbc);
            exit();
        } else {
            echo 'Логин уже существует';
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
<div class="style">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Введите ваш логин:</label><br><br>
        <input type="text" name="username"><br><br>
        <label for="password">Введите ваш пароль:</label><br><br>
        <input type="password" name="password1"><br><br>
        <label for="password">Введите пароль еще раз:</label><br><br>
        <input type="password" name="password2"><br><br>
        <button type="submit" name="submit">Вход</button>
    </form>
</div>
<script src="assets/js/libs.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>