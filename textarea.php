<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson17') OR DIE('Ошибка подключения к базе данных');
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
    $feedback = mysqli_real_escape_string($dbc, trim($_POST['feedback']));
    $author = mysqli_real_escape_string($dbc, trim($_POST['author']));
    if (!empty($feedback) && !empty($title) && !empty($author)) {
        $query = "INSERT INTO `feedback` (title, feedback, author) VALUES ('$title', '$feedback', '$author' )";
        mysqli_query($dbc, $query);
        echo 'Всё готово, вы отправили отзыв!';
        mysqli_close($dbc);
        exit();
    } else {
        echo 'Такой отзыв уже сущекствует!';
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="style">
    <h1>Форма публикации </h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p><b>Введите ваш отзыв:</b></p>
        <label><input type="text" name="title">Название отзыва: </label><br><br>
        <label><p><textarea rows="10" cols="45" name="text"></textarea></label></p>
        <label><input type="text" name="autor"> Автор </label><br><br>
        Дата: <input type="hidden" name="date" value="<? echo date('Y-m-d'); ?>"><br><br>
        Время: <input type="hidden" name="time" value="<? echo date('Y-m-d'); ?>"><br><br>
        <p><input type="submit" value="Отправить"></p>
    </form>
</div>
<script src="assets/js/libs.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>