<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
// default
// define('HOST', 'localhost:8889');
// define('USER', 'test');
// define('PASS', '111-555');
// define('DB', 'webis');

define('HOST', 'localhost:3306');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'webis');

include "../engine/db.php";
include "../engine/controller.php";
include "../engine/render.php";
include "../models/catalog.php";
include "../models/menu.php";
include "../models/news.php";
include "../models/feedback.php";