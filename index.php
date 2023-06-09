<?php
    require '01.php';
    require '02.php';
    require '04.php';
    require '06.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Первое задание:</h3>
    <p>
        Файл '01.php'<br>
        a = 10<br>b = 15<br>a - b = 
        <?=first_task(10, 15)?>
    </p>
    <p>
        a = -10<br>b = -15<br>a * b = 
        <?=first_task(-10, -15)?>
    </p>
    <p>
        a = 10<br>b = -15<br>a + b = 
        <?=first_task(10, -15)?>
    </p>

    <h3>Второе задание:</h3>
    <p>
        Файл '02.php'<br>
        a = 5<br>
        <?=second_task(5)?>
    </p>

    <h3>Третье задание:</h3>
    <p>
        Файл '03.php'<br>
        a = 5<br>
        b = 10<br>
        add = <?=add(5, 10)?><br>
        sub = <?=sub(5, 10)?><br>
        mul = <?=mul(5, 10)?><br>
        div = <?=div(5, 10)?><br>
    </p>

    <h3>Четвертое задание:</h3>
    <p>
        Файл '04.php'<br>
        arg1 = 2<br>
        arg2 = 4<br>
        op = "add"<br>
        res = <?=math_operation(2, 4, "add")?>
    </p>

    <h3>Пятое задание:</h3>
    <h4>Вывод года (первый вариант)</h4>
    <p><?php echo date("Y");?>
    <h4>Вывод года (второй вариант)</h4>
    <p><?=date("Y")?>
    <!-- Вывод года через str_replace() -->
    <p>Файл '05.php'</p>
    <?php require '05.php'?>

    <h3>Шестое задание:</h3>
    <p>
        val = 2<br>
        pow = 10<br>
        res = <?=power(2, 10)?>
    </p>
</body>

</html>