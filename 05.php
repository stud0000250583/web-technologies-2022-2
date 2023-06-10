<?php
$content = file_get_contents('05.html');
$content = str_replace("{{ date }}", date("Y"), $content);
echo $content;