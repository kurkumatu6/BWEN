<?php

use App\models\Auto;
use App\models\Element;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

// var_dump($_GET);
$search = Auto::search($_GET);
// var_dump($search);
$_SESSION['search_auto'] = $search;
// var_dump($_SESSION['search_auto']);

header("Location: /views/autos/search.autos.view.php");