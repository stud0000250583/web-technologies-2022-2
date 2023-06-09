<?php require 'hello.php'?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <?=$title?>
</head>

<body>
    <?=$header?>
    <p>Время обращения: <?=get_current_time()?></p>
    <p>Дата обращения: <?=get_current_date()?></p>
</body>

</html>