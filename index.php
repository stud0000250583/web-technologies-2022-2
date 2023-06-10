<?php
write_to_log("Посещение галлереи");
include "ImageResize.php";
use \Gumlet\ImageResize;

$allowed_extensions = [
    "image/jpeg",
    "image/png"
];

$messages = [
    'ok' => 'Файл успешно загружен',
    'error_file_exists' => 'Файл уже существует, выберите другой файл!',
    'error_file_too_big' => 'Размер файла превышает 5 MB!',
    'error_file_wrong_extension' => 'Файл не является изображением!',
    'error_upload_failed' => 'Не удалось загрузить файл'
];


$status = '';
$message = 'Ожидание действия...';

function render_thumbnails()
{
    $images = (array_slice(scandir("upload/small"), 2));
    foreach ($images as $image) {
        echo '<div class="image-container">';

        echo '<div class="image">';
        echo '<a href="upload/big/' . $image . '" target="_blank"> <img src="upload/small/' . $image . '"> </a>';
        echo '</div>';

        echo '<div class="name">';
        echo '<p>' . $image . '</p>';
        echo '</div>';

        echo '</div>';
    }
}

function write_to_log($operation)
{
    $log_archive_size = count(array_slice(scandir("logs/archive"), 2));
    $log = 'logs/log0' . $log_archive_size . '.txt';
    $log_length = count(file($log));
    $contents = "$operation\t-\t" . date('m.d.Y - H:i:s') . PHP_EOL;

    if ($log_length >= 10) {
        $log_archive_name = 'logs/archive/log0' . ($log_archive_size) . '.txt';
        $log_new_name = 'logs/log0' . ($log_archive_size + 1) . '.txt';
        rename($log, $log_archive_name);
        file_put_contents($log_new_name, $contents, FILE_APPEND);
    } else {
        file_put_contents($log, $contents, FILE_APPEND);
    }
}

if (!empty($_FILES)) {
    $file_name = $_FILES["uploaded_file"]["name"];
    $file_size = $_FILES["uploaded_file"]["size"];
    $file_type = mime_content_type($_FILES["uploaded_file"]["tmp_name"]);
    $path = "upload/big/" . $file_name;

    if (file_exists($path)) {
        $status = 'error_file_exists';
    } elseif (!in_array($file_type, $allowed_extensions)) {
        $status = 'error_file_wrong_extension';
    } elseif ($file_size > 5242880) {
        $status = 'error_file_too_big';
    } elseif (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $path)) {
        $image = new ImageResize($path);
        $image->resizeToWidth(250);
        $thumb_path = "upload/small/" . $file_name;
        $image->save($thumb_path);
        $status = '<p class="success">УСПЕХ: ';
        $status = 'ok';
    } else {
        $status = 'error_upload_failed';
    }
    header("Location: index.php?status=$status");
}

if (!empty($_GET['status'])) {
    $message = $messages[$_GET['status']];
    if ($_GET['status'] == 'ok')
        write_to_log("Успешно загружен файл");
    else
        write_to_log("Неудача при загрузке файла");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Gallery</title>
</head>

<body>
    <div class="wrapper">
        <div class="controls">
            <div class="status_message">
                <?= $message ?>
            </div>
            <form class="upload" method="post" enctype="multipart/form-data">
                <input class="select" type="file" name="uploaded_file">
                <input class="button" type="submit" value="Загрузить">
            </form>
        </div>
        <hr width="100%" size="1" color="black" />
        <div class="gallery">
            <?= render_thumbnails() ?>
        </div>
    </div>
</body>

</html>